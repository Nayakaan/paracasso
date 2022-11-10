<?php

function organia_quick_view($id = 0)
{
    if (!$id || $id < 1 || empty($id) || $id == ''):
        return;
    endif;
    ?><a onclick="quickViewProduct(<?php echo esc_attr($id); ?>)" class="quickview" href="javascript:void(0)"><i class="icon-magnifying-glass"></i></a><?php
}

function organia_add_to_cart(){
    if (function_exists('woocommerce_template_loop_add_to_cart')) {
        echo woocommerce_template_loop_add_to_cart();
    }
}

add_action('wp_ajax_nopriv_organia_product_quick_view', 'organia_product_quick_view');
add_action('wp_ajax_organia_product_quick_view', 'organia_product_quick_view');
function organia_product_quick_view()
{
    check_ajax_referer('organia_security_check', 'organia_security');
    $productID = $_POST['productID'];
    $shop_pro_is_pricing_unit = get_theme_mod('shop_pro_is_pricing_unit', FALSE);
    $html = '';
    ob_start();
    $pro = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => array($productID)
    );
    $pros = new WP_Query($pro);
    if ($pros->have_posts()):
        while ($pros->have_posts()):
            $pros->the_post();
            $product = wc_get_product(get_the_ID());
            $cat_terms = wp_get_post_terms(get_the_ID(), 'product_cat');
            $tag_terms = wp_get_post_terms(get_the_ID(), 'product_tag');
            $_product_pricing_unit = get_post_meta($productID, '_product_pricing_unit', TRUE);
            ?>
            <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sp_img">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), 420, 393) ?>" alt="<?php echo get_the_title(); ?>"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="qickDetails">
                            <?php if($product->managing_stock()): ?>
                                <div class="stocks"><?php echo esc_html__('Availability:', 'organia'); ?><?php echo wc_get_stock_html($product); ?></div>
                            <?php else: ?>
                                <div class="stocks"><?php echo esc_html__('Availability:', 'organia'); ?><p class="stock in-stock"><?php echo esc_html__('In stock', 'organia') ?></p></div>
                            <?php endif; ?>
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                                <div class="quickRatings">
                                    <?php echo woocommerce_template_single_rating(); ?>
                                    <span class="rating-count">(<?php echo organia_kses($product->get_review_count()); ?>)</span>
                                </div>
                            <?php endif; ?>
                            <div class="pi01Price clearfix">
                                <?php echo woocommerce_template_single_price(); ?>
                                <?php $p_unit = ($shop_pro_is_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">(' . esc_html($_product_pricing_unit) . ')</span>' : '');
                                echo organia_kses($p_unit); ?>
                            </div>
                            <?php if (has_excerpt()): ?>
                                <div class="pd_excrpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                            <div class="qty_weight clearfix">
                                <?php if ($product->is_type('variable')) :?>
                                    <?php echo woocommerce_template_single_add_to_cart(); ?>
                                <?php else: ?>
                                    <?php echo woocommerce_template_single_add_to_cart(); ?>
                                <?php endif; ?>
                            </div>
                            
                            <div class="pro_meta clearfix">
                                <?php if ($product->get_sku() != ''): ?>
                                    <div class="mtItem02">
                                        <span><?php echo esc_html__('Sku:', 'organia'); ?></span><?php echo organia_kses($product->get_sku()); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($tag_terms)): ?>
                                    <div class="mtItem02">
                                        <span><?php echo esc_html__('Tags:', 'organia'); ?></span><?php echo wc_get_product_tag_list(get_the_ID(), ' , ') ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($cat_terms)): ?>
                                    <div class="mtItem02">
                                        <span><?php echo esc_html__('Cats:', 'organia'); ?></span><?php echo wc_get_product_category_list(get_the_ID(), ' , ') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    $html = ob_get_clean();
    echo json_encode(array('html' => $html));
    wp_die();
}


function organia_compare_add_product_url()
{
    if (!class_exists('YITH_Woocompare')) {
        return;
    }
    global $product, $yith_woocompare;
    $product_id = $product->get_id();

    $button_text = get_option('yith_woocompare_button_text', esc_html__('Add to Compare', 'organia'));

    echo apply_filters('organia_compare_add_product_url', sprintf(
        '<a href="%s" class="%s" data-product_id="%d">%s</a>',
        $yith_woocompare->obj->add_product_url($product_id),
        'organia-compare compare',
        $product_id,
        '<i class="icon-move"></i>'
    ));
}


add_filter('woocommerce_product_single_add_to_cart_text', 'organia_custom_single_add_to_cart_text');
function organia_custom_single_add_to_cart_text(){
    return organia_kses('Shop Now');
}


add_action('woocommerce_product_options_general_product_data', 'organia_add_field_to_general_tab');
function organia_add_field_to_general_tab()
{
    woocommerce_wp_text_input([
        'id' => '_product_pricing_unit',
        'label' => esc_html__('Pricing Unit', 'organia'),
    ]);
}

add_action('woocommerce_process_product_meta', 'organia_save_general_tab_data');
function organia_save_general_tab_data($productID)
{
    $product = wc_get_product($productID);
    $_product_pricing_unit = isset($_POST['_product_pricing_unit']) ? $_POST['_product_pricing_unit'] : '';
    $product->update_meta_data('_product_pricing_unit', sanitize_text_field($_product_pricing_unit));
    $product->save();
}


if (!function_exists('organia_update_wishlist_count')) {
    function organia_update_wishlist_count()
    {
        if (class_exists('YITH_WCWL')) {
            wp_send_json(YITH_WCWL()->count_products());
        }
    }

    add_action('wp_ajax_organia_update_wishlist_count', 'organia_update_wishlist_count');
    add_action('wp_ajax_nopriv_organia_update_wishlist_count', 'organia_update_wishlist_count');
}
add_action('wp_ajax_organia_search_product', 'organia_search_product');
add_action('wp_ajax_nopriv_organia_search_product', 'organia_search_product');

function organia_search_product()
{
    $search = $_REQUEST['s_keyword'];
    $cat_slug = isset($_REQUEST['cat_slug']) ? $_REQUEST['cat_slug'] : '';
    $post_per_page = 10;

    $query_args = [
        'order' => 'DESC',
        'orderby' => 'date',
        'post_status' => 'publish',
        'post_type' => array('product'),
        'posts_per_page' => 10,
    ];
    if (!empty($search)) {
        $query_args['s'] = sanitize_text_field($search);
    }
    if (!empty($cat_slug)) {
        $query_args['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($cat_slug),
                'operator' => 'IN',
                'include_children' => true
            )
        );
    }
    $product_visibility_term_ids = wc_get_product_visibility_term_ids();
    $query_args['tax_query'][] = array(
        'taxonomy' => 'product_visibility',
        'field' => 'term_taxonomy_id',
        'terms' => $product_visibility_term_ids['exclude-from-search'],
        'operator' => 'NOT IN',
    );

    $tw_post = new WP_Query($query_args);
    $products = array();
    while ($tw_post->have_posts()):
        $tw_post->the_post();
        $product = wc_get_product(get_the_ID());
        if (!empty($product)) {
            $products[] = array(
                'name' => get_the_title(get_the_ID()),
                'img' => organia_post_thumbnail(get_the_ID(), 397, 282),
                'permalink' => get_the_permalink(get_the_ID()),
                'price' => $product->get_price_html()
            );
        }
    endwhile;
    wp_reset_postdata();
    if (!empty($products)) {
        wp_send_json_success($products);
    } else {
        wp_send_json_error(esc_html__('No Product Found', 'organia'));
    }
}

