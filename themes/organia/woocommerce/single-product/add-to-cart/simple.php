<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

$product_is_compare = get_theme_mod('product_is_compare', 2);
$product_is_wishlist = get_theme_mod('product_is_wishlist', 2);
if (defined('FW')):
    $shop_pros_enable_settings = fw_get_db_post_option($product->get_id(), 'shop_pros_enable_settings', 2);
    if ($shop_pros_enable_settings == 1):
        $product_is_compare = fw_get_db_post_option($product->get_id(), 'shop_pros_is_compare', 2);
        $product_is_wishlist = fw_get_db_post_option($product->get_id(), 'shop_pros_is_wishlist', 2);
    endif;
endif;

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
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
            <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt organ_btn"><?php echo esc_html__('Add To Cart', 'organia'); ?></button>
            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
            
            <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $product_is_wishlist && is_product()): ?>
                <div class="wishlist">
                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                </div>
            <?php endif; ?>
            <?php if ($product_is_compare && is_product()): ?>
                <?php organia_compare_add_product_url(); ?>
            <?php endif; ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
