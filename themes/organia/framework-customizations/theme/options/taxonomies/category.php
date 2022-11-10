<?php

$options = array(
        'blog_cat_is_settings'                    => array(
                'label'        => esc_html__( 'Enable Settings', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2',
                'desc'         => esc_html__('If you enable settings here for this category then Base Category Banner Settings will override by those individual settings.', 'organia'),
        ),
        'blog_cat_is_banner'                    => array(
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
                'desc'         => esc_html__('Sect this category page banner informations.', 'organia'),
        ),
        'blog_cat_banner_bg'	 => array(
                'type'	 => 'upload',
                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                'desc'	 => esc_html__( 'Upload your page banner bg image and this only work for this category.', 'organia' ),
        ),
        'blog_cat_banner_ov'	 => array(
                'type'  => 'rgba-color-picker',
                'value' => '',
                'palettes' => array(),
                'label' => esc_html__('Banner BG Color', 'organia'),
                'desc'  => esc_html__('Insert your custom banner BG color color in RGBA mode and this only work for this category.', 'organia'),
        ),
        'blog_cat_banner_title'		 => array(
                'type'		 => 'text',
                'value'		 => '',
                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
        ),
        'blog_cat_is_breadcrumb'                    => array(
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
        'blog_cat_banner_alignment'              => array(
                'label'   => esc_html__( 'Banner Alignment', 'organia' ),
                'type'    => 'short-select',
                'value'   => 'center',
                'desc'    => esc_html__( 'Select your category banner text alignment.', 'organia' ),
                'choices' => array(
                        'left'         => esc_html__( 'Left', 'organia' ),
                        'center'       => esc_html__( 'Center', 'organia' ),
                        'right'        => esc_html__( 'Right', 'organia' ),
                ),
        ),
);