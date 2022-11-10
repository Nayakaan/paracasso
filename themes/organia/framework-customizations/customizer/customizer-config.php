<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config( 'organia_customizer', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );


function organia_customizer_sections($wp_customize){
    $wp_customize->add_panel( 'theme_option', array(
        'priority'    => 10,
        'title'       => esc_html__( 'Theme Options', 'organia' ),
    ) );

    $wp_customize->add_section( 'general_section', array(
            'title'                 => esc_html__( 'General Settings', 'organia' ),
            'priority'              => 1,
            'description'           => esc_html__( 'to change site loader and google map api.', 'organia' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'popup_section', array(
            'title'                 => esc_html__( 'Site Popup Settings', 'organia' ),
            'priority'              => 1,
            'description'           => esc_html__( 'Setup your site global popup.', 'organia' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'font_section', array(
            'title'                 => esc_html__( 'Typography Settings', 'organia' ),
            'priority'              => 2,
            'description'           => esc_html__( 'Setup your site typography.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'colorpreset_section', array(
            'title'                 => esc_html__( 'Color Preset Settings', 'organia' ),
            'priority'              => 3,
            'description'           => esc_html__( 'Setup your site accent color.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'header_settings', array(
            'title'                 => esc_html__( 'Header Settings', 'organia' ),
            'priority'              => 4,
            'description'           => esc_html__( 'Setup your site header.', 'organia' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'header_styling', array(
            'title'                 => esc_html__( 'Header Styling', 'organia' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Style up you site header.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'blog_settings', array(
            'title'                 => esc_html__( 'Blog Settings', 'organia' ),
            'priority'              => 6,
            'description'           => esc_html__( 'Setup your blog pages.', 'organia' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'blog_single_settings', array(
            'title'			=> esc_html__( 'Blog Single Settings', 'organia' ),
            'priority'              => 7,
            'description'           => esc_html__( 'Setup your blog details pages.', 'organia' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'blog_others_settings', array(
            'title'                 => esc_html__( 'Blog Others Banner Settings', 'organia' ),
            'priority'              => 9,
            'description'           => esc_html__( 'Setup your blog related others pages banner ( Search, Archive).', 'organia' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'service_single_settings', array(
            'title'                 => esc_html__( 'Service Single Settings', 'organia' ),
            'priority'              => 13,
            'description'           => esc_html__( 'Setup your service details page.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'member_single_settings', array(
            'title'                 => esc_html__( 'Member Single Settings', 'organia' ),
            'priority'              => 14,
            'description'           => esc_html__( 'Setup your member details page.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_settings', array(
            'title'                 => esc_html__( 'Shop Settings', 'organia' ),
            'priority'              => 15,
            'description'           => esc_html__( 'Setup your shop pages.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_product_setting', array(
            'title'                 => esc_html__( 'Shop Product Settings', 'organia' ),
            'priority'              => 16,
            'description'           => esc_html__( 'Setup your shop product single pages.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_other_settings', array(
            'title'                 => esc_html__( 'Shop Others Banner Settings', 'organia' ),
            'priority'              => 17,
            'description'           => esc_html__( 'Setup your shop related other pages banner settings here.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'page_settings', array(
            'title'                 => esc_html__( 'Page Settings', 'organia' ),
            'priority'              => 18,
            'description'           => esc_html__( 'Setup your page global options.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'page_settings', array(
            'title'		    => esc_html__( 'Page Settings', 'organia' ),
            'priority'              => 18,
            'description'           => esc_html__( 'Setup your page global options.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'footer_settings', array(
            'title'                 => esc_html__( 'Footer Settings', 'organia' ),
            'priority'              => 19,
            'description'           => esc_html__( 'Setup your site footer here.', 'organia' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'fof_section', array(
            'title' 		    => esc_html__( '404 Settings', 'organia' ),
            'priority'              => 21,
            'description'           => esc_html__( 'Setting up your 404 page.', 'organia' ),
            'panel'                 => 'theme_option',
    ));
}

add_action( 'customize_register', 'organia_customizer_sections' );

require ORGANIA_CUSTOMIZER_DIR . 'customizer-fields.php' ;

