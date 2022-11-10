<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Funfact_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-fun-facts';
    }
    
    public function get_title() {
        return esc_html__( 'Fun Fact', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__( 'Fun Fact', 'themewar' ),
            ]
        );
        $this->add_control(
                'f_icons',
                [
                        'label'         => esc_html__( 'Icon', 'themewar' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $this->add_control(
                'ff_number',
                [
                        'label'         => esc_html__( 'Fact Amount', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => esc_html__('1544', 'themewar'),
                        'placeholder'   => esc_html__('1544', 'themewar'),
                ]
        );
        $this->add_control(
                'yoe_suffix',
                [
                        'label'         => esc_html__( 'Number Suffix', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'description'   => esc_html__( 'Insert suffix for fact.', 'themewar' ),
                        'default'       => '',
                ]
        );
        $this->add_control(
                'ff_title',
                [
                        'label'         => esc_html__( 'Fact Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => TRUE,
                        'default'       => esc_html__('Satisfied Clients', 'themewar'),
                        'placeholder'   => esc_html__('fact title', 'themewar'),
                ]
        );
        $this->add_control(
            'is_gradian_color',
            [
                'label'        => esc_html__('Is Gradina Color?', 'themewar'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'themewar'),
                'label_off'    => esc_html__('No', 'themewar'),
                'description'  => esc_html__('Do you want to gradian color?', 'themewar'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_responsive_control(
                'ff_alignment', [
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
                        'default'                   => 'left',
                        'prefix_class'              => 'ff_content elementor%s-align-',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Icon Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
        $this->add_control(
            'heading_icon_gr_color',
            [
                'label' => esc_html__('Gradiant Color', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name'     => 'is_gradian_color',
                            'operator' => '==',
                            'value'    => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'wc_icon_gr_color',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms' => [
                                [
                                    'name'     => 'is_gradian_color',
                                    'operator' => '==',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .fibg > i',
                ]
        );
        $this->add_responsive_control(
                'ff_icon_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .fact_01 > i' => 'color: {{VALUE}}',
                        ],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name'     => 'is_gradian_color',
                                    'operator' => '!=',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                ]
        );    
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'ff_icon_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .fact_01 > i',
                ]
        );
        $this->add_responsive_control(
                'ff_icon_margin',
                [
                        'label' => esc_html__( 'Marigns', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .fact_01 > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('Count Number Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
        $this->add_responsive_control(
                'ff_num_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .fact_01 h2' => 'color: {{VALUE}}',
                        ],
                ]
        );    
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'ff_num_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .fact_01 h2',
                ]
        );
        $this->add_responsive_control(
                'ff_num_margin',
                [
                        'label' => esc_html__( 'Marigns', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .fact_01 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
            'heading_un_one',
            [
                'label'     => esc_html__( 'Number Suffix Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
                'heading1_color', [
                        'label'      => esc_html__( 'Color', 'themewar' ),
                        'type'       => Controls_Manager::COLOR,
                        'selectors'  => [
                            '{{WRAPPER}} .fact_01 h2 i' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'heading1_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .fact_01 h2 i',
                ]
        );
        $this->add_responsive_control(
                'mt_margin',
                [
                        'label' => esc_html__( 'Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .fact_01 h2 i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
            'heading_icon_bg_color',
            [
                'label' => esc_html__('Icon BG Color', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms'  => [
                        [
                            'name'     => 'is_gradian_color',
                            'operator' => '==',
                            'value'    => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'icon_bg_color',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name'     => 'is_gradian_color',
                                    'operator' => '==',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .fibg i::after',
                ]
        );
        $this->add_responsive_control(
                'icon_bg_margin',
                [
                        'label' => esc_html__( 'Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .fibg i::after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Fact Title Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        ); 
        $this->add_control(
                'ff_title_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .fact_01 h3' => 'color: {{VALUE}}',
                        ],
                ]
        );    
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'ff_title_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .fact_01 h3',
                ]
        );
        $this->add_control(
                'ff_title_margin',
                [
                        'label' => esc_html__( 'Marigns', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .fact_01 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();

        $ff_number    = (isset($settings['ff_number']) && $settings['ff_number'] != '') ? $settings['ff_number'] : 1544;
        $yoe_suffix   = (isset($settings['yoe_suffix']) && $settings['yoe_suffix'] != '') ? $settings['yoe_suffix'] : '';
        $f_icons      = (isset($settings['f_icons']) && $settings['f_icons'] != '') ? $settings['f_icons'] : 'icon-review';
        $ff_title     = (isset($settings['ff_title']) && $settings['ff_title'] != '') ? $settings['ff_title'] : esc_html__('Satisfied Clients', 'themewar');
        $gradian       = $settings['is_gradian_color'];

        ?>
        <div class="funfact fact_01 <?php if($gradian == 'yes'): ?>fibg<?php endif; ?>" data-count="<?php echo esc_html($ff_number); ?>">
            <?php if($f_icons != ''): ?>
                <i class="<?php echo esc_attr($f_icons); ?>"></i>
            <?php endif; ?>
            <h2><span class="counter"><?php echo esc_html($ff_number); ?></span><?php if($yoe_suffix != ''): ?><i><?php echo esc_html($yoe_suffix); ?></i><?php endif; ?></h2>
            <?php if($ff_title != ''): ?>
                <h3><?php echo esc_html($ff_title); ?></h3>
            <?php endif; ?>
        </div>
        <?php
    }
    
    protected function content_template() {

    }
}