<?php
    $serv_single_banner_title = get_theme_mod('serv_single_banner_title', get_the_title());
    $serv_single_is_breadcrumb = get_theme_mod('serv_single_is_breadcrumb', 1);
    $serv_single_banner_alignment       = get_theme_mod('serv_single_banner_alignment', 'center');
    $serv_single_banner_title           = ($serv_single_banner_title != '' ? $serv_single_banner_title : get_the_title());
    
    $bgi_css = '';
    $bgc_css = '';
    if(defined('FW')):
        $srv_is_settings = fw_get_db_post_option(get_the_ID(), 'srv_is_settings', 2);
    
        $srv_banner_bg          = fw_get_db_post_option(get_the_ID(), 'srv_banner_bg', array());
        $srv_banner_ov          = fw_get_db_post_option(get_the_ID(), 'srv_banner_ov', '');
        $srv_banner_title       = fw_get_db_post_option(get_the_ID(), 'srv_banner_title', '');
        $srv_is_breadcrumb      = fw_get_db_post_option(get_the_ID(), 'srv_is_breadcrumb', 1);
        $srv_banner_alignment   = fw_get_db_post_option(get_the_ID(), 'srv_banner_alignment', 'center');
        
        if($srv_is_settings == 1):
            $serv_single_banner_title = ($srv_banner_title != '' ? $srv_banner_title : $serv_single_banner_title);
            $serv_single_is_breadcrumb = ($srv_is_breadcrumb > 0 ? $srv_is_breadcrumb : $serv_single_is_breadcrumb);
            $serv_single_banner_alignment   = ($srv_banner_alignment != '' ? $srv_banner_alignment : $serv_single_banner_alignment);
            
            if(isset($srv_banner_bg['url']) && $srv_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$srv_banner_bg['url'].');';
            endif;
            if(isset($srv_banner_ov) && $srv_banner_ov != ''):
                $bgc_css = 'background-color: '.$srv_banner_ov.';';
            endif;
            
        endif;
    endif;
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner service_single_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($serv_single_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo esc_html($serv_single_banner_title); ?></h2>
                    <?php if($serv_single_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->