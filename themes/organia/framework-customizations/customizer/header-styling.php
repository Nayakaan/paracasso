<?php
/* Topbar Styling */
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_01',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label">'.esc_html__('Topbar Styling', 'organia').'</div>',
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_topbar_bg_color',
	'label'       => esc_html__( 'Topbar BG', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.topbar02',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_topbar_info_color',
	'label'       => esc_html__( 'Info Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.topbar02 p',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_topbar_location_color',
	'label'       => esc_html__( 'Store Locations Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.office_locations > a',
            'property' => 'color'
		],
        [
            'element'  => '.all_off_locations a',
            'property' => 'color'
        ],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'm_topbar_location_icon_color',
    'label'       => esc_html__( 'Store Locations Icon Color', 'organia' ),
    'section'     => 'header_styling',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.office_locations > a:after',
            'property' => 'color'
        ],
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_topbar_location_hover_color',
	'label'       => esc_html__( 'Location Hover Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
            'element'  => '.office_locations > a:hover',
            'property' => 'color'
        ],
        [
            'element'  => '.all_off_locations a:hover',
            'property' => 'color'
        ],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'm_topbar_location_hover_icon_color',
    'label'       => esc_html__( 'Store Locations Hover Icon Color', 'organia' ),
    'section'     => 'header_styling',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.office_locations > a:hover:after',
            'property' => 'color'
        ],
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_topbar_login_middle_color',
	'label'       => esc_html__( 'Middle Border Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.tbaccess ul li:last-child:after',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_topbar_login_color',
	'label'       => esc_html__( 'Login Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.tbaccess ul li a.login',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_topbar_login_hover_color',
	'label'       => esc_html__( 'Login Hover Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.tbaccess ul li a.login:hover',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
/* Middel Styling */
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_02',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label">'.esc_html__('Header Middle Styling', 'organia').'</div>',
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_bg_color',
	'label'       => esc_html__( 'Header Middle BG', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.headerMiddle',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_search_color',
	'label'       => esc_html__( 'Search Border Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.search-product',
            'property' => 'border-color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_search_input_color',
	'label'       => esc_html__( 'Search Input Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.search-product input[type="search"]::-moz-placeholder',
            'property' => 'color'
		],
		[
			'element'  => '.search-product input[type="search"]::-ms-input-placeholder',
            'property' => 'color'
		],[
			'element'  => '.search-product input[type="search"]::-webkit-input-placeholder',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_select_color',
	'label'       => esc_html__( 'Select Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.search-category select',
            'property' => 'color'
		],
		[
			'element'  => '.search-category .nice-select',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_select_icon_color',
	'label'       => esc_html__( 'Select Icon Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.search-category .nice-select:after',
            'property' => 'color'
		],
		[
			'element'  => '.search-category .nice-select:after',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_select_bg_color',
	'label'       => esc_html__( 'Select Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.search-category',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_info_icon_color',
	'label'       => esc_html__( 'Info Icon Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.midIconBox i',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_info_label_color',
	'label'       => esc_html__( 'Info Label Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.midIconBox h5',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_middle_info_value_color',
	'label'       => esc_html__( 'Info Value Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.midIconBox p',
            'property' => 'color'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);


/* main header Styling */
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_03',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label">'.esc_html__('Main Header Styling', 'organia').'</div>',
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_header_bg_color',
	'label'       => esc_html__( 'Header BG', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header02',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_header_bg_sticky',
	'label'       => esc_html__( 'Sticky Header BG', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => 'header.fixedHeader.header02',
            'property' => 'background'
		],
        [
            'element'  => '.header02.fixedHeader.defaultHeader',
            'property' => 'background'
        ],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_04',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label">'.esc_html__('Category Toggler Styling', 'organia').'</div>',
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_toggler_bg_color',
	'label'       => esc_html__( 'Toggler BG', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.all-categories-dropdown .select',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);
$fields[]= array(
    'type'        => 'color',
	'settings'    => 'm_toggler_color',
	'label'       => esc_html__( 'Toggler Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
	'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.all-categories-dropdown .select',
            'property' => 'color'
		],
		[
			'element'  => '.select span',
            'property' => 'background'
		],
		[
			'element'  => '.select span:before',
            'property' => 'background'
		],
		[
			'element'  => '.select span:after',
            'property' => 'background'
		],
	],
	'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '0'
        ),
    ),
);

/* Menu Bar Styling */
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_05',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Menu Item Styling', 'organia').'</div>',
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml1_color',
	'label'       => esc_html__( 'Menu Level-1 Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header02 .mainMenu ul li a',
            'property' => 'color'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml1_h_color',
	'label'       => esc_html__( 'Menu Level-1 Hover Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header02 .mainMenu ul li:hover > a, .header02 .mainMenu ul li.current-menu-item > a',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml1_border_color',
	'label'       => esc_html__( 'Menu Level-1 Hover Border Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header02 .mainMenu > ul > li > a::before',
            'property' => 'background'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_bg_color',
	'label'       => esc_html__( 'Menu Level-2 BG Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header02 .mainMenu > ul ul',
            'property' => 'background'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_border_color',
	'label'       => esc_html__( 'Menu Level-2 Border Bottom Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element'  => '.header02 .mainMenu > ul ul',
            'property' => 'border-bottom-color'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_txt_color',
	'label'       => esc_html__( 'Menu Level-2 Item Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .mainMenu ul ul li a',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_txt_h_color',
	'label'       => esc_html__( 'Menu Level-2 Item Hover Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .mainMenu > ul > li > ul li.current-menu-item > a, .header02 .mainMenu > ul > li > ul li:hover > a',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_ml2_txt_border_color',
	'label'       => esc_html__( 'Menu Level-2 Item Hover Border Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .mainMenu > ul ul li:hover > a:before',
            'property' => 'border-color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
/* Acces Styling */
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_06',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Wishlist Btn Styling', 'organia').'</div>',
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_color',
	'label'       => esc_html__( 'Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn',
            'property' => 'background'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_icon_color',
	'label'       => esc_html__( 'Icon Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_count_color',
	'label'       => esc_html__( 'Count Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn span',
            'property' => 'background'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_number_color',
	'label'       => esc_html__( 'Count Number Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn span',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_hover_color',
	'label'       => esc_html__( 'Hover Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn:hover',
            'property' => 'background'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_icon_hover_color',
	'label'       => esc_html__( 'Hover Icon Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn:hover',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_count_hover_color',
	'label'       => esc_html__( 'Hover Count Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn:hover span',
            'property' => 'background'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_number_hover_color',
	'label'       => esc_html__( 'Hover Count Number Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.wishlistBtn:hover span',
            'property' => 'color'
		],
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'header_styling_07',
	'label'       => FALSE,
	'section'     => 'header_styling',
	'default'     => '<div class="customizer_label mt40">'.esc_html__('Cart Btn Styling', 'organia').'</div>',
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_cart_color',
	'label'       => esc_html__( 'Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn',
            'property' => 'background'
		],
		[
			'element' => '.shoping_cart a.cartBtn',
            'property' => 'background'
		]

	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_wishlist_cart_color',
	'label'       => esc_html__( 'Icon Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn',
            'property' => 'color'
		],
		[
			'element' => '.shoping_cart a.cartBtn',
            'property' => 'color'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_cart_count_color',
	'label'       => esc_html__( 'Count Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn span',
            'property' => 'background'
		],
		[
			'element' => '.shoping_cart a.cartBtn span',
            'property' => 'background'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_cart_number_color',
	'label'       => esc_html__( 'Count Number Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn span',
            'property' => 'color'
		],
		[
			'element' => '.shoping_cart a.cartBtn span',
            'property' => 'color'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_cart_hover_color',
	'label'       => esc_html__( 'Hover Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn:hover',
            'property' => 'background'
		],
		[
			'element' => '.shoping_cart:hover a.cartBtn',
            'property' => 'background'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_cart_icon_hover_color',
	'label'       => esc_html__( 'Hover Icon Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn:hover',
            'property' => 'color'
		],
		[
			'element' => '.shoping_cart:hover a.cartBtn',
            'property' => 'color'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_cart_count_hover_color',
	'label'       => esc_html__( 'Hover Count Bg Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn:hover span',
            'property' => 'background'
		],
		[
			'element' => '.shoping_cart:hover a.cartBtn span',
            'property' => 'background'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'hs_cart_number_hover_color',
	'label'       => esc_html__( 'Hover Count Number Color', 'organia' ),
	'section'     => 'header_styling',
	'default'     => '',
    'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.header02 .accessNav a.cartBtn:hover span',
            'property' => 'color'
		],
		[
			'element' => '.shoping_cart:hover a.cartBtn span',
            'property' => 'color'
		]
	],
    'active_callback' => [
            [
                    'setting'   => 'header_style',
                    'operator'  => '==',
                    'value'     => '0' 
            ],
    ],
);

