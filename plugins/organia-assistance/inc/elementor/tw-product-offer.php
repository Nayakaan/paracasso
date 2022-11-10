<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Product_Offer_Widget extends Widget_Base {
    public function get_name() {
        return 'tw-product-offer';
    }
    public function get_title() {
        return esc_html__('Product Offer', 'themewar');
    }
    public function get_icon() {
        return 'eicon-product-categories';
    }
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Product Offer', 'themewar' ),
            ]
        );
        $this->add_control( 'pl_linked_product', [
                        'label' => esc_html__('Seelct Product', 'themewar'),
                        'type' => 'tw_autocomplete',
                        'description' => esc_html__('Select specific product.', 'themewar'),
                        'action' => 'tw_get_post',
                        'post_type' => 'product',
                        'multiple' => false
                ]
        );
        $this->add_control( 'pl_title', [
                    'label'         => esc_html__( 'Custome Title', 'themewar' ),
                    'type'          => Controls_Manager::TEXT,
                    'description' => esc_html__('Use {} for Differnt Text', 'themewar'),
                    'label_block'   => true,
            ]
        );
        $this->add_control( 'pl_price', [
                    'label'         => esc_html__( 'Custome Price', 'themewar' ),
                    'type'          => Controls_Manager::TEXT,
                    'label_block'   => true,
            ]
        );
        $this->add_control( 'pl_desc', [
                    'label'         => esc_html__( 'Custome Description', 'themewar' ),
                    'type'          => Controls_Manager::TEXTAREA,
                    'label_block'   => true,
            ]
        );
        $this->add_control(
            'c_title', [
                'label'             => esc_html__( 'Offer Title', 'themewar' ),
                'type'              => Controls_Manager::TEXTAREA,
                'label_block'       => true,
                'default'           => esc_html__( 'insert count down title.', 'themewar' ),
            ]
        );
        $this->add_control(
                'end_date',
                [
                        'label'             => esc_html__( 'Offer End Date', 'themewar' ),
                        'type'              => \Elementor\Controls_Manager::DATE_TIME,
                        'picker_options'    => [
                            'enableTime'    => FALSE
                        ],
                ]
        );
        $this->add_control('pl_btn_label', [
                        'label'             => esc_html__('Custome Button Label', 'themewar'),
                        'type'              => Controls_Manager::TEXT,
                        'label_block'       => true,
                        'default'           => '',
                ]
        );
        $this->add_control('pl_btn_url', [
                        'label'             => esc_html__( 'Custome Button URL', 'themewar' ),
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
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Area Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_group_control( Group_Control_Background::get_type(), [
				'name' => 'pl_area_bg',
				'label' => esc_html__( 'Area Background', 'themewar' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ctaOffer',
			]
		);
        $this->add_responsive_control( 'pl_area_radius', [
                        'label' => esc_html__( 'Area Radius', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .ctaOffer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->add_responsive_control( 'pl_area_padding', [
                        'label' => esc_html__( 'Area Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .ctaOffer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
    				'name' => 'pl_area_box_shadow',
    				'label' => esc_html__( 'Box Shadow', 'themewar' ),
    				'selector' => '{{WRAPPER}} .ctaOffer',
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
                        'name'      => 'pl_title_typo',
                        'label'     => esc_html__('Title Typo', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer .secTitle02',
                ]
        );
        $this->add_responsive_control( 'pl_title_color', [
                        'label' => esc_html__( 'Title Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .ctaOffer .secTitle02'   => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_responsive_control( 'pl_title_margin', [
                        'label' => esc_html__( 'Title Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .ctaOffer .secTitle02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->add_control(
            'heading_df_four',
            [
                'label'     => esc_html__( '{} Differnt Text Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_df_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer .secTitle02 span',
                ]
        );
        $this->add_responsive_control( 'pl_titledf_color', [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .ctaOffer .secTitle02 span'   => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_price', [
                    'label'         => esc_html__('Price Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pl_price_typo',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer .pi01Price',
                ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
                        'name' => 'tm_price_color',
                        'label' => esc_html__( 'Text', 'themewar' ),
                        'types' => [ 'gradient'],
                        'selector' => '{{WRAPPER}} .ctaOffer .pi01Price',
                ]
        );
        $this->add_responsive_control( 'pl_price_margin', [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .ctaOffer .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_desc', [
                    'label'         => esc_html__('Description Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pl_list_item_typo',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer p',
                ]
        );
        $this->add_responsive_control( 'pl_list_color', [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .ctaOffer p'   => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_responsive_control( 'pl_content_margin', [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .ctaOffer p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_5',
            [
                'label'         => esc_html__('Counddwon Styling', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_un_four',
            [
                'label'     => esc_html__( 'Tite Icon Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_icon_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer .timerTitle i',
                ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
                        'name' => 'tm_icon_color',
                        'label' => esc_html__( 'Icon BG', 'themewar' ),
                        'types' => [ 'gradient'],
                        'selector' => '{{WRAPPER}} .ctaOffer .timerTitle i',
                ]
        );
        $this->add_responsive_control(
            'tm_icon_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .ctaOffer .timerTitle i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_control(
            'heading_un_five',
            [
                'label'     => esc_html__( 'Title Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_title_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer .timerTitle',
                ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
                        'name' => 'tm_title_color',
                        'label' => esc_html__( 'Text BG', 'themewar' ),
                        'types' => [ 'gradient'],
                        'selector' => '{{WRAPPER}} .ctaOffer .timerTitle',
                ]
        );
        $this->add_responsive_control(
            'tm_title_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .ctaOffer .timerTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_control(
            'heading_un_three',
            [
                'label'     => esc_html__( 'Counter Number Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_c_number_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-amount',
                ]
        );
        $this->add_responsive_control(
                'tm3_cnum_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-amount' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'tm_area_bg_color',
                [
                        'label'     => esc_html__( 'BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}}  .ctaOffer .commoncount .countdown-section .countdown-amount' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'v_area_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-amount' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->add_responsive_control(
                'Area_v_width',
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
                                '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-amount' => 'width: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
            );
            $this->add_responsive_control(
                'areav_height',
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
                                '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-amount' => 'height: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
        );
        $this->add_responsive_control(
            'area_padding',
            [
                    'label' => esc_html__( 'Paddings', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-amount' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_control(
            'heading_un_six',
            [
                'label'     => esc_html__( 'Countdown Label Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm3_num_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-period',
                ]
        );
        $this->add_responsive_control(
                'tm3_num_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-period' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
            'tm3_num_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .ctaOffer .commoncount .countdown-section .countdown-period' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_btn',
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
            $this->add_responsive_control(
                    'btn_1_label_color',
                    [
                            'label' => esc_html__( 'Label Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .ctaOffer .organia-add-to-cart'   => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'  => 'btn_1_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .ctaOffer .organia-add-to-cart',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'btn_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .ctaOffer .organia-add-to-cart',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 'btn_box_shadow',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .ctaOffer .organia-add-to-cart',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'btn_1_button_style_hover',
                    [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]
            );
            $this->add_responsive_control(
                    'btn_label_hover_color',
                    [
                            'label'     => esc_html__( 'Label Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .ctaOffer .organia-add-to-cart:hover'   => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'  => 'btn_1_hover_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .ctaOffer .organia-add-to-cart:before',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'btn_hover_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .ctaOffer .organia-add-to-cart:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 'btn_hover_box_shadow',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .ctaOffer .organia-add-to-cart:hover',
                    ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_responsive_control(
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
                    '{{WRAPPER}} .ctaOffer .organia-add-to-cart' => 'width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
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
                'default'   => [],
                'selectors' => [
                    '{{WRAPPER}} .ctaOffer .organia-add-to-cart' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'btn_1_typography',
                        'label' => esc_html__( 'Button Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .ctaOffer .organia-add-to-cart',
                ]
        );
        $this->add_responsive_control(
            'border_radius',
            [
                    'label' => esc_html__( 'Border Radius', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ctaOffer .organia-add-to-cart'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .ctaOffer .organia-add-to-cart:before'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .ctaOffer .organia-add-to-cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .ctaOffer .organia-add-to-cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $pl_linked_product  = (isset($settings['pl_linked_product']) && $settings['pl_linked_product'] > 0 ? $settings['pl_linked_product'] : 0);
        $pl_titles           = (isset($settings['pl_title']) && !empty($settings['pl_title'])) ? $settings['pl_title'] : '';
        $pl_price           = (isset($settings['pl_price']) && !empty($settings['pl_price'])) ? $settings['pl_price'] : '';
        $pl_desc            = (isset($settings['pl_desc']) && !empty($settings['pl_desc'])) ? $settings['pl_desc'] : '';
        $c_title            = (isset($settings['c_title']) && $settings['c_title'] != '') ? $settings['c_title'] : ''; 
        $end_date       = (isset($settings['end_date']) && $settings['end_date'] != '' ? $settings['end_date'] : '');
        
        $pl_btn_label       = (isset($settings['pl_btn_label']) && !empty($settings['pl_btn_label'])) ? $settings['pl_btn_label'] : '';
        $pl_btn_url         = (isset($settings['pl_btn_url']) && !empty($settings['pl_btn_url'])) ? $settings['pl_btn_url'] : [];
        $target             = isset($pl_btn_url['is_external']) ? ' target="_blank"' : '' ;
        $nofollow           = isset($pl_btn_url['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url            = (isset($pl_btn_url['url']) && $pl_btn_url['url'] != '') ? $pl_btn_url['url'] : '';

        $pl_title           = str_replace(['{', '}'], ['<span>', '</span>'], $pl_titles);

        $product            = wc_get_product( $pl_linked_product );
        $pl_title           = (!empty($pl_title) ? $pl_title : get_the_title($pl_linked_product));
        $pl_price           = (!empty($pl_price) ? $pl_price : $product->get_price_html());
        $pl_desc            = (!empty($pl_desc) ? $pl_desc : substr(wp_strip_all_tags(get_the_excerpt($pl_linked_product)), 0, 70));

        ?>
        <div class="ctaOffer">
            <h3 class="secTitle02"><?php echo wp_kses_post($pl_title); ?></h3>
            <div class="pi01Price">
                <?php echo wp_kses_post($pl_price); ?>
            </div>
            <p><?php echo wp_kses_post($pl_desc); ?></p>
            <?php if($c_title != ''): ?>
                <div class="clearfix"></div>
                <div class="timerTitle"><i class="twi-clock"></i><?php echo wp_kses_post($c_title); ?></div>
            <?php endif; ?>
            <?php $timer_id       = uniqid('countdown-timer-'); if($end_date != ''): ?>
            <?php
                $d = date('d', strtotime($end_date));
                $m = date('m', strtotime($end_date));
                $y = date('Y', strtotime($end_date));
            ?>
            <div class="clearfix"></div>
            <div class="countdown_dashboard05 commoncount clearfix" id="<?php echo esc_attr($timer_id); ?>" data-day="<?php echo esc_attr($d); ?>" data-month="<?php echo esc_attr($m); ?>" data-year="<?php echo esc_attr($y); ?>"></div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?php if($pl_btn_label != '' && $pl_btn_url != ''): ?>
                <a <?php echo esc_attr($target.' '.$nofollow); ?> class="gradinBtn organia-add-to-cart" href="<?php echo $btn_url; ?>"><?php echo esc_html($pl_btn_label); ?></a>
            <?php else: ?>
            <?php echo do_shortcode('[add_to_cart id="'.$pl_linked_product.'"]');?>
            <?php endif; ?>
        </div>
        <?php
    }
    
    protected function content_template() {
        
    }
}