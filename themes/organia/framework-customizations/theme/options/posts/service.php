<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
        '_service_meta' => array(
                'title'          => esc_html__( 'Service Icon', 'organia' ),
                'type'           => 'box',
                'priority'       => 'high',
                'context'        => 'side',
                'options'        => array(
                        'service_sub_title'      => array(
                                'type'           => 'text',
                                'value'          => '',
                                'label'          => esc_html__( 'Service Sub Title', 'organia' ),
                                'desc'           => esc_html__( 'Insert your services post sub title.', 'organia' ),
                        ),
                ),
        ),
        'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
                        '_service_meta' => array(
                                'title'		 => esc_html__( 'Banner Settings', 'organia' ),
                                'type'		 => 'tab',
                                'options'	 => array(
                                        'srv_is_settings'                    => array(
                                                'label'        => esc_html__( 'Enable Settings', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'organia' )
                                                ),
                                                'value'        => '2',
                                                'desc'         => esc_html__('Enable bellow settings for this service details page banner. All settings will override customizer "Service Single Settings" banner options.', 'organia'),
                                        ),
                                        'srv_is_banner'                    => array(
                                                'label'        => esc_html__( 'Is Banner', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'organia' )
                                                ),
                                                'value'        => '1',
                                                'desc'         => esc_html__('Do you want to hide banner only for this service details page? Then please turn it to Hide.', 'organia'),
                                        ),
                                        'srv_banner_bg'	 => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image.', 'organia' ),
                                        ),
                                        'srv_banner_ov'	 => array(
                                                'type'  => 'rgba-color-picker',
                                                'value' => '',
                                                'palettes' => array(),
                                                'label' => esc_html__('Banner BG Color', 'organia'),
                                                'desc'  => esc_html__('Insert your custom banner bg color.', 'organia'),
                                        ),
                                        'srv_banner_title'		 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
                                        ),
                                        'srv_is_breadcrumb'                    => array(
                                                'label'        => esc_html__( 'Is Breadcrumb?', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'organia' )
                                                ),
                                                'value'        => '1',
                                                'desc'         => esc_html__('Do you want to show breadcrumb on page banner?', 'organia'),
                                        ),
                                        'srv_banner_alignment'     => array(
                                                'label'   => esc_html__( 'Banner Content Alignment', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'choices' => array(
                                                        'left'         => esc_html__( 'Left', 'organia' ),
                                                        'center'       => esc_html__( 'Center', 'organia' ),
                                                        'right'        => esc_html__( 'Right', 'organia' ),
                                                ),
                                        ),
                                ),
                        ),
                )
        )
);
