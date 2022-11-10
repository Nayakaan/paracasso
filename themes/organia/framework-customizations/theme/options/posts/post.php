<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }
$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
                        'post_banner_setting' => array(
                                'title' => esc_html__('Banner Settings', 'organia'),
                                'type' => 'tab',
                                'options' => array(
                                        'blog_si_is_settings'                    => array(
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
                                                'desc'         => esc_html__('Do you want to use those settings for single post banner instead of customizer global settings? Then turn it to Yes.', 'organia'),
                                        ),
                                        'blog_si_is_banner'                    => array(
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
                                                'desc'         => esc_html__('Do you want to hide banner? Then turn it to Hide.', 'organia'),
                                        ),
                                        'blog_si_banner_style'              => array(
                                                'label'   => esc_html__( 'Banner Style', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your post banner style.', 'organia' ),
                                                'choices' => array(
                                                        '1'      => esc_html__('Normal Banner','organia'),
                                                        '2'      => esc_html__('Gallery Banner','organia'),
                                                ),
                                        ),
                                        'blog_si_banner_bg'	 => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image.', 'organia' ),
                                        ),
                                        'blog_si_banner_bg_color'	 => array(
                                                'type'          => 'rgba-color-picker',
                                                'value'         => '',
                                                'palettes'      => array(),
                                                'label' => esc_html__('Banner BG Color', 'organia'),
                                                'desc'  => esc_html__('Insert your custom banner BG color.', 'organia'),
                                        ),
                                        'blog_si_banner_title'		 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
                                        ),
                                        'blog_si_is_breadcrumb'                    => array(
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
                                                'value'        => '1'
                                        ),
                                        'blog_si_banner_alignment'              => array(
                                                'label'   => esc_html__( 'Banner Alignment', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'desc'    => esc_html__( 'Select your page banner content alignment.', 'organia' ),
                                                'choices' => array(
                                                        'left'      => esc_html__( 'Left', 'organia' ),
                                                        'center'    => esc_html__( 'Center', 'organia' ),
                                                        'right'     => esc_html__( 'Right', 'organia' ),
                                                ),
                                        ),
                                )
                        ),
			'_post_meta' => array(
                                'title'		 => esc_html__( 'Template And Content Settings', 'organia' ),
                                'type'		 => 'tab',
                                'options'	 => array(
                                        'blog_si_is_content_enable'                    => array(
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
                                                'value'        => '2'
                                        ),
                                        'blog_si_post_sidebar'              => array(
                                                'label'   => esc_html__( 'Sidebar Position', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => '3',
                                                'desc'    => esc_html__( 'Select your post sidebar position.', 'organia' ),
                                                'choices' => array(
                                                        '1'      => esc_html__('None','organia'),
                                                        '2'      => esc_html__('Left','organia'),
                                                        '3'      => esc_html__('Right','organia'),
                                                ),
                                        ),
                                        'blog_si_is_tag'                    => array(
                                                'label'        => esc_html__( 'Is Tags?', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'organia' )
                                                ),
                                                'value'        => '1'
                                        ),
                                        'blog_si_is_share'                    => array(
                                                'label'        => esc_html__( 'Is Share?', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'organia' )
                                                ),
                                                'value'        => '2'
                                        ),
                                        'blog_si_socials'                    => array(
                                                'label'        => esc_html__( 'Select Social Media', 'organia' ),
                                                'type'         => 'checkboxes',
                                                'value'        => array(
                                                ),
                                                'choices'      => array(
                                                        '1'   => esc_html__( 'Facebook', 'organia' ),
                                                        '2'   => esc_html__( 'Twitter', 'organia' ),
                                                        '3'   => esc_html__( 'Email', 'organia' ),
                                                        '4'   => esc_html__( 'LinkedIn', 'organia' ),
                                                        '5'   => esc_html__( 'Pinterest', 'organia' ),
                                                        '6'   => esc_html__( 'Whatsapp', 'organia' ),
                                                        '7'   => esc_html__( 'Digg', 'organia' ),
                                                        '8'   => esc_html__( 'Tumblr', 'organia' ),
                                                        '9'   => esc_html__( 'Reddit', 'organia' ),
                                                )
                                        ),
                                        'blog_si_is_author_box'                    => array(
                                                'label'        => esc_html__( 'Is Author Box?', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'organia' )
                                                ),
                                                'value'         => '2'
                                        ),
                                        'post_is_related'       => array(
                                                'label'         => esc_html__( 'Is Related News?', 'organia' ),
                                                'type'          => 'switch',
                                                'right-choice'  => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'organia' )
                                                ),
                                                'left-choice'   => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'organia' )
                                                ),
                                                'value'         => '2'
                                        ),
                                        'post_related_title'	 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Related Area Title', 'organia' ),
                                                'desc'		 => esc_html__( 'Insert your related post area title.', 'organia' ),
                                        ),
                                        'post_rel_num_of_item'	 => array(
                                                'type'		 => 'slider',
                                                'value'		 => 4,
                                                'label'		 => esc_html__( 'No of Item', 'organia' ),
                                                'properties'     => array(
                                                        'min'    => 1,
                                                        'max'    => 100,
                                                        'step'   => 1,
                                                ),
                                        ),
                                ),
                        ),
                        'gallery'       => array(
                            'title'     => esc_html__('Gallery', 'organia'),
                            'type'      => 'tab',
                            'options'   => array(
                                'gallery_images' => array(
                                    'type'       => 'multi-upload',
                                    'label'      => esc_html__('Upload Gallery Image', 'organia'),
                                    'desc'       => 'Upload multiple image for single post thumbnail gallery view.',
                                ),
                            )
                        ),
		),
	),
);
