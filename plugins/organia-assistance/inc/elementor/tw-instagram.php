<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class TW_Instagram_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-instagram';
    }
    
    public function get_title() {
        return esc_html__( 'Instagram Gallery', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-gallery-justified';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Instagram', 'themewar' ),
            ]
        );
        $this->add_control(
                'ins_url', [
                    'label'             => esc_html__( 'Instagram URL', 'themewar' ),
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
        $repeater = new Repeater();
        $repeater->add_control(
                'ins_img',
                [
                        'label'         => esc_html__( 'Instagram Image', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Upload your single instagram Image.', 'themewar'),
                ]
        );
        $this->add_control(
                'ins_items',
                [
                        'label'     => esc_html__( 'Image Items', 'themewar' ),
                        'type'      => Controls_Manager::REPEATER,
                        'fields'    => $repeater->get_controls(),
                        'default'   => [
                                [
                                    'ins_img'      => '',
                                ],
                        ],
                        'title_field' => '{{{ "Image Items" }}}',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_9', [
                'label'         => esc_html__( 'Image Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
                'cl_item_padding',
                [
                        'label' => esc_html__( 'Item Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .instagram a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'cl_item_margin',
                [
                        'label' => esc_html__( 'Item Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .instagram a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'image_width',
                [
                        'label' => esc_html__( 'Image Width', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .instagram a' => 'width: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_responsive_control(
                'image_height',
                [
                        'label' => esc_html__( 'Image Height', 'themewar' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .instagram a' => 'height: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
        $this->start_controls_tabs( 'item_styling_tab' );
            $this->start_controls_tab(
                    'item_styling_tab_normal',
                    [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]
            );
            $this->add_responsive_control(
                    'cl_img_opacity',
                    [
                            'label' => esc_html__( 'IMG Opacity', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 1,
                            'step' => .10,
                            'default' => '',
                            'selectors' => [
                                    '{{WRAPPER}} .instagram a img' => 'opacity: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'cl_item_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .instagram a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .instagram img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'cl_item_shadow',
                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .instagram a',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'cl_item_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .instagram a',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'item_styling_tab_hover',
                    [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]
            );
            $this->add_responsive_control(
                    'cl_item_bg_hover',
                    [
                            'label' => esc_html__( 'Hover Overlay Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .instagram a' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'cl_item_Icon_hover',
                    [
                            'label' => esc_html__( 'Hover Icon Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .instagram a::after' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'cl_img_opacity_hover',
                    [
                            'label' => esc_html__( 'IMG Opacity', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 1,
                            'step' => .10,
                            'default' => '',
                            'selectors' => [
                                    '{{WRAPPER}} .instagram a:hover img' => 'opacity: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'cl_item_hover_radius',
                    [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .instagram a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .instagram a:hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'cl_item_shadow_hover',
                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .instagram a:hover',
                    ]
            );
            $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                            'name' => 'cl_item_border_hover',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .instagram a:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $ins_url        = (isset($settings['ins_url']['url']) && $settings['ins_url']['url'] != '') ? $settings['ins_url']['url'] : 'https://www.instagram.com/themewar/';
        $ins_items      = (isset($settings['ins_items']) ? $settings['ins_items'] : array());

        if(!empty($ins_items)): ?>
         <div class="instagram clearfix">
             <?php
             foreach($ins_items as $item):
                 $ins_img     = (isset($item['ins_img']['url']) && $item['ins_img']['url'] != '') ? $item['ins_img']['url'] : 'https://via.placeholder.com/183x141.jpg';
                 if($ins_img != ''):
                     ?>
                     <a <?php if($ins_url != ''): ?> target="_blank" href="<?php echo esc_url($ins_url); ?>"<?php endif; ?>>
                         <img src="<?php echo esc_url($ins_img); ?>" alt="<?php echo esc_attr__('instagram', 'themewar'); ?>">
                     </a>
                     <?php
                 endif;
             endforeach;
             ?>
         </div>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
}