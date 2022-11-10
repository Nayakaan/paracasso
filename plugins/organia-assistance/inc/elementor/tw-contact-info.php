<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Contact_Info_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-contact-info';
    }
    
    public function get_title() {
        return esc_html__( 'Contact Info Box', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'organia-footer-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Info Box', 'themewar' ),
            ]
        );
        $this->add_control(
                'icon_box_style',
                [
                        'label'     => esc_html__( 'Box Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Icon Style', 'themewar' ),
                                2       => esc_html__( 'Without Icon Style', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'icons',
                [
                        'label'     => esc_html__( 'Icon', 'themewar' ),
                        'type'      => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                        'conditions'        => [
                            'terms'         => [
                                [
                                        'name'      => 'icon_box_style',
                                        'operator'  => '!in',
                                        'value'     => ['2'],
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
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .contactbox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .infoItem' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .contactbox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .infoItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Icon Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'icon_box_style',
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
                        'selector'  => '{{WRAPPER}} .contactbox i'
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
                                    '{{WRAPPER}} .contactbox i' => 'color: {{VALUE}}',
                            ]
                    ]
            );
            $this->add_control(
                    'icon_box_i_bgcolor',[
                            'label'     => esc_html__( 'Icon BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contactbox i' => 'background: {{VALUE}}',
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
                                    '{{WRAPPER}} .contactbox:hover i' => 'color: {{VALUE}}',
                            ]
                    ]
            );
            $this->add_control(
                    'icon_box_i_bgcolor_hr',[
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contactbox:hover i' => 'background: {{VALUE}}',
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
                            '{{WRAPPER}} .contactbox i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                    '{{WRAPPER}} .contactbox i' => 'width: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .contactbox i' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'icon_box_i__shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contactbox i',
                    ]
            );
            $this->add_control(
                    'icon_box_i_padding',
                    [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .contactbox i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_control(
                    'icon_box_i_margin',
                    [
                            'label' => esc_html__( 'Margins', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .contactbox i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .contactbox h5' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .infoItem span' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'icon_box_title_typo',
                        'label'     => esc_html__( 'Title Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .contactbox h5, {{WRAPPER}} .infoItem span',
                ]
        );
        $this->add_control(
                'icon_box_title_margin',
                [
                        'label'      => esc_html__( 'Title Margin', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .contactbox h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .infoItem span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .contactbox p' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .infoItem' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'icon_box_content_typo',
                        'label'     => esc_html__( 'Content Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .contactbox p, {{WRAPPER}} .infoItem',
                ]
        );
        $this->add_control(
                'icon_box_content_margin',
                [
                        'label'      => esc_html__( 'Content Margin', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .contactbox p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .infoItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings   = $this->get_settings_for_display();
        $icon_box_style  = (isset($settings['icon_box_style']) && $settings['icon_box_style'] > 0) ? $settings['icon_box_style'] : 1;
        $icons      = (isset($settings['icons']) && $settings['icons'] != '') ? $settings['icons'] : 'twi-envelope-open-text2';
        $box_title  = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('Info Title', 'themewar');
        $box_desc   = (isset($settings['box_desc']) && $settings['box_desc'] != '') ? $settings['box_desc'] : '';
        
        if($icon_box_style == 2):
            ?>
            <div class="infoItem"><span><?php echo wp_kses_post($box_title); ?></span> <?php echo wp_kses_post($box_desc); ?></div>
            <?php
        else:
            ?>
            <div class="contactbox">
                <i class="<?php echo esc_attr($icons); ?>"></i>
                <h5><?php echo wp_kses_post($box_title); ?></h5>
                <p><?php echo wp_kses_post($box_desc); ?></p>
            </div>
            <?php
        endif;
        
    }
    
    protected function content_template() {

    }
    
    
}