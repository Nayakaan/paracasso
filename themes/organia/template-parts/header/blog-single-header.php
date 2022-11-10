<?php
    global $post;
    $author_id = $post->post_author;
    $post_id = $post->ID;

    $blog_single_banner_style       = get_theme_mod('blog_single_banner_style', 1);
    $blog_single_banner_title       = get_theme_mod('blog_single_banner_title', '');
    $blog_single_is_breadcrumb      = get_theme_mod('blog_single_is_breadcrumb', 1);
    $pages_is_layer                 = get_theme_mod('post_pages_is_layer', 2);
    $layer_image                    = get_theme_mod('post_layer_image', '');
    $banner_animated_image          = get_theme_mod('post_banner_animated_image', '');
    $blog_single_banner_alignment   = get_theme_mod('blog_single_banner_alignment', 'center');
    $blog_single_banner_title       = ($blog_single_banner_title != '' ? $blog_single_banner_title : get_the_title());
    
    $bgi_css = '';
    $bgc_css = '';
    if(defined('FW')):
        $blog_si_is_settings        = fw_get_db_post_option(get_the_ID(), 'blog_si_is_settings', 2);
        $blog_si_is_banner          = fw_get_db_post_option(get_the_ID(), 'blog_si_is_banner', 1);
        $blog_si_banner_style       = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_style', 1);
        $blog_si_banner_bg          = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_bg', array());
        $blog_si_banner_bg_color    = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_bg_color', '');
        $blog_si_banner_title       = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_title', '');
        $blog_si_is_breadcrumb      = fw_get_db_post_option(get_the_ID(), 'blog_si_is_breadcrumb', 1);
        $blog_si_banner_alignment   = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_alignment', 'center');
        
        if($blog_si_is_settings == 1):
            $blog_single_banner_title  = ($blog_si_banner_title != '' ? $blog_si_banner_title : $blog_single_banner_title);
            $blog_single_is_breadcrumb = ($blog_si_is_breadcrumb > 0 ? $blog_si_is_breadcrumb : $blog_single_is_breadcrumb);
            $blog_single_banner_style  = ($blog_si_banner_style > 0 ? $blog_si_banner_style : $blog_single_banner_style);
            
            $blog_single_banner_alignment = ($blog_si_banner_alignment != '' ? $blog_si_banner_alignment : $blog_single_banner_alignment);
            
            if(isset($blog_si_banner_bg['url']) && $blog_si_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$blog_si_banner_bg['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover;';
            endif;
            if(isset($blog_si_banner_bg_color) && $blog_si_banner_bg_color != ''):
                $bgc_css = 'background-color: '.$blog_si_banner_bg_color.';';
            endif;
        endif;
    endif;
    $gallery_images = array();
    if(defined('FW')){
        $gallery_images = fw_get_db_post_option($post_id, 'gallery_images', array());
    }
    if($blog_single_banner_style == 2):
    ?>
    <section class="page_banner blog_details_banner sb_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <?php if(!empty($gallery_images)): ?>
            <div id="sppostCarousel_<?php echo get_the_ID(); ?>" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    <?php $i = 1; foreach($gallery_images as $gall): ?>
                    <?php
                        $attachment_id = (isset($gall['attachment_id']) && $gall['attachment_id'] > 0 ? $gall['attachment_id'] : 0);
                        if($attachment_id > 0):
                        ?>  
                        <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?>">
                            <img src="<?php echo organia_attachment_url($attachment_id, 1920, 860); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        </div>
                        <?php
                        $i++;
                        endif;
                    ?>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#sppostCarousel_<?php echo get_the_ID(); ?>" role="button" data-slide="prev">
                    <i class="twi-chevron-left2"></i>
                </a>
                <a class="carousel-control-next" href="#sppostCarousel_<?php echo get_the_ID(); ?>" role="button" data-slide="next">
                    <i class="twi-chevron-right2"></i>
                </a>
            </div>
        <?php else: ?>
            <?php if(has_post_thumbnail()): ?>
                <div class="galImg">
                    <img src="<?php echo organia_post_thumbnail(get_the_ID(), 1920, 860); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                </div>
            <?php endif; ?>
        <?php endif; ?>
       <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bannerContent <?php echo esc_attr($blog_single_banner_alignment); ?>">
                        <p>
                            <?php
                                $terms = get_the_terms(get_the_ID(), 'category');
                                $cats = '';
                                if (is_array($terms) && count($terms) > 0){
                                    $c = 1;
                                    $count = count($terms);
                                    foreach ($terms as $term){?>
                                        <a href="<?php echo esc_url(get_category_link($term->term_id)); ?>"><?php echo organia_kses($term->name); ?></a>
                                        <?php $c++;
                                    }
                                }
                            ?>
                       </p>
                       <h2 class="banner-title"><?php echo organia_kses($blog_single_banner_title); ?></h2>
                       <div class="bmeta">
                            <span><i class="twi-calendar-alt1"></i><?php echo esc_html__('By ', 'organia'); ?> <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a></span>-<span><i class="twi-comment"></i><?php echo comments_number( esc_html__('0 Comment', 'organia'), esc_html__('1 Comment', 'organia'), '% '.esc_html__('Comments', 'organia') ); ?></span>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </section>
    <?php else: ?>
    <section class="page_banner sb_banner" style="<?php echo esc_attr($bgi_css.$bgc_css) ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12 text-<?php echo esc_attr($blog_single_banner_alignment); ?>">
                    <h2 class="banner-title"><?php echo organia_kses($blog_single_banner_title); ?></h2>
                    <?php if($blog_single_is_breadcrumb == 1): ?>
                        <?php echo organia_kses(organia_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>