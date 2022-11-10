<?php if (!empty($pr_tab_list) || !empty($pr_tab_list_2)): ?>
    <?php
    $tags = [];
    $cats = [];
    ?>
    <div class="filter_grid_wrap">
        <div class="row">
            <?php if ($enable_title == 'yes' && $pr_tab_item_alignment == 'right'): ?>
                <div class="col-lg-5 text-<?php echo($pr_tab_item_alignment == 'right' ? 'left' : ($pr_tab_item_alignment == 'left' ? 'right' : 'center')) ?>">
                    <?php if (!empty($pr_area_subtitle)): ?>
                        <div class="subTitle"><?php echo esc_html($pr_area_subtitle); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($pr_area_title)): ?>
                        <h2 class="secTitle"><?php echo esc_html($pr_area_title); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="col-lg-<?php echo($enable_title == 'yes' && $pr_tab_item_alignment != 'center' ? 7 : 12); ?>">
                <?php if ($tw_tab_style == 2): ?>
                <ul class="filter_menu02 shaff_filter text-<?php echo esc_attr($pr_tab_item_alignment); ?> clearfix">
                    <?php else: ?>
                    <ul class="filter_menu03 shaff_filter text-<?php echo esc_attr($pr_tab_item_alignment); ?> clearfix">
                        <?php endif; ?>
                        <?php
                        if ($tw_filter_type == '2'):
                            if ($tw_tab_style == 2):
                                echo '<li class="active" data-group="all">' . $pro_filter_all_label . '</li>';
                            else:
                                echo '<li class="active" data-group="all"><span>' . $pro_filter_all_label . '</span><span>' . $pro_filter_all_label . '</span></li>';
                            endif;
                            foreach ($pr_tab_list_2 as $filter):
                                $pro_tab_title_2 = (isset($filter['pro_tab_title_2']) && !empty($filter['pro_tab_title_2']) ? $filter['pro_tab_title_2'] : '');
                                $tw_tag = (isset($filter['tw_tag']) && !empty($filter['tw_tag']) && $filter['tw_tag'] > 0 ? $filter['tw_tag'] : 0);
                                if ($tw_tag > 0):
                                    $tags[] = $tw_tag;
                                    $term = get_term_by('id', $tw_tag, 'product_tag');
                                    $pro_tab_title_2 = ($pro_tab_title_2 != '' ? $pro_tab_title_2 : $term->name);

                                    if ($tw_tab_style == 2):
                                        echo '<li data-group="' . $term->slug . '">' . $pro_tab_title_2 . '</li>';
                                    else:
                                        echo '<li data-group="' . $term->slug . '"><span>' . $pro_tab_title_2 . '</span><span>' . $pro_tab_title_2 . '</span></li>';
                                    endif;
                                endif;
                            endforeach;
                        else:
                            if ($tw_tab_style == 2):
                                echo '<li class="active" data-group="all">' . $pro_filter_all_label . '</li>';
                            else:
                                echo '<li class="active" data-group="all"><span>' . $pro_filter_all_label . '</span><span>' . $pro_filter_all_label . '</span></li>';
                            endif;
                            foreach ($pr_tab_list as $filter):
                                $pro_tab_title = (isset($filter['pro_tab_title']) && !empty($filter['pro_tab_title']) ? $filter['pro_tab_title'] : '');
                                $tw_category = (isset($filter['tw_category']) && !empty($filter['tw_category']) && $filter['tw_category'] > 0 ? $filter['tw_category'] : 0);
                                if ($tw_category > 0):
                                    $cats[] = $tw_category;
                                    $term = get_term_by('id', $tw_category, 'product_cat');
                                    $pro_tab_title = ($pro_tab_title != '' ? $pro_tab_title : $term->name);

                                    if ($tw_tab_style == 2):
                                        echo '<li data-group="' . $term->slug . '">' . $pro_tab_title . '</li>';
                                    else:
                                        echo '<li data-group="' . $term->slug . '"><span>' . $pro_tab_title . '</span><span>' . $pro_tab_title . '</span></li>';
                                    endif;
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </ul>
            </div>
            <?php if ($enable_title == 'yes' && $pr_tab_item_alignment == 'left'): ?>
                <div class="col-lg-5 text-<?php echo($pr_tab_item_alignment == 'right' ? 'left' : ($pr_tab_item_alignment == 'left' ? 'right' : 'center')) ?>">
                    <?php if (!empty($pr_area_subtitle)): ?>
                        <div class="subTitle"><?php echo esc_html($pr_area_subtitle); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($pr_area_title)): ?>
                        <h2 class="secTitle"><?php echo esc_html($pr_area_title); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row shaff_grid woocommerce <?php echo($enable_round_corner == 'yes' ? 'hasRoundedCorner' : ''); ?>">
            <?php
            $query_args = [
                'post_type' => 'product',
                'post_status' => 'publish',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'orderby' => $tw_order_by,
                'order' => $tw_order,
                'posts_per_page' => $tw_per_item,
            ];
            if ($tw_filter_type == '2'):
                if (!empty($tags)):
                    $query_args['tax_query'] = array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'product_tag',
                            'field' => 'id',
                            'terms' => $tags,
                            'operator' => 'IN'
                        )
                    );
                endif;
            else:
                if (!empty($cats)):
                    $query_args['tax_query'] = array(
                        'relation' => 'O',
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $cats,
                            'operator' => 'IN'
                        )
                    );
                endif;
            endif;

            $tw_post = new WP_Query($query_args);
            $count = 1;
            $w = ($tw_thumb_width > 0 ? $tw_thumb_width : 305);
            $h = ($tw_thumb_height > 0 ? $tw_thumb_height : 305);
            ?>
            <?php if ($tw_post->have_posts()): ?>
                <?php while ($tw_post->have_posts()):
                    $tw_post->the_post();
                    $product = wc_get_product(get_the_ID());
                    $_secondary_image = fw_get_db_post_option(get_the_ID(), '_secondary_image', array());
                    $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

                    $_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
                    $unit_html = ($show_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">' . esc_html($_product_pricing_unit) . '</span>' : '');

                    $data_groups = '["all", ';
                    $cat_name = '';
                    $terms = get_the_terms(get_the_ID(), 'product_cat');
                    if (is_array($terms) && count($terms) > 0):
                        $p = 1;
                        $c = count($terms);
                        foreach ($terms as $term):
                            $cat_name = '<a href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
                            if ($p == $c):
                                $data_groups .= '"' . $term->slug . '"';
                            else:
                                $data_groups .= '"' . $term->slug . '", ';
                            endif;
                            $p++;
                        endforeach;
                    endif;
                    $data_groups .= ']';
                    ?>
                    <div data-groups="<?php echo esc_attr($data_groups); ?>" class="col-xl-<?php echo round(12 / $tw_col_per_row); ?> col-lg-4 col-md-6 shaff_item <?php echo(function_exists('organia_check') && $enable_round_corner == 'yes' ? organia_check($count) : 'odd'); ?>">
                        <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
                            <div class="productItem03">
                                <div class="proThumb03">
                                    <a href="<?php echo get_the_permalink() ?>"><img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>"></a>
                                    <?php echo(function_exists('organia_product_flash_notice_label') && $show_flashlabels == 'yes' ? organia_product_flash_notice_label() : '') ?>
                                </div>
                                <div class="product_content03">
                                    <h3><?php echo get_the_title() ?></h3>
                                    <div class="pi01Price">
                                        <?php echo $product->get_price_html(); ?>
                                        <?php echo $unit_html; ?>
                                    </div>
                                </div>
                                <div class="piActionBtns">
                                    <?php function_exists('organia_add_to_cart') ? organia_add_to_cart() : '' ?>
                                    <?php if ($show_quickview == 'yes'): ?>
                                        <?php function_exists('organia_quick_view') ? organia_quick_view(get_the_ID()) : '' ?>
                                    <?php endif; ?>
                                    <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $show_wishlist == 'yes'): ?>
                                        <div class="wishlist">
                                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_compare == 'yes'): ?>
                                        <?php organia_compare_add_product_url(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++; endwhile; ?>
                <div class="col-md-1 shafSizer"></div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>