<?php get_header();

$blocks_is_banner = 1;
if(defined('FW')){
    $blocks_is_banner = fw_get_db_post_option(get_the_ID(), 'blocks_is_banner', 1);
}
if($blocks_is_banner == 1):
    get_template_part('template-parts/header/block-single', 'header');
endif;

?>
<section <?php post_class('blocks_section'); ?>>
    <?php
    while (have_posts()){
        the_post();
        the_content();
    } ?>
</section>
<?php
get_footer();
