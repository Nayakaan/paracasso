<?php
$bloks = array(
    'post_type'       => 'blocks',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'orderby'         => 'title',
    'order'           => 'ASC'
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
	'settings'    => 'shop_custom_01',
	'label'       => FALSE,
	'section'     => 'shop_settings',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => '1',
	'choices'     => [
		'on'     => esc_html__( 'Enable ', 'organia' ),
		'off'    => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'background',
	'settings'    => 'shop_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you shop listing page banner BG.', 'organia' ),
	'section'     => 'shop_settings',
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
			'element' => '.page_banner.shop_page_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'is_shop_banner_title',
    'label'       => esc_html__( 'Is Banner Title?', 'organia' ),
    'section'     => 'shop_settings',
    'default'     => '2',
    'choices'     => [
        'on'      => esc_html__( 'Show', 'organia' ),
        'off'     => esc_html__( 'Hide', 'organia' ),
    ],
    'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'shop_banner_title',
	'label'         => esc_html__('Banner Title', 'organia'),
	'section'       => 'shop_settings',
	'default'       => esc_html__('Products', 'organia'),
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.shop_page_banner .banner-title',
            'function' => 'html'
        ),
    ),
    'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ],
            [
                    'setting'  => 'is_shop_banner_title',
                    'operator' => '==',
                    'value'    => 1,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
        'active_callback' => [
                [
                        'setting'  => 'shop_is_banner',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[]= array(
        'type'        => 'radio-buttonset',
	'settings'    => 'shop_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'left',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
        'active_callback' => [
            [
                    'setting'  => 'shop_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ],
        ],
);

$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_custom_022',
	'label'       => FALSE,
	'section'     => 'shop_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Top Block Settings', 'organia').'</div>',
);
$fields[] = array(
    'type'              => 'repeater',
	'label'         => esc_html__( 'Add Top Blocks', 'organia' ),
	'section'       => 'shop_settings',
	'settings'      => 'shop_top_bloks',
	'row_label'     => [
		'type'  => 'text',
		'value' => esc_html__('Block', 'organia' ),
	],
	'button_label' => esc_html__('Add New Block', 'organia' ),
	'default'      => [],
	'fields' => [
		'top_block_ids' => [
			'type'        => 'select',
                        'label'       => esc_html__( 'Block', 'organia' ),
                        'default'     => 'none',
                        'choices'     => $all_bloks
		]
	]
);



$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_custom_02',
	'label'       => FALSE,
	'section'     => 'shop_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Content Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_category_dropdown',
	'label'       => esc_html__( 'Is Category Dropdown?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'on',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
        'type'        => 'text',
	'settings'    => 'shop_dropdown_label',
	'label'       => esc_html__( 'Dropdown Label', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => esc_html__('Categories', 'organia'),
        'active_callback' => [
                [
                        'setting'  => 'shop_is_category_dropdown',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[] = array(
    'type'              => 'repeater',
	'label'         => esc_html__( 'Dropdown Categories', 'organia' ),
	'section'       => 'shop_settings',
	'settings'      => 'shop_categories',
	'row_label'     => [
		'type'  => 'text',
		'value' => esc_html__('Category', 'organia' ),
	],
	'button_label' => esc_html__('Add New Category', 'organia' ),
	'default'      => [],
	'fields' => [
		'cat_id' => [
			'type'        => 'select',
                        'label'       => esc_html__( 'Category', 'organia' ),
                        'default'     => '0',
                        'choices'     => organia_category_array('product_cat')
		]
	],
        'active_callback' => [
                [
                        'setting'  => 'shop_is_category_dropdown',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_custom_hr_1',
	'label'       => FALSE,
	'section'     => 'shop_settings',
	'default'     => '<div class="customizer_devider"></div>',
        'active_callback' => [
                [
                        'setting'  => 'shop_is_category_dropdown',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);

$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_sort',
	'label'       => esc_html__( 'Is Sort?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'on',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
    'type'        => 'text',
    'settings'    => 'shop_sort_label',
    'label'       => esc_html__( 'Sort Label', 'organia' ),
    'section'     => 'shop_settings',
    'default'     => esc_html__('Sort By:', 'organia'),
    'active_callback' => [
            [
                    'setting'  => 'shop_is_sort',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_view_toggler',
	'label'       => esc_html__( 'Is View Toggler?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'on',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_default_view',
        'label'       => esc_html__( 'Default View', 'organia' ),
        'section'     => 'shop_settings',
        'default'     => '1',
        'choices'     => array(
                '1'      => esc_html__('Grid View','organia'),
                '2'      => esc_html__('List View','organia')
        ),
        'active_callback' => [
                [
                        'setting'  => 'shop_is_view_toggler',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_product_style',
        'label'       => esc_html__( 'Product Style', 'organia' ),
        'section'     => 'shop_settings',
        'default'     => '1',
        'choices'     => array(
                1       => esc_html__('Style 01', 'organia'),
                2       => esc_html__('Style 02', 'organia'),
                3       => esc_html__('Style 03', 'organia'),
                4       => esc_html__('Style 04', 'organia'),
                5       => esc_html__('Style 05', 'organia'),
                6       => esc_html__('Style 06', 'organia')
        ),
);
$fields[] = array(
        'type'        => 'number',
	'settings'    => 'shop_thumb_width',
	'label'       => esc_html__( 'Thumbnail Width', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => '',
	'choices'     => [
		'min'  => 0,
		'max'  => 1000,
		'step' => 1,
	]
);
$fields[] = array(
        'type'        => 'number',
	'settings'    => 'shop_thumb_height',
	'label'       => esc_html__( 'Thumbnail Height', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => '',
	'choices'     => [
		'min'  => 0,
		'max'  => 1000,
		'step' => 1,
	]
);
$fields[] = array(
        'type'        => 'number',
	'settings'    => 'shop_list_thumb_width',
	'label'       => esc_html__( 'List Thumbnail Width', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => '',
	'choices'     => [
		'min'  => 0,
		'max'  => 1000,
		'step' => 1,
	]
);
$fields[] = array(
        'type'        => 'number',
	'settings'    => 'shop_list_thumb_height',
	'label'       => esc_html__( 'List Thumbnail Height', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => '',
	'choices'     => [
		'min'  => 0,
		'max'  => 1000,
		'step' => 1,
	]
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_product_mode',
        'label'       => esc_html__( 'Product Rounded Mode', 'organia' ),
        'section'     => 'shop_settings',
        'default'     => '1',
        'choices'     => array(
                1       => esc_html__('Group Rounded', 'organia'),
                2       => esc_html__('Single Rounded', 'organia')
        ),
        'active_callback' => [
                [
                        'setting'  => 'shop_product_style',
                        'operator' => '==',
                        'value'    => '1',
                ]
        ],
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_col_per_row',
        'label'       => esc_html__( 'Collumn Per Row XL', 'organia' ),
        'section'     => 'shop_settings',
        'default'     => '4',
        'choices'     => array(
                2       => esc_html__('2 Columns', 'organia'),
                3       => esc_html__('3 Columns', 'organia'),
                4       => esc_html__('4 Columns', 'organia'),
        ),
        'description' => esc_html__('How many item you want to show per row in xl device?', 'organia'),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_col_per_row_lg',
        'label'       => esc_html__( 'Collumn Per Row LG', 'organia' ),
        'section'     => 'shop_settings',
        'default'     => '4',
        'choices'     => array(
                2       => esc_html__('2 Columns', 'organia'),
                3       => esc_html__('3 Columns', 'organia'),
                4       => esc_html__('4 Columns', 'organia')
        ),
        'description' => esc_html__('How many item you want to show per row in LG device?', 'organia'),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_sidebar',
        'label'       => esc_html__( 'Sidebar Position', 'organia' ),
        'section'     => 'shop_settings',
        'default'     => '1',
        'choices'     => array(
                '1'      => esc_html__('Full Width','organia'),
                '2'      => esc_html__('Left Sidebar','organia'),
                '3'      => esc_html__('Right Sidebar','organia'),
        ),
);
$fields[] = array(
        'type'        => 'slider',
	'settings'    => 'shop_numof_product',
	'label'       => esc_html__( 'Number Of Products', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 9,
	'choices'     => [
		'min'  => 1,
		'max'  => 1000,
		'step' => 1,
	],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_empty_rating',
	'label'       => esc_html__( 'Is Empty Rating?', 'organia' ),
	'description' => esc_html__( 'Dow you want to show empty rating start where thers is no rating available for the product?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'off',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_flashlabels',
	'label'       => esc_html__( 'Is Flash Lebels?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'off',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_wishlist',
	'label'       => esc_html__( 'Is Wishlist?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'off',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_compare',
	'label'       => esc_html__( 'Is Compare?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'off',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_quickview',
	'label'       => esc_html__( 'Is Quick View?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'off',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_pricing_unit',
	'label'       => esc_html__( 'Is Pricing Unit?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'off',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);

$fields[]= array(
        'type'        => 'switch',
	'settings'    => 'shop_is_res_count',
	'label'       => esc_html__( 'Is Result Count?', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => 'off',
	'choices'     => [
		'on'     => esc_html__( 'Show', 'organia' ),
		'off'    => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[] = array(
        'type'        => 'radio-buttonset',
        'settings'    => 'shop_pagi_align',
        'label'       => esc_html__( 'Pagination Alignment', 'organia' ),
        'section'     => 'shop_settings',
        'default'     => 'center',
        'choices'     => array(
                'left'      => esc_html__('Left','organia'),
                'center'    => esc_html__('Center','organia'),
                'right'     => esc_html__('Right','organia'),
        )
);
$fields[] = array(
        'type'        => 'slider',
	'settings'    => 'shop_paging_margin',
	'label'       => esc_html__( 'Pagination Gapping', 'organia' ),
	'section'     => 'shop_settings',
	'default'     => '',
	'choices'     => [
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	],
        'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.make_pagination.shop_pagination',
                        'property' => 'margin-top',
                        'suffix'   => 'px'
		]       
	],
);


$fields[] = array(
        'type'        => 'custom',
	'settings'    => 'shop_custom_03',
	'label'       => FALSE,
	'section'     => 'shop_settings',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Bottom Blocks Settings', 'organia').'</div>',
);
$fields[] = array(
    'type'              => 'repeater',
	'label'         => esc_html__( 'Add Bottom Blocks', 'organia' ),
	'section'       => 'shop_settings',
	'settings'      => 'shop_bottom_bloks',
	'row_label'     => [
		'type'  => 'text',
		'value' => esc_html__('Block', 'organia' ),
	],
	'button_label' => esc_html__('Add New Block', 'organia' ),
	'default'      => [],
	'fields' => [
		'bottom_block_ids' => [
			'type'        => 'select',
                        'label'       => esc_html__( 'Block', 'organia' ),
                        'default'     => 'none',
                        'choices'     => $all_bloks
		]
	]
);
