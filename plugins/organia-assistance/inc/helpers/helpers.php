<?php
if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}

/**
 * Class Tw_Assistance_Helpers
 */
class Tw_Assistance_Helpers
{
    /* * ---------------------------------------------------------------
    * Formate Product Title
    * -------------------------------------------------------------* */
    /**
     * Tw_Assistance_Helpers constructor.
     */
    public function __construct()
    {
        add_action('wp_ajax_tw_get_taxonomy', array($this, 'tw_get_taxonomy'));
        add_action('wp_ajax_nopriv_tw_get_taxonomy', array($this, 'tw_get_taxonomy'));

        add_action('wp_ajax_tw_get_post', array($this, 'tw_get_post'));
        add_action('wp_ajax_nopriv_tw_get_post', array($this, 'tw_get_post'));
    }

    /**
     * @param $main_title
     * @return string
     */
    public static function kta_formate_product_title($main_title)
    {
        $titles = explode(' ', wp_kses($main_title, array()));
        $title = '';
        if (count($titles) > 1):
            $i = 1;
            foreach ($titles as $t):
                if ($i == 2):
                    $title .= '<span>' . $t . ' ';
                elseif ($i == count($titles)):
                    $title .= $t . ' </span>';
                else:
                    $title .= $t . ' ';
                endif;
                $i++;
            endforeach;
        else:
            $title = get_the_title();
        endif;

        return $title;
    }


    /**
     * @param string $fonts
     * @return string|void
     */
    public static function keta_generate_gf_urls($fonts = '')
    {
        if ($fonts == '') {
            return;
        }
        return '@import url(http://fonts.googleapis.com/css?family=' . $fonts . ':400,100,100italic,300,300italic,400italic,700,700italic,900,900italic); ' . "\n";
    }

    /**
     * Get taxonomy
     */
    public function tw_get_taxonomy()
    {
        $args = array(
            'orderby' => 'name',
            'order' => 'DESC',
            'hide_empty' => true,
        );
        if (isset($_POST['taxonomy'])) {
            $args['taxonomy'] = $_POST['taxonomy'];
        }

        if (isset($_POST['s'])) {
            $args['search'] = $_POST['s'];
        }

        if (isset($_POST['id'])) {
            $args['include'] = $_POST['id'];
        }

        $terms = get_terms($args);
        $options = [];
        if (is_array($terms) && !empty($terms)):
            foreach ($terms as $term) {
                $options[] = ['id' => $term->term_id, 'text' => $term->name];
            }
        endif;
        wp_send_json($options);
    }

    /**
     * Get Post
     */
    public function tw_get_post()
    {
        global $wpdb;
        $post_type = isset($_POST['post_type']) ? $_POST['post_type'] : 'post';
        $sql = $wpdb->prepare(
            "SELECT {$wpdb->prefix}posts.post_title,{$wpdb->prefix}posts.ID FROM {$wpdb->prefix}posts
            WHERE 1=1 
            AND {$wpdb->prefix}posts.post_type = %s
            AND {$wpdb->prefix}posts.post_status = 'publish'
            AND {$wpdb->prefix}posts.post_title LIKE %s
            ORDER BY {$wpdb->prefix}posts.post_date DESC",
            $post_type, '%' . sanitize_text_field($_POST['s']) . '%'
        );
        if (isset($_POST['id'])) {
            $id = "'" . implode("','", $_POST['id']) . "'";
            $sql = $wpdb->prepare(
                "SELECT {$wpdb->prefix}posts.post_title,{$wpdb->prefix}posts.ID FROM {$wpdb->prefix}posts
            WHERE {$wpdb->prefix}posts.ID IN ({$id})
            AND {$wpdb->prefix}posts.post_type = %s
            AND {$wpdb->prefix}posts.post_status = 'publish'
            ORDER BY {$wpdb->prefix}posts.post_date DESC",
                $post_type
            );
        }
        $results = $wpdb->get_results($sql);
        $options = [];
        foreach ($results as $result) {
            $options[] = ['id' => $result->ID, 'text' => $result->post_title];
        }
        wp_send_json($options);
    }

    public static function mini_cart_count()
    {
        if (class_exists('woocommerce')) {
            if (!empty(WC()->cart)) {
                $count = WC()->cart->cart_contents_count;
                return $count;
            } else {
                $count = 0;
                return $count;
            }
        }
    }
}
