<?php
/**
 * The template for displaying the footer
 */
$copy_site_info = get_theme_mod('copy_site_info', date('Y') . ' &copy; ' . get_bloginfo('name') . '. ' . esc_html__(' All Rights Reserved.', 'organia'));
?>
<section class="defaultFooter">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="siteInfo"><?php echo organia_kses($copy_site_info); ?></div>
            </div>
        </div>
    </div>
</section>
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

<?php
if (function_exists('organia_popup_style')) {
    organia_popup_style();
}
wp_footer(); ?>
</body>
</html>
