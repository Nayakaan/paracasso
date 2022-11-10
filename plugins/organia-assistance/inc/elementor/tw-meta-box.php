<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Meta_Box_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-meta-box';
    }
    
    public function get_title() {
        return esc_html__( 'Services List Meta', 'themewar' );
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
                'label' => esc_html__( 'List Meta', 'themewar' ),
            ]
        );
        $repeaters = new \Elementor\Repeater();
        $repeaters->add_control(
                'sub_title', [
                        'label'         => esc_html__( 'Sub Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => esc_html__( 'List sub title' , 'themewar' ),
                        'label_block'   => true,
                ]
        );
        $repeaters->add_control(
                'twt_title', [
                        'label'         => esc_html__( 'List Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'default'       => esc_html__( 'list title' , 'themewar' ),
                        'label_block'   => true,
                ]
        );
        $repeaters->add_control(
                'title_url', [
                    'label'             => esc_html__( 'URL', 'themewar' ),
                    'type'              => Controls_Manager::URL,
                    'input_type'        => 'url',
                    'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                    'show_external'     => true,
                    'default'           => [
                            'url'            => '',
                            'is_external'    => true,
                            'nofollow'       => true,
                    ],
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'is_active',
                                    'operator'  => '!=',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
        $repeaters->add_control(
                'is_active',
                [
                        'label'             => esc_html__( 'Is Active?', 'themewar' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'themewar' ),
                        'label_off'         => esc_html__( 'No', 'themewar' ),
                        'description'       => esc_html__('Do you want to active this item, then yes.', 'themewar'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_control(
                'twt_list',
                [
                        'label'         => esc_html__( 'List Items', 'themewar' ),
                        'type'          => Controls_Manager::REPEATER,
                        'fields'        => $repeaters->get_controls(),
                        'default'       => [
                                [
                                        'twt_title'       => '',
                                        'sub_title'       => '',
                                        'title_url'       => '',
                                        'is_active'       => 'no',

                                ],
                        ],
                        'title_field' => '{{{ sub_title }}}',
                ]
        );
        $this->add_responsive_control(
                'ser_align', [
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
                        'prefix_class'              => 'ser_alignment elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_box',
            [
                'label'         => esc_html__('Box Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'icon_box_bg',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .servicePost',
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name' => 'icon_box_shadow',
                        'label' => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector' => '{{WRAPPER}} .servicePost',
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'box_border',
                        'label' => esc_html__( 'Border', 'themewar' ),
                        'selector' => '{{WRAPPER}} .servicePost',
                ]
        );
        $this->add_responsive_control(
                'icon_box_radius',
                [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .servicePost' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .servicePost' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .servicePost' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_lItem',[
                    'label'         => esc_html__('List Item Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'l_item_border',
                        'label' => esc_html__( 'Border', 'themewar' ),
                        'selector' => '{{WRAPPER}} .spItem',
                ]
        );
        $this->add_responsive_control(
                'l_item_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .spItem' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'l_item_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .spItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
            'heading_un_one',
            [
                'label'     => esc_html__( 'Active Border Style', 'themewar' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
                'border_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .spItem::after' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'border_width',
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
                            '{{WRAPPER}} .spItem::after' => 'width: {{SIZE}}{{UNIT}};'
                        ],
                ]
        );
        $this->add_responsive_control(
                'border_height',
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
                                '{{WRAPPER}} .spItem::after' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'border_box_radius',
                [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .spItem::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'border_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .spItem::after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Sub Title Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'cont_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .spItem span' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'cont_active_color',
                [
                        'label' => esc_html__( 'Active Item Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .spItem.active span' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'cont_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .spItem span',
                ]
        );
        $this->add_control(
                'cont_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .spItem span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3',[
                    'label'         => esc_html__('Title Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'title_color',
                [
                        'label' => esc_html__( 'Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .spItem h5' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'title_hover_color',
                [
                        'label' => esc_html__( 'Hover Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .spItem h5 a:hover' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'title_active_color',
                [
                        'label' => esc_html__( 'Active Color', 'themewar' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .spItem.active h5' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => esc_html__( 'Typography', 'themewar' ),
                        'selector' => '{{WRAPPER}} .spItem h5',
                ]
        );
        $this->add_control(
                'title_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .spItem h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $twt_list        = (isset($settings['twt_list']) && !empty($settings['twt_list']) ? $settings['twt_list'] : array());
        
        if(count($twt_list) > 0): ?>
            <div class="servicePost">
                <?php 
                $i = 1; 
                foreach ($twt_list as $item):
                    $sub_title  = (isset($item['sub_title'])) ? $item['sub_title'] : '';
                    $twt_title  = (isset($item['twt_title'])) ? $item['twt_title'] : '';
                    $title_url  = (isset($item['title_url']['url'])) ? $item['title_url']['url'] : '';
                    $is_active  = (isset($item['is_active'])) ? $item['is_active'] : 'no';
                ?>
                <div class="spItem <?php if($is_active == 'yes'): ?>active<?php endif; ?>">
                    <?php if($sub_title != ''): ?>
                        <span><?php echo wp_kses_post($sub_title); ?></span>
                    <?php endif; ?>
                    <?php if($twt_title != ''): ?>
                    <h5>
                        <?php if($is_active != 'yes'): ?><a href="<?php echo $title_url; ?>"><?php endif; ?><?php echo wp_kses_post($twt_title); ?><?php if($is_active != 'yes'): ?></a><?php endif; ?>
                    </h5>
                    <?php endif; ?>
                </div>
                <?php 
                $i++;
                endforeach;
                ?>
            </div>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
    
    
}