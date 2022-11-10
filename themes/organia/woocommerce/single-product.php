<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
global $post;
organia_post_view_count($post->ID);

$shop_pro_is_banner  = get_theme_mod('shop_pro_is_banner', 1);
$shop_pro_view_style = get_theme_mod('shop_pro_view_style', 1);
$shop_pro_is_related = get_theme_mod('shop_pro_is_related', 2);

$shop_pro_is_upsell     = get_theme_mod('shop_pro_is_upsell', 1);
$shop_pro_upsell_title  = get_theme_mod('shop_pro_upsell_title', esc_html__('Upsell Products', 'organia'));

if(defined('FW')):
    $shop_pros_is_settings      = fw_get_db_post_option(get_the_ID(), 'shop_pros_is_settings', 2);
    $shop_pros_enable_settings  = fw_get_db_post_option(get_the_ID(), 'shop_pros_enable_settings', 2);
    $shop_pros_is_banner        = fw_get_db_post_option(get_the_ID(), 'shop_pros_is_banner', 1);
    $shop_pros_view_style       = fw_get_db_post_option(get_the_ID(), 'shop_pros_view_style', 1);
    $shop_pros_is_related       = fw_get_db_post_option(get_the_ID(), 'shop_pros_is_related', 2);

    $shop_pros_is_upsell     = fw_get_db_post_option(get_the_ID(), 'shop_pros_is_upsell', 2);
    $shop_pros_upsell_title  = fw_get_db_post_option(get_the_ID(), 'shop_pros_upsell_title', '');

    $shop_pro_is_banner         = ($shop_pros_is_settings == 1 && $shop_pros_is_banner > 0 ? $shop_pros_is_banner : $shop_pro_is_banner);
    $shop_pro_view_style        = ($shop_pros_enable_settings == 1 && $shop_pros_view_style > 0 ? $shop_pros_view_style : $shop_pro_view_style);

    $shop_pro_is_related        = ($shop_pros_enable_settings == 1 && $shop_pros_is_related > 0 ? $shop_pros_is_related : $shop_pro_is_related);

    $shop_pro_is_upsell     = ($shop_pros_enable_settings == 1 && $shop_pros_is_upsell > 0 ? $shop_pros_is_upsell : $shop_pro_is_upsell);
    $shop_pro_upsell_title  = ($shop_pros_enable_settings == 1 && !empty($shop_pros_upsell_title) ? $shop_pros_upsell_title : $shop_pro_upsell_title);
endif;
if($shop_pro_is_banner == 1):
    get_template_part('template-parts/header/shop-product', 'header');
endif;

?>
<?php if($shop_pro_view_style == 2): ?>
<section class="singleProduct02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12 wp_all_notice_area">
                <?php echo wc_print_notices(); ?>
            </div>
        </div>
        <?php 
            while ( have_posts() ) :
                the_post();
                wc_get_template_part( 'content', 'single-product-2' );
            endwhile;
        ?>
    </div>
</section>
<section class="spmiddleSection">
    <div class="container">
        <?php if(function_exists('woocommerce_output_product_data_tabs')): ?>
        <div class="row">
            <div class="col-lg-12">
                <?php 
                    echo woocommerce_output_product_data_tabs(); 
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php if ($shop_pro_is_upsell == 1): ?>
        <div class="container largeContainer">
            <?php
            if (function_exists('woocommerce_upsell_display')):
                echo woocommerce_upsell_display();
            endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if($shop_pro_is_related == 1): ?>
        <div class="container largeContainer">
            <?php
                if(function_exists('woocommerce_output_related_products')):
                    echo woocommerce_output_related_products();
                endif;
            ?>
        </div>
    <?php endif; ?>
</section>
<?php elseif($shop_pro_view_style == 3): ?>
<section class="singleProduct03">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12 wp_all_notice_area">
                <?php echo wc_print_notices(); ?>
            </div>
        </div>
        <?php 
            while ( have_posts() ) :
                the_post();
                wc_get_template_part( 'content', 'single-product-3' );
            endwhile;
        ?>
    </div>
</section>    
<?php else: ?>
<section class="singleProduct">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12 wp_all_notice_area">
                <?php echo wc_print_notices(); ?>
            </div>
        </div>
        <?php 
            while ( have_posts() ) :
                the_post();
                wc_get_template_part( 'content', 'single-product' );
            endwhile;
        ?>
    </div>
</section>
<?php endif; ?>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
