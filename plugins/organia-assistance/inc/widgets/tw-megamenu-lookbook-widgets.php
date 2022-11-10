<?php
/**
 * Creates widget megamenu widget
 */

class Tw_Megamenu_Lookbook_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'organ_megamenu_widget',
            'description'   => 'Organia Megamenu Look Book.'
        );
        
        parent::__construct('organ-megamenu', esc_html__('Organia Megamenu Look Book', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $subtitle     = (isset($instance['subtitle']) && $instance['subtitle'] != '') ? $instance['subtitle'] : esc_html__( 'New Arrivals', 'themewar' );
        $title        = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( '100% Natural Fresh Juice', 'themewar' );
        $lookImg     = (isset($instance['lookImg']) && $instance['lookImg'] != '') ? $instance['lookImg'] : '';
        $lookImgId   = (isset($instance['lookImgId']) && $instance['lookImgId'] != '') ? $instance['lookImgId'] : 0;
        $btnlabel    = (isset($instance['btnlabel'])) ? $instance['btnlabel'] : esc_html__( 'Shop Now', 'themewar' );
        $btn_url     = (isset($instance['btn_url'])) ? $instance['btn_url'] : '';
        
        echo $args['before_widget'];
        ?>
        <div class="promo text-center overlay-anim">
            <?php if($lookImg != ''): ?>
                <img src="<?php echo esc_url($lookImg); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php endif; ?>
            <div class="promoContent">
                <?php if($subtitle != ''): ?>
                    <h5><?php echo wp_kses_post($subtitle); ?></h5>
                <?php endif; ?>
                <?php if($title != ''): ?>
                    <h3><?php echo wp_kses_post($title); ?></h3>
                <?php endif; ?>
                <?php if($btnlabel != ''): ?>
                    <a href="<?php echo esc_url($btn_url); ?>" class="organ_btn"><?php echo esc_html($btnlabel); ?><i class="twi-arrow-right1"></i></a>
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
        $subtitle     = (isset($instance['subtitle']) && $instance['subtitle'] != '') ? $instance['subtitle'] : esc_html__( 'New Arrivals', 'themewar' );
        $title        = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( '100% Natural Fresh Juice', 'themewar' );
        $lookImg     = (isset($instance['lookImg']) && $instance['lookImg'] != '') ? $instance['lookImg'] : '';
        $lookImgId   = (isset($instance['lookImgId']) && $instance['lookImgId'] != '') ? $instance['lookImgId'] : 0;
        $btnlabel    = (isset($instance['btnlabel'])) ? $instance['btnlabel'] : esc_html__( 'Shop Now', 'themewar' );
        $btn_url     = (isset($instance['btn_url'])) ? $instance['btn_url'] : '';
        ?>
        <div>
            <label for="<?php echo esc_attr($this->get_field_id( 'lookImg' )); ?>"><?php _e( 'Look Book Image:' , 'themewar' ); ?></label>
            <div class="image_uploader">
                <input class="widefat uploaded_image_url" id="<?php echo esc_attr($this->get_field_id( 'lookImg' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'lookImg' )); ?>" type="text" value="<?php echo esc_attr( $lookImg ); ?>" />
                <input class="uploaded_image_id" id="<?php echo esc_attr($this->get_field_id( 'lookImgId' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'lookImgId' )); ?>" type="hidden" value="<?php echo esc_attr( $lookImgId ); ?>" />
                <a href="#" class="uploder_btn button button-primary"><?php echo esc_html__('Upload', 'Themewar') ?></a>
            </div>
            <small><?php echo esc_html__('Image size should be 245x304px.', 'themewar'); ?></small>
        </div>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>"><?php _e( 'Sub Title:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'subtitle' )); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'btnlabel' )); ?>"><?php _e( 'Btn Label:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btnlabel' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btnlabel' )); ?>" type="text" value="<?php echo esc_attr( $btnlabel ); ?>" />
       </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'btn_url' )); ?>"><?php _e( 'Btn Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btn_url' )); ?>" type="text" value="<?php echo esc_attr( $btn_url ); ?>" />
       </p>
        <?php
    }
}