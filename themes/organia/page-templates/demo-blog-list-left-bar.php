<?php
/* 
 * Template Name: Demo Blog List Left Sidebar
 */
get_header();
$blog_page_ID = get_option('page_for_posts', true);

$blog_is_banner  = get_theme_mod('blog_is_banner', 1);
$blog_sidebar    = get_theme_mod('blog_sidebar', 2);
$blog_str_limit  = get_theme_mod('blog_str_limit', 309);
$blog_readmore  = get_theme_mod('blog_readmore_label', esc_html__('Read More', 'organia'));

if(defined('FW') && $blog_page_ID > 0):
    $page_is_settings = fw_get_db_post_option($blog_page_ID, 'page_is_settings', 2);
    $page_is_banner = fw_get_db_post_option($blog_page_ID, 'page_is_banner', 1);
    $blog_is_banner = ($page_is_settings == 1 && $page_is_banner > 0 ? $page_is_banner : $blog_is_banner);
endif;

if($blog_is_banner == 1):
    get_template_part('template-parts/header/blog', 'header');
endif;

$blog_pagi_align = get_theme_mod('blog_pagi_align', 'center');
?>
<section class="blogPage lft">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar lsb">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <?php
                    global $wp_query;
                    $page = (get_query_var('paged') != '') ? get_query_var('paged') : 1;
                    $fargs = array(
                        'post_type'         => 'post',
                        'post_status'       => 'publish',
                        'posts_per_page'    => 4,
                        'orderby'           => 'ID',
                        'order'             => 'DESC',
                        'paged'             => $page
                    );
                    $wp_query = new WP_Query($fargs);
                    if($wp_query->have_posts()):
                        while($wp_query->have_posts()):
                            $wp_query->the_post();
                            ?>
                            <div class="blogItem01 standard">
                                <div class="blogThumb">
                                    <img src="<?php echo organia_post_thumbnail(get_the_ID(), 970, 511); ?>" alt="<?php echo get_the_title(); ?>">
                                    <div class="blogDate"><?php echo get_the_time('d M'); ?></div>
                                </div>
                                <div class="blogContent">
                                    <div class="bmeta">
                                        <span><i class="twi-calendar-alt1"></i><?php echo esc_html__('By ', 'organia'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>-<span><i class="twi-comment"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo comments_number( esc_html__('0 Comment', 'organia'), esc_html__('1 Comment', 'organia'), '% '.esc_html__('Comments', 'organia') ); ?></a></span>
                                    </div>
                                    <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    <p>
                                        <?php 
                                            if(has_excerpt()):
                                                echo substr(wp_strip_all_tags(get_the_excerpt()), 0, $blog_str_limit);
                                            else:
                                                echo substr(wp_strip_all_tags(get_the_content()), 0, $blog_str_limit);
                                            endif;
                                        ?>
                                    </p>
                                    <?php if($blog_readmore != ''): ?>
                                    <a href="<?php echo get_the_permalink(); ?>" class="organ_btn"><?php echo esc_html($blog_readmore); ?><i class="twi-arrow-right1"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    else:
                        get_template_part('template-parts/post/content', 'none');
                    endif;
                ?>
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
        </div>
    </div>
</section>
<?php
get_footer(); 