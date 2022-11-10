<?php
/*
    Plugin Name: Organia Assistance
    Plugin URI: http://themewar.com/
    Description: Assistance plugin for all Organia Assistance.
    Version: 1.0.1
    Author: themewar
    Author URI: http://themewar.com/
    License: 
    Text Domain: themewar
*/

if (!defined('ABSPATH')) {
    exit;
}

/* * ---------------------------------------------------------------
* Including Files
* -------------------------------------------------------------* */
require_once dirname(__FILE__) . '/autoload.php';

class TW_Assistance
{
    public static $_instance;

    public $plugin_name = 'Organia Assistance';
    public $plugin_version = '1.0.1';
    public $file = __FILE__;


    public function __construct()
    {
        add_action('init', array($this, 'TW_load_textdomain'));
        add_action('plugins_loaded', array($this, 'TW_init'));
        $this->constants();
    }

    public function constants()
    {
        define('TW_PLUGIN_NAME', $this->plugin_name);
        define('TW_VERSION', $this->plugin_version);
        define('TW_FILE', $this->file);
        define('TW_URL', plugins_url('', $this->file));
        define('TW_ASSETS', plugins_url('', $this->file) . '/assets');
    }

    /* * ---------------------------------------------------------------
    * Init all hooks and others
    * -------------------------------------------------------------* */
    public function TW_init()
    {
        include dirname(__FILE__) . '/inc/helpers/helpers.php';
        add_action('admin_enqueue_scripts', array($this, 'TW_admin_enqueue_scripts'));
        add_action('login_enqueue_scripts', array($this, 'TW_wp_login_css'), 10);
        add_action('widgets_init', array($this, 'TW_widgets_init'));
        add_filter('pre_get_posts', array($this, 'TW_search_filter'));
        add_shortcode('post_view', array($this, 'TW_post_view'));

        $this->TW_post_type_caller();
        new Tw_Assistance_Helpers();
        new Tw_Users_Meta_Hooks();

        //check elementor load
        if (did_action('elementor/loaded')) {
            Tw_Elementor::TW_get_instance();
            new Tw_Builder();
        }
        add_action('admin_head', array($this, 'TW_hide_brizy_admin_notice'));

        add_shortcode('product-share', array($this, 'TW_Product_Share'));

        add_filter('gutenberg_use_widgets_block_editor', '__return_false');
        add_filter('use_widgets_block_editor', '__return_false');
    }

    /* * ---------------------------------------------------------------
    * Widgets
    * -------------------------------------------------------------* */
    public function TW_post_type_caller()
    {
        $tmgc_posts = new Tw_Custom_Post('themewar');
        $tmgc_posts->TW_inits('service', 'Service', 'Services', array('menu_icon' => 'dashicons-megaphone'));
        $tmgc_posts->TW_inits('team', 'Team', 'Teams', array('menu_icon' => 'dashicons-admin-users'));
        $tmgc_posts->TW_inits('blocks', 'Block', 'Blocks', array('menu_icon' => 'dashicons-editor-kitchensink'));
    }

    /* * ----------------------------------------------------------
    * JS and CSS for Frontend
    * -------------------------------------------------------------* */
    public static function TW_instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new TW_Assistance();
        }
        return self::$_instance;
    }

    /* * ---------------------------------------------------------------
    * Load Css For WP Login
    * -------------------------------------------------------------* */
    public function TW_load_textdomain()
    {
        load_plugin_textdomain('themewar', false, dirname(__FILE__) . '/languages');
    }

    /* * ---------------------------------------------------------------
    * Taxonomy Caller
    * -------------------------------------------------------------* */
    public function TW_widgets_init()
    {
        register_widget('Tw_About_Me_Widgets');
        register_widget('Tw_Recentpost_Widgets');
        register_widget('Tw_Products_Widgets');
        register_widget('Tw_Megamenu_Lookbook_Widgets');
        register_widget('Tw_Megamenu_Showcase_Widgets');
    }

    /* * ---------------------------------------------------------------
    * Posttype Caller
    * -------------------------------------------------------------* */
    public function TW_admin_enqueue_scripts()
    {
        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }

        wp_enqueue_style('organia-assistance', plugin_dir_url($this->file) . 'assets/css/admin_style.css', false);
        wp_enqueue_script('tw-theme-core', plugin_dir_url($this->file) . 'assets/js/tw_admin.js', false);
    }

    /*======================================================================
    / Set Capabilities
    /=====================================================================*/
    public function TW_wp_login_css()
    {
        wp_enqueue_style('tw-theme-core', plugin_dir_url($this->file) . 'assets/css/login_style.css', false);
    }

    /* * ---------------------------------------------------------------
    * Hide Brizy
    * -------------------------------------------------------------* */
    function TW_hide_brizy_admin_notice()
    {
        echo '<style>
        .notice.fw-brz-dismiss {display: none;} 
      </style>';
    }

    /**---------------------------------------------------------------
     * Post View Shortcodes
     * -------------------------------------------------------------**/
    public function TW_post_view($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'pid' => 0
                ),
                $atts
            )
        );

        if ($pid < 1) {
            return '';
        }

        $view = get_post_meta($pid, '_organia_post_view', true);
        $view = (empty($view)) ? esc_html__('0 View', 'themewar') : $view . esc_html__(' Views', 'themewar');

        $html = ' <a href="' . get_the_permalink() . '">' . esc_html($view) . '</a>';

        return $html;
    }

    public function TW_search_filter($query)
    {
        if ($query->is_search) {
            if (isset($_GET['product_cat']) && !empty($_GET['product_cat'])) {
                $args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => sanitize_text_field(wp_unslash($_REQUEST['product_cat'])),
                    ),
                );
            }
        }
        return $query;
    }

    public function TW_Product_Share($atts)
    {
        global $post;
        extract(
            shortcode_atts(
                array(
                    'pid' => 0,
                ), $atts
            )
        );
        $postID = ($pid > 0 ? $pid : $post->ID);
        $html = '';

        if (get_post_type(get_the_ID()) == 'product'):
            $shop_pro_socials = get_theme_mod('shop_pro_socials', array('1', '2', '3', '4'));
            if (defined('FW')):
                $shop_pros_enable_settings = fw_get_db_post_option($postID, 'shop_pros_enable_settings', 2);
                if ($shop_pros_enable_settings == 1):
                    $shop_pros_socials = fw_get_db_post_option($postID, 'shop_pros_socials', array());
                    $shop_pro_socials = (!empty($shop_pros_socials) ? $shop_pros_socials : $shop_pro_socials);
                endif;
            endif;

            if (!empty($shop_pro_socials) && $postID > 0):
                if (in_array(1, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-facebook"></i></a>';
                }
                if (in_array(2, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink($postID) . '&text=' . esc_url(get_the_title($postID)) . '"><i class="icofont-twitter"></i></a>';
                }
                if (in_array(3, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="mailto:?subject=' . get_the_permalink($postID) . '"><i class="icofont-envelope"></i></a>';
                }
                if (in_array(4, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-linkedin"></i></a>';
                }
                if (in_array(5, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID($postID), 'full') . '&url=' . get_the_permalink($postID) . '&is_video=false&description=' . esc_url(get_the_title($postID)) . '"><i class="icofont-pinterest"></i></a>';
                }
                if (in_array(6, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink($postID) . '"><i class="icofont-whatsapp"></i></a>';
                }
                if (in_array(7, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://digg.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-digg"></i></a>';
                }
                if (in_array(8, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink() . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-tumblr"></i></a>';
                }
                if (in_array(9, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-reddit"></i></a>';
                }
            endif;
        elseif (get_post_type(get_the_ID()) == 'post'):
            $blog_single_socials = get_theme_mod('blog_single_socials', array(1, 2, 3, 4));
            if (defined('FW')):
                $blog_si_is_content_enable = fw_get_db_post_option($postID, 'blog_si_is_content_enable', 2);
                if ($blog_si_is_content_enable == 1):
                    $blog_si_socials = fw_get_db_post_option(get_the_ID(), 'blog_si_socials', array());

                    if (!empty($blog_si_socials)):
                        $blog_single_socials = array();
                        foreach ($blog_si_socials as $key => $val):
                            $blog_single_socials[] = $key;
                        endforeach;
                    endif;
                endif;
                if (!empty($blog_single_socials) && $postID > 0):
                    if (in_array(1, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-facebook"></i></a>';
                    }
                    if (in_array(2, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink($postID) . '&text=' . esc_url(get_the_title($postID)) . '"><i class="icofont-twitter"></i></a>';
                    }
                    if (in_array(3, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="mailto:?subject=' . get_the_permalink($postID) . '"><i class="icofont-envelope"></i></a>';
                    }
                    if (in_array(4, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-linkedin"></i></a>';
                    }
                    if (in_array(5, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID($postID), 'full') . '&url=' . get_the_permalink($postID) . '&is_video=false&description=' . esc_url(get_the_title($postID)) . '"><i class="icofont-pinterest"></i></a>';
                    }
                    if (in_array(6, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink($postID) . '"><i class="icofont-whatsapp"></i></a>';
                    }
                    if (in_array(7, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://digg.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-digg"></i></a>';
                    }
                    if (in_array(8, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-tumblr"></i></a>';
                    }
                    if (in_array(9, $blog_single_socials)) {
                        $html .= '<a target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-reddit"></i></a>';
                    }
                endif;
            endif;
        endif;

        return $html;
    }
}

TW_Assistance::TW_instance();