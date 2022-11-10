<?php

/**
 * The template for displaying 404 pages (not found)
 */
get_header();
$fof_is_banner = get_theme_mod('fof_is_banner', 1);
if(defined('FW')):
    $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_is_settings', 2);
    $page_is_banner = fw_get_db_post_option(get_the_ID(), 'page_is_banner', 1);
    $fof_is_banner = ($fof_is_banner == 1 && $page_is_banner > 0 ? $page_is_banner : $fof_is_banner);
    
    $page_is_con_settings = fw_get_db_post_option(get_the_ID(), 'page_is_con_settings', 2);
endif;
if($fof_is_banner == 1):
    get_template_part( 'template-parts/header/404', 'header' );
endif;

$fof_content_type = get_theme_mod('fof_content_type', 1);
$fof_content_image = get_theme_mod('fof_content_image', ORGANIA_ASSETS_IMAGES_URL.'/404.png');
$fof_titles     = get_theme_mod('fof_titles', esc_html__('404', 'organia'));
$fof_contents   = get_theme_mod('fof_contents', '');
$fof_is_search  = get_theme_mod('fof_is_search', 2);
$fof_is_homes   = get_theme_mod('fof_is_homes', 1);
$fof_hbtn_label = get_theme_mod('fof_hbtn_label', esc_html__('Return to Home', 'organia'));
?>
<section class="section_404">
    <div class="middle_404">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="contetn_404 text-center">
                        <?php if($fof_content_type == 1): ?>
                            <img src="<?php echo esc_url($fof_content_image) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
                        <?php else: ?>
                            <?php if($fof_titles != ''): ?><h2><?php echo organia_kses($fof_titles) ?></h2><?php endif; ?>
                            <?php if($fof_contents != ''): ?><h3><?php echo organia_kses($fof_contents) ?></h3><?php endif; ?>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                        <?php if($fof_is_search == 1): ?>
                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Type and hit Enter...', 'placeholder', 'organia' ); ?>">
                            <button type="submit"><svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" width="21" height="21"><g id="Content"><g id="Search"><path id="icon" class="shp0" d="M20.06 15.07L18.39 13.42C18.92 12.2 19.18 10.98 19.18 9.58C19.18 4.27 14.89 0 9.55 0C7.09 0 4.64 0.96 2.8 2.79C0.96 4.62 0 7.06 0 9.58C0 14.9 4.29 19.17 9.63 19.17C11.04 19.17 12.35 18.91 13.49 18.38L15.15 20.04C15.77 20.65 16.64 21 17.43 21C18.31 21 19.27 20.65 19.97 19.95C21.28 18.47 21.37 16.38 20.06 15.07L20.06 15.07ZM9.63 17.43C5.26 17.43 1.75 13.94 1.75 9.58C1.75 7.49 2.54 5.49 4.03 4.01C5.52 2.52 7.53 1.74 9.63 1.74C14.01 1.74 17.52 5.23 17.52 9.58C17.52 13.94 14.01 17.43 9.63 17.43ZM18.74 18.65C18.04 19.34 16.99 19.34 16.38 18.73L15.06 17.43C16.03 16.73 16.9 15.94 17.52 14.99L18.83 16.29C19.44 16.9 19.44 17.95 18.74 18.65ZM11.3 3.74C9.72 3.31 8.06 3.48 6.66 4.27C5.26 5.05 4.2 6.36 3.77 7.93C3.59 8.36 3.85 8.89 4.38 8.97C4.47 8.97 4.55 8.97 4.64 8.97C4.99 8.97 5.34 8.71 5.52 8.36C5.87 7.23 6.57 6.36 7.62 5.75C8.67 5.23 9.81 5.05 10.95 5.4C11.39 5.57 11.91 5.23 12 4.79C12.09 4.35 11.82 3.83 11.3 3.74L11.3 3.74Z"></path></g></g></svg></button>
                        </form>
                        <?php endif; ?>
                        <?php if($fof_is_homes == 1): ?>
                        <a href="<?php echo esc_url(home_url('/')) ?>" class="organ_btn"><?php echo esc_html($fof_hbtn_label) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
