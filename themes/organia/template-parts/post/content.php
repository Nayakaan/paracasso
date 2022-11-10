<?php
$blog_view       = get_theme_mod('blog_view', 1);
$blog_sidebar    = get_theme_mod('blog_sidebar', 3);
$blog_str_limit  = get_theme_mod('blog_str_limit', 309);


$blog_readmore  = get_theme_mod('blog_readmore_label', esc_html__('Read More', 'organia'));

$blog_sidebar = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1') ? '1' : $blog_sidebar);

if($blog_sidebar == 1){
    $col = 'col-lg-4 col-md-6'; 
}else {
   $col = 'col-lg-6 col-md-6'; 
}

if($blog_view == 2):
?>
<div class="<?php echo esc_attr($col); ?>">
    <div class="blogItem01 mb70">
        <div class="blogThumb">
            <img src="<?php echo organia_post_thumbnail(get_the_ID(), 480, 310); ?>" alt="<?php echo get_the_title(); ?>">
            <div class="blogDate"><?php echo get_the_time('d M'); ?></div>
        </div>
        <div class="blogContent">
            <div class="bmeta">
                <span><i class="twi-calendar-alt1"></i><?php echo esc_html__('By ', 'organia'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>-<span><i class="twi-comment"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo comments_number( esc_html__('0 Comment', 'organia'), esc_html__('1 Comment', 'organia'), '% '.esc_html__('Comments', 'organia') ); ?></a></span>
            </div>
            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
        </div>
    </div>
</div>
<?php else:  
if($blog_sidebar != 1){
    $c = 'col-lg-12'; 
    $w = 970;
    $h = 511;
}else{
    $c = 'col-lg-9'; 
    $w = 982;
    $h = 550;
}
?>
<div class="<?php echo esc_attr($c); ?>">
    <div class="blogItem01 standard  <?php if(is_sticky()){ echo 'featured_post';} ?> <?php if(!has_post_thumbnail()): ?>noThumb<?php endif; ?>">
        <?php if(has_post_thumbnail()): ?>
        <div class="blogThumb">
            <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
            <div class="blogDate"><?php echo get_the_time('d M'); ?></div>
        </div>
        <?php endif; ?>
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
</div>
<?php endif; ?>