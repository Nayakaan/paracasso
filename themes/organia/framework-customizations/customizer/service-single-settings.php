<?php
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'serv_single_custom_01',
	'label'       => FALSE,
	'section'     => 'service_single_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'serv_single_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'service_single_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'serv_single_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you case listing page banner BG.', 'organia' ),
	'section'     => 'service_single_settings',
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
			'element' => '.page_banner.service_single_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'serv_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'serv_single_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'service_single_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.service_single_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'serv_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'serv_single_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'service_single_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'serv_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'serv_single_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'service_single_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'serv_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);