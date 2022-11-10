<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Shape_Image_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-shape-image';
    }
    
    public function get_title() {
        return esc_html__( 'Section Image Shape', 'themewar' );
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
                'shape_img',
                [
                        'label'         => esc_html__( 'Image', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Image size should be 526x526px.', 'themewar'),
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
                'img_width',
                [
                        'label'      => esc_html__( 'Width', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range'      => [
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
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .SecLayerimg img' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'img_height',
                [
                        'label'      => esc_html__( 'Height', 'themewar' ),
                        'type'       => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range'      => [
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
                        'default'   => [],
                        'selectors' => [
                                '{{WRAPPER}} .SecLayerimg img' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'img_postition',
                [
                        'label'   => esc_html__( 'Image Position', 'themewar' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => '1',
                        'options' => [
                                '1'       => esc_html__( 'Left Top', 'themewar' ),
                                '2'       => esc_html__( 'Right Top', 'themewar' ),
                                '3'       => esc_html__( 'Right Bottom', 'themewar' ),
                                '4'       => esc_html__( 'Left Bottom', 'themewar' ),
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Image Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'image_area_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .SecLayerimg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_responsive_control(
                'image_area_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .SecLayerimg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name' => 'icon_box_shadow_hr',
                        'label' => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector' => '{{WRAPPER}} .SecLayerimg img',
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'btn_box_border',
                        'label' => esc_html__( 'Border', 'themewar' ),
                        'selector' => '{{WRAPPER}} .SecLayerimg img',
                ]
        );
        $this->add_control(
            'border_radius',
            [
                    'label' => esc_html__( 'Border Radius', 'themewar' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                            '{{WRAPPER}} .SecLayerimg img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
            ]
        );
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $shape_img     = (isset($settings['shape_img']['url']) && $settings['shape_img']['url'] != '') ? $settings['shape_img']['url'] : '';
        
        $img_animation = (isset($settings['img_animation']) && $settings['img_animation'] > 0 ? $settings['img_animation'] : 1);
        $img_postition = (isset($settings['img_postition']) && $settings['img_postition'] > 0 ? $settings['img_postition'] : 1);
        
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
        $p_css = '';
        if($img_postition == 2 ){
            $p_css .= 'right_top';
        }elseif($img_postition == 3 ){
            $p_css .= 'right_bottom';
        }elseif($img_postition == 4 ){
            $p_css .= 'left_bottom';
        }else{
            $p_css = '';
        }
        ?>
        <div class="SecLayerimg <?php echo esc_attr($c_css); ?> <?php echo esc_attr($p_css); ?> clearfix">
            <img src="<?php echo esc_url($shape_img); ?>" alt="<?php echo esc_html__('Organia', 'themewar'); ?>">
        </div>
        <?php
        
        
    }
    
    protected function content_template() {
        
    }
}