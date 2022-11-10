<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
$shop_sidebar = get_theme_mod('shop_sidebar', 1);
$shop_product_style = get_theme_mod('shop_product_style', 1);
$shop_col_per_row = get_theme_mod('shop_col_per_row', 4);
$shop_col_per_row_lg = get_theme_mod('shop_col_per_row_lg', 4);
$shop_is_empty_rating = get_theme_mod('shop_is_empty_rating', FALSE);
$shop_is_flashlabels = get_theme_mod('shop_is_flashlabels', FALSE);
$shop_is_wishlist = get_theme_mod('shop_is_wishlist', FALSE);
$shop_is_compare = get_theme_mod('shop_is_compare', FALSE);
$shop_is_quickview = get_theme_mod('shop_is_quickview', FALSE);
$shop_is_pricing_unit = get_theme_mod('shop_is_pricing_unit', FALSE);
$shop_thumb_width = get_theme_mod('shop_thumb_width', 0);
$shop_thumb_height = get_theme_mod('shop_thumb_height', 0);
$shop_list_thumb_width = get_theme_mod('shop_list_thumb_width', 0);
$shop_list_thumb_height = get_theme_mod('shop_list_thumb_height', 0);

if (is_tax('product_cat') && defined('FW')):
    $term = get_queried_object();
    $term_id = $term->term_id;
    $shop_cats_enable_con_settings = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_enable_con_settings', 2);
    if ($shop_cats_enable_con_settings == 1):
        $shop_cats_sidebar = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_sidebar', 1);
        $shop_cats_product_style = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_product_style', 1);
        $shop_cats_product_mode = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_product_mode', 1);
        $shop_cats_col_per_row = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_col_per_row', 4);
        $shop_cats_col_per_row_lg = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_col_per_row_lg', 4);
        $shop_cats_is_empty_rating = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_is_empty_rating', 2);
        $shop_cats_is_flashlabels = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_is_flashlabels', 2);
        $shop_cats_is_wishlist = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_is_wishlist', 2);
        $shop_cats_is_compare = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_is_compare', 2);
        $shop_cats_is_quickview = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_is_quickview', 2);
        $shop_cats_thumb_width = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_thumb_width', 0);
        $shop_cats_thumb_height = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_thumb_height', 0);
        $shop_cats_list_thumb_width = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_list_thumb_width', 0);
        $shop_cats_list_thumb_height = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_list_thumb_height', 0);

        $shop_sidebar = ($shop_cats_sidebar > 0 ? $shop_cats_sidebar : $shop_sidebar);
        $shop_product_style = ($shop_cats_product_style > 0 ? $shop_cats_product_style : $shop_product_style);
        $shop_product_mode = ($shop_cats_product_mode > 0 ? $shop_cats_product_mode : $shop_product_mode);
        $shop_col_per_row = ($shop_cats_col_per_row > 0 ? $shop_cats_col_per_row : $shop_col_per_row);
        $shop_col_per_row_lg = ($shop_cats_col_per_row_lg > 0 ? $shop_cats_col_per_row_lg : $shop_col_per_row_lg);
        $shop_is_empty_rating = ($shop_cats_is_empty_rating > 0 ? ($shop_cats_is_empty_rating == 1 ? TRUE : FALSE) : $shop_is_empty_rating);
        $shop_is_flashlabels = ($shop_cats_is_flashlabels > 0 ? ($shop_cats_is_flashlabels == 1 ? TRUE : FALSE) : $shop_is_flashlabels);
        $shop_is_wishlist = ($shop_cats_is_wishlist > 0 ? ($shop_cats_is_wishlist == 1 ? TRUE : FALSE) : $shop_is_wishlist);
        $shop_is_compare = ($shop_cats_is_compare > 0 ? ($shop_cats_is_compare == 1 ? TRUE : FALSE) : $shop_is_compare);
        $shop_is_quickview = ($shop_cats_is_quickview > 0 ? ($shop_cats_is_quickview == 1 ? TRUE : FALSE) : $shop_is_quickview);
        
        $shop_thumb_width = ($shop_cats_thumb_width > 0 ? $shop_cats_thumb_width : $shop_thumb_width);
        $shop_thumb_height = ($shop_cats_thumb_height > 0 ? $shop_cats_thumb_height : $shop_thumb_height);
        $shop_list_thumb_width = ($shop_cats_list_thumb_width > 0 ? $shop_cats_list_thumb_width : $shop_list_thumb_width);
        $shop_list_thumb_height = ($shop_cats_list_thumb_height > 0 ? $shop_cats_list_thumb_height : $shop_list_thumb_height);
    endif;
elseif (is_tax('product_tag') && defined('FW')):
    $term = get_queried_object();
    $term_id = $term->term_id;
    $shop_tags_enable_con_settings = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_enable_con_settings', 2);
    if ($shop_tags_enable_con_settings == 1):
        $shop_tags_sidebar = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_sidebar', 1);
        $shop_tags_product_style = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_product_style', 1);
        $shop_tags_product_mode = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_product_mode', 1);
        $shop_tags_col_per_row = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_col_per_row', 4);
        $shop_tags_col_per_row_lg = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_col_per_row_lg', 4);
        $shop_tags_is_empty_rating = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_is_empty_rating', 2);
        $shop_tags_is_flashlabels = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_is_flashlabels', 2);
        $shop_tags_is_wishlist = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_is_wishlist', 2);
        $shop_tags_is_compare = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_is_compare', 2);
        $shop_tags_is_quickview = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_is_quickview', 2);
        $shop_tags_thumb_width = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_thumb_width', 0);
        $shop_tags_thumb_height = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_thumb_height', 0);
        $shop_tags_list_thumb_width = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_list_thumb_width', 0);
        $shop_tags_list_thumb_height = fw_get_db_term_option($term_id, 'product_tag', 'shop_tags_list_thumb_height', 0);

        $shop_sidebar = ($shop_tags_sidebar > 0 ? $shop_tags_sidebar : $shop_sidebar);
        $shop_product_style = ($shop_tags_product_style > 0 ? $shop_tags_product_style : $shop_product_style);
        $shop_product_mode = ($shop_tags_product_mode > 0 ? $shop_tags_product_mode : $shop_product_mode);
        $shop_col_per_row = ($shop_tags_col_per_row > 0 ? $shop_tags_col_per_row : $shop_col_per_row);
        $shop_col_per_row_lg = ($shop_tags_col_per_row_lg > 0 ? $shop_tags_col_per_row_lg : $shop_col_per_row_lg);
        $shop_is_empty_rating = ($shop_tags_is_empty_rating > 0 ? ($shop_tags_is_empty_rating == 1 ? TRUE : FALSE) : $shop_is_empty_rating);
        $shop_is_flashlabels = ($shop_tags_is_flashlabels > 0 ? ($shop_tags_is_flashlabels == 1 ? TRUE : FALSE) : $shop_is_flashlabels);
        $shop_is_wishlist = ($shop_tags_is_wishlist > 0 ? ($shop_tags_is_wishlist == 1 ? TRUE : FALSE) : $shop_is_wishlist);
        $shop_is_compare = ($shop_tags_is_compare > 0 ? ($shop_tags_is_compare == 1 ? TRUE : FALSE) : $shop_is_compare);
        $shop_is_quickview = ($shop_tags_is_quickview > 0 ? ($shop_tags_is_quickview == 1 ? TRUE : FALSE) : $shop_is_quickview);
        
        $shop_thumb_width = ($shop_tags_thumb_width > 0 ? $shop_tags_thumb_width : $shop_thumb_width);
        $shop_thumb_height = ($shop_tags_thumb_height > 0 ? $shop_tags_thumb_height : $shop_thumb_height);
        $shop_list_thumb_width = ($shop_tags_list_thumb_width > 0 ? $shop_tags_list_thumb_width : $shop_list_thumb_width);
        $shop_list_thumb_height = ($shop_tags_list_thumb_height > 0 ? $shop_tags_list_thumb_height : $shop_list_thumb_height);
    endif;
endif;

$list_class = 'col-lg-6 col-md-12';
if ($shop_sidebar != 1 && is_active_sidebar('sidebar-3')) {
    $list_class = 'col-md-12';
}

$shop_product_mode = get_theme_mod('shop_product_mode', 1);
$productClass = ($shop_product_mode == 2 ? 'ptborder fullRounded' : 'ptborder groupRounded');

if(defined('FW')){
    $_secondary_image = fw_get_db_post_option(get_the_ID(), '_secondary_image', array());
}
$_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

$terms = get_the_terms(get_the_ID(), 'product_cat');
$cat_name = '';
if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        $cat_name = '<a href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
    }
}
$product_features = array();
if (defined('FW')):
    $product_features = fw_get_db_post_option(get_the_ID(), 'product_features', []);
endif;
$_product_pricing_unit = get_post_meta($product->get_id(), '_product_pricing_unit', TRUE);
$w = ($shop_list_thumb_width > 0 ? $shop_list_thumb_width : 282);
$h = ($shop_list_thumb_height > 0 ? $shop_list_thumb_height : 263);
?>
<div class="<?php echo esc_attr($list_class); ?>">
    <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
        <div class="productItemlist">
            <div class="listproThumb">
                <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                <?php echo(function_exists('organia_product_flash_notice_label') && $shop_is_flashlabels == 'yes' ? organia_product_flash_notice_label() : '') ?>
                <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $shop_is_wishlist == 'yes'): ?>
                    <div class="wishlist">
                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="list_pro_content">
                <div class="lptop">
                    <div class="pitem"><?php echo wp_kses_post($cat_name) ?></div>
                    <div class="ratings">
                        <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                            <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                <?php echo woocommerce_template_loop_rating(); ?>
                                <span class="rating-count">(<?php echo organia_kses($product->get_review_count()); ?>)</span>
                            <?php endif; ?>
                        <?php elseif ($shop_is_empty_rating == 'yes'): ?>
                            <div class="star-rating"></div>
                            <span class="rating-count"><?php echo esc_html__('(0)', 'organia') ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                <div class="pi01Price">
                    <?php echo organia_kses($product->get_price_html()); ?>
                    <?php $p_unit = ($shop_is_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">(' . esc_html($_product_pricing_unit) . ')</span>' : ''); echo organia_kses($p_unit); ?>
                </div>
                <?php if (!empty($product_features)): ?>
                    <ul>
                        <?php foreach ($product_features as $fear): ?>
                            <?php if (isset($fear['features']) && !empty($fear['features'])): ?>
                                <li><i class="twi-check-circle1"></i><?php echo organia_kses($fear['features']); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="listActionBtns <?php echo(empty($product_features) ? 'noFeaturesAvailable' : ''); ?>">
                    <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                    <?php if ($shop_is_quickview == 'yes'): ?>
                        <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                    <?php endif; ?>
                    <?php if ($shop_is_compare == 'yes'): ?>
                        <?php organia_compare_add_product_url(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
