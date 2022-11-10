<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Team_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-team';
    }
    public function get_title() {
        return esc_html__( 'Team', 'themewar' );
    }
    public function get_icon() {
        return ' eicon-person';
    }
    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Team Member', 'themewar' ),
            ]
        );
            $this->add_control(
                    'team_mode_style',
                    [
                            'label'     => esc_html__( 'View Mode', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 1,
                            'options'   => [
                                    1       => esc_html__( 'Grid View', 'themewar' ),
                                    2       => esc_html__( 'Slide View', 'themewar' ),
                            ],
                    ]
            );
            $this->add_control(
                    'team_view_style',
                    [
                            'label'     => esc_html__( 'View Style', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 1,
                            'options'   => [
                                    1       => esc_html__( 'Style 01', 'themewar' ),
                                    2       => esc_html__( 'Style 02', 'themewar' ),
                                    3       => esc_html__( 'Style 03', 'themewar' ),
                            ],
                    ]
            );
            $this->add_control(
                    'column',
                    [
                            'label'     => esc_html__( 'Column View', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 4,
                            'options'   => [
                                    3       => esc_html__( '3 Col', 'themewar' ),
                                    4       => esc_html__( '4 Col', 'themewar' ),
                            ],
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'team_mode_style',
                                            'operator'  => 'in',
                                            'value'     => ['1'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'team_is_details',
                    [
                            'label'             => esc_html__( 'Is Details Page Exist?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to linked team member with details page? Then turn it to Yes.', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'yes'
                    ]
            );
            $this->add_control(
                    'team_slide_autoplay',
                    [
                            'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'team_mode_style',
                                            'operator'  => 'in',
                                            'value'     => ['2'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'team_slide_loop',
                    [
                            'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'team_mode_style',
                                            'operator'  => 'in',
                                            'value'     => ['2'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'team_slide_nav',
                    [
                            'label'             => esc_html__( 'Is Nav?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'team_mode_style',
                                            'operator'  => 'in',
                                            'value'     => ['2'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'team_slide_dots',
                    [
                            'label'             => esc_html__( 'Is Dots?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'team_mode_style',
                                            'operator'  => 'in',
                                            'value'     => ['2'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'order_by',
                    [
                            'label'     => esc_html__( 'Order By', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 'date',
                            'options'   => [
                                    'ID'       => esc_html__( 'ID', 'themewar' ),
                                    'title'    => esc_html__( 'Title', 'themewar' ),
                                    'date'     => esc_html__( 'Date', 'themewar' ),
                                    'rand'     => esc_html__( 'Random', 'themewar' ),
                            ],
                    ]
            );
            $this->add_control(
                    'order',
                    [
                            'label'     => esc_html__( 'Order', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 'DESC',
                            'options'   => [
                                    'ASC'       => esc_html__( 'Ascending', 'themewar' ),
                                    'DESC'      => esc_html__( 'Descending', 'themewar' ),
                            ],
                    ]
            );
            $this->add_control(
                    'no_of_items',
                    [
                            'label'     => esc_html__( 'Number of Items', 'themewar' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => 1,
                            'max'       => 100,
                            'step'      => 1,
                            'default'   => 4,
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_1',
            [
                'label'         => esc_html__('Team Member Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .teamItem01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .teamItem02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .teamItem03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .teamItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .teamItem02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .teamItem03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_image', [
                'label'     => esc_html__( 'Image Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name'      => 'ab_img_shadow',
                        'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .tmThumb img, {{WRAPPER}} .teamItem03 img, {{WRAPPER}} .tmThumb02 img',
                ]
        );
        $this->add_responsive_control(
            'ab_img_radius',
            [
                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .tmThumb img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .tmThumb'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .tmWrapper::after'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .teamItem03 img'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .tmThumb02 img'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_overlay', [
                'label'     => esc_html__( 'Overlay Style Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'team_view_style',
                                'operator'  => '==',
                                'value'     => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
                'overlay_color',[
                        'label'     => esc_html__( 'Overlay Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .teamItem01:hover .tmThumb' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'border_color',[
                        'label'     => esc_html__( 'Border Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tmWrapper::after' => 'border-color: {{VALUE}}',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2',
            [
                'label'         => esc_html__('Social Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
                'social_area_bg_color',[
                        'label'     => esc_html__( 'Area BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tm_socail02' => 'background: {{VALUE}}',
                            '{{WRAPPER}} .teamItem02 .tmContent::after' => 'background: {{VALUE}}',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'team_view_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_responsive_control(
                'area_box_radius',
                [
                        'label' => esc_html__( 'Area Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .tm_socail02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'team_view_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'icon_width',
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
                                '{{WRAPPER}} .tm_socail a' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .tm_socail02 a' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'icon_height',
                [
                        'label' => esc_html__( 'Height', 'themewar' ),
                        'type'  => Controls_Manager::SLIDER,
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
                                '{{WRAPPER}} .tm_socail a' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .tm_socail02 a' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'icon_typography',
                        'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .tm_socail a, {{WRAPPER}} .tm_socail02 a',
                ]
        );
        $this->start_controls_tabs( 'ib_box_tot' );
            $this->start_controls_tab(
                'ib_box_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )]
            );
            $this->add_control(
                    'icon_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_socail a' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .tm_socail02 a' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'icon_bg_color',[
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_socail a' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .tm_socail02 a' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_radius',
                    [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .tm_socail a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .tm_socail02 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Css_Filter::get_type(),
                    [
                            'name'      => 'icon_filter',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .tm_socail a, {{WRAPPER}} .tm_socail02 a',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'icon_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .tm_socail a, {{WRAPPER}} .tm_socail02 a',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'ib_box_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )]
            );
            $this->add_control(
                    'icon_hover_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_socail a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .tm_socail02 a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'icon_hover_bg_color',[
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_socail a:hover' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .tm_socail02 a:hover' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_hover_box_radius',
                    [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .tm_socail a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .tm_socail02 a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Css_Filter::get_type(),
                    [
                            'name'      => 'icon_hover_filter',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .tm_socail a:hover, {{WRAPPER}} .tm_socail02 a:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'icon_hover_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .tm_socail a:hover, {{WRAPPER}} .tm_socail02 a:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_author',
            [
                'label'         => esc_html__('Author Name Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
                'au_color',[
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tmContent h5' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'au_hover_color',[
                        'label'     => esc_html__( 'Hover Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tmContent h5 a:hover' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'au_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .tmContent h5',
                ]
        );
        $this->add_control(
                'au_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .tmContent h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_designation',
            [
                'label'         => esc_html__('Designation Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
                'dg_color',[
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tmContent p' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'dg_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .tmContent p',
                ]
        );
        $this->add_control(
                'dg_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .tmContent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_03', [
                    'label'             => esc_html__('Nav Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'team_mode_style',
                                    'operator'  => 'in',
                                    'value'     => ['2'],
                            ],
                            [
                                    'name'      => 'team_slide_nav',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'nav_i_typography',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button'
                    ]
            );
            $this->add_control(
                    'bl_nav_radius',
                    [
                            'label' => esc_html__( 'Nav  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'nav_width',
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
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'nav_height',
                    [
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type'  => Controls_Manager::SLIDER,
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
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'nav_margin',
                    [
                            'label' => esc_html__( 'Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
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
                            'tm_nav_color',
                            [
                                    'label' => esc_html__( 'Nav Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control(
                            'tm_nav_bg',
                            [
                                    'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'tm_nav_bg_shadow',
                                    'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'tm_nav_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button',
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
                            'tm_nav_color_hover',
                            [
                                    'label' => esc_html__( 'Nav Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control(
                            'tm_nav_bg_hover',
                            [
                                    'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'tm_nav_bg_shadow_hover',
                                    'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'tm_nav_bg_border_hover',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-nav button:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_04', [
                    'label'             => esc_html__('Dots Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'team_mode_style',
                                    'operator'  => 'in',
                                    'value'     => ['2'],
                            ],
                            [
                                    'name'      => 'team_slide_dots',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
            $this->add_control(
                    'tm_dots_width',
                    [
                            'label' => esc_html__( 'Dots Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 8,
                                            'max' => 30,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'tm_dots_height',
                    [
                            'label' => esc_html__( 'Dots Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 8,
                                            'max' => 30,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot' => 'height: {{SIZE}}{{UNIT}};'
                            ],
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
                            'tm_dot_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'tm_dot_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'tm_dot_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'dot_styling_tab_hover',
                        [
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                );
                    $this->add_control(
                            'tm_dot_hover_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot:hover' => 'background: {{VALUE}}',
                                            '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot.active' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'tm_dot_hover_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot:hover, {{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot.active',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'tm_dot_hover_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot:hover, {{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot.active',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'tm_dot_margin',
                    [
                            'label' => esc_html__( 'Dots  Gapping', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel button.owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'tm_dots_margin',
                    [
                            'label' => esc_html__( 'Dot Area Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .team_slider_wrap .owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $styles        = (isset($settings['team_view_style']) && $settings['team_view_style'] > 0) ? $settings['team_view_style'] : 1;
        $team_mode     = (isset($settings['team_mode_style']) && $settings['team_mode_style'] > 0) ? $settings['team_mode_style'] : 1;
        $column        = (isset($settings['column']) && $settings['column'] > 0) ? $settings['column'] : 4;
        
        $is_linked   = (isset($settings['team_is_details']) && $settings['team_is_details'] != '') ? $settings['team_is_details'] : 'yes';
        
        $autoplay       = (isset($settings['team_slide_autoplay']) && $settings['team_slide_autoplay'] != '') ? $settings['team_slide_autoplay'] : 'no';
        $loop           = (isset($settings['team_slide_loop']) && $settings['team_slide_loop'] != '') ? $settings['team_slide_loop'] : 'no';
        $nav            = (isset($settings['team_slide_nav']) && $settings['team_slide_nav'] != '') ? $settings['team_slide_nav'] : 'no';
        $dots           = (isset($settings['team_slide_dots']) && $settings['team_slide_dots'] != '') ? $settings['team_slide_dots'] : 'no';
        
        $order          = (isset($settings['order']) && $settings['order'] != '') ? $settings['order'] : 'DESC';
        $order_by       = (isset($settings['order_by']) && $settings['order_by'] != '') ? $settings['order_by'] : 'date';
        $no_of_items    = (isset($settings['no_of_items']) && $settings['no_of_items'] > 0) ? $settings['no_of_items'] : 4;
        
        include  dirname(__FILE__).'/style/team/style'.$team_mode.'.php';
    
    }
    
    protected function content_template() {

    }
}