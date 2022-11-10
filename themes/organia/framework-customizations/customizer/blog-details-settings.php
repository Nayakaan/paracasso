<?php
$bloks = array(
    'post_type'     => 'blocks',
    'post_status'   => 'publish',
    'posts_per_page'  => -1,
    'orderby'        => 'title',
    'order'          => 'ASC'
);
$all_bloks = array(
    'none' => esc_html__('None', 'organia')
);
$blok = new WP_Query($bloks);
if($blok->have_posts()):
    while($blok->have_posts()):
    $blok->the_post();
    $all_bloks[get_the_ID()] = get_the_title();
    endwhile;
endif;
wp_reset_postdata();

$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'blog_single_custom_01',
	'label'       => FALSE,
	'section'     => 'blog_single_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'organia').'</div>',
);
$fields[]= array(
    'type'    => 'switch',
	'settings'    => 'blog_single_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'blog_single_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'blog_single_banner_style',
        'label'       => esc_html__( 'Banner Style', 'organia' ),
        'section'     => 'blog_single_settings',
        'default'     => '1',
        'choices'     => array(
                '1'      => esc_html__('Normal Banner','organia'),
                '2'      => esc_html__('Gallery Banner','organia'),
        ),
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'image_overlay_bg_color',
    'label'       => esc_html__( 'Image Overlay Color', 'organia' ),
    'section'     => 'blog_single_settings',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.blog_details_banner .carousel-item::after',
            'property' => 'background-color'
        ],
        [
            'element'  => '.galImg::after',
            'property' => 'background-color'
        ],
    ],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ],
            [
                    'setting'  => 'blog_single_banner_style',
                    'operator' => '==',
                    'value'    => 2,
            ]
    ],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'blog_single_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you single post page banner BG.', 'organia' ),
	'section'     => 'blog_single_settings',
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
			'element' => '.page_banner.sb_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ],
            [
                    'setting'  => 'blog_single_banner_style',
                    'operator' => '==',
                    'value'    => 1,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'blog_single_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'blog_single_settings',
	'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.sb_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'blog_single_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'blog_single_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ],
            [
                    'setting'  => 'blog_single_banner_style',
                    'operator' => '==',
                    'value'    => 1,
            ]
    ],
);

$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_single_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'blog_single_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_single_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);

$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'blog_single_custom_02',
	'label'       => FALSE,
	'section'     => 'blog_single_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Content Settings', 'organia').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'blog_single_sidebar',
        'label'       => esc_html__( 'Sidebar Position', 'organia' ),
        'section'     => 'blog_single_settings',
        'default'     => '3',
        'choices'     => array(
                '1'      => esc_html__('None','organia'),
                '2'      => esc_html__('Left','organia'),
                '3'      => esc_html__('Right','organia'),
        ),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'blog_single_is_tag',
        'label'       => esc_html__( 'Is Tags?', 'organia' ),
        'section'     => 'blog_single_settings',
        'default'     => '1',
        'choices'     => array(
            'on'  => esc_html__( 'Show', 'organia' ),
            'off' => esc_html__( 'Hide', 'organia' ),
        ),
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'blog_single_is_share',
        'label'       => esc_html__( 'Is Social Share?', 'organia' ),
        'section'     => 'blog_single_settings',
        'default'     => '2',
        'choices'     => array(
            'on'  => esc_html__( 'Show', 'organia' ),
            'off' => esc_html__( 'Hide', 'organia' ),
        ),
);
$fields[]= array(
        'type'        => 'multicheck',
        'settings'    => 'blog_single_socials',
        'label'       => esc_html__( 'Select Social Media', 'organia' ),
        'section'     => 'blog_single_settings',
        'default'     => array(1, 2, 3, 4),
        'choices'     => [
                '1'   => esc_html__( 'Facebook', 'organia' ),
                '2'   => esc_html__( 'Twitter', 'organia' ),
                '3'   => esc_html__( 'Email', 'organia' ),
                '4'   => esc_html__( 'LinkedIn', 'organia' ),
                '5'   => esc_html__( 'Pinterest', 'organia' ),
                '6'   => esc_html__( 'Whatsapp', 'organia' ),
                '7'   => esc_html__( 'Digg', 'organia' ),
                '8'   => esc_html__( 'Tumblr', 'organia' ),
                '9'   => esc_html__( 'Reddit', 'organia' ),
        ],
        'active_callback' => [
                [
                        'setting'  => 'blog_single_is_share',
                        'operator' => '==',
                        'value'    => '1',
                ]
        ],
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'blog_single_is_author_box',
        'label'       => esc_html__( 'Is Author Info?', 'organia' ),
        'section'     => 'blog_single_settings',
        'default'     => '2',
        'choices'     => array(
            'on'  => esc_html__( 'Show', 'organia' ),
            'off' => esc_html__( 'Hide', 'organia' ),
        ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'blog_is_related',
    'label'       => esc_html__( 'Is Related Posts?', 'organia' ),
    'section'     => 'blog_single_settings',
    'default'     => '2',
    'choices'     => array(
        '1'       => esc_attr__( 'Show', 'organia' ),
        '2'       => esc_attr__( 'Hide', 'organia' ),
    ),
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'blog_related_title',
	'label'         => esc_html__('Related Area Title', 'organia'),
	'section'       => 'blog_single_settings',
	'default'       => esc_html__('Related News', 'organia'),
    'required'      => array( 
        array( 
            'setting'   => 'blog_is_related',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
        'type'        => 'slider',
	'settings'    => 'blog_rel_num_of_item',
	'label'       => esc_html__( 'Number Of Items', 'organia' ),
	'section'     => 'blog_single_settings',
	'default'     => 4,
	'choices'     => [
		'min'  => 1,
		'max'  => 100,
		'step' => 1,
	],
    'required'      => array( 
        array( 
            'setting'   => 'blog_is_related',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);

$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'blog_single_custom_03',
	'label'       => FALSE,
	'section'     => 'blog_single_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Blocks Settings', 'organia').'</div>',
);
$fields[] = array(
    'type'              => 'repeater',
	'label'         => esc_html__( 'Add Blocks', 'organia' ),
	'section'       => 'blog_single_settings',
	'settings'      => 'blog_single_bloks',
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__('Block', 'organia' ),
	],
	'button_label' => esc_html__('Add New Block', 'organia' ),
	'default'      => [],
	'fields' => [
		'block_ids' => [
			'type'        => 'select',
                        'label'       => esc_html__( 'Block', 'organia' ),
                        'default'     => 'none',
                        'choices'     => $all_bloks
		]
	]
);
