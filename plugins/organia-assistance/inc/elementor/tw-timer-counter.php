<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Tw_Timer_Counter_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-timer-counter';
    }
    public function get_title() {
        return esc_html__( 'Comingsoon Timer', 'themewar' );
    }
    public function get_icon() {
        return 'eicon-countdown';
    }
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
                'section_tab_1', [
                    'label'     => esc_html__('Comingsoon Timer', 'themewar')
                ]
        );
        $this->add_control(
                'timer_style',
                [
                        'label'         => esc_html__( 'Timer View Style', 'themewar' ),
                        'type'          => Controls_Manager::SELECT,
                        'description'   => esc_html__('Select comingsoon timer style.', 'themewar'),
                        'default'       => 1,
                        'options'       => [
                                1       => esc_html__( 'Style 01', 'themewar' ),
                                2       => esc_html__( 'Style 02', 'themewar' ),
                                3       => esc_html__( 'Style 03', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'c_icons',
                [
                        'label'         => esc_html__( 'Title Icon', 'themewar' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                        'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'timer_style',
                                            'operator'  => '==',
                                            'value'     => '3',
                                    ]
                                ],
                        ],
                ]
        );
        $this->add_control(
            'c_title', [
                'label'             => esc_html__( 'Title', 'themewar' ),
                'type'              => Controls_Manager::TEXTAREA,
                'label_block'       => true,
                'default'           => esc_html__( 'insert count down title.', 'themewar' ),
                'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'timer_style',
                                    'operator'  => '==',
                                    'value'     => '3',
                            ]
                        ],
                ],
            ]
        );
        $this->add_control(
                'opening_date',
                [
                        'label'             => esc_html__( 'Opening Date', 'themewar' ),
                        'type'              => \Elementor\Controls_Manager::DATE_TIME,
                        'picker_options'    => [
                            'enableTime'    => FALSE
                        ],
                ]
        );
        $this->add_responsive_control(
            'counter_align', [
                'label'         => esc_html__( 'Alignment', 'themewar' ),
                'type'          => Controls_Manager::CHOOSE,
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
                'default'            => 'left',
                'prefix_class'       => 'counterAlign elementor%s-align-',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_4',
            [
                'label'         => esc_html__('Time Counter Styling', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'timer_style',
                                    'operator'  => 'in',
                                    'value'     => ['1', '2'],
                            ]
                        ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_one',
            [
                'label'     => esc_html__( 'Counter Number Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
                'v_width',
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
                                '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'width: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
            );
            $this->add_responsive_control(
                'v_height',
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
                                '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'height: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
        );
        $this->add_responsive_control(
                'v_img_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_num_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .commoncount .countdown-section .countdown-amount',
                ]
        );
        $this->add_responsive_control(
                'tm_num_bg_color',
                [
                        'label'     => esc_html__( 'BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}}  .commoncount .countdown-section .countdown-amount' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'tm_num_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}}  .commoncount .countdown-section .countdown-amount' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
            'tm_num_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                            '{{WRAPPER}} .commoncount .countdown-section .countdown-amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_control(
            'heading_un_two',
            [
                'label'     => esc_html__( 'Counter Label Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_lbl_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .commoncount .countdown-section .countdown-period',
                ]
        );
        $this->add_responsive_control(
                'tm_lbl_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .commoncount .countdown-section .countdown-period' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
            'cd_label_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .commoncount .countdown-section .countdown-period' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
            'tm_area_margin',
            [
                    'label' => esc_html__( 'Item Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .commoncount .countdown-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_5',
            [
                'label'         => esc_html__('Counter Styling', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'timer_style',
                                    'operator'  => '==',
                                    'value'     => '3',
                            ]
                        ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_three',
            [
                'label'     => esc_html__( 'Counter Area Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
                'Area_v_width',
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
                                '{{WRAPPER}} .offerexpire' => 'width: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
            );
            $this->add_responsive_control(
                'areav_height',
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
                                '{{WRAPPER}} .offerexpire' => 'height: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
        );
        $this->add_responsive_control(
            'area_padding',
            [
                    'label' => esc_html__( 'Paddings', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .offerexpire' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
                'v_area_radius',
                [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .offerexpire' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->add_responsive_control(
                'tm_area_bg_color',
                [
                        'label'     => esc_html__( 'BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}}  .offerexpire' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
            'heading_un_four',
            [
                'label'     => esc_html__( 'Titel Icon Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_icon_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .offerexpire > p i',
                ]
        );
        $this->add_responsive_control(
                'tm_icon_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .offerexpire > p i' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
            'tm_icon_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .offerexpire > p i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_control(
            'heading_un_five',
            [
                'label'     => esc_html__( 'Title Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm_title_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .offerexpire > p',
                ]
        );
        $this->add_responsive_control(
                'tm_title_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .offerexpire > p' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
            'tm_title_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .offerexpire > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_control(
            'heading_un_six',
            [
                'label'     => esc_html__( 'Number Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'tm3_num_typo',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .countdown_dashboard_two .countdown-section .countdown-amount',
                ]
        );
        $this->add_responsive_control(
                'tm3_num_color',
                [
                        'label'     => esc_html__( 'Number Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .countdown_dashboard_two .countdown-section .countdown-amount' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'tm3_num_cloen_color',
                [
                        'label'     => esc_html__( 'Number Clone Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .countdown_dashboard_two .countdown-section:before' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
            'tm3_num_margin',
            [
                    'label' => esc_html__( 'Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                            '{{WRAPPER}} .countdown_dashboard_two .countdown-section .countdown-amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
            'tm3_area_margin',
            [
                    'label' => esc_html__( 'Item Margins', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .countdown_dashboard_two .countdown-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $timer_style    = (isset($settings['timer_style']) && $settings['timer_style'] != '' ? $settings['timer_style'] : 1);
        $opening_date   = (isset($settings['opening_date']) && $settings['opening_date'] != '' ? $settings['opening_date'] : '');

        $c_icons        = (isset($settings['c_icons']) && $settings['c_icons'] != '') ? $settings['c_icons'] : ''; 
        $c_title        = (isset($settings['c_title']) && $settings['c_title'] != '') ? $settings['c_title'] : ''; 
        
        $timer_id       = uniqid('countdown-timer-'); 
        if($timer_style == 1 && $opening_date != ''): ?>
            <?php
                $d = date('d', strtotime($opening_date));
                $m = date('m', strtotime($opening_date));
                $y = date('Y', strtotime($opening_date));
            ?>
            <div class="countdown_dashboard commoncount white clearfix" id="<?php echo esc_attr($timer_id); ?>" data-day="<?php echo esc_attr($d); ?>" data-month="<?php echo esc_attr($m); ?>" data-year="<?php echo esc_attr($y); ?>"></div>
                        
        <?php elseif($timer_style == 2 && $opening_date != ''): ?>
            <?php
                $d = date('d', strtotime($opening_date));
                $m = date('m', strtotime($opening_date));
                $y = date('Y', strtotime($opening_date));
            ?>
            <div class="countdown_dashboard_three commoncount clearfix" id="<?php echo esc_attr($timer_id); ?>" data-day="<?php echo esc_attr($d); ?>" data-month="<?php echo esc_attr($m); ?>" data-year="<?php echo esc_attr($y); ?>"></div>
        <?php elseif($timer_style == 3 && $opening_date != ''): ?>
            <?php
                $d = date('d', strtotime($opening_date));
                $m = date('m', strtotime($opening_date));
                $y = date('Y', strtotime($opening_date));
        ?>
        <div class="offerexpire">
            <?php if($c_icons || $c_title != ''): ?>
                <p><i class="<?php echo esc_attr($c_icons); ?>"></i><?php echo wp_kses_post($c_title); ?></p>
            <?php endif; ?>
            <div class="countdown_dashboard_two clearfix" id="<?php echo esc_attr($timer_id); ?>" data-day="<?php echo esc_attr($d); ?>" data-month="<?php echo esc_attr($m); ?>" data-year="<?php echo esc_attr($y); ?>"></div>
        </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                <?php echo esc_html__('Insert opening date first.') ?>
            </div>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
}