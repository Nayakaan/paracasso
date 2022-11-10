<?php
if (($key = array_search(0, $folio_category)) !== false) {
    unset($folio_category[$key]);
}
if (($key = array_search(0, $pfs_folio)) !== false) {
    unset($pfs_folio[$key]);
}
$fargs = array(
    'post_type'         => 'gallery',
    'post_status'       => 'publish',
    'posts_per_page'    => $folio_no_item,
    'orderby'           => $folio_order_by,
    'order'             => $folio_order
);
if(!empty($folio_category)){
    $fargs['tax_query'] = array(
        'relation'      => 'AND', 
        array(
            'taxonomy'  => 'gallery_cat', 
            'field'     => 'id', 
            'terms'     => $folio_category,
            'operator'  => 'IN'
        )
    );
}
if(!empty($pfs_folio)){
    $fargs['post__in'] = $pfs_folio;
}
$farg = new WP_Query($fargs);
if($farg->have_posts()):
?>
<div class="folio_slider_wrap" 
    data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
    data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
    data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
    data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
    data-gapping="<?php echo esc_attr($gapping); ?>"
    >
    <div class="folio_slider owl-carousel">
        <?php
        while($farg->have_posts()): 
            $farg->the_post();
            ?>
            <div class="gallerItem_2">
                <img src="<?php echo makeover_post_thumbnail(get_the_ID(), 380, 500); ?>" alt="<?php echo get_the_title(); ?>">
                <div class="galleryItem_2_btn">
                    <a class="popup_img" href="<?php echo makeover_post_thumbnail(get_the_ID(), 'full'); ?>"><i class="icofont-search"></i></a>
                    <a href="<?php echo get_the_permalink(); ?>"><i class="icofont-link-alt"></i></a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php 
endif;
wp_reset_postdata();