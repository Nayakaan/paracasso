<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'tw-text';
    }

    public function get_title() {
        return esc_html__( 'Paragraph', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-text';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__('Paragraph', 'themewar'),
            ]
        );
        $this->add_control(
            'para_content', [
                'label'             => esc_html__( 'Content', 'themewar' ),
                'type'		        => Controls_Manager::TEXTAREA,
                'label_block'       => true,
                'description'       => esc_html__('Use {} for link text.', 'themewar'),
                'default'	        => esc_html__( 'Your text should gose here', 'themewar' ),
            ]
        );
        $this->add_control(
                'para_url', [
                    'label'             => esc_html__( '{} Text URL', 'themewar' ),
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
        $this->add_control(
            'is_gradian_color',
            [
                'label'        => esc_html__('Is Gradiant Color?', 'themewar'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'themewar'),
                'label_off'    => esc_html__('No', 'themewar'),
                'description'  => esc_html__('Do you want to gridian color?', 'themewar'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_responsive_control(
            'para_align', [
                'label'			=> esc_html__( 'Alignment', 'themewar' ),
                'type'			=> Controls_Manager::CHOOSE,
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
                'default'		     => 'center',
                'prefix_class'       => 'pr_paragraphs elementor%s-align-',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'	 => esc_html__( 'Pagraph Styling', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
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
                        'selector' => '{{WRAPPER}} .orga_paragraph.prgrcolor',
                ]
        );
        $this->add_responsive_control(
                'para_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .orga_paragraph' => 'color: {{VALUE}}'
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
                        'name'      => 'para_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .orga_paragraph',
                ]
        );
        $this->add_responsive_control(
                'para_padding',
                [
                        'label'      => esc_html__( 'Paddings', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .orga_paragraph' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->add_responsive_control(
                'para_margin',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .orga_paragraph' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'text_border',
                        'label' => esc_html__( 'Border', 'themewar' ),
                        'selector' => '{{WRAPPER}} .orga_paragraph',
                ]
        );
        $this->add_control(
                'border_radius',
                [
                        'label'      => esc_html__( 'Border Radius', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .orga_paragraph' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_control(
            'para_un_one',
            [
                'label'     => esc_html__( 'Link Text Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
                'para1_color', [
                        'label'      => esc_html__( 'Color', 'themewar' ),
                        'type'       => Controls_Manager::COLOR,
                        'selectors'  => [
                            '{{WRAPPER}} .orga_paragraph a' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_control(
                'para1_hover_color', [
                        'label'      => esc_html__( 'Hover Color', 'themewar' ),
                        'type'       => Controls_Manager::COLOR,
                        'selectors'  => [
                            '{{WRAPPER}} .orga_paragraph a:hover' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'link_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .orga_paragraph a',
                ]
        );
        $this->end_controls_section();
        
    }

    protected function render() {
        $settings       = $this->get_settings_for_display();
        $paras           = (isset($settings['para_content']) && $settings['para_content'] != '') ? $settings['para_content'] : esc_html__( 'Your text should gose here', 'themewar' );
        $is_gradian     = $settings['is_gradian_color'];
        $url            = $settings['para_url']['url'] ? $settings['para_url']['url'] : '';
        $para           = str_replace(['{', '}'], ['<a target="_blank" href="'.esc_url($url).'">', '</a>'], $paras);
        
        if($para != ''): ?><p class="orga_paragraph <?php if($is_gradian == 'yes'): ?>prgrcolor<?php endif; ?>"><?php echo wp_kses_post($para); ?></p><?php endif;
    }

    protected function content_template() {

    }
}
