<?php
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'general_custom_01',
	'label'       => FALSE,
	'section'     => 'general_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Global Site Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'show_preloader',
        'label'       => esc_html__( 'Show Preloader', 'organia' ),
        'section'     => 'general_section',
        'default'     => '2',
        'choices'     => array(
                'on'    => esc_html__( 'Enable', 'organia' ),
                'off'   => esc_html__( 'Disable', 'organia' ),
        ),
);
$fields[]= array(
    'type'         => 'radio-image',
	'settings'     => 'proloader',
	'label'        => esc_html__( 'Preloader', 'organia' ),
	'section'      => 'general_section',
	'default'      => '0',
	'choices'      => [
		'0'    => ORGANIA_ASSETS_IMAGES_URL . '/options/0.jpg',
		'1'    => ORGANIA_ASSETS_IMAGES_URL . '/options/1.jpg',
		'2'    => ORGANIA_ASSETS_IMAGES_URL . '/options/2.jpg',
		'3'    => ORGANIA_ASSETS_IMAGES_URL . '/options/3.jpg',
		'4'    => ORGANIA_ASSETS_IMAGES_URL . '/options/4.jpg',
		'5'    => ORGANIA_ASSETS_IMAGES_URL . '/options/5.jpg',
		'6'    => ORGANIA_ASSETS_IMAGES_URL . '/options/6.jpg',
		'7'    => ORGANIA_ASSETS_IMAGES_URL . '/options/7.jpg',
		'8'    => ORGANIA_ASSETS_IMAGES_URL . '/options/8.jpg',
		'9'    => ORGANIA_ASSETS_IMAGES_URL . '/options/9.jpg',
		'10'   => ORGANIA_ASSETS_IMAGES_URL . '/options/10.jpg',
		'11'   => ORGANIA_ASSETS_IMAGES_URL . '/options/11.jpg',
		'12'   => ORGANIA_ASSETS_IMAGES_URL . '/options/12.jpg',
		'13'   => ORGANIA_ASSETS_IMAGES_URL . '/options/13.jpg',
		'14'   => ORGANIA_ASSETS_IMAGES_URL . '/options/14.jpg',
		'15'   => ORGANIA_ASSETS_IMAGES_URL . '/options/15.jpg',
		'16'   => ORGANIA_ASSETS_IMAGES_URL . '/options/16.jpg',
		'17'   => ORGANIA_ASSETS_IMAGES_URL . '/options/17.jpg',
		'18'   => ORGANIA_ASSETS_IMAGES_URL . '/options/18.jpg',
		'19'   => ORGANIA_ASSETS_IMAGES_URL . '/options/19.jpg',
		'20'   => ORGANIA_ASSETS_IMAGES_URL . '/options/20.jpg',
        '21'   => ORGANIA_ASSETS_IMAGES_URL . '/options/21.jpg',
	],
    'required'      => array(
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[]           = array(
    'type'          => 'image',
    'settings'      => 'loader_logo',
    'label'         => esc_html__('Loader Logo', 'organia'),
    'description'   => esc_html__('Upload your site loader logo. image size should be 193x76px.', 'organia'),
    'section'       => 'general_section',
    'default'       => '',
    'required'      => array(
        array( 
            'setting'   => 'proloader',
            'operator'  => '==',
            'value'     => '21' 
        ),
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
    'type'          => 'text',
    'settings'      => 'loader_text',
    'label'         => esc_html__('Loader Text', 'organia'),
    'section'       => 'general_section',
    'default'       => esc_html__('ORGANIA', 'organia'),
    'transport'     => 'postMessage',
    'required'      => array(
        array( 
            'setting'   => 'proloader',
            'operator'  => '==',
            'value'     => '0' 
        ),
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'loader_text_color',
	'label'       => esc_html__( 'Loader Text Color', 'organia' ),
	'description' => esc_html__( 'Insert your site loader text color', 'organia' ),
	'section'     => 'general_section',
	'default'     => '',
        'choices'     => [
		'alpha' => true,
	],
    'transport'   => 'auto',
	'output'      => [
            [
                    'element'  => '.preloader .loaderO span',
                    'property' => 'color',
                    'suffix'   => '!important'
            ],
    ],
    'required'      => array(
        array( 
            'setting'   => 'proloader',
            'operator'  => '==',
            'value'     => '0' 
        ),
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
        'type'        => 'color',
    'settings'    => 'loader_bg_color',
    'label'       => esc_html__( 'Loader BG Color', 'organia' ),
    'description' => esc_html__( 'Insert your site loader backgourd color', 'organia' ),
    'section'     => 'general_section',
    'default'     => '',
        'choices'     => [
        'alpha' => true,
    ],
    'transport'   => 'auto',
    'output'      => [
            [
                    'element'  => '.preloader',
                    'property' => 'background',
            ]
    ],
    'required'      => array(
        array( 
            'setting'   => 'show_preloader',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
        'type'        => 'color',
	'settings'    => 'loader_anim_color',
	'label'       => esc_html__( 'Loader Animation Color', 'organia' ),
	'description' => esc_html__( 'Insert your site loader animation color.', 'organia' ),
	'section'     => 'general_section',
	'default'     => '',
        'choices'     => [
		'alpha' => true,
	],
    'transport'   => 'auto',
	'output'      => [
                [
                        'element'  => '.la-ball-scale-multiple, .la-ball-circus, .la-ball-climbing-dot, .la-ball-clip-rotate, .la-ball-clip-rotate-multiple, 
                        .la-ball-clip-rotate-pulse, .la-ball-newton-cradle, .la-ball-rotate, .la-ball-scale-ripple-multiple, .la-ball-zig-zag, .la-fire, .la-line-scale, 
                        .la-line-scale-party, .la-line-scale-pulse-out, .la-line-spin-clockwise-fade-rotating, .la-square-jelly-box, .la-square-spin, .la-pacman, .la-timer',
                        'property' => 'color',
                ],
                [
                        'element'  => '.organiaLoader svg',
                        'property' => 'fill',
                ],
                [
                        'element'  => '.sk-folding-cube .sk-cube:before',
                        'property' => 'background-color',
                ]
        ],
        'required'      => array(
            array( 
                'setting'   => 'proloader',
                'operator'  => '!=',
                'value'     => '21' 
            ),
            array( 
                'setting'   => 'show_preloader',
                'operator'  => '==',
                'value'     => '1' 
            )
        ),
);
$fields[]= array(
        'type'        => 'text',
        'settings'    => 'map_api',
        'label'       => esc_html__( 'Google Map API Key', 'organia' ),
        'section'     => 'general_section',
        'default'     =>  '',
);
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'general_custom_02',
    'label'       => FALSE,
    'section'     => 'general_section',
    'default'     => '<div class="customizer_label">'.esc_html__('Global Home Template BG Settings', 'organia').'</div>',
);
$fields[] = array(
    'type'        => 'background',
    'settings'    => 'geleral_body_bg',
    'label'       => esc_html__( 'Home Teamplate Background', 'organia' ),
    'description' => esc_html__( 'Setup your all home page body background.', 'organia' ),
    'section'     => 'general_section',
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
            'element' => '.organia_home_page',
        ]
    ],
);


