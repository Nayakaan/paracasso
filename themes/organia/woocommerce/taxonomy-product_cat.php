<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
$shop_cat_is_banner = get_theme_mod('shop_cat_is_banner', 1);
$category = get_queried_object();
$category_id = $category->term_id;
$shop_cats_show_top_blocks = 2;
$shop_cats_top_blocks = array();
if(defined('FW')):
    $shop_cats_is_settings = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_is_settings', 2);
    $shop_cats_is_banner = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_is_banner', 1);
    
    $shop_cats_show_top_blocks = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_show_top_blocks', 2);
    $shop_cats_top_blocks = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_top_blocks', array());
    
    $shop_cats_show_bottom_blocks = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_show_bottom_blocks', 2);
    $shop_cats_bottom_blocks = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_bottom_blocks', array());
    
    $shop_cat_is_banner = ($shop_cats_is_settings == 1 && $shop_cats_is_banner > 0 ? $shop_cats_is_banner : $shop_cat_is_banner);
endif;
if($shop_cat_is_banner == 1):
    get_template_part('template-parts/header/shop-cat', 'header');
endif;

/* Shop Top Blocks */
$blocks_id = array();
if($shop_cats_show_top_blocks == 1 && !empty($shop_cats_top_blocks)){
    foreach($shop_cats_top_blocks as $sb):
        if($sb['top_blocks'] != '' && $sb['top_blocks'] > 0):
            $blocks_id[] = $sb['top_blocks'];
        endif;
    endforeach;
    $bloks = array(
        'post_type'     => 'blocks',
        'post_status'   => 'publish',
        'orderby'       => 'post__in',
        'post__in'      => $blocks_id
    );
    $blok = new WP_Query($bloks);
    if($blok->have_posts()):
        while($blok->have_posts()):
        $blok->the_post();
        the_content();
        endwhile;
    endif;
    wp_reset_postdata();
}
/* Shop Top Blocks */

$shop_is_category_dropdown = get_theme_mod('shop_is_category_dropdown', true);
$shop_is_sort = get_theme_mod('shop_is_sort', true);
$shop_sort_label = get_theme_mod('shop_sort_label', esc_html__('Sort By:', 'organia'));
$shop_is_view_toggler = get_theme_mod('shop_is_view_toggler', TRUE);
$shop_default_view = get_theme_mod('shop_default_view', 1);
$shop_product_style = get_theme_mod('shop_product_style', 1);
$shop_sidebar = get_theme_mod('shop_sidebar', 1);
$shop_is_res_count = get_theme_mod('shop_is_res_count', false);
$shop_pagi_align = get_theme_mod('shop_pagi_align', 'center');

if(defined('FW')):
    $shop_cats_enable_con_settings = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_enable_con_settings', 2);
    if($shop_cats_enable_con_settings == 1):
        $shop_cats_is_category_dropdown = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_is_category_dropdown', 1);
        $shop_cats_is_sort = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_is_sort', 1);
        $shop_cats_sort_label = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_sort_label', esc_html__('Sort By:', 'organia'));
        $shop_cats_is_view_toggler = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_is_view_toggler', 1);
        $shop_cats_default_view = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_default_view', 1);
        $shop_cats_product_style = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_product_style', 1);
        $shop_cats_sidebar = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_sidebar', 1);
        $shop_cats_is_res_count = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_is_res_count', 2);
        $shop_cats_pagi_align = fw_get_db_term_option($category_id, 'product_cat', 'shop_cats_pagi_align', 'center');
        
        $shop_is_category_dropdown = ($shop_cats_is_category_dropdown > 0 ? ($shop_cats_is_category_dropdown == 1 ? TRUE : FALSE) : $shop_is_category_dropdown);
        $shop_is_sort = ($shop_cats_is_sort > 0 ? ($shop_cats_is_sort == 1 ? TRUE : FALSE) : $shop_is_sort);
        $shop_sort_label = ( !empty($shop_cats_sort_label) ? $shop_cats_sort_label : $shop_sort_label);
        $shop_is_view_toggler = ( $shop_cats_is_view_toggler > 0 ? ($shop_cats_is_view_toggler == 1 ? TRUE : FALSE ) : $shop_is_view_toggler);
        $shop_default_view = ( $shop_cats_default_view > 0 ? $shop_cats_default_view : $shop_default_view);
        $shop_product_style = ( $shop_cats_product_style > 0 ? $shop_cats_product_style : $shop_product_style);
        $shop_sidebar = ( $shop_cats_sidebar > 0 ? $shop_cats_sidebar : $shop_sidebar);
        $shop_is_res_count = ( $shop_cats_is_res_count > 0 ? ($shop_cats_is_res_count == 1 ? TRUE : FALSE) : $shop_is_res_count);
        $shop_pagi_align = ( !empty($shop_cats_pagi_align) ? $shop_cats_pagi_align : $shop_pagi_align);
    endif;
endif;

$colmns = ($shop_sidebar == 1 || !is_active_sidebar('sidebar-3') ? 'col-lg-12' : 'col-xl-9 col-lg-8');
$shop_class = ( $shop_sidebar == 1 || !is_active_sidebar('sidebar-3') ? '' :  'withSidebar');
?>
<section class="shopPage <?php echo esc_attr($shop_class); ?>">
    <div class="container largeContainer">
        <div class="row">
            <?php if(is_active_sidebar('sidebar-3') && $shop_sidebar == 2): ?>
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar lsb">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($colmns); ?>">
                <div class="row">
                    <div class="col-lg-12 wpc_all_notice_area">
                        <?php echo woocommerce_output_all_notices(); ?>
                    </div>
                </div>
                
                <?php if($shop_is_category_dropdown || $shop_is_sort || $shop_is_view_toggler): ?>
                <div class="row shop_sort_count_row">
                    <div class="col-md-12">
                        <div class="shopController">
                            <?php if($shop_is_category_dropdown == TRUE && function_exists('organia_shop_category_dropdown')): echo organia_shop_category_dropdown('product_cat'); else: echo ''; endif; ?>
                            <?php if($shop_is_sort && function_exists('woocommerce_catalog_ordering')): ?>
                                <?php echo woocommerce_catalog_ordering(); ?>
                            <?php endif; ?>
                            <?php if($shop_is_view_toggler): ?>
                            <ul class="nav producView" role="tablist">
                                <li role="presentation">
                                    <a class="<?php if($shop_default_view != 2) {echo 'active';}; ?>" data-toggle="tab" href="#grid" role="tab" aria-selected="<?php if($shop_default_view != 2): echo 'true'; else: echo 'false'; endif; ?>"><i class="icon-grid"></i></a>
                                </li>
                                <li role="presentation">
                                    <a class="<?php if($shop_default_view == 2) {echo 'active';}; ?>" data-toggle="tab" href="#list" role="tab" aria-selected="<?php if($shop_default_view == 2): echo 'true'; else: echo 'false'; endif; ?>"><i class="icon-list"></i></a>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($shop_is_view_toggler): ?> 
                    <div class="tab-content">
                        <div class="tab-pane fade <?php if($shop_default_view != 2) {echo 'show active';}; ?>" role="tabpanel" id="grid">
                            <div class="row productRow">
                                <?php if(woocommerce_product_loop()): ?>
                                    <?php
                                        woocommerce_product_loop_start();
                                            if(wc_get_loop_prop('total')):
                                                while(have_posts()):
                                                    the_post();
                                                    do_action( 'woocommerce_shop_loop' );
                                                    wc_get_template_part( 'content-'.$shop_product_style, 'product' );
                                                endwhile;
                                            endif;
                                        woocommerce_product_loop_end();
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade <?php if($shop_default_view == 2) {echo 'show active';}; ?>" role="tabpanel" id="list">
                            <div class="row productRow">
                                <?php if(woocommerce_product_loop()): ?>
                                    <?php
                                        woocommerce_product_loop_start();
                                            if(wc_get_loop_prop('total')):
                                                while(have_posts()):
                                                    the_post();
                                                    do_action( 'woocommerce_shop_loop' );
                                                    wc_get_template_part( 'content-6', 'product' );
                                                endwhile;
                                            endif;
                                        woocommerce_product_loop_end();
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row productRow">
                        <?php if(woocommerce_product_loop()): ?>
                            <?php
                                woocommerce_product_loop_start();
                                    if(wc_get_loop_prop('total')):
                                        while(have_posts()):
                                            the_post();
                                            do_action( 'woocommerce_shop_loop' );
                                            wc_get_template_part( 'content-'.$shop_product_style, 'product' );
                                        endwhile;
                                    endif;
                                woocommerce_product_loop_end();
                            ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="organ_pagination shop_pagination text-<?php echo esc_attr($shop_pagi_align); ?>">
                            <?php echo woocommerce_pagination(); ?>
                        </div>
                        <?php if($shop_is_res_count == 1 && function_exists('woocommerce_result_count')): ?>
                            <?php echo woocommerce_result_count(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if(is_active_sidebar('sidebar-3') && $shop_sidebar == 3): ?>
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
    $blocks_id = array();
    if($shop_cats_show_bottom_blocks == 1 && !empty($shop_cats_bottom_blocks)){
        foreach($shop_cats_bottom_blocks as $sb):
            if($sb['bottom_blocks'] != '' && $sb['bottom_blocks'] > 0):
                $blocks_id[] = $sb['bottom_blocks'];
            endif;
        endforeach;
        $bloks = array(
            'post_type'     => 'blocks',
            'post_status'   => 'publish',
            'orderby'       => 'post__in',
            'post__in'      => $blocks_id
        );
        $blok = new WP_Query($bloks);
        if($blok->have_posts()):
            while($blok->have_posts()):
            $blok->the_post();
            the_content();
            endwhile;
        endif;
        wp_reset_postdata();
    }
get_footer( 'shop' );
