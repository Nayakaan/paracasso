<?php
    $team_banner_title = get_theme_mod('team_banner_title', get_the_title());
    $team_is_breadcrumb = get_theme_mod('team_is_breadcrumb', 1);
    $team_banner_alignment              = get_theme_mod('team_banner_alignment', 'center');
    
    $bgi_css = '';
    $bgc_css = '';
    if(defined('FW')):
        $memb_is_settings = fw_get_db_post_option(get_the_ID(), 'memb_is_settings', 2);
        if($memb_is_settings == 1):
            $memb_banner_bg = fw_get_db_post_option(get_the_ID(), 'memb_banner_bg', array());
            $memb_banner_ov = fw_get_db_post_option(get_the_ID(), 'memb_banner_ov', '');
            $memb_banner_title = fw_get_db_post_option(get_the_ID(), 'memb_banner_title', '');
            $memb_is_breadcrumb = fw_get_db_post_option(get_the_ID(), 'memb_is_breadcrumb', 1);
            $memb_banner_alignment  = fw_get_db_post_option(get_the_ID(), 'memb_banner_alignment', 'center');
            
            $team_banner_title = ($memb_banner_title != '' ? $memb_banner_title : $team_banner_title);
            $team_is_breadcrumb = ($memb_is_breadcrumb > 0 ? $memb_is_breadcrumb : $team_is_breadcrumb);
            $team_banner_alignment          = ($memb_banner_alignment != '' ? $memb_banner_alignment : $team_banner_alignment);
            
            if(isset($memb_banner_bg['url']) && $memb_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$memb_banner_bg['url'].');';
            endif;
            if(isset($memb_banner_ov) && $memb_banner_ov != ''):
                $bgc_css = 'background-color: '.$memb_banner_ov.';';
            endif;
        endif;
    endif;
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner team_single_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($team_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo esc_html($team_banner_title); ?></h2>
                    <?php if($team_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->