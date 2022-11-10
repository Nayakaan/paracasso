<?php do_action('tw_before_footer'); ?>
<div class="tw-footer-content">
    <?php
    $footer_style = get_theme_mod('footer_style', 0);
    if (is_page() && defined('FW')) {
        $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_footer_enabled', 2);
        if ($page_is_settings == 1) {
            $footer_style = fw_get_db_post_option(get_the_ID(), 'page_footer_style', 0);
        }
    }

    if ($footer_style > 0) {
        $footer = Tw_Builder::render_template($footer_style);
    }
    ?>
</div>
<?php do_action('tw_after_footer'); ?>

<!-- Back To Top Start -->
<a href="javascript:void(0);" id="backtotop"><i class="twi-arrow-to-top1"></i></a>
<!-- Back To Top End -->

<!-- End:: Product Modal Section -->
<div class="modal fade quickViewModal" id="productQuickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content woocommerce">
            <div class="modal-body">
                <button type="button" class="close quickViewClose" data-dismiss="modal" data-aria-label="Close">
                    <i class="twi-times2"></i>
                </button>
                <div class="quickViewContent hidden"></div>
                <div class="QVCLoader">
                    <div class="organiaLoader">
                        <div class="loaderO">
                            <span><?php echo esc_html__('L', 'organia'); ?></span>
                            <span><?php echo esc_html__('O', 'organia'); ?></span>
                            <span><?php echo esc_html__('A', 'organia'); ?></span>
                            <span><?php echo esc_html__('D', 'organia'); ?></span>
                            <span><?php echo esc_html__('I', 'organia'); ?></span>
                            <span><?php echo esc_html__('N', 'organia'); ?></span>
                            <span><?php echo esc_html__('G', 'organia'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End:: Product Modal Section -->

<?php function_exists('organia_popup_style') ? organia_popup_style() : '';

wp_footer(); ?>
</body>
</html>