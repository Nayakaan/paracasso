<?php
/**
 * The template for displaying comments
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
    <?php if ( have_comments() ) : ?>
        <div class="sic_comments">
            <h3 class="sicc_title"><?php echo esc_html__('Comments', 'organia'); ?> <span>( <?php echo get_comments_number(); ?> )</span></h3>
            <ol class="sicc_list">
                <?php wp_list_comments(array('short_ping'  => true, 'style' => 'ol', 'callback'=> 'organia_comment_listing')); ?>
            </ol>
            <div class="organia_pagination comentPaginations text-right">
                <?php paginate_comments_links( array('prev_text' => '<i class="twi-arrow-left"></i>', 'next_text' => '<i class="twi-arrow-right"></i>') ) ?>
            </div>
        </div>
    <?php endif; ?>
	<?php
        $class = (is_user_logged_in() ? 'loggedIns' : '');
        $fields = array(
                'author' =>'<div class="col-md-6 name clearfix"><input id="author" placeholder="'.esc_attr__('Your Name*', 'organia').'" name="author" type="text" value="' .
                            esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
                'email'  => '<div class="col-md-6 email clearfix"><input id="email" placeholder="'.esc_attr__('Your Email*', 'organia').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                            '" size="30" /></div>',
                'url'    => '<div class="col-md-12 clearfix"><input id="text" name="url" type="url" value="'.esc_attr( $commenter['comment_author_url'] ).'" placeholder="'.esc_attr__('Website', 'organia').'" maxlength="200" /></div>',
                'cookies'=> ''
                    
        );
        $fields = apply_filters('comment_form_default_fields', $fields);
        $args = array(
            'fields'               => $fields,
            'comment_field'        => '<div class="col-md-12"><textarea id="comment" class="'.$class.'" name="comment"  placeholder="'.esc_attr__('Your Comment*', 'organia').'" aria-required="true" required="required"></textarea></div>',
            'logged_in_as'         => '',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'id_form'              => 'comment_form',
            'id_submit'            => 'submit',
            'class_form'           => 'commentForm row '.$class,
            'class_submit'         => 'organ_btn',
            'name_submit'          => 'submit',
            'title_reply'          => esc_html__( 'Leave a Comment' , 'organia'),
            'title_reply_to'       => esc_html__( 'Leave a Replies to %s', 'organia'),
            'title_reply_before'   => '<h3 class="sicc_title text-uppercase mb30">',
            'title_reply_after'    => '</h3>',
            'cancel_reply_before'  => '<small class="cancel_reply_btn">',
            'cancel_reply_after'   => '</small>',
            'cancel_reply_link'    => esc_html__( 'Cancel Reply' , 'organia'),
            'label_submit'         => esc_html__( 'Post Comment' , 'organia'),
            'submit_button'        => '<div class="col-lg-12"><button type="submit" name="%1$s" id="%2$s" class="%3$s" value="%4$s">%4$s</button></div>',
            'submit_field'         => '%1$s %2$s',
        );
    ?>
    <div class="commentForm">
        <?php
            comment_form($args);
        ?>
    </div>
</div>