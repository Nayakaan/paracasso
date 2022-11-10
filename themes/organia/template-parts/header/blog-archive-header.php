<?php
    $blog_arch_banner_title = get_theme_mod('blog_arch_banner_title', get_the_archive_title());
    $blog_arch_is_breadcrumb = get_theme_mod('blog_arch_is_breadcrumb', 1);
    $blog_arch_banner_alignment = get_theme_mod('blog_arch_banner_alignment', 'center');
    
    $blog_arch_banner_title = ($blog_arch_banner_title != '' ? $blog_arch_banner_title : get_the_archive_title());
    $blog_arch_banner_title = wp_strip_all_tags($blog_arch_banner_title);
    $blog_arch_banner_title = str_replace('Month:', '', $blog_arch_banner_title);
    $blog_arch_banner_title = str_replace('Year:', '', $blog_arch_banner_title);
    $blog_arch_banner_title = str_replace('Week:', '', $blog_arch_banner_title);
    $blog_arch_banner_title = str_replace('Category:', '', $blog_arch_banner_title);
    $blog_arch_banner_title = str_replace('Author:', '', $blog_arch_banner_title);
    $blog_arch_banner_title = str_replace('Tag:', '', $blog_arch_banner_title);
    
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="page_banner blog_archive_banner">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-12 text-<?php echo esc_attr($blog_arch_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo organia_kses($blog_arch_banner_title); ?></h2>
                    <?php if($blog_arch_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->