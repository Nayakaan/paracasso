<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Text_Carousel_Widget extends Widget_Base {
    public function get_name() {
        return 'tw-text-carousel';
    }
    public function get_title() {
        return esc_html__('Text Carousel', 'themewar');
    }
    public function get_icon() {
        return 'eicon-carousel';
    }
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Text Carousel', 'themewar' ),
            ]
        );
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control('tc_sub_title', [
                                        'label'         => esc_html__( 'Sub Title', 'themewar' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => esc_html__( 'ONLY NATURAL' , 'themewar' ),
                                        'label_block'   => true,
                                ]
                        );
                        $repeater->add_control('tc_title', [
                                        'label'         => esc_html__( 'Title Text', 'themewar' ),
                                        'type'          => Controls_Manager::TEXTAREA,
                                        'default'       => esc_html__( 'Natural, Raw & Organic Protein Powders' , 'themewar' ),
                                        'label_block'   => true,
                                ]
                        );
                        $repeater->add_control( 'tc_btn_label', [
                                        'label'             => esc_html__('Button Label', 'themewar'),
                                        'type'              => Controls_Manager::TEXT,
                                        'label_block'       => true,
                                        'default'           => esc_html__( '33% Discount' , 'themewar' ),
                                ]
                        );
                        $repeater->add_control( 'tc_btn_url', [
                                        'label'             => esc_html__( 'URL', 'themewar' ),
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
                $this->add_control( 'tc_list', [
                                'label'         => esc_html__( 'List Items', 'themewar' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                                'tc_sub_title'      => esc_html__( 'ONLY NATURAL' , 'themewar' ),
                                                'tc_title'          => organia_kses( 'Natural, Raw & Organic<br/> Protein Powders'),
                                                'tc_btn_label'      => esc_html__( '33% Discount' , 'themewar' ),
                                                'tc_btn_icons'      => '',
                                                'tc_btn_url'        => '',

                                        ],
                                ],
                                'title_field' => '{{{ tc_title }}}',
                        ]
                );
                $this->add_control( 'is_autopaly', [
                        'label' => esc_html__( 'Is Autoplay?', 'plugin-domain' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'your-plugin' ),
                        'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'yes'
                    ]
                );
                $this->add_control( 'is_loop', [
                        'label' => esc_html__( 'Is Loop?', 'plugin-domain' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'your-plugin' ),
                        'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'yes'
                    ]
                );
                $this->add_control( 'is_arrow', [
                        'label' => esc_html__( 'Is Arrow?', 'plugin-domain' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'your-plugin' ),
                        'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'yes'
                    ]
                );
                $this->add_control( 'is_dots', [
                        'label' => esc_html__( 'Is Dots?', 'plugin-domain' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'your-plugin' ),
                        'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'no'
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Area Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
				'name' => 'tc_area_bg',
				'label' => esc_html__( 'Area Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .discout-slider.owl-carousel',
			]
		);
                $this->add_responsive_control( 'tc_area_radius', [
                                'label' => esc_html__( 'Area Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .discout-slider.owl-carousel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control( 'tc_area_padding', [
                                'label' => esc_html__( 'Area Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .discout-slider.owl-carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_22', [
                    'label'         => esc_html__('Sub Title Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'tc_subtitle_typo',
                                'label'     => esc_html__('Sub Title Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .disContent .subTitle',
                        ]
                );
                $this->add_responsive_control( 'tc_subtitle_color', [
                                'label' => esc_html__( 'Sub Title Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .disContent .subTitle'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'tc_subtitle_margin', [
                                'label' => esc_html__( 'Sub Title Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .disContent .subTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Title Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'tc_title_typo',
                                'label'     => esc_html__('Title Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .disContent h2',
                        ]
                );
                $this->add_responsive_control( 'tc_title_color', [
                                'label' => esc_html__( 'Title Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .disContent h2'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'tc_title_margin', [
                                'label' => esc_html__( 'Title Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .disContent h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Button Area Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'tc_btn_typo',
                                'label'     => esc_html__('Button Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .disContent .organ_btn',
                        ]
                );
                $this->add_responsive_control( 'tc_btn_color', [
                                'label' => esc_html__( 'Button Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .disContent .organ_btn'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'tc_btn_hover_color', [
                                'label' => esc_html__( 'Button Hover Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .disContent .organ_btn'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'tc_btn_bg_color', [
                                'label' => esc_html__( 'Button BG Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .disContent .organ_btn:after'   => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'tc_btn_height', [
				'label' => esc_html__( 'Button Height', 'themewar' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .disContent .organ_btn' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control( 'tc_btn_radius', [
                                'label' => esc_html__( 'Button Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .disContent .organ_btn' => 'border-raidus: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                ); 
                $this->add_responsive_control( 'tc_btn_padding', [
                                'label' => esc_html__( 'Button Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .disContent .organ_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                ); 
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_10', [
                    'label'         => esc_html__('Arrow Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'is_arrow',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
            $this->start_controls_tabs( 'pr_box_tab_9' );
                $this->start_controls_tab('pr_prev_arrow_normal', [ 'label' => esc_html__( 'Prev Arrow Normal', 'themewar' )]);
                    $this->add_control('pr_prev_arrow_bg', [
                                    'label'     => esc_html__('BG Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_control('pr_prev_arrow_color', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_prev_arrow_border',
                                    'label' => esc_html__( 'Arrow Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_prev_arrow_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_prev_arrow_hover', [ 'label' => esc_html__( 'Prev Arrow Hover', 'themewar' )]);
                    $this->add_control('pr_prev_arrow_bg_hover', [
                                    'label'     => esc_html__('BG Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev:hover' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_control('pr_prev_arrow_color_hover', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_prev_arrow_border_hover',
                                    'label' => esc_html__( 'Arrow Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_prev_arrow_shadow_hover',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->start_controls_tabs( 'pr_box_tab_10' );
                $this->start_controls_tab('pr_next_arrow_normal', [ 'label' => esc_html__( 'Next Arrow Normal', 'themewar' )]);
                    $this->add_control('pr_next_arrow_bg', [
                                    'label'     => esc_html__('BG Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_control('pr_next_arrow_color', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_next_arrow_border',
                                    'label' => esc_html__( 'Arrow Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_next_arrow_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_next_arrow_hover', [ 'label' => esc_html__( 'Next Arrow Hover', 'themewar' )]);
                    $this->add_control('pr_next_arrow_bg_hover', [
                                    'label'     => esc_html__('BG Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next:hover' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_control('pr_next_arrow_color_hover', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_next_arrow_border_hover',
                                    'label' => esc_html__( 'Arrow Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_next_arrow_shadow_hover',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_control('pr_arrow_radius', [
                            'label' => esc_html__( 'Arrow Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control('pr_prev_arrow_margin', [
                            'label' => esc_html__( 'Prev Arrow Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control('pr_next_arrow_margin', [
                            'label' => esc_html__( 'Next Arrow Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .discout-slider.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_11', [
                    'label'         => esc_html__('Dots Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'is_dots',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
            $this->start_controls_tabs( 'pr_box_tab_11' );
                $this->start_controls_tab('pr_dots_normal', [ 'label' => esc_html__( 'Dots Normal', 'themewar' )]);
                    $this->add_control('pr_dots_outer_bg', [
                                    'label'     => esc_html__('Outer BG', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_dots_outer_border',
                                    'label' => esc_html__( 'Outer Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_dots_outer_shadow',
                                    'label' => esc_html__( 'Outer Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button',
                            ]
                    );
                    $this->add_control('pr_dots_inner_bg', [
                                    'label'     => esc_html__('Inner BG', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button span' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_dots_inner_border',
                                    'label' => esc_html__( 'Inner Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button span',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_dots_inner_shadow',
                                    'label' => esc_html__( 'Outer Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button span',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_dots_hover', [ 'label' => esc_html__( 'Dots Hover', 'themewar' )]);
                    $this->add_control('pr_dots_outer_bg_hover', [
                                    'label'     => esc_html__('Outer BG', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button:hover' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_dots_outer_border_hover',
                                    'label' => esc_html__( 'Outer Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_dots_outer_shadow_hover',
                                    'label' => esc_html__( 'Outer Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button:hover',
                            ]
                    );
                    $this->add_control('pr_dots_inner_bg_hover', [
                                    'label'     => esc_html__('Inner BG', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button:hover span' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_dots_inner_border_hover',
                                    'label' => esc_html__( 'Inner Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button:hover span',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_dots_inner_shadow_hover',
                                    'label' => esc_html__( 'Outer Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button:hover span',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_control('pr_outer_radius', [
                            'label' => esc_html__( 'Outer Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control('pr_inner_radius', [
                            'label' => esc_html__( 'Inner Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control('pr_dots_margin', [
                            'label' => esc_html__( 'Dots Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control('pr_dots_area_margin', [
                            'label' => esc_html__( 'Dots Area Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .discout-slider.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $tc_list        = (isset($settings['tc_list']) && !empty($settings['tc_list'])) ? $settings['tc_list'] : [];
        
        $is_autopaly = (isset($settings['is_autopaly']) && !empty($settings['is_autopaly']) ? $settings['is_autopaly'] : 'no');
        $is_loop = (isset($settings['is_loop']) && !empty($settings['is_loop']) ? $settings['is_loop'] : 'no');
        $is_arrow = (isset($settings['is_arrow']) && !empty($settings['is_arrow']) ? $settings['is_arrow'] : 'no');
        $is_dots = (isset($settings['is_dots']) && !empty($settings['is_dots']) ? $settings['is_dots'] : 'no');
        
        if(!empty($tc_list)):
            ?>
            <div class="discout-slider-wrap" 
                data-autoplay="<?php echo ($is_autopaly == 'yes' ? '1' : '0'); ?>" 
                data-loop="<?php echo ($is_loop == 'yes' ? '1' : '0'); ?>" 
                data-nav="<?php echo ($is_arrow == 'yes' ? '1' : '0'); ?>" 
                data-dots="<?php echo ($is_dots == 'yes' ? '1' : '0'); ?>"
                >
                <div class="discout-slider owl-carousel">
                    <?php
                        foreach($tc_list as $tcl):
                            $tc_sub_title = (isset($tcl['tc_sub_title']) && !empty($tcl['tc_sub_title']) ? $tcl['tc_sub_title'] : '');
                            $tc_title = (isset($tcl['tc_title']) && !empty($tcl['tc_title']) ? $tcl['tc_title'] : '');

                            $tc_btn_label = (isset($tcl['tc_btn_label']) && !empty($tcl['tc_btn_label']) ? $tcl['tc_btn_label'] : '');

                            $tc_btn_url     = (isset($tcl['tc_btn_url']['url']) && !empty($tcl['tc_btn_url']['url'])) ? $tcl['tc_btn_url']['url'] : '#';

                            $target         = isset($tcl['tc_btn_url']['is_external']) ? ' target="_blank"' : '' ;
                            $nofollow       = isset($tcl['tc_btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
                            ?>
                            <div class="disContent">
                                <?php if(!empty($tc_sub_title)): ?>
                                    <div class="subTitle"><?php echo esc_html($tc_sub_title); ?></div>
                                <?php endif; ?>
                                <?php if(!empty($tc_title)): ?>
                                    <h2><?php echo organia_kses($tc_title); ?></h2>
                                <?php endif; ?>
                                <?php if(!empty($tc_btn_label)): ?>
                                    <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $tc_btn_url; ?>" class="organ_btn ob02"><?php echo (!empty($tc_btn_label) ? $tc_btn_label : ''); ?></a>
                                <?php endif; ?>
                            </div>
                            <?php
                        endforeach;
                    ?>
                </div>
            </div>
            <?php
        endif;
    }
    
    protected function content_template() {
        
    }
}