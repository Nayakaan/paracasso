<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Latest_Blog_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-latest-blog';
    }
    
    public function get_title() {
        return esc_html__( 'Latest Blog Post', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $post_cat = array(
            'orderby'       => 'ID',
            'order'         => 'DESC', 
            'hide_empty'    => 1,
            'hierarchical'  => 1,
            'taxonomy'      => 'category'
        );
        $categories = get_categories( $post_cat );
        $cats = array('0' => esc_html__('All Category', 'themewar'));
        if(is_array($categories) && count($categories) > 0){
            foreach ($categories as $cat){
                $cats[$cat->term_id] = $cat->name;
            }
        }
        
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Blog Post', 'themewar' ),
            ]
        );
            $this->add_control(
                    'lb_category',
                    [
                            'label'         => esc_html__( 'Specific Category', 'themewar' ),
                            'type'          => Controls_Manager::SELECT2,
                            'description'   => esc_html__('Select category to show specific category items.', 'themewar'),
                            'multiple'      => true,
                            'default'       => '0',
                            'options'       => $cats
                    ]
            );
            $this->add_control(
                    'lb_post_style',
                    [
                            'label' => esc_html__( 'Post Style', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 1,
                            'options' => [
                                    1                 => esc_html__( 'Style 01', 'themewar' ),
                                    2                 => esc_html__( 'Style 02', 'themewar' ),
                                    3                 => esc_html__( 'Style 03', 'themewar' ),
                            ],
                    ]
            );
            $this->add_control(
                    'lb_view_style',
                    [
                            'label' => esc_html__( 'View Style', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 1,
                            'options' => [
                                    1                 => esc_html__( 'Fixed', 'themewar' ),
                                    2                 => esc_html__( 'Slide', 'themewar' )
                            ],
                    ]
            );
            $this->add_control(
                    'lb_is_masnry',
                    [
                            'label'             => esc_html__( 'Is Masnry?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to active masnry item?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'lb_view_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
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
                                            'name'      => 'lb_view_style',
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
                                            'name'      => 'lb_view_style',
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
                                            'name'      => 'lb_view_style',
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
                                            'name'      => 'lb_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['2'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'lb_post_item',
                    [
                            'label'         => esc_html__( 'Number Of Item', 'themewar' ),
                            'type'          => Controls_Manager::NUMBER,
                            'min'           => 1,
                            'max'           => 200,
                            'step'          => 1,
                            'default'       => 3,
                            'description'   => esc_html__( 'How many item you want to show.', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'lb_order_by',
                    [
                            'label' => esc_html__( 'Order By', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                    'date'                  => esc_html__( 'Date', 'themewar' ),
                                    'title'                 => esc_html__( 'Title', 'themewar' ),
                                    'rand'                  => esc_html__( 'Random', 'themewar' ),
                                    'comment_count'         => esc_html__( 'Comment', 'themewar' ),
                            ],
                    ]
            );
            $this->add_control(
                    'lb_order',
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
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_03', [
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
        $settings   = $this->get_settings_for_display();
        
        $lb_category    = (isset($settings['lb_category']) && !empty($settings['lb_category'])) ? $settings['lb_category'] : array();

        $lb_post_style  = (isset($settings['lb_post_style']) && $settings['lb_post_style'] > 0) ? $settings['lb_post_style'] : 1;
        
        $lb_view_style  = (isset($settings['lb_view_style']) && $settings['lb_view_style'] > 0) ? $settings['lb_view_style'] : 1;
        $lb_post_item   = (isset($settings['lb_post_item']) && $settings['lb_post_item'] > 0) ? $settings['lb_post_item'] : 3;
        $lb_order_by    = (isset($settings['lb_order_by']) && $settings['lb_order_by'] != '') ? $settings['lb_order_by'] : 'date';
        $lb_order       = (isset($settings['lb_order']) && $settings['lb_order'] != '') ? $settings['lb_order'] : 'desc';
        
        $autoplay       = (isset($settings['lb_slide_autoplay']) && $settings['lb_slide_autoplay'] != '') ? $settings['lb_slide_autoplay'] : 'yes';
        $loop           = (isset($settings['lb_slide_loop']) && $settings['lb_slide_loop'] != '') ? $settings['lb_slide_loop'] : 'yes';
        $nav            = (isset($settings['lb_slide_nav']) && $settings['lb_slide_nav'] != '') ? $settings['lb_slide_nav'] : 'no';
        $dots           = (isset($settings['lb_slide_dots']) && $settings['lb_slide_dots'] != '') ? $settings['lb_slide_dots'] : 'no';
        $lb_is_masnry   = (isset($settings['lb_is_masnry']) && $settings['lb_is_masnry'] != '') ? $settings['lb_is_masnry'] : 'no';

        include dirname(__FILE__).'/style/post/style'.$lb_view_style.'.php';
    }
    
    protected function content_template() {
        
    }
}