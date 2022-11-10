<?php


/**
 * Class Tw_Builder
 */
class Tw_Builder
{
    /**
     * @var
     */
    public static $elementor_instance;

    /**
     * Tw_Builder constructor.
     */
    public function __construct()
    {
        $tmgc_posts = new Tw_Custom_Post('themewar');
        $tmgc_posts->TW_inits('tw-header-builder', 'Header Builder', 'Header Builder', array('show_in_menu' => 'themes.php', 'show_in_nav_menus' => false, 'supports' => array('title', 'thumbnail', 'elementor')));
        $tmgc_posts->TW_inits('tw-footer-builder', 'Footer Builder', 'Footer Template', array('show_in_menu' => 'themes.php', 'show_in_nav_menus' => false, 'supports' => array('title', 'thumbnail', 'elementor')));
        add_filter('single_template', array($this, 'tw_canvas_template'));
        new Tw_Header_Builder();
        new Tw_footer_Builder();
    }

    /**
     * @param $post_type
     * @return int[]|WP_Post[]
     */
    public static function get_posts($post_type)
    {
        $args = [
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'id',
            'order' => 'DESC',
            'fields' => 'ids',
            'post_type' => $post_type,
        ];

        return get_posts($args);
    }


    /**
     * @param $single_template
     * @return string
     */
    public function tw_canvas_template($single_template)
    {
        global $post;
        if ('tw-header-builder' == $post->post_type || 'tw-footer-builder' == $post->post_type) {
            return ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';
        }
        return $single_template;
    }

    /**
     * show the header template
     * @param $id
     */
    public static function render_template($id)
    {
        self::$elementor_instance = Elementor\Plugin::instance();
        echo self::$elementor_instance->frontend->get_builder_content_for_display($id);
    }

}