<?php if(!empty($pd_deal_list_2)): ?>
    <div class="row">
        <?php if(!empty($pd_sub_title) || !empty($pd_title)): ?>
        <div class="col-lg-5 col-md-5">
            <?php if(!empty($pd_sub_title)): ?>
            <div class="subTitle sbsm"><?php echo esc_html($pd_sub_title); ?></div>
            <?php endif; ?>
            <?php if(!empty($pd_title)): ?>
            <h2 class="secTitle"><?php echo esc_html($pd_title); ?></h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if(!empty($pd_deal_end_date)): ?>
        <div class="col-lg-4 col-md-4">
            <div class="offerexpire">
                <?php if(!empty($pd_date_label)): ?>
                <p><i class="twi-clock2"></i><?php echo esc_html($pd_date_label); ?></p>
                <?php endif; ?>
                <?php
                    $d = (!empty($pd_deal_end_date) ? date('d', strtotime($pd_deal_end_date)) : '31');
                    $m = (!empty($pd_deal_end_date) ? date('m', strtotime($pd_deal_end_date)) : '12');
                    $y = (!empty($pd_deal_end_date) ? date('Y', strtotime($pd_deal_end_date)) : '2022');
                ?>
                <div class="countdown_dashboard_two clearfix" data-format="<?php echo esc_attr($pd_time_format); ?>" data-day="<?php echo esc_attr($d); ?>" data-month="<?php echo esc_attr($m); ?>" data-year="<?php echo esc_attr($y); ?>"></div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($pd_btn_label)): ?>
        <div class="col-lg-3 col-md-3 text-right">
            <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>" class="organ_btn dealBtn1"><?php echo esc_html($pd_btn_label); ?><i class="twi-arrow-right1"></i></a>
        </div>
        <?php endif; ?>
    </div>
    <div class="row woocommerce">
        <?php 
            $w = ($pd_thumb_width > 0 ? $pd_thumb_width : 247);
            $h = ($pd_thumb_height > 0 ? $pd_thumb_height : 183);
            
            foreach($pd_deal_list_2 as $dp):
                $pd_product = (isset($dp['pd_product']) && $dp['pd_product'] > 0 ? $dp['pd_product'] : 0);

                $pd_available_product = (isset($dp['pd_available_product']) && !empty($dp['pd_available_product']) ? $dp['pd_available_product'] : '');
                $pd_sold_product = (isset($dp['pd_sold_product']) && !empty($dp['pd_sold_product']) ? $dp['pd_sold_product'] : '');

                $pd_price_suffix = (isset($dp['pd_price_suffix']) && !empty($dp['pd_price_suffix']) ? $dp['pd_price_suffix'] : '');

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
                            
                            $terms = get_the_terms(get_the_ID(), 'product_cat');
                            $cat_name = '';
                            if (!empty($terms) && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    $cat_name = '<a class="prname" href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
                                }
                            }
                            ?>
                            <div class="col-lg-<?php echo round(12/$pd_col_per_row); ?> col-md-6">
                                <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
                                    <div class="productItem05">
                                        <div class="proThumb05">
                                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                            <?php echo organia_kses($cat_name) ?>
                                            <?php echo(function_exists('organia_product_flash_notice_label') && $is_flash_label == 'yes' ? organia_product_flash_notice_label() : '') ?>
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
                                        <div class="product_content05">
                                            <?php if($is_progress_bar == 'yes'): ?>
                                            <div class="pro-quantity">
                                                <div class="progress">
                                                    <?php
                                                        $percent = 10;
                                                        if(!empty($pd_available_product) && !empty($pd_sold_product)):
                                                            $percent = ($pd_sold_product / $pd_available_product) * 100;
                                                        endif;
                                                    ?>
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($percent); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent; ?>%"></div>
                                                </div>
                                                <?php if(!empty($pd_available_product) && !empty($pd_sold_product)): ?>
                                                <p class="available"><?php echo (!empty($pd_sold_label) ? $pd_sold_label : ''); ?> <span><?php echo esc_attr($pd_sold_product); ?>/<?php echo esc_attr($pd_available_product); ?></span></p>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>
                                            <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                            <div class="pi01Price">
                                                <?php echo $product->get_price_html(); ?>
                                                <?php if(!empty($pd_price_suffix)): ?> 
                                                    <?php echo '<span class="priceSuffix">('.$pd_price_suffix.')</span>'; ?>
                                                <?php endif; ?>
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
<?php endif; ?>