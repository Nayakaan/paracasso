<?php


/**
 * Class Tw_Header_Builder
 */
class Tw_Header_Builder
{
    /**
     * Tw_Header_Builder constructor.
     */
    public function __construct()
    {
        add_action('wp', array($this, 'hook'));
    }

    public function hook()
    {
        $header_style = get_theme_mod('header_style', 0);
        if (is_page() && defined('FW')) {
            $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_header_enabled', 2);
            if ($page_is_settings == 1) {
                $header_style = fw_get_db_post_option(get_the_ID(), 'page_header_style', 0);
            }
        }
        if ($header_style > 0) {
            add_action('get_header', array($this, 'tw_head'));
        }
    }

    /**
     * get all header template ids.
     * @return int[]|WP_Post[]
     */
    public static function get_header_templates()
    {
        return Tw_Builder::get_posts('tw-header-builder');
    }

    /**
     * Override the theme header
     */

    public function tw_head()
    {
        require __DIR__ . '/tw-header.php';
        $templates = [];
        $templates[] = 'header.php';
        remove_all_actions('wp_head');
        ob_start();
        locate_template($templates, true);
        ob_get_clean();
    }
}
