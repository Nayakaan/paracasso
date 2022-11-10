<?php
/* 
 * Template Name: Organia Home
 */

$page_body_bg         = fw_get_db_post_option(get_the_ID(), 'page_body_bg', array());
$page_body_bg_color   = fw_get_db_post_option(get_the_ID(), 'page_body_bg_color', '');

$bgi_css = '';
$bgc_css = '';
if(isset($page_body_bg['url']) && $page_body_bg['url'] != ''):
	$bgi_css = 'background-image: url('.$page_body_bg['url'].'); backgroudn-repeat: no-repeat; background-size: auto; background-position: left top;';
endif;
if(isset($page_body_bg_color) && $page_body_bg_color != ''):
    $bgc_css = 'background-color: '.$page_body_bg_color.';';
endif;

get_header(); ?>
<section class="organia_home_page" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
    <?php
        while(have_posts()):
            the_post();
            the_content();
        endwhile;
    ?>
</section>
<?php get_footer();