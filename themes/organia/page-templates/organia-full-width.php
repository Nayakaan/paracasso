<?php
/* 
 * Template Name: Organia Full Width
 */

get_header();

$pages_is_banner = get_theme_mod('pages_is_banner', 1);
if(defined('FW')):
    $page_is_settings   = fw_get_db_post_option(get_the_ID(), 'page_is_settings', 2);
    $page_is_banner     = fw_get_db_post_option(get_the_ID(), 'page_is_banner', 1);
    
    $pages_is_banner    = ($page_is_settings == 1 && $page_is_banner > 0 ? $page_is_banner : $pages_is_banner);
endif;

if($pages_is_banner == 1):
    get_template_part('template-parts/header/page', 'header');
else:
    echo '<section class="blank_banner"></section>';
endif;
?>
<section class="organia_full_width_page">
    <?php
        while(have_posts()):
            the_post();
            the_content();
        endwhile;
    ?>
</section>
<?php
get_footer();