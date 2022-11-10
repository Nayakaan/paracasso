<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Tw_Product_Grid_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'tw-product-grid';
    }

    public function get_title()
    {
        return esc_html__('Product Grid', 'themewar');
    }

    public function get_icon()
    {
        return 'eicon-products';
    }

    public function get_categories()
    {
        return ['organia-elements'];
    }

    protected function _register_controls(){

        $this->start_controls_section(
            'section_tab_content', [
                'label' => esc_html__('Product Grid', 'themewar')
            ]
        );
        $this->add_control( 'tw_style', [
                'label' => esc_html__('Product Style', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'description' => esc_html__('Select product view style.', 'themewar'),
                'default' => '1',
                'multiple' => false,
                'options' => [
                    1 => esc_html__('Style 01', 'themewar'),
                    2 => esc_html__('Style 02', 'themewar'),
                    3 => esc_html__('Style 03', 'themewar'),
                    4 => esc_html__('Style 04', 'themewar'),
                    5 => esc_html__('Style 05', 'themewar'),
                    6 => esc_html__('Style 06', 'themewar'),
                    7 => esc_html__('Style 07', 'themewar'),
                    8 => esc_html__('Style 08', 'themewar'),
                    9 => esc_html__('Style 09', 'themewar'),
                ],
            ]
        );
        $this->add_control('tw_thumb_width', [
				'label' => esc_html__( 'Thumbnail Width', 'themewar' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
				'default' => ''
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
        $this->add_control( 'has_rounded_corner', [
                'label' => esc_html__( 'Has Rounded Corner', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'themewar' ),
                'label_off' => __( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'tw_style',
                                'operator'  => '==',
                                'value'     => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control( 'tw_types', [
                'label' => esc_html__('Product Types', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'description' => esc_html__('Select types.', 'themewar'),
                'default' => ['1'],
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
        $this->add_control( 'tw_category', [
                'label' => esc_html__('Product Category', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Select specific category product.', 'themewar'),
                'action' => 'tw_get_taxonomy',
                'taxonomy' => 'product_cat',
                'multiple' => true,
                'condition' => [
                    'tw_types!' => '7',
                ],
            ]
        );
        $this->add_control( 'tw_tag', [
                'label' => esc_html__('Tag', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Select specific tag product.', 'themewar'),
                'action' => 'tw_get_taxonomy',
                'taxonomy' => 'product_tag',
                'multiple' => true,
                'condition' => [
                    'tw_types!' => '7',
                ],
            ]
        );
        $this->add_control( 'tw_include', [
                'label' => esc_html__('Include', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Select specific product.', 'themewar'),
                'action' => 'tw_get_post',
                'post_type' => 'product',
                'multiple' => true,
                'condition' => [
                    'tw_types' => '7',
                ],
            ]
        );
        $this->add_control( 'tw_exclude', [
                'label' => esc_html__('Exclude', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Exclude Product', 'themewar'),
                'action' => 'tw_get_post',
                'post_type' => 'product',
                'multiple' => true,
                'condition' => [
                    'tw_types!' => '7',
                ],
            ]
        );
        $this->add_control( 'tw_per_item', [
                'label' => esc_html__('Number Of Item', 'themewar'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 200,
                'step' => 1,
                'default' => 12,
                'description' => esc_html__('How many product item you want to show?.', 'themewar'),
            ]
        );
        $this->add_control( 'tw_offset', [
                'label' => esc_html__('Offset', 'themewar'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'description' => esc_html__('How many product item you want to skip?.', 'themewar'),
            ]
        );
        $this->add_control( 'tw_order_by', [
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
        $this->add_control( 'tw_order', [
                'label' => esc_html__('Order', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc' => esc_html__('Ascending', 'themewar'),
                    'desc' => esc_html__('Descending', 'themewar'),
                ],
            ]
        );
        $this->add_control( 'tw_col_per_row', [
                'label' => esc_html__('Column Per Row', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'description' => esc_html__('How many item you want to show per row? 6 Column only work for Product Style 6.', 'themewar'),
                'default' => '4',
                'multiple' => false,
                'options' => [
                    1 => esc_html__('1 Columns', 'themewar'),
                    2 => esc_html__('2 Columns', 'themewar'),
                    3 => esc_html__('3 Columns', 'themewar'),
                    4 => esc_html__('4 Columns', 'themewar'),
                    6 => esc_html__('6 Columns', 'themewar'),
                ],
            ]
        );
        $this->add_control( 'show_empty_rating', [
                'label' => esc_html__( 'Show Empty Ratings?', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'themewar' ),
                'label_off' => __( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'tw_style',
                                'operator'  => '!in',
                                'value'     => ['5', '6', '7'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_control( 'show_wishlist', [
                'label' => esc_html__( 'Show Wishlist BTN', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'themewar' ),
                'label_off' => __( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'tw_style!' => '8',
                ],
            ]
        );
        $this->add_control( 'show_compare', [
                'label' => esc_html__( 'Show Compare BTN', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'themewar' ),
                'label_off' => __( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'tw_style!' => ['8', '9'],
                ],
            ]
        );
        $this->add_control( 'show_quickview', [
                'label' => esc_html__( 'Show Quickview BTN', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'themewar' ),
                'label_off' => __( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'tw_style!' => ['8', '9'],
                ],
            ]
        );
        $this->add_control( 'show_cart', [
                'label' => esc_html__( 'Show Cart BTN', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'themewar' ),
                'label_off' => __( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'tw_style',
                                'operator'  => 'in',
                                'value'     => ['6', '7'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_control( 'show_flashlabels', [
                'label' => esc_html__( 'Show Flash Labels', 'themewar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'themewar' ),
                'label_off' => esc_html__( 'Hide', 'themewar' ),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'tw_style',
                                'operator'  => '!in',
                                'value'     => ['6', '8'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_control( 'price_format', [
                'label' => esc_html__('Pricing Format', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'description' => esc_html__('Select product price format.', 'themewar'),
                'default' => '1',
                'multiple' => false,
                'options' => [
                    1 => esc_html__('Only Sale Price', 'themewar'),
                    2 => esc_html__('Both Price', 'themewar')
                ],
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'tw_style',
                                'operator'  => 'in',
                                'value'     => ['6'],
                        ]
                    ],
                ],
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
        $this->add_control(
                'product_strlimit', [
                        'label'         => esc_html__( 'Content Limit', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'min'           => 0,
                        'max'           => 10000,
                        'step'          => 1,
                        'default'       => 60,
                        'description'   => esc_html__( 'Setup your product description text limit.', 'themewar' ),
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => '==',
                                        'value'     => '9',
                                ]
                            ],
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Area Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
            $this->start_controls_tabs( 'pr_box_tab_1', 
                    ['conditions' => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => 'in',
                                        'value'     => ['1', '8'],
                                ]
                            ],
                    ]]);
                $this->start_controls_tab('pr_box_tab_normal', [ 'label' => esc_html__( 'Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_box_bg',
                                    'label' => esc_html__( 'Box BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .productItem01, {{WRAPPER}} .pweItem',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_box_border',
                                    'label' => esc_html__( 'Box Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem01, {{WRAPPER}} .pweItem',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_box_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem01, {{WRAPPER}} .pweItem',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_box_tab_hover', [ 'label' => esc_html__( 'Hover', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_box_bgh',
                                    'label' => esc_html__( 'Box BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .productItem01:hover, {{WRAPPER}} .pweItem:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_box_borderh',
                                    'label' => esc_html__( 'Box Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem01:hover, {{WRAPPER}} .pweItem:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_box_shadowh',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem01:hover, {{WRAPPER}} .pweItem:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_responsive_control( 'pr_radius_odd', [
                        'label' => esc_html__( 'Odd Item Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .shaff_grid.hasRoundedCorner .shaff_item.odd .productItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .shaff_grid.hasRoundedCorner .shaff_item.odd .productItem01 .hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => '==',
                                        'value'     => '1',
                                ],
                                [
                                        'name'      => 'has_rounded_corner',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                ]
            );
            $this->add_responsive_control( 'pr_radius_even', [
                        'label' => esc_html__( 'Even Item Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .shaff_grid.hasRoundedCorner .shaff_item.even .productItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .shaff_grid.hasRoundedCorner .shaff_item.even .productItem01 .hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => '==',
                                        'value'     => '1',
                                ],
                                [
                                        'name'      => 'has_rounded_corner',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                ]
            );
            $this->add_responsive_control( 'pr_radius', [
                        'label' => esc_html__( 'Item Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .productItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .pweItem' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => 'in',
                                        'value'     => ['1', '8'],
                                ],
                                [
                                        'name'      => 'has_rounded_corner',
                                        'operator'  => '!=',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                ]
            );
            $this->add_responsive_control('pr_box_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem04' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem06' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem07' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem08' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem05' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pweItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem10' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_8', [
                    'label'         => esc_html__('Content Area Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_style',
                                    'operator'  => 'in',
                                    'value'     => ['2', '3', '4', '9'],
                            ]
                        ],
                    ],
                ]
        );
            $this->start_controls_tabs( 'pr_box_tab_8' );
                $this->start_controls_tab('pr_content_normal', [ 'label' => esc_html__( 'Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_con_bg',
                                    'label' => esc_html__( 'Content BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .productItem04, {{WRAPPER}} .productItem06, {{WRAPPER}} .product_content07, {{WRAPPER}} .productItem10',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_con_border',
                                    'label' => esc_html__( 'Box Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem04, {{WRAPPER}} .productItem06, {{WRAPPER}} .product_content07, {{WRAPPER}} .productItem10',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_con_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem04, {{WRAPPER}} .productItem06, {{WRAPPER}} .product_content07, {{WRAPPER}} .productItem10',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_content_hover', [ 'label' => esc_html__( 'Hover', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_con_hover_bg',
                                    'label' => esc_html__( 'Content BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .productItem04:hover, {{WRAPPER}} .productItem06:hover, {{WRAPPER}} .productItem07:hover .product_content07, {{WRAPPER}} .productItem10:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(), [
                                    'name' => 'pr_con_hover_border',
                                    'label' => esc_html__( 'Box Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem04:hover, {{WRAPPER}} .productItem06:hover, {{WRAPPER}} .productItem07:hover .product_content07, {{WRAPPER}} .productItem10:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'pr_con_hover_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .productItem04:hover, {{WRAPPER}} .productItem06:hover, {{WRAPPER}} .productItem07:hover .product_content07, {{WRAPPER}} .productItem10:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control('pr_con_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productItem04' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem06' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .product_content07' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .productItem10' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_9', [
                    'label'         => esc_html__('Thumb Area Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_style',
                                    'operator'  => 'in',
                                    'value'     => ['4', '5', '6', '7', '8', '9'],
                            ]
                        ],
                    ],
                ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
                        'name' => 'pr_thumb_bg',
                        'label' => esc_html__( 'Thumb BG', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .proThumb07, {{WRAPPER}} .proThumb03, {{WRAPPER}} .proThumb08, {{WRAPPER}} .proThumb05, {{WRAPPER}} .pweImg, {{WRAPPER}} .proThumb04',
                ]
        );
        $this->add_control( 'pr_thumb_shape_BG',[
                        'label'     => esc_html__( 'Thumb Shape Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .proThumb03:after' => 'background: {{VALUE}}',
                                '{{WRAPPER}} .proThumb03:before' => 'background: {{VALUE}}',
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => '==',
                                        'value'     => '5',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control('pr_thumb_radius', [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .proThumb07' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .proThumb08' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .proThumb05' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .pweImg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .proThumb04' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => '!=',
                                        'value'     => '5',
                                ]
                            ],
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Flash Labels Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'tw_style',
                                        'operator'  => '!=',
                                        'value'     => '6',
                                ]
                            ],
                    ],
                ]
        );
        $this->add_control( 'pr_fresh_label_bg',[
                        'label'     => esc_html__( 'Fresh BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.justin' => 'background: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.justin' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_fresh_label_color',[
                        'label'     => esc_html__( 'Fresh Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.justin' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.justin' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_fresh_label_off',[
                        'label'     => esc_html__( 'Sale BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.off' => 'background: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.off' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_off_label_color',[
                        'label'     => esc_html__( 'Sale Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.off' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.off' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_featured_label_bg',[
                        'label'     => esc_html__( 'Featured BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.featured' => 'background: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.featured' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_featured_label_color',[
                        'label'     => esc_html__( 'Featured Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.featured' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.featured' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_outofstock_label_bg',[
                        'label'     => esc_html__( 'Out of Stock BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.outofstock' => 'background: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.outofstock' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_outofstock_label_color',[
                        'label'     => esc_html__( 'Out Of Stock Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.outofstock' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.outofstock' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_limitedstock_label_bg',[
                        'label'     => esc_html__( 'Limited Stock BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.limitedstock' => 'background: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.limitedstock' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control( 'pr_limitedstock_label_color',[
                        'label'     => esc_html__( 'Limited Stock Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .prLabels p.limitedstock' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .product_content04 .prLabels p.limitedstock' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('Rating Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_style',
                                    'operator'  => 'in',
                                    'value'     => ['1', '2', '3', '4', '8', '9'],
                            ]
                        ],
                    ],
                ]
        );
            $this->add_control( 'pr_empty_star_color',[
                            'label'     => esc_html__( 'Empty Star Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .ratings .star-rating::before' => 'color: {{VALUE}} !important',
                            ],
                    ]
            );
            $this->add_control( 'pr_rating_star_color',[
                            'label'     => esc_html__( 'Rating Star Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .ratings .star-rating span::before' => 'color: {{VALUE}} !important',
                            ],
                    ]
            );
            $this->add_control( 'pr_rating_count_color',[
                            'label'     => esc_html__( 'Rating Count Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} span.rating-count' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control('pr_rating_margin', [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .product_content .ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .product_content04 .ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .product_content07 .ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .pweContent .ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Category Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_style',
                                    'operator'  => 'in',
                                    'value'     => ['1', '7'],
                            ]
                        ],
                    ]
                ]
        );
            $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'pr_category_typo',
                            'label'     => esc_html__('Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .pitem, {{WRAPPER}} .proThumb05 .prname',
                    ]
            );
            $this->add_control('pr_category_BG_color', [
                            'label'     => esc_html__('BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .proThumb05 .prname' => 'background: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_style',
                                            'operator'  => '==',
                                            'value'     => '7'
                                    ]
                                ],
                            ]
                    ]
            );
            $this->add_control('pr_category_BG_hover_color', [
                            'label'     => esc_html__('Hover BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .proThumb05 .prname:hover' => 'background: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_style',
                                            'operator'  => '==',
                                            'value'     => '7'
                                    ]
                                ],
                            ]
                    ]
            );
            $this->add_control('pr_category_color', [
                            'label'     => esc_html__('Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .pitem' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .proThumb05 .prname' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control('pr_category_hover_color', [
                            'label'     => esc_html__('Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .proThumb05 .prname:hover' => 'color: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'tw_style',
                                            'operator'  => '==',
                                            'value'     => '7'
                                    ]
                                ],
                            ]
                    ]
            );
            $this->add_control('pr_category_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pitem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .proThumb05 .prname' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
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
                            'selector'  => '{{WRAPPER}} .product_content h3, {{WRAPPER}} .product_content04 h3, {{WRAPPER}} .product_content07 h3, {{WRAPPER}} .product_content03 h3, {{WRAPPER}} .product_content05 h3, {{WRAPPER}} .pweItem h3',
                    ]
            );
            
            $this->start_controls_tabs( 'pr_box_tab_2' );
                $this->start_controls_tab('pr_title_tab_normal', [ 'label' => esc_html__( 'Normal', 'themewar' )]); 
                    $this->add_control('pr_title_color', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .product_content h3' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content04 h3' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content07 h3' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content03 h3' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content08 h3' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content05 h3' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .pweItem h3' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_title_tab_hover', [ 'label' => esc_html__( 'Hover', 'themewar' )]); 
                    $this->add_control('pr_title_color_hover', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .product_content h3 a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content04 h3 a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content07 h3 a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content03 h3 a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content08 h3 a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content05 h3 a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .pweItem h3 a:hover' => 'color: {{VALUE}}',
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
                                '{{WRAPPER}} .product_content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .product_content04 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .product_content07 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .product_content03 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .product_content08 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .product_content05 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pweItem h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                    'selector'  => '{{WRAPPER}} .pi01Price, {{WRAPPER}} .product_content03 .pi01Price, {{WRAPPER}} .product_content08 .pi01Price',
                            ]
                    );
                    $this->add_control('pr_sprice_color', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .pi01Price' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content03 .pi01Price' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content08 .pi01Price' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_title_tab_sale', [ 'label' => esc_html__( 'Regular Price', 'themewar' )]); 
                    $this->add_group_control(Group_Control_Typography::get_type(), [
                                    'name'      => 'pr_del_price_typo',
                                    'label'     => esc_html__('Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .pi01Price del, {{WRAPPER}} .product_content03 .pi01Price del, {{WRAPPER}} .product_content08 .pi01Price',
                            ]
                    );
                    $this->add_control('pr_del_price_color', [
                                    'label'     => esc_html__('Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .pi01Price del' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content03 .pi01Price del' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .product_content08 .pi01Price del' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_control('pr_del_price_margin', [
                                    'label' => esc_html__( 'Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .product_content07 .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .product_content03 .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .product_content08 .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .product_content03 .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .product_content08 .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_control('pr_pricing_unit_color', [
                        'label'     => esc_html__('Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .pi01Price span.priceSuffix' => 'color: {{VALUE}}'
                        ],
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
                'section_tab_product_content', [
                    'label'         => esc_html__('Product Content Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_style',
                                    'operator'  => '==',
                                    'value'     => '9'
                            ]
                        ],
                    ]
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pr_content_typo',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .productItem10 .product_content04 > p',
                ]
        );
        $this->add_control('pr_content_color', [
                        'label'     => esc_html__('Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .productItem10 .product_content04 > p' => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_control('pr_content_margin', [
                        'label' => esc_html__( 'Unit Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .productItem10 .product_content04 > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_product_qty', [
                    'label'         => esc_html__('Qty Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'tw_style',
                                    'operator'  => '==',
                                    'value'     => '9'
                            ]
                        ],
                    ]
                ]
        );
        $this->add_control(
            'heading_un_qty_number',
            [
                'label'     => esc_html__( 'Qty Number Field Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control('pr_qty_bg_color', [
                        'label'     => esc_html__('BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .productItem10 .qty_weight .quantityd' => 'background: {{VALUE}}'
                        ],
                ]
        );
        $this->add_control('pr_qty_nm_color', [
                        'label'     => esc_html__('Number Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .woocommerce .productItem10 .qty_weight .quantityd input[type="number"]' => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pr_qty_typo',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .woocommerce .productItem10 .qty_weight .quantityd input[type="number"]',
                ]
        );
        $this->add_control('pr_qty_margin', [
                        'label' => esc_html__( 'Unit Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .organia_product_wrapper .productItem10 .qty_weight' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->add_control(
            'heading_un_qty_btn',
            [
                'label'     => esc_html__( 'Qty Button Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control('pr_qty_btn_bg_color', [
                        'label'     => esc_html__('BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .woocommerce .productItem10 .quantityd button.qtyBtn' => 'background: {{VALUE}}'
                        ],
                ]
        );
        $this->add_control('pr_qty_btn_nm_color', [
                        'label'     => esc_html__('Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .woocommerce .productItem10 .quantityd button.qtyBtn' => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_control('pr_qty_btn_hover_bg_color', [
                        'label'     => esc_html__('Hover BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .woocommerce .productItem10 .quantityd button.qtyBtn:hover' => 'background: {{VALUE}}'
                        ],
                ]
        );
        $this->add_control('pr_qty_btn_hover_nm_color', [
                        'label'     => esc_html__('Hover Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .woocommerce .productItem10 .quantityd button.qtyBtn:hover' => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name'      => 'pr_btn_qty_typo',
                        'label'     => esc_html__('Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .woocommerce .productItem10 .quantityd button.qtyBtn',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_7', [
                    'label'         => esc_html__('Button Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
            $this->start_controls_tabs('pr_box_tab_4');
                $this->start_controls_tab('pr_wsl_btn_normal', [ 'label' => esc_html__( 'Wishlist Normal', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_wsl_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .organia_product_wrapper .wishlist, {{WRAPPER}} .organia_product_wrapper .wishlist a, {{WRAPPER}} .productItem06 .piActionBtns .wishlist a, {{ WRAPPER}} .productItem07 .piActionBtns .wishlist a, {{WRAPPER}} .productItem08 .piActionBtns .wishlist a, {{WRAPPER}} .productItem05 .piActionBtns .wishlist a',
                            ]
                    );
                    $this->add_control('pr_wsl_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .organia_product_wrapper .wishlist' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .organia_product_wrapper .wishlist a' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem06 .piActionBtns .wishlist a' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem07 .piActionBtns .wishlist a' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem08 .piActionBtns .wishlist a' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem05 .piActionBtns .wishlist a' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_wsl_btn_hover', [ 'label' => esc_html__( 'Wishlist Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_wsl_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .organia_product_wrapper .wishlist:hover, {{WRAPPER}} .organia_product_wrapper .wishlist a:hover, {{WRAPPER}} .productItem06 .piActionBtns .wishlist a:hover, {{WRAPPER}} .productItem07 .piActionBtns .wishlist a:hover, {{WRAPPER}} .productItem08 .piActionBtns .wishlist a:hover, {{WRAPPER}} .productItem05 .piActionBtns .wishlist a:hover',
                            ]
                    );
                    $this->add_control('pr_wsl_btn_hover_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .organia_product_wrapper .wishlist:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .organia_product_wrapper .wishlist:hover a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .yith-wcwl-wishlistexistsbrowse a' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem04 .piActionBtns .wishlist a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem06 .piActionBtns .wishlist a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem07 .piActionBtns .wishlist a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem08 .piActionBtns .wishlist a:hover' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .productItem05 .piActionBtns .wishlist a:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->start_controls_tabs( 'pr_box_tab_5' );
                $this->start_controls_tab('pr_quc_btn_normal', [ 'label' => esc_html__( 'Quickview Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_quc_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.quickview',
                            ]
                    );
                    $this->add_control('pr_quc_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .piActionBtns a.quickview' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_quc_btn_hover', [ 'label' => esc_html__( 'Quickview Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_quc_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.quickview:hover',
                            ]
                    );
                    $this->add_control('pr_quc_btn_hover_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .piActionBtns a.quickview:hover' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->start_controls_tabs( 'pr_box_tab_6' );
                $this->start_controls_tab('pr_cart_btn_normal', [ 'label' => esc_html__( 'Cart Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_cart_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.add_to_cart_button, {{WRAPPER}} .piActionBtns a.added_to_cart',
                            ]
                    );
                    $this->add_control('pr_cart_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .piActionBtns a.add_to_cart_button' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .piActionBtns a.added_to_cart' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_cart_btn_hover', [ 'label' => esc_html__( 'Cart Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_cart_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.add_to_cart_button:hover, {{WRAPPER}} .piActionBtns a.added_to_cart:hover',
                            ]
                    );
                    $this->add_control('pr_cart_btn_hover_color', [
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
            
            $this->start_controls_tabs( 'pr_box_tab_7' );
                $this->start_controls_tab('pr_cmp_btn_normal', [ 'label' => esc_html__( 'Compare Normal', 'themewar' )]);
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_cmp_btn_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .piActionBtns a.compare',
                            ]
                    );
                    $this->add_control('pr_cmp_btn_color', [
                                    'label'     => esc_html__('BTN Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .woocommerce .piActionBtns a.compare' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('pr_cmp_btn_hover', [ 'label' => esc_html__( 'Compare Hover', 'themewar' )]); 
                    $this->add_group_control(
                            Group_Control_Background::get_type(), [
                                    'name' => 'pr_cmp_btn_hover_bg',
                                    'label' => esc_html__( 'BTN BG', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .woocommerce .piActionBtns a.compare:hover',
                            ]
                    );
                    $this->add_control('pr_cmp_btn_hover_color', [
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

    }

    protected function render(){
        $settings = $this->get_settings_for_display();
        $tw_style = (isset($settings['tw_style']) && $settings['tw_style'] > 0 ? $settings['tw_style'] : 1);
        $tw_col_per_row = (isset($settings['tw_col_per_row']) && $settings['tw_col_per_row'] > 0 ? $settings['tw_col_per_row'] : 4);
        $show_empty_rating = (isset($settings['show_empty_rating']) && !empty($settings['show_empty_rating']) ? $settings['show_empty_rating'] : 'no');
        $show_wishlist = (isset($settings['show_wishlist']) && !empty($settings['show_wishlist']) ? $settings['show_wishlist'] : 'no');
        $show_compare = (isset($settings['show_compare']) && !empty($settings['show_compare']) ? $settings['show_compare'] : 'no');
        $show_quickview = (isset($settings['show_quickview']) && !empty($settings['show_quickview']) ? $settings['show_quickview'] : 'no');
        $show_flashlabels = (isset($settings['show_flashlabels']) && !empty($settings['show_flashlabels']) ? $settings['show_flashlabels'] : 'no');
        $show_cart = (isset($settings['show_cart']) && !empty($settings['show_cart']) ? $settings['show_cart'] : 'no');
        $price_format = (isset($settings['price_format']) && !empty($settings['price_format']) ? $settings['price_format'] : 1);
        $show_pricing_unit = (isset($settings['show_pricing_unit']) && !empty($settings['show_pricing_unit']) && $settings['show_pricing_unit'] == 'yes' ? TRUE : FALSE);
        $product_strlimit  = (isset($settings['product_strlimit']) && $settings['product_strlimit'] > 0 ) ? $settings['product_strlimit'] : 60;
        
        $has_rounded_corner = ($tw_style == 1 && isset($settings['has_rounded_corner']) && !empty($settings['has_rounded_corner']) ? $settings['has_rounded_corner'] : 'no');
        
        $tw_thumb_width = (isset($settings['tw_thumb_width']) && $settings['tw_thumb_width'] > 0 ? $settings['tw_thumb_width'] : 0);
        $tw_thumb_height = (isset($settings['tw_thumb_height']) && $settings['tw_thumb_height'] > 0 ? $settings['tw_thumb_height'] : 0);
        
        if($tw_style != 6){
            $tw_col_per_row = ($tw_col_per_row > 4 ? 4 : $tw_col_per_row);
        }
        
        $query_args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            'orderby' => $settings['tw_order_by'],
            'order' => $settings['tw_order'],
            'posts_per_page' => $settings['tw_per_item'],
        ];
        
        if (!empty($settings['tw_category'])) {
            $query_args['tax_query'] = array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $settings['tw_category'],
                    'operator' => 'IN'
                )
            );
        }
        
        if (!empty($settings['tw_tag'])) {
            if(isset($query_args['tax_query'])):
                $query_args['tax_query'][] = array(
                        'taxonomy' => 'product_tag', 
                        'field' => 'id', 
                        'terms' => $settings['tw_tag'],
                        'operator' => 'IN',
                );
            else:
                $query_args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_tag',
                        'field' => 'id',
                        'terms' => $settings['tw_tag'],
                        'operator' => 'IN'
                    )
                );
            endif;
        }
        
        //Featured Product
        if ('2' === $settings['tw_types']) {
            if(isset($query_args['tax_query'])):
                $query_args['tax_query'][] = array(
                        'taxonomy' => 'product_visibility', 
                        'field' => 'name', 
                        'terms' => 'featured',
                        'operator' => 'IN',
                );
            else:
                $query_args['tax_query']   = array(
                    'relation' => 'AND', 
                    array(
                        'taxonomy' => 'product_visibility', 
                        'field' => 'name', 
                        'terms' => 'featured',
                        'operator' => 'IN',
                    ) 
                );
            endif;
        }
        //On Sell product
        if ('3' === $settings['tw_types']) {
            $query_args['post__in'] = wc_get_product_ids_on_sale();
        }
        //Best Sell product
        if ('5' === $settings['tw_types']) {
            $query_args['orderby'] = 'meta_value_num';
            $query_args['meta_key'] = 'total_sales';
            $query_args['order'] = 'DESC';
        }
        if ($settings['tw_types'] == '7' && !empty($settings['tw_include'])) {
            $query_args['post__in'] = $settings['tw_include'];
        }
        if (!empty($settings['tw_exclude'])) {
            $query_args['post__not_in'] = $settings['tw_exclude'];
        }
        if ($settings['tw_offset']) {
            $query_args['offset'] = $settings['tw_offset'];
        }
        
        include dirname(__FILE__) . '/style/product-grid/style'.$tw_style.'.php';
    }

    protected function content_template(){

    }
}