<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Team_Meta_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-team-meta';
    }
    
    public function get_title() {
        return esc_html__( 'Team Meta', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Team Meta', 'themewar' ),
            ]
        );
        $this->add_control(
                'pfi_note',
                [
                        'label' => esc_html__( 'Important Note', 'themewar' ),
                        'type' => Controls_Manager::RAW_HTML,
                        'raw' => esc_html__( 'This shortcode specialy build for <strong> Team</strong> details page content.', 'themewar' ),
                        'content_classes' => 'alert alert-warning',
                ]
        );
        $this->add_responsive_control(
                'imgb_align', [
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
                        'prefix_class'              => 'mt_alignment elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_box',
            [
                'label'         => esc_html__('Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .tmt_meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .tmt_meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Designation Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'cont_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tmt_meta .tm_designation' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'cont_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .tmt_meta .tm_designation',
                ]
        );
        $this->add_control(
                'cont_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .tmt_meta .tm_designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3',[
                    'label'         => esc_html__('Author Name Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'title_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tmt_meta h4' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .tmt_meta h4',
                ]
        );
        $this->add_control(
                'title_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .tmt_meta h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4',
            [
                'label'         => esc_html__('Social Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
                'icon_width',
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
                                '{{WRAPPER}} .tm_social a' => 'width: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_control(
                'icon_height',
                [
                        'label' => esc_html__( 'Height', 'themewar' ),
                        'type'  => Controls_Manager::SLIDER,
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
                                '{{WRAPPER}} .tm_social a' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'icon_typography',
                        'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .tm_social a',
                ]
        );
        $this->start_controls_tabs( 'ib_box_tot' );
            $this->start_controls_tab(
                'ib_box_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )]
            );
            $this->add_control(
                    'icon_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_social a' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'icon_bg_color',[
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_social a' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_box_radius',
                    [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .tm_social a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Css_Filter::get_type(),
                    [
                            'name'      => 'icon_filter',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .tm_social a',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'icon_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .tm_social a',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'ib_box_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )]
            );
            $this->add_control(
                    'icon_hover_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_social a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'icon_hover_bg_color',[
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .tm_social a:after' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_hover_box_radius',
                    [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .tm_social a:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Css_Filter::get_type(),
                    [
                            'name'      => 'icon_hover_filter',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .tm_social a:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'icon_hover_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .tm_social a:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        if(is_singular()):
            global $post;
            $post_id = $post->ID;
            if (get_post_type($post_id) == 'team'):
                $post_type = get_post_type($post_id);
                $mem_designation = '';
                $mem_socials     = array();
                if(defined('FW')){
                    $mem_designation = fw_get_db_post_option(get_the_ID(), 'mem_designation', '');
                    $mem_socials     = fw_get_db_post_option(get_the_ID(), 'mem_socials', array());
                }
                ?>
                <div class="tmt_meta">
                    <?php if($mem_designation != ''): ?>
                        <span class="tm_designation"><?php echo esc_html($mem_designation); ?></span>
                    <?php endif; ?>
                    <h4><?php echo get_the_title(); ?></h4>
                    <div class="tm_social">
                        <?php
                            foreach($mem_socials as $ms):
                                $mem_social_url  = (isset($ms['mem_social_url']) && $ms['mem_social_url'] != '') ? $ms['mem_social_url'] : '#';
                                $mem_social_icon = (isset($ms['mem_social_icon']) && $ms['mem_social_icon'] != '') ? $ms['mem_social_icon'] : '#';
                                $social_icon = '';
                                if(isset($mem_social_icon['type']) && $mem_social_icon['type'] != 'custom-upload'):
                                    if(isset($mem_social_icon['icon-class']) && $mem_social_icon['icon-class'] != ''):
                                        $social_icon = $mem_social_icon['icon-class'];
                                    endif;
                                    echo '<a href="'.$mem_social_url.'"><i class="'.$social_icon.'"></i></a>';
                                endif;
                            endforeach;
                        ?>
                    </div>
                </div><?php
            else:
                echo '<div class="alert alert-warning">'.__('This shortcode specialy build for <strong> Team</strong> details page content.', 'themewar').'</div>';
            endif;
        else:
            echo '<div class="alert alert-warning">'.__('This shortcode specialy build for <strong> Team</strong> details page content.', 'themewar').'</div>';
        endif;
    }
    
    protected function content_template() {
        
    }
    
    
}