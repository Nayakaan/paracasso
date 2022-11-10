<?php
$tw_post = new WP_Query($query_args);
$count = 1;
$w = ($tw_thumb_width > 0 ? $tw_thumb_width : 286);
$h = ($tw_thumb_height > 0 ? $tw_thumb_height : 183);
?>
<div class="row shaff_grid woocommerce">
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
            <div class="col-xl-<?php echo round(12 / $tw_col_per_row); ?> col-lg-4 col-md-6 shaff_item <?php echo function_exists('organia_check') ? organia_check($count) : 'odd' ?>">
                <div <?php wc_product_class('organia_product_wrapper', $product); ?>>
                    <div class="productItem06">
                        <div class="proThumb04">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                        <div class="product_content04">
                            <?php echo(function_exists('organia_product_flash_notice_label') && $show_flashlabels == 'yes' ? organia_product_flash_notice_label() : '') ?>
                            <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                            <div class="pi01Price">
                                <?php echo $product->get_price_html(); ?>
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
            </div>
            <?php $count++; endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>