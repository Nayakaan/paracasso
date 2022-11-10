<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
do_action( 'woocommerce_before_customer_login_form' ); ?>
        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
<div class="row justify-content-center">
    <div class="col--md-12">
        <ul class="nav loginTab" id="loginTab" role="tablist">
            <li role="presentation">
                <a class="active" data-toggle="tab" href="#login" role="tab" aria-selected="true"><?php echo esc_html__('Login', 'organia') ?></a>
            </li>
            <li role="presentation">
                <a class="" data-toggle="tab" href="#register" role="tab" aria-selected="false"><?php echo esc_html__('Register', 'organia') ?></a>
            </li>
        </ul>
    </div>
</div>
<div class="row justify-content-center" id="customer_login">
    <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="tab-content anim-right">
            <div class="tab-pane fade show active" id="login" role="tabpanel">
                <?php endif; ?>
                <div class="authWrap authLogin">
        		<form class="woocommerce-form woocommerce-form-login login" method="post">
                <div class="row">
        			<?php do_action( 'woocommerce_login_form_start' ); ?>
        			<div class="col-md-6">
                        <input placeholder="<?php esc_attr_e( 'Username or email address *', 'organia' ); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
        			</div>
        			<div class="col-md-6">
        				<input placeholder="<?php esc_attr_e( 'Password *', 'organia' ); ?>" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
        			</div>
        			<?php do_action( 'woocommerce_login_form' ); ?>
                    <div class="col-md-12">
                        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                    </div>
                    <div class="col-md-12">
                        <div class="loginMetaActions">
                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'organia' ); ?>"><?php esc_html_e( 'Log in Now', 'organia' ); ?></button>
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember Me', 'organia' ); ?></span>
                            </label>
                            <p class="woocommerce-LostPassword lost_password">
                                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'organia' ); ?></a>
                            </p>
                        </div>
                    </div>
        			<?php do_action( 'woocommerce_login_form_end' ); ?>
                </div>
        		</form>
            </div>
        </div>
        <div class="tab-pane fade" id="register" role="tabpanel">
            <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
            <div class="authWrap authRegister">
                <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
                    <div class="row">
                        <?php do_action( 'woocommerce_register_form_start' ); ?>
                        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                        <div class="col-md-6">
                            <input placeholder="<?php esc_attr_e( 'Username *', 'organia' ); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                        </div>
                        <?php endif; ?>
                         <div class="<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>col-md-6<?php else: ?>col-md-12<?php endif; ?>">
                         <input placeholder="<?php esc_attr_e( 'Enter your email address *', 'organia' ); ?>" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                        </div>
                                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                        <div class="col-sm-12">
                                            <input placeholder="<?php esc_attr_e( 'Password *', 'organia' ); ?>" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                        </div>

                    <?php else : ?>
                        <div class="col-sm-12">
                            <p class="woocommerce-email-note"><?php esc_html_e( 'A password will be sent to your email address.', 'organia' ); ?></p>
                        </div>
                    <?php endif; ?>
                                <?php do_action( 'woocommerce_register_form' ); ?>

                    <div class="col-sm-12">
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'organia' ); ?>"><?php esc_html_e( 'Register Now', 'organia' ); ?></button>
                    </div>

                    <?php do_action( 'woocommerce_register_form_end' ); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
	</div>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
