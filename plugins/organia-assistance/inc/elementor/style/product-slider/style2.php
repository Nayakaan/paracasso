<?php
$tw_post = new WP_Query($query_args);
$count = 1;
$w = ($tw_thumb_width > 0 ? $tw_thumb_width : 397);
$h = ($tw_thumb_height > 0 ? $tw_thumb_height : 282);

if ($tw_post->have_posts()):
    ?>
    <div class="org_product_carousel_wrap woocommerce <?php echo esc_attr($arrow_position); ?>"
         data-autoplay="<?php echo($is_autopaly == 'yes' ? '1' : '0'); ?>"
         data-loop="<?php echo($is_loop == 'yes' ? '1' : '0'); ?>"
         data-nav="<?php echo($is_arrow == 'yes' ? '1' : '0'); ?>"
         data-dots="<?php echo($is_dots == 'yes' ? '1' : '0'); ?>"
         data-gapping="<?php echo esc_attr($tw_gapping); ?>"
         data-item1="<?php echo esc_attr($tw_item_per_row_1); ?>"
         data-item2="<?php echo esc_attr($tw_item_per_row_2); ?>"
         data-item3="<?php echo esc_attr($tw_item_per_row_3); ?>"
         data-item4="<?php echo esc_attr($tw_item_per_row_4); ?>"
    >
        <div class="org_product_carousel owl-carousel">
            <?php
            while ($tw_post->have_posts()):
                $tw_post->the_post();
                $product = wc_get_product(get_the_ID());
                $_secondary_image = fw_get_db_post_option(get_the_ID(), '_secondary_image', array());
                $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

                $_product_pricing_unit = get_post_meta(get_the_ID(), '_product_pricing_unit', TRUE);
                $unit_html = ($show_pricing_unit && !empty($_product_pricing_unit) && $_product_pricing_unit != '' ? '<span class="priceSuffix">' . esc_html($_product_pricing_unit) . '</span>' : '');

                ?>
                <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
                    <div class="productItem04">
                        <div class="proThumb04">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                        <div class="product_content04">
                            <?php echo(function_exists('organia_product_flash_notice_label') && $show_flashlabels == 'yes' ? organia_product_flash_notice_label() : '') ?>
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            <div class="pi01Price">
                                <?php echo $product->get_price_html() ?>
                                <?php echo $unit_html; ?>
                            </div>
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
                <?php
                $count++;
            endwhile;
            ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();
