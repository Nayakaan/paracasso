<?php
    $blog_cats_banner_title = get_theme_mod('blog_cats_banner_title', get_the_archive_title());
    $blog_cats_is_breadcrumb = get_theme_mod('blog_cats_is_breadcrumb', 1);
    $blog_cats_banner_alignment = get_theme_mod('blog_cats_banner_alignment', 'center');
    
    $bgc_css = '';
    $bgi_css = '';
    if(defined('FW')):
        $category = get_queried_object();
        $category_id = $category->term_id;
        $blog_cat_is_settings = fw_get_db_term_option($category_id, 'category', 'blog_cat_is_settings', 2);
        if($blog_cat_is_settings == 1):
            $blog_cat_banner_bg = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_bg', array());
            $blog_cat_banner_ov = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_ov', '');
            $blog_cat_banner_title = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_title', '');
            $blog_cat_is_breadcrumb = fw_get_db_term_option($category_id, 'category', 'blog_cat_is_breadcrumb', 1);
            
            $blog_cat_banner_alignment  = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_alignment', 'center');
            
            $blog_cats_banner_title = ($blog_cat_banner_title != '' ? $blog_cat_banner_title : $blog_cats_banner_title);
            $blog_cats_is_breadcrumb = ($blog_cat_is_breadcrumb > 0 ? $blog_cat_is_breadcrumb : $blog_cats_is_breadcrumb);
            
            $blog_cats_banner_alignment = ($blog_cat_banner_alignment != '' ? $blog_cat_banner_alignment : $blog_cats_banner_alignment);
            
            if(isset($blog_cat_banner_bg['url']) && $blog_cat_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$blog_cat_banner_bg['url'].');';
            endif;
            if(isset($blog_cat_banner_ov) && $blog_cat_banner_ov != ''):
                $bgc_css = 'background-color: '.$blog_cat_banner_ov.';';
            endif;
        endif;
    endif;
    
    $blog_cats_banner_title = ($blog_cats_banner_title != '' ? $blog_cats_banner_title : get_the_archive_title());
    $blog_cats_banner_title = wp_strip_all_tags($blog_cats_banner_title);
    $blog_cats_banner_title = str_replace('Category:', '', $blog_cats_banner_title);
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner blog_cate_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($blog_cats_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo organia_kses($blog_cats_banner_title); ?></h2>
                    <?php if($blog_cats_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->