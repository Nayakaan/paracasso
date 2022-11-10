<?php
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_cat_custom_01',
	'label'       => FALSE,
	'section'     => 'shop_other_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Shop Category Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_cat_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'shop_cat_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you category page banner BG.', 'organia' ),
	'section'     => 'shop_other_settings',
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
			'element' => '.page_banner.shop_cat_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_cat_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_cat_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'shop_other_settings',
	'default'       => '',
        'transport'     => 'postMessage',
        'js_vars'       => array(
            array(
                'element'  => '.page_banner.shop_cat_banner .banner-title',
                'function' => 'html'
            )
        ),
        'active_callback' => [
                [
                        'setting'  => 'shop_cat_is_banner',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_cat_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => '1',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_cat_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'radio-buttonset',
	'settings'    => 'shop_cat_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_cat_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);

$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_tag_custom_02',
	'label'       => FALSE,
	'section'     => 'shop_other_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Shop Tag Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_tag_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'shop_tag_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you shop tag page banner BG.', 'organia' ),
	'section'     => 'shop_other_settings',
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
			'element' => '.page_banner.shop_tag_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => '1',
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_tag_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'shop_other_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.shop_tag_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_tag_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'radio-buttonset',
	'settings'    => 'shop_tag_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_tag_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);


$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_srcs_custom_03',
	'label'       => FALSE,
	'section'     => 'shop_other_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Shop Search Result Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_srcs_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'shop_srcs_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you shop search results page banner BG.', 'organia' ),
	'section'     => 'shop_other_settings',
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
			'element' => '.page_banner.shop_src_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_srcs_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'shop_srcs_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'shop_other_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.shop_src_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'shop_srcs_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_srcs_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => '1',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_srcs_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'shop_srcs_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'shop_other_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_srcs_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);