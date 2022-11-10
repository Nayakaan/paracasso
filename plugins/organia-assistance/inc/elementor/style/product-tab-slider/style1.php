<?php
$tabs_id = uniqid('tw-tabs-');
if (!empty($pr_tab_list)): ?>
    <div class="org_prodocut_tab woocommerce">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav org_pro_tab orgoTab05" id="<?php echo esc_attr($tabs_id); ?>" role="tablist">
                    <?php
                    $i = 1;
                    foreach ($pr_tab_list as $key => $pr_tab):
                        $tab_title       = (isset($pr_tab['pro_tab_title']) && !empty($pr_tab['pro_tab_title']) ? $pr_tab['pro_tab_title'] : '');
                        $tab_number      = (isset($pr_tab['pro_tab_number_title']) && !empty($pr_tab['pro_tab_number_title']) ? $pr_tab['pro_tab_number_title'] : '');
                        if (!empty($tab_title)):
                            ?>
                            <li class="nav-item tabStyle_<?php echo $tw_tab_style; ?>">
                                <a class="<?php if ($i == 1) {
                                    echo 'active';
                                } ?>" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>-tab" data-toggle="tab" href="#<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" role="tab" aria-controls="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" aria-selected="<?php if ($i != 1) {
                                    echo 'false';
                                } else {
                                    echo 'true';
                                } ?>">
                                    <?php if($tab_number != ''): ?><span><?php echo wp_kses_post($tab_number); ?></span><?php endif; ?>
                                    <?php echo wp_kses_post($tab_title); ?>
                                </a>
                            </li>
                            <?php
                            $i++;
                        endif;
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <?php
            $i = 1;
            foreach ($pr_tab_list as $key => $pr_tab):
                $query_args = [
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    'orderby' => $pr_tab['tw_order_by'],
                    'order' => $pr_tab['tw_order'],
                    'posts_per_page' => $pr_tab['tw_per_item'],
                ];

                if (!empty($pr_tab['tw_category'])) {
                    $query_args['tax_query'] = array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $pr_tab['tw_category'],
                            'operator' => 'IN'
                        )
                    );
                }

                if (!empty($pr_tab['tw_tag'])) {
                    if (isset($query_args['tax_query'])):
                        $query_args['tax_query'][] = array(
                            'taxonomy' => 'product_tag',
                            'field' => 'id',
                            'terms' => $pr_tab['tw_tag'],
                            'operator' => 'IN',
                        );
                    else:
                        $query_args['tax_query'] = array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_tag',
                                'field' => 'id',
                                'terms' => $pr_tab['tw_tag'],
                                'operator' => 'IN'
                            )
                        );
                    endif;
                }

                //Featured Product
                if ('2' === $pr_tab['tw_types']) {
                    if (isset($query_args['tax_query'])):
                        $query_args['tax_query'][] = array(
                            'taxonomy' => 'product_visibility',
                            'field' => 'name',
                            'terms' => 'featured',
                            'operator' => 'IN',
                        );
                    else:
                        $query_args['tax_query'] = array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_visibility',
                                'field' => 'name',
                                'terms' => 'featured',
                                'operator' => 'IN',
                            )
                        );
                    endif;
                }
                //On Sell product
                if ('3' === $pr_tab['tw_types']) {
                    $query_args['post__in'] = wc_get_product_ids_on_sale();
                }
                //Best Sell product
                if ('5' === $pr_tab['tw_types']) {
                    $query_args['orderby'] = 'meta_value_num';
                    $query_args['meta_key'] = 'total_sales';
                    $query_args['order'] = 'DESC';
                }
                if ($pr_tab['tw_types'] == '7' && !empty($pr_tab['tw_include'])) {
                    $query_args['post__in'] = $pr_tab['tw_include'];
                }
                if (!empty($pr_tab['tw_exclude'])) {
                    $query_args['post__not_in'] = $pr_tab['tw_exclude'];
                }
                if ($pr_tab['tw_offset']) {
                    $query_args['offset'] = $pr_tab['tw_offset'];
                }

                $tw_post = new WP_Query($query_args);
                $count = 1;
                $w = ($tw_thumb_width > 0 ? $tw_thumb_width : 664);
                $h = ($tw_thumb_height > 0 ? $tw_thumb_height : 515);
                ?>
                <div class="tab-pane fade <?php if ($i == 1) {
                    echo ' active show ';
                } ?>" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>-tab">
                    <?php if ($tw_post->have_posts()): ?>
                        <div class="org_product_carousel_wrap proGalSLiderWrap woocommerce"
                             data-autoplay="<?php echo($is_autopaly == 'yes' ? '1' : '0'); ?>"
                             data-loop="<?php echo($is_loop == 'yes' ? '1' : '0'); ?>"
                            >
                            <div class="progallerySLider" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>-slider">
                                <?php
                                while ($tw_post->have_posts()):
                                    $tw_post->the_post();
                                    $product  = wc_get_product(get_the_ID());
                                    $pr_title = get_the_title();
                                    $words = explode(' ', the_title('', '',  false));
                                    $words[1] = '<span>'.$words[1].'</span>';
                                    $title = implode(' ', $words);

                                    $_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
                                    $unit_html = ($show_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">' . esc_html($_product_pricing_unit) . '</span>' : '');
                                    ?>
                                    <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
                                        <div class="productItem11">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="product_content04">
                                                        <div class="pi01Price">
                                                            <?php echo $product->get_price_html() ?>
                                                            <?php echo $unit_html; ?>
                                                        </div>
                                                        <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                                        <p>
                                                            <?php 
                                                                if(has_excerpt()):
                                                                    echo substr(wp_strip_all_tags(get_the_excerpt()), 0, 60);
                                                                else:
                                                                    echo substr(wp_strip_all_tags(get_the_content()), 0, 60);
                                                                endif;
                                                            ?>
                                                        </p>
                                                        <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="proThumb04">
                                                        <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                                ?>
                            </div>
                            <div class="proGallerySliderThumb" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>-thumb">
                                <?php
                                while ($tw_post->have_posts()):
                                    $tw_post->the_post();
                                    $product = wc_get_product(get_the_ID());

                                    $_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
                                    $unit_html = ($show_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">' . esc_html($_product_pricing_unit) . '</span>' : '');
                                    ?>
                                    <div class="gsThumbItem">
                                        <img src="<?php echo organia_post_thumbnail(get_the_ID(), 100, 100); ?>" alt="<?php echo get_the_title(); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="300.000000pt" height="300.000000pt" viewBox="0 0 300.000000 300.000000" preserveAspectRatio="xMidYMid meet">
                                            <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)" stroke="none">
                                            <path d="M1328 2979 c-14 -14 -32 -19 -75 -19 -35 -1 -66 -6 -77 -15 -11 -8 -27 -15 -35 -15 -28 0 -151 -68 -228 -126 -106 -79 -398 -372 -522 -524 -30 -36 -57 -67 -60 -70 -12 -9 -131 -169 -131 -175 0 -4 -13 -24 -30 -45 -17 -21 -30 -45 -30 -53 0 -8 -7 -20 -15 -27 -8 -7 -15 -18 -15 -25 0 -7 -7 -18 -15 -25 -8 -7 -15 -23 -15 -35 0 -12 -7 -28 -15 -35 -8 -7 -15 -21 -15 -32 0 -11 -5 -29 -12 -41 -20 -37 -31 -116 -31 -227 0 -120 10 -196 29 -225 8 -11 14 -29 14 -41 0 -12 7 -27 15 -34 8 -7 15 -20 15 -30 0 -10 7 -23 15 -30 8 -7 15 -17 15 -23 0 -44 225 -329 419 -531 293 -303 460 -452 566 -501 136 -62 171 -68 410 -68 182 0 322 12 368 31 16 7 45 12 65 12 20 0 46 7 56 15 11 8 34 15 50 15 17 0 40 7 50 15 11 8 30 15 42 15 12 0 36 7 53 15 17 8 45 22 62 30 17 8 39 15 49 15 9 0 23 7 30 15 7 8 20 15 30 15 10 0 23 7 30 15 7 8 18 15 25 15 6 0 31 14 53 30 23 17 44 30 48 30 13 0 123 91 169 141 103 110 185 234 185 279 0 10 7 23 15 30 8 7 15 25 15 39 0 15 7 36 15 47 8 10 15 38 15 60 0 23 7 61 15 84 8 24 15 81 16 129 2 128 12 206 27 203 9 -1 12 43 12 194 0 165 -2 199 -15 208 -12 8 -17 40 -21 131 -3 66 -12 137 -20 158 -8 20 -14 54 -14 75 -1 20 -7 48 -15 62 -8 14 -14 35 -15 47 0 12 -7 34 -15 50 -7 15 -24 48 -35 73 -12 25 -30 59 -41 75 -10 17 -23 39 -28 50 -19 42 -252 265 -277 265 -4 0 -15 7 -24 15 -18 17 -84 54 -150 85 -25 11 -58 28 -73 35 -16 8 -37 15 -47 15 -9 0 -23 7 -30 15 -7 8 -25 15 -39 15 -15 0 -36 7 -47 15 -10 8 -32 15 -49 15 -16 0 -41 7 -55 15 -14 8 -40 14 -58 15 -18 0 -49 7 -69 15 -19 8 -59 15 -88 15 -72 0 -115 10 -115 26 0 11 -30 14 -157 13 -142 -1 -160 -3 -175 -20z"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                                ?>
                            </div>
                            <?php if($pl_btn_label != '' && $pl_btn_url != ''): ?>
                                <div class="rmBtn">
                                   <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>"><?php echo esc_html($pl_btn_label); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <?php
                $i++;
            endforeach
            ?>
        </div>
    </div>
<?php endif;