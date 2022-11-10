<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Icon_Box_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-icon-box';
    }
    
    public function get_title() {
        return esc_html__( 'Icon Box', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Icon Box', 'themewar' ),
            ]
        );
        $this->add_control(
                'icon_box_style',
                [
                        'label'     => esc_html__( 'Box Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Style 01', 'themewar' ),
                                2       => esc_html__( 'Style 02', 'themewar' ),
                                3       => esc_html__( 'Style 03', 'themewar' ),
                                4       => esc_html__( 'Style 04', 'themewar' ),
                                5       => esc_html__( 'Style 05', 'themewar' ),
                                6       => esc_html__( 'Style 06', 'themewar' ),
                                7       => esc_html__( 'Style 07', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'icon_or_image',
                [
                        'label'     => esc_html__( 'Icon Or Image', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Icon', 'themewar' ),
                                2       => esc_html__( 'Image', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'icons',
                [
                        'label'     => esc_html__( 'Icon', 'themewar' ),
                        'type'      => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'icon_or_image',
                                        'operator'  => '==',
                                        'value'     => '1',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'images',
                [
                        'label' => esc_html__( 'Choose Image', 'themewar' ),
                        'label_block'   => TRUE,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'icon_or_image',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'box_title',
                [
                        'label'         => esc_html__( 'Box Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('Box Title', 'themewar'),
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'icon_box_style',
                                        'operator'  => '!in',
                                        'value'     => ['7'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'box_title2',
                [
                        'label'         => esc_html__( 'Box Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('Box Title', 'themewar'),
                        'description'   => esc_html__('Use {} for Bold Text?', 'themewar'),
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'icon_box_style',
                                        'operator'  => '==',
                                        'value'     => '7',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'is_link',
                [
                        'label'             => esc_html__( 'Title Is Link?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to link this title?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_control(
                'b_title_url', [
                    'label'             => esc_html__( 'URL', 'themewar' ),
                    'type'              => Controls_Manager::URL,
                    'input_type'        => 'url',
                    'condition'         => ['is_link' => 'yes'],
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
                'box_desc',
                [
                        'label'         => esc_html__( 'Box Content', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'default'       => '',
                        'placeholder'   => esc_html__('Insert Content Here', 'themewar'),
                ]
        );
        $this->add_control(
                'rm_label',
                [
                        'label'         => esc_html__( 'Read More Label', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => TRUE,
                        'placeholder'   => esc_html__('read more btn label', 'themewar'),
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'icon_box_style',
                                        'operator'  => '==',
                                        'value'     => '7',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'rme_url', [
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
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'icon_box_style',
                                    'operator'  => '==',
                                    'value'     => '7',
                            ]
                        ],
                    ],
                ]
        );
        $this->add_responsive_control(
                'box_alignment', [
                        'label'                     =>esc_html__( 'Box Alignment', 'themewar' ),
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
                        'default'                   => 'left',
                        'prefix_class'              => 'box_holder elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Box Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'icon_box_radius',
                [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .icon_box_01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .icon_box_03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .icon_box_02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .icon_box_04' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .icon_box_05' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .icon_box_06' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .icon_box_07' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .icon_box_01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_04' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_05' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_06' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_07' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .icon_box_01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_04' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_05' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_06' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .icon_box_07' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs( 'ib_box_tot' );
            $this->start_controls_tab(
                'ib_box_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )]
            );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name' => 'icon_box_bg',
                                'label' => esc_html__( 'Box Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .icon_box_01, {{WRAPPER}} .icon_box_03, {{WRAPPER}} .icon_box_02, {{WRAPPER}} .icon_box_04, {{WRAPPER}} .icon_box_05, {{WRAPPER}} .icon_box_06, {{WRAPPER}} .icon_box_07',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name' => 'icon_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .icon_box_01, {{WRAPPER}} .icon_box_03, {{WRAPPER}} .icon_box_02, {{WRAPPER}} .icon_box_04, {{WRAPPER}} .icon_box_05, {{WRAPPER}} .icon_box_06, {{WRAPPER}} .icon_box_07',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name' => 'box_border',
                                'label' => esc_html__( 'Box Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .icon_box_01, {{WRAPPER}} .icon_box_03, {{WRAPPER}} .icon_box_02, {{WRAPPER}} .icon_box_04, {{WRAPPER}} .icon_box_05, {{WRAPPER}} .icon_box_06, {{WRAPPER}} .icon_box_07',
                        ]
                );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'ib_box_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )]
            );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name' => 'icon_box_bg_hr',
                                'label' => esc_html__( 'Box Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .icon_box_01:hover, {{WRAPPER}} .icon_box_03:hover, {{WRAPPER}} .icon_box_02:hover, {{WRAPPER}} .icon_box_04:hover, {{WRAPPER}} .icon_box_05:hover, {{WRAPPER}} .icon_box_06:hover, {{WRAPPER}} .icon_box_07:hover',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name' => 'icon_box_shadow_hr',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .icon_box_01:hover, {{WRAPPER}} .icon_box_03:hover, {{WRAPPER}} .icon_box_02:hover, {{WRAPPER}} .icon_box_04:hover, {{WRAPPER}} .icon_box_05:hover, {{WRAPPER}} .icon_box_06:hover, {{WRAPPER}} .icon_box_07:hover',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name' => 'box_border_hr',
                                'label' => esc_html__( 'Box Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .icon_box_01:hover, {{WRAPPER}} .icon_box_03:hover, {{WRAPPER}} .icon_box_02:hover, {{WRAPPER}} .icon_box_04:hover, {{WRAPPER}} .icon_box_05:hover, {{WRAPPER}} .icon_box_06:hover, {{WRAPPER}} .icon_box_07:hover',
                        ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
                'icon_box_hover_all_con_color',[
                        'label'     => esc_html__( 'Hover All Content Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .icon_box_01:hover *' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .icon_box_03:hover *' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .icon_box_02:hover *' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .icon_box_04:hover *' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .icon_box_05:hover *' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .icon_box_06:hover *' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .icon_box_07:hover *' => 'color: {{VALUE}}',
                        ]
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Icon Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'icon_or_image',
                                    'operator'  => '!in',
                                    'value'     => ['2'],
                            ]
                        ],
                    ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'icon_box_i_typography',
                        'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ibImg'
                ]
        );
        $this->start_controls_tabs( 'ib_icon_tot' );
            $this->start_controls_tab(
                'ib_icon_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )]
            );
            $this->add_control(
                    'icon_box_i_color',[
                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .ibImg' => 'color: {{VALUE}}',
                            ]
                    ]
            );
            $this->add_control(
                    'icon_box_border_color',[
                            'label'     => esc_html__( 'Inner Border Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .icon_box_02 .ibImg::after' => 'border-color: {{VALUE}}',
                                '{{WRAPPER}} .icon_box_04 .ibImg::after' => 'border-color: {{VALUE}}',
                            ]
                    ]
            );
            $this->add_control(
                    'icon_box_i_bgcolor',[
                            'label'     => esc_html__( 'Icon BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ibImg' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'icon_box_icon_svg_bgcolor',[
                            'label'     => esc_html__( 'SVG BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .icon_box_07 .ibImg svg' => 'fill: {{VALUE}}',
                            ],
                            'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'icon_box_style',
                                                'operator'  => '==',
                                                'value'     => '7',
                                        ]
                                    ],
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'ib_icon_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )]
            );
            $this->add_control(
                    'icon_box_i_color_hr',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_01:hover .ibImg' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_02:hover .ibImg' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_03:hover .ibImg' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_04:hover .ibImg' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_05:hover .ibImg' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_06:hover .ibImg' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_07:hover .ibImg' => 'color: {{VALUE}}',
                            ]
                    ]
            );
            $this->add_control(
                    'icon_box_border_hover_color',[
                            'label'     => esc_html__( 'Hover Inner Border Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_02 .ibImg::before' => 'border-color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_04 .ibImg::before' => 'border-color: {{VALUE}}',
                            ]
                    ]
            );
            $this->add_control(
                    'icon_box_i_bgcolor_hr',[
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_01:hover .ibImg' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_02:hover .ibImg' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_03:hover .ibImg' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_04:hover .ibImg' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_05:hover .ibImg' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_06:hover .ibImg' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'icon_box_icon_hover_svg_bgcolor',[
                            'label'     => esc_html__( 'SVG BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .icon_box_07:hover .ibImg svg' => 'fill: {{VALUE}}',
                            ],
                            'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'icon_box_style',
                                                'operator'  => '==',
                                                'value'     => '7',
                                        ]
                                    ],
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                'icon_box_i_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .ibImg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
            $this->add_responsive_control(
                    'icon_box_i_width',
                    [
                            'label' => __( 'Width', 'themewar' ),
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
                                    '{{WRAPPER}} .ibImg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_i_height',
                    [
                            'label' => __( 'Height', 'themewar' ),
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
                                    '{{WRAPPER}} .ibImg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'icon_box_i__shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .ibImg',
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_i_padding',
                    [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .ibImg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_i_margin',
                    [
                            'label' => esc_html__( 'Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .ibImg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
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
                                    'name'      => 'icon_or_image',
                                    'operator'  => '!in',
                                    'value'     => ['1'],
                            ]
                        ],
                    ],
                ]
        );
            $this->start_controls_tabs( 'ib_img_tot' );
                $this->start_controls_tab(
                    'ib_img_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )]
                );
                $this->add_control(
                        'icon_box_img_bgcolor',[
                                'label'     => esc_html__( 'BG Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .ibImg' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'icon_box_img_svg_bgcolor',[
                                'label'     => esc_html__( 'SVG BG Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .icon_box_07 .ibImg svg' => 'fill: {{VALUE}}',
                                ],
                                'conditions'    => [
                                        'terms' => [
                                            [
                                                    'name'      => 'icon_box_style',
                                                    'operator'  => '==',
                                                    'value'     => '7',
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control(
                        'icon_box_img_border_color',[
                                'label'     => esc_html__( 'Inner Border Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .icon_box_02 .ibImg::after' => 'border-color: {{VALUE}}',
                                        '{{WRAPPER}} .icon_box_04 .ibImg::after' => 'border-color: {{VALUE}}',
                                ]
                        ]
                );

                $this->end_controls_tab();
                $this->start_controls_tab(
                    'ib_img_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )]
                );
                $this->add_control(
                        'icon_box_img_bgcolor_hr',[
                                'label'     => esc_html__( 'BG Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .icon_box_01:hover .ibImg' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .icon_box_02:hover .ibImg' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .icon_box_03:hover .ibImg' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .icon_box_04:hover .ibImg' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .icon_box_05:hover .ibImg' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .icon_box_06:hover .ibImg' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'icon_box_img_hover_svg_bgcolor',[
                                'label'     => esc_html__( 'SVG BG Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .icon_box_07:hover .ibImg svg' => 'fill: {{VALUE}}',
                                ],
                                'conditions'    => [
                                        'terms' => [
                                            [
                                                    'name'      => 'icon_box_style',
                                                    'operator'  => '==',
                                                    'value'     => '7',
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control(
                        'icon_box_img_border_hover_color',[
                                'label'     => esc_html__( 'Hover Inner Border Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .icon_box_02 .ibImg::before' => 'border-color: {{VALUE}}',
                                        '{{WRAPPER}} .icon_box_04 .ibImg::before' => 'border-color: {{VALUE}}',
                                ]
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_responsive_control(
                    'icon_box_area_img_width',
                    [
                            'label' => esc_html__( 'Area Width', 'themewar' ),
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
                                    '{{WRAPPER}} .ibImg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_area_img_height',
                    [
                            'label' => esc_html__( 'Area Height', 'themewar' ),
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
                                    '{{WRAPPER}} .ibImg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_img_width',
                    [
                            'label' => esc_html__( 'Image Width', 'themewar' ),
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
                                    '{{WRAPPER}} .ibImg img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_img_height',
                    [
                            'label' => esc_html__( 'Image Height', 'themewar' ),
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
                                    '{{WRAPPER}} .ibImg img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'icon_box_img_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .ibImg',
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_img_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ibImg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_img_padding',
                    [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ibImg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_img_margin',
                    [
                            'label' => esc_html__( 'Margins', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .ibImg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3',[
                    'label'         => esc_html__('Title Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
            $this->add_control(
                    'icon_box_title_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_01 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_03 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_02 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_04 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_05 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_06 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_07 h3' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'icon_box_hover_title_color',[
                            'label'     => esc_html__( 'Linked Title Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_01 h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_03 h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_02 h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_04 h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_05 h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_06 h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_07 h3 a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'icon_box_title_typo',
                            'label'     => esc_html__( 'Title Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .icon_box_02 h3, {{WRAPPER}} .icon_box_01 h3, {{WRAPPER}} .icon_box_03 h3, {{WRAPPER}} .icon_box_04 h3, {{WRAPPER}} .icon_box_05 h3, {{WRAPPER}} .icon_box_06 h3, {{WRAPPER}} .icon_box_07 h3',
                    ]
            );
            $this->add_control(
                    'icon_box_title_margin',
                    [
                            'label'      => esc_html__( 'Title Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .icon_box_02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_01 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_03 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_04 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_05 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_06 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_07 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                'heading_un_one',
                [
                    'label'     => esc_html__( '{} Text Style', 'themewar' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'conditions' => [
                        'terms'  => [
                            [
                                    'name'      => 'icon_box_style',
                                    'operator'  => '==',
                                    'value'     => '7',
                            ]
                        ],
                    ],
                ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'icon_box_title_diff_typo',
                            'label'     => esc_html__( '{}} Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .icon_box_07 h3 span',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'icon_box_style',
                                            'operator'  => '==',
                                            'value'     => '7',
                                    ]
                                ],
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Box Content Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
            $this->add_control(
                    'icon_box_content_color',[
                            'label'     => esc_html__( 'Content Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_03 p' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_01 p' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_02 p' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_04 p' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_05 p' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_06 p' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .icon_box_07 p' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'icon_box_content_typo',
                            'label'     => esc_html__( 'Content Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .icon_box_02 p, {{WRAPPER}} .icon_box_01 p, {{WRAPPER}} .icon_box_03 p, {{WRAPPER}} .icon_box_04 p, {{WRAPPER}} .icon_box_05 p, {{WRAPPER}} .icon_box_06 p, {{WRAPPER}} .icon_box_07 p',
                    ]
            );
            $this->add_control(
                    'icon_box_content_margin',
                    [
                            'label'      => esc_html__( 'Content Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .icon_box_02 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_01 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_03 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_04 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_05 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_06 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .icon_box_07 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_btn',
            [
                'label'         => esc_html__('Ream More Btn Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'icon_box_style',
                                    'operator'  => '==',
                                    'value'     => '7',
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
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name'  => 'btn_1_bg',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic' ],
                                'selector' => '{{WRAPPER}} .organ_btn',
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
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name'  => 'btn_1_hover_bg',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic' ],
                                'selector' => '{{WRAPPER}} .organ_btn:before',
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
        
    }
    
    protected function render() {
        $settings   = $this->get_settings_for_display();
        $icon_box_style  = (isset($settings['icon_box_style']) && $settings['icon_box_style'] > 0) ? $settings['icon_box_style'] : 1;
        $icon_or_image      = (isset($settings['icon_or_image']) && $settings['icon_or_image'] > 0 ) ? $settings['icon_or_image'] : 1;
        $icons      = (isset($settings['icons']) && $settings['icons'] != '') ? $settings['icons'] : 'icon-truck';
        $images     = (isset($settings['images']['url']) && $settings['images']['url'] != '') ? $settings['images']['url'] : '';
        $box_title  = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('Box Title', 'themewar');
        $box_desc   = (isset($settings['box_desc']) && $settings['box_desc'] != '') ? $settings['box_desc'] : '';

        $box_title2  = (isset($settings['box_title2']) && $settings['box_title2'] != '') ? $settings['box_title2'] : esc_html__('Box {Title}', 'themewar');
        $title_text  = str_replace(['{', '}'], ['<span>', '</span>'], $box_title2);
        $rm_label    = (isset($settings['rm_label']) && $settings['rm_label'] != '') ? $settings['rm_label'] : esc_html__('Read More', 'themewar');
        
        $is_link     = $settings['is_link'];
        $url         = !empty($settings['b_title_url']['url']) ? $settings['b_title_url']['url'] : '#';
        $target      = !empty($settings['b_title_url']['is_external']) ? ' target="_blank"' : '';
        $nofollow    = !empty($settings['b_title_url']['nofollow']) ? ' rel="nofollow"' : '';

        $rmurl         = !empty($settings['rme_url']['url']) ? $settings['rme_url']['url'] : '#';
        $rmtarget      = !empty($settings['rme_url']['is_external']) ? ' target="_blank"' : '' ;
        $rmnofollow    = !empty($settings['rme_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        
        
        if($icon_box_style == 2):
            ?>
            <div class="icon_box_02">
                <div class="ibImg">
                    <?php 
                        if($icon_or_image == 2 && $images != ''):
                            echo '<img src="'.esc_url($images).'" alt="'.esc_html__('Icon Image ', 'themewar').'"/>';
                        else:
                            echo '<i class="'. esc_attr($icons).'"></i>';
                        endif;
                    ?>
                </div>
                <h3><?php if($is_link == 'yes'): ?><a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>><?php endif; ?>
                    <?php echo esc_html($box_title) ?><?php if($is_link == 'yes'): ?></a><?php endif; ?>
                </h3>
                <p>
                    <?php echo wp_kses_post($box_desc); ?>
                </p>
            </div>
            <?php
        elseif($icon_box_style == 3):
            ?>
            <div class="icon_box_03">
                <div class="ibImg">
                    <?php 
                        if($icon_or_image == 2 && $images != ''):
                            echo '<img src="'.esc_url($images).'" alt="'.esc_html__('Icon Image ', 'themewar').'"/>';
                        else:
                            echo '<i class="'. esc_attr($icons).'"></i>';
                        endif;
                    ?>
                </div>
                <h3><?php if($is_link == 'yes'): ?><a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>><?php endif; ?>
                    <?php echo esc_html($box_title) ?><?php if($is_link == 'yes'): ?></a><?php endif; ?>
                </h3>
                <p>
                    <?php echo wp_kses_post($box_desc); ?>
                </p>
            </div>
            <?php
        elseif($icon_box_style == 4):
            ?>
            <div class="icon_box_04">
                <div class="ibImg">
                    <?php 
                        if($icon_or_image == 2 && $images != ''):
                            echo '<img src="'.esc_url($images).'" alt="'.esc_html__('Icon Image ', 'themewar').'"/>';
                        else:
                            echo '<i class="'. esc_attr($icons).'"></i>';
                        endif;
                    ?>
                </div>
                <h3><?php if($is_link == 'yes'): ?><a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>><?php endif; ?>
                    <?php echo esc_html($box_title) ?><?php if($is_link == 'yes'): ?></a><?php endif; ?>
                </h3>
                <p>
                    <?php echo wp_kses_post($box_desc); ?>
                </p>
            </div>
            <?php
        elseif($icon_box_style == 5):
            ?>
            <div class="icon_box_05">
                <div class="ibImg">
                    <?php 
                        if($icon_or_image == 2 && $images != ''):
                            echo '<img src="'.esc_url($images).'" alt="'.esc_html__('Icon Image ', 'themewar').'"/>';
                        else:
                            echo '<i class="'. esc_attr($icons).'"></i>';
                        endif;
                    ?>
                </div>
                <h3><?php if($is_link == 'yes'): ?><a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>><?php endif; ?>
                    <?php echo esc_html($box_title) ?><?php if($is_link == 'yes'): ?></a><?php endif; ?>
                </h3>
                <p>
                    <?php echo wp_kses_post($box_desc); ?>
                </p>
            </div>
            <?php
        elseif($icon_box_style == 6):
            ?>
            <div class="icon_box_06">
                <div class="ibImg">
                    <?php 
                        if($icon_or_image == 2 && $images != ''):
                            echo '<img src="'.esc_url($images).'" alt="'.esc_html__('Icon Image ', 'themewar').'"/>';
                        else:
                            echo '<i class="'. esc_attr($icons).'"></i>';
                        endif;
                    ?>
                </div>
                <h3><?php if($is_link == 'yes'): ?><a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>><?php endif; ?>
                    <?php echo esc_html($box_title) ?><?php if($is_link == 'yes'): ?></a><?php endif; ?>
                </h3>
                <p>
                    <?php echo wp_kses_post($box_desc); ?>
                </p>
            </div>
            <?php
        elseif($icon_box_style == 7):
            ?>
            <div class="icon_box_07">
                <div class="ibImg">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="438.000000pt" height="438.000000pt" viewBox="0 0 438.000000 438.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,438.000000) scale(0.100000,-0.100000)" stroke="none">
                        <path d="M1903 4368 c3 -17 -44 -25 -146 -27 -49 0 -97 -6 -109 -12 -11 -6 -52 -15 -92 -19 -84 -10 -169 -27 -211 -42 -16 -6 -48 -13 -70 -16 -22 -2 -49 -11 -60 -18 -11 -8 -33 -14 -50 -14 -16 0 -39 -7 -49 -15 -11 -8 -29 -15 -40 -15 -12 0 -30 -7 -40 -15 -11 -8 -28 -15 -39 -15 -10 0 -31 -6 -45 -14 -26 -14 -141 -67 -172 -80 -8 -3 -28 -15 -45 -25 -16 -11 -48 -29 -69 -41 -132 -72 -389 -332 -435 -440 -11 -25 -16 -35 -39 -75 -7 -11 -15 -27 -18 -35 -3 -8 -12 -28 -20 -43 -7 -16 -14 -38 -14 -50 0 -12 -7 -31 -15 -41 -8 -11 -15 -34 -15 -50 -1 -17 -7 -42 -15 -56 -8 -14 -14 -41 -15 -61 0 -20 -7 -56 -15 -79 -8 -23 -15 -70 -15 -104 0 -33 -5 -79 -11 -101 -6 -22 -15 -146 -22 -275 -24 -517 -8 -960 44 -1165 6 -22 14 -58 19 -80 16 -73 40 -149 50 -159 5 -5 10 -18 10 -27 0 -15 15 -52 42 -99 4 -8 11 -22 14 -30 12 -31 15 -36 34 -65 11 -16 23 -37 27 -45 34 -75 257 -311 378 -401 65 -48 191 -132 215 -143 8 -3 29 -15 45 -26 28 -18 35 -22 68 -35 6 -3 20 -9 29 -15 10 -5 26 -15 35 -20 10 -6 25 -13 33 -16 8 -3 30 -12 48 -20 17 -8 49 -21 70 -30 20 -9 50 -23 65 -30 16 -8 38 -14 50 -14 12 0 31 -7 41 -15 11 -8 29 -15 41 -15 12 0 30 -7 41 -15 10 -8 33 -15 49 -15 17 0 41 -7 55 -15 14 -8 41 -15 60 -15 19 0 46 -7 60 -15 14 -8 43 -14 65 -15 22 0 60 -6 85 -14 59 -19 261 -36 422 -36 135 0 244 12 318 36 25 8 57 14 71 14 15 0 32 7 39 15 7 8 20 15 29 15 10 0 26 7 37 15 10 8 24 15 31 15 17 0 106 55 185 115 72 53 495 474 623 620 44 50 93 104 110 121 100 103 172 182 217 237 28 34 56 67 62 72 7 6 41 48 76 95 35 47 70 89 77 93 7 4 13 13 13 19 0 5 14 27 30 48 17 21 30 44 30 51 0 7 6 20 14 28 22 25 106 192 106 211 0 10 7 23 15 30 8 7 15 23 15 37 0 13 5 34 12 46 7 12 15 49 19 82 4 35 14 64 23 71 22 16 24 224 2 224 -16 0 -26 30 -26 85 0 22 -7 49 -15 59 -8 11 -15 30 -15 42 0 12 -6 35 -14 51 -7 15 -20 44 -29 63 -14 33 -29 65 -89 180 -13 25 -28 51 -35 58 -6 6 -15 21 -18 32 -3 11 -11 20 -16 20 -5 0 -9 7 -9 15 0 8 -5 15 -10 15 -6 0 -13 8 -17 18 -3 9 -19 33 -35 53 -15 20 -28 41 -28 45 0 5 -14 25 -31 44 -16 19 -56 69 -88 110 -33 41 -72 89 -88 105 -16 17 -53 59 -82 94 -29 35 -58 70 -64 76 -7 7 -64 68 -127 136 -197 213 -547 549 -572 549 -4 0 -13 6 -20 13 -18 16 -48 35 -75 46 -11 6 -24 15 -28 20 -3 6 -14 11 -24 11 -10 0 -24 7 -31 15 -7 8 -22 15 -34 15 -11 0 -30 7 -40 15 -11 8 -33 15 -48 15 -16 0 -41 6 -56 14 -15 7 -67 16 -116 18 -68 3 -92 9 -101 21 -11 15 -39 17 -249 17 -178 0 -235 -3 -233 -12z"></path>
                        </g>
                    </svg>
                    <?php 
                        if($icon_or_image == 2 && $images != ''):
                            echo '<img src="'.esc_url($images).'" alt="'.esc_html__('Icon Image ', 'themewar').'"/>';
                        else:
                            echo '<i class="'. esc_attr($icons).'"></i>';
                        endif;
                    ?>
                </div>
                <h3><?php if($is_link == 'yes'): ?><a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>><?php endif; ?>
                    <?php echo wp_kses_post($title_text) ?><?php if($is_link == 'yes'): ?></a><?php endif; ?>
                </h3>
                <p>
                    <?php echo wp_kses_post($box_desc); ?>
                </p>
                <?php if($rm_label != ''): ?>
                <a class="organ_btn" href="<?php echo $rmurl; ?>" <?php echo $rmtarget.' '.$rmnofollow; ?>>
                    <?php echo wp_kses_post($rm_label) ?></a>
                <?php endif; ?>
            </div>
            <?php
        else:
            ?>
            <div class="icon_box_01">
                <div class="ibImg">
                    <?php 
                        if($icon_or_image == 2 && $images != ''):
                            echo '<img src="'.esc_url($images).'" alt="'.esc_html__('Icon Image ', 'themewar').'"/>';
                        else:
                            echo '<i class="'. esc_attr($icons).'"></i>';
                        endif;
                    ?>
                </div>
                <h3><?php if($is_link == 'yes'): ?><a href="<?php echo $url; ?>" <?php echo $target.' '.$nofollow; ?>><?php endif; ?>
                    <?php echo esc_html($box_title) ?><?php if($is_link == 'yes'): ?></a><?php endif; ?>
                </h3>
                <p>
                    <?php echo wp_kses_post($box_desc); ?>
                </p>
            </div>
            <?php
        endif;
        
    }
    
    protected function content_template() {

    }
    
    
}