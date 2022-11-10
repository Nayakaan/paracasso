<?php
    $productIds = [];
    foreach($pd_deal_list_1 as $dp):
        if(isset($dp['pd_product']) && $dp['pd_product'] > 0):
            $productIds[] = $dp['pd_product'];
        endif;
    endforeach;
    $w = ($pd_thumb_width > 0 ? $pd_thumb_width : 252);
    $h = ($pd_thumb_height > 0 ? $pd_thumb_height : 206);
?>
<?php if(!empty($pd_deal_list_1) && !empty($productIds)): ?>
    <div class="dealarea woocommerce">
        <?php if(!empty($pd_title)): ?>
            <h3><?php echo esc_html($pd_title); ?></h3>
        <?php endif; ?>
        <div class="dealSlider owl-carousel">
            <?php 
                foreach($pd_deal_list_1 as $dp):
                    $pd_product = (isset($dp['pd_product']) && $dp['pd_product'] > 0 ? $dp['pd_product'] : 0);
                    $pd_deal_end = (isset($dp['pd_deal_end']) && !empty($dp['pd_deal_end']) ? $dp['pd_deal_end'] : '');
                    
                    $pd_available_product = (isset($dp['pd_available_product']) && !empty($dp['pd_available_product']) ? $dp['pd_available_product'] : '');
                    $pd_sold_product = (isset($dp['pd_sold_product']) && !empty($dp['pd_sold_product']) ? $dp['pd_sold_product'] : '');
                    
                    $pd_available_label = (isset($dp['pd_available_label']) && !empty($dp['pd_available_label']) ? $dp['pd_available_label'] : '');
                    $pd_sold_label = (isset($dp['pd_sold_label']) && !empty($dp['pd_sold_label']) ? $dp['pd_sold_label'] : '');
                    
                    if($pd_product > 0 && !empty($pd_deal_end)):
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
                                
                                $d = (!empty($pd_deal_end) ? date('d', strtotime($pd_deal_end)) : 01);
                                $m = (!empty($pd_deal_end) ? date('m', strtotime($pd_deal_end)) : 01);
                                $y = (!empty($pd_deal_end) ? date('Y', strtotime($pd_deal_end)) : 2025);
                                ?>
                                <div class="dealProduct01">
                                    <div class="productItem02">
                                        <div class="proThumb">
                                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                        </div>
                                        <div class="product_content">
                                            <div class="ratings">
                                                <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                                                    <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                                        <?php echo woocommerce_template_loop_rating(); ?>
                                                        <span class="rating-count">(<?php echo $product->get_review_count(); ?>)</span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                            <div class="pi01Price">
                                                <?php echo $product->get_price_html() ?>
                                            </div>
                                        </div>
                                        <div class="countdown_dashboard commoncount clearfix" data-format="<?php echo esc_attr($pd_time_format); ?>" data-day="<?php echo esc_attr($d); ?>" data-month="<?php echo esc_attr($m); ?>" data-year="<?php echo esc_attr($y); ?>"></div>
                                    </div>
                                    <?php if($pd_available_product != ''): ?>
                                        <div class="pstock"><?php echo esc_html($pd_available_label); ?> <?php echo esc_html($pd_available_product); ?></div> 
                                    <?php endif; ?>
                                    <?php if(!empty($pd_sold_product)): ?>
                                        <div class="psold"><?php echo esc_html($pd_sold_label); ?> <span><?php echo $pd_sold_product; ?></span></div>
                                    <?php endif; ?>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    endif;
                endforeach; 
            ?>
        </div>
    </div>
<?php endif; ?>