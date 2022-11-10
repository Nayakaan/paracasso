<?php
/**
 * The template for displaying all pages
 */

get_header(); 
$pages_is_banner = get_theme_mod('pages_is_banner', 1);
$pages_sidebar   = get_theme_mod('pages_sidebar', 1);
if(defined('FW')):
    $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_is_settings', 2);
    $page_is_banner = fw_get_db_post_option(get_the_ID(), 'page_is_banner', 1);
    $pages_is_banner = ($page_is_settings == 1 && $page_is_banner > 0 ? $page_is_banner : $pages_is_banner);
    
    $page_is_con_settings = fw_get_db_post_option(get_the_ID(), 'page_is_con_settings', 2);
    $page_sidebar = fw_get_db_post_option(get_the_ID(), 'page_sidebar', 1);
    $pages_sidebar = ($page_is_con_settings == 1 && $page_sidebar > 0 ? $page_sidebar : $pages_sidebar);
endif;
if($pages_is_banner == 1):
    get_template_part( 'template-parts/header/page', 'header' );
endif;

$column = ($pages_sidebar == 1 || !is_active_sidebar('sidebar-2') ? 'col-lg-12' : 'col-xl-9 col-lg-8');
$w      = ($pages_sidebar == 1 || !is_active_sidebar('sidebar-2') ? 1320 : 600);
$h      = ($pages_sidebar == 1 || !is_active_sidebar('sidebar-2') ? 970 : 511);

?>
<section class="page_section">
    <div class="container largeContainer">
        <div class="row">
            <?php if(is_active_sidebar('sidebar-2') && $pages_sidebar == 2): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar lsb">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($column); ?>">
                <div class="sic_the_content clearfix">
                    <?php
                        while(have_posts()):
                            the_post();
                            the_content();
                        endwhile;
                    ?>
                    <div class="clearfix"></div>
                    <?php
                        $defaults = array(
                            'before'           => '<div class="PaginInner clearfix"><strong>' . esc_html__( 'Pages:', 'organia' ).'</strong>',
                            'after'            => '</div>',
                            'link_before'      => '<span>',
                            'link_after'       => '</span>',
                            'next_or_number'   => 'number',
                            'separator'        => ' ',
                            'nextpagelink'     => '<i class="twi-arrow-left"></i>',
                            'previouspagelink' => '<i class="twi-arrow-right"></i>',
                            'pagelink'         => '%',
                            'echo'             => 1
                        );
                        wp_link_pages( $defaults );
                    ?>
                    <div class="clearfix"></div>
                </div>
                <?php if ( comments_open() || get_comments_number() ): ?>
                    <div class="comment_area">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(is_active_sidebar('sidebar-2') && $pages_sidebar == 3): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();