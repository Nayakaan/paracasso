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
	'settings'    => 'shop_pro_custom_01',
	'label'       => FALSE,
	'section'     => 'shop_product_setting',
	'default'     => '<div class="customizer_label">'.esc_html__('Banner Settings', 'organia').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'shop_pro_is_banner',
	'label'       => esc_html__( 'Is Banner?', 'organia' ),
	'section'     => 'shop_product_setting',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Enable ', 'organia' ),
		'off'     => esc_html__( 'Disable ', 'organia' ),
	],
);
$fields[] = array(
    'type'        => 'background',
	'settings'    => 'shop_pro_banner_bg',
	'label'       => esc_html__( 'Banner Background', 'organia' ),
	'description' => esc_html__( 'Setup you product details page banner BG.', 'organia' ),
	'section'     => 'shop_product_setting',
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
			'element' => '.page_banner.shop_details_page_banner',
		]
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_pro_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'is_shop_pro_banner_title',
    'label'       => esc_html__( 'Is Banner Title?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'      => esc_html__( 'Show', 'organia' ),
        'off'     => esc_html__( 'Hide', 'organia' ),
    ],
    'active_callback' => [
            [
                    'setting'  => 'shop_pro_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[] = array(
    'type'          => 'text',
    'settings'      => 'shop_pro_banner_title',
    'label'         => '',
    'section'       => 'shop_product_setting',
    'default'       => '',
    'transport'     => 'postMessage',
    'js_vars'       => array(
        array(
            'element'  => '.page_banner.shop_details_page_banner .banner-title',
            'function' => 'html'
        )
    ),
    'active_callback' => [
            [
                    'setting'  => 'shop_pro_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ],
            [
                    'setting'  => 'is_shop_pro_banner_title',
                    'operator' => '==',
                    'value'    => 1,
            ]
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'shop_pro_is_breadcrumb',
	'label'       => esc_html__( 'Is Breadcrumb?', 'organia' ),
	'section'     => 'shop_product_setting',
	'default'     => '1',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_pro_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);
$fields[]= array(
    'type'            => 'radio-buttonset',
	'settings'    => 'shop_pro_banner_alignment',
	'label'       => esc_html__( 'Choose your banner text alignment.', 'organia' ),
	'section'     => 'shop_product_setting',
	'default'     => 'left',
	'choices'     => [
		'left'   => esc_html__( 'Left', 'organia' ),
		'center' => esc_html__( 'Center', 'organia' ),
		'right'  => esc_html__( 'Right', 'organia' ),
	],
    'active_callback' => [
            [
                    'setting'  => 'shop_pro_is_banner',
                    'operator' => '==',
                    'value'    => true,
            ]
    ],
);


$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'shop_pro_custom_02',
	'label'       => FALSE,
	'section'     => 'shop_product_setting',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Content Settings', 'organia').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_pro_view_style',
        'label'       => esc_html__( 'Product View Style', 'organia' ),
        'section'     => 'shop_product_setting',
        'default'     => '1',
        'description' => esc_html__( 'setup your single product view style.', 'organia' ),
        'choices'     => array(
                '1'     => esc_html__( 'View Style 01', 'organia' ),
                '2'     => esc_html__( 'View Style 02', 'organia' ),
                '3'     => esc_html__( 'View Style 03', 'organia' ),
        ),
);
$fields[] = array(
    'type'        => 'background',
    'settings'    => 'shop_pro_spage_bg',
    'label'       => esc_html__( 'Section Background', 'organia' ),
    'description' => esc_html__( 'Setup single product section background.', 'organia' ),
    'section'     => 'shop_product_setting',
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
            'element' => '.singleProduct02',
        ]
    ],
    'active_callback' => [
            [
                    'setting'  => 'shop_pro_view_style',
                    'operator' => '==',
                    'value'    => 2,
            ]
    ],
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_pro_gal_style',
        'label'       => esc_html__( 'Gallery Style', 'organia' ),
        'section'     => 'shop_product_setting',
        'default'     => '1',
        'choices'     => array(
                '1'     => esc_html__( 'Gallery In Left', 'organia' ),
                '2'     => esc_html__( 'Gallery In Right', 'organia' )
        ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'shop_pro_is_pricing_unit',
    'label'       => esc_html__( 'Is Pricing Unit?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => 'off',
    'choices'     => [
        'on'      => esc_html__( 'Show', 'organia' ),
        'off'     => esc_html__( 'Hide', 'organia' ),
    ],
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'shop_pro_is_sku',
    'label'       => esc_html__( 'Is SKU?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'      => esc_html__( 'Show', 'organia' ),
        'off'     => esc_html__( 'Hide', 'organia' ),
    ],
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'shop_pro_is_tags',
    'label'       => esc_html__( 'Is Tags?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '1',
    'choices'     => [
        'on'      => esc_html__( 'Show', 'organia' ),
        'off'     => esc_html__( 'Hide', 'organia' ),
    ],
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'shop_pro_is_cats',
    'label'       => esc_html__( 'Is Categories?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'      => esc_html__( 'Show', 'organia' ),
        'off'     => esc_html__( 'Hide', 'organia' ),
    ],
);
$fields[]= array(
    'type'        => 'switch',
	'settings'    => 'shop_pro_is_share',
	'label'       => esc_html__( 'Is Share?', 'organia' ),
	'section'     => 'shop_product_setting',
	'default'     => '2',
	'choices'     => [
		'on'      => esc_html__( 'Show', 'organia' ),
		'off'     => esc_html__( 'Hide', 'organia' ),
	],
);
$fields[]= array(
    'type'        => 'multicheck',
    'settings'    => 'shop_pro_socials',
    'label'       => esc_html__( 'Select Social Media', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => array('1', '2', '3', '4'),
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
    'required'      => array( 
        array( 
            'setting'   => 'shop_pro_is_share',
            'operator'  => '==',
            'value'     => '1' 
        )
    ),
);
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'shop_pro_custom_03',
    'label'       => FALSE,
    'section'     => 'shop_product_setting',
    'default'     => '<div class="customizer_label mt40">'.esc_html__('Upsell Settings', 'organia').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'shop_pro_is_upsell',
    'label'       => esc_html__('Is Upsell Product?', 'organia'),
    'section'     => 'shop_product_setting',
    'default'     => '1',
    'choices'     => array(
        'on'      => esc_html__('Show', 'organia'),
        'off'     => esc_html__('Hide', 'organia'),
    ),
);
$fields[] = array(
    'type'          => 'text',
    'settings'      => 'shop_pro_upsell_title',
    'label'         => esc_html__('Upsell Title', 'organia'),
    'section'       => 'shop_product_setting',
    'default'       => esc_html__('Upsell Products', 'organia'),
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_upsell',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_pro_upsell_style',
        'label'       => esc_html__( 'Upsell Product Style', 'organia' ),
        'section'     => 'shop_product_setting',
        'default'     => '1',
        'choices'     => array(
                '1'     => esc_html__( 'Style 01', 'organia' ),
                '2'     => esc_html__( 'Style 02', 'organia' )
        ),
        'required'      => array(
            array( 
                'setting'   => 'shop_pro_is_upsell',
                'operator'  => '==',
                'value'     => TRUE 
            )
        ),
);
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'shop_pro_custom_04',
    'label'       => FALSE,
    'section'     => 'shop_product_setting',
    'default'     => '<div class="customizer_label mt40">'.esc_html__('Related Settings', 'organia').'</div>',
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'shop_pro_is_related',
    'label'       => esc_html__('Is Related Product?', 'organia'),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => array(
        'on'  => esc_html__('Show', 'organia'),
        'off' => esc_html__('Hide', 'organia'),
    ),
);
$fields[] = array(
    'type'          => 'text',
    'settings'      => 'shop_pro_related_sub_title',
    'label'         => esc_html__('Related Sub Title', 'organia'),
    'section'       => 'shop_product_setting',
    'default'       => esc_html__('Nature Only', 'organia'),
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_related',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);
$fields[] = array(
    'type'          => 'text',
	'settings'      => 'shop_pro_related_title',
	'label'         => esc_html__('Related Title', 'organia'),
	'section'       => 'shop_product_setting',
	'default'       => esc_html__('Related Product', 'organia'),
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_related',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'shop_pro_related_style',
        'label'       => esc_html__( 'Related Style', 'organia' ),
        'section'     => 'shop_product_setting',
        'default'     => '1',
        'choices'     => array(
                '1'     => esc_html__( 'Style 01', 'organia' ),
                '2'     => esc_html__( 'Style 02', 'organia' )
        ),
        'required'      => array(
            array( 
                'setting'   => 'shop_pro_is_related',
                'operator'  => '==',
                'value'     => TRUE 
            )
        ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'product_is_empty_rating',
    'label'       => esc_html__( 'Is Empty Rating?', 'organia' ),
    'description' => esc_html__( 'Dow you want to show empty rating start where thers is no rating available for the product?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'     => esc_html__( 'Show', 'organia' ),
        'off'    => esc_html__( 'Hide', 'organia' ),
    ],
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_related',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'product_is_flashlabels',
    'label'       => esc_html__( 'Is Flash Lebels?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'     => esc_html__( 'Show', 'organia' ),
        'off'    => esc_html__( 'Hide', 'organia' ),
    ],
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_related',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'product_is_wishlist',
    'label'       => esc_html__( 'Is Wishlist?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'     => esc_html__( 'Show', 'organia' ),
        'off'    => esc_html__( 'Hide', 'organia' ),
    ],
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_related',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'product_is_compare',
    'label'       => esc_html__( 'Is Compare?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'     => esc_html__( 'Show', 'organia' ),
        'off'    => esc_html__( 'Hide', 'organia' ),
    ],
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_related',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);

$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'product_is_pricing_unit',
    'label'       => esc_html__( 'Is Pricing Unit?', 'organia' ),
    'section'     => 'shop_product_setting',
    'default'     => '2',
    'choices'     => [
        'on'     => esc_html__( 'Show', 'organia' ),
        'off'    => esc_html__( 'Hide', 'organia' ),
    ],
    'required'      => array(
        array( 
            'setting'   => 'shop_pro_is_related',
            'operator'  => '==',
            'value'     => TRUE 
        )
    ),
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'product_custom_05',
	'label'       => FALSE,
	'section'     => 'shop_product_setting',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Blocks Settings', 'organia').'</div>',
);
$fields[] = array(
    'type'          => 'repeater',
	'label'         => esc_html__( 'Add Blocks', 'organia' ),
	'section'       => 'shop_product_setting',
	'settings'      => 'product_bloks',
	'row_label'     => [
		'type'      => 'text',
		'value'     => esc_html__('Block', 'organia' ),
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