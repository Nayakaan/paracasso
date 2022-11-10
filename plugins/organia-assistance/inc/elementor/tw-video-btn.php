<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Video_Btn_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-video-btn';
    }
    
    public function get_title() {
        return esc_html__( 'Video Slider & BTN', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-favorite';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1',
            [
                'label'     => esc_html__('Video', 'themewar')
            ]
        );
        $this->add_control(
                'video_style',
                [
                        'label'     => esc_html__( 'Video Btn Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Only Btn', 'themewar' ),
                                2       => esc_html__( 'Btn With BG', 'themewar' ),
                                3       => esc_html__( 'Slider 01', 'themewar' ),
                                4       => esc_html__( 'Slider 02', 'themewar' ),
                        ],
                ]
        );
        $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                    'bg_img',
                    [
                            'label'         => esc_html__( 'Video BG Image', 'themewar' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Upload you video banner bg image here.', 'themewar'),
                            
                    ]
            );
            $repeater->add_control(
                    'v_icons',
                    [
                            'label'         => esc_html__( 'Icon', 'themewar' ),
                            'type'          => Controls_Manager::ICON,
                            'label_block'   => TRUE,
                    ]
            );
            $repeater->add_control(
                    'v_url',
                    [
                            'label'       => esc_html__( 'Video URL', 'themewar' ),
                            'type'        => Controls_Manager::TEXTAREA,
                            'rows'        => 10,
                            'default'     => '',
                            'description' => esc_html__( 'Insert your video url here.', 'themewar' ),
                    ]
            );
            $this->add_control(
                'video_list',
                [
                        'label'         => esc_html__( 'Slider Item', 'themewar' ),
                        'type'          => Controls_Manager::REPEATER,
                        'fields'        => $repeater->get_controls(),
                        'default'       => [
                                [
                                        'bg_img'           => '',
                                        'v_icons'          => 'twi-play',
                                        'v_url'            => 'https://player.vimeo.com/video/110853090?h=8f6c17f3e5&color=e35417',
                                ],
                        ],
                        'title_field' => '{{{ "Slider Item" }}}',
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => '!in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_control(
                'vbg_img',
                [
                        'label'         => esc_html__( 'Video BG Image', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Upload you video banner bg image here.', 'themewar'),
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                        ],
                        
                ]
        );
        $this->add_control(
                'video_icons',
                [
                        'label'         => esc_html__( 'Icon', 'themewar' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => 'in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_control(
            'v_title', [
                'label'             => esc_html__( 'Btn Title', 'themewar' ),
                'type'              => Controls_Manager::TEXTAREA,
                'label_block'       => true,
                'default'           => esc_html__( 'insert video btn title.', 'themewar' ),
                'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'video_style',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ]
                        ],
                ],
            ]
        );
        $this->add_control(
                'video_url',
                [
                        'label'       => esc_html__( 'Video URL', 'themewar' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'rows'        => 10,
                        'default'     => '',
                        'description' => esc_html__( 'Insert your video url here.', 'themewar' ),
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => 'in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_autoplay',
                [
                        'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'yes',
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => '!in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_loop',
                [
                        'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'yes',
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => '!in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_nav',
                [
                        'label'             => esc_html__( 'Is Nav?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => '!in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_dots',
                [
                        'label'             => esc_html__( 'Is Dots?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => '!in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_responsive_control(
                'video_align', [
                        'label'                     =>esc_html__( 'Alignment', 'themewar' ),
                        'type'                      => Controls_Manager::CHOOSE,
                        'options'                   => [
                                'left'       => [
                                        'title'  => esc_html__( 'Left', 'themewar' ),
                                        'icon'   => 'eicon-text-align-left',
                                ],
                                'center'     => [
                                        'title'  => esc_html__( 'Center', 'themewar' ),
                                        'icon'   => 'eicon-text-align-center',
                                ],
                                'right'      => [
                                        'title'  => esc_html__( 'Right', 'themewar' ),
                                        'icon'   => 'eicon-text-align-right',
                                ]
                        ],
                        'default'                   => 'right',
                        'prefix_class'              => 'video_align elementor%s-align-',
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'video_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_img',[
                    'label'         => esc_html__('Image Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'video_style',
                                    'operator'  => '!in',
                                    'value'     => ['1'],
                            ]
                        ],
                    ],
                ]
        );
        $this->add_responsive_control(
                'v_img_width',
                [
                        'label' => esc_html__( 'Width', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                        'step' => 1,
                                ],
                                '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                ],
                        ],
                        'default' => [],
                        'selectors' => [
                                '{{WRAPPER}} .video_banner img' => 'width: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
            );
            $this->add_responsive_control(
                'v_img_height',
                [
                        'label' => esc_html__( 'Height', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                        'step' => 1,
                                ],
                                '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                ],
                        ],
                        'default' => [],
                        'selectors' => [
                                '{{WRAPPER}} .video_banner img' => 'height: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
        );
        $this->add_control(
                'v_img_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .video_banner img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ]
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name' => 'v_img_box_shadow',
                        'label' => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector' => '{{WRAPPER}} .video_banner img',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'	 => esc_html__( 'Btn Style', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                    'video_btn_height',
                    [
                            'label' => esc_html__( 'BTN Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .popup_video' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'video_btn_width',
                    [
                            'label' => esc_html__( 'BTN Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .popup_video' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'video_btn_lineheight',
                    [
                            'label' => esc_html__( 'BTN Line Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range'     => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                            ],
                            '%' => [
                                    'min' => 0,
                                    'max' => 100,
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .popup_video' => 'line-height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'video_btn_typography',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .popup_video',
                    ]
            );
            $this->add_control(
                    'btn_border_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .popup_video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'btn_paddings',
                    [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .popup_video' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'btn_left',
                    [
                            'label'      => esc_html__( 'Left', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ '%' ],
                            'range'      => [
                                    '%'  => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default'   => [],
                            'selectors' => [
                                    '{{WRAPPER}} .popup_video' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->start_controls_tabs('section_tabing_1');
                $this->start_controls_tab(
                        'btn_style_normal',
                        [
                                'label'     => esc_html__( 'Normal', 'themewar' ),
                        ]
                );
                    $this->add_control(
                            'btn_color',
                            [
                                    'label' => esc_html__( 'BTN Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .popup_video' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_control(
                            'btn_bg_color',
                            [
                                    'label'     => esc_html__( 'BG Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .popup_video' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'btn_box_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .popup_video',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'btn_style_hover',
                        [
                                'label'     => esc_html__( 'Hover', 'themewar' ),
                        ]
                );
                    $this->add_control(
                            'btn_color_hover',
                            [
                                    'label' => esc_html__( 'BTN Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .popup_video:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_control(
                            'btn_bg_color_hover',
                            [
                                    'label'     => esc_html__( 'BG Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .popup_video:hover' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'btn_box_border_hover',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .popup_video:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_v_content', [
                'label'  => esc_html__( 'Video Title Styling', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'video_style',
                                'operator'  => '==',
                                'value'     => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
                'para_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .onlybtn span' => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'para_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .onlybtn span',
                ]
        );
        $this->add_responsive_control(
                'heading_rotate',
                [
                        'label'     => esc_html__('Rotate', 'themewar'),
                        'type'      => Controls_Manager::SLIDER,
                        'default'   => [
                            'min'   => 0,
                            'max'   => -360,
                            'step'  => 1,
                            'size'  => -90,
                            'unit'  => 'deg',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .onlybtn span' => 'transform: rotate({{SIZE}}{{UNIT}});',
                        ],
                ]
        );
        $this->add_responsive_control(
                'para_padding',
                [
                        'label'      => esc_html__( 'Paddings', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .onlybtn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->add_responsive_control(
                'para_margin',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .onlybtn span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_nav', [
                    'label'             => esc_html__('Nav Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'video_style',
                                        'operator'  => '!in',
                                        'value'     => ['1', '2'],
                                ],
                                [
                                        'name'      => 'lb_slide_dots',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ]
                            ],
                    ],
                ]
        );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'nav_i_typography',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button'
                    ]
            );
            $this->add_control(
                    'bl_nav_radius',
                    [
                            'label' => esc_html__( 'Nav  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->start_controls_tabs( 'nav_styling_tab' );
                $this->start_controls_tab(
                        'nav_styling_tab_normal',
                        [
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]
                );
                    $this->add_control(
                            'bl_nav_color',
                            [
                                    'label' => esc_html__( 'Nav Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control(
                            'bl_nav_bg',
                            [
                                    'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_nav_bg_shadow',
                                    'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_nav_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'nav_styling_tab_hover',
                        [
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                );
                    $this->add_control(
                            'bl_nav_color_hover',
                            [
                                    'label' => esc_html__( 'Nav Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control(
                            'bl_nav_bg_hover',
                            [
                                    'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_nav_bg_shadow_hover',
                                    'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_nav_bg_border_hover',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-nav button:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_04', [
                    'label'             => esc_html__('Dots Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'video_style',
                                        'operator'  => '!in',
                                        'value'     => ['1', '2'],
                                ],
                                [
                                        'name'      => 'lb_slide_dots',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ]
                            ],
                    ],
                ]
        );
            $this->add_control(
                    'dots_width',
                    [
                            'label' => esc_html__( 'Dots Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 50,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'dots_height',
                    [
                            'label' => esc_html__( 'Dots Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 50,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button' => 'height: {{SIZE}}{{UNIT}};'
                            ],
                    ]
            );
            $this->start_controls_tabs( 'dot_styling_tab' );
                $this->start_controls_tab(
                        'dot_styling_tab_normal',
                        [
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]
                );
                    $this->add_control(
                            'bl_dot_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_dot_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_dot_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'dot_styling_tab_hover',
                        [
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                );
                    $this->add_control(
                            'bl_dot_hover_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button:hover'  => 'background: {{VALUE}}',
                                            '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button.active' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_dot_hover_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button:hover, {{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button.active',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_dot_hover_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button:hover, {{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button.active',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'bl_dot_radius',
                    [
                            'label' => esc_html__( 'Dots  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'bl_dot_margin',
                    [
                            'label' => esc_html__( 'Dots  Gapping', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'bl_dots_margin',
                    [
                            'label' => esc_html__( 'Dot Area Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .vd_slider_wrap .owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $video_style    = (isset($settings['video_style']) && $settings['video_style'] > 0) ? $settings['video_style'] : 1;

        $video_icons   = (isset($settings['video_icons']) && $settings['video_icons'] != '') ? $settings['video_icons'] : 'twi-play1'; 
        $v_title        = (isset($settings['v_title']) && $settings['v_title'] != '') ? $settings['v_title'] : ''; 
        $video_url      = (isset($settings['video_url']) && $settings['video_url'] != '') ? $settings['video_url'] : 'https://player.vimeo.com/video/110853090?h=8f6c17f3e5&color=e35417'; 
        $vbg_img        = (isset($settings['vbg_img']['url']) && $settings['vbg_img']['url'] != '') ? $settings['vbg_img']['url'] : '';

        $video_list         = (isset($settings['video_list']) && !empty($settings['video_list'])) ? $settings['video_list'] : array();

        $autoplay       = (isset($settings['lb_slide_autoplay']) && $settings['lb_slide_autoplay'] != '') ? $settings['lb_slide_autoplay'] : 'yes';
        $loop           = (isset($settings['lb_slide_loop']) && $settings['lb_slide_loop'] != '') ? $settings['lb_slide_loop'] : 'yes';
        $nav            = (isset($settings['lb_slide_nav']) && $settings['lb_slide_nav'] != '') ? $settings['lb_slide_nav'] : 'no';
        $dots           = (isset($settings['lb_slide_dots']) && $settings['lb_slide_dots'] != '') ? $settings['lb_slide_dots'] : 'no';

        include dirname(__FILE__).'/style/video/style'.$video_style.'.php';
        
    }
    
    protected function content_template() {
        
    }
}