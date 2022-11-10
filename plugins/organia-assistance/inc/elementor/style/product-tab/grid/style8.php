<?php
$tabs_id = uniqid('tw-tabs-');
if (!empty($pr_tab_list)): ?>
    <div class="org_prodocut_tab woocommerce">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav org_pro_tab aligns-<?php echo esc_attr($pr_tab_item_alignment); ?> <?php if($tw_tab_style == 3): ?>grNavigation<?php endif; ?><?php if($tw_tab_style == 4): ?>orgoTab04<?php endif; ?>" id="<?php echo esc_attr($tabs_id); ?>" role="tablist">
                    <?php
                    $i = 1;
                    foreach ($pr_tab_list as $key => $pr_tab):
                        $tab_title     = (isset($pr_tab['pro_tab_title']) && !empty($pr_tab['pro_tab_title']) ? $pr_tab['pro_tab_title'] : '');
                        $pro_tab_title = str_replace(['{', '}'], ['<span>', '</span>'], $tab_title);
                        $tab_icon      = (isset($pr_tab['tab_icon']) && !empty($pr_tab['tab_icon']) ? $pr_tab['tab_icon'] : '');
                        if (!empty($pro_tab_title)):
                            ?>
                            <li class="nav-item tabStyle_<?php echo $tw_tab_style; ?>">
                                <a class="<?php if ($i == 1) {
                                    echo 'active';
                                } ?>" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>-tab" data-toggle="tab" href="#<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" role="tab" aria-controls="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" aria-selected="<?php if ($i != 1) {
                                    echo 'false';
                                } else {
                                    echo 'true';
                                } ?>">
                                    <?php if ($tw_tab_style == 2 || $tw_tab_style == 3): ?>
                                        <?php echo wp_kses_post($pro_tab_title); ?>
                                    <?php elseif($tw_tab_style == 4): ?>
                                        <?php if($tab_icon != ''): ?><i class="<?php echo esc_attr($tab_icon); ?>"></i><?php endif; ?>
                                        <?php echo wp_kses_post($pro_tab_title); ?>
                                    <?php else: ?>
                                        <span><?php echo wp_kses_post($pro_tab_title); ?></span>
                                        <span><?php echo wp_kses_post($pro_tab_title); ?></span>
                                    <?php endif; ?>
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
                $w = ($tw_thumb_width > 0 ? $tw_thumb_width : 282);
                $h = ($tw_thumb_height > 0 ? $tw_thumb_height : 263);
                ?>
                <div class="tab-pane fade <?php if ($i == 1) {
                    echo ' active show ';
                } ?>" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>-tab">
                    <div class="row woocommerce <?php echo($enable_round_corner == 'yes' ? 'hasRoundedCorner' : ''); ?>">
                        <?php if ($tw_post->have_posts()): ?>
                            <?php while ($tw_post->have_posts()): ?>
                                <?php $tw_post->the_post(); ?>
                                <?php $product = wc_get_product(get_the_ID()); ?>
                                <?php
                                $_secondary_image = fw_get_db_post_option(get_the_ID(), '_secondary_image', array());
                                $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

                                $_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
                                $unit_html = ($show_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">' . esc_html($_product_pricing_unit) . '</span>' : '');
                                ?>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'product_cat');
                                $cat_name = '';
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        $cat_name = '<a class="prname" href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
                                    }
                                }
                                ?>
                                <div class="col-xl-<?php echo round(12 / $tw_col_per_row); ?> col-lg-4 col-md-6 <?php echo(function_exists('organia_check') && $enable_round_corner == 'yes' ? organia_check($count) : 'odd'); ?>">
                                    <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
                                        <div class="productItem09 text-center">
                                            <div class="pi09Top">
                                                <div class="piThumb09">
                                                    <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                                    <?php echo(function_exists('organia_product_flash_notice_label') && $show_flashlabels == 'yes' ? organia_product_flash_notice_label() : '') ?>
                                                    <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $show_wishlist == 'yes'): ?>
                                                        <div class="wishlist">
                                                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="piActionBtns09">
                                                    <?php if ($show_quickview == 'yes'): ?>
                                                        <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                                                    <?php endif; ?>
                                                    <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                                                    <?php if ($show_compare == 'yes'): ?>
                                                        <?php organia_compare_add_product_url(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="pi09Content">
                                                <div class="ratings">
                                                    <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                                                        <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                                            <?php echo woocommerce_template_loop_rating(); ?>
                                                            <span class="rating-count">(<?php echo $product->get_review_count(); ?>)</span>
                                                        <?php endif; ?>
                                                    <?php elseif ($show_empty_rating == 'yes'): ?>
                                                        <div class="star-rating"></div>
                                                        <span class="rating-count">(0)</span>
                                                    <?php endif; ?>
                                                </div>
                                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                                <div class="pi01Price">
                                                    <?php echo $product->get_price_html() ?>
                                                    <?php echo $unit_html; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $count++; endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                $i++;
            endforeach
            ?>
        </div>
    </div>
<?php endif;