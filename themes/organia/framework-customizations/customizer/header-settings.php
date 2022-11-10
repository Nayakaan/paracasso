<?php
$header = array(
    'post_type'       => 'tw-header-builder',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'orderby'         => 'title',
    'order'           => 'ASC'
);
$all_header = array(
    '0' => esc_html__('Default Header', 'organia')
);
$headers = new WP_Query($header);
if($headers->have_posts()):
    while($headers->have_posts()):
    $headers->the_post();
    $all_header[get_the_ID()] = get_the_title();
    endwhile;
endif;
wp_reset_postdata();

$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_01',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Header Settings', 'organia') . '</div>',
);
$fields[] = array(
    'type'      => 'select',
    'settings'  => 'header_style',
    'label'     => esc_html__('Header Style', 'organia'),
    'section'   => 'header_settings',
    'default'   => '0',
    'choices'   => $all_header,
);
//Tobar Settings
$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_02',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Topbar Settings', 'organia') . '</div>',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        )
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_topbar',
    'label'     => esc_html__('Is Topbar?', 'organia'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'organia'),
        'off'   => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        )
    ),
);
$fields[]           = array(
    'type'          => 'text',
    'settings'      => 'header_topbar_info',
    'label'         => esc_html__('Topbar Info', 'organia'),
    'description'   => '',
    'section'       => 'header_settings',
    'default'       => '',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'header_is_locations',
    'label'       => esc_html__( 'Is Store Locations?', 'organia' ),
    'section'     => 'header_settings',
    'default'     => '2',
    'choices'     => [
        'on'      => esc_html__( 'Enable ', 'organia' ),
        'off'     => esc_html__( 'Disable ', 'organia' ),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[] = array(
    'type'        => 'repeater',
    'label'       => esc_html__('Store Locations', 'organia'),
    'section'     => 'header_settings',
    'settings'    => 'header_off_locations',
    'row_label'   => [
            'type'  => 'text',
            'value' => esc_html__('Locations', 'organia' ),
    ],
    'button_label' => esc_html__('Add Location', 'organia' ),
    'default'      => [],
    'fields' => [
            'ol_active'  => [
                    'type'        => 'switch',
                    'settings'    => 'ol_is_active',
                    'label'       => esc_html__( 'Is Current Location?', 'organia' ),
                    'section'     => 'header_settings',
                    'default'     => '2',
                    'choices'     => [
                            'on'     => esc_html__( 'Yes ', 'organia' ),
                            'off'     => esc_html__( 'No ', 'organia' ),
                    ],
            ],
            'ol_flag'  => [
                    'type'        => 'image',
                    'label'       => esc_html__( 'Location Flag', 'organia' ),
                    'description' => esc_html__( 'Upload location flag here. Flag size should be 19x12px.', 'organia' ),
                    'default'     => '',
            ],
            'ol_name'  => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Location Name', 'organia' ),
                    'default'     => '',
            ],
            'ol_url'  => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Location URL', 'organia' ),
                    'default'     => '',
            ],
    ],
    'active_callback' => [
            [
                        'setting'   => 'header_style',
                        'operator'  => '==',
                        'value'     => ['0']
            ],
            [
                    'setting'  => 'header_is_topbar',
                    'operator' => '==',
                    'value'    => '1'
            ],
            [
                    'setting'  => 'header_is_locations',
                    'operator' => '==',
                    'value'    => '1'
            ],
    ],
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_login',
    'label'     => esc_html__('Is Login Btn?', 'organia'),
    'description' => esc_html__('Do you want to show login button? ', 'organia'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'organia'),
        'off'   => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[] = array(
    'type'      => 'text',
    'settings'  => 'btn_label',
    'label'     => esc_html__('Login Label', 'organia'),
    'section'   => 'header_settings',
    'default'   => esc_html__('Login', 'organia'),
    'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '',
            'function' => 'html'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_topbar',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
//Tobar Settings
$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_03',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Header Middle Settings', 'organia') . '</div>',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        )
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_hmiddle',
    'label'     => esc_html__('Is Header Middle?', 'organia'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'organia'),
        'off'   => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]           = array(
    'type'          => 'image',
    'settings'      => 'header_logo',
    'label'         => esc_html__('Logo', 'organia'),
    'description'   => esc_html__('Upload your site logo. Default logo size 193x76px.', 'organia'),
    'section'       => 'header_settings',
    'default'       => '',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]           = array(
    'type'          => 'dimensions',
    'settings'      => 'header_logo_dimentions',
    'label'         => esc_html__('Logo Dimension', 'organia'),
    'description'   => esc_html__('Set your logo dimension here. Please insert unit also. Like 100px or 100em.', 'organia'),
    'section'       => 'header_settings',
    'default'       => [
        'width'     => '',
        'height'    => '',
    ],
    'transport'     => 'auto',
    'output'        => [
        [
            'element' => '.logo img'
        ],
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_search',
    'label'     => esc_html__('Is Middle Search?', 'organia'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'organia'),
        'off'   => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_cat_search',
    'label'     => esc_html__('Is Middle Search Category Btn?', 'organia'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'organia'),
        'off'   => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        ),
        array(
            'setting'  => 'header_is_search',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_infobox',
    'label'     => esc_html__('Is Middle Info Box?', 'organia'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'organia'),
        'off'   => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[] = array(
    'type'      => 'text',
    'settings'  => 'info_label',
    'label'     => esc_html__('Info Label', 'organia'),
    'section'   => 'header_settings',
    'default'   => '',
    'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '',
            'function' => 'html'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);
$fields[] = array(
    'type'      => 'text',
    'settings'  => 'info_value',
    'label'     => esc_html__('Info value', 'organia'),
    'section'   => 'header_settings',
    'default'   => '',
    'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '',
            'function' => 'html'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
        array(
            'setting'  => 'header_is_hmiddle',
            'operator' => '==',
            'value'    => '1'
        )
    ),
);

//Main Header Settings
$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_04',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Main Header Settings', 'organia') . '</div>',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_sticky',
    'label'     => esc_html__('Is Sticky?', 'organia'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'organia'),
        'off'   => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'select_type',
        'label'       => esc_html__( 'Main Header Left Content Type', 'organia' ),
        'section'     => 'header_settings',
        'default'     => '1',
        'choices'     => array(
                '1'     => esc_html__( 'Logo', 'organia' ),
                '2'     => esc_html__( 'Category Toggler', 'organia' )
        ),
        'active_callback' => array(
            array(
                'setting'   => 'header_style',
                'operator'  => '==',
                'value'     => ['0']
            )
        ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_category',
    'label'     => esc_html__('Is Category Toggler?', 'organia'),
    'section' => 'header_settings',
    'default' => '2',
    'choices' => [
        'on'  => esc_html__('Enable ', 'organia'),
        'off' => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'select_type',
            'operator'  => '==',
            'value'     => '2'
        ),
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[] = array(
    'type'      => 'text',
    'settings'  => 'category_label',
    'label'     => esc_html__('Category Toggler Label', 'organia'),
    'section'   => 'header_settings',
    'default'   => esc_html__('All Categories', 'organia'),
    'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '',
            'function' => 'html'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'   => 'select_type',
            'operator'  => '==',
            'value'     => '2'
        ),
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]       = array(
    'type'      => 'select',
    'settings'  => 'select_category',
    'label'     => esc_html__('Select Category', 'organia'),
    'section'   => 'header_settings',
    'default'   => '',
    'multiple'  => 999,
    'choices'   => organia_category_array('product_cat'),
    'active_callback' => array(
        array(
            'setting'   => 'select_type',
            'operator'  => '==',
            'value'     => '2'
        ),
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[] = array(
    'type'      => 'text',
    'settings'  => 'category_more_label',
    'label'     => esc_html__('Read More Category Label', 'organia'),
    'section'   => 'header_settings',
    'default'   => '',
    'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '',
            'function' => 'html'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'   => 'select_type',
            'operator'  => '==',
            'value'     => '2'
        ),
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[] = array(
    'type'      => 'text',
    'settings'  => 'category_more_url',
    'label'     => esc_html__('Read More Category url', 'organia'),
    'section'   => 'header_settings',
    'default'   => '',
    'transport' => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '',
            'function' => 'html'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'   => 'select_type',
            'operator'  => '==',
            'value'     => '2'
        ),
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]           = array(
    'type'          => 'image',
    'settings'      => 'header_logos',
    'label'         => esc_html__('Logo', 'organia'),
    'description'   => esc_html__('Upload your site logo. Default logo size 193x55px.', 'organia'),
    'section'       => 'header_settings',
    'default'       => '',
    'active_callback' => array(
        array(
            'setting'   => 'select_type',
            'operator'  => '==',
            'value'     => '1'
        ),
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_wishlist',
    'label'     => esc_html__('Is Wishlist Btn?', 'organia'),
    'section' => 'header_settings',
    'default' => '2',
    'choices' => [
        'on'  => esc_html__('Enable ', 'organia'),
        'off' => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_cart',
    'label'     => esc_html__('Is Cart Btn?', 'organia'),
    'section' => 'header_settings',
    'default' => '2',
    'choices' => [
        'on'  => esc_html__('Enable ', 'organia'),
        'off' => esc_html__('Disable ', 'organia'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => ['0']
        ),
    ),
);




