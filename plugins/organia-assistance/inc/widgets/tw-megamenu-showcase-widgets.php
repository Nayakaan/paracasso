<?php
/**
 * Creates widget megamenu widget
 */

class Tw_Megamenu_Showcase_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'organ_showcase_widget',
            'description'   => 'Organia Showcase Menu.'
        );
        
        parent::__construct('organ-showcase', esc_html__('Organia Showcase Menu', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $menuImg      = (isset($instance['menuImg']) && $instance['menuImg'] != '') ? $instance['menuImg'] : 'https://via.placeholder.com/400x500.jpg';
        $menuImgId    = (isset($instance['menuImgId']) && $instance['menuImgId'] != '') ? $instance['menuImgId'] : 0;
        $menu_url     = (isset($instance['menu_url'])) ? $instance['menu_url'] : '';
        $menulabel    = (isset($instance['menulabel'])) ? $instance['menulabel'] : esc_html__( 'Home {01}', 'themewar' );
        $newlabel     = (isset($instance['newlabel'])) ? $instance['newlabel'] : '';
        
        $menuName     = str_replace(['{', '}'], ['<span>', '</span>'], $menulabel);
        echo $args['before_widget'];
        ?>
        <div class="showcase">
            <div class="showcaseThumb">
                <a target="_blank" href="<?php echo esc_url($menu_url); ?>">
                    <img src="<?php echo esc_url($menuImg); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                </a>
                <?php if($newlabel != ''): ?>
                    <label><?php echo wp_kses_post($newlabel); ?></label>
                <?php endif; ?>
            </div>
            <?php if($menuName != ''): ?>
                <h5><?php echo wp_kses_post($menuName); ?></h5>
            <?php endif; ?>
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
        $menuImg      = (isset($instance['menuImg']) && $instance['menuImg'] != '') ? $instance['menuImg'] : 'https://via.placeholder.com/400x500.jpg';
        $menuImgId    = (isset($instance['menuImgId']) && $instance['menuImgId'] != '') ? $instance['menuImgId'] : 0;
        $menu_url     = (isset($instance['menu_url'])) ? $instance['menu_url'] : '';
        $menulabel    = (isset($instance['menulabel'])) ? $instance['menulabel'] : esc_html__( 'Home {01}', 'themewar' );
        $newlabel     = (isset($instance['newlabel'])) ? $instance['newlabel'] : '';
        ?>
        <div>
            <label for="<?php echo esc_attr($this->get_field_id( 'menuImg' )); ?>"><?php _e( 'Showcase Menu Image:' , 'themewar' ); ?></label>
            <div class="image_uploader">
                <input class="widefat uploaded_image_url" id="<?php echo esc_attr($this->get_field_id( 'menuImg' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'menuImg' )); ?>" type="text" value="<?php echo esc_attr( $menuImg ); ?>" />
                <input class="uploaded_image_id" id="<?php echo esc_attr($this->get_field_id( 'menuImgId' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'menuImgId' )); ?>" type="hidden" value="<?php echo esc_attr( $menuImgId ); ?>" />
                <a href="#" class="uploder_btn button button-primary"><?php echo esc_html__('Upload', 'Themewar') ?></a>
            </div>
            <small><?php echo esc_html__('Image size should be 400x500px.', 'themewar'); ?></small>
        </div>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'menu_url' )); ?>"><?php _e( 'Menu Url:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'menu_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'menu_url' )); ?>" type="text" value="<?php echo esc_attr( $menu_url ); ?>" />
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'menulabel' )); ?>"><?php _e( 'Menu Label:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'menulabel' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'menulabel' )); ?>" type="text" value="<?php echo esc_attr( $menulabel ); ?>" />
            <small><?php echo esc_html__('Use {} for different color.', 'themewar'); ?></small>
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'newlabel' )); ?>"><?php _e( 'New Label:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'newlabel' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'newlabel' )); ?>" type="text" value="<?php echo esc_attr( $newlabel ); ?>" />
            <small><?php echo esc_html__('Is it new home page then insert new page label.', 'themewar'); ?></small>
       </p>
        <?php
    }
}