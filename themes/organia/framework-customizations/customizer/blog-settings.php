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
	'settings'    => 'blog_custom_01',
	'label'       => FALSE,
	'section'     => 'blog_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'organia').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'blog_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'blog_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'blog_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you blog page banner BG.', 'organia' ),
	'section'     => 'blog_settings',
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
			'element' => '.page_banner.blog_page_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'blog_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'blog_settings',
	'default'       => esc_html__('Blog & News', 'organia'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.blog_page_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'blog_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'blog_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'blog_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'blog_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'blog_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
);

$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'blog_custom_02',
	'label'       => FALSE,
	'section'     => 'blog_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Content Settings', 'organia').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'blog_sidebar',
        'label'       => esc_html__( 'Blog Sidebar Position', 'organia' ),
        'section'     => 'blog_settings',
        'default'     => '3',
        'choices'     => array(
                '1'      => esc_html__('No Sidebar','organia'),
                '2'      => esc_html__('Left Sidebar','organia'),
                '3'      => esc_html__('Right Sidebar','organia'),
        ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'blog_view',
        'label'       => esc_html__( 'Post View', 'organia' ),
        'section'     => 'blog_settings',
        'default'     => '1',
        'choices'     => array(
                '1'     => esc_html__( 'Standard View', 'organia' ),
                '2'     => esc_html__( 'Grid View', 'organia' ),
        ),
);
$fields[] = array(
    'type'        => 'slider',
	'settings'    => 'blog_str_limit',
	'label'       => esc_html__( 'Excerpt Limit', 'organia' ),
	'section'     => 'blog_settings',
	'default'     => 309,
	'choices'     => [
		'min'  => 0,
		'max'  => 1000,
		'step' => 1,
	],
	'active_callback' => [
            [
                    'setting'  => 'blog_view',
                    'operator' => '==',
                    'value'    => 1,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'blog_readmore_label',
	'label'         => esc_html__('Button Label', 'organia'),
	'section'       => 'blog_settings',
	'default'       => esc_html__('Read More', 'organia'),
	'active_callback' => [
            [
                    'setting'  => 'blog_view',
                    'operator' => '==',
                    'value'    => 1,
            ]
    ],
);
$fields[] = array(
    'type'        => 'slider',
	'settings'    => 'blog_paging_margin',
	'label'       => esc_html__( 'Pagination Gapping', 'organia' ),
	'section'     => 'blog_settings',
	'default'     => 1,
	'choices'     => [
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	],
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.blogPage .organ_pagination',
            'property' => 'margin-top',
            'suffix'   => 'px'
		]       
	],
);
$fields[]= array(
    'type'        => 'radio-buttonset',
	'settings'    => 'blog_pagi_align',
	'label'       => esc_html__( 'Choose your blog pagination alignment.', 'organia' ),
	'section'     => 'blog_settings',
	'default'     => 'center',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
);

$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'blog_custom_03',
	'label'       => FALSE,
	'section'     => 'blog_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Blocks Settings', 'organia').'</div>',
);
$fields[] = array(
    'type'              => 'repeater',
	'label'         => esc_html__( 'Add Blocks', 'organia' ),
	'section'       => 'blog_settings',
	'settings'      => 'blog_bloks',
	'row_label'     => [
		'type'  => 'text',
		'value' => esc_html__('Block', 'organia' ),
	],
	'button_label'  => esc_html__('Add New Block', 'organia' ),
	'default'       => [],
	'fields'        => [
		'block_ids' => [
			'type'        => 'select',
                        'label'       => esc_html__( 'Block', 'organia' ),
                        'default'     => 'none',
                        'choices'     => $all_bloks
		]
	]
);