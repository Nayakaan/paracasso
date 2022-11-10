<?php
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'fof_custom_01',
	'label'       => FALSE,
	'section'     => 'fof_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'organia').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'fof_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'fof_section',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'fof_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you 404 page banner BG.', 'organia' ),
	'section'     => 'fof_section',
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
			'element' => '.page_banner.fof_page_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'fof_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'fof_section',
	'default'       => esc_html__('404', 'organia'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.fof_page_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'fof_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'fof_section',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'fof_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'fof_section',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'fof_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'fof_custom_02',
	'label'       => FALSE,
	'section'     => 'fof_section',
	'default'     => '<div class="customizer_label">'.esc_html__('404 Content Settings', 'organia').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'fof_content_type',
        'label'       => esc_html__( 'Content Type', 'organia' ),
        'section'     => 'fof_section',
        'default'     => '1',
        'choices'     => array(
                '1'     => esc_html__( 'Image', 'organia' ),
                '2'     => esc_html__( 'Text', 'organia' )
        ),
);
$fields[]= array(
    'type'        => 'image',
	'settings'    => 'fof_content_image',
	'label'       => esc_html__( '404 Image', 'organia' ),
	'description' => esc_html__( 'Upload your custom 404 page image. Image size should be 629x434px.', 'organia' ),
	'section'     => 'fof_section',
	'default'     => ORGANIA_ASSETS_IMAGES_URL.'/404.png',
    'required'      => array( 
        array( 
            'setting'   => 'fof_content_type',
            'operator'  => '!=',
            'value'     => '2' 
        )
    ),
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'fof_titles',
	'label'         => esc_html__('404 Title', 'organia'),
	'section'       => 'fof_section',
    'default'       => esc_html__('404', 'organia'),
    'required'      => array( 
        array( 
            'setting'   => 'fof_content_type',
            'operator'  => '==',
            'value'     => '2' 
        )
    ),
);
$fields[] = array(
    'type'          => 'textarea',
	'settings'      => 'fof_contents',
	'label'         => esc_html__('404 Contents', 'organia'),
	'section'       => 'fof_section',
	'default'       => '',
    'required'      => array( 
        array( 
            'setting'   => 'fof_content_type',
            'operator'  => '==',
            'value'     => '2' 
        )
    ),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'fof_is_search',
        'label'       => esc_html__( 'Is Search Form?', 'organia' ),
        'section'     => 'fof_section',
        'default'     => '2',
        'choices'     => array(
                'on'    => esc_html__( 'Enable', 'organia' ),
                'off'   => esc_html__( 'Disable', 'organia' ),
        ),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'fof_is_homes',
        'label'       => esc_html__( 'Is Home BTN?', 'organia' ),
        'section'     => 'fof_section',
        'default'     => '1',
        'choices'     => array(
                'on'    => esc_html__( 'Enable', 'organia' ),
                'off'   => esc_html__( 'Disable', 'organia' ),
        ),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'fof_is_homes',
        'label'       => esc_html__( 'Is Home BTN?', 'organia' ),
        'section'     => 'fof_section',
        'default'     => '1',
        'choices'     => array(
                'on'    => esc_html__( 'Enable', 'organia' ),
                'off'   => esc_html__( 'Disable', 'organia' ),
        ),
);
$fields[] = array(
    'type'        => 'text',
	'settings'    => 'fof_hbtn_label',
	'label'       => esc_html__( 'Home Btn Label', 'organia' ),
	'section'     => 'fof_section',
	'default'     => esc_html__('Return to Home', 'organia'),
    'required'      => array( 
        array( 
            'setting'   => 'is_homes',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'fof_custom_03',
	'label'       => FALSE,
	'section'     => 'fof_section',
	'default'     => '<div class="customizer_label">'.esc_html__('404 Content Style', 'organia').'</div>',
);
$fields[]= array(
    'type'        => 'background',
    'settings'    => 'sec_404_setting',
    'label'       => esc_html__( 'Section Background', 'organia' ),
    'section'     => 'fof_section',
    'default'     => [
        'background-color'      => '',
        'background-image'      => '',
        'background-repeat'     => '',
        'background-position'   => '',
        'background-size'       => '',
        'background-attachment' => '',
    ],
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '.section_404',
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_title_color',
    'label'       => esc_html__( '404 Title Color', 'organia' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.contetn_404 h2',
            'property' => 'color'
        ],
    ],
    'required'      => array( 
        array( 
            'setting'   => 'fof_content_type',
            'operator'  => '==',
            'value'     => '2' 
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'fof_desc_color',
    'label'       => esc_html__( '404 Content Color', 'organia' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.contetn_404 h3',
            'property' => 'color'
        ],
    ],
    'required'      => array( 
        array( 
            'setting'   => 'fof_content_type',
            'operator'  => '==',
            'value'     => '2' 
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_color',
    'label'       => esc_html__( 'Home Btn Color', 'organia' ),
    'description' => esc_html__( 'Insert your home btn Text color.', 'organia' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.contetn_404 .organ_btn',
            'property' => 'color'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_bg',
    'label'       => esc_html__( 'Home Btn BG Color', 'organia' ),
    'description' => esc_html__( 'Insert your home btn BG color.', 'organia' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.contetn_404 .organ_btn',
            'property' => 'background'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_hover_color',
    'label'       => esc_html__( 'Home Btn Hover Color', 'organia' ),
    'description' => esc_html__( 'Insert your home btn Text color.', 'organia' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.contetn_404 .organ_btn:hover',
            'property' => 'color'
        ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'home_btn_hover_bg',
    'label'       => esc_html__( 'Home Btn Hover BG Color', 'organia' ),
    'description' => esc_html__( 'Insert your home btn BG color.', 'organia' ),
    'section'     => 'fof_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.contetn_404 .organ_btn:before',
            'property' => 'background'
        ],
    ],
);