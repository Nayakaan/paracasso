<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Post_Featured_Image_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-post-featured-image';
    }
    
    public function get_title() {
        return esc_html__( 'Post Featured Image', 'themewar' );
    }

    public function get_icon() {
        return ' eicon-featured-image';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
                'section_tab_1',
                [
                    'label'     => esc_html__('Preview', 'themewar')
                ]
        );
            $this->add_control(
                    'pfi_featured_img',
                    [
                            'label'             => esc_html__( 'Current Post Featured Image?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show current post featured image?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'yes',
                    ]
            );
            $this->add_control(
                    'pfi_note',
                    [
                            'label' => esc_html__( 'Important Note', 'themewar' ),
                            'type' => Controls_Manager::RAW_HTML,
                            'raw' => __( 'This shortcode specialy build for <strong>Service, Team Or Post</strong> details page content. If your using this outside of those page then please turn it to No and choose your Custom Image.', 'themewar' ),
                            'content_classes' => 'alert alert-warning',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'pfi_featured_img',
                                            'operator'  => 'in',
                                            'value'     => ['yes'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'pfi_img',
                    [
                            'label'         => esc_html__( 'Custom Image', 'themewar' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Leave blank if you want to show current post featured image. Or upload your custom image', 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'pfi_featured_img',
                                            'operator'  => '!in',
                                            'value'     => ['yes'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control(
                    'pfi_width',
                    [
                            'label' => esc_html__( 'Image Width', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 2000,
                            'step' => 1,
                            'default' => '',
                    ]
            );
            $this->add_control(
                    'pfi_height',
                    [
                            'label' => esc_html__( 'Image Height', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 2000,
                            'step' => 1,
                            'default' => '',
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_img_style', [
                    'label'         => esc_html__('Image Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
            $this->add_control(
                'area_style',
                [
                    'label'     => esc_html__( 'Area Style', 'themewar' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                    'pfi_bg',
                    [
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .featured_image' => 'background-color: {{VALUE}}'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'pfi_border1',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .featured_image',
                    ]
            );
            $this->add_responsive_control(
                'pfi_radius1',
                [
                        'label'      => esc_html__( 'Border Radius', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .featured_image'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                ]
            ); 
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 'pfi_shadow2',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .featured_image',
                    ]
            ); 
            $this->add_responsive_control(
                'pfi_padding',
                [
                        'label'      => esc_html__( 'Paddigs', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .featured_image'       => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                ]
            );   
            $this->add_responsive_control(
                'pfi_margin',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .featured_image'       => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                ]
            );   
            $this->add_control(
                'img_style',
                [
                    'label'     => esc_html__( 'Image Style', 'themewar' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'pfi_border2',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .featured_image img',
                    ]
            );
            $this->add_responsive_control(
                'pfi_radius2',
                [
                        'label'      => esc_html__( 'Border Radius', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .featured_image img'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                ]
            ); 
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name'      => 'pfi_shadow1',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .featured_image img',
                    ]
            );  
            $this->add_responsive_control(
                'img_margin',
                [
                        'label'      => esc_html__( 'Margins', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .featured_image img'       => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                ]
            );  
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $pfi_featured_img        = (isset($settings['pfi_featured_img']) ? $settings['pfi_featured_img'] : 'yes');
        $pfi_img        = (isset($settings['pfi_img']['id']) && $settings['pfi_img']['id'] != '' ? $settings['pfi_img']['id'] : '');
        $pfi_width      = (isset($settings['pfi_width']) && $settings['pfi_width'] > 0 ? $settings['pfi_width'] : 'full');
        $pfi_height      = (isset($settings['pfi_height']) && $settings['pfi_height'] > 0 ? $settings['pfi_height'] : '');
        
        if($pfi_featured_img != 'yes' && $pfi_img > 0):
            echo '<div class="featured_image featured_img_custom">';
                echo '<img src="'.organia_attachment_url($pfi_img, $pfi_width, $pfi_height).'" alt=""/>';    
            echo '</div>';
        else:
            if(is_singular()):
                global $post;
                $post_id = $post->ID;
                if (get_post_type($post_id) == 'service' || get_post_type($post_id) == 'team' || get_post_type($post_id) == 'post'):
                    $post_type = get_post_type($post_id);
                    echo '<div class="featured_image featured_img_'.$post_type.'">';
                        echo '<img src="'.organia_post_thumbnail($post_id, $pfi_width, $pfi_height).'" alt=""/>';    
                    echo '</div>';
                else:
                    echo '<div class="alert alert-warning">'.__('This shortcode specialy build for <strong>Service, Team Or Post</strong> details page content.', 'themewar').'</div>';
                endif;
            else:
                echo '<div class="alert alert-warning">'.__('This shortcode specialy build for <strong>Service, Team Or Post</strong> details page content.', 'themewar').'</div>';
            endif;
        endif;
    }
    
    protected function content_template() {
        
    }
}