<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Headings_Widget extends Widget_Base {
    public function get_name() {
        return 'tw-heading';
    }

    public function get_title() {
        return esc_html__('Headings', 'themewar');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Heading', 'themewar' ),
            ]
        );
        $this->add_control(
                'heading_tag',
                [
                        'label' => esc_html__( 'Tag', 'themewar' ),
                        'type' => Controls_Manager::SELECT,
                        'description'   => esc_html__('Select HTML tag that you want to use.', 'themewar'),
                        'default' => '2',
                        'options' => [
                                '1' => esc_html__( 'H1', 'themewar' ),
                                '2' => esc_html__( 'H2', 'themewar' ),
                                '3' => esc_html__( 'H3', 'themewar' ),
                                '4' => esc_html__( 'H4', 'themewar' ),
                                '5' => esc_html__( 'H5', 'themewar' ),
                                '6' => esc_html__( 'H6', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'heading_text', [
                    'label'             => esc_html__('Heading Text', 'themewar'),
                    'type'              => Controls_Manager::TEXTAREA,
                    'label_block'       => TRUE,
                    'default'           => esc_html__('This is Heading', 'themewar')
                ]
        );
        $this->add_responsive_control(
                'heading_alignment', [
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
                        'prefix_class'              => 'org_heading elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_1', [
                'label'         => esc_html__( 'Heading Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'heading_color', [
                        'label'		 => esc_html__( 'Color', 'themewar' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .org_heading' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'heading_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .org_heading',
                ]
        );
        $this->add_responsive_control(
                'heading_margin',
                [
                        'label' => esc_html__( 'Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .org_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $heading_tag        = (isset($settings['heading_tag']) && $settings['heading_tag'] !='') ? $settings['heading_tag'] : '2';
        $heading_text       = (isset($settings['heading_text']) && $settings['heading_text'] !='') ? $settings['heading_text'] : esc_html__('Organia Heading', 'themewar');
        
        if($heading_text != ''): ?>
            <h<?php echo $heading_tag; ?> class="org_heading"><?php echo wp_kses_post($heading_text); ?></h<?php echo $heading_tag; ?>>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
}