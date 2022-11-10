<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Look_Book_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-look-book';
    }
    
    public function get_title() {
        return esc_html__( 'Look Book', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'look book', 'themewar' ),
            ]
        );
        $this->add_control(
                'lb_style', [
                        'label'     => esc_html__( 'Look Book Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Style 01', 'themewar' ),
                                2       => esc_html__( 'Style 02', 'themewar' ),
                                3       => esc_html__( 'Style 03', 'themewar' ),
                                4       => esc_html__( 'Style 04', 'themewar' ),
                                5       => esc_html__( 'Style 05', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'lb_img',
                [
                        'label'         => esc_html__( 'Look Book Image', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Upload custome look book Image.', 'themewar'),
                ]
        );
        $this->add_control(
                'lb_offer', [
                        'label'         => esc_html__( 'Offer Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('box offer title', 'themewar'),
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'lb_style',
                                        'operator'  => '==',
                                        'value'     => '4',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_top_title', [
                        'label'         => esc_html__( 'Top Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('box top title', 'themewar'),
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'lb_style',
                                        'operator'  => '==',
                                        'value'     => '3',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_sub_title', [
                        'label'         => esc_html__( 'Look Book Sub Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('box sub title', 'themewar'),
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'lb_style',
                                        'operator'  => '!in',
                                        'value'     => ['4', '5'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_title', [
                        'label'         => esc_html__( 'Look Book Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'description'   => esc_html__('Use {} for Different color.', 'themewar'),
                        'placeholder'   => esc_html__('box title', 'themewar'),
                ]
        );
        $this->add_control(
                'lb_desc', [
                        'label'         => esc_html__( 'Short Description', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('short desc', 'themewar'),
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'lb_style',
                                        'operator'  => '!in',
                                        'value'     => ['2', '5'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_link', [
                        'label'         => esc_html__( 'Btn Label', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('insert lool book btn label', 'themewar'),
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'lb_style',
                                        'operator'  => '!in',
                                        'value'     => ['2', '5'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_url', [
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
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'lb_style',
                                    'operator'  => '!in',
                                    'value'     => ['2', '5'],
                            ]
                        ],
                    ],
                ]
        );
        $this->add_control(
                'anim_style', [
                        'label'     => esc_html__( 'Overlay Animation Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Style 01', 'themewar' ),
                                2       => esc_html__( 'Style 02', 'themewar' ),
                        ],
                ]
        );
        $this->add_responsive_control(
                'text_align', [
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
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'lb_style',
                                        'operator'  => '==',
                                        'value'     => '1',
                                ]
                            ],
                        ],
                        'default'           => 'left',
                        'toggle'            => true,
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_image',
            [
                'label'         => esc_html__('Look Book Image Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name'      => 'lk_img_box_shadow',
                        'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .lookbook img, {{WRAPPER}} .lookbook02 img, {{WRAPPER}} .lookbook05 img',
                ]
        );
        $this->add_responsive_control(
                'lk_img_1_width',
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
                        '{{WRAPPER}} .lookbook img' => 'width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook02 img' => 'width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook05 img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        $this->add_responsive_control(
            'lk_img_1_height',
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
                    '{{WRAPPER}} .lookbook img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .lookbook02 img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .lookbook05 img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'lk_img_border_radius',
            [
                    'label' => esc_html__( 'Border Radius', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .lookbook img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook02 img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook05 img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
            'lk_img_1_padding',
            [
                    'label' => esc_html__( 'Paddings', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .lookbook img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook02 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook05 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
            'lk_img_1_margin',
            [
                    'label' => esc_html__( 'Margin', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .lookbook img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook02 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .lookbook05 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'Area & Content Box Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
                        'name' => 'ib_box_background',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .lookbook, {{WRAPPER}} .lookbook02, {{WRAPPER}} .cateContent',
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
                        'name' => 'ib_box_border',
                        'label' => esc_html__( 'Border', 'themewar' ),
                        'selector' => '{{WRAPPER}} .lookbook, {{WRAPPER}} .lookbook02, {{WRAPPER}} .cateContent',
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
                        'name'      => 'ib_inner_box_border',
                        'label'     => esc_html__( 'Inner Border', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .lbborder',
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'lb_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
                        'name' => 'ib_box_shadow',
                        'label' => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector' => '{{WRAPPER}} .lookbook, {{WRAPPER}} .lookbook02, {{WRAPPER}} .cateContent',
                        'placeholder'   => esc_html__('insert lool book box shadow.', 'themewar'),
                ]
        );
        $this->add_control(
                'ib_box_border_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .lookbook'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .lookbook img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .lookbook02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'ib_box_margin', [
                        'label' => esc_html__( 'Content Margin', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .lkbook_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .lkbook_content02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'ib_box_content_padding', [
                        'label' => esc_html__( 'Content Padding', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .lkbook_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .lkbook_content02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'ib_box_content_bottom',
                [
                        'label'      => esc_html__( 'Content Bottom', 'themewar' ),
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
                                '{{WRAPPER}} .lkbook_content'   => 'bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .lkbook_content02' => 'bottom: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_top_sub', [
                'label'     => esc_html__( 'Top Title Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_style',
                                'operator'  => '==',
                                'value'     => '3',
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => '_top_title_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .lookbook02 > h5',
                ]
        );
        $this->add_responsive_control(
                'top_title_nr_color', [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .lookbook02 > h5' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                '_top_title_margin', [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .lookbook02 > h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_sub', [
                'label'     => esc_html__( 'Look Book Sub Title Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'sub_title_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .lkbook_content h5, {{WRAPPER}} .lkbook_content02 h5',
                ]
        );
        $this->add_responsive_control(
                'sub_title_nr_color', [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .lkbook_content h5' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .lkbook_content02 h5' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'sub_title_margin', [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .lkbook_content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .lkbook_content02 h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label'         => esc_html__( 'Look Book Title Styling', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .lkbook_content h3, {{WRAPPER}} .lkbook_content02 h3, {{WRAPPER}} .lookbook05 h3',
                ]
        );
        $this->add_responsive_control(
                'title_nr_color', [
                        'label' => esc_html__( 'Title Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .lkbook_content h3' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .lkbook_content02 h3'    => 'color: {{VALUE}}',
                                '{{WRAPPER}} .lookbook05 h3'    => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
            'heading_un_one',
            [
                'label'     => esc_html__( 'Different Text Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
                'heading1_color', [
                        'label'      => esc_html__( 'Different Text Color', 'themewar' ),
                        'type'       => Controls_Manager::COLOR,
                        'selectors'  => [
                            '{{WRAPPER}} .lkbook_content h3 span' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .lkbook_content02 h3 span' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .lookbook05 h3 span' => 'color: {{VALUE}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'heading1_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .lkbook_content h3 span, {{WRAPPER}} .lkbook_content02 h3 span, {{WRAPPER}} .lookbook05 h3 span',                
                ]
        );
        $this->add_responsive_control(
                'title_margin', [
                        'label' => esc_html__( 'Title Margin', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .lkbook_content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .lkbook_content02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .lookbook05 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_t_border',
            [
                'label'         => esc_html__('Title Border Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_style',
                                'operator'  => '!in',
                                'value'     => ['2'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
                        'name' => 'pr_title_border_bg',
                        'label' => esc_html__( 'BG', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .lookbook05 h3::after',
                ]
        );
        $this->add_responsive_control(
            'title_border_width',
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
                    '{{WRAPPER}} .lookbook05 h3::after' => 'width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'title_border_height',
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
                    '{{WRAPPER}} .lookbook05 h3::after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
                'title_border_margin', [
                        'label' => esc_html__( 'Title Margin', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .lookbook05 h3::after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_desc', [
                'label'     => esc_html__( 'Look Book Description Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'desc_title_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .lkbook_content p, {{WRAPPER}} .lkbook_content02 p',
                ]
        );
        $this->add_responsive_control(
                'desc_title_nr_color', [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .lkbook_content p' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .lkbook_content02 p' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'desc_title_margin', [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .lkbook_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .lkbook_content02 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_btn',
            [
                'label'         => esc_html__('Button Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_style',
                                'operator'  => '!in',
                                'value'     => ['2', '5'],
                        ]
                    ],
                ],
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
                                        '{{WRAPPER}} .organ_btn'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control(
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
                $this->add_responsive_control(
                        'btn_label_hover_color',
                        [
                                'label'     => esc_html__( 'Label Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .organ_btn:hover'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control(
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
                    '{{WRAPPER}} .organ_btn' => 'width: {{SIZE}}{{UNIT}};'
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
        $this->add_responsive_control(
            'btn_border_radius',
            [
                    'label' => esc_html__( 'Border Radius', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .organ_btn'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'section_tab_btn_icon',
            [
                'label'         => esc_html__('BTN Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'btn_icon_typography',
                        'label' => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .organ_btn i, {{WRAPPER}} .rmbtn',
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
                                '{{WRAPPER}} .organ_btn i'   => 'color: {{VALUE}}',
                                '{{WRAPPER}} .rmbtn'   => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_1_bg',
                    [
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organ_btn i'   => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .rmbtn'   => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'icon_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .organ_btn i, {{WRAPPER}} .rmbtn',
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
                                    '{{WRAPPER}} .organ_btn:hover i'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .rmbtn:hover'   => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_1_hover_bg',
                    [
                            'label'     => esc_html__( 'BG Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organ_btn:hover i'   => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .rmbtn:hover'   => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'icon_hover_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .organ_btn:hover i, {{WRAPPER}} .rmbtn:hover',
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
                                '{{WRAPPER}} .organ_btn i' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .rmbtn' => 'width: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .rmbtn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
        $this->add_responsive_control(
            'btn_icon_border_radius',
            [
                    'label' => esc_html__( 'Border Radius', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .organ_btn i'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .rmbtn'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .rmbtn' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
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
                            '{{WRAPPER}} .rmbtn' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings   = $this->get_settings_for_display();
        $lb_style           = (isset($settings['lb_style']) && $settings['lb_style'] > 0) ? $settings['lb_style'] : 1;
        
        $lb_img             = (isset($settings['lb_img']['url']) && $settings['lb_img']['url'] != '') ? $settings['lb_img']['url'] : '';
        
        $lb_offer           = (isset($settings['lb_offer']) && $settings['lb_offer'] != '') ? $settings['lb_offer'] : '';
        $lb_top_title       = (isset($settings['lb_top_title']) && $settings['lb_top_title'] != '') ? $settings['lb_top_title'] : '';
        $title_text         = (isset($settings['lb_title']) && $settings['lb_title'] != '') ? $settings['lb_title'] : '';
        $lb_sub_title       = (isset($settings['lb_sub_title']) && $settings['lb_sub_title'] != '') ? $settings['lb_sub_title'] : '';
        $lb_desc            = (isset($settings['lb_desc']) && $settings['lb_desc'] != '') ? $settings['lb_desc'] : '';
        $lb_link            = (isset($settings['lb_link']) && $settings['lb_link'] != '') ? $settings['lb_link'] : '';
        
        $url                = $settings['lb_url']['url'] ? $settings['lb_url']['url'] : '#';
        $target             = $settings['lb_url']['is_external'] ? ' target="_blank"' : '' ;
        $nofollow           = $settings['lb_url']['nofollow'] ? ' rel="nofollow"' : '' ;

        $anim_style         = (isset($settings['anim_style']) && $settings['anim_style'] > 0) ? $settings['anim_style'] : 1;
        $text_align         = (isset($settings['text_align']) && $settings['text_align'] != '' ? $settings['text_align'] : 'left');

        $lb_title           = str_replace(['{', '}'], ['<span>', '</span>'], $title_text);

        $c_css = '';
        if($anim_style == 2 ){
            $c_css .= 'overlay-anim';
        }else{
            $c_css .= 'shine-anim';
        }
        
        if($lb_style == 2):
            ?>
            <div class="lookbook lb03 <?php echo esc_attr($c_css); ?>">
                <?php if($lb_img != ''): ?>
                    <img src="<?php echo esc_url($lb_img); ?>" alt="<?php echo esc_html__('Organia', 'themewar'); ?>">
                <?php endif; ?>
                <div class="lkbook_content">
                    <?php if($lb_sub_title != ''): ?>
                        <h5><?php echo organia_kses($lb_sub_title); ?></h5>
                    <?php endif; ?>
                    <?php if($lb_title != ''): ?>
                        <h3><?php echo organia_kses($lb_title); ?></h3>
                    <?php endif; ?>
                </div>
                <?php if($url != ''): ?>
                    <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_url($url); ?>" class="rmbtn"><i class="twi-angle-right"></i></a>
                <?php endif; ?>
            </div>
            <?php
        elseif($lb_style == 3):
            ?>
            <div class="lookbook02 <?php echo esc_attr($c_css); ?>">
                <div class="lbborder"></div>
                <?php if($lb_img != ''): ?>
                    <img src="<?php echo esc_url($lb_img); ?>" alt="<?php echo esc_html__('organia', 'themewar'); ?>">
                <?php endif; ?>
                <?php if($lb_top_title != ''): ?>
                    <h5><?php echo organia_kses($lb_top_title); ?></h5>
                <?php endif; ?>
                <div class="lkbook_content02">
                    <?php if($lb_sub_title != ''): ?>
                        <h5><?php echo organia_kses($lb_sub_title); ?></h5>
                    <?php endif; ?>
                    <?php if($lb_title != ''): ?>
                        <h3><?php echo organia_kses($lb_title); ?></h3>
                    <?php endif; ?>
                    <?php if($lb_desc != ''): ?>
                        <p><?php echo organia_kses($lb_desc); ?></p>
                    <?php endif; ?>
                    <?php if($lb_link != ''): ?>
                        <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_url($url); ?>" class="organ_btn ob02"><?php echo organia_kses($lb_link); ?><i class="twi-arrow-right1"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php 
        elseif($lb_style == 4):
            ?>
            <div class="lookbook03">
                <?php if($lb_offer != ''): ?>
                    <div class="offer"><h5><?php echo organia_kses($lb_offer); ?></h5></div>
                <?php endif; ?>
                <div class="lkbook_content03">
                    <?php if($lb_title != ''): ?>
                        <h3><?php echo organia_kses($lb_title); ?></h3>
                    <?php endif; ?>
                    <?php if($lb_desc != ''): ?>
                        <p><?php echo organia_kses($lb_desc); ?></p>
                    <?php endif; ?>
                    <?php if($lb_link != ''): ?>
                        <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_url($url); ?>" class="organ_btn"><?php echo organia_kses($lb_link); ?><i class="twi-arrow-right1"></i></a>
                    <?php endif; ?>
                </div>
                <?php if($lb_img != ''): ?>
                    <img src="<?php echo esc_url($lb_img); ?>" alt="<?php echo esc_html__('Organia', 'themewar'); ?>">
                <?php endif; ?>
            </div>
            <?php 
        elseif($lb_style == 5):
            ?>
            <div class="lookbook05">
                <?php if($lb_img != ''): ?>
                    <img src="<?php echo esc_url($lb_img); ?>" alt="<?php echo esc_html__('Organia', 'themewar'); ?>">
                <?php endif; ?>
                <?php if($lb_title != ''): ?>
                    <h3><?php echo organia_kses($lb_title); ?></h3>
                <?php endif; ?>
            </div>
            <?php 
        else:
            ?>
            <div class="lookbook <?php echo esc_attr($c_css); ?> text-<?php echo esc_attr($text_align); ?>">
                <?php if($lb_img != ''): ?>
                    <img src="<?php echo esc_url($lb_img); ?>" alt="<?php echo esc_html__('Organia', 'themewar'); ?>">
                <?php endif; ?>
                <div class="lkbook_content">
                    <?php if($lb_sub_title != ''): ?>
                        <h5><?php echo organia_kses($lb_sub_title); ?></h5>
                    <?php endif; ?>
                    <?php if($lb_title != ''): ?>
                        <h3><?php echo organia_kses($lb_title); ?></h3>
                    <?php endif; ?>
                    <?php if($lb_desc != ''): ?>
                        <p><?php echo organia_kses($lb_desc); ?></p>
                    <?php endif; ?>
                    <?php if($lb_link != ''): ?>
                        <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_url($url); ?>" class="organ_btn"><?php echo organia_kses($lb_link); ?><i class="twi-arrow-right1"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endif;
    }
    
    protected function content_template() {

    }
    
    
}