<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Tw_Button_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-button';
    }
    public function get_title() {
        return esc_html__( 'Organia Button', 'themewar' );
    }
    public function get_icon() {
        return 'eicon-button';
    }
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
                'section_tab', [
                    'label'     => esc_html__('Button Content', 'themewar')
                ]
        );
        $this->add_control(
               'btn_label', [
                    'label'             => esc_html__('Button Label', 'themewar'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => true,
                    'default'           => '',
                    'placeholder'       => esc_html__('Inser Button Label', 'themewar'),
                ]
        );
        $this->add_control(
                'btn_icons',
                [
                        'label'         => esc_html__( 'Button Icon', 'themewar' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $this->add_control(
                'btn_icon_position',
                [
                        'label'   => esc_html__( 'Icon Position', 'themewar' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'in_right',
                        'options' => [
                                'in_left'       => esc_html__( 'Left', 'themewar' ),
                                'in_right'      => esc_html__( 'Right', 'themewar' )
                        ],
                ]
        );
        $this->add_control(
                'btn_url', [
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
                ]
        );
        $this->add_responsive_control(
                'btn_align', [
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
                        'prefix_class'              => 'btn_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2',
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
                                        '{{WRAPPER}} .organ_btn'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name'  => 'btn_1_bg',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
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
                                'types' => [ 'classic', 'gradient'],
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
        
        $this->start_controls_section(
            'section_tab_3',
            [
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'btn_icon_typography',
                        'label' => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .organ_btn i',
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
                                    '{{WRAPPER}} .organ_btn i'   => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'  => 'icon_1_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .organ_btn i',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'icon_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .organ_btn i',
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
                                    '{{WRAPPER}} .organ_btn:hover i'   => 'color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name'  => 'icon_1_hover_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .organ_btn:hover i',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'icon_hover_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .organ_btn:hover i',
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
                                    '{{WRAPPER}} .organ_btn i' => 'width: {{SIZE}}{{UNIT}};'
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
                    ],
            ]
        );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();

        $btn_label      = (isset($settings['btn_label']) && $settings['btn_label'] != '') ? $settings['btn_label'] : esc_html__('Click Me', 'themewar');
        $icons          = (isset($settings['btn_icons']) && $settings['btn_icons'] != '') ? '<i class="'.$settings['btn_icons'].'"></i>' : '<i class="twi-arrow-right1"></i>';
        
        $target         = $settings['btn_url']['is_external'] ? ' target="_blank"' : '' ;
        $nofollow       = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '' ;
        $btn_url        = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : '#';
        
        $icon_position  = (isset($settings['btn_icon_position']) && $settings['btn_icon_position'] != '' ? $settings['btn_icon_position'] : 'in_right');
        $btn_html       = ($icon_position == 'in_left' ? $icons : '');
        $btn_html       .= $btn_label;
        $btn_html       .= ($icon_position == 'in_right' ? $icons : '');
        
        ?>
        <a<?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_url($btn_url); ?>" class="organ_btn <?php echo ($icon_position != '' && $icons != '' ? $icon_position : '') ?>"><?php echo wp_kses_post($btn_html); ?></a>
        <?php 
    }
    
    protected function content_template() {
        
    }
            
}