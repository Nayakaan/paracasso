<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="woocommerce-form woocommerce-form-login login" method="post" <?php $instant_echo = (( $hidden ) ? 'style="display:none;"' : ''); echo esc_attr($instant_echo); ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php $instant_echo = (( $message ) ? wpautop( wptexturize( $message ) ) : ''); echo organia_kses($instant_echo); ?>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xl-6">
                <label for="username"><?php esc_html_e( 'Username or email', 'organia' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="input-text" name="username" id="username" autocomplete="username" />
            </div>
            <div class="col-lg-6 col-md-6 col-xl-6">
                <label for="password"><?php esc_html_e( 'Password', 'organia' ); ?>&nbsp;<span class="required">*</span></label>
		<input class="input-text" type="password" name="password" id="password" autocomplete="current-password" />
            </div>
            <?php do_action( 'woocommerce_login_form' ); ?>
            <div class="col-sm-12">
                <div class="loginMetaActions">
                    <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                    <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Login', 'organia' ); ?>"><?php esc_html_e( 'Login Now', 'organia' ); ?></button>
                
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'organia' ); ?></span>
                    </label>
                    <p class="lost_password">
                        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'organia' ); ?></a>
                    </p>
                </div>
            </div>
            <?php do_action( 'woocommerce_login_form_end' ); ?>
        </div>
	<div class="clear"></div>
</form>
