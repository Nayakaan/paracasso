<?php
if (($key = array_search(0, $lb_category)) !== false) {
    unset($lb_category[$key]);
}

$querys = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $lb_post_item,
    'orderby'           => $lb_order_by,
    'order'             => $lb_order
);
if(!empty($lb_category)){
    $querys['tax_query']   = array(
        'relation'      => 'AND', 
        array(
            'taxonomy'  => 'category', 
            'field'     => 'id', 
            'terms'     => $lb_category,
            'operator'  => 'IN'
        )
    );
}

$qp = new WP_Query($querys);
if($qp->have_posts()): ?>
    <div class="row <?php if($lb_is_masnry == 'yes'): ?>grid<?php endif; ?>">
        <?php 
            $i = 1;
            while($qp->have_posts()):
                $qp->the_post();
                if($lb_post_style == 2):
                    if($lb_is_masnry == 'yes' && $i == 2):
                        ?><div class="col-lg-6 col-md-6 grid-item shaff_empty_item d-none d-md-block"></div><?php
                    endif;
                    ?>
                    <div class="col-lg-6 col-md-6 <?php if($lb_is_masnry == 'yes'): ?>grid-item<?php endif; ?>">
                        <div class="blogItem02">
                            <div class="blogThumb">
                                <img src="<?php echo organia_post_thumbnail(get_the_ID(), 301, 226) ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="blogContent">
                                <div class="bmeta"><i class="twi-clock2"></i><?php echo get_the_time('F j Y'); ?></div>
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            </div>
                        </div>
                    </div>
                <?php
                elseif($lb_post_style == 3):
                    ?>
                    <div class="col-md-6 <?php if($lb_is_masnry == 'yes'): ?>grid-item<?php endif; ?>">
                        <div class="blogItem02 bi04">
                            <div class="blogThumb">
                                <img src="<?php echo organia_post_thumbnail(get_the_ID(), 358, 321) ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="blogContent">
                                <div class="bmeta"><i class="twi-clock2"></i><?php echo get_the_time('F j Y'); ?></div>
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            </div>
                        </div>
                    </div>
                <?php
                else:
                    ?>
                    <div class="col-lg-4 col-md-6 <?php if($lb_is_masnry == 'yes'): ?>grid-item<?php endif; ?>">
                        <div class="blogItem01">
                            <div class="blogThumb">
                                <img src="<?php echo organia_post_thumbnail(get_the_ID(), 420, 272) ?>" alt="<?php echo get_the_title(); ?>">
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
                    <?php
                endif;
                $i++;
            endwhile;
        ?>
    </div>
<?php endif;
wp_reset_postdata();
