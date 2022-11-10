<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Sec_Title_Widget extends Widget_Base {
    
    public function get_name() {
        return 'tw-sec-title';
    }

    public function get_title() {
        return esc_html__('Section Title', 'themewar');
    }

    public function get_icon() {
        return 'eicon-site-title';
    }

    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Section Title', 'themewar' ),
            ]
        );
        $this->add_control(
                'sub_text', [
                    'label'             => esc_html__('Sub Title Text', 'themewar'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => TRUE,
                    'default'           => esc_html__('Add Sub Title', 'themewar')
                ]
        );
        $this->add_control(
                'title_text', [
                    'label'             => esc_html__('Main Title Text', 'themewar'),
                    'type'              => Controls_Manager::TEXTAREA,
                    'label_block'       => TRUE,
                    'description'       => esc_html__('Use {} for Different color.', 'themewar'),
                    'default'           => esc_html__('Add Main {Title}', 'themewar')
                ]
        );
        $this->add_responsive_control(
                'st_alignment', [
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
                        'prefix_class'              => 'orga_t_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label'         => esc_html__( 'Sub Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'st_color', [
                        'label'		 => esc_html__( 'Color', 'themewar' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .subTitle' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'st_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .subTitle',
                ]
        );
        $this->add_responsive_control(
                'st_margin',
                [
                        'label' => esc_html__( 'Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .subTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label'         => esc_html__( 'Main Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'mt_color', [
                        'label'		 => esc_html__( 'Color', 'themewar' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .secTitle' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'mt_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .secTitle',
                ]
        );
        $this->add_control(
            'heading_un_one',
            [
                'label'     => esc_html__( 'Different Text Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
                'heading1_color', [
                        'label'      => esc_html__( 'Different Text Color', 'themewar' ),
                        'type'       => Controls_Manager::COLOR,
                        'selectors'  => [
                            '{{WRAPPER}} .secTitle span' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'heading1_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .secTitle span',
                ]
        );
        $this->add_responsive_control(
                'mt_margin',
                [
                        'label' => esc_html__( 'Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .secTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $sub_text       = (isset($settings['sub_text']) && $settings['sub_text'] !='') ? $settings['sub_text'] : '';
        $title          = (isset($settings['title_text']) && $settings['title_text'] !='') ? $settings['title_text'] : esc_html__('Add Main {Title}', 'themewar');
        
        $title_text      = str_replace(['{', '}'], ['<span>', '</span>'], $title);
        
        ?>
        <?php if($sub_text != ''): ?>
            <div class="subTitle sbsm"><?php echo wp_kses_post($sub_text); ?></div>
        <?php endif; ?>
        <?php if($title_text != ''): ?>
            <h2 class="secTitle"><?php echo wp_kses_post($title_text); ?></h2>
        <?php endif; 
    }
    
    protected function content_template() {
        
    }
}