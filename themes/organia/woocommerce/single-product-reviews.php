<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
    <div id="comments" class="comment_area review_area">
    	<div class="sic_comments">
			<?php if ( have_comments() ) : ?>
	                <h3 class="sicc_title productCommentTitle"><?php echo comments_number( esc_html__('0 Reviews', 'organia'), esc_html__('1 Review', 'organia'), '% '.esc_html__(' Reviews', 'organia') ); ?></h3>
				<ol class="sicc_list product_reviews_list">
	                <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
				</ol>
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	                <div class="organ_pagination comentPaginations text-right">
	                    <?php paginate_comments_links( array('prev_text' => '<i class="twi-arrow-left"></i>', 'next_text' => '<i class="twi-arrow-right"></i>') ) ?>
	                </div>
				<?php endif; ?>
			<?php else : ?>
				<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'organia' ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
                <div id="review_form" class="commentForm productCommentForm">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? esc_html__( 'Add A Review', 'organia' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'organia' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave A Reply to %s', 'organia' ),
					'title_reply_before'  => '<h6 class="sicc_title">',
					'title_reply_after'   => '</h6>',
					'comment_notes_after' => '',
					'logged_in_as'        => '',
					'comment_field'       => '',
                    'id_submit'           => 'submit',
                    'class_form'          => 'row commentForm product_comment_form',
                    'class_submit'        => 'submit',
                    'label_submit'        => esc_html__( 'Submit Review' , 'organia'),
                    'submit_button'       => '<div class="col-lg-12"><button name="%1$s" type="submit" id="%2$s" class="%3$s organ_btn" value="%4$s">%4$s</button></div>',
                    'submit_field'        => '%1$s %2$s',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => esc_html__( 'Your Name', 'organia' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email' => array(
						'label'    => esc_html__( 'Your Email', 'organia' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<div class="col-md-6 name">';
	                    $req_html = '';
					if ( $field['required'] ) {
						$req_html = ' *';
					}
					$field_html .= '<input placeholder="'.  esc_attr($field['label']).$req_html.'" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></div>';
					$comment_form['fields'][ $key ] = $field_html;
				}
                $comment_form['fields']['cookies'] = '';
				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'organia' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="col-lg-12"><div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'organia' ) . '</label><select class="hideSelect" name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'organia' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'organia' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'organia' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'organia' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'organia' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'organia' ) . '</option>
					</select></div></div>';
				}

				$comment_form['comment_field'] .= '<div class="col-md-12"><textarea placeholder="'.  esc_attr__('Your Review *', 'organia').'" id="comment" name="comment" cols="45" rows="8" required></textarea></div>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'organia' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
