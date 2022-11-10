<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Clients_Slider_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-clients-slider';
    }
    
    public function get_title() {
        return esc_html__( 'Client Logo Slider', 'themewar' );
    }

    public function get_icon() {
        return ' eicon-logo';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1',
            [
                'label'     => esc_html__('Client Logo', 'themewar')
            ]
        );
        $this->add_control(
                'client_style',
                [
                        'label'         => esc_html__( 'Client Slider Style', 'themewar' ),
                        'type'          => Controls_Manager::SELECT,
                        'label_block'   => TRUE,
                        'default'       => 1,
                        'options'       => [
                                1       => esc_html__( 'Style 01', 'themewar' ),
                                2       => esc_html__( 'Style 02', 'themewar' ),
                                3       => esc_html__( 'Style 03', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'client_slide_autoplay',
                [
                        'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_control(
                'client_slide_loop',
                [
                        'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_control(
                'client_slide_nav',
                [
                        'label'             => esc_html__( 'Is Nav?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_control(
                'client_slide_dots',
                [
                        'label'             => esc_html__( 'Is Dots?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_control(
                'items_number',
                [
                        'label' => esc_html__( 'Number of Item (Desktop)', 'themewar' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 60,
                        'step' => 1,
                        'default' => 3,
                        'description'       => esc_html__('How many logo item you want to show desktop device.', 'themewar'),
                ]
        );
        $this->add_control(
                'items_number2',
                [
                        'label' => esc_html__( 'Number of Item (Ipad Pro)', 'themewar' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 60,
                        'step' => 1,
                        'default' => 2,
                        'description'       => esc_html__('How many logo item you want to show ipad pro device.', 'themewar'),
                ]
        );
        $this->add_control(
                'items_number3',
                [
                        'label' => esc_html__( 'Number of Item (Ipad / Tab)', 'themewar' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 60,
                        'step' => 1,
                        'default' => 2,
                        'description'       => esc_html__('How many logo item you want to show ipad or tab device.', 'themewar'),
                ]
        );
        $this->add_control(
                'is_grayscale',
                [
                        'label'             => esc_html__( 'Is Grayscale?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to Grayscale this item?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'client_logo',
                [
                        'label'         => esc_html__( 'Clinet Logo', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Upload your client logo.', 'themewar'),
                ]
            );
            $repeater->add_control(
                    'clinet_url', [
                        'label'             => esc_html__( 'Logo URL', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'input_type'        => 'url',
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                        'show_external'     => true,
                        'default'           => [
                                'url'            => '',
                                'is_external'    => true,
                                'nofollow'       => true,
                        ],
                    ]
            );
            $this->add_control(
                'list',
                [
                        'label'   => esc_html__( 'Client Logo', 'themewar' ),
                        'type'    => Controls_Manager::REPEATER,
                        'fields'  => $repeater->get_controls(),
                        'default' => [
                                [
                                        'client_logo'        => esc_html__( 'Normal', 'themewar' ),
                                        'clinet_url'         => esc_html__( 'Single Logo', 'themewar' )

                                ],
                        ],
                        'title_field' => '{{{ "Single Logo" }}}',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_area', [
                    'label'             => esc_html__('Area Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'cl_area_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .clslider_wrap .owl-carousel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .client-slider-02.owl-carousel .owl-stage-outer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->add_control(
                'cl_area_padding',
                [
                        'label' => esc_html__( 'Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .clslider_wrap .owl-carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'cl_area_border',
                        'label' => esc_html__( 'Border', 'themewar' ),
                        'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_02', [
                    'label'             => esc_html__('Item Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE
                ]
        );
        $this->start_controls_tabs( 'item_styling_tab' );
            $this->start_controls_tab(
                    'item_styling_tab_normal',
                    [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'cl_img_opacity',
                    [
                            'label' => esc_html__( 'IMG Opacity', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 1,
                            'step' => .10,
                            'default' => '',
                            'selectors' => [
                                    '{{WRAPPER}} .clslider_wrap .owl-carousel a img' => 'opacity: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'cl_item_bg',
                    [
                            'label' => esc_html__( 'Item BG Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .clslider_wrap .owl-carousel a' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'cl_item_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'cl_item_shadow',
                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel a',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'cl_item_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel a',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'item_styling_tab_hover',
                    [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'cl_img_opacity_hover',
                    [
                            'label' => esc_html__( 'IMG Opacity', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 1,
                            'step' => .10,
                            'default' => 1,
                            'selectors' => [
                                    '{{WRAPPER}} .clslider_wrap .owl-carousel a:hover img' => 'opacity: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'cl_item_bg_hover',
                    [
                            'label' => esc_html__( 'Item BG Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .clslider_wrap .owl-carousel a:hover' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'cl_item_hover_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'cl_item_shadow_hover',
                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel a:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'cl_item_border_hover',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel a:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
                'cl_item_padding',
                [
                        'label' => esc_html__( 'Item Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .clslider_wrap .owl-carousel a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'cl_item_margin',
                [
                        'label' => esc_html__( 'Item Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .clslider_wrap .owl-carousel a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'image_width',
                [
                        'label' => esc_html__( 'Image Width', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 30,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel a img' => 'width: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_responsive_control(
                'image_height',
                [
                        'label' => esc_html__( 'Image Height', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 30,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel a img' => 'height: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_03', [
                    'label'             => esc_html__('Nav Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'condition'         => ['client_slide_nav' => 'yes']
                ]
        );
            $this->add_control(
                    'nav_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
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
                            'cl_nav_color',
                            [
                                    'label' => esc_html__( 'Nav Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control(
                            'cl_nav_bg',
                            [
                                    'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'cl_nav_bg_shadow',
                                    'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'cl_nav_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button',
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
                        'cl_nav_color_hover',
                        [
                                'label' => esc_html__( 'Nav Color', 'themewar' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_control(
                        'cl_nav_bg_hover',
                        [
                                'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name' => 'cl_nav_bg_shadow_hover',
                                'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button:hover',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name' => 'cl_nav_bg_border_hover',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-nav button:hover',
                        ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_04', [
                    'label'             => esc_html__('Dots Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'condition'         => ['client_slide_dots' => 'yes']
                ]
        );
        $this->add_responsive_control(
                'dots_width',
                [
                        'label' => esc_html__( 'Dots Width', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 30,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_responsive_control(
                'dots_height',
                [
                        'label' => esc_html__( 'Dots Height', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 30,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
            $this->add_responsive_control(
                    'dots_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
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
                            'cl_dot_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'cl_dot_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'cl_dot_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'dot_styling_tab_hover',
                        [
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                );
                    $this->add_responsive_control(
                            'cl_dot_hover_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot:hover' => 'background: {{VALUE}}',
                                            '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot.active' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'cl_dot_hover_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot.active',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'cl_dot_hover_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot.active',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'cl_dot_margin',
                    [
                            'label' => esc_html__( 'Dots  Gapping', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'cl_dots_margin',
                    [
                            'label' => esc_html__( 'Dot Area Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clslider_wrap .owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $client_style  = (isset($settings['client_style']) && $settings['client_style'] > 0 ) ? $settings['client_style'] : 1;

        $logo_style  = (isset($settings['logo_style']) && $settings['logo_style'] > 0) ? $settings['logo_style'] : 2;

        $autoplay = (isset($settings['client_slide_autoplay']) && $settings['client_slide_autoplay'] != '' ? $settings['client_slide_autoplay'] : 'no');
        $loop = (isset($settings['client_slide_loop']) && $settings['client_slide_loop'] != '' ? $settings['client_slide_loop'] : 'no');
        $nav  = (isset($settings['client_slide_nav']) && $settings['client_slide_nav'] != '' ? $settings['client_slide_nav'] : 'no');
        $dots = (isset($settings['client_slide_dots']) && $settings['client_slide_dots'] != '' ? $settings['client_slide_dots'] : 'no');
        $is_grayscale = (isset($settings['is_grayscale']) && $settings['is_grayscale'] != '' ? $settings['is_grayscale'] : 'no');

        $items_number   = (isset($settings['items_number']) && $settings['items_number'] > 0 ? $settings['items_number'] : 3);
        $items_number2  = (isset($settings['items_number2']) && $settings['items_number2'] > 0 ? $settings['items_number2'] : 2);
        $items_number3  = (isset($settings['items_number3']) && $settings['items_number3'] > 0 ? $settings['items_number3'] : 2);
        
        $client    = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        
        if(!empty($client)):
            ?>
            <div class="clslider_wrap <?php if($is_grayscale == 'yes'): ?>grayscale<?php endif; ?>" 
                 data-autoplay="<?php echo $autoplay; ?>" 
                 data-loop="<?php echo $loop; ?>" 
                 data-nav="<?php echo $nav; ?>" 
                 data-dots="<?php echo $dots; ?>" 
                 data-item="<?php echo esc_attr($items_number); ?>"
                 data-item2="<?php echo esc_attr($items_number2); ?>"
                 data-item3="<?php echo esc_attr($items_number3); ?>"
                 >
                <?php if($client_style == 2): ?>
                <div class="client-slider-02 owl-carousel">
                    <?php
                        foreach($client as $item):
                            $logo       = (isset($item['client_logo']['url'])) ? $item['client_logo']['url'] : '';
                            $url        = (isset($item['clinet_url']['url'])) ? $item['clinet_url']['url'] : '#';
                            $target     = (isset($item['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
                            $nofollow   = (isset($item['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;
                            if($logo != ''):
                                ?>
                                <a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>>
                                    <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>"/>
                                </a>
                                <?php
                            endif;
                        endforeach;
                    ?>
                </div>
                <?php elseif($client_style == 3): ?>
                <div class="client-slider-03 owl-carousel">
                    <?php
                        foreach($client as $item):
                            $logo       = (isset($item['client_logo']['url'])) ? $item['client_logo']['url'] : '';
                            $url        = (isset($item['clinet_url']['url'])) ? $item['clinet_url']['url'] : '#';
                            $target     = (isset($item['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
                            $nofollow   = (isset($item['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;
                            if($logo != ''):
                                ?>
                                <a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>>
                                    <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>"/>
                                </a>
                                <?php
                            endif;
                        endforeach;
                    ?>
                </div>
                <?php else: ?>
                <div class="client-slider owl-carousel">
                    <?php
                        foreach($client as $item):
                            $logo       = (isset($item['client_logo']['url'])) ? $item['client_logo']['url'] : '';
                            $url        = (isset($item['clinet_url']['url'])) ? $item['clinet_url']['url'] : '#';
                            $target     = (isset($item['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
                            $nofollow   = (isset($item['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;
                            if($logo != ''):
                                ?>
                                <a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>>
                                    <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>"/>
                                </a>
                                <?php
                            endif;
                        endforeach;
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <?php
        endif; 
    }
        
    protected function content_template() {

    }
}