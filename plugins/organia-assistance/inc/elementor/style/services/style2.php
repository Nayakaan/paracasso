<?php
$sers = array(
    'post_type'         => 'service',
    'post_status'       => 'publish',
    'posts_per_page'    => $serv_post_item,
    'orderby'           => $serv_order_by,
    'order'             => $serv_order
);

if (($key = array_search(0, $serv_specific)) !== false) {
    unset($serv_specific[$key]);
}
if(!empty($serv_specific)){
    $sers['post__in'] = $serv_specific;
}
$service = new WP_Query($sers);
if($service->have_posts()):
    ?>
    <div class="lb_slider_wrap" 
        data-autoplay="<?php echo ($autoplay == 'yes' ? 1 : 2) ?>" 
        data-loop="<?php echo ($loop == 'yes' ? 1 : 2) ?>" 
        data-nav="<?php echo ($nav == 'yes' ? 1 : 2) ?>" 
        data-dots="<?php echo ($dots == 'yes' ? 1 : 2) ?>" 
        >
       <div class="sp_slider owl-carousel">
           <?php 
               $i = 1;
               while($service->have_posts()):
                   $service->the_post();
                   $service_sub_title = '';
                    if(defined('FW')){
                        $service_sub_title  = fw_get_db_post_option(get_the_ID(), 'service_sub_title', '');
                    }
                    ?>
                    <div class="cateItem02 text-<?php echo esc_attr($align); ?>">
                        <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo organia_post_thumbnail(get_the_ID(), 288, 288); ?>" alt="<?php echo get_the_title(); ?>"></a>
                        <div class="cate_content">
                            <a class="cate" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            <?php if($service_sub_title != ''): ?>
                                <span><?php echo organia_kses($service_sub_title); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
               endwhile;
           ?>
       </div>
   </div>
    <?php
endif;
wp_reset_postdata();