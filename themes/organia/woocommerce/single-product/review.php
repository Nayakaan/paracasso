<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<?php
            $avater = get_avatar_url($comment->comment_author_email);
            if ($comment->user_id != '' && $comment->user_id != 0) {
                $userId = $comment->user_id;
                $avID = get_the_author_meta('user_av_ID', $userId);
                if ($avID != '') {
                    $userAvater = organia_attachment_url($avID, 103, 103);
                } else {
                    $userAvater = $avater;
                }
            } else {
                $userAvater = $avater;
            }
        ?>
        <div class="single_comment productComent clearfix ">
            <img src="<?php echo esc_url($userAvater); ?>" alt="<?php echo esc_attr($comment->comment_author); ?>">
            <h4 class="cm_author"><a href="javascript:void(0)"><?php echo esc_html($comment->comment_author); ?></a></h4>
            <div class="sc_content clearfix">
                <?php comment_text(); ?>
            </div>
            <span class="cm_date"><?php echo get_the_time('F j, Y'); ?></span>
            <div class="clearfix"></div>
            <?php echo woocommerce_review_display_rating(); ?>
        </div>
