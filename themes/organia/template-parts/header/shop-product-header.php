<?php
    $shop_pro_banner_title      = get_theme_mod('shop_pro_banner_title', get_the_title());
    $shop_pro_is_breadcrumb     = get_theme_mod('shop_pro_is_breadcrumb', 1);
    $is_shop_pro_banner_title   = get_theme_mod('is_shop_pro_banner_title', 2);
    $shop_pro_banner_alignment  = get_theme_mod('shop_pro_banner_alignment', 'left');
    $shop_pro_banner_title      = ($shop_pro_banner_title != '' ? $shop_pro_banner_title : get_the_title());
    
    $shop_pros_is_settings = 2;
    $bgi_css = '';
    $bgc_css = '';
    if(defined('FW')):
        $shop_pros_is_settings = fw_get_db_post_option(get_the_ID(), 'shop_pros_is_settings', 2);
    
        $shop_pros_banner_bg        = fw_get_db_post_option(get_the_ID(), 'shop_pros_banner_bg', array());
        $shop_pros_banner_color     = fw_get_db_post_option(get_the_ID(), 'shop_pros_banner_color', '');
        $shop_pros_banner_title     = fw_get_db_post_option(get_the_ID(), 'shop_pros_banner_title', '');
        $shop_pros_is_breadcrumb    = fw_get_db_post_option(get_the_ID(), 'shop_pros_is_breadcrumb', 1);
        $shop_pros_is_baner_title   = fw_get_db_post_option(get_the_ID(), 'shop_pros_is_baner_title', 2);
        $shop_pros_banner_alignment = fw_get_db_post_option(get_the_ID(), 'shop_pros_banner_alignment', 'left');
        
        if($shop_pros_is_settings == 1):
            $shop_pro_banner_title      = ($shop_pros_banner_title != '' ? $shop_pros_banner_title : $shop_pro_banner_title);
            $shop_pro_is_breadcrumb     = ($shop_pros_is_breadcrumb > 0 ? $shop_pros_is_breadcrumb : $shop_pro_is_breadcrumb);

            $is_shop_pro_banner_title   = ($shop_pros_is_baner_title > 0 ? $shop_pros_is_baner_title : $is_shop_pro_banner_title);
            
            $shop_pro_banner_alignment  = ($shop_pros_banner_alignment != '' ? $shop_pros_banner_alignment : $shop_pro_banner_alignment);
            
            if(isset($shop_pros_banner_bg['url']) && $shop_pros_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$shop_pros_banner_bg['url'].'); background-repeat: no-repeat; background-size: cover; background-position: center center;';
            endif;
            if(isset($shop_pros_banner_color) && $shop_pros_banner_color != ''):
                $bgc_css = 'background-color: '.$shop_pros_banner_color.';';
            endif;
        endif;
    endif;
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner shop_details_page_banner <?php if($is_shop_pro_banner_title != 1): ?>shortBanner<?php endif; ?>" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($shop_pro_banner_alignment); ?>">
                    <?php if($is_shop_pro_banner_title == 1): ?>
                        <h2 class="banner-title"><?php echo esc_html($shop_pro_banner_title); ?></h2>
                    <?php endif; ?>
                    <?php if($shop_pro_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->