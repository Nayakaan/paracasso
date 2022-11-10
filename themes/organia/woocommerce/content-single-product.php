<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

$shop_pro_gal_style = get_theme_mod('shop_pro_gal_style', 1);

$shop_pro_is_pricing_unit = get_theme_mod('shop_pro_is_pricing_unit', FALSE);
$shop_pro_is_sku = get_theme_mod('shop_pro_is_sku', 2);
$shop_pro_is_tags = get_theme_mod('shop_pro_is_tags', 1);
$shop_pro_is_cats = get_theme_mod('shop_pro_is_cats', 2);
$shop_pro_is_share = get_theme_mod('shop_pro_is_share', 2);
$product_is_compare = get_theme_mod('product_is_compare', 2);
$product_is_wishlist = get_theme_mod('product_is_wishlist', 2);
$shop_pro_socials = get_theme_mod('shop_pro_socials', array('1', '2', '3', '4'));

$shop_pro_is_related = get_theme_mod('shop_pro_is_related', 2);
$shop_pro_related_title = get_theme_mod('shop_pro_related_title', esc_html__('Related Products', 'organia'));

$shop_pro_is_upsell     = get_theme_mod('shop_pro_is_upsell', 1);
$shop_pro_upsell_title  = get_theme_mod('shop_pro_upsell_title', esc_html__('Upsell Products', 'organia'));

if (defined('FW')):
    $shop_pros_enable_settings = fw_get_db_post_option($post->ID, 'shop_pros_enable_settings', 2);
    if ($shop_pros_enable_settings == 1):
        $shop_pros_gal_style = fw_get_db_post_option($post->ID, 'shop_pros_gal_style', 1);

        $shop_pros_is_pricing_unit = fw_get_db_post_option($post->ID, 'shop_pros_is_pricing_unit', 2);
        $shop_pros_is_sku = fw_get_db_post_option($post->ID, 'shop_pros_is_sku', 2);
        $shop_pros_is_tags = fw_get_db_post_option($post->ID, 'shop_pros_is_tags', 1);
        $shop_pros_is_cats = fw_get_db_post_option($post->ID, 'shop_pros_is_cats', 2);

        $shop_pros_is_share = fw_get_db_post_option($post->ID, 'shop_pros_is_share', 2);
        $shop_pros_socials = fw_get_db_post_option($post->ID, 'shop_pros_socials', array());
        $shop_pros_socials_new = [];
        if(!empty($shop_pros_socials)):
            foreach($shop_pros_socials as $ke => $va):
                if($va == 1):
                    $shop_pros_socials_new[] = $ke;
                endif;
            endforeach;
        endif;

        $shop_pros_is_related = fw_get_db_post_option($post->ID, 'shop_pros_is_related', 2);
        $product_is_compare = fw_get_db_post_option($post->ID, 'shop_pros_is_compare', 2);
        $product_is_wishlist = fw_get_db_post_option($post->ID, 'shop_pros_is_wishlist', 2);
        $shop_pros_related_title = fw_get_db_post_option($post->ID, 'shop_pros_related_title', '');

        $shop_pros_is_upsell     = fw_get_db_post_option($post->ID, 'shop_pros_is_upsell', 2);
        $shop_pros_upsell_title  = fw_get_db_post_option($post->ID, 'shop_pros_upsell_title', '');

        $shop_pro_gal_style = ($shop_pros_gal_style > 0 ? $shop_pros_gal_style : $shop_pro_gal_style);

        $shop_pro_is_pricing_unit = ($shop_pros_is_pricing_unit > 0 ? ($shop_pros_is_pricing_unit == 1 ? TRUE : FALSE) : $shop_pro_is_pricing_unit);
        $shop_pro_is_sku = ($shop_pros_is_sku > 0 ? $shop_pros_is_sku : $shop_pro_is_sku);
        $shop_pro_is_tags = ($shop_pros_is_tags > 0 ? $shop_pros_is_tags : $shop_pro_is_tags);
        $shop_pro_is_cats = ($shop_pros_is_cats > 0 ? $shop_pros_is_cats : $shop_pro_is_cats);

        $shop_pro_is_share = ($shop_pros_is_share > 0 ? $shop_pros_is_share : $shop_pro_is_share);
        $shop_pro_socials = (!empty($shop_pros_socials_new) ? $shop_pros_socials_new : $shop_pro_socials);

        $shop_pro_is_related = ($shop_pros_is_related > 0 ? $shop_pros_is_related : $shop_pro_is_related);
        $shop_pro_related_title = (!empty($shop_pros_related_title) ? $shop_pros_related_title : $shop_pro_related_title);

        $shop_pro_is_upsell     = ($shop_pros_is_upsell > 0 ? $shop_pros_is_upsell : $shop_pro_is_upsell);
        $shop_pro_upsell_title  = (!empty($shop_pros_upsell_title) ? $shop_pros_upsell_title : $shop_pro_upsell_title);
    endif;
endif;

$cat_terms = wp_get_post_terms($post->ID, 'product_cat');
$tag_terms = wp_get_post_terms($post->ID, 'product_tag');

$_product_pricing_unit = get_post_meta($product->get_id(), '_product_pricing_unit', TRUE);

?>
<?php if (post_password_required()): ?>
    <div class="row">
        <div class="col-lg-12 productPassWords">
            <?php
            echo get_the_password_form();
            ?>
        </div>
    </div>
    <?php return; endif; ?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="row">
        <?php if ($shop_pro_gal_style == 1): ?>
            <div class="col-lg-6">
                <?php echo organia_product_flash_notice_label(); ?>
                <?php echo woocommerce_show_product_images(); ?>
            </div>
        <?php endif; ?>
        <div class="col-lg-6">
            <div class="product_details <?php if ($shop_pro_gal_style == 2): ?>pdRight<?php endif; ?>">
                <?php if ($product->managing_stock() > 0): ?>
                    <div class="stock"><?php echo esc_html__('Availability:', 'organia'); ?><?php echo wc_get_stock_html($product); ?></div>
                <?php endif; ?>
                <h3><?php echo get_the_title(); ?></h3>
                <?php echo woocommerce_template_single_rating(); ?>
                <div class="pi01Price clearfix">
                    <?php echo woocommerce_template_single_price(); ?>
                    <?php $p_unit = ($shop_pro_is_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">(' . esc_html($_product_pricing_unit) . ')</span>' : '');
                    echo organia_kses($p_unit); ?>
                </div>
                <div class="pd_excrpt">
                    <?php the_excerpt(); ?>
                </div>
                <div class="qty_weight clearfix">
                    <?php echo woocommerce_template_single_add_to_cart(); ?>
                </div>
                <?php if (!empty($tag_terms) || $shop_pro_is_share == 1 || $shop_pro_is_sku == 1 || $shop_pro_is_cats == 1): ?>
                    <div class="pro_meta clearfix">
                        <?php if ($product->get_sku() != '' && $shop_pro_is_sku == 1): ?>
                            <div class="mtItem">
                                <h5><?php echo esc_html__('Sku:', 'organia'); ?></h5><?php echo organia_kses($product->get_sku()); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($tag_terms) && $shop_pro_is_tags == 1): ?>
                            <div class="mtItem">
                                <h5><?php echo esc_html__('Tags:', 'organia'); ?></h5><?php echo wc_get_product_tag_list(get_the_ID(), ' , ') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($cat_terms) && $shop_pro_is_cats == 1): ?>
                            <div class="mtItem">
                                <h5><?php echo esc_html__('Cats:', 'organia'); ?></h5><?php echo wc_get_product_category_list(get_the_ID(), ' , ') ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($shop_pro_is_share == 1 && !empty($shop_pro_socials)): ?>
                            <div class="mtItem mtsocial clearfix">
                                <h5><?php echo esc_html__('Share:', 'organia'); ?></h5>
                                <?php
                                if (in_array(1, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="twi-facebook-f"></i></a>';
                                }
                                if (in_array(2, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink() . '&text=' . esc_url(get_the_title()) . '"><i class="twi-twitter"></i></a>';
                                }
                                if (in_array(3, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="mailto:?subject=' . get_the_permalink() . '"><i class="twi-envelope"></i></a>';
                                }
                                if (in_array(4, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="twi-linkedin-in"></i></a>';
                                }
                                if (in_array(5, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '&url=' . get_the_permalink() . '&is_video=false&description=' . esc_url(get_the_title()) . '"><i class="twi-pinterest-p"></i></a>';
                                }
                                if (in_array(6, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink() . '"><i class="twi-whatsapp"></i></a>';
                                }
                                if (in_array(7, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://digg.com/submit?url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="twi-digg"></i></a>';
                                }
                                if (in_array(8, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="twi-tumblr"></i></a>';
                                }
                                if (in_array(9, $shop_pro_socials)) {
                                    echo '<a target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="twi-reddit-alien"></i></a>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($shop_pro_gal_style == 2): ?>
            <div class="col-lg-6">
                <?php echo woocommerce_show_product_images(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php if (function_exists('woocommerce_output_product_data_tabs')): ?>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo woocommerce_output_product_data_tabs();
            ?>
        </div>
    </div>
<?php endif; ?>
<?php if ($shop_pro_is_upsell == 1): ?>
    <?php
    if (function_exists('woocommerce_upsell_display')):
        echo woocommerce_upsell_display();
    endif;
    ?>
<?php endif; ?>
<?php if ($shop_pro_is_related == 1): ?>
    <?php
    if (function_exists('woocommerce_output_related_products')):
        echo woocommerce_output_related_products();
    endif;
    ?>
<?php endif; ?>
