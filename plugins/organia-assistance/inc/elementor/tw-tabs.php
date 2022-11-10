<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Tabs_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-tabs';
    }
    
    public function get_title() {
        return esc_html__( 'Tabs Block', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="blocks" AND post_status="publish" ORDER BY post_title ASC', OBJECT );
        $shortcodes = array('0' => esc_html__('None', 'themewar'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'Tabs Block', 'themewar' ),
            ]
        );
        $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                    'tab_image',
                    [
                            'label'         => esc_html__( 'Tab Title Image', 'themewar' ),
                            'type'          => Controls_Manager::MEDIA,
                            'label_block'   => TRUE,
                            'description'   => esc_html__('image size should be 50x50px.', 'themewar'),
                    ]
            );
            $repeater->add_control(
                    'tab_title',
                    [
                            'label'         => esc_html__( 'Tab Title Text', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => '',
                            'label_block'   => true,
                            'placeholder'   => esc_html__('Insert tab title', 'themewar')
                    ]
            );
            $repeater->add_control(
                'tab_block',
                [
                        'label'         => esc_html__( 'Select Block', 'themewar' ),
                        'type'          => Controls_Manager::SELECT,
                        'default'       => '0',
                        'label_block'   => true,
                        'options'       => $shortcodes,
                        'description'   => esc_html__('create block from blocks post.', 'themewar'),
                ]
            );
        $this->add_control(
            'list',
            [
                    'label'         => esc_html__( 'Tab Block Item', 'themewar' ),
                    'type'          => Controls_Manager::REPEATER,
                    'fields'        => $repeater->get_controls(),
                    'default'       => [
                            [
                                    'tab_image'       => esc_html__( '', 'themewar' ),
                                    'tab_title'       => esc_html__( '', 'themewar' ),
                                    'tab_block'       => esc_html__( '0', 'themewar' ),

                            ],
                    ],
                    'title_field' => '{{{ tab_title }}}',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2',
            [
                'label'     => esc_html__('Tab Title Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => esc_html__( 'Text Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .organTab li a',
                ]
        );
        $this->add_control(
                't_title_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .organTab li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
            't_title_margin',
            [
                    'label' => esc_html__( 'Item Margins', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                            '{{WRAPPER}} .organTab li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_control(
                't_title_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .organTab li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs( 'style_tabs_3' );
            $this->start_controls_tab(
                    'title_style_normal',
                    [
                            'label'     => esc_html__( 'Normal', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'bg_color',
                    [
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'text_color',
                    [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'title_style_hover',
                    [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'bg_hover_color',
                    [
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a:hover' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'text_hover_color',
                    [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'title_position_left',
                    [
                            'label'      => esc_html__( 'Left', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range'      => [
                                    'px'  => [
                                            'min' => -300,
                                            'max' => 300,
                                    ],
                            ],
                            'default'   => [],
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a:hover' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'title_style_active',
                    [
                            'label' => esc_html__( 'Active', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'bg_active_color',
                    [
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a.active' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'text_active_color',
                    [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a.active' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'title_active_position_left',
                    [
                            'label'      => esc_html__( 'Left', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range'      => [
                                    'px'  => [
                                            'min' => -300,
                                            'max' => 300,
                                    ],
                            ],
                            'default'   => [],
                            'selectors' => [
                                    '{{WRAPPER}} .organTab li a.active' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $list           = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        
        include dirname(__FILE__).'/style/tabs/style1.php';
    }
    
    protected function content_template() {
        
    }
}