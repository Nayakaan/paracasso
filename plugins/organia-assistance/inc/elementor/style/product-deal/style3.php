<?php if(!empty($pd_deal_list_3)): ?>
    <div class="row">
        <?php if(!empty($pd_sub_title) || !empty($pd_title)): ?>
        <div class="col-md-8">
            <?php if(!empty($pd_sub_title)): ?>
                <div class="subTitle sbsm"><?php echo esc_html($pd_sub_title); ?></div>
            <?php endif; ?>
            <?php if(!empty($pd_title)): ?>
                <h2 class="secTitle"><?php echo esc_html($pd_title); ?></h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if(!empty($pd_deal_end_date)): ?>
        <div class="col-md-4">
            <?php
                $d = (!empty($pd_deal_end_date) ? date('d', strtotime($pd_deal_end_date)) : '31');
                $m = (!empty($pd_deal_end_date) ? date('m', strtotime($pd_deal_end_date)) : '12');
                $y = (!empty($pd_deal_end_date) ? date('Y', strtotime($pd_deal_end_date)) : '2022');
            ?>
            <div class="countdown_dashboard_three commoncount clearfix" data-format="<?php echo esc_attr($pd_time_format); ?>" data-day="<?php echo esc_attr($d); ?>" data-month="<?php echo esc_attr($m); ?>" data-year="<?php echo esc_attr($y); ?> "></div>
        </div>
        <?php endif; ?>
    </div>
    <div class="row woocommerce">
        <?php 
            $w = ($pd_thumb_width > 0 ? $pd_thumb_width : 164);
            $h = ($pd_thumb_height > 0 ? $pd_thumb_height : 154);
            foreach($pd_deal_list_3 as $dp):
                $pd_product = (isset($dp['pd_product']) && $dp['pd_product'] > 0 ? $dp['pd_product'] : 0);

                if($pd_product > 0):
                    $query_args = [
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'post__in' => array($pd_product)
                    ];

                    $tw_post = new WP_Query($query_args);
                    if ($tw_post->have_posts()):
                        while ($tw_post->have_posts()):
                            $tw_post->the_post();
                            $product = wc_get_product(get_the_ID());
                            
                            ?>
                            <div class="col-lg-<?php echo round(12/$pd_col_per_row); ?> col-md-4">
                                <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
                                    <div class="productItem08">
                                        <div class="proThumb08">
                                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                            <div class="piActionBtns">
                                                <?php if($show_cart == 'yes'): ?>
                                                    <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                                                <?php endif; ?>
                                                <?php if($show_quickview == 'yes'): ?>
                                                    <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                                                <?php endif; ?>
                                                <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $show_wishlist == 'yes'): ?>
                                                    <div class="wishlist">
                                                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($show_compare == 'yes'): ?>
                                                    <?php organia_compare_add_product_url(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="product_content08">
                                            <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                            <div class="pi01Price">
                                                <?php echo $product->get_price_html(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                endif;
            endforeach;
        ?>
    </div>
    <?php if(!empty($pd_btn_label)): ?>
    <div class="row">
        <div class="col-md-12">
            <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>" class="organ_btn ob02"><?php echo esc_html($pd_btn_label); ?><i class="twi-arrow-right1"></i></a>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>