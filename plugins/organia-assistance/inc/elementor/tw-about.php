<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_About_Widgets extends Widget_Base {
    public function get_name() {
        return 'tw-about';
    }
    public function get_title() {
        return esc_html__('About Us', 'themewar');
    }
    public function get_icon() {
        return 'eicon-wordart';
    }
    public function get_categories() {
        return ['organia-footer-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'About Us', 'themewar' ),
            ]
        );
        $this->add_control(
                'logo_images',
                [
                        'label'         => esc_html__( 'About Logo Image', 'themewar' ),
                        'label_block'   => TRUE,
                        'type'          => Controls_Manager::MEDIA,
                ]
        );
        $this->add_control(
                'widget_content', [
                    'label'             => esc_html__('Widget Content', 'themewar'),
                    'type'              => Controls_Manager::TEXTAREA,
                    'label_block'       => TRUE,
                    'default'           => esc_html__('add description.', 'themewar')
                ]
        );
        $repeaters = new \Elementor\Repeater();
        $repeaters->add_control(
                's_icons',
                [
                        'label'         => esc_html__( 'Social Icon', 'themewar' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $repeaters->add_control(
                's_url', [
                    'label'             => esc_html__( 'Social Url', 'themewar' ),
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
            's_list',[
                    'label'         => esc_html__( 'Social Item', 'themewar' ),
                    'type'          => Controls_Manager::REPEATER,
                    'fields'        => $repeaters->get_controls(),
                    'default'       => [
                            [
                                    's_icons'            => '',
                                    's_url'              => '',
                            ],
                    ],
                    'title_field' => '{{{ s_icons }}}',
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
                        'prefix_class'              => 'about_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label'         => esc_html__( 'Content Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'mt_color', [
                        'label'		 => esc_html__( 'Color', 'themewar' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .aboutWidget p' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'mt_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .aboutWidget p',
                ]
        );
        $this->add_responsive_control(
                'mt_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .aboutWidget p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'mt_margin',
                [
                        'label' => esc_html__( 'Marigns', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .aboutWidget p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Social Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'icon_box_border_radius',
                [
                        'label'         => esc_html__( 'Border Radius', 'themewar' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', '%', 'em' ],
                        'selectors'     => [
                            '{{WRAPPER}} .abSocial a'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_height',
                [
                        'label'      => esc_html__( 'Height', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => 'px',
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 500,
                                        'step' => 1,
                                ],
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .abSocial a' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_width',
                [
                        'label'      => esc_html__( 'Width', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => 'px',
                        'range'      => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 500,
                                        'step' => 1,
                                ],
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .abSocial a' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'          => 'icon_typography',
                        'label'         => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector'      => '{{WRAPPER}} .abSocial a',
                ]
        );
        $this->add_control(
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .abSocial a'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'icon_box_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .abSocial a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs( 'social_styling_tab' );
            $this->start_controls_tab(
                    'social_tab_normal',
                    [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'social_icon_color',
                    [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .abSocial a'    => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'social_bg',
                    [
                            'label'     => esc_html__( 'Background', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .abSocial a' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 's_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .abSocial a',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 's_box_shadow',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .abSocial a',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'social_tab_hover',
                    [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]
            );
            $this->add_control(
                    'social_icon_hover_color',
                    [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .abSocial a:hover'    => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'social_hover_bg',
                    [
                            'label'     => esc_html__( 'Background', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .abSocial a:hover' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name'      => 's_hover_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .abSocial a:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 's_hover_box_shadow',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .abSocial a:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        
        $widget_title       = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        
        $logo_images        = (isset($settings['logo_images']['url']) && $settings['logo_images']['url'] != '') ? $settings['logo_images']['url'] : '';
        $widget_content     = (isset($settings['widget_content']) && $settings['widget_content'] !='') ? $settings['widget_content'] : '';
        
        $s_list             = (isset($settings['s_list']) && !empty($settings['s_list'])) ? $settings['s_list'] : array();
        
        ?>
        <div class="aboutWidget">
            <?php if($logo_images != ''): ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo_images); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
            <?php endif; ?>
            <?php if($widget_content != ''): ?>
                <p><?php echo wp_kses_post($widget_content); ?></p>
            <?php endif; ?>
            <div class="abSocial">
            <?php 
                if(!empty($s_list)):
                    foreach($s_list as $sl):
                        $s_icons      = (isset($sl['s_icons']) ? $sl['s_icons'] : '');
                        $s_url        = (isset($sl['s_url']['url']) ? $sl['s_url']['url'] : '');
                        $target       = $sl['s_url']['is_external'] ? ' target="_blank"' : '' ;
                        $nofollow     = $sl['s_url']['nofollow'] ? ' rel="nofollow"' : '' ;
                        
                        if($s_icons != ''):
                        ?>
                        <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_url($s_url); ?>"><i class="<?php echo esc_attr($s_icons); ?>"></i></a>
                        <?php
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <?php
    }
    
    protected function content_template() {
        
    }
}