<?php
/**
 * About Me Widget
 */

class Tw_About_Me_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'about_me',
            'description'   => 'Organia About Me Widget.'
        );
        
        parent::__construct('org_auw', esc_html__('Organia About Me Widget.', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'About Author', 'themewar' );
        $authorImg     = (isset($instance['authorImg']) && $instance['authorImg'] != '') ? $instance['authorImg'] : '';
        $authorImgId  = (isset($instance['authorImgId']) && $instance['authorImgId'] != '') ? $instance['authorImgId'] : 0;
        $auname     = (isset($instance['auname'])) ? $instance['auname'] : '';
        $audesc     = (isset($instance['audesc'])) ? $instance['audesc'] : '';
        $f_url      = (isset($instance['f_url'])) ? $instance['f_url'] : '';
        $d_url      = (isset($instance['d_url'])) ? $instance['d_url'] : '';
        $t_url      = (isset($instance['t_url'])) ? $instance['t_url'] : '';
        $i_url      = (isset($instance['i_url'])) ? $instance['i_url'] : '';
        $l_url      = (isset($instance['l_url'])) ? $instance['l_url'] : '';
        $b_url      = (isset($instance['b_url'])) ? $instance['b_url'] : '';
        
        echo $args['before_widget'];
        if ( !empty( $instance[ 'title' ] ) ) {
            echo wp_kses_post($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
        }
        ?>
        <div class="aboutme">
            <?php if($authorImg != ''): ?>
                <img src="<?php echo esc_url($authorImg); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php endif; ?>
            <?php if($auname != ''): ?>
                <h5><?php echo wp_kses_post($auname); ?></h5>
            <?php endif; ?>
            <?php if($audesc != ''): ?>
                <p><?php echo wp_kses_post($audesc); ?></p>
            <?php endif; ?>
            <div class="abmesocial">
                <?php if($f_url != ''): ?>
                    <a href="<?php echo esc_url($f_url); ?>"><i class="twi-facebook-f"></i></a>
                <?php endif; ?>
                <?php if($t_url != ''): ?>
                    <a href="<?php echo esc_url($t_url); ?>"><i class="twi-twitter"></i></a>
                <?php endif; ?>
                <?php if($d_url != ''): ?>
                    <a href="<?php echo esc_url($d_url); ?>"><i class="twi-dribbble"></i></a>
                <?php endif; ?>
                <?php if($i_url != ''): ?>
                    <a href="<?php echo esc_url($i_url); ?>"><i class="twi-instagram"></i></a>
                <?php endif; ?>
                <?php if($l_url != ''): ?>
                    <a href="<?php echo esc_url($l_url); ?>"><i class="twi-linkedin-in"></i></a>
                <?php endif; ?>
                <?php if($b_url != ''): ?>
                    <a href="<?php echo esc_url($b_url); ?>"><i class="twi-behance"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        return $new_instance;
    }
    
    function form($instance)
    {
        $title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'About Author', 'themewar' );

        $authorImg     = (isset($instance['authorImg']) && $instance['authorImg'] != '') ? $instance['authorImg'] : '';
        $authorImgId  = (isset($instance['authorImgId']) && $instance['authorImgId'] != '') ? $instance['authorImgId'] : 0;
        $auname     = (isset($instance['auname'])) ? $instance['auname'] : '';
        $audesc     = (isset($instance['audesc'])) ? $instance['audesc'] : '';
        $f_url      = (isset($instance['f_url'])) ? $instance['f_url'] : '';
        $d_url      = (isset($instance['d_url'])) ? $instance['d_url'] : '';
        $t_url      = (isset($instance['t_url'])) ? $instance['t_url'] : '';
        $i_url      = (isset($instance['i_url'])) ? $instance['i_url'] : '';
        $l_url      = (isset($instance['l_url'])) ? $instance['l_url'] : '';
        $b_url      = (isset($instance['b_url'])) ? $instance['b_url'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <div>
            <label for="<?php echo esc_attr($this->get_field_id( 'authorImg' )); ?>"><?php _e( 'Author Image:' , 'themewar' ); ?></label>
            <div class="image_uploader">
                <input class="widefat uploaded_image_url" id="<?php echo esc_attr($this->get_field_id( 'authorImg' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'authorImg' )); ?>" type="text" value="<?php echo esc_attr( $authorImg ); ?>" />
                <input class="uploaded_image_id" id="<?php echo esc_attr($this->get_field_id( 'authorImgId' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'authorImgId' )); ?>" type="hidden" value="<?php echo esc_attr( $authorImgId ); ?>" />
                <a href="#" class="uploder_btn button button-primary"><?php echo esc_html__('Upload', 'Themewar') ?></a>
            </div>
        </div>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'auname' )); ?>"><?php _e( 'Name:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'auname' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'auname' )); ?>" type="text" value="<?php echo esc_attr( $auname ); ?>" />
	   </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'audesc' )); ?>"><?php _e( 'Description:' , 'themewar' ); ?></label>
            <textarea rows="8" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'audesc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'audesc' )); ?>"><?php echo wp_kses_post( $audesc ); ?></textarea>
	   </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'f_url' )); ?>"><?php _e( 'Facebook Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'f_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'f_url' )); ?>" type="text" value="<?php echo esc_attr( $f_url ); ?>" />
	   </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'd_url' )); ?>"><?php _e( 'Dribbble Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'd_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'd_url' )); ?>" type="text" value="<?php echo esc_attr( $d_url ); ?>" />
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 't_url' )); ?>"><?php _e( 'Twitter Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 't_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 't_url' )); ?>" type="text" value="<?php echo esc_attr( $t_url ); ?>" />
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'i_url' )); ?>"><?php _e( 'Instagram Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'i_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'i_url' )); ?>" type="text" value="<?php echo esc_attr( $i_url ); ?>" />
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'l_url' )); ?>"><?php _e( 'Linkedin Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'l_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'l_url' )); ?>" type="text" value="<?php echo esc_attr( $l_url ); ?>" />
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'b_url' )); ?>"><?php _e( 'Behance Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'b_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'b_url' )); ?>" type="text" value="<?php echo esc_attr( $b_url ); ?>" />
       </p>
        <?php
    }
}