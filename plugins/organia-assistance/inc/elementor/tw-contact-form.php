<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Contcat_Form_Widget extends Widget_Base {

    public function get_name() {
        return 'tw-contact-form';
    }

    public function get_title() {
        return esc_html__( 'Contact From', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }

    protected function _register_controls() {
        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="wpcf7_contact_form" AND post_status="publish"', OBJECT );
        $shortcodes = array('0' => esc_html__('Please Select', 'themewar'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }
        $this->start_controls_section(
            'section_tab', [
                'label'     => esc_html__( 'Contact Form', 'themewar' ),
            ]
        );
        $this->add_control(
                'contact_form',
                [
                        'label'     => esc_html__( 'Select Form', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 0,
                        'options'   => $shortcodes,
                ]
        );
        $this->add_control(
                'form_title', [
                    'label'             => esc_html__('Form Title', 'themewar'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => TRUE,
                    'default'           => '',
                ]
        );
        $this->add_responsive_control(
                'form_align', [
                        'label'                     => esc_html__( 'Alignment', 'themewar' ),
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
                        'default'                   => 'center',
                        'prefix_class'              => 'contact_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Form Area Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'icon_box_bg',
                        'label' => esc_html__( 'Box Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .contact_form',
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name' => 'icon_box_shadow',
                        'label' => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector' => '{{WRAPPER}} .contact_form',
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'box_border',
                        'label' => esc_html__( 'Border', 'themewar' ),
                        'selector' => '{{WRAPPER}} .contact_form',
                ]
        );
        $this->add_responsive_control(
                'icon_box_radius',
                [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .contact_form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .contact_form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .contact_form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_form_title', [
                'label'         => esc_html__( 'Form Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'title_color', [
                        'label'		 => esc_html__( 'Color', 'themewar' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .contact_form h2' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'title_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .contact_form h2',
                ]
        );
        $this->add_responsive_control(
                'title_margin',
                [
                        'label' => esc_html__( 'Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .contact_form h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'         => esc_html__( 'Form Field Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'cf_field_typo',
                            'label'     => esc_html__( 'Field Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contact_form select, {{WRAPPER}} .contact_form textarea',
                    ]
            );
            $this->add_control(
                    'cf_text_color',
                    [
                            'label' => esc_html__( 'Text Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact_form select' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact_form textarea' => 'color: {{VALUE}}',
                                
                                    '{{WRAPPER}} .contact_form textarea::-moz-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact_form form input::-moz-placeholder' => 'color: {{VALUE}}',
                                
                                    '{{WRAPPER}} .contact_form textarea::-ms-input-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact_form form input::-ms-input-placeholder' => 'color: {{VALUE}}',
                                
                                    '{{WRAPPER}} .contact_form textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact_form form input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'cf_bg_color',
                    [
                            'label' => esc_html__( 'Background Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact_form select' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .contact_form textarea' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'cf_borders',
                            'label' => esc_html__( 'Field Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact_form select, {{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contact_form textarea',
                    ]
            );
            $this->add_control(
                    'cf_field_radius',
                    [
                            'label' => esc_html__( 'Field Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact_form select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'cf_field_shadow',
                            'label' => esc_html__( 'Field Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact_form select, {{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contact_form textarea',
                    ]
            );
            $this->add_control(
                    'cf_field_padding',
                    [
                            'label' => esc_html__( 'Field Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact_form select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'cf_field_margin',
                    [
                            'label' => esc_html__( 'Field Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact_form select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'cf_filed_height',
                    [
                            'label' => esc_html__( 'Input/Select Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 8,
                                            'max' => 100,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact_form input[type="text"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input[type="url"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input[type="tel"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input[type="number"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form input[type="date"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact_form select' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'cf_message_height',
                    [
                            'label' => esc_html__( 'Textarea Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 8,
                                            'max' => 500,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact_form textarea' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'cf_message_padding',
                    [
                            'label' => esc_html__( 'Textarea Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .contact_form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'cf_message_margin',
                    [
                            'label' => esc_html__( 'Textarea Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .contact_form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4',
            [
                'label'         => esc_html__('Button Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs( 'style_tabs_1' );
                $this->start_controls_tab(
                        'btn_1_button_style_normal',
                        [
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]
                );
                $this->add_control(
                        'btn_1_label_color',
                        [
                                'label' => esc_html__( 'Label Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .organ_btn'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_control(
                        'btn_1_bg',
                        [
                                'label'     => esc_html__( 'BG Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .organ_btn'   => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name'      => 'btn_border',
                                'label'     => esc_html__( 'Border', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .organ_btn',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name'      => 'btn_box_shadow',
                                'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .organ_btn',
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'btn_1_button_style_hover',
                        [
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                );
                $this->add_control(
                        'btn_label_hover_color',
                        [
                                'label'     => esc_html__( 'Label Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .organ_btn:hover'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_control(
                        'btn_1_hover_bg',
                        [
                                'label'     => esc_html__( 'BG Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .organ_btn:before'   => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name'      => 'btn_hover_border',
                                'label'     => esc_html__( 'Border', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .organ_btn:hover',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name'      => 'btn_hover_box_shadow',
                                'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .organ_btn:hover',
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->add_control(
			'btn_1_width',
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
					'{{WRAPPER}} .organ_btn' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        $this->add_control(
			'btn_1_height',
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
                    '{{WRAPPER}} .organ_btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'btn_1_typography',
                        'label' => esc_html__( 'Button Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .organ_btn',
                ]
        );
        $this->add_control(
            'border_radius',
            [
                    'label' => esc_html__( 'Border Radius', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                            '{{WRAPPER}} .organ_btn'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
            ]
        );
        $this->add_responsive_control(
            'btn_1_padding',
            [
                    'label' => esc_html__( 'Paddings', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .organ_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
            ]
        );
        $this->add_responsive_control(
            'btn_1_margin',
            [
                    'label' => esc_html__( 'Margin', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .organ_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_3',
            [
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'btn_icon_typography',
                        'label' => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .organ_btn i',
                ]
        );
        $this->start_controls_tabs( 'style_tabs_2' );
            $this->start_controls_tab(
                    'icon_button_style_normal',
                    [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]
            );
            $this->add_responsive_control(
                    'icon_label_color',
                    [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organ_btn i'   => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_1_bg',
                    [
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organ_btn i'   => 'background: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'icon_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .organ_btn i',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'icon_button_style_hover',
                    [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]
            );
            $this->add_responsive_control(
                    'icon_label_hover_color',
                    [
                            'label'     => esc_html__( 'Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organ_btn:hover i'   => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_1_hover_bg',
                    [
                            'label'     => esc_html__( 'BG Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organ_btn:hover i'   => 'background: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'icon_hover_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .organ_btn:hover i',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
                    'icon_1_width',
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
                                    '{{WRAPPER}} .organ_btn i' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                    ]
            );
        $this->add_responsive_control(
                    'icon_1_height',
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
                                    '{{WRAPPER}} .organ_btn i' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
        $this->add_responsive_control(
            'btn_icon_positioning',
            [
                    'label' => esc_html__( 'Icon Position', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px'],
                    'allowed_dimensions' => ['top', 'bottom'],
                    'selectors' => [
                            '{{WRAPPER}} .organ_btn i' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_margin',
            [
                    'label' => esc_html__( 'Icon Margin', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px'],
                    'allowed_dimensions' => ['left', 'right'],
                    'selectors' => [
                            '{{WRAPPER}} .organ_btn i' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $contact_form   = (isset($settings['contact_form']) && $settings['contact_form'] != '') ? $settings['contact_form'] : '';
        $form_title     = (isset($settings['form_title']) && $settings['form_title'] != '') ? $settings['form_title'] : '';
        
        if($contact_form > 0){
            echo '<div class="contact_form">'; ?>
                <?php if($form_title != ''): ?>
                    <h2><?php echo esc_html($form_title); ?></h2><?php 
                endif;
                echo do_shortcode('[contact-form-7 id="'.$contact_form.'"]');
            echo '</div>';
        }else{
            ?>
            <div class="alert alert-warning" role="alert">
                <?php echo esc_html__('Please Select Contact From.', 'themewar'); ?>
            </div>
            <?php
        }
        
    }

    protected function content_template() {

    }    
}