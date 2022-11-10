<?php
    $shop_srcs_banner_title     = get_theme_mod('shop_srcs_banner_title', '');
    $shop_srcs_is_breadcrumb    = get_theme_mod('shop_srcs_is_breadcrumb', 1);
    $shop_srcs_banner_alignment = get_theme_mod('shop_srcs_banner_alignment', 'center');
    
    
    $shop_srcs_banner_title = ($shop_srcs_banner_title != '' ? $shop_srcs_banner_title : get_search_query());
    $shop_srcs_banner_title = wp_strip_all_tags($shop_srcs_banner_title);
    $shop_srcs_banner_title = str_replace('Serch For:', '', $shop_srcs_banner_title);
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner shop_src_banner">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($shop_srcs_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo organia_kses($shop_srcs_banner_title); ?></h2>
                    <?php if($shop_srcs_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->