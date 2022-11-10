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
    echo '<div class="row fixed_services">';
        $i = 0;
        while ($service->have_posts()):
            $service->the_post();
            $service_sub_title = '';
            if(defined('FW')){
                $service_sub_title  = fw_get_db_post_option(get_the_ID(), 'service_sub_title', '');
            }
            $w = '';
            $h = '';
            if($column == 2){
                $w = '288';
                $h = '288';
            }else{
                $w = '400';
                $h = '400';
            }
            ?>
            <div class="<?php echo esc_attr($columns); ?>">
                <div class="cateItem02 text-<?php echo esc_attr($align); ?>">
                    <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>"></a>
                    <div class="cate_content">
                        <a class="cate" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        <?php if($service_sub_title != ''): ?>
                            <span><?php echo organia_kses($service_sub_title); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        endwhile;
    echo '</div>';
endif;
wp_reset_postdata();
