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

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
$shop_sidebar = get_theme_mod('shop_sidebar', 1);
$shop_is_view_btn = get_theme_mod('shop_is_view_btn', 1);
$colmns = ($shop_sidebar == 1 || !is_active_sidebar('sidebar-3') ? 'col-lg-3 col-md-6' : 'col-lg-4 col-md-6');

$terms = get_the_terms(get_the_ID(), 'product_cat');
$cats = '';
if (is_array($terms) && count($terms) > 0) {
    $p = 1;
    $c = count($terms);
    foreach ($terms as $term) {
        $cats .= '<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
        $cats .= ($p == $c ? '' : ', ');
        $p++;
    }
}
?>
<div class="<?php echo esc_attr($colmns); ?>">
    <div class="product_item text-center">
        <div class="pi_thumb">
            <img src="<?php echo organia_post_thumbnail(get_the_ID(), 270, 314); ?>" alt="<?php echo get_the_title(); ?>">
            <div class="pi_01_actions">
                <?php if(function_exists('woocommerce_template_loop_add_to_cart')){ echo woocommerce_template_loop_add_to_cart();} ?>
                <?php if($shop_is_view_btn == 'yes'): ?>
                    <a href="<?php echo get_the_permalink(); ?>"><i class="icofont-eye"></i></a>
                <?php endif; ?>
            </div>
            <?php if(function_exists('organia_product_flash_notice_label')){ echo organia_product_flash_notice_label();} ?>
        </div>
        <div class="pi_content">
            <?php if(!empty($cats)): ?>
                <p><?php echo organia_kses($cats) ?></p>
            <?php endif; ?>
            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
            <div class="product_price clearfix">
                <?php if(function_exists('woocommerce_template_loop_price')){ echo woocommerce_template_loop_price(); } ?>
            </div>
        </div>
    </div>
</div>
