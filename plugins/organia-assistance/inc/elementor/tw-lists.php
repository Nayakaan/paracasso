<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_List_Widget extends Widget_Base {
    public function get_name() {
        return 'tw-lists';
    }
    public function get_title() {
        return esc_html__('List Items', 'themewar');
    }
    public function get_icon() {
        return 'eicon-editor-list-ul';
    }
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'List Items', 'themewar' ),
            ]
        );
        $this->add_control(
                'list_style',
                [
                        'label'     => esc_html__( 'List Style', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                                1       => esc_html__( 'Without BG', 'themewar' ),
                                2       => esc_html__( 'With BG', 'themewar' ),
                                3       => esc_html__( 'Style 03', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
            'is_gradian_color',
            [
                'label' => esc_html__('Icon Is Gradiant Color?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to gridian color in icon?', 'themewar'),
                'return_value' => 'yes',
                'default'    => 'no',
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'list_style',
                            'operator'  => '==',
                            'value'     => '1',
                        ],
                    ],
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
                'twl_icons',
                [
                        'label'         => esc_html__( 'Icon', 'themewar' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $repeater->add_control(
                'twl_title', [
                        'label'         => esc_html__( 'Item Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'default'       => esc_html__( 'item title' , 'themewar' ),
                        'description'   => esc_html__('This option work only list style 03', 'themewar'),
                        'label_block'   => true,
                ]
        );
        $repeater->add_control(
                'twl_items', [
                        'label'         => esc_html__( 'Item Content', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'default'       => esc_html__( 'List Content' , 'themewar' ),
                        'label_block'   => true,
                ]
        );
        $this->add_control(
                'twl_list',
                [
                        'label'         => esc_html__( 'List Items', 'themewar' ),
                        'type'          => Controls_Manager::REPEATER,
                        'fields'        => $repeater->get_controls(),
                        'default'       => [
                                [
                                        'twl_items'       => '',
                                        'twl_title'       => '',
                                        'twl_icons'       => '',

                                ],
                        ],
                        'title_field' => '{{{ twl_items }}}',
                ]
        );
        $this->add_responsive_control(
            'list_align', [
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
                    'prefix_class'              => 'list_align elementor%s-align-',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_2', [
                'label'  => esc_html__( 'Listing Icon', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_icon_gr_color',
            [
                'label' => esc_html__('Icon Gradiant Color', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'list_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'is_gradian_color',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'wc_icon_gr_color',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'list_style',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                                [
                                    'name' => 'is_gradian_color',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .hmd05 .midIconBox i',
                ]
        );
        $this->add_responsive_control(
                'list_icon_color',
                [
                        'label'     => esc_html__( 'Icon Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .listItem li i' => 'color: {{VALUE}}',
                        ],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name' => 'is_gradian_color',
                                    'operator' => '!=',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'list_icon_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .listItem li i',
                ]
        );
        $this->add_responsive_control(
            'list_icon_positioning',
            [
                    'label' => esc_html__( 'Icon Position', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px'],
                    'allowed_dimensions' => ['top', 'bottom'],
                    'selectors' => [
                            '{{WRAPPER}} .listItem li i' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                    ],
            ]
        );
        $this->add_responsive_control(
            'list_icon_margin',
            [
                    'label' => esc_html__( 'Icon Margin', 'themewar' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px'],
                    'allowed_dimensions' => ['left', 'right'],
                    'selectors' => [
                            '{{WRAPPER}} .listItem li i' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_4', [
                'label'  => esc_html__( 'Listing Title', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'list_style',
                                    'operator'  => '==',
                                    'value'     => '3',
                            ]
                        ],
                ],
            ]
        );
        $this->add_responsive_control(
                'list_title_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tm_meta li span' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'list_title_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .tm_meta li span',
                ]
        );
        $this->add_responsive_control(
                'list_title_margin',
                [
                        'label' => esc_html__( 'Marigns', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .tm_meta li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_5', [
                'label'	 => esc_html__( 'List Content Styling', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'twl_color',
                [
                        'label'     => esc_html__( 'Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .listItem li' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_responsive_control(
                'twl_bg_color',
                [
                        'label'     => esc_html__( 'BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .listItem li span' => 'background: {{VALUE}}',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'list_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_responsive_control(
                'twl_bg_radius',
                [
                        'label' => esc_html__( 'Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .listItem li span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'list_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'twl_typography',
                        'label'     => esc_html__( 'Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .listItem li',
                ]
        );
        $this->add_responsive_control(
                'twl_margin',
                [
                        'label' => esc_html__( 'Item Marign', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .listItem li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'twl_padding',
                [
                        'label' => esc_html__( 'Item Padding', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .listItem li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .listItem li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings        = $this->get_settings_for_display();
        $list_style      = (isset($settings['list_style']) && $settings['list_style'] > 0) ? $settings['list_style'] : 1;
        $lists           = (isset($settings['twl_list']) && !empty($settings['twl_list']) ? $settings['twl_list'] : array());
        $is_gradian_color = $settings['is_gradian_color'];
        if($list_style == 2 ):
            if(count($lists) > 0): ?>
                <ul class="listItem withbg">
                    <?php 
                        $i = 1; 
                        foreach ($lists as $item):
                            $icons      = (isset($item['twl_icons'])) ? $item['twl_icons'] : '';
                            $twl_items  = (isset($item['twl_items'])) ? $item['twl_items'] : '';
                        ?>
                        <li><span>
                            <?php if($icons != ''): ?>
                                <i class="<?php echo esc_attr($icons); ?>"></i>
                            <?php endif; ?>
                            <?php echo wp_kses_post($twl_items); ?>
                        </span></li>
                        <?php 
                        $i++;
                        endforeach;
                    ?>
                </ul>
            <?php endif;
        elseif($list_style == 3):
            if(count($lists) > 0): ?>
                <ul class="listItem tm_meta">
                    <?php 
                        $i = 1; 
                        foreach ($lists as $item):
                            $icons      = (isset($item['twl_icons'])) ? $item['twl_icons'] : '';
                            $twl_items  = (isset($item['twl_items'])) ? $item['twl_items'] : '';
                            $twl_title  = (isset($item['twl_title'])) ? $item['twl_title'] : '';
                        ?>
                        <li>
                            <?php if($icons != ''): ?>
                                <i class="<?php echo esc_attr($icons); ?>"></i>
                            <?php endif; ?>
                            <span><?php echo wp_kses_post($twl_title); ?></span>
                            <?php echo wp_kses_post($twl_items); ?>
                        </li>
                        <?php 
                        $i++;
                        endforeach;
                    ?>
                </ul>
            <?php endif;
        else:
            if(count($lists) > 0): ?>
                <ul class="listItem <?php if($is_gradian_color == 'yes'): ?>icGradina<?php endif; ?>">
                    <?php 
                    $i = 1; 
                    foreach ($lists as $item):
                        $icons      = (isset($item['twl_icons'])) ? $item['twl_icons'] : '';
                        $twl_items  = (isset($item['twl_items'])) ? $item['twl_items'] : '';
                    ?>
                    <li>
                        <?php if($icons != ''): ?>
                            <i class="<?php echo esc_attr($icons); ?>"></i>
                        <?php endif; ?>
                        <?php echo wp_kses_post($twl_items); ?>
                    </li>
                    <?php 
                    $i++;
                    endforeach;
                    ?>
                </ul>
            <?php endif;
        endif;
    }
    
    protected function content_template() {
        
    }
}