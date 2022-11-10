<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Testimonial_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-testimonial';
    }
    public function get_title() {
        return esc_html__( 'Testimonial', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__( 'Testimonial', 'themewar' ),
            ]
        );
        $this->add_control(
                'testimonial_style',
                [
                        'label'     => esc_html__( 'Testimonial Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Slider Style 01', 'themewar' ),
                                2       => esc_html__( 'Slider Style 02', 'themewar' ),
                        ],
                ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
                'author_rating',
                [
                        'label'         => esc_html__( 'Review Ratings', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'min'           => 0,
                        'max'           => 5,
                        'step'          => 1,
                        'default'       => 5,
                        'description'   => esc_html__('insert author review ratings. Rating Out of 5.', 'themewar'),
                ]
        );
        $repeater->add_control(
                'quote',
                [
                        'label'         => esc_html__( 'Testimonial Quote', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Insert your testimony content.', 'themewar')
                ]
        );
        $repeater->add_control(
                'au_img',
                [
                        'label'         => esc_html__( 'Author Image', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Upload square size image. Image size should be 88x88px.', 'themewar'),
                ]
        );
        $repeater->add_control(
                'title',
                [
                        'label'         => esc_html__( 'Author Name', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Author Name', 'themewar')
                ]
        );
        $repeater->add_control(
                'designation',
                [
                        'label'         => esc_html__( 'Author Designation', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Author Designation', 'themewar')
                ]
        );
        $this->add_control(
            'testimony_list',
            [
                    'label'         => esc_html__( 'Testimonial Slider', 'themewar' ),
                    'type'          => Controls_Manager::REPEATER,
                    'fields'        => $repeater->get_controls(),
                    'default'       => [
                            [
                                    'author_rating'         => '5',
                                    'quote'                 => '',
                                    'au_img'                => '',
                                    'title'                 => '',
                                    'designation'           => '',
                            ],
                    ],
                    'title_field' => '{{{ title }}}',
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'testimonial_style',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ]
                        ],
                    ],
            ]
        );
        $repeaters = new \Elementor\Repeater();
        $repeaters->add_control(
                'quote1',
                [
                        'label'         => esc_html__( 'Testimonial Quote 01', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Insert your testimony content 01', 'themewar')
                ]
        );
        $repeaters->add_control(
                'quote2',
                [
                        'label'         => esc_html__( 'Testimonial Quote 02', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Insert your testimony content 02', 'themewar')
                ]
        );
        $repeaters->add_control(
                'titles',
                [
                        'label'         => esc_html__( 'Author Name', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Author Name', 'themewar')
                ]
        );
        $repeaters->add_control(
                'designations',
                [
                        'label'         => esc_html__( 'Author Designation', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Author Designation', 'themewar')
                ]
        );
        $this->add_control(
            'testimony_lists',
            [
                    'label'         => esc_html__( 'Testimonial Slider', 'themewar' ),
                    'type'          => Controls_Manager::REPEATER,
                    'fields'        => $repeaters->get_controls(),
                    'default'       => [
                            [
                                    'quote1'                 => '',
                                    'quote2'                 => '',
                                    'titles'                 => '',
                                    'designations'           => '',
                            ],
                    ],
                    'title_field' => '{{{ titles }}}',
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'testimonial_style',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ]
                        ],
                    ],
            ]
        );
        $this->add_control(
                'testi_slide_autoplay',
                [
                        'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'yes',
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
                        'conditions'        => [
                            'terms'         => [
                                [
                                        'name'      => 'testimonial_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
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
                        'conditions'        => [
                            'terms'         => [
                                [
                                        'name'      => 'testimonial_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
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
                        'conditions'        => [
                            'terms'         => [
                                [
                                        'name'      => 'testimonial_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_200', [
                    'label'             => esc_html__('Area Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'tst_area_padding',
                [
                        'label' => esc_html__( 'Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .testimonial01'       => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .testimonial02'       => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'tst_area_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .testimonial01'     => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .testimonial02'     => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs('area_styling_tab');
            $this->start_controls_tab(
                    'area_styling_tab_normal', [
                        'label' => esc_html__('Normal', 'themewar'),
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'  => 'tst_area_background',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic' ],
                            'selector' => '{{WRAPPER}} .testimonial01, {{WRAPPER}} .testimonial02',
                    ]
            );
            $this->add_responsive_control(
                    'tst_area_radius',
                    [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .testimonial01'    => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonial02'    => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'tst_ara_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .testimonial01, {{WRAPPER}} .testimonial02',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Css_Filter::get_type(),
                    [
                            'name'      => 'ts_arear_filter',
                            'label'     => esc_html__( 'Box Filter', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .testimonial01, {{WRAPPER}} .testimonial02',
                    ]
            );
            $this->end_controls_tab();
                $this->start_controls_tab(
                        'area_styling_tab_hover',
                        [
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name'  => 'tst_hover_area_background',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic' ],
                                'selector' => '{{WRAPPER}} .testimonial01:hover, {{WRAPPER}} .testimonial02:hover',
                        ]
                );
                $this->add_responsive_control(
                        'tst_hover_area_radius',
                        [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .testimonial01:hover'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonial02:hover'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name'     => 'tst_hover_ara_shadow',
                                'label'    => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .testimonial01:hover, {{WRAPPER}} .testimonial02:hover',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Css_Filter::get_type(),
                        [
                                'name'      => 'ts_area_hover_filter',
                                'label'     => esc_html__( 'Box Filter', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .testimonial01:hover, {{WRAPPER}} .testimonial02:hover',
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_rating', [
                    'label'             => esc_html__('Rating Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'testimonial_style',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ]
                        ],
                    ],
                ]
        );
        $this->add_responsive_control(
                'r_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type'  => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .testicontent01 .ratings'  => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'r_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .testicontent01 .ratings',
                ]
        );
        $this->add_responsive_control(
                'r_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .testicontent01 .ratings'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_qutation_01', [
                    'label'             => esc_html__('Quotation 01 Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'testimonial_style',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ]
                        ],
                    ],
                ]
        );
        $this->add_control(
                'tst_q1_bh',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type'  => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .testmonialItem .quote'  => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tst_q1_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .testmonialItem .quote',
                ]
        );
        $this->add_control(
                'tst_q1_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .testmonialItem .quote'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_qutation_three', [
                    'label'             => esc_html__('Quotation Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'tst_q3_bh',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type'  => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .quatation'  => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tst_q_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .quatation',
                ]
        );
        $this->add_control(
                'tst_q3_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .quatation'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'tst_q3_padding',
                [
                        'label' => esc_html__( 'Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .quatation'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_20', [
                    'label'             => esc_html__('Author Image Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                'name'      => 'testimonial_style',
                                'operator'  => '==',
                                'value'     => '1',
                            ]
                        ],
                    ],
                ]
        );
        $this->add_responsive_control(
                'tst3_img_width',
                [
                        'label' => esc_html__( 'Width', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min'  => 0,
                                        'max'  => 400,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .testimonialNav .slick-slide .autho_thumb img' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'tst3_img_height',
                [
                        'label' => esc_html__( 'Height', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min'  => 0,
                                        'max'  => 400,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .testimonialNav .slick-slide .autho_thumb img' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'tst3_area_radius',
                [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .testimonialNav .slick-slide .autho_thumb img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'active_border_cOlor',
                [
                        'label' => esc_html__( 'Active Border Color', 'themewar' ),
                        'type'  => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .testimonialNav .slick-slide.slick-current.slick-active.slick-center .autho_thumb' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name'     => 'active_image_shadow',
                        'label'    => esc_html__( 'Active Box Shadow', 'themewar' ),
                        'selector' => '{{WRAPPER}} .testimonialNav .slick-slide.slick-current.slick-active.slick-center .autho_thumb',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_100', [
                    'label'             => esc_html__('Author Name Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'tst_nm_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type'  => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .test_author h5' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .tsauthor span'  => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tst_nm_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .test_author h5, {{WRAPPER}} .tsauthor span',
                ]
        );
        $this->add_control(
                'tst_nm_margin',
                [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .test_author h5'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .tsauthor span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_divider', [
                    'label'             => esc_html__('Author / Designation Divider Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                'name'      => 'testimonial_style',
                                'operator'  => '==',
                                'value'     => '2',
                            ]
                        ],
                    ],
                ]
        );
        $this->add_control(
                'tst_divider_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type'  => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tsauthor i' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tst_divider_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .tsauthor i',
                ]
        );
        $this->add_control(
                'tst_divider_margin',
                [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .tsauthor i'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_04', [
                    'label'             => esc_html__('Designation Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'tst_mt_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type'  => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .test_author p'  => 'color: {{VALUE}}',
                                '{{WRAPPER}} .tsauthor' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tst_mt_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .test_author p, {{WRAPPER}} .tsauthor',
                ]
        );
        $this->add_control(
                'tst_mt_margin',
                [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .test_author p'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .tsauthor' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_03', [
                    'label'             => esc_html__('Nav Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                'name'      => 'testimonial_style',
                                'operator'  => '==',
                                'value'     => '2',
                            ]
                        ],
                    ],
                ]
        );
        $this->add_control(
                'nav_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                        '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_control(
                        'cl_nav_bg',
                        [
                                'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name' => 'cl_nav_bg_shadow',
                                'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name' => 'cl_nav_bg_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button',
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
                                    '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_control(
                    'cl_nav_bg_hover',
                    [
                            'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'cl_nav_bg_shadow_hover',
                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'cl_nav_bg_border_hover',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-nav button:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_dots', [
                    'label'             => esc_html__('Dots Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                'name'      => 'testimonial_style',
                                'operator'  => '==',
                                'value'     => '2',
                            ]
                        ],
                    ],
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
                                '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};'
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
                                '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};'
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
                                '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'cl_dot_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'cl_dot_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot',
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
                                        '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot:hover' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot.active' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'cl_dot_hover_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot.active',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'cl_dot_hover_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot.active',
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
                                '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                                '{{WRAPPER}} .testi_wrap .owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $testimonial_style  = (isset($settings['testimonial_style']) && $settings['testimonial_style'] > 0) ? $settings['testimonial_style'] : 1;

        $testimony_list     = (isset($settings['testimony_list']) && !empty($settings['testimony_list'])) ? $settings['testimony_list'] : array();
        $testimony_lists    = (isset($settings['testimony_lists']) && !empty($settings['testimony_lists'])) ? $settings['testimony_lists'] : array();
        
        $autoplay           = $settings['testi_slide_autoplay'];
        $loop               = $settings['client_slide_loop'];
        $nav                = $settings['client_slide_nav'];
        $dots               = $settings['client_slide_dots'];
        
        include dirname(__FILE__).'/style/testimonial/style'.$testimonial_style.'.php';
    }
        
    protected function content_template() {

    }
}