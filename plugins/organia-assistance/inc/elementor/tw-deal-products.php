<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Deal_Products_Widget extends Widget_Base{

    public function get_name() {
        return 'tw-deal-products';
    }

    public function get_title() {
        return esc_html__( 'Deal Products', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-product-upsell';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'section_tab_content', [
                'label' => esc_html__('Deal Products', 'themewar')
            ]
        );
                $this->add_control( 'tw_view_mode', [
                        'label' => esc_html__('View Mode', 'themewar'),
                        'type' => Controls_Manager::SELECT,
                        'description' => esc_html__('Select deal product view mode.', 'themewar'),
                        'default' => '1',
                        'multiple' => false,
                        'options' => [
                            1 => esc_html__('Slider View', 'themewar'),
                            2 => esc_html__('Large Grid View', 'themewar'),
                            3 => esc_html__('Small Grid View', 'themewar')
                        ],
                    ]
                );
                
                $this->add_control('pd_thumb_width', [
                                'label' => esc_html__( 'Thumbnail Width', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
				'default' => '',
			]
		);
                $this->add_control('pd_thumb_height', [
				'label' => esc_html__( 'Thumbnail Height', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
				'default' => '',
			]
		);
                $this->add_control('pd_sub_title', [
                            'label' => esc_html__( 'Area Sub Title', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'label_block' => true,
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ],
                        ]
                );
                $this->add_control('pd_title', [
                            'label' => esc_html__( 'Area Title', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'label_block' => true
                        ]
                );


                $repeater = new \Elementor\Repeater();
                        $repeater->add_control( 'pd_product', [
                                'label' => esc_html__('Product', 'themewar'),
                                'type' => 'tw_autocomplete',
                                'description' => esc_html__('Select specific product.', 'themewar'),
                                'action' => 'tw_get_post',
                                'post_type' => 'product',
                                'multiple' => false
                            ]
                        );
                        $repeater->add_control('pd_deal_end', [
                                        'label' => esc_html__( 'Deal End Date', 'plugin-domain' ),
                                        'type' => Controls_Manager::DATE_TIME,
                                        'picker_options' => [
                                            'dateFormat' => 'd-m-Y'
                                        ]
                                ]
                        );
                        $repeater->add_control('pd_available_product', [
                                        'label' => esc_html__( 'Available Product', 'plugin-domain' ),
                                        'type' => \Elementor\Controls_Manager::NUMBER,
                                        'min' => 1,
                                        'max' => 10000,
                                        'step' => 1,
                                        'default' => 25,
                                ]
                        );
                        $repeater->add_control('pd_available_label', [
                                        'label' => esc_html__('Available Label', 'plugin-domain' ),
                                        'type' => Controls_Manager::TEXT,
                                        'default' => esc_html__('Available:', 'plugin-domain' )
                                ]
                        );
                        $repeater->add_control('pd_sold_product', [
                                        'label' => esc_html__( 'Sold Product', 'plugin-domain' ),
                                        'type' => \Elementor\Controls_Manager::NUMBER,
                                        'min' => 1,
                                        'max' => 10000,
                                        'step' => 1,
                                        'default' => 10,
                                ]
                        );
                        $repeater->add_control('pd_sold_label', [
                                        'label' => esc_html__('Sold Label', 'plugin-domain' ),
                                        'type' => Controls_Manager::TEXT,
                                        'default' => esc_html__('Sold:', 'plugin-domain' )
                                ]
                        );
                $this->add_control('pd_deal_list_1', [
                            'label' => esc_html__( 'Deal Product List', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'fields' => $repeater->get_controls(),
                            'default' => [
                                    [
                                            'pd_product' => esc_html__( 'Title #1', 'plugin-domain' ),
                                            'pd_deal_end' => '',
                                            'pd_available_product' => '',
                                            'pd_sold_product' => '',
                                            'pd_available_label' => esc_html__('Available:', 'plugin-domain' ),
                                            'pd_sold_label' => esc_html__('Sold:', 'plugin-domain' )
                                    ]
                            ],
                            'title_field' => '{{{ pd_deal_end }}}',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ]
                    ]
                );

                $repeater_2 = new \Elementor\Repeater();
                    $repeater_2->add_control( 'pd_product', [
                                'label' => esc_html__('Product', 'themewar'),
                                'type' => 'tw_autocomplete',
                                'description' => esc_html__('Select specific product.', 'themewar'),
                                'action' => 'tw_get_post',
                                'post_type' => 'product',
                                'multiple' => false
                            ]
                    );
                    $repeater_2->add_control('pd_available_product', [
                                    'label' => esc_html__( 'Available Product', 'plugin-domain' ),
                                    'type' => \Elementor\Controls_Manager::NUMBER,
                                    'min' => 1,
                                    'max' => 10000,
                                    'step' => 1,
                                    'default' => 25,
                            ]
                    );
                    $repeater_2->add_control('pd_sold_product', [
                                    'label' => esc_html__( 'Sold Product', 'plugin-domain' ),
                                    'type' => \Elementor\Controls_Manager::NUMBER,
                                    'min' => 1,
                                    'max' => 10000,
                                    'step' => 1,
                                    'default' => 10,
                            ]
                    );
                    $repeater_2->add_control('pd_price_suffix', [
                                'label' => esc_html__( 'Price Suffix', 'plugin-domain' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => esc_html__('PER KG', 'themewar'),
                                'label_block' => true
                            ]
                    );
                $this->add_control('pd_deal_list_2', [
                            'label' => esc_html__( 'Deal Product List', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'fields' => $repeater_2->get_controls(),
                            'default' => [
                                            [
                                                    'pd_product' => esc_html__( 'Title #1', 'plugin-domain' ),
                                                    'pd_available_product' => '',
                                                    'pd_sold_product' => '',
                                                    'pd_price_suffix' => esc_html__('PER KG', 'plugin-domain' )
                                            ]
                            ],
                            'title_field' => '{{{ pd_available_product }}}',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ]
                        ]
                );
                
                $repeater_3 = new \Elementor\Repeater();
                    $repeater_3->add_control( 'pd_product', [
                                'label' => esc_html__('Product', 'themewar'),
                                'type' => 'tw_autocomplete',
                                'description' => esc_html__('Select specific product.', 'themewar'),
                                'action' => 'tw_get_post',
                                'post_type' => 'product',
                                'multiple' => false
                            ]
                    );
                $this->add_control('pd_deal_list_3', [
                            'label' => esc_html__( 'Deal Product List', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'fields' => $repeater_2->get_controls(),
                            'default' => [
                                    [
                                            'pd_product' => esc_html__( 'Title #1', 'plugin-domain' )
                                    ]
                            ],
                            'title_field' => '{{{ pd_product }}}',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '3',
                                    ]
                                ],
                            ]
                        ]
                );
                $this->add_control( 'pd_col_per_row', [
                            'label' => esc_html__('Column Per Row', 'themewar'),
                            'type' => Controls_Manager::SELECT,
                            'description' => esc_html__('How many item you want to show per row? 6 Column only work for View Mode 3.', 'themewar'),
                            'default' => '3',
                            'multiple' => false,
                            'options' => [
                                    3 => esc_html__('3 Columns', 'themewar'),
                                    4 => esc_html__('4 Columns', 'themewar'),
                                    6 => esc_html__('6 Columns', 'themewar'),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ]
                        ]
                );
                $this->add_control( 'is_progress_bar', [
                        'label' => esc_html__( 'Is Progress Bar?', 'plugin-domain' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'your-plugin' ),
                        'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_view_mode',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                    ]
                );
                $this->add_control('pd_sold_label', [
                            'label'             => esc_html__('Sold Stats Label', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => esc_html__('Sold:', 'themewar'),
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2'],
                                    ],
                                    [
                                            'name'      => 'is_progress_bar',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                                ],
                            ]
                        ]
                );
                
                $this->add_control('is_flash_label', [
                        'label' => esc_html__( 'Is Flash Label?', 'plugin-domain' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'your-plugin' ),
                        'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_view_mode',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                    ]
                );
                
                $this->add_control('pd_date_label', [
                            'label'             => esc_html__('Time Label', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => esc_html__('Expires in', 'themewar'),
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2'],
                                    ]
                                ],
                            ]
                        ]
                );
                $this->add_control('pd_deal_end_date', [
                                'label' => esc_html__( 'Deal End Date', 'plugin-domain' ),
                                'type' => Controls_Manager::DATE_TIME,
                                'picker_options' => [
                                    'dateFormat' => 'd-m-Y'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => 'in',
                                                'value'     => ['2', '3'],
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control( 'pd_time_format', [
                        'label' => esc_html__('Time Format', 'themewar'),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'DHMS',
                        'multiple' => false,
                        'options' => [
                            'DHMS' => esc_html__('Day-Hour-Minute-Second', 'themewar'),
                            'HMS' => esc_html__('Hour-Minute-Second', 'themewar')
                        ],
                    ]
                );
                $this->add_control('pd_btn_label', [
                            'label'             => esc_html__('Button Label', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => '',
                            'placeholder'       => esc_html__('Inser Button Label', 'themewar'),
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ]
                        ]
                );
                $this->add_control('pd_btn_url', [
                            'label'             => esc_html__( 'Button URL', 'themewar' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => true,
                                    'nofollow'       => true,
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ]
                        ]
                );
                
                $this->add_control( 'show_wishlist', [
                            'label' => esc_html__( 'Show Wishlist BTN', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => __( 'Show', 'your-plugin' ),
                            'label_off' => __( 'Hide', 'your-plugin' ),
                            'return_value' => 'yes',
                            'default' => 'no',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'show_compare', [
                            'label' => esc_html__( 'Show Compare BTN', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => __( 'Show', 'your-plugin' ),
                            'label_off' => __( 'Hide', 'your-plugin' ),
                            'return_value' => 'yes',
                            'default' => 'no',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'show_quickview', [
                            'label' => esc_html__( 'Show Quickview BTN', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => __( 'Show', 'your-plugin' ),
                            'label_off' => __( 'Hide', 'your-plugin' ),
                            'return_value' => 'yes',
                            'default' => 'no',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'show_cart', [
                            'label' => esc_html__( 'Show Cart BTN', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => __( 'Show', 'your-plugin' ),
                            'label_off' => __( 'Hide', 'your-plugin' ),
                            'return_value' => 'yes',
                            'default' => 'no',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => 'in',
                                            'value'     => ['2', '3'],
                                    ]
                                ],
                            ]
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Slider Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_view_mode',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ]
                        ],
                    ]
                ]
        );
            $this->add_control( 'pd_slider_bg', [
                            'label'     => esc_html__( 'Slider BG', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .dealarea' => 'background: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pd_slider_title',
                            'label'     => esc_html__('Slider Title', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .dealarea > h3',
                    ]
            );
            $this->add_control( 'pd_slider_title_color', [
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .dealarea > h3' => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_control('pd_slider_title_margin', [
                            'label' => esc_html__( 'Title Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .dealarea > h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->start_controls_tabs( 'pd_slider_bod' );
                $this->start_controls_tab('pd_sl_arrow_normal', [ 'label' => esc_html__( 'Arrow Normal', 'themewar' )]);
                    $this->add_control( 'pd_arrow_bg', [
                                    'label'     => esc_html__( 'Arrow BG', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .dealSlider.owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control( 'pd_arrow_color', [
                                    'label'     => esc_html__( 'Arrow Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .dealSlider.owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pd_sl_arrow_hover', [ 'label' => esc_html__( 'Arrow Hover', 'themewar' )]);
                    $this->add_control( 'pd_arrow_bg_hover', [
                                    'label'     => esc_html__( 'Arrow BG', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .dealSlider.owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control( 'pd_arrow_color_hover', [
                                    'label'     => esc_html__( 'Arrow Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .dealSlider.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control('pd_slider_arrow_margin', [
                            'label' => esc_html__( 'Arrow Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .dealSlider.owl-carousel .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control( 'pd_slider_pro_bg', [
                            'label'     => esc_html__( 'Product BG', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .productItem02' => 'background: {{VALUE}}'
                            ],
                    ]
            );
            
            $this->add_control( 'hr_1', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
            $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pds_pro_title_typo',
                            'label'     => esc_html__('Product Title Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .product_content h3',
                    ]
            );
            $this->start_controls_tabs( 'pr_box_tab_2' );
                $this->start_controls_tab('pds_pr_title_tab_normal', [ 'label' => esc_html__( 'Normal', 'themewar' )]); 
                    $this->add_control('pds_pr_title_color', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .product_content h3' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pds_title_tab_hover', [ 'label' => esc_html__( 'Title Hover', 'themewar' )]); 
                    $this->add_control('pds_pr_title_color_hover', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .product_content h3 a:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control('prs_pr_title_margin', [
                            'label' => esc_html__( 'Product Title Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .product_content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control( 'hr_2', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
            
            $this->start_controls_tabs( 'pds_box_tab_3' );
                $this->start_controls_tab('pds_price_tab_reg', [ 'label' => esc_html__( 'Sale Price', 'themewar' )]); 
                    $this->add_group_control(Group_Control_Typography::get_type(), [
                                    'name'      => 'pds_sprice_typo',
                                    'label'     => esc_html__('Price Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .pi01Price',
                            ]
                    );
                    $this->add_control('pds_sprice_color', [
                                    'label'     => esc_html__('Price Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .productItem02 .pi01Price' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pds_title_tab_sale', [ 'label' => esc_html__( 'Regular Price', 'themewar' )]); 
                    $this->add_group_control(Group_Control_Typography::get_type(), [
                                    'name'      => 'pds_del_price_typo',
                                    'label'     => esc_html__('Price Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .pi01Price del',
                            ]
                    );
                    $this->add_control('pds_del_price_color', [
                                    'label'     => esc_html__('Price Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .pi01Price del' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control('pds_del_price_margin', [
                                    'label' => esc_html__( 'Price Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                    ]
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_control('pds_price_area_margin', [
                            'label' => esc_html__( 'Price Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productItem02 .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control( 'hr_5', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
            
            $this->add_control( 'pds_timer_bg', [
                            'label'     => esc_html__( 'Timer BG', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'background: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_control( 'pds_timer_color', [
                            'label'     => esc_html__( 'Timer Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_control( 'pds_timer_title_color', [
                            'label'     => esc_html__( 'Timer Label Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commoncount .countdown-section .countdown-period' => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_control('pds_timer_margin', [
                            'label' => esc_html__( 'Timer Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .commoncount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control( 'hr_3', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
            
            $this->add_control( 'pds_available_area_bg', [
                            'label'     => esc_html__( 'Stock Count Area BG', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .dealarea::after' => 'background: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pds_available_typo',
                            'label'     => esc_html__('Stock Label Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .pstock',
                    ]
            );
            $this->add_control( 'pds_available_color', [
                            'label'     => esc_html__( 'Stock Lable Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .pstock' => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pds_sold_typo',
                            'label'     => esc_html__('Sold Label Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .psold',
                    ]
            );
            $this->add_control( 'pds_sold_color', [
                            'label'     => esc_html__( 'Sold Lable Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .psold' => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_control( 'pds_sold_count_color', [
                            'label'     => esc_html__( 'Sold Count Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .psold span' => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_control( 'hr_4', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
            
            $this->add_control('pds_product_radius', [
                            'label' => esc_html__( 'Product Area Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productItem02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
            );
            $this->add_control('pds_slider_radius', [
                            'label' => esc_html__( 'Slider Area Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .dealarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .dealarea::after' => 'border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Section Titles Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_view_mode',
                                    'operator'  => 'in',
                                    'value'     => ['2', '3'],
                            ]
                        ],
                    ]
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pda_sub_title_typo',
                            'label'     => esc_html__('Sub Title Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .sbsm.subTitle',
                    ]
                );
                $this->add_control( 'pda_sub_title_color', [
                            'label'     => esc_html__( 'Sub Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .sbsm.subTitle' => 'color: {{VALUE}}'
                            ],
                    ]
                );
                $this->add_control('pda_sub_title_margin', [
                                'label' => esc_html__( 'Sub Title Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .sbsm.subTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_control( 'pda_hr_1', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pda_sec_title_typo',
                            'label'     => esc_html__('Title Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .secTitle',
                    ]
                );
                $this->add_control( 'pda_sec_title_color', [
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .secTitle' => 'color: {{VALUE}}'
                            ],
                    ]
                );
                $this->add_control('pda_sec_title_margin', [
                                'label' => esc_html__( 'Title Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .secTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('Countdown Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_view_mode',
                                    'operator'  => 'in',
                                    'value'     => ['2', '3'],
                            ]
                        ],
                    ]
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pda_countdown_typo',
                            'label'     => esc_html__('Countdown Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .offerexpire',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'pda_countdown_color', [
                            'label'     => esc_html__( 'Countdown Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .offerexpire' => 'color: {{VALUE}}'
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'pda_countdown_bg', [
                            'label'     => esc_html__( 'Countdown BG', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .offerexpire' => 'background: {{VALUE}}'
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control('pda_countdown_radius', [
                                'label' => esc_html__( 'Countdown Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .offerexpire' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control('pda_countdown_padding', [
                                'label' => esc_html__( 'Countdown Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .offerexpire' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control('pda_countdown_margin', [
                                'label' => esc_html__( 'Countdown Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .offerexpire' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pda_countdown_count_typo',
                            'label'     => esc_html__('Countdown Number Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .commoncount .countdown-section .countdown-amount',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '3',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'pda_countdown_count_bg', [
                            'label'     => esc_html__( 'Countdown Number BG', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'background: {{VALUE}}'
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '3',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'pda_countdown_count_color', [
                            'label'     => esc_html__( 'Countdown Number Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'color: {{VALUE}}'
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '3',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pda_countdown_period_typo',
                            'label'     => esc_html__('Countdown Period Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .commoncount .countdown-section .countdown-period',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '3',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'pda_countdown_period_color', [
                            'label'     => esc_html__( 'Countdown Period Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commoncount .countdown-section .countdown-period' => 'color: {{VALUE}}'
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_view_mode',
                                            'operator'  => '==',
                                            'value'     => '3',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control('pda_countdown_area_margin', [
                                'label' => esc_html__( 'Countdown Area Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .commoncount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '3',
                                        ]
                                    ],
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Product Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_view_mode',
                                    'operator'  => 'in',
                                    'value'     => ['2', '3'],
                            ]
                        ],
                    ]
                ]
        );
                $this->add_control( 'pda_thumb_bg', [
                            'label'     => esc_html__( 'Image BG', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .proThumb05' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .proThumb08' => 'background: {{VALUE}}'
                            ]
                    ]
                );
                $this->add_control( 'pda_hr_2', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'pda_pr_title_typo',
                                'label'     => esc_html__('Title Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .product_content05 h3, {{WRAPPER}} .product_content08 h3',
                        ]
                );

                $this->start_controls_tabs( 'pda_title_tab_12' );
                    $this->start_controls_tab('pda_title_tab_normal', [ 'label' => esc_html__( 'Title Normal', 'themewar' )]); 
                        $this->add_control('pda_pr_title_color', [
                                        'label'     => esc_html__('Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .product_content08 h3' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .product_content05 h3' => 'color: {{VALUE}}'
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('pda_title_tab_hover', [ 'label' => esc_html__( 'Title Hover', 'themewar' )]); 
                        $this->add_control('pda_pr_title_color_hover', [
                                        'label'     => esc_html__('Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .product_content08 h3 a:hover' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .product_content05 h3 a:hover' => 'color: {{VALUE}}'
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('pda_pr_title_margin', [
                                'label' => esc_html__( 'Title Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .product_content08 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .product_content05 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_control( 'pda_hr_3', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
                
                $this->start_controls_tabs( 'pr_box_tab_3' );
                $this->start_controls_tab('pda_price_tab_reg', [ 'label' => esc_html__( 'Sale Price', 'themewar' )]); 
                        $this->add_group_control(Group_Control_Typography::get_type(), [
                                        'name'      => 'pda_sprice_typo',
                                        'label'     => esc_html__('Typography', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .product_content05 .pi01Price, {{WRAPPER}} .product_content08 .pi01Price',
                                ]
                        );
                        $this->add_control('pda_sprice_color', [
                                        'label'     => esc_html__('Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .product_content05 .pi01Price' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .product_content08 .pi01Price' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('pda_title_tab_sale', [ 'label' => esc_html__( 'Regular Price', 'themewar' )]); 
                        $this->add_group_control(Group_Control_Typography::get_type(), [
                                        'name'      => 'pda_del_price_typo',
                                        'label'     => esc_html__('Typography', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .product_content05 .pi01Price del, {{WRAPPER}} .product_content08 .pi01Price del',
                                ]
                        );
                        $this->add_control('pda_del_price_color', [
                                        'label'     => esc_html__('Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .product_content05 .pi01Price del' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .product_content08 .pi01Price del' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_control('pda_del_price_margin', [
                                        'label' => esc_html__( 'Margin', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .product_content05 .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .product_content08 .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                        ]
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('pda_unit_color', [
                                'label'     => esc_html__('Price Unit Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .product_content05 .pi01Price span.priceSuffix' => 'background: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control('pda_unit_margin', [
                                'label' => esc_html__( 'Price Unit Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .product_content05 .pi01Price span.priceSuffix' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control( 'pda_hr_4', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
                
                $this->add_control('pda_progress_bar_bg1', [
                                'label'     => esc_html__('Progress Area BG', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .product_content05 .progress' => 'background: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control('pda_progress_bar_bg2', [
                                'label'     => esc_html__('Progress BG', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .product_content05 .progress-bar' => 'background: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control('pda_sold_label_color', [
                                'label'     => esc_html__('Sold Label Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pro-quantity p' => 'color: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control('pda_sold_number_color', [
                                'label'     => esc_html__('Sold Number Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pro-quantity p span' => 'color: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tw_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5', [
                    'label'         => esc_html__('Shop Button Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_view_mode',
                                    'operator'  => 'in',
                                    'value'     => ['2', '3'],
                            ]
                        ],
                    ]
                ]
        );
            $this->start_controls_tabs('pda_box_tab_14');
                $this->start_controls_tab('pda_wsl_btn_normal', [ 'label' => esc_html__( 'Wishlist Normal', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pda_wsl_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .productItem08 .piActionBtns .wishlist a, {{WRAPPER}} .productItem05 .piActionBtns .wishlist a',
                            ]
                    );
                    $this->add_control('pda_wsl_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .productItem08 .piActionBtns .wishlist a' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem05 .piActionBtns .wishlist a' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pda_wsl_btn_hover', [ 'label' => esc_html__( 'Wishlist Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pda_wsl_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .productItem08 .piActionBtns .wishlist a:hover, {{WRAPPER}} .productItem05 .piActionBtns .wishlist a:hover',
                            ]
                    );
                    $this->add_control('pda_wsl_btn_hover_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .productItem08 .piActionBtns .wishlist a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem05 .piActionBtns .wishlist a:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->start_controls_tabs( 'pda_box_tab_15' );
                $this->start_controls_tab('pda_quc_btn_normal', [ 'label' => esc_html__( 'Quickview Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pda_quc_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.quickview',
                            ]
                    );
                    $this->add_control('pda_quc_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .piActionBtns a.quickview' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pda_quc_btn_hover', [ 'label' => esc_html__( 'Quickview Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pda_quc_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.quickview:hover',
                            ]
                    );
                    $this->add_control('pda_quc_btn_hover_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .piActionBtns a.quickview:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->start_controls_tabs( 'pda_box_tab_16' );
                $this->start_controls_tab('pda_cart_btn_normal', [ 'label' => esc_html__( 'Cart Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_cart_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.add_to_cart_button, {{WRAPPER}} .piActionBtns a.added_to_cart',
                            ]
                    );
                    $this->add_control('pda_cart_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .piActionBtns a.add_to_cart_button' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .piActionBtns a.added_to_cart' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pda_cart_btn_hover', [ 'label' => esc_html__( 'Cart Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_cart_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.add_to_cart_button:hover, {{WRAPPER}} .piActionBtns a.added_to_cart:hover',
                            ]
                    );
                    $this->add_control('pda_cart_btn_hover_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .piActionBtns a.add_to_cart_button:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .piActionBtns a.added_to_cart:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->start_controls_tabs( 'pda_box_tab_17' );
                $this->start_controls_tab('pda_cmp_btn_normal', [ 'label' => esc_html__( 'Compare Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pda_cmp_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.compare',
                            ]
                    );
                    $this->add_control('pda_cmp_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .woocommerce .piActionBtns a.compare' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pda_cmp_btn_hover', [ 'label' => esc_html__( 'Compare Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pda_cmp_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .woocommerce .piActionBtns a.compare:hover',
                            ]
                    );
                    $this->add_control('pda_cmp_btn_hover_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .woocommerce .piActionBtns a.compare:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_7', [
                    'label'         => esc_html__('Naviation Button Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_view_mode',
                                    'operator'  => 'in',
                                    'value'     => ['2', '3'],
                            ]
                        ],
                    ]
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'pda_btn_typography',
                                'label' => esc_html__( 'Button Typography', 'themewar' ),
                                'selector' => '{{WRAPPER}} .dealBtn1.organ_btn, {{WRAPPER}} .organ_btn.ob02',
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                    $this->start_controls_tab('pda_button_style_normal', ['label' => esc_html__( 'Normal', 'themewar' )] );
                            $this->add_responsive_control( 'pda_btn_label_color', [
                                            'label' => esc_html__( 'Label Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .dealBtn1.organ_btn'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'pda_btn_1_bg', [
                                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .dealBtn1.organ_btn'   => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name'      => 'pda_btn_border',
                                            'label'     => esc_html__( 'Border', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .dealBtn1.organ_btn, {{WRAPPER}} .organ_btn.ob02',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name'      => 'pda_btn_box_shadow',
                                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .dealBtn1.organ_btn, {{WRAPPER}} .organ_btn.ob02',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'pda_button_style_hover', ['label' => esc_html__( 'Hover', 'themewar' )] );
                            $this->add_responsive_control( 'pda_btn_label_color_hover', [
                                            'label' => esc_html__( 'Label Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .dealBtn1.organ_btn:hover'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02:hover'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'pda_btn_1_bg_hover', [
                                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .dealBtn1.organ_btn:hover'   => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02:hover'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name'      => 'pda_btn_border_hover',
                                            'label'     => esc_html__( 'Border', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .dealBtn1.organ_btn:hover, {{WRAPPER}} .organ_btn.ob02:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name'      => 'pda_btn_box_shadow_hover',
                                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .dealBtn1.organ_btn:hover, {{WRAPPER}} .organ_btn.ob02:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'pda_btn_1_width', [
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
					'{{WRAPPER}} .dealBtn1.organ_btn' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .organ_btn.ob02' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control( 'pda_btn_1_height', [
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
					'{{WRAPPER}} .dealBtn1.organ_btn' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .organ_btn.ob02' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control( 'pda_btn_border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .dealBtn1.organ_btn'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .organ_btn.ob02'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_padding', [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .organ_btn.dealBtn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .organ_btn.ob02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .organ_btn.dealBtn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .organ_btn.ob02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'pda_hr_5', [ 'type' => \Elementor\Controls_Manager::DIVIDER ] );
                
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'pda_btn_icon_typography',
                                'label' => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector' => '{{WRAPPER}} .organ_btn.dealBtn1 i, {{WRAPPER}} .organ_btn.ob02 i',
                        ]
                );
                $this->start_controls_tabs( 'pda_icon_style_tabs' );
                    $this->start_controls_tab( 'pda_icon_button_style_normal', [ 'label' => esc_html__( 'Normal', 'themewar' ) ] );
                            $this->add_responsive_control( 'icon_label_color', [
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .organ_btn.dealBtn1 i'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02 i'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'icon_1_bg', [
                                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .organ_btn.dealBtn1 i'   => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02 i'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name'      => 'icon_border',
                                            'label'     => esc_html__( 'Border', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .organ_btn.dealBtn1 i, {{WRAPPER}} .organ_btn.ob02 i',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'icon_button_style_hover', [ 'label' => esc_html__( 'Hover', 'themewar' ) ] );
                            $this->add_responsive_control( 'icon_label_color_hover', [
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .organ_btn.dealBtn1:hover i'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02:hover i'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'icon_1_bg_hover', [
                                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .organ_btn.dealBtn1:hover i'   => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .organ_btn.ob02:hover i'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name'      => 'icon_border_hover',
                                            'label'     => esc_html__( 'Border', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .organ_btn.dealBtn1:hover i, {{WRAPPER}} .organ_btn.ob02:hover i',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'pda_btn_icon_1_width', [
                                'label' => esc_html__( 'Icon Width', 'themewar' ),
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
                                        '{{WRAPPER}} .organ_btn.dealBtn1 i' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .organ_btn.ob02 i' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pda_btn_icon_1_height', [
                                'label' => esc_html__( 'Icon Height', 'themewar' ),
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
                                        '{{WRAPPER}} .organ_btn.dealBtn1 i' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .organ_btn.ob02 i' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pda_btn_icon_radius', [
                            'label' => esc_html__( 'Icon Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .organ_btn.dealBtn1 i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .organ_btn.ob02 i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pda_btn_icon_padding', [
                            'label' => esc_html__( 'Icon Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .organ_btn.dealBtn1 i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .organ_btn.ob02 i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pda_btn_icon_margin', [
                            'label' => esc_html__( 'Icon Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .organ_btn.dealBtn1 i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .organ_btn.ob02 i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

    }

    protected function render(){
        $settings = $this->get_settings_for_display();

        $tw_view_mode = (isset($settings['tw_view_mode']) && !empty($settings['tw_view_mode']) ? $settings['tw_view_mode'] : 1);

        $pd_sub_title = (isset($settings['pd_sub_title']) && !empty($settings['pd_sub_title']) ? $settings['pd_sub_title'] : '');
        $pd_title = (isset($settings['pd_title']) && !empty($settings['pd_title']) ? $settings['pd_title'] : '');

        $pd_deal_list_1 = (isset($settings['pd_deal_list_1']) && !empty($settings['pd_deal_list_1']) ? $settings['pd_deal_list_1'] : []);
        $pd_deal_list_2 = (isset($settings['pd_deal_list_2']) && !empty($settings['pd_deal_list_2']) ? $settings['pd_deal_list_2'] : []);
        $pd_deal_list_3 = (isset($settings['pd_deal_list_3']) && !empty($settings['pd_deal_list_3']) ? $settings['pd_deal_list_3'] : []);

        $pd_date_label = (isset($settings['pd_date_label']) && !empty($settings['pd_date_label']) ? $settings['pd_date_label'] : '');
        $pd_deal_end_date = (isset($settings['pd_deal_end_date']) && !empty($settings['pd_deal_end_date']) ? $settings['pd_deal_end_date'] : '');
        $pd_btn_label = (isset($settings['pd_btn_label']) && !empty($settings['pd_btn_label']) ? $settings['pd_btn_label'] : '');
        $pd_btn_url = (isset($settings['pd_btn_url']) && !empty($settings['pd_btn_url']) ? $settings['pd_btn_url'] : []);
        
        $target         = isset($pd_btn_url['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($pd_btn_url['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url        = (isset($pd_btn_url['url']) && $pd_btn_url['url'] != '') ? $pd_btn_url['url'] : 'javascript:void(0);';

        $pd_time_format = (isset($settings['pd_time_format']) && !empty($settings['pd_time_format']) ? $settings['pd_time_format'] : 'DHMS');
        
        
        $pd_col_per_row = (isset($settings['pd_col_per_row']) && !empty($settings['pd_col_per_row']) ? $settings['pd_col_per_row'] : 3);
        $pd_col_per_row = ($tw_view_mode == 2 && $pd_col_per_row > 4 ? 4 : $pd_col_per_row);
        
        $is_flash_label = (isset($settings['is_flash_label']) && !empty($settings['is_flash_label']) ? $settings['is_flash_label'] : 'no');
        $is_progress_bar = (isset($settings['is_progress_bar']) && !empty($settings['is_progress_bar']) ? $settings['is_progress_bar'] : 'no');
        $pd_sold_label = (isset($settings['pd_sold_label']) && !empty($settings['pd_sold_label']) ? $settings['pd_sold_label'] : '');
        
        $show_wishlist = (isset($settings['show_wishlist']) && !empty($settings['show_wishlist']) ? $settings['show_wishlist'] : 'no');
        $show_compare = (isset($settings['show_compare']) && !empty($settings['show_compare']) ? $settings['show_compare'] : 'no');
        $show_quickview = (isset($settings['show_quickview']) && !empty($settings['show_quickview']) ? $settings['show_quickview'] : 'no');
        $show_cart = (isset($settings['show_cart']) && !empty($settings['show_cart']) ? $settings['show_cart'] : 'no');
        
        $pd_thumb_width = (isset($settings['pd_thumb_width']) && $settings['pd_thumb_width'] > 0 ? $settings['pd_thumb_width'] : 0);
        $pd_thumb_height = (isset($settings['pd_thumb_height']) && $settings['pd_thumb_height'] > 0 ? $settings['pd_thumb_height'] : 0);

        include dirname(__FILE__) . '/style/product-deal/style'.$tw_view_mode.'.php';
    }

    protected function content_template() {

    }
}
