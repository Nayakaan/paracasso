<?php
/**
 * The template for displaying all single posts
 */

get_header();
$blog_single_is_banner = get_theme_mod('blog_single_is_banner', 1);
if(defined('FW')):
    $blog_si_is_settings = fw_get_db_post_option(get_the_ID(), 'blog_si_is_settings', 2);
    $blog_si_is_banner = fw_get_db_post_option(get_the_ID(), 'blog_si_is_banner', 1);
    $blog_single_is_banner = ($blog_si_is_settings == 1 && $blog_si_is_banner > 0 ? $blog_si_is_banner : $blog_single_is_banner);
endif;
if($blog_single_is_banner == 1):
    get_template_part( 'template-parts/header/blog-single', 'header' );
endif;

if(function_exists('organia_post_view_count')){
    organia_post_view_count(get_the_ID());
}

$blog_single_sidebar = get_theme_mod('blog_single_sidebar', 3);
$blog_single_is_tag = get_theme_mod('blog_single_is_tag', 1);
$blog_single_is_share = get_theme_mod('blog_single_is_share', 2);
$blog_single_socials = get_theme_mod('blog_single_socials', array(1, 2, 3, 4));
$blog_single_is_author_box = get_theme_mod('blog_single_is_author_box', 2);
$blog_is_related        = get_theme_mod('blog_is_related', 2);
$blog_related_title     = get_theme_mod('blog_related_title', esc_html__('Related News', 'organia'));
$blog_rel_num_of_item   = get_theme_mod('blog_rel_num_of_item', 4);

if(defined('FW')):
    $blog_si_is_content_enable = fw_get_db_post_option(get_the_ID(), 'blog_si_is_content_enable', 2);
    if($blog_si_is_content_enable == 1):
        $blog_si_post_sidebar = fw_get_db_post_option(get_the_ID(), 'blog_si_post_sidebar', 3);
        $blog_si_is_tag = fw_get_db_post_option(get_the_ID(), 'blog_si_is_tag', 1);
        $blog_si_is_share = fw_get_db_post_option(get_the_ID(), 'blog_si_is_share', 2);
        $blog_si_socials = fw_get_db_post_option(get_the_ID(), 'blog_si_socials', array());
        $blog_si_is_author_box = fw_get_db_post_option(get_the_ID(), 'blog_si_is_author_box', 2);
        $post_is_related = fw_get_db_post_option(get_the_ID(), 'post_is_related', 2);
        $post_related_title = fw_get_db_post_option(get_the_ID(), 'post_related_title', '');
        $post_rel_num_of_item = fw_get_db_post_option(get_the_ID(), 'post_rel_num_of_item', 4);
        
        
        $blog_single_sidebar = ($blog_si_post_sidebar > 0 ? $blog_si_post_sidebar : $blog_single_sidebar);
        $blog_single_is_tag = ($blog_si_is_tag > 0 ? $blog_si_is_tag : $blog_single_is_tag);
        $blog_single_is_share = ($blog_si_is_share > 0 ? $blog_si_is_share : $blog_single_is_share);
        if(!empty($blog_si_socials)):
            $blog_single_socials = array();
            foreach($blog_si_socials as $key => $val):
                $blog_single_socials[] = $key;
            endforeach;
        endif;
        $blog_single_is_author_box  = ($blog_si_is_author_box > 0 ? $blog_si_is_author_box : $blog_single_is_author_box);
        $blog_is_related            = ($post_is_related > 0 ? $post_is_related : $blog_is_related);
        $blog_related_title         = ($post_related_title != '' ? $post_related_title : $blog_related_title);
        $blog_rel_num_of_item       = ($post_rel_num_of_item > 0 ? $post_rel_num_of_item : $blog_rel_num_of_item);
    endif; 
endif;

$column  = ($blog_single_sidebar == 1 || !is_active_sidebar('sidebar-1') ? 'col-lg-12' : 'col-xl-9 col-lg-8');

$sbclass = '';
if($blog_single_sidebar == 2 && is_active_sidebar('sidebar-1')){
    $sbclass = ' padLeft';
}elseif ($blog_single_sidebar == 3 && is_active_sidebar('sidebar-1')) {
    $sbclass = ' padRight';
}else{
    $sbclass = '';
}

?>
<section class="singleBlog">
    <div class="container largeContainer">
        <div class="row">
            <?php if(is_active_sidebar('sidebar-1') && $blog_single_sidebar == 2): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar lsb">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($column.$sbclass); ?>">
                <?php while(have_posts()): the_post(); ?>
                <div class="sic_the_content clearfix">
                    <?php
                        the_content();
                    ?>
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
                <?php endwhile; ?>
                <?php if(($blog_single_is_tag == 1 && has_tag()) || ($blog_single_is_share == 1 && !empty($blog_single_socials))): ?>
                <div class="spMeta clearfix">
                    <div class="row">
                        <div class="<?php if($blog_single_is_share == 1 ): ?>col-md-8<?php else: ?>col-md-12<?php endif; ?>">
                            <?php if($blog_single_is_tag == 1 && has_tag()): ?>
                            <div class="tags clearfix">
                                <h5><?php echo esc_html__('Tags', 'organia'); ?></h5>
                                <?php echo get_the_tag_list('', ' ', ''); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if($blog_single_is_share == 1 && !empty($blog_single_socials)): ?>
                        <div class="col-md-4">
                            <div class="socialShare">
                                <?php
                                    if(in_array(1, $blog_single_socials)){ echo '<a target="_blank" href="https://www.facebook.com/sharer.php?u='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="twi-facebook-f"></i></a>'; }
                                    if(in_array(2, $blog_single_socials)){ echo '<a target="_blank" href="https://twitter.com/intent/tweet?url='.get_the_permalink().'&text='.esc_url(get_the_title()).'"><i class="twi-twitter"></i></a>'; }
                                    if(in_array(3, $blog_single_socials)){ echo '<a target="_blank" href="mailto:?subject='.get_the_permalink().'"><i class="twi-envelope"></i></a>'; }
                                    if(in_array(4, $blog_single_socials)){ echo '<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="twi-linkedin-in"></i></a>'; }
                                    if(in_array(5, $blog_single_socials)){ echo '<a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media='.get_the_post_thumbnail_url(get_the_ID(), 'full').'&url='.get_the_permalink().'&is_video=false&description='.esc_url(get_the_title()).'"><i class="twi-pinterest-p"></i></a>'; }
                                    if(in_array(6, $blog_single_socials)){ echo '<a target="_blank" href="https://api.whatsapp.com/send?text='.get_the_permalink().'"><i class="twi-whatsapp"></i></a>'; }
                                    if(in_array(7, $blog_single_socials)){ echo '<a target="_blank" href="https://digg.com/submit?url='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="twi-digg"></i></a>'; }
                                    if(in_array(8, $blog_single_socials)){ echo '<a target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="twi-tumblr"></i></a>'; }
                                    if(in_array(9, $blog_single_socials)){ echo '<a target="_blank" href="https://reddit.com/submit?url='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="twi-reddit-alien"></i></a>'; }
                                ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($blog_single_is_author_box == 1): ?>
                <div class="post_author clearfix">
                    <img src="<?php echo organia_get_author_avater_url(get_the_author_meta('ID'), 155, 155) ?>" alt="<?php echo get_the_author(); ?>"/>
                    <h5><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></h5>
                    <?php if(get_the_author_meta('description') != ''): ?>
                        <p>
                            <?php echo wp_strip_all_tags(get_the_author_meta('description')); ?>
                        </p>
                    <?php endif; ?>
                    <?php
                        $_user_facebook = get_the_author_meta('_user_facebook', get_the_author_meta('ID'));
                        $_user_twitter = get_the_author_meta('_user_twitter', get_the_author_meta('ID'));
                        $_user_instagram = get_the_author_meta('_user_instagram', get_the_author_meta('ID'));
                        $_user_vimeo = get_the_author_meta('_user_vimeo', get_the_author_meta('ID'));
                        $_user_linkedin = get_the_author_meta('_user_linkedin', get_the_author_meta('ID'));
                        $_user_pinterest = get_the_author_meta('_user_pinterest', get_the_author_meta('ID'));
                        $_user_dribbble = get_the_author_meta('_user_dribbble', get_the_author_meta('ID'));
                        $_user_behance = get_the_author_meta('_user_behance', get_the_author_meta('ID'));
                        $_user_youtube = get_the_author_meta('_user_youtube', get_the_author_meta('ID'));
                        if($_user_facebook != '' || $_user_twitter != '' || $_user_instagram != '' || $_user_vimeo != '' || $_user_linkedin != '' || $_user_pinterest != '' || $_user_dribbble != '' || $_user_behance != '' || $_user_youtube != ''):
                    ?>
                    <div class="pusocial">
                        <?php if($_user_facebook != ''): ?>
                        <a href="<?php echo esc_url($_user_facebook); ?>"><i class="twi-facebook-f"></i></a>
                        <?php endif; if($_user_twitter != ''): ?>
                        <a href="<?php echo esc_url($_user_twitter); ?>"><i class="twi-twitter"></i></a>
                        <?php endif; if($_user_instagram != ''): ?>
                        <a href="<?php echo esc_url($_user_instagram); ?>"><i class="twi-instagram"></i></a>
                        <?php endif; if($_user_vimeo != ''): ?>
                        <a href="<?php echo esc_url($_user_vimeo); ?>"><i class="twi-vimeo-v"></i></a>
                        <?php endif; if($_user_linkedin != ''): ?>
                        <a href="<?php echo esc_url($_user_linkedin); ?>"><i class="twi-linkedin-in"></i></a>
                        <?php endif; if($_user_pinterest != ''): ?>
                        <a href="<?php echo esc_url($_user_pinterest); ?>"><i class="twi-pinterest-p"></i></a>
                        <?php endif; if($_user_dribbble != ''): ?>
                        <a href="<?php echo esc_url($_user_dribbble); ?>"><i class="twi-dribbble"></i></a>
                        <?php endif; if($_user_behance != ''): ?>
                        <a href="<?php echo esc_url($_user_behance); ?>"><i class="twi-behance"></i></a>
                        <?php endif; if($_user_youtube != ''): ?>
                        <a href="<?php echo esc_url($_user_youtube); ?>"><i class="twi-youtube"></i></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($blog_is_related == 1): ?>
                <div class="relatedPostArea">
                    <?php if($blog_related_title != ''): ?>
                        <h2><?php echo esc_html($blog_related_title); ?></h2>
                    <?php endif; ?>
                    <?php if(function_exists('organia_related_posts')): organia_related_posts(get_the_ID(), $blog_rel_num_of_item); endif; ?>
                </div>
                <?php endif; ?>
                <?php if ( comments_open() || get_comments_number() ): ?>
                    <div class="comment_area">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(is_active_sidebar('sidebar-1') && $blog_single_sidebar == 3): ?>
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
    $single_blog_bloks = get_theme_mod('blog_single_bloks', '');
    $blocks_id = array();
    if(!empty($single_blog_bloks)){
        foreach($single_blog_bloks as $sb):
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