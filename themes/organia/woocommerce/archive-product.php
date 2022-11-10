<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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

defined('ABSPATH') || exit;

get_header('shop');
if (is_search()):
    $shop_srcs_is_banner = get_theme_mod('shop_srcs_is_banner', 1);
    if ($shop_srcs_is_banner == 1):
        get_template_part('template-parts/header/shop-search', 'header');
    endif;
else:
    $shop_is_banner = get_theme_mod('shop_is_banner', 1);
    $shop_page_ID = get_option('woocommerce_shop_page_id', true);
    if (defined('FW') && $shop_page_ID > 0):
        $page_is_settings = fw_get_db_post_option($shop_page_ID, 'page_is_settings', 2);
        $page_is_banner = fw_get_db_post_option($shop_page_ID, 'page_is_banner', 1);
        $shop_is_banner = ($page_is_settings == 1 && $page_is_banner > 0 ? $page_is_banner : $shop_is_banner);
    endif;
    if ($shop_is_banner == 1):
        get_template_part('template-parts/header/shop', 'header');
    endif;
endif;

/* Shop Top Blocks */
$shop_top_bloks = get_theme_mod('shop_top_bloks', []);
$blocks_id = array();
if (!empty($shop_top_bloks)) {
    foreach ($shop_top_bloks as $sb):
        if ($sb['top_block_ids'] != '' && $sb['top_block_ids'] != 'none'):
            $blocks_id[] = $sb['top_block_ids'];
        endif;
    endforeach;
    $bloks = array(
        'post_type'   => 'blocks',
        'post_status' => 'publish',
        'orderby'     => 'post__in',
        'post__in'    => $blocks_id
    );
    $blok = new WP_Query($bloks);
    if ($blok->have_posts()):
        while ($blok->have_posts()):
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

$colmns = ($shop_sidebar == 1 || !is_active_sidebar('sidebar-3') ? 'col-lg-12' : 'col-xl-9 col-lg-8');
$shop_class = ($shop_sidebar == 1 || !is_active_sidebar('sidebar-3') ? '' : 'withSidebar');
?>
    <section class="shopPage <?php echo esc_attr($shop_class); ?>">
        <div class="container largeContainer">
            <div class="row">
                <?php if (is_active_sidebar('sidebar-3') && $shop_sidebar == 2): ?>
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

                    <?php if ($shop_is_category_dropdown || $shop_is_sort || $shop_is_view_toggler): ?>
                        <div class="row shop_sort_count_row">
                            <div class="col-md-12">
                                <div class="shopController">
                                    <?php if ($shop_is_category_dropdown == TRUE && function_exists('organia_shop_category_dropdown')): echo organia_shop_category_dropdown('product_cat'); else: echo ''; endif; ?>
                                    <?php if ($shop_is_sort && function_exists('woocommerce_catalog_ordering')): ?>
                                        <?php echo woocommerce_catalog_ordering(); ?>
                                    <?php endif; ?>
                                    <?php if ($shop_is_view_toggler): ?>
                                        <ul class="nav producView" role="tablist">
                                            <li role="presentation">
                                                <a class="<?php if ($shop_default_view != 2) {
                                                    echo 'active';
                                                }; ?>" data-toggle="tab" href="#grid" role="tab" aria-selected="<?php if ($shop_default_view != 2): echo 'true'; else: echo 'false'; endif; ?>"><i class="icon-grid"></i></a>
                                            </li>
                                            <li role="presentation">
                                                <a class="<?php if ($shop_default_view == 2) {
                                                    echo 'active';
                                                }; ?>" data-toggle="tab" href="#list" role="tab" aria-selected="<?php if ($shop_default_view != 2): echo 'true'; else: echo 'false'; endif; ?>"><i class="icon-list"></i></a>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($shop_is_view_toggler): ?>
                        <div class="tab-content">
                            <div class="tab-pane fade <?php if ($shop_default_view != 2) {
                                echo 'show active';
                            }; ?>" role="tabpanel" id="grid">
                                <div class="row productRow">
                                    <?php if (woocommerce_product_loop()): ?>
                                        <?php
                                        woocommerce_product_loop_start();
                                        if (wc_get_loop_prop('total')):
                                            while (have_posts()):
                                                the_post();
                                                do_action('woocommerce_shop_loop');
                                                wc_get_template_part('content-' . $shop_product_style, 'product');
                                            endwhile;
                                        endif;
                                        woocommerce_product_loop_end();
                                        ?>
                                    <?php else: ?>
                                        <?php do_action('woocommerce_no_products_found'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php if ($shop_default_view == 2) {
                                echo 'show active';
                            }; ?>" role="tabpanel" id="list">
                                <div class="row productRow">
                                    <?php if (woocommerce_product_loop()): ?>
                                        <?php
                                        woocommerce_product_loop_start();
                                        if (wc_get_loop_prop('total')):
                                            while (have_posts()):
                                                the_post();
                                                do_action('woocommerce_shop_loop');
                                                wc_get_template_part('content-6', 'product');
                                            endwhile;
                                        endif;
                                        woocommerce_product_loop_end();
                                        ?>
                                    <?php else: ?>
                                        <?php do_action('woocommerce_no_products_found'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row productRow">
                            <?php if (woocommerce_product_loop()): ?>
                                <?php
                                woocommerce_product_loop_start();
                                if (wc_get_loop_prop('total')):
                                    while (have_posts()):
                                        the_post();
                                        do_action('woocommerce_shop_loop');
                                        wc_get_template_part('content-' . $shop_product_style, 'product');
                                    endwhile;
                                endif;
                                woocommerce_product_loop_end();
                                ?>
                            <?php else: ?>
                                <?php do_action('woocommerce_no_products_found'); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="organ_pagination shop_pagination text-<?php echo esc_attr($shop_pagi_align); ?>">
                                <?php echo woocommerce_pagination(); ?>
                            </div>
                            <?php if ($shop_is_res_count == 1 && function_exists('woocommerce_result_count')): ?>
                                <?php echo woocommerce_result_count(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if (is_active_sidebar('sidebar-3') && $shop_sidebar == 3): ?>
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
$shop_bottom_bloks = get_theme_mod('shop_bottom_bloks', []);
$blocks_id = array();
if (!empty($shop_bottom_bloks)) {
    foreach ($shop_bottom_bloks as $sb):
        if ($sb['bottom_block_ids'] != '' && $sb['bottom_block_ids'] != 'none'):
            Tw_Builder::render_template($sb['bottom_block_ids']);
        endif;
    endforeach;
//        $bloks = array(
//            'post_type'     => 'blocks',
//            'post_status'   => 'publish',
//            'orderby'       => 'post__in',
//            'post__in'      => $blocks_id
//        );
//        $blok = new WP_Query($bloks);
//        if($blok->have_posts()):
//            while($blok->have_posts()):
//            $blok->the_post();
//
//            endwhile;
//        endif;
//        wp_reset_postdata();
}
get_footer('shop');
