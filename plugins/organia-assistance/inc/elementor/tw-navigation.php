<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Navigation_Widgets extends Widget_Base {

    public function get_name() {
        return 'tw-navigation';
    }

    public function get_title() {
        return esc_html__( 'Navigation Menu', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return ['organia-footer-elements'];
    }

    protected function _register_controls() {
        
        $menu = wp_get_nav_menus();
        $menulist = array('0' => esc_html__('None', 'themewar'));
        if(!empty($menu)){
            foreach ($menu as $mn){
                $menulist[$mn->term_id] = $mn->name;
            }
        }
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'Navigation', 'themewar' ),
            ]
        );
        $this->add_control(
                'nav_style',
                [
                        'label'     => esc_html__( 'Navigation Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Normal Style', 'themewar' ),
                                2       => esc_html__( 'Double Nav', 'themewar' ),
                                3       => esc_html__( 'Copyright Style', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'widget_title', [
                    'label'             => esc_html__('Widget Title', 'themewar'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => TRUE,
                    'default'           => '',
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'nav_style',
                                    'operator'  => '!in',
                                    'value'     => ['3'],
                            ]
                        ],
                    ],
                ]
        );
        $this->add_control(
                'navigation_select',
                [
                        'label'     => esc_html__( 'Select Navigation', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => '0',
                        'options'   => $menulist,
                ]
        );
        $this->add_responsive_control(
            'menu_align', [
                'label'			=> esc_html__( 'Alignment', 'themewar' ),
                'type'			=> Controls_Manager::CHOOSE,
                'options'                => [
                        'left'           => [
                                'title'  => esc_html__( 'Left', 'themewar' ),
                                'icon'   => 'eicon-text-align-left',
                        ],
                        'center'         => [
                                'title'  => esc_html__( 'Center', 'themewar' ),
                                'icon'   => 'eicon-text-align-center',
                        ],
                        'right'          => [
                                'title'  => esc_html__( 'Right', 'themewar' ),
                                'icon'   => 'eicon-text-align-right',
                        ]
                ],
                'default'		        => 'left',
                'prefix_class'          => 'menu_nav elementor%s-align-',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'         => esc_html__( 'Widget Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'        => [
                    'terms'         => [
                        [
                                'name'      => 'nav_style',
                                'operator'  => '!in',
                                'value'     => ['3'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
                'st_color', [
                        'label'		 => esc_html__( 'Color', 'themewar' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .widget_title' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'st_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .widget_title',
                ]
        );
        $this->add_responsive_control(
                'st_margin',
                [
                        'label' => esc_html__( 'Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3',
            [
                'label'         => esc_html__('Navigation Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'area_paddings',
                [
                        'label'      => esc_html__( 'Area Paddings', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'area_magrins',
                [
                        'label'      => esc_html__( 'Area Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'btn_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} ul.menu li',
                ]
        );
        $this->add_responsive_control(
                'list_paddings',
                [
                        'label'      => esc_html__( 'List Item Paddings', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'list_magrins',
                [
                        'label'      => esc_html__( 'List Item Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'nav_item_border_color',
                [
                        'label' => esc_html__( 'Item Border Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .copyright ul li::after' => 'background: {{VALUE}}',
                        ],
                        'conditions'        => [
                            'terms'         => [
                                [
                                        'name'      => 'nav_style',
                                        'operator'  => '==',
                                        'value'     => '3',
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
                $this->add_control(
                        'btn_1_label_color',
                        [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'btn_1_bg_color',
                        [
                                'label' => esc_html__( 'BG Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li' => 'background: {{VALUE}}',
                                ],
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
                                'label' => esc_html__( 'Hover Color', 'themewar' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li a:hover'  => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'btn_1_bg_hover_color',
                        [
                                'label' => esc_html__( 'Hover BG Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li:hover' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        $nav_style              = (isset($settings['nav_style']) && $settings['nav_style'] > 0) ? $settings['nav_style'] : 1;

        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        $navigation_select      = (isset($settings['navigation_select']) && $settings['navigation_select'] != '') ? $settings['navigation_select'] : '';
        
        if($nav_style == 2){
            ?>
            <aside class="widget doubleMenu">
            <?php if($widget_title != ''): ?>
                <h3 class="widget_title"><?php echo wp_kses_post($widget_title); ?></h3>
            <?php endif; 
                wp_nav_menu(array('menu' => $navigation_select));
            ?>
            </aside>
            <?php
        }elseif ($nav_style == 3) { ?>
            <aside class="copyright">
                <?php wp_nav_menu(array('menu' => $navigation_select)); ?>
            </aside>
            <?php
        }else{
            ?>
            <aside class="widget normal">
            <?php if($widget_title != ''): ?>
                <h3 class="widget_title"><?php echo wp_kses_post($widget_title); ?></h3>
            <?php endif; 
                wp_nav_menu(array('menu' => $navigation_select)); ?>
            </aside>
            <?php
        }
        
    }

    protected function content_template() {

    }    
}