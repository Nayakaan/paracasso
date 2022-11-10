<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

if ( $related_products ) : ?>
<?php
    $shop_pro_related_style     = get_theme_mod('shop_pro_related_style', 1);
    $shop_pro_related_sub_title = get_theme_mod('shop_pro_related_sub_title', esc_html__('Nature Only', 'organia'));
    $shop_pro_related_title     = get_theme_mod('shop_pro_related_title', esc_html__('Related Products', 'organia'));

    $product_is_empty_rating    = get_theme_mod('product_is_empty_rating', 2);
    $product_is_flashlabels     = get_theme_mod('product_is_flashlabels', 2);
    $product_is_wishlist        = get_theme_mod('product_is_wishlist', 2);
    $product_is_compare         = get_theme_mod('product_is_compare', 2);
    $product_is_quickview       = get_theme_mod('product_is_quickview', 2);
    $product_is_pricing_unit    = get_theme_mod('product_is_pricing_unit', 2);

    $product_id = get_the_ID();
    if(defined('FW')):
    $shop_pros_enable_settings = fw_get_db_post_option($product_id, 'shop_pros_enable_settings', 2);
    if($shop_pros_enable_settings == 1):
        $shop_pros_related_sub_title = fw_get_db_post_option($product_id, 'shop_pros_related_sub_title', '');
        $shop_pros_related_title = fw_get_db_post_option($product_id, 'shop_pros_related_title', '');
        $shop_pros_related_style = fw_get_db_post_option($product_id, 'shop_pros_related_style', 1);

        $shop_pros_is_empty_rating = fw_get_db_post_option($product_id, 'shop_pros_is_empty_rating', 2);
        $shop_pros_is_flashlabels  = fw_get_db_post_option($product_id, 'shop_pros_is_flashlabels', 2);
        $shop_pros_is_wishlist     = fw_get_db_post_option($product_id, 'shop_pros_is_wishlist', 2);
        $shop_pros_is_compare      = fw_get_db_post_option($product_id, 'shop_pros_is_compare', 2);
        $shop_pros_is_quickview    = fw_get_db_post_option($product_id, 'shop_pros_is_quickview', 2);
        $shop_pros_is_priceunit    = fw_get_db_post_option($product_id, 'shop_pros_is_priceunit', 2);
        
        $shop_pro_related_title = (!empty($shop_pros_related_title) ? $shop_pros_related_title : $shop_pro_related_title);
        $shop_pro_related_sub_title = (!empty($shop_pros_related_sub_title) ? $shop_pros_related_sub_title : $shop_pro_related_sub_title);
        $shop_pro_related_style = ($shop_pros_related_style > 0 ? $shop_pros_related_style : $shop_pro_related_style);

        $product_is_empty_rating = ($shop_pros_is_empty_rating > 0 ? $shop_pros_is_empty_rating : $product_is_empty_rating);
        $product_is_flashlabels  = ($shop_pros_is_flashlabels > 0 ? $shop_pros_is_flashlabels : $product_is_flashlabels);
        $product_is_wishlist     = ($shop_pros_is_wishlist > 0 ? $shop_pros_is_wishlist : $product_is_wishlist);
        $product_is_compare      = ($shop_pros_is_compare > 0 ? $shop_pros_is_compare : $product_is_compare);
        $product_is_quickview    = ($shop_pros_is_quickview > 0 ? $shop_pros_is_quickview : $product_is_quickview);
        $product_is_pricing_unit = ($shop_pros_is_priceunit > 0 ? $shop_pros_is_priceunit : $product_is_pricing_unit);
    endif;
endif;

$terms = get_the_terms(get_the_ID(), 'product_cat');
$cat_name = '';
if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        $cat_name = '<a href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
    }
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="related_area">
            <?php if($shop_pro_related_sub_title != ''): ?>
                <div class="subTitle sbsm"><?php echo esc_html( $shop_pro_related_sub_title ); ?></div>
            <?php endif; ?>
            <?php if($shop_pro_related_title != ''): ?>
                <h2 class="secTitle"><?php echo esc_html( $shop_pro_related_title ); ?></h2>
            <?php endif; ?>
            <?php if($shop_pro_related_style == 2): ?>
            <div class="related_carousel02 owl-carousel">
                <?php foreach ( $related_products as $related_product ) :
                    $post_object = get_post( $related_product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    $_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
                ?>
                <div <?php wc_product_class('organia_product_wrapper ', $product); ?>>
                    <div class="productItem04">
                        <div class="proThumb04">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), 397, 282); ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                        <div class="product_content04">
                            <?php echo(function_exists('organia_product_flash_notice_label') && $product_is_flashlabels == 1 ? organia_product_flash_notice_label() : '') ?>
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            <div class="pi01Price">
                                <?php echo organia_kses($related_product->get_price_html()); ?>
                                <?php $p_unit = ($product_is_pricing_unit == 1 && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">(' . esc_html($_product_pricing_unit) . ')</span>' : ''); echo organia_kses($p_unit); ?>
                            </div>
                            <div class="ratings">
                                <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $related_product->get_review_count() > 0) : ?>
                                    <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                        <?php echo woocommerce_template_loop_rating(); ?>
                                        <span class="rating-count">(<?php echo organia_kses($related_product->get_review_count()); ?>)</span>
                                    <?php endif; ?>
                                <?php elseif ($product_is_empty_rating == 1): ?>
                                    <div class="star-rating"></div>
                                    <span class="rating-count">(0)</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="piActionBtns">
                            <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                            <?php if ($product_is_quickview == 1): ?>
                                <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                            <?php endif; ?>
                            <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $product_is_wishlist == 1): ?>
                                <div class="wishlist">
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($product_is_compare == 1): ?>
                                <?php organia_compare_add_product_url(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <div class="related_carousel owl-carousel">
                    <?php foreach ( $related_products as $related_product ) :
                        $post_object = get_post( $related_product->get_id() );
                        setup_postdata( $GLOBALS['post'] =& $post_object );
                        if(defined('FW')){
                            $_secondary_image = fw_get_db_post_option(get_the_ID(), '_secondary_image', array());
                        }
                        $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));
                        $_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
                    ?>
                    <div <?php wc_product_class('organia_product_wrapper ', $product); ?>>
                        <div class="productItem01">
                            <div class="proThumb">
                                <img src="<?php echo organia_post_thumbnail(get_the_ID(), 260, 250); ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <a class="hover" href="<?php echo get_the_permalink(); ?>">
                                <img src="<?php echo organia_attachment_url($_secondary_image_id, 280, 260); ?>" alt="<?php echo get_the_title(); ?>">
                            </a>
                            <div class="product_content">
                                <div class="ratings">
                                    <?php if (get_option('woocommerce_enable_review_rating') === 1 && $product->get_review_count() > 0) : ?>
                                        <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                            <?php echo woocommerce_template_loop_rating(); ?>
                                            <span class="rating-count">(<?php echo organia_kses($related_product->get_review_count()); ?>)</span>
                                        <?php endif; ?>
                                    <?php elseif ($product_is_empty_rating == 1): ?>
                                        <div class="star-rating"></div>
                                        <span class="rating-count"><?php echo esc_html__('(0)', 'organia') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="pitem"><?php echo wp_kses_post($cat_name) ?></div>
                                <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                <div class="pi01Price">
                                    <?php echo organia_kses($related_product->get_price_html()); ?>
                                    <?php $p_unit = ($product_is_pricing_unit == 1 && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">(' . esc_html($_product_pricing_unit) . ')</span>' : ''); echo organia_kses($p_unit); ?>
                                </div>
                            </div>
                            <div class="piActionBtns">
                                <?php if ($product_is_quickview == 1): ?>
                                    <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                                <?php endif; ?>
                                <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                                <?php if ($product_is_compare == 1): ?>
                                    <?php organia_compare_add_product_url(); ?>
                                <?php endif; ?>
                            </div>
                            <?php echo(function_exists('organia_product_flash_notice_label') && $product_is_flashlabels == 1 ? organia_product_flash_notice_label() : '') ?>
                            <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $product_is_wishlist == 1): ?>
                                <div class="wishlist">
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<?php
endif;
wp_reset_postdata();
