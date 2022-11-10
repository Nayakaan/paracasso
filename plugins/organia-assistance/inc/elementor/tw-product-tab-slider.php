<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Product_Slider_Tab_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-product-tab-slider';
    }
    
    public function get_title() {
        return esc_html__( 'Product Tab Slider', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-product-tabs';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls(){
        $this->start_controls_section(
            'section_tab_content', [
                'label' => esc_html__('Product Tab Slider', 'themewar')
            ]
        );
        $this->add_control('tw_thumb_width', [
				'label' => esc_html__( 'Thumbnail Width', 'themewar' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
				'default' => '',
			]
		);
        $this->add_control('tw_thumb_height', [
				'label' => esc_html__( 'Thumbnail Height', 'themewar' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
				'default' => '',
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control('pro_tab_number_title', [
                'label' => esc_html__( 'Tab Number', 'themewar' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab Title Number', 'themewar' ),
                'placeholder' => __( 'Type your tab title number here..', 'themewar' ),
            ]
        );
        $repeater->add_control('pro_tab_title', [
                'label' => esc_html__( 'Tab Title', 'themewar' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab Title', 'themewar' ),
                'placeholder' => __( 'Type your tab title here..', 'themewar' ),
            ]
        );
        $repeater->add_control( 'tw_types', [
                'label' => esc_html__('Product Types', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'description' => esc_html__('Select types.', 'themewar'),
                'default' => '1',
                'multiple' => false,
                'options' => [
                    1 => esc_html__('All Product', 'themewar'),
                    2 => esc_html__('Featured Product', 'themewar'),
                    3 => esc_html__('Sale Product', 'themewar'),
                    5 => esc_html__('Best Seller Product', 'themewar'),
                    6 => esc_html__('Top Rated Product', 'themewar'),
                    7 => esc_html__('Specific Product', 'themewar'),
                    8 => esc_html__('Random Product', 'themewar'),
                ],
            ]
        );
        $repeater->add_control( 'tw_category', [
                'label' => esc_html__('Product Category', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Select specific category product.', 'themewar'),
                'action' => 'tw_get_taxonomy',
                'taxonomy' => 'product_cat',
                'multiple' => true,
            ]
        );
        $repeater->add_control( 'tw_tag', [
                'label' => esc_html__('Tag', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Select specific tag product.', 'themewar'),
                'action' => 'tw_get_taxonomy',
                'taxonomy' => 'product_tag',
                'multiple' => true,
            ]
        );
        $repeater->add_control( 'tw_include', [
                'label' => esc_html__('Include', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Select specific product.', 'themewar'),
                'action' => 'tw_get_post',
                'post_type' => 'product',
                'multiple' => true,
            ]
        );
        $repeater->add_control( 'tw_exclude', [
                'label' => esc_html__('Exclude', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Exclude Product', 'themewar'),
                'action' => 'tw_get_post',
                'post_type' => 'product',
                'multiple' => true,
            ]
        );
        $repeater->add_control( 'tw_per_item', [
                'label' => esc_html__('Number Of Item', 'themewar'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 200,
                'step' => 1,
                'default' => 3,
                'description' => esc_html__('How many product item you want to show?.', 'themewar'),
            ]
        );
        $repeater->add_control( 'tw_offset', [
                'label' => esc_html__('Offset', 'themewar'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'description' => esc_html__('How many product item you want to skip?.', 'themewar'),
            ]
        );
        $repeater->add_control( 'tw_order_by', [
                'label' => esc_html__('Order By', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'themewar'),
                    'title' => esc_html__('Title', 'themewar'),
                    'rand' => esc_html__('Random', 'themewar'),
                    'comment_count' => esc_html__('Comment', 'themewar'),
                    'post__in' => esc_html__('Post in', 'themewar'),
                ],
            ]
        );
        $repeater->add_control( 'tw_order', [
                'label' => esc_html__('Order', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc' => esc_html__('Ascending', 'themewar'),
                    'desc' => esc_html__('Descending', 'themewar'),
                ],
            ]
        );
        $this->add_control('pr_tab_list', [
				'label' => esc_html__( 'Tab List', 'themewar' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'pro_tab_number_title'      => '',
                        'pro_tab_title' => esc_html__( 'Title #1', 'themewar' ),
						'tw_types' => 1,
						'tw_category' => [],
						'tw_tag' => [],
						'tw_include' => [],
						'tw_exclude' => [],
						'tw_per_item' => 8,
						'tw_offset' => '',
						'tw_order_by' => 'date',
						'tw_order' => 'desc',
					]
				],
				'title_field' => '{{{ pro_tab_title }}}',
			]
	    );
        $this->add_control( 'show_pricing_unit', [
                'label' => esc_html__( 'Show Pricing Unit', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'themewar' ),
                'label_off' => esc_html__( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );
        $this->add_control( 'is_autopaly', [
                'label' => esc_html__( 'Is Autoplay?', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'themewar' ),
                'label_off' => esc_html__( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control( 'is_loop', [
                'label' => esc_html__( 'Is Loop?', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'themewar' ),
                'label_off' => esc_html__( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control('pl_btn_label', [
                        'label'             => esc_html__('Read More Button Label', 'themewar'),
                        'type'              => Controls_Manager::TEXT,
                        'label_block'       => true,
                        'default'           => '',
                ]
        );
        $this->add_control('pl_btn_url', [
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
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5', [
                    'label'         => esc_html__('Title Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
            $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pr_title_typo',
                            'label'     => esc_html__('Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .product_content04 h3',
                    ]
            );
            
            $this->start_controls_tabs( 'pr_box_tab_2' );
                $this->start_controls_tab('pr_title_tab_normal', [ 'label' => esc_html__( 'Normal', 'themewar' )]); 
                    $this->add_control('pr_title_color', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .product_content04 h3' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_title_tab_hover', [ 'label' => esc_html__( 'Hover', 'themewar' )]); 
                    $this->add_control('pr_title_color_hover', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .product_content04 h3 a:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_control('pr_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .product_content04 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_6', [
                    'label'         => esc_html__('Price Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
            $this->start_controls_tabs( 'pr_box_tab_3' );
                $this->start_controls_tab('pr_price_tab_reg', [ 'label' => esc_html__( 'Sale Price', 'themewar' )]); 
                    $this->add_group_control(Group_Control_Typography::get_type(), [
                                    'name'      => 'pr_sprice_typo',
                                    'label'     => esc_html__('Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .pi01Price',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'tm_ten_price_color',
                                    'label' => esc_html__( 'Price Color', 'themewar' ),
                                    'types' => [ 'gradient'],
                                    'selector' => '{{WRAPPER}} .pi01Price',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_title_tab_sale', [ 'label' => esc_html__( 'Regular Price', 'themewar' )]); 
                    $this->add_group_control(Group_Control_Typography::get_type(), [
                                    'name'      => 'pr_del_price_typo',
                                    'label'     => esc_html__('Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .pi01Price del',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'tm_ten_del_price_color',
                                    'label' => esc_html__( 'Price Color', 'themewar' ),
                                    'types' => [ 'gradient'],
                                    'selector' => '{{WRAPPER}} .pi01Price del',
                            ]
                    );
                    $this->add_control('pr_del_price_margin', [
                                    'label' => esc_html__( 'Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ]
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_control('pr_price_area_margin', [
                            'label' => esc_html__( 'Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
        $this->end_controls_section();
            
        $this->start_controls_section(
                'section_tab_786', [
                    'label'         => esc_html__('Product Unit Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'show_pricing_unit',
                                    'operator'  => '==',
                                    'value'     => 'yes'
                            ]
                        ],
                    ]
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pr_pricing_unit_typo',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .pi01Price span.priceSuffix',
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pr_pricing_unit_color',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .pi01Price span.priceSuffix',
                ]
        );
        $this->add_control('pr_pricing_unit_margin', [
                        'label' => esc_html__( 'Unit Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .pi01Price span.priceSuffix' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_desc', [
                    'label'         => esc_html__('Description Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pl_list_item_typo',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .productItem11 .product_content04 > p',
                ]
        );
        $this->add_responsive_control( 'pl_list_color', [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .productItem11 .product_content04 > p'   => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_responsive_control( 'pl_content_margin', [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .productItem11 .product_content04 > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
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
        
        $this->start_controls_section(
                'section_tab_12', [
                    'label'         => esc_html__('Tab Nav Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->start_controls_tabs( 'pr_box_tab_12' );
            $this->start_controls_tab('pr_tab_normal', [ 'label' => esc_html__( 'Tab Normal', 'themewar' )]);
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'pr_tab_typo',
                                'label'     => esc_html__('Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .org_pro_tab li a',
                        ]
                );
                $this->add_responsive_control('pr_tab_color', [
                                'label'     => esc_html__('Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .org_pro_tab li a' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('pr_tab_bg', [
                                'label'     => esc_html__('BG', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .org_pro_tab li a' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(), [
                                'name' => 'pr_tab_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .org_pro_tab li a',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(), [
                                'name' => 'pr_tab_shaodw',
                                'label' => esc_html__( 'Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .org_pro_tab li a',
                        ]
                );
            $this->end_controls_tab();
            $this->start_controls_tab('pr_tab_hover', [ 'label' => esc_html__( 'Tab Hover / Active', 'themewar' )]);
                $this->add_control(
                    'heading_un_gr_hover_color',
                    [
                        'label'     => esc_html__( 'Hover Gradiant Color', 'themewar' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(), [
                                'name' => 'tm_ten_hover_price_color',
                                'label' => esc_html__( 'Text', 'themewar' ),
                                'types' => [ 'gradient'],
                                'selector' => '{{WRAPPER}} .orgoTab05 li a:hover, {{WRAPPER}} .orgoTab05 li a.active',
                        ]
                );
                $this->add_responsive_control('pr_tab_hover_border_color', [
                                'label'     => esc_html__('Border Hover / Active Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .orgoTab05 li a::after'  => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('pr_tab_bg_hover', [
                                'label'     => esc_html__('Hover BG', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .org_pro_tab li a.active' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .org_pro_tab li a:hover' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(), [
                                'name' => 'pr_tab_border_active',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .org_pro_tab li a:hover, {{WRAPPER}} .org_pro_tab li a.active',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(), [
                                'name' => 'pr_tab_shaodw_active',
                                'label' => esc_html__( 'Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .org_pro_tab li a:hover, {{WRAPPER}} .org_pro_tab li a.active',
                        ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_responsive_control('pr_tab_radius', [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .org_pro_tab li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->add_responsive_control('pr_tab_item_padding', [
                        'label' => esc_html__( 'Item Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .org_pro_tab li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->add_responsive_control('pr_tab_item_margin', [
                        'label' => esc_html__( 'Item Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .org_pro_tab li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->add_responsive_control('pr_tab_area_margin', [
                        'label' => esc_html__( 'Area Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .org_pro_tab' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();

    }

    protected function render(){
        $settings = $this->get_settings_for_display();
        
        $pr_tab_list = (isset($settings['pr_tab_list']) && !empty($settings['pr_tab_list']) ? $settings['pr_tab_list'] : []);
        $show_pricing_unit = (isset($settings['show_pricing_unit']) && !empty($settings['show_pricing_unit']) && $settings['show_pricing_unit'] == 'yes' ? TRUE : FALSE);
        
        $is_autopaly = (isset($settings['is_autopaly']) && !empty($settings['is_autopaly']) ? $settings['is_autopaly'] : 'no');
        $is_loop = (isset($settings['is_loop']) && !empty($settings['is_loop']) ? $settings['is_loop'] : 'no');
        
        $tw_thumb_width     = (isset($settings['tw_thumb_width']) && $settings['tw_thumb_width'] > 0 ? $settings['tw_thumb_width'] : 0);
        $tw_thumb_height    = (isset($settings['tw_thumb_height']) && $settings['tw_thumb_height'] > 0 ? $settings['tw_thumb_height'] : 0);

        $pl_btn_label       = (isset($settings['pl_btn_label']) && !empty($settings['pl_btn_label'])) ? $settings['pl_btn_label'] : '';
        $pl_btn_url         = (isset($settings['pl_btn_url']) && !empty($settings['pl_btn_url'])) ? $settings['pl_btn_url'] : [];
        $target             = isset($pl_btn_url['is_external']) ? ' target="_blank"' : '' ;
        $nofollow           = isset($pl_btn_url['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url            = (isset($pl_btn_url['url']) && $pl_btn_url['url'] != '') ? $pl_btn_url['url'] : '';
        

        include dirname(__FILE__) . '/style/product-tab-slider/style1.php';
    }
    
    protected function content_template() {
        
    }
}