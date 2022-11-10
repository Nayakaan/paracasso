<?php

if (!defined('ABSPATH')) exit;

final class Tw_Elementor
{

    /**
     * Instance
     * @since 1.0.0
     */

    public static $_instance;


    public $file = __FILE__;

    /**
     * Load Construct
     * @since 1.0.0
     */

    public function __construct(){
        
        add_action('elementor/controls/controls_registered', array( $this, 'TW_icon_pack' ), 11 );
        
        add_action('elementor/elements/categories_registered', array($this, 'TW_add_widget_categories'));
        add_action('elementor/widgets/widgets_registered', array($this, 'TW_elements'));

        add_action('elementor/editor/after_enqueue_styles', array($this, 'TW_editor_enqueue_styles'));
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'TW_editor_enqueue_scripts'));

        add_action('elementor/frontend/before_enqueue_scripts', array($this, 'TW_frontend_enqueue_scripts'));
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'TW_frontend_enqueue_scripts'));

    }

            
    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void 
    */

    public function TW_icon_pack( $controls_manager ) {

        require_once (dirname($this->file). '/controls/tw-autocomplete.php');
        require_once (dirname($this->file). '/controls/tw-icon.php');
        $controls_manager->register_control( 'tw_autocomplete', new Tw_Autocomplete() );
        $controls = array(
            $controls_manager::ICON => 'Tw_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }
    
    /**
     * Category Register
     * @since  1.0.0
     */

    public function TW_add_widget_categories($elements_manager){
        $elements_manager->add_category(
            'organia-elements',[
                'title' => esc_html__('Organia', 'themewar'),
                'icon'  => 'fa fa-plug',
            ],
            1
        );
        $elements_manager->add_category(
            'organia-footer-elements',
            [
                'title' => esc_html__('Organia Footer Widgets', 'themewar'),
                'icon'  => 'fa fa-plug',
            ],
            2
        );
    }

    /**
     * Elements register
     * @since  1.0.0
     */

    public function TW_elements($widgets_manager){
        
        require_once dirname($this->file) . '/tw-header.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Header_Widget());

        require_once dirname($this->file) . '/tw-sec-title.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Sec_Title_Widget());

        require_once dirname($this->file) . '/tw-text.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Text_Widget());

        require_once dirname($this->file) . '/tw-headings.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Headings_Widget());

        require_once dirname($this->file) . '/tw-about-img.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_About_Image_Widget());

        require_once dirname($this->file) . '/tw-icon-box.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Icon_Box_Widgets());

        require_once dirname($this->file) . '/tw-shape-img.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Shape_Image_Widget());

        require_once dirname($this->file) . '/tw-tabs.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Tabs_Widgets());

        require_once dirname($this->file) . '/tw-product-categories.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Categories_Widgets());

        require_once dirname($this->file) . '/tw-product-grid.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Grid_Widget());

        require_once dirname($this->file) . '/tw-product-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Slider_Widget());

        require_once dirname($this->file) . '/tw-product-tab.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Tab_Widget());

        require_once dirname($this->file) . '/tw-product-filter.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Filter_Widget());

        require_once dirname($this->file) . '/tw-deal-products.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Deal_Products_Widget());

        require_once dirname($this->file) . '/tw-product-list.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_product_list_Widget());

        require_once dirname($this->file) . '/tw-text-carousel.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Text_Carousel_Widget());

        require_once dirname($this->file) . '/tw-ads-carousel.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Ads_Widget());

        require_once dirname($this->file) . '/tw-clients-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Clients_Slider_Widgets());

        require_once dirname($this->file) . '/tw-look-book.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Look_Book_Widgets());

        require_once dirname($this->file) . '/tw-mailchimp.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Mailchimp_Widgets());

        require_once dirname($this->file) . '/tw-services.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Services_Widget());

        require_once dirname($this->file) . '/tw-meta-box.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Meta_Box_Widgets());

        require_once dirname($this->file) . '/tw-team.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Team_Widgets());

        require_once dirname($this->file) . '/tw-post-featured-image.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Post_Featured_Image_Widget());

        require_once dirname($this->file) . '/tw-team-meta.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Team_Meta_Widgets());

        require_once dirname($this->file) . '/tw-skills.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Skills_Widgets());

        require_once dirname($this->file) . '/tw-lists.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_List_Widget());

        require_once dirname($this->file) . '/tw-testimonial.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Testimonial_Widgets());

        require_once dirname($this->file) . '/tw-latest-blog.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Latest_Blog_Widgets());

        require_once dirname($this->file) . '/tw-funfact.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Funfact_Widgets());

        require_once dirname($this->file) . '/tw-video-btn.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Video_Btn_Widgets());

        require_once dirname($this->file) . '/tw-contact-form.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Contcat_Form_Widget());

        require_once dirname($this->file) . '/tw-google-map.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Google_Map_Widget());

        require_once dirname($this->file) . '/tw-social.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Social_Widgets());

        require_once dirname($this->file) . '/tw-instagram.php';
        $widgets_manager->register_widget_type(new Elementor\TW_Instagram_Widget());

        require_once dirname($this->file) . '/tw-timer-counter.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Timer_Counter_Widgets());

        require_once dirname($this->file) . '/tw-button.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Button_Widget());

        require_once dirname($this->file) . '/tw-product-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Slider_Widget());

        require_once dirname($this->file) . '/tw-product-offer.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Offer_Widget());
        
        require_once dirname($this->file) . '/tw-product-tab-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Product_Slider_Tab_Widget());

        require_once dirname($this->file) . '/tw-rev-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Rev_Slider_Widgets());

        /*-- Footer Widgets --*/
        require_once dirname($this->file) . '/tw-contact-info.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Contact_Info_Widgets());

        require_once dirname($this->file) . '/tw-about.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_About_Widgets());

        require_once dirname($this->file) . '/tw-navigation.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Navigation_Widgets());
        
    }

    /**
     * Frontend enqueue scripts
     * @since  1.0.0
     */

    public function TW_frontend_enqueue_scripts()
    {

    }

    /**
     * Editor enqueue scripts
     * @since  1.0.0
     */

    public function TW_editor_enqueue_scripts()
    {

    }

    /**
     * Editor enqueue styles
     * @since  1.0.0
     */

    public function TW_editor_enqueue_styles(){
        wp_enqueue_style( 'tw-icon-elementor', plugins_url('organia-assistance/assets/css/icons.css'), null, '' );
        wp_enqueue_style( 'tw-editor-elementor', plugins_url('organia-assistance/assets/css/editors.css'), null, '' );
    }

    /**
     * Preview enqueue scripts
     * @since  1.0.0
     */

    public function TW_preview_enqueue_scripts(){}

    public static function TW_get_instance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new Tw_Elementor();
        }
        return self::$_instance;
    }

}