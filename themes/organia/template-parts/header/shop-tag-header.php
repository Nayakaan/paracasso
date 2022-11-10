<?php
    $shop_tag_banner_title = get_theme_mod('shop_tag_banner_title', '');
    $shop_tag_is_breadcrumb = get_theme_mod('shop_tag_is_breadcrumb', 1);
    $shop_tag_banner_alignment          = get_theme_mod('shop_tag_banner_alignment', 'center');
    
    $bgi_css = '';
    $bgc_css = '';
    if(defined('FW')):
        $category = get_queried_object();
        $category_id = $category->term_id;
        $shop_tags_is_settings = fw_get_db_term_option($category_id, 'product_tag', 'shop_tags_is_settings', 2);
        if($shop_tags_is_settings == 1):
            $shop_tags_banner_bg = fw_get_db_term_option($category_id, 'product_tag', 'shop_tags_banner_bg', array());
            $shop_tags_banner_bg_color = fw_get_db_term_option($category_id, 'product_tag', 'shop_tags_banner_bg_color', '');
            $shop_tags_banner_title = fw_get_db_term_option($category_id, 'product_tag', 'shop_tags_banner_title', '');
            $shop_tags_is_breadcrumb = fw_get_db_term_option($category_id, 'product_tag', 'shop_tags_is_breadcrumb', 1);
            $shop_tags_banner_alignment = fw_get_db_term_option($category_id, 'product_tag', 'shop_tags_banner_alignment', 'center');
            
            $shop_tag_banner_title   = ($shop_tags_banner_title != '' ? $shop_tags_banner_title : $shop_tag_banner_title);
            $shop_tag_is_breadcrumb  = ($shop_tags_is_breadcrumb > 0 ? $shop_tags_is_breadcrumb : $shop_tag_is_breadcrumb);
            
            $shop_tag_banner_alignment = ($shop_tags_banner_alignment != '' ? $shop_tags_banner_alignment : $shop_tag_banner_alignment);
            
            if(isset($shop_tags_banner_bg['url']) && $shop_tags_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$shop_tags_banner_bg['url'].');';
            endif;
            if(isset($shop_tags_banner_bg_color) && $shop_tags_banner_bg_color != ''):
                $bgc_css = 'background-color: '.$shop_tags_banner_bg_color.';';
            endif;
        endif;
    endif;
    
    $shop_tag_banner_title = ($shop_tag_banner_title != '' ? $shop_tag_banner_title : get_the_archive_title());
    $shop_tag_banner_title = wp_strip_all_tags($shop_tag_banner_title);
    $shop_tag_banner_title = str_replace('Tag:', '', $shop_tag_banner_title);
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner shop_tag_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($shop_tag_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo organia_kses($shop_tag_banner_title); ?></h2>
                    <?php if($shop_tag_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->