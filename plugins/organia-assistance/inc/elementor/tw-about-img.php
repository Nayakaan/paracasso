<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_About_Image_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-about-image';
    }
    
    public function get_title() {
        return esc_html__( 'About Image', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
                'section_tab_1',
                [
                    'label'     => esc_html__('Image', 'themewar')
                ]
        );
        $this->add_control(
                'ab_img',
                [
                        'label'         => esc_html__( 'Front Image', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('about rront image', 'themewar'),
                ]
        );
        $this->add_control(
                'bg_img',
                [
                        'label'         => esc_html__( 'Bg Image', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('about bg image.', 'themewar'),
                ]
        );
        $this->add_control(
                'img_animation',
                [
                        'label'   => esc_html__( 'Animation Style', 'themewar' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => '1',
                        'options' => [
                                '1'       => esc_html__( 'No', 'themewar' ),
                                '2'       => esc_html__( 'Top To Bottom', 'themewar' ),
                                '3'       => esc_html__( 'Left To Right', 'themewar' ),
                                '4'       => esc_html__( 'Rotate', 'themewar' ),
                        ],
                ]
        );
        $this->add_responsive_control(
                'text_align', [
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
                        'default'           => 'left',
                        'toggle'            => true,
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label'     => esc_html__( 'Front Image Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'ab_img_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .abThumb img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name'      => 'ab_img_shadow',
                        'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .abThumb img',
                ]
        );
        $this->add_control(
            'ab_img_radius',
            [
                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                            '{{WRAPPER}} .abThumb img'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
                'img_position_left',
                [
                        'label'      => esc_html__( 'Left', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb img' => 'left: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'img_position_top',
                [
                        'label'      => esc_html__( 'Top', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb img' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'img_position_right',
                [
                        'label'      => esc_html__( 'Right', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb img' => 'right: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'img_position_bottom',
                [
                        'label'      => esc_html__( 'Bottom', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb img' => 'bottom: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'ab_f_img_width',
                [
                        'label'      => esc_html__( 'Max Width', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
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
                                '{{WRAPPER}} .abThumb img' => 'max-width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label'     => esc_html__( 'BG Image Styling', 'themewar' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name'      => 'bg_img_shadow',
                        'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .abThumb .abbg',
                ]
        );
        $this->add_control(
            'bg_img_radius',
            [
                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                            '{{WRAPPER}} .abThumb .abbg'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
                'bg_position_left',
                [
                        'label'      => esc_html__( 'Left', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb .abbg' => 'left: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'bg_position_top',
                [
                        'label'      => esc_html__( 'Top', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb .abbg' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'bg_position_right',
                [
                        'label'      => esc_html__( 'Right', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb .abbg' => 'right: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'bg_position_bottom',
                [
                        'label'      => esc_html__( 'Bottom', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range'      => [
                                'px'  => [
                                        'min' => -300,
                                        'max' => 300,
                                ],
                        ],
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .abThumb .abbg' => 'bottom: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'ab_bg_img_width',
                [
                        'label'      => esc_html__( 'Max Width', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
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
                                '{{WRAPPER}} .abThumb .abbg' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                        ],
                ]
        );
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $ab_img     = (isset($settings['ab_img']['url']) && $settings['ab_img']['url'] != '') ? $settings['ab_img']['url'] : '';
        $bg_img     = (isset($settings['bg_img']['url']) && $settings['bg_img']['url'] != '') ? $settings['bg_img']['url'] : '';

        $img_animation = (isset($settings['img_animation']) && $settings['img_animation'] > 0 ? $settings['img_animation'] : 1);
        
        $text_align  = (isset($settings['text_align']) && $settings['text_align'] != '' ? $settings['text_align'] : 'left');

        $c_css = '';
        if($img_animation == 2 ){
            $c_css .= 'move_anim';
        }elseif($img_animation == 3 ){
            $c_css .= 'move_anim2';
        }elseif($img_animation == 4 ){
            $c_css .= 'rotate_anim';
        }else{
            $c_css = '';
        }
        ?>
        <div class="abThumb <?php echo esc_attr($c_css); ?> text-<?php echo esc_attr($text_align); ?>">
            <?php if($bg_img != ''): ?>
                <img class="abbg" src="<?php echo esc_url($bg_img); ?>" alt="<?php echo esc_attr__('Bg Image', 'themewar'); ?>">
            <?php endif; ?>
            <?php if($ab_img != ''): ?>
                <img src="<?php echo esc_url($ab_img); ?>" alt="<?php echo esc_attr__('Front Image', 'themewar'); ?>">
            <?php endif; ?>
        </div>
        <?php
        
        
    }
    
    protected function content_template() {
        
    }
}