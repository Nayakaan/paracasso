<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }
$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'_mem_meta' => array(
                                'title'		 => esc_html__( 'Banner Settings', 'organia' ),
                                'type'		 => 'tab',
                                'options'	 => array(
                                        'memb_is_settings'                    => array(
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
                                                'desc'         => esc_html__('Enable bellow settings for this page banner.', 'organia'),
                                        ),
                                        'memb_is_banner'                    => array(
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
                                                'desc'         => esc_html__('Do you want to hide banner only for this member details page? Then please turn it to Hide.', 'organia'),
                                        ),
                                        'memb_banner_bg'	 => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image.', 'organia' ),
                                        ),
                                        'memb_banner_ov'	 => array(
                                                'type'  => 'rgba-color-picker',
                                                'value' => '',
                                                'palettes' => array(),
                                                'label' => esc_html__('Banner BG Color', 'organia'),
                                                'desc'  => esc_html__('Insert your page banner bg color here.', 'organia'),
                                        ),
                                        'memb_banner_title'		 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
                                        ),
                                        'memb_is_breadcrumb'                    => array(
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
                                        'memb_banner_alignment'              => array(
                                                'label'   => esc_html__( 'Banner Content Alignment', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'choices' => array(
                                                        'left'           => esc_html__( 'Left', 'organia' ),
                                                        'center'         => esc_html__( 'Center', 'organia' ),
                                                        'right'          => esc_html__( 'Right', 'organia' ),
                                                ),
                                        ),
                                ),
                        ),

                        '_mem_content' => array(
                                'title' => esc_html__('Content Settings', 'organia'),
                                'type' => 'tab',
                                'options' => array(
                                        'mem_designation'           => array(
                                                'label'             => esc_html__( 'Designation', 'organia' ),
                                                'desc'              => esc_html__( 'Add your member designation.', 'organia' ),
                                                'type'              => 'text'
                                        ),
                                        'mem_socials'             => array(
                                                'label'         => esc_html__( 'Member Social Profile', 'organia' ),
                                                'type'          => 'addable-popup',
                                                'template'      => '{{- mem_social_name }}',
                                                'popup-options' => array(
                                                        'mem_social_name'	 => array(
                                                                'label'	 => esc_html__( 'Social Name', 'organia' ),
                                                                'desc'	 => esc_html__( 'Insert Social Site Name.', 'organia' ),
                                                                'type'	 => 'text'
                                                        ),
                                                        'mem_social_icon'	 => array(
                                                                'label'	 => esc_html__( 'Social Icon', 'organia' ),
                                                                'desc'	 => esc_html__( 'Insert Social Icon.', 'organia' ),
                                                                'type'	 => 'icon-v2'
                                                        ),
                                                        'mem_social_url'	 => array(
                                                                'label'	 => esc_html__( 'Profile Url', 'organia' ),
                                                                'desc'	 => esc_html__( 'Insrt your member qualification.', 'organia' ),
                                                                'type'	 => 'text'
                                                        ),
                                                ),
                                        ),
                                )
                        ),
		),
	),
);
