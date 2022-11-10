<?php
/* 
 * Theme Init File
 */

/* * ---------------------------------------------------------------
* Include Files
* -------------------------------------------------------------* */
require_once ORGANIA_INC_DIR.'/helper.php';
require_once ORGANIA_INC_DIR.'/hooks.php';
if (class_exists('woocommerce')) {
    require_once ORGANIA_INC_DIR.'/woocommerce.php';
}


/* * ---------------------------------------------------------------
* Option Framework
* -------------------------------------------------------------* */
require_once ORGANIA_CUSTOMIZER_DIR.'customizer-config.php';
/* * ---------------------------------------------------------------
* TGM Include
* -------------------------------------------------------------* */
require_once ORGANIA_INC_DIR.'/lib/class-tgm-plugin-activation.php';