<?php
    $shop_banner_title          = get_theme_mod('shop_banner_title', esc_html__('Products', 'organia'));
    $shop_is_breadcrumb         = get_theme_mod('shop_is_breadcrumb', 1);
    $is_shop_banner_title       = get_theme_mod('is_shop_banner_title', 2);
    $shop_banner_alignment      = get_theme_mod('shop_banner_alignment', 'left');
    
    $bgi_css = '';
    $bgc_css = '';
    $shop_page_ID = get_option('woocommerce_shop_page_id', true);
    if(defined('FW') && $shop_page_ID > 0):
        $page_is_settings = fw_get_db_post_option($shop_page_ID, 'page_is_settings', 2);
        if($page_is_settings == 1):
            $page_banner_bg         = fw_get_db_post_option($shop_page_ID, 'page_banner_bg', array());
            $page_banner_bg_color   = fw_get_db_post_option($shop_page_ID, 'page_banner_bg_color', '');
            $page_banner_title      = fw_get_db_post_option($shop_page_ID, 'page_banner_title', '');
            $page_is_breadcrumb     = fw_get_db_post_option($shop_page_ID, 'page_is_breadcrumb', 1);
            $page_banner_alignment  = fw_get_db_post_option($shop_page_ID, 'page_banner_alignment', 'left');
            
            $shop_banner_title      = ($page_banner_title != '' ? $page_banner_title : $shop_banner_title);
            $shop_is_breadcrumb     = ($page_is_breadcrumb > 0 ? $page_is_breadcrumb : $shop_is_breadcrumb);
            
            $shop_banner_alignment  = ($page_banner_alignment != '' ? $page_banner_alignment : $shop_banner_alignment);
            if(isset($page_banner_bg['url']) && $page_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$page_banner_bg['url'].'); backgroudn-repeat: no-repeat; background-size: cover; background-position: center center;';
            endif;
            if(isset($page_banner_bg_color) && $page_banner_bg_color != ''):
                $bgc_css = ' background-color: '.$page_banner_bg_color.';';
            endif;
        endif;
    endif;
    
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner shop_page_banner <?php if($is_shop_banner_title != 1): ?>shortBanner<?php endif; ?>" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($shop_banner_alignment); ?>">
                    <?php if($is_shop_banner_title == 1): ?>
                        <h2 class="banner-title"><?php echo organia_kses($shop_banner_title); ?></h2>
                    <?php endif; ?>
                    <?php if($shop_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->