<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-reviews.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

?>
<li class="clearfix">
    <?php do_action( 'woocommerce_widget_product_review_item_start', $args ); ?>
        <div class="product_widget_item">
            <div class="widproThumb">
                <img src="<?php echo organia_post_thumbnail($product->get_id(), 78, 64); ?>" alt="<?php echo get_the_title(); ?>"/>
            </div>
            <div class="widProContent">
                <div class="ratings">
                    <?php if ( $product->get_average_rating() > 0 ) : ?>
                        <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                        <span class="rating-count">(<?php echo organia_kses($product->get_review_count()); ?>)</span>
                    <?php else: ?>
                        <div class="star-rating"></div>
                        <span class="rating-count"><?php echo esc_html__('(0)', 'organia') ?></span>
                    <?php endif; ?>
                </div>
                <h3><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo substr(wp_strip_all_tags($product->get_name()), 0, 14); ?></a></h3>
                <div class="pi01Price clearfix">
                    <?php echo organia_kses($product->get_price_html()); ?>
                </div>
            </div>
        </div>
    <?php do_action( 'woocommerce_widget_product_review_item_end', $args ); ?>
</li>
