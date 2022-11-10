<?php
    $bgi_css = '';
    $bgc_css = '';

    $blocks_banner_bg           = fw_get_db_post_option(get_the_ID(), 'blocks_banner_bg', array());
    $blocks_banner_bg_color     = fw_get_db_post_option(get_the_ID(), 'blocks_banner_bg_color', '');
    $blocks_banner_title        = fw_get_db_post_option(get_the_ID(), 'blocks_banner_title', get_the_title());
    $blocks_banner_title        = ($blocks_banner_title != '' ? $blocks_banner_title : get_the_title());
    $blocks_is_breadcrumb       = fw_get_db_post_option(get_the_ID(), 'blocks_is_breadcrumb', 1);
    $blocks_banner_alignment    = fw_get_db_post_option(get_the_ID(), 'blocks_banner_alignment', 'center');

    if(isset($blocks_banner_bg['url']) && $blocks_banner_bg['url'] != ''):
        $bgi_css = 'background-image: url('.$blocks_banner_bg['url'].');';
    endif;
    if(isset($blocks_banner_bg_color) && $blocks_banner_bg_color != ''):
        $bgc_css = 'background-color: '.$blocks_banner_bg_color.';';
    endif;
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner blocks_page_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($blocks_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo organia_kses($blocks_banner_title); ?></h2>
                    <?php if($blocks_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->