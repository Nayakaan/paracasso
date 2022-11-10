<?php
/* 
 * ThemeWar Hooks Class
 */

class Organia_Hooks_Class
{

    public static $_instance;

    public function __construct()
    {
        $this->organia_init();
    }

    /* * ---------------------------------------------------------------
    * Init all hooks and others
    * -------------------------------------------------------------* */

    public function organia_init()
    {
        add_action('after_setup_theme', array($this, 'organia_theme_setup'));
        add_action('widgets_init', array($this, 'organia_widgets_init'));

        add_action('wp_enqueue_scripts', array($this, 'organia_enqueue_style'));
        add_action('wp_enqueue_scripts', array($this, 'organia_enqueue_script'));
        add_action('admin_enqueue_scripts', array($this, 'organia_enqueue_style_for_admin'));

        add_action('tgmpa_register', array($this, 'organia_plugin_activation_notive'));
        add_action('admin_menu', array($this, 'organia_remove_theme_settings'), 999);
        add_action('wp_enqueue_scripts', array($this, 'organia_dequeue_dashicon'));

        add_action('wp_ajax_nopriv_post_like', array($this, 'organia_ajax_post_like'));
        add_action('wp_ajax_post_like', array($this, 'organia_ajax_post_like'));

        add_filter('fw:option_type:icon-v2:packs', array($this, 'organia_icon_pack'));

        add_action('admin_init', array($this, 'organia_hide_front_page_editor'));

        add_filter('comment_form_fields', array($this, 'organia_rearrange_comment_form'));

        add_filter('loop_shop_per_page', array($this, 'organia_loop_shop_per_page'), 20);
        add_filter('woocommerce_checkout_fields', array($this, 'organia_custom_wc_checkout_fields'));

        add_filter('woocommerce_add_to_cart_fragments', array($this, 'organia_cart_button_item_count'));

        add_filter('body_class', array($this, 'organia_body_classes'));
        add_filter('fw:ext:backups-demo:demos', array($this, 'organia_live_demos'));
    }

    public function organia_body_classes($classes)
    {
        $header_style = get_theme_mod('header_style', 1);
        $classes[] = 'active_header_' . $header_style;
        /*if ( ! is_front_page() && ! is_home()) {
            $classes[] = 'innerPage';
        }*/
        return $classes;
    }

    public function organia_icon_pack($default_packs)
    {
        return array(
            'organia_flaticon' => array(
                'name' => 'organia_flaticon',
                'title' => esc_html__('Flaticon for Organia', 'organia'),
                'css_class_prefix' => '',
                'css_file' => ORGANIA_ASSETS_CSS_DIR . '/organia-icon.css',
                'css_file_uri' => ORGANIA_ASSETS_CSS_URL . '/organia-icon.css'
            ),
            'organia_fontawsome' => array(
                'name' => 'organia_fontawsome',
                'title' => esc_html__('Fontawsome for Organia', 'organia'),
                'css_class_prefix' => '',
                'css_file' => ORGANIA_ASSETS_CSS_DIR . '/fontawsome.css',
                'css_file_uri' => ORGANIA_ASSETS_CSS_URL . '/fontawsome.css'
            ),
        );
    }

    /* * ---------------------------------------------------------------
    * Theme Setup
    * -------------------------------------------------------------* */

    public function organia_theme_setup(){
        load_theme_textdomain('organia', get_template_directory() . '/languages');
        $GLOBALS['content_width'] = 1170;

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(755, 420, true);
        if (!defined('FW')) {
            add_image_size('organia-thumbnails', 260, 254,true);
            add_image_size('organia-single-thumbnails', 563, 393,true);
        }

        add_theme_support('title-tag');

        register_nav_menu('primary-menu', esc_html__('Primary Menu', 'organia'));
        register_nav_menu('mobile-menu', esc_html__('Mobile Menu', 'organia'));

        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'script', 'style'));
        add_theme_support('post-formats', array('audio', 'video', 'gallery'));

        add_theme_support('woocommerce');
    }

    /* * ---------------------------------------------------------------
    * Widget Init
    * -------------------------------------------------------------* */
    public function organia_widgets_init()
    {

        organia_register_sidebars(
            array(
                'sidebar-1' => array(
                    'name' => esc_html__('Blog Sidebar', 'organia'),
                    'description' => esc_html__('Blog sidebar, Only for blog pages.', 'organia')
                ),
                'sidebar-2' => array(
                    'name' => esc_html__('Page Sidebar', 'organia'),
                    'description' => esc_html__('Page sidebar, Only for pages.', 'organia')
                ),
                'sidebar-3' => array(
                    'name' => esc_html__('Shop Sidebar', 'organia'),
                    'description' => esc_html__('Shop Sidebar, Only For Shop Related Pages.', 'organia')
                ),
            ),

            array(
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => "</aside>",
                'before_title' => '<h3 class="widget_title">',
                'after_title' => '</h3>',
            ));

    }

    /* * ---------------------------------------------------------------
    * CSS Enqueue
    * -------------------------------------------------------------* */
    public function organia_enqueue_style()
    {
        wp_enqueue_style('organia-google-fonts', organia_google_fonts_url());
        wp_enqueue_style('organia-style', get_stylesheet_uri());

        wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
        if (defined('FW')):
            fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();
        else:
            wp_enqueue_style('organia-icon', get_template_directory_uri().'/assets/css/organia-icon.css');
            wp_enqueue_style('fontawsome', get_template_directory_uri().'/assets/css/fontawsome.css');
        endif;

        wp_enqueue_style('owl-theme-default', get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
        wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
        wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
        wp_enqueue_style('nice-select', get_template_directory_uri().'/assets/css/nice-select.css');
        wp_enqueue_style('slick', get_template_directory_uri().'/assets/css/slick.css');
        wp_enqueue_style('lightcase', get_template_directory_uri().'/assets/css/lightcase.css');
        wp_enqueue_style('organia-preset', get_template_directory_uri().'/assets/css/preset.css');
        wp_enqueue_style('organia-theme', get_template_directory_uri().'/assets/css/theme.css');
        wp_enqueue_style('organia-responsive', get_template_directory_uri().'/assets/css/responsive.css');
        wp_enqueue_style('organia-preloader', get_template_directory_uri().'/assets/css/preloader.css');
    }

    public function organia_enqueue_style_for_admin()
    {
        wp_enqueue_style('organia-admin-styles', get_template_directory_uri().'/assets/css/themewar-admin-style.css');
    }

    /* * -----------------------------------------------------------
    * JS Enqueue
    * -------------------------------------------------------------* */
    public function organia_enqueue_script()
    {
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('masonry');
        if (class_exists('woocommerce')) {
            wp_enqueue_script('wc-add-to-cart-variation');
        }
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '', TRUE);
        wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('bootstrap'), '', TRUE);
        wp_enqueue_script('owl-carousel-filter', get_template_directory_uri().'/assets/js/owl.carousel.filter.js', array('owl-carousel'), '', TRUE);
        wp_enqueue_script('jquery-appear', get_template_directory_uri().'/assets/js/jquery.appear.js', array('owl-carousel-filter'), '', TRUE);
        wp_enqueue_script('shuffle', get_template_directory_uri().'/assets/js/shuffle.min.js', array('jquery-appear'), '', TRUE);
        wp_enqueue_script('jquery-plugin', get_template_directory_uri().'/assets/js/jquery.plugin.min.js', array('shuffle'), '', TRUE);
        wp_enqueue_script('jquery-countdown', get_template_directory_uri().'/assets/js/jquery.countdown.min.js', array('jquery-plugin'), '', TRUE);
        wp_enqueue_script('nice-select', get_template_directory_uri().'/assets/js/nice-select.js', array('jquery-countdown'), '', TRUE);
        wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.js', array('nice-select'), '', TRUE);
        wp_enqueue_script('lightcase', get_template_directory_uri().'/assets/js/lightcase.js', array('slick'), '', TRUE);
        wp_enqueue_script('organia-theme', get_template_directory_uri().'/assets/js/theme.js', array('lightcase'), '', TRUE);
        $params = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('organia_security_check'),
        );
        wp_localize_script('organia-theme', 'organia_object', $params);
    }

    public function organia_remove_theme_settings()
    {
        remove_submenu_page('themes.php', 'fw-settings');
    }

    function organia_dequeue_dashicon()
    {
        if (current_user_can('update_core')) {
            return;
        }
        wp_deregister_style('dashicons');
    }

    /* * ---------------------------------------------------------------
    * TGMPA Activator
    * -------------------------------------------------------------* */

    public function organia_plugin_activation_notive()
    {
        $plugins = array(
            array(
                'name' => esc_html__('Unyson', 'organia'),
                'slug' => 'unyson',
                'required' => true,
            ),
            array(
                'name' => esc_html__('Elementor', 'organia'),
                'slug' => 'elementor',
                'required' => true,
            ),
            array(
                'name' => esc_html__('Kirki', 'organia'),
                'slug' => 'kirki',
                'required' => true,
            ),
            array(
                'name' => esc_html__('Organia Assistance', 'organia'),
                'slug' => 'organia-assistance',
                'required' => true,
                'source' => 'http://themewar.com/plugins/organia-assistance.zip',
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => esc_html__('Revolution Slider', 'organia'),
                'slug' => 'revslider',
                'required' => true,
                'source' => 'http://themewar.com/plugins/revslider.zip',
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => esc_html__('Contact Form 7', 'organia'),
                'slug' => 'contact-form-7',
                'required' => TRUE,
            ),
            array(
                'name' => esc_html__('Easy Mailchimp', 'organia'),
                'slug' => 'yikes-inc-easy-mailchimp-extender',
                'required' => false,
            ),
            array(
                'name' => esc_html__('WooCommerce', 'organia'),
                'slug' => 'woocommerce',
                'required' => false,
            ),
            array(
                'name' => esc_html__('YITH WooCommerce Wishlist', 'organia'),
                'slug' => 'yith-woocommerce-wishlist',
                'required' => false,
            ),
            array(
                'name' => esc_html__('YITH WooCommerce Compare', 'organia'),
                'slug' => 'yith-woocommerce-compare',
                'required' => false,
            ),
            array(
                'name' => esc_html__('Max Mega Menu', 'organia'),
                'slug' => 'megamenu',
                'required' => false,
            ),
        );

        $config = array(
            'id' => 'organia',
            'default_path' => '',
            'menu' => 'tgmpa-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => '',
        );

        tgmpa($plugins, $config);
    }

    /* * ---------------------------------------------------------------
    * Post Like Submit
    * -------------------------------------------------------------* */
    public function organia_ajax_post_like()
    {
        $pid = $_POST['pid'];
        $like = get_post_meta($pid, '_organia_post_like', true);
        $like = (empty($like)) ? 0 : $like;
        $like++;
        update_post_meta($pid, '_organia_post_like', $like);
        echo organia_kses($like);
        wp_die();
    }

    /* * ---------------------------------------------------------------
    * Create Instance
    * -------------------------------------------------------------* */
    public static function organia_instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Organia_Hooks_Class();
        }
        return self::$_instance;

    }

    /* * ---------------------------------------------------------------
    * Hide Front Page Editor
    * -------------------------------------------------------------* */
    function organia_hide_front_page_editor()
    {
        $post_id = (isset($_GET['post'])) ? $_GET['post'] : '';
        if ($post_id < 1) return;

        $template_file = get_post_meta($post_id, '_wp_page_template', true);

        if ($template_file == 'page-templates/front-page.php') {
            remove_post_type_support('page', 'editor');
        }
    }

    /* * ---------------------------------------------------------------
    * Re Arange Comment Form
    * -------------------------------------------------------------* */
    function organia_rearrange_comment_form($fields)
    {
        global $post;
        $postID = (isset($post->ID) && $post->ID > 0 ? $post->ID : 0);
        $post_type = get_post_type($postID);
        if ($post_type && $post_type != 'product'):
            $comment_field = $fields['comment'];
            unset($fields['comment']);
            $fields['comment'] = $comment_field;
            return $fields;
        else:
            return $fields;
        endif;
    }

    public function organia_loop_shop_per_page($cols)
    {
        $shop_numof_product = get_theme_mod('shop_numof_product', 12);
        $cols = $shop_numof_product;
        return $cols;
    }

    function organia_custom_wc_checkout_fields($fields)
    {
        foreach ($fields as $category => $value) {
            foreach ($fields[$category] as $field => $property) {
                $fields[$category][$field]['label'] = '';
                $placeholder = (isset($property['placeholder']) && $property['placeholder'] != '' ? $property['placeholder'] : $property['label']);
                $placeholder .= (isset($property['required']) && $property['required'] == 1 ? ' *' : '');
                $fields[$category][$field]['placeholder'] = $placeholder;
            }
        }

        return $fields;
    }

    public function organia_cart_button_item_count($fragments)
    {
        global $woocommerce;
        ob_start();
        ?>
        <a class="cartBtn organia_aj_cart" href="javascript:void(0);"><i class="twi-shopping-bag1"></i><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'organia'), $woocommerce->cart->cart_contents_count); ?></span>
        <?php
        $fragments['a.organia_aj_cart'] = ob_get_clean();
        return $fragments;
    }

    public function organia_live_demos($demos)
    {
        $demos_array = array(
            'organia-live-demo' => array(
                'title' => esc_html__('Organia Live Img Dummy', 'organia'),
                'screenshot' => get_template_directory_uri() . '/screenshot.png',
                'preview_link' => 'http://themewar.com/wp/organia',
            ),
        );

        $download_url = 'http://themewar.com/wp/organia_dummy_data/';

        foreach ($demos_array as $id => $data) {
            $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
                'url' => $download_url,
                'file_id' => $id,
            ));
            $demo->set_title($data['title']);
            $demo->set_screenshot($data['screenshot']);
            $demo->set_preview_link($data['preview_link']);

            $demos[$demo->get_id()] = $demo;

            unset($demo);
        }

        return $demos;
    }

}

$organia_instance = Organia_Hooks_Class::organia_instance();