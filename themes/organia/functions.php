<?php
/* * ---------------------------------------------------------------
* Theme Directory Define
* -------------------------------------------------------------* */
$theme_info = wp_get_theme();

define('ORGANIA_THEME_DIR', get_template_directory());
define('ORGANIA_THEME_URL', get_template_directory_uri());
define('ORGANIA_STYLESHEET_URL', get_stylesheet_uri());

define('ORGANIA_INC_DIR', ORGANIA_THEME_DIR . '/inc');
define('ORGANIA_INC_URL', ORGANIA_THEME_URL . '/inc');
define('ORGANIA_CUSTOMIZER_DIR', ORGANIA_THEME_DIR . '/framework-customizations/customizer/');

define('ORGANIA_WD_DIR', ORGANIA_THEME_DIR . '/widgets');

define('ORGANIA_ASSETS_DIR', ORGANIA_THEME_DIR . '/assets');
define('ORGANIA_ASSETS_URL', ORGANIA_THEME_URL . '/assets');

define('ORGANIA_ASSETS_CSS_DIR', ORGANIA_THEME_DIR . '/assets/css');
define('ORGANIA_ASSETS_CSS_URL', ORGANIA_THEME_URL . '/assets/css');

define('ORGANIA_ASSETS_JS_DIR', ORGANIA_THEME_DIR . '/assets/js');
define('ORGANIA_ASSETS_JS_URL', ORGANIA_THEME_URL . '/assets/js');

define('ORGANIA_ASSETS_IMAGES_DIR', ORGANIA_THEME_DIR . '/assets/images');
define('ORGANIA_ASSETS_IMAGES_URL', ORGANIA_THEME_URL . '/assets/images');


/* * ---------------------------------------------------------------
* Theme Init
* -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/inc/init.php');


function wooc_extra_register_fields() {?>

    <div class="col-md-6">
    <input type="text" class="input-text" placeholder="Imię *" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
</div>
    <div class="col-md-6">
    <input type="text" class="input-text" placeholder="Nazwisko *" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
</div>
<div class="col-md-6">
    <input type="text" class="input-text" placeholder="Numer telefonu *" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
</div>
<div class="col-md-6">
    <input type="text" class="input-text" placeholder="Kod pocztowy *" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
</div>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

add_action( 'woocommerce_register_form', 'bbloomer_add_registration_privacy_policy', 12 );
   
function bbloomer_add_registration_privacy_policy() {
 
woocommerce_form_field( 'privacy_policy_reg', array(
   'type'          => 'checkbox',
   'class'         => array('form-row privacy'),
   'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
   'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
   'required'      => true,
   'label'         => 'Akcteptuję <a href="/regulamin/">regulamin sklepu.</a>',
));
  
}
  
// Show error if user does not tick
   
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_privacy_registration', 10, 3 );
  
function bbloomer_validate_privacy_registration( $errors, $username, $email ) {
if ( ! is_checkout() ) {
    if ( ! (int) isset( $_POST['privacy_policy_reg'] ) ) {
        $errors->add( 'privacy_policy_reg_error', __( 'Privacy Policy consent is required!', 'woocommerce' ) );
    }
}
return $errors;
}



function newsletter_check() {?>
<p class="form-row form-row privacy validate-required" id="privacy_policy_reg_field" data-priority=""><span class="woocommerce-input-wrapper"><label class="checkbox woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
<input type="checkbox" class="input-checkbox woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="privacy_policy_reg" id="privacy_policy_reg" value="1"> Otrzymaj 40 zł rabatu na pierwsze zakupy i zapisz się do naszego newslettera.</a>&nbsp;<abbr class="required" title="wymagane">*</abbr></label></span></p>

<?php
}

add_action( 'woocommerce_register_form', 'newsletter_check', 11 );