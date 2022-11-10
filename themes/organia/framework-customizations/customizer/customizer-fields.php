<?php
/**
 *	Customizer General Settings
 *	styles for logo/title - sizing, spacing ...
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Organia_Fields{

	/**
     * Holds the class object.
     *
     * @since 1.0.0
     *
     */
    
	public static $_instance;

	/**
     * Load Construct
     * 
     * @since 1.0.0
     */

	public function __construct(){
		$this->organia_customizer_init();
	}

	/**
     * Customizer field Initialization
     *
     * @since 1.0.0
     *
     */

	public function organia_customizer_init(){
		add_filter( 'kirki/fields', array($this,'organia_general_setting') );
	}

	public function organia_general_setting( $fields ){

		require ORGANIA_CUSTOMIZER_DIR . 'general-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'popup-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'font-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'colorpreset-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'header-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'header-styling.php';
		require ORGANIA_CUSTOMIZER_DIR . 'blog-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'blog-details-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'blog-others-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'service-single-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'member-single-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'shop-setting.php';
		require ORGANIA_CUSTOMIZER_DIR . 'shop-product-setting.php';
		require ORGANIA_CUSTOMIZER_DIR . 'shop-other-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'page-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . 'footer-settings.php';
		require ORGANIA_CUSTOMIZER_DIR . '404-settings.php';

		return $fields;
	}

	public static function organia_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Organia_Fields();
        }
        return self::$_instance;
    }
}
$Organia_Fields = Organia_Fields::organia_get_instance();