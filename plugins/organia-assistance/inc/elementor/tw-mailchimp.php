<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Mailchimp_Widgets extends Widget_Base {

    public function get_name() {
        return 'tw-mailchimp';
    }

    public function get_title() {
        return esc_html__( 'Mailchimp From', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-mailchimp';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'Mail Form', 'themewar' ),
            ]
        );
        $this->add_control(
                'mail_form',
                [
                        'label'     => esc_html__( 'Select Form', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => '0',
                        'options'   => organia_easy_mailchimp(),
                ]
        );
        $this->add_control(
                'mail_btn_position',
                [
                        'label'             => esc_html__( 'Button Position', 'themewar' ),
                        'type'              => Controls_Manager::SELECT,
                        'default'           => 1,
                        'label_block'       => true,
                        'options'           => [
                                1       => esc_html__( 'Absolute', 'themewar' ),
                                2       => esc_html__( 'Relative', 'themewar' ),
                        ],
                ]
        );
        $this->add_responsive_control(
            'mail_align', [
                'label'			=> esc_html__( 'Alignment', 'themewar' ),
                'type'			=> Controls_Manager::CHOOSE,
                'options'            => [
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
                'default'		=> 'left',
                'prefix_class'          => 'mail_form elementor%s-align-',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'	 => esc_html__( 'Mail From Style', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                    'input_color',
                    [
                            'label'     => esc_html__( 'Email Field Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]::-moz-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]::-ms-input-placeholder' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'input_opacity',
                    [
                            'label' => esc_html__( 'Placeholder Opacity', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 1,
                            'step' => .10,
                            'default' => '',
                            'selectors' => [
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]'       => 'opacity: {{VALUE}}',
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]::-moz-placeholder'       => 'opacity: {{VALUE}}',
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]::-ms-input-placeholder'  => 'opacity: {{VALUE}}',
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]::-ms-input-placeholder'  => 'opacity: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'input_bg_color',
                    [
                            'label'     => esc_html__( 'Email Field BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 'input_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]',
                    ]
            );
            $this->add_responsive_control(
                    'input_border_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'input_height',
                    [
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 200,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
             $this->add_responsive_control(
                    'input_width',
                    [
                            'label' => esc_html__( 'Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 200,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'input_typography',
                            'label'     => esc_html__( 'Input Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]',
                    ]
            );
            $this->add_responsive_control(
                    'input_paddings',
                    [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'input_margins',
                    [
                            'label' => esc_html__( 'Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                'input_align', [
                    'label'   => esc_html__( 'Alignment', 'themewar' ),
                    'type'    => Controls_Manager::CHOOSE,
                    'options'            => [
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
                    'default'   => 'left',
                    'selectors' => [
                        '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form input[type=email]'   => 'text-align: {{VALUE}};',
                    ],
                ]
            );
        $this->end_controls_section();
        
        
        $this->start_controls_section(
            'section_tab_4',
            [
                'label'         => esc_html__('Button Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'btn_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button',
                ]
        );
        $this->add_responsive_control(
                'btn_paddings',
                [
                        'label'      => esc_html__( 'Paddings', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'btn_margins',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                ]
        );
        $this->add_responsive_control(
                'btn_border_radius',
                [
                        'label'      => esc_html__( 'Border Radius', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'btn_height',
                [
                        'label' => esc_html__( 'Height', 'themewar' ),
                        'type'  => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 200,
                                        'step' => 1,
                                ],
                                '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button'  => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'btn_width',
                [
                        'label'      => esc_html__( 'Width', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 200,
                                        'step' => 1,
                                ],
                                '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button'  => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(), [
                                'name' => 'btn_1_bg_color',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button',
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
                                        '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button:hover'  => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(), [
                                'name' => 'btn_1_bg_hover_color',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .SubsrcribeForm .yikes-easy-mc-form button:hover',
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $mail_form      = (isset($settings['mail_form']) && $settings['mail_form'] != '') ? $settings['mail_form'] : '';
        $position       = (isset($settings['mail_btn_position']) && $settings['mail_btn_position'] > 0) ? $settings['mail_btn_position'] : 1;
        
        $pclass = 'SubsrcribeForm';
        if($position == 2){
            $pclass .= ' btn_position';
        }
        if($mail_form > 0){
            echo '<div class="'.esc_attr($pclass).'">';
                echo do_shortcode('[yikes-mailchimp form="'.$mail_form.'"]');
            echo '</div>';
        }else{
            ?>
            <div class="alert alert-warning" role="alert">
                <?php echo esc_html__('Please Select Mail Chimp Form.', 'themewar'); ?>
            </div>
            <?php
        }
        
    }

    protected function content_template() {

    }    
}