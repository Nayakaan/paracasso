<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Skills_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-skills';
    }
    
    public function get_title() {
        return esc_html__( 'Skills Bar', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__( 'Skills', 'themewar' ),
            ]
        );
        $this->add_control(
                'sk_title',
                [
                        'label'         => esc_html__( 'Skill Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => TRUE,
                        'default'       => esc_html__('Organic Seeding', 'themewar'),
                        'placeholder'   => esc_html__('sk title', 'themewar')
                ]
        );
        $this->add_control(
                'percent',
                [
                        'label'         => esc_html__( 'Precent', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => 92,
                        'placeholder'   => esc_html__('Precent', 'themewar')
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Skill Area Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
        $this->add_control(
                'sk_margin',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .single_skill' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'sk_padding',
                [
                        'label'      => esc_html__( 'Padding', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .single_skill' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5',[
                    'label'     => esc_html__('Skill Title & Percent Number Style', 'themewar'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
            'sk_title_style',
            [
                'label'     => esc_html__( 'Skill Title Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
                'sk_title_color',[
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .single_skill h5' => 'color: {{VALUE}}',
                        ],
                ]
          );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'sk_title_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .single_skill h5',
                ]
        );
        $this->add_control(
                'sk_title_margin',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .single_skill h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
            'count_precent_style',
            [
                'label'     => esc_html__( 'Percent Number Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
                    'percent_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .ss_parent span' => 'color: {{VALUE}}',
                            ],
                    ]
          );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'percent_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .ss_parent span',
                ]
        );
        $this->add_control(
                'percent_margin',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .ss_parent span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_7', [
                    'label'         => esc_html__('Skill Bar Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
        $this->add_control(
            'width',
            [
                    'label' => __( 'Bar Width', 'themewar' ),
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
                            '{{WRAPPER}} .ss_parent' => 'width: {{SIZE}}{{UNIT}};',
                    ],
            ]
        );
        $this->start_controls_tabs( 'style_tabs_10' );
            $this->start_controls_tab(
                    's_5_style_normal',
                    [
                            'label' => esc_html__( 'Normal Color', 'themewar' ),
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'      => 'bar_normal_background',
                            'label'     => esc_html__( 'Background', 'themewar' ),
                            'types'     => [ 'classic', 'gradient'],
                            'selector'  => '{{WRAPPER}} .ss_parent',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'sk_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .ss_parent',
                    ]
            );
            $this->add_control(
                    'sk_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ss_parent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'sk_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .ss_parent',
                    ]
            );
            $this->add_control(
                    'height',
                    [
                            'label' => __( 'Bar Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .ss_parent' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    's_5_style_hover',
                    [
                            'label' => esc_html__( 'Foreground Color', 'themewar' ),
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'      => 'bar_forground_background',
                            'label'     => esc_html__( 'Background', 'themewar' ),
                            'types'     => [ 'classic', 'gradient'],
                            'selector'  => '{{WRAPPER}} .ss_child',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'sk_f_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .ss_child',
                    ]
            );
            $this->add_control(
                    'sk_f_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ss_child' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'sk_f_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .ss_child',
                    ]
            );
            $this->add_control(
                    'sk_f_height',
                    [
                            'label' => __( 'Bar Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .ss_child' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $sk_title       = (isset($settings['sk_title']) && $settings['sk_title'] != '') ? $settings['sk_title'] : esc_html__('Organic Seeding', 'themewar');
        $percent        = (isset($settings['percent']) && $settings['percent'] != '') ? $settings['percent'] : '92';
       

        ?>
        <div class="single_skill" data-parcent="<?php echo esc_attr($percent); ?>">
            <?php if($sk_title != ''): ?>
                <h5><?php echo esc_html($sk_title); ?></h5>
            <?php endif; ?>
            <div class="ss_parent"><div class="ss_child"></div><span><?php echo esc_html($percent).''.esc_html__('%', 'themewar'); ?></span></div>
        </div>
        <?php
    }
    
    protected function content_template() {

    }
}