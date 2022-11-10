<?php
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_src_custom_01',
	'label'       => FALSE,
	'section'     => 'blog_others_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Search Result Banner Settings', 'organia').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'blog_src_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'blog_src_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you search page banner BG.', 'organia' ),
	'section'     => 'blog_others_settings',
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
			'element' => '.page_banner.blog_search_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'blog_src_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'blog_others_settings',
	'default'       => esc_html__('Page Title', 'organia'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.blog_search_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_src_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_src_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_src_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
        [
                'setting'  => 'blog_src_is_banner',
                'operator' => '==',
                'value'    => true,
        ],
    ],
);

$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_arch_custom_02',
	'label'       => FALSE,
	'section'     => 'blog_others_settings',
	'default'     => '<br/><br/><br/><div class="customizer_label">'.esc_html__('Archive Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_arch_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'blog_arch_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you blog archive page banner BG.', 'organia' ),
	'section'     => 'blog_others_settings',
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
			'element' => '.page_banner.blog_archive_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
        'type'          => 'text',
	'settings'      => 'blog_arch_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'blog_others_settings',
	'default'       => esc_html__('Page Title', 'organia'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.blog_archive_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_arch_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_arch_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'radio-buttonset',
	'settings'    => 'blog_arch_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
        [
                'setting'  => 'blog_arch_is_banner',
                'operator' => '==',
                'value'    => true,
        ],
    ],
);

$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_cats_custom_02',
	'label'       => FALSE,
	'section'     => 'blog_others_settings',
	'default'     => '<br/><br/><br/><div class="customizer_label">'.esc_html__('Category Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_cats_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'blog_cats_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you blog Category page banner BG.', 'organia' ),
	'section'     => 'blog_others_settings',
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
			'element' => '.page_banner.blog_cate_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'blog_cats_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'blog_others_settings',
	'default'       => esc_html__('Page Title', 'organia'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.blog_cate_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'blog_cats_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'radio-buttonset',
	'settings'    => 'blog_cats_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'blog_others_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_cats_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);

