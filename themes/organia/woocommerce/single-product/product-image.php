<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$shop_pro_view_style = get_theme_mod('shop_pro_view_style', 1);
if(defined('FW')):
    $shop_pros_enable_settings = fw_get_db_post_option($product->get_id(), 'shop_pros_enable_settings', 2);
    if($shop_pros_enable_settings == 1):
        $shop_pros_view_style     = fw_get_db_post_option($product->get_id(), 'shop_pros_view_style', 1);
        
        $shop_pro_view_style      = ($shop_pros_view_style > 0 ? $shop_pros_view_style : $shop_pro_view_style);
    endif;
endif;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
$attachment_ids = $product->get_gallery_image_ids();
$gallery_status = (empty($attachment_ids) ? 1 : 2);
if(has_post_thumbnail() && empty($attachment_ids)):
    array_unshift($attachment_ids, $post_thumbnail_id);
endif;

if($shop_pro_view_style == 2):
?><div id="productCarousel_<?php echo get_the_ID(); ?>" class="productCarousel carousel slide carousel-fade" data-ride="carousel" data-interval="5000"><?php
    echo '<ol class="carousel-indicators">';
    $i = 0;
    foreach($attachment_ids as $attachment_id):
        if($attachment_id > 0):
            ?>
            <li data-target="#productCarousel_<?php echo get_the_ID(); ?>" data-slide-to="<?php echo esc_attr($i); ?>" class="<?php if($i == 0){ echo 'active'; } ?>">
                <img src="<?php echo organia_attachment_url($attachment_id, 'full') ?>" alt="<?php echo esc_attr__('Gallery Image', 'organia') ?>" />
            </li>
            <?php 
            $i++;
        endif;
    endforeach;
    echo '</ol>';
    echo '<div class="carousel-inner">';
    $z = 0;
    foreach($attachment_ids as $attachment_id):
        if($attachment_id > 0):
            ?>
            <div class="carousel-item <?php if($z == 0){ echo 'active'; } ?>">
                <div class="sp_img"><img src="<?php echo organia_attachment_url($attachment_id, 480, 350) ?>" alt="<?php echo esc_attr__('Gallery Image', 'organia') ?>" /></div>
            </div>
            <?php 
            $z ++;
        endif;
    endforeach;
    echo '</div>';
?></div><?php
elseif($shop_pro_view_style == 3):
    echo '<div class="productSlide02">';
    foreach($attachment_ids as $attachment_id):
        if($attachment_id > 0):
            ?>
            <div class="sp_img"> 
                <img src="<?php echo organia_attachment_url($attachment_id, 563, 393) ?>" alt="<?php echo esc_attr__('Gallery Image', 'organia') ?>" />
            </div>
            <?php 
        endif;
    endforeach;
    echo '</div>';
    echo '<ul class="indicator-slider02">';
    foreach($attachment_ids as $attachment_id):
        if($attachment_id > 0):
            ?>
            <li role="presentation"> 
                <div class="idItem">
                    <img src="<?php echo organia_attachment_url($attachment_id, 'full') ?>" alt="<?php echo esc_attr__('Gallery Image', 'organia') ?>" />
                </div>
            </li>
            <?php 
        endif;
    endforeach;
    echo '</ul>';
else:
    echo '<div class="productSlide">';
    foreach($attachment_ids as $attachment_id):
        if($attachment_id > 0):
            ?>
            <div class="sp_img"> 
                <img src="<?php echo organia_attachment_url($attachment_id, 563, 393) ?>" alt="<?php echo esc_attr__('Gallery Image', 'organia') ?>" />
            </div>
            <?php 
        endif;
    endforeach;
    echo '</div>';
    echo '<ul class="indicator-slider">';
    foreach($attachment_ids as $attachment_id):
        if($attachment_id > 0):
            ?>
            <li role="presentation"> 
                <div class="idItem">
                    <img src="<?php echo organia_attachment_url($attachment_id, 'full') ?>" alt="<?php echo esc_attr__('Gallery Image', 'organia') ?>" />
                </div>
            </li>
            <?php 
        endif;
    endforeach;
    echo '</ul>';
endif;
