<?php
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'pages_custom_01',
	'label'       => FALSE,
	'section'     => 'page_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'pages_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'page_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'pages_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you page banner BG.', 'organia' ),
	'section'     => 'page_settings',
	'default'     => [
		'background-color'      => '',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.page_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'pages_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'pages_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'page_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'pages_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'pages_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'page_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'pages_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'radio-buttonset',
	'settings'    => 'pages_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'page_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'pages_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);

$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'pages_custom_02',
	'label'       => FALSE,
	'section'     => 'page_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Content Settings', 'organia').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'pages_sidebar',
        'label'       => esc_html__( 'Sidebar Template', 'organia' ),
        'section'     => 'page_settings',
        'default'     => '1',
        'choices'     => array(
                '1'         => esc_html__( 'No Sidebar', 'organia' ),
                '2'         => esc_html__( 'Left Sidebar', 'organia' ),
                '3'         => esc_html__( 'Right Sidebar', 'organia' )
        ),
);