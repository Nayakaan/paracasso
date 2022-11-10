<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
	'_blocks_meta2' => array(
		'title'		 => false,
		'type'		 => 'box',
                'context'        => 'normal',
		'options'	 => array(
                        '_blocks_banner' => array(
                                'title'		 => esc_html__( 'Banner Settings', 'organia' ),
                                'type'		 => 'tab',
                                'options'	 => array(
                                        'blocks_is_banner'                    => array(
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
                                                'desc'         => esc_html__('Do you want to hide banner only for this blocks details page?', 'organia'),
                                        ),
                                        'blocks_banner_bg'	 => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                                        ),
                                        'blocks_banner_bg_color'	 => array(
                                                'type'  => 'rgba-color-picker',
                                                'value' => '',
                                                'palettes' => array(),
                                                'label' => esc_html__('Banner BG Color', 'organia'),
                                                'desc'  => esc_html__('Insert your blocks banner bg color here.', 'organia'),
                                        ),
                                        'blocks_banner_title'		 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
                                        ),
                                        'blocks_is_breadcrumb'                    => array(
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
                                                'desc'         => esc_html__('Do you want to show breadcrumb on blocks banner?', 'organia'),
                                        ),
                                        'blocks_banner_alignment'              => array(
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
                        )
		),
	),
);
