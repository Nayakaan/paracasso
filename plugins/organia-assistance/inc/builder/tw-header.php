<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php echo(function_exists('organia_preloader_creator') ? organia_preloader_creator() : ''); ?>
<?php do_action('tw_before_header'); ?>
<div class="tw-header-content">
    <?php
    $header_style = get_theme_mod('header_style', 0);
    if (is_page() && defined('FW')) {
        $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_header_enabled', 2);
        if ($page_is_settings == 1) {
            $header_style = fw_get_db_post_option(get_the_ID(), 'page_header_style', 0);
        }
    }
    if ($header_style > 0) {
        $header = Tw_Builder::render_template($header_style);
    }
    ?>
</div>
<?php do_action('tw_after_header'); ?>
