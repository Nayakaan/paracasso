<?php
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'popup_custom_01',
	'label'       => FALSE,
	'section'     => 'popup_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Global Site Popup Settings', 'organia').'</div>',
);
$fields[]= array(
        'type'        => 'switch',
        'settings'    => 'enable_popup',
        'label'       => esc_html__( 'Is Site Popup?', 'organia' ),
        'section'     => 'popup_section',
        'default'     => '2',
        'choices'     => array(
                'on'    => esc_attr__( 'Enable', 'organia' ),
                'off'   => esc_attr__( 'Disable', 'organia' ),
        ),
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'site_popup_style',
        'label'       => esc_html__( 'Popup Style', 'organia' ),
        'section'     => 'popup_section',
        'default'     => '1',
        'choices'     => [
            '1'       => esc_html__( 'Style 01', 'organia' ),
            '2'       => esc_html__( 'Style 02', 'organia' ),
        ],
        'active_callback' => [
                [
                        'setting'   => 'enable_popup',
                        'operator'  => '==',
                        'value'     => TRUE 
                ],
        ],
);
$fields[]= array(
    'type'        => 'image',
    'settings'    => 'popup_image',
    'label'       => esc_html__( 'Popup Left Image', 'organia' ),
    'description' => esc_html__( 'Upload your custom popup image. Image size should be 414x505px.', 'organia' ),
    'section'     => 'popup_section',
    'default'     => '',
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
            [
                    'setting'   => 'site_popup_style',
                    'operator'  => '==',
                    'value'     => '1' 
            ],
    ],
);
$fields[]= array(
    'type'        => 'image',
    'settings'    => 'popup_bg_image',
    'label'       => esc_html__( 'Popup BG Image', 'organia' ),
    'description' => esc_html__( 'Upload your custom popup background image. Image size should be 800x430px.', 'organia' ),
    'section'     => 'popup_section',
    'default'     => '',
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
            [
                    'setting'   => 'site_popup_style',
                    'operator'  => '==',
                    'value'     => '2' 
            ],
    ],
);
$fields[] = array(
    'type'          => 'text',
    'settings'      => 'popup_titles',
    'label'         => esc_html__('Popup Title', 'organia'),
    'section'       => 'popup_section',
    'default'       => esc_html__('50% OFF', 'organia'),
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
    ],
);
$fields[] = array(
    'type'          => 'text',
    'settings'      => 'popup_sub_titles',
    'label'         => esc_html__('Popup Sub Title', 'organia'),
    'section'       => 'popup_section',
    'default'       => esc_html__('Don’t want to miss anything?', 'organia'),
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
    ],
);
$fields[] = array(
    'type'          => 'textarea',
    'settings'      => 'popup_content',
    'label'         => esc_html__('Popup Content', 'organia'),
    'section'       => 'popup_section',
    'default'       => esc_html__('Garcia, a versatil web designer. Phasellus vehicula the justo eg diam in posuere phasellus eget sem', 'organia'),
    'description'   => esc_html__( 'use {} for link text', 'organia' ),
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
    ],
);
$fields[] = array(
    'type'          => 'text',
    'settings'      => 'link_url',
    'label'         => esc_html__('Content Link Url', 'organia'),
    'section'       => 'popup_section',
    'default'       => '',
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
    ],
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'select_mail',
        'label'       => esc_html__( 'Select Maichimp', 'organia' ),
        'section'     => 'popup_section',
        'default'     => '0',
        'choices'     => organia_easy_mailchimp(),
        'active_callback' => [
                [
                        'setting'  => 'enable_popup',
                        'operator' => '==',
                        'value'    => true,
                ]
        ],
);
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'popup_styling_01',
    'label'       => FALSE,
    'section'     => 'popup_section',
    'default'     => '<div class="customizer_label">'.esc_html__('Popup Style', 'organia').'</div>',
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
    ],
);
$fields[]= array(
    'type'        => 'color',
    'settings'    => 'overlay_color',
    'label'       => esc_html__( 'Popup Overlay Color', 'organia' ),
    'section'     => 'popup_section',
    'default'     => '',
    'transport'   => 'auto',
    'output'      => [
        [
            'element'  => '.popupInner, .popup02 .popupInner',
            'property' => 'background'
        ],
    ],
    'active_callback' => [
            [
                    'setting'   => 'enable_popup',
                    'operator'  => '==',
                    'value'     => TRUE 
            ],
    ],
);
