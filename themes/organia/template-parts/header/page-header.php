<?php
    $pages_banner_title     = get_theme_mod('pages_banner_title', get_the_title());
    $pages_is_breadcrumb    = get_theme_mod('pages_is_breadcrumb', 1);
    $pages_banner_alignment = get_theme_mod('pages_banner_alignment', 'center');
    
    $bgi_css = '';
    $bgc_css = '';
    if(defined('FW')):
        $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_is_settings', 2);
        if($page_is_settings == 1):
            $page_banner_bg         = fw_get_db_post_option(get_the_ID(), 'page_banner_bg', array());
            $page_banner_bg_color   = fw_get_db_post_option(get_the_ID(), 'page_banner_bg_color', '');
            $page_banner_title      = fw_get_db_post_option(get_the_ID(), 'page_banner_title', '');
            $page_is_breadcrumb     = fw_get_db_post_option(get_the_ID(), 'page_is_breadcrumb', 1);
            $page_banner_alignment  = fw_get_db_post_option(get_the_ID(), 'page_banner_alignment', 'center');
            
            $pages_banner_title     = ($page_banner_title != '' ? $page_banner_title : $pages_banner_title);
            $pages_is_breadcrumb    = ($page_is_breadcrumb > 0 ? $page_is_breadcrumb : $pages_is_breadcrumb);
            
            $pages_banner_alignment = ($page_banner_alignment != '' ? $page_banner_alignment : $pages_banner_alignment);
            
            if(isset($page_banner_bg['url']) && $page_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$page_banner_bg['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover;';
            endif;
            if(isset($page_banner_bg_color) && $page_banner_bg_color != ''):
                $bgc_css = 'background-color: '.$page_banner_bg_color.';';
            endif;
        endif;
    endif;
    $pages_banner_title = ($pages_banner_title != '' ? $pages_banner_title : get_the_title());
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container largeContainer">
            <div class="row">TEST
                <div class="col-md-12 text-<?php echo esc_attr($pages_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo organia_kses($pages_banner_title); ?></h2>
                    <?php if($pages_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->