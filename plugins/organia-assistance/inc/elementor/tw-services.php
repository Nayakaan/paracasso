<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Services_Widget extends Widget_Base {
    public function get_name() {
        return 'tw-services';
    }
    public function get_title() {
        return esc_html__('Services', 'themewar');
    }
    public function get_icon() {
        return 'eicon-slider-full-screen';
    }
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        
        $serv = array(
            'post_type'         => 'service',
            'post_status'       => 'publish',
            'order_by'          => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => -1
        );
        $servs = array();
        query_posts($serv);
            if(have_posts()):
                while (have_posts()):
                    the_post();
                    $servs[get_the_ID()] = get_the_title();
                endwhile;
            endif;
        wp_reset_query();
        
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Service Settings', 'themewar' ),
            ]
        );
        $this->add_control(
                'serv_style',
                [
                        'label'     => esc_html__( 'View Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Grid View', 'themewar' ),
                                2       => esc_html__( 'Slide View', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'grid_column',
                [
                        'label'     => esc_html__( 'Grid Column', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 2,
                        'options'   => [
                                1       => esc_html__( '3 Columns', 'themewar' ),
                                2       => esc_html__( '4 Columns', 'themewar' ),
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'serv_style',
                                        'operator'  => '!in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'serv_specific',
                [
                        'label'         => esc_html__( 'Specific Services', 'themewar' ),
                        'type'          => Controls_Manager::SELECT2,
                        'label_block'   => TRUE,
                        'multiple'      => true,
                        'default'       => array('0'),
                        'options'       => $servs,
                ]
        );
        $this->add_control(
                'serv_post_item',
                [
                        'label'         => esc_html__( 'Number Of Item', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'min'           => 1,
                        'max'           => 500,
                        'step'          => 1,
                        'default'       => 4,
                        'description'   => esc_html__( 'How many item you want to show.', 'themewar' ),
                ]
        );
        $this->add_control(
                'serv_order_by',
                [
                        'label' => esc_html__( 'Order By', 'themewar' ),
                        'type'  => Controls_Manager::SELECT,
                        'default' => 'date',
                        'options' => [
                                'date'                  => esc_html__( 'Date', 'themewar' ),
                                'title'                 => esc_html__( 'Title', 'themewar' ),
                                'rand'                  => esc_html__( 'Random', 'themewar' )
                        ],
                ]
        );
        $this->add_control(
                'serv_order',
                [
                        'label' => esc_html__( 'Order', 'themewar' ),
                        'type'  => Controls_Manager::SELECT,
                        'default' => 'desc',
                        'options' => [
                                'asc'        => esc_html__( 'Ascending', 'themewar' ),
                                'desc'       => esc_html__( 'Descending', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_autoplay',
                [
                        'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'yes',
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'serv_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_loop',
                [
                        'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'yes',
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'serv_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_nav',
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
                                        'name'      => 'serv_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'lb_slide_dots',
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
                                        'name'      => 'serv_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_responsive_control(
                'serv_alignment', [
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
                        'toggle'                    => true,
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_3', [
                'label'     => esc_html__( 'Service Image Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name'      => 'ab_img_shadow',
                        'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .sp_slider.owl-carousel .cateItem02 img, {{WRAPPER}} .fixed_services .cateItem02 img',
                ]
        );
        $this->add_responsive_control(
            'ab_img_radius',
            [
                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .fixed_services .cateItem02 img'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .sp_slider.owl-carousel .cateItem02 img'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
                'service_image_overlay_color',[
                        'label'     => esc_html__( 'Image Hover Animate Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .cateItem02 > a::after' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
            'ab_img_overlay_radius',
            [
                    'label'      => esc_html__( 'Image Hover Animate Color Radius', 'themewar' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .cateItem02 > a::after'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5',[
                    'label'         => esc_html__('Title Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'icon_box_title_color',[
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .cate_content .cate' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'icon_box_hover_title_color',[
                        'label'     => esc_html__( 'Hover Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .cate_content .cate:hover' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'icon_box_title_typo',
                        'label'     => esc_html__( 'Title Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .cate_content .cate',
                ]
        );
        $this->add_control(
                'icon_box_title_margin',
                [
                        'label'      => esc_html__( 'Title Margin', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .cate_content .cate' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_6', [
                    'label'         => esc_html__('Sub Title Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'icon_box_content_color',[
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .cate_content span' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'icon_box_content_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .cate_content span',
                ]
        );
        $this->add_control(
                'icon_box_content_margin',
                [
                        'label'      => esc_html__( 'Margin', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .cate_content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_nav', [
                    'label'             => esc_html__('Nav Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'condition'         => ['lb_slide_nav' => 'yes']
                ]
        );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'nav_i_typography',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button'
                    ]
            );
            $this->add_control(
                    'bl_nav_radius',
                    [
                            'label' => esc_html__( 'Nav  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                            'bl_nav_color',
                            [
                                    'label' => esc_html__( 'Nav Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control(
                            'bl_nav_bg',
                            [
                                    'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_nav_bg_shadow',
                                    'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_nav_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button',
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
                            'bl_nav_color_hover',
                            [
                                    'label' => esc_html__( 'Nav Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_control(
                            'bl_nav_bg_hover',
                            [
                                    'label' => esc_html__( 'Nav BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_nav_bg_shadow_hover',
                                    'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button:hover',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_nav_bg_border_hover',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-nav button:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_04', [
                    'label'             => esc_html__('Dots Styling', 'themewar'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'condition'         => ['lb_slide_dots' => 'yes']
                ]
        );
            $this->add_control(
                    'dots_width',
                    [
                            'label' => esc_html__( 'Dots Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 50,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'dots_height',
                    [
                            'label' => esc_html__( 'Dots Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 50,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button' => 'height: {{SIZE}}{{UNIT}};'
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
                            'bl_dot_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button' => 'background: {{VALUE}}'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_dot_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_dot_bg_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button',
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
                            'bl_dot_hover_bg',
                            [
                                    'label' => esc_html__( 'Dots BG Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button:hover'  => 'background: {{VALUE}}',
                                            '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button.active' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Box_Shadow::get_type(),
                            [
                                    'name' => 'bl_dot_hover_shadow',
                                    'label' => esc_html__( 'Dots Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button:hover, {{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button.active',
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                    'name' => 'bl_dot_hover_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button:hover, {{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button.active',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'bl_dot_radius',
                    [
                            'label' => esc_html__( 'Dots  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'bl_dot_margin',
                    [
                            'label' => esc_html__( 'Dots  Gapping', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
            $this->add_control(
                    'bl_dots_margin',
                    [
                            'label' => esc_html__( 'Dot Area Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .lb_slider_wrap .owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
            );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $serv_style         = (isset($settings['serv_style']) && $settings['serv_style'] !='') ? $settings['serv_style'] : 1;
        
        $column             = (isset($settings['grid_column']) && $settings['grid_column'] > 0) ? $settings['grid_column'] : 2;
        $serv_specific      = (isset($settings['serv_specific']) && !empty($settings['serv_specific'])? $settings['serv_specific'] : array());
        
        $serv_post_item     = (isset($settings['serv_post_item']) && $settings['serv_post_item'] > 0 ) ? $settings['serv_post_item'] : 4;
        $serv_order_by      = (isset($settings['serv_order_by']) && $settings['serv_order_by'] != '' ) ? $settings['serv_order_by'] : 'date';
        $serv_order         = (isset($settings['serv_order']) && $settings['serv_order'] != '' ) ? $settings['serv_order'] : 'desc';
        
        $align              = (isset($settings['serv_alignment'])) && $settings['serv_alignment'] != '' ? $settings['serv_alignment']  : 'center';

        $autoplay       = (isset($settings['lb_slide_autoplay']) && $settings['lb_slide_autoplay'] != '') ? $settings['lb_slide_autoplay'] : 'yes';
        $loop           = (isset($settings['lb_slide_loop']) && $settings['lb_slide_loop'] != '') ? $settings['lb_slide_loop'] : 'yes';
        $nav            = (isset($settings['lb_slide_nav']) && $settings['lb_slide_nav'] != '') ? $settings['lb_slide_nav'] : 'no';
        $dots           = (isset($settings['lb_slide_dots']) && $settings['lb_slide_dots'] != '') ? $settings['lb_slide_dots'] : 'no';
        
        if($column == 2):
            $columns = 'col-lg-3 col-md-6';
        else:
            $columns = 'col-lg-4 col-md-6';
        endif;
        
        include dirname(__FILE__).'/style/services/style'.$serv_style.'.php';
    }
    
    protected function content_template() {
        
    }
}