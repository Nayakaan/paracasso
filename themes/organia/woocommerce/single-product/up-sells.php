<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

$shop_pro_is_upsell     = get_theme_mod('shop_pro_is_upsell', 1);
$shop_pro_upsell_style  = get_theme_mod('shop_pro_upsell_style', 1);
$shop_pro_upsell_title  = get_theme_mod('shop_pro_upsell_title', esc_html__('Upsell Products', 'organia'));

$product_id = get_the_ID();
if (defined('FW')):
    $shop_pros_enable_settings = fw_get_db_post_option($product_id, 'shop_pros_enable_settings', 2);
    if ($shop_pros_enable_settings == 1):

        $shop_pros_is_upsell     = fw_get_db_post_option($product_id, 'shop_pros_is_upsell', 2);
        $shop_pros_upsell_style  = fw_get_db_post_option($product_id, 'shop_pros_upsell_style', 1);
        $shop_pros_upsell_title  = fw_get_db_post_option($product_id, 'shop_pros_upsell_title', '');

        $shop_pro_is_upsell     = ($shop_pros_is_upsell > 0 ? $shop_pros_is_upsell : $shop_pro_is_upsell);
        $shop_pro_upsell_style  = ($shop_pros_upsell_style > 0 ? $shop_pros_upsell_style : $shop_pro_upsell_style);
        $shop_pro_upsell_title  = (!empty($shop_pros_upsell_title) ? $shop_pros_upsell_title : $shop_pro_upsell_title);
    endif;
endif;

if ( $upsells ) : ?>

	<section class="up-sells upsells products upsellProduct">
		<?php if($shop_pro_upsell_title != ''): ?>
            <h2 class="secTitle text-center"><?php echo esc_html( $shop_pro_upsell_title ); ?></h2>
        <?php endif; ?>
    	<?php if($shop_pro_upsell_style == 2): ?>
        <div class="related_carousel02 owl-carousel">
			<?php foreach ( $upsells as $upsell ) : 
				$post_object = get_post( $upsell->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
				$terms = get_the_terms(get_the_ID(), 'product_cat');
				$cat_name = '';
				if (!empty($terms) && !is_wp_error($terms)) {
				    foreach ($terms as $term) {
				        $cat_name = '<a href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
				    }
				}
				if(defined('FW')){
                    $_secondary_image = fw_get_db_post_option(get_the_ID(), '_secondary_image', array());
                }
                $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));
				$_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
				?>
                <div <?php wc_product_class('organia_product_wrapper ', $product); ?>>
                    <div class="productItem04">
                        <div class="proThumb04">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), 397, 282); ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                        <div class="product_content04">
                            <?php echo(function_exists('organia_product_flash_notice_label') ? organia_product_flash_notice_label() : '') ?>
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            <div class="pi01Price">
                                <?php echo organia_kses($upsell->get_price_html()); ?>
                                <?php $p_unit = (!empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">(' . esc_html($_product_pricing_unit) . ')</span>' : ''); echo organia_kses($p_unit); ?>
                            </div>
                            <div class="ratings">
                                <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $upsell->get_review_count() > 0) : ?>
                                    <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                        <?php echo woocommerce_template_loop_rating(); ?>
                                        <span class="rating-count">(<?php echo organia_kses($upsell->get_review_count()); ?>)</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="star-rating"></div>
                                    <span class="rating-count">(0)</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="piActionBtns">
                            <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                            <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                            <?php if (shortcode_exists('yith_wcwl_add_to_wishlist')): ?>
                                <div class="wishlist">
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                </div>
                            <?php endif; ?>
                            <?php organia_compare_add_product_url(); ?>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="related_carousel owl-carousel">
				<?php foreach ( $upsells as $upsell ) : 
					$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					$terms = get_the_terms(get_the_ID(), 'product_cat');
					$cat_name = '';
					if (!empty($terms) && !is_wp_error($terms)) {
					    foreach ($terms as $term) {
					        $cat_name = '<a href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
					    }
					}
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
                                    <?php if ($upsell->get_review_count() > 0) : ?>
	                                    <?php if (function_exists('woocommerce_template_loop_rating')): ?>
	                                        <?php echo woocommerce_template_loop_rating(); ?>
	                                        <span class="rating-count">(<?php echo organia_kses($upsell->get_review_count()); ?>)</span>
	                                    <?php endif; ?>
	                                <?php else: ?>
	                                    <div class="star-rating"></div>
	                                    <span class="rating-count">(0)</span>
	                                <?php endif; ?>
                                </div>
                                <div class="pitem"><?php echo wp_kses_post($cat_name) ?></div>
                                <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                <div class="pi01Price">
                                    <?php echo organia_kses($upsell->get_price_html()); ?>
                                    <?php $p_unit = (!empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">(' . esc_html($_product_pricing_unit) . ')</span>' : ''); echo organia_kses($p_unit); ?>
                                </div>
                            </div>
                            <div class="piActionBtns">
                                <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                                <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                                <?php organia_compare_add_product_url(); ?>
                            </div>
                            <?php echo(function_exists('organia_product_flash_notice_label') ? organia_product_flash_notice_label() : '') ?>
                            <?php if (shortcode_exists('yith_wcwl_add_to_wishlist')): ?>
                                <div class="wishlist">
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
	                </div>
				<?php endforeach; ?>
			</div>
		<?php endif ?>
	</section>

	<?php
endif;

wp_reset_postdata();
