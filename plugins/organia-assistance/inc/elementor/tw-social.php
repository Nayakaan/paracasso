<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Social_Widgets extends Widget_Base {
    
    public function get_name() {
        return 'tw-social';
    }
    
    public function get_title() {
        return esc_html__('Social Links', 'themewar');
    }
    
    public function get_icon() {
        return 'eicon-social-icons';
    }
    
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Social Links', 'themewar' ),
            ]
        );
        $this->add_control(
                'fac_url',
                [
                        'label'             => esc_html__( 'Facebook Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                ]
        );
        $this->add_control(
                'ins_url',
                [
                        'label'             => esc_html__( 'Instagram Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                ]
        );
        $this->add_control(
                'lin_url',
                [
                        'label'             => esc_html__( 'Linkedin Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' )
                ]
        );
        $this->add_control(
                'wha_url',
                [
                        'label'             => esc_html__( 'Whatsapp Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                ]
        );
        $this->add_control(
                'twi_url',
                [
                        'label'             => esc_html__( 'Twitter Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                ]
        );
        $this->add_control(
                'pin_url',
                [
                        'label'             => esc_html__( 'Pinterest Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                ]
        );
        $this->add_control(
                'dri_url',
                [
                        'label'             => esc_html__( 'Dribbble Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                ]
        );
        $this->add_control(
                'you_url',
                [
                        'label'             => esc_html__( 'Youtube Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                ]
        );
        $this->add_control(
                'beh_url',
                [
                        'label'             => esc_html__( 'behance Url', 'themewar' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
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
                        'default'                   => 'left',
                        'prefix_class'              => 'info_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('Social Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'icon_box_border_radius',
                [
                        'label'         => esc_html__( 'Border Radius', 'themewar' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', '%', 'em' ],
                        'selectors'     => [
                            '{{WRAPPER}} .conSocial a'    => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .conSocial a' => 'height: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .conSocial a' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'          => 'icon_typography',
                        'label'         => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector'      => '{{WRAPPER}} .conSocial a',
                ]
        );
        $this->add_control(
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .conSocial a'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .conSocial a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'social_bg',
                    [
                            'label'     => esc_html__( 'Background', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .conSocial a' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'social_icon_color',
                    [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .conSocial a'    => 'color: {{VALUE}}',
                            ],
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
                    'social_hover_bg',
                    [
                            'label'     => esc_html__( 'Background', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .conSocial a:hover' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'social_icon_hover_color',
                    [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .conSocial a:hover'    => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        
        $fac_url            = (isset($settings['fac_url']['url']) && $settings['fac_url']['url'] != '') ? $settings['fac_url']['url'] : '';
        $twi_url            = (isset($settings['twi_url']['url']) && $settings['twi_url']['url'] != '') ? $settings['twi_url']['url'] : '';
        $wha_url            = (isset($settings['wha_url']['url']) && $settings['wha_url']['url'] != '') ? $settings['wha_url']['url'] : '';
        $pin_url            = (isset($settings['pin_url']['url']) && $settings['pin_url']['url'] != '') ? $settings['pin_url']['url'] : '';
        $lin_url            = (isset($settings['lin_url']['url']) && $settings['lin_url']['url'] != '') ? $settings['lin_url']['url'] : '';
        $ins_url            = (isset($settings['ins_url']['url']) && $settings['ins_url']['url'] != '') ? $settings['ins_url']['url'] : '';
        $dri_url            = (isset($settings['dri_url']['url']) && $settings['dri_url']['url'] != '') ? $settings['dri_url']['url'] : '';
        $you_url            = (isset($settings['you_url']['url']) && $settings['you_url']['url'] != '') ? $settings['you_url']['url'] : '';
        $beh_url            = (isset($settings['beh_url']['url']) && $settings['beh_url']['url'] != '') ? $settings['beh_url']['url'] : '';
        
        ?>
        <div class="conSocial">
            <?php if($fac_url != ''): ?>
                <a href="<?php echo esc_url($fac_url); ?>"><i class="twi-facebook-f"></i></a>
            <?php endif; ?>
            <?php if($ins_url != ''): ?>
                <a href="<?php echo esc_url($ins_url); ?>"><i class="twi-instagram"></i></a>
            <?php endif; ?>
            <?php if($lin_url != ''): ?>
                <a href="<?php echo esc_url($lin_url); ?>"><i class="twi-linkedin-in"></i></a>
            <?php endif; ?>
            <?php if($twi_url != ''): ?>
                <a href="<?php echo esc_url($twi_url); ?>"><i class="twi-twitter"></i></a>
            <?php endif; ?>
            <?php if($dri_url != ''): ?>
                <a href="<?php echo esc_url($dri_url); ?>"><i class="twi-dribbble"></i></a>
            <?php endif; ?>
            <?php if($beh_url != ''): ?>
                <a href="<?php echo esc_url($beh_url); ?>"><i class="twi-behance"></i></a>
            <?php endif; ?>
            <?php if($pin_url != ''): ?>
                <a href="<?php echo esc_url($pin_url); ?>"><i class="twi-pinterest-p"></i></a>
            <?php endif; ?>
            <?php if($you_url != ''): ?>
                <a href="<?php echo esc_url($you_url); ?>"><i class="twi-youtube"></i></a>
            <?php endif; ?>
            <?php if($wha_url != ''): ?>
                <a href="<?php echo esc_url($wha_url); ?>"><i class="twi-whatsapp"></i></a>
            <?php endif; ?>
        </div>
        <?php
    }
    
    protected function content_template() {
        
    }
}