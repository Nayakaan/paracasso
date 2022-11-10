<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

    <div class="product_tabarea woocommerce-tabs wc-tabs-wrapper">
        <ul class="nav nav-tabs productTabs" id="productTabs" role="tablist">
            <?php $pt = 1; foreach ( $product_tabs as $key => $product_tab ) : ?>
                <li class="nav-item" role="presentation">
                    <a class="<?php $ptc = ($pt == 1 ? 'active' : ''); echo esc_attr($ptc); ?>" id="<?php echo esc_attr( $key ); ?>-tab" data-toggle="tab" href="#tab-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
                        <?php echo organia_kses( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                    </a>
                </li>
            <?php $pt++; endforeach; ?>
        </ul>
        <div class="tab-content" id="pdt_content">
            <?php $pt = 1; foreach ( $product_tabs as $key => $product_tab ) : ?>
            <div class="tab-pane fade <?php $ptcs = ($pt == 1 ? 'show active' : ''); echo esc_attr($ptcs); ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab">
                <?php
                    if ( isset( $product_tab['callback'] ) ) {
                        call_user_func( $product_tab['callback'], $key, $product_tab );
                    }
                ?>
            </div>
            <?php $pt++; endforeach; ?>
        </div>
        <?php do_action( 'woocommerce_product_after_tabs' ); ?>
    </div>

<?php endif; ?>
