<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product_is_compare = get_theme_mod('product_is_compare', 2);
$product_is_wishlist = get_theme_mod('product_is_wishlist', 2);
if (defined('FW')):
    $shop_pros_enable_settings = fw_get_db_post_option($product->get_id(), 'shop_pros_enable_settings', 2);
    if ($shop_pros_enable_settings == 1):
        $product_is_compare = fw_get_db_post_option($product->get_id(), 'shop_pros_is_compare', 2);
        $product_is_wishlist = fw_get_db_post_option($product->get_id(), 'shop_pros_is_wishlist', 2);
    endif;
endif;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

        <button type="submit" class="single_add_to_cart_button button alt organ_btn"><i class="icon-Add-to-cart-icon"></i><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
        
        <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $product_is_wishlist && is_product()): ?>
            <div class="wishlist">
                <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
            </div>
        <?php endif; ?>
        <?php if ($product_is_compare && is_product()): ?>
            <?php organia_compare_add_product_url(); ?>
        <?php endif; ?>
</div>
