<?php
/**
 * index.php
 *
 * The main template file.
 */
get_header();
$blog_page_ID = get_option('page_for_posts', true);

$blog_is_banner  = get_theme_mod('blog_is_banner', 1);
$blog_sidebar    = get_theme_mod('blog_sidebar', 3);
$blog_view       = get_theme_mod('blog_view', 1);

if(defined('FW') && $blog_page_ID > 0):
    $page_is_settings = fw_get_db_post_option($blog_page_ID, 'page_is_settings', 2);
    $page_is_banner = fw_get_db_post_option($blog_page_ID, 'page_is_banner', 1);
    $blog_is_banner = ($page_is_settings == 1 && $page_is_banner > 0 ? $page_is_banner : $blog_is_banner);
endif;

if($blog_is_banner == 1):
    get_template_part('template-parts/header/blog', 'header');
endif;

$area_class     = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1') ? 'col-lg-12' : 'col-xl-9 col-lg-8');
$blog_sidebar   = ($blog_sidebar == 1  || !is_active_sidebar('sidebar-1') ? '1' : $blog_sidebar);

$blog_pagi_align = get_theme_mod('blog_pagi_align', 'center');
?>
<section class="blogPage <?php if($blog_sidebar == 2): ?>lft<?php endif; ?>">
    <div class="container largeContainer">
        <div class="row">
            <?php if(is_active_sidebar('sidebar-1') && $blog_sidebar == 2): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar lsb">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                </div>
            <?php endif; ?>
                <div class="<?php echo esc_attr($area_class); ?>">
                    <div class="row <?php if($blog_sidebar == 1 && $blog_view == 1): ?>justify-content-center<?php endif; ?>">
                        <?php
                            while(have_posts()):
                                the_post();
                                get_template_part('template-parts/post/content');
                            endwhile;
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="organ_pagination text-<?php echo esc_attr($blog_pagi_align); ?>">
                                <?php
                                    the_posts_pagination(
                                        array(
                                            'prev_text'          => organia_kses( '<i class="twi-arrow-left"></i>' ),
                                            'next_text'          => organia_kses( '<i class="twi-arrow-right"></i>' ),
                                            'before_page_number' => '',
                                            'type'               => 'array'
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php if(is_active_sidebar('sidebar-1') && $blog_sidebar == 3): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
    $blog_bloks = get_theme_mod('blog_bloks', '');
    $blocks_id = array();
    if(!empty($blog_bloks)){
        foreach($blog_bloks as $sb):
            if($sb['block_ids'] != '' && $sb['block_ids'] != 'none'):
                $blocks_id[] = $sb['block_ids'];
            endif;
        endforeach;
        $bloks = array(
            'post_type'     => 'blocks',
            'post_status'   => 'publish',
            'orderby'       => 'post__in',
            'post__in'      => $blocks_id
        );
        $blok = new WP_Query($bloks);
        if($blok->have_posts()):
            while($blok->have_posts()):
            $blok->the_post();
            the_content();
            endwhile;
        endif;
        wp_reset_postdata();
    }
get_footer();
