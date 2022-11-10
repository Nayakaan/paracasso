<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Tw_Product_Categories_Widgets extends Widget_Base
{

    public function get_name()
    {
        return 'tw-product-categories';
    }

    public function get_title()
    {
        return esc_html__('Product Category', 'themewar');
    }

    public function get_icon()
    {
        return 'eicon-product-categories';
    }

    public function get_categories()
    {
        return ['organia-elements'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__('Product Category', 'themewar'),
            ]
        );
        $this->add_control(
            'cat_style', [
                'label'     => esc_html__('Category Style', 'themewar'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 1,
                'options'   => [
                    1       => esc_html__('Style 01', 'themewar'),
                    2       => esc_html__('Style 02', 'themewar'),
                    3       => esc_html__('Style 03', 'themewar'),
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control('cat_list_category',  [
                'label' => esc_html__('Product Category', 'themewar'),
                'type' => 'tw_autocomplete',
                'description' => esc_html__('Select category to show specific category product.', 'themewar'),
                'action'      => 'tw_get_taxonomy',
                'taxonomy'      => 'product_cat',
                'multiple'    => false,
                'label_block' => true,
            ]
        );
        $repeater->add_control('list_cat_image', [
                'label' => esc_html__('Custom Image', 'themewar'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );
        $repeater->add_control('list_cat_title', [
                'label' => esc_html__('Custom Title', 'themewar'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('Custom Title', 'themewar'),
            ]
        );
        $repeater->add_control('cat_list_count', [
                'label' => esc_html__('Custom Count', 'themewar'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 15000,
                'step' => 1,
                'default' => '',
                'description' => esc_html__('This option not work category view 01 style.', 'themewar'),
            ]
        );
        $repeater->add_control(
                'item_bg',
                [
                        'label'     => esc_html__( 'BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'description' => esc_html__('This option only work for category view 03 style.', 'themewar'),
                ]
        );
        $repeater->add_control(
                'item_hover_bg',
                [
                        'label'     => esc_html__( 'Hover BG Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'description' => esc_html__('This option only work for category view 03 style.', 'themewar'),
                ]
        );
        $repeater->add_control('list_cat_btn_url', [
                'label' => esc_html__('Custom URL', 'themewar'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'themewar'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                ],
                'description' => esc_html__('Insert your category custome url.', 'themewar'),
            ]
        );
        $this->add_control('cat_list', [
                'label' => esc_html__('Category List', 'themewar'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ list_cat_title }}}',
            ]
        );
        $this->add_control(
            'cat_is_slide', [
                'label' => esc_html__('Is Slider?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to slide your items?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'cat_slide_autoplay', [
                'label' => esc_html__('Is Autoplay?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_is_slide',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'cat_slide_loop', [
                'label' => esc_html__('Is Loop?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_is_slide',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'cat_slide_nav', [
                'label' => esc_html__('Is Nav?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_is_slide',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'cat_slide_dots', [
                'label' => esc_html__('Is Dots?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_is_slide',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__('Box Style', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_box_radius',
            [
                'label' => esc_html__('Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cateImage' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .cateItem02 > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox .hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_padding',
            [
                'label' => esc_html__('Paddings', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cateImage' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cateItem02 > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_margin',
            [
                'label' => esc_html__('Margins', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cateImage' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cateItem02 > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('ib_box_tot');
        $this->start_controls_tab(
            'ib_box_nr', ['label' => esc_html__('Normal', 'themewar')]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_box_bg',
                'label' => esc_html__('Box Background', 'themewar'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .cateImage, {{WRAPPER}} .cateItem02 > a, {{WRAPPER}} .categoryBox',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_box_shadow',
                'label' => esc_html__('Box Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .cateImage, {{WRAPPER}} .cateItem02 > a, {{WRAPPER}} .categoryBox',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__('Box Border', 'themewar'),
                'selector' => '{{WRAPPER}} .cateImage, {{WRAPPER}} .cateItem02 > a, {{WRAPPER}} .categoryBox',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'ib_box_hr', ['label' => esc_html__('Hover', 'themewar')]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_box_bg_hr',
                'label' => esc_html__('Box Background', 'themewar'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .cateImage:hover, {{WRAPPER}} .cateItem02 > a:hover, {{WRAPPER}} .categoryBox:hover .hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_box_shadow_hr',
                'label' => esc_html__('Box Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .cateImage:hover, {{WRAPPER}} .cateItem02 > a:hover, {{WRAPPER}} .categoryBox:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border_hr',
                'label' => esc_html__('Box Border', 'themewar'),
                'selector' => '{{WRAPPER}} .cateImage:hover, {{WRAPPER}} .cateItem02 > a:hover, {{WRAPPER}} .categoryBox:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_image', [
                'label' => esc_html__('Category Image Style', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'img_width',
            [
                'label' => esc_html__('Width', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
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
                    '{{WRAPPER}} .cateImage img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cateItem02 > a img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_height',
            [
                'label' => esc_html__('Height', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
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
                    '{{WRAPPER}} .cateImage img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cateItem02 > a img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_img_box_radius',
            [
                'label' => esc_html__('Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cateImage img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cateItem02 > a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_img_box_padding',
            [
                'label' => esc_html__('Paddings', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cateImage img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cateItem02 > a img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_img_box_margin',
            [
                'label' => esc_html__('Margins', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cateImage img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cateItem02 > a img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .categoryBox img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label' => esc_html__('Category Name Style', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'cat_title_typo',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .cate',
            ]
        );
        $this->add_responsive_control(
            'cat_name_box_padding',
            [
                'label' => esc_html__('Paddings', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cate' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_name_box_radius',
            [
                'label' => esc_html__('Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cate' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('style_tabs_cat');
        $this->start_controls_tab(
            'btn_1_button_style_normal',
            [
                'label' => esc_html__('Normal', 'themewar'),
            ]
        );
        $this->add_responsive_control(
            'btn_1_label_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cate' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_1_bg',
            [
                'label' => esc_html__('BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cate' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .cate',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow',
                'label' => esc_html__('Box Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .cate',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'btn_1_button_style_hover',
            [
                'label' => esc_html__('Hover', 'themewar'),
            ]
        );
        $this->add_responsive_control(
            'btn_label_hover_color',
            [
                'label' => esc_html__('Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cate:hover' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_1_hover_bg',
            [
                'label' => esc_html__('BG Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cate:hover' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hover_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .cate:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_hover_box_shadow',
                'label' => esc_html__('Box Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .cate:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section('section_tab_6', [
                'label' => esc_html__('Count Style', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control('cat_count_color', [
                'label' => esc_html__('Count Color', 'themewar'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cate_content span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .categoryBox span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control('cat_bg_count_color', [
                'label' => esc_html__('Count BG Color', 'themewar'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .categoryBox span' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_style',
                            'operator' => '==',
                            'value' => '3',
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'cat_count_typo',
                'label' => esc_html__('Count Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .cate_content span, {{WRAPPER}} .categoryBox span',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_03', [
                'label' => esc_html__('Nav Styling', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_is_slide',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'cat_slide_dots',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_nav_typography',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button',
            ]
        );
        $this->start_controls_tabs('nav_styling_tab');
        $this->start_controls_tab(
            'nav_styling_tab_normal',
            [
                'label' => esc_html__('Normal', 'themewar'),
            ]
        );
        $this->add_control(
            'cl_nav_color',
            [
                'label' => esc_html__('Nav Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'cl_nav_bg',
            [
                'label' => esc_html__('Nav BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cl_nav_bg_shadow',
                'label' => esc_html__('Boxs Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cl_nav_bg_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button',
            ]
        );
        $this->add_responsive_control(
            'nav_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'nav_styling_tab_hover',
            [
                'label' => esc_html__('Hover', 'themewar'),
            ]
        );
        $this->add_control(
            'cl_nav_color_hover',
            [
                'label' => esc_html__('Nav Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'cl_nav_bg_hover',
            [
                'label' => esc_html__('Nav BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cl_nav_bg_shadow_hover',
                'label' => esc_html__('Boxs Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cl_nav_bg_border_hover',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button:hover',
            ]
        );
        $this->add_responsive_control(
            'nav_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-nav button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_04', [
                'label' => esc_html__('Dots Styling', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_is_slide',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'cat_slide_dots',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'dots_width',
            [
                'label' => esc_html__('Dots Width', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->add_control(
            'dots_height',
            [
                'label' => esc_html__('Dots Height', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->start_controls_tabs('dot_styling_tab');
        $this->start_controls_tab(
            'dot_styling_tab_normal',
            [
                'label' => esc_html__('Normal', 'themewar'),
            ]
        );
        $this->add_control(
            'cl_dot_bg',
            [
                'label' => esc_html__('Dots BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cl_dot_shadow',
                'label' => esc_html__('Dots Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cl_dot_bg_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot',
            ]
        );
        $this->add_responsive_control(
            'dots_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'dot_styling_tab_hover',
            [
                'label' => esc_html__('Hover', 'themewar'),
            ]
        );
        $this->add_control(
            'cl_dot_hover_bg',
            [
                'label' => esc_html__('Dots BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot.active' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cl_dot_hover_shadow',
                'label' => esc_html__('Dots Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot.active',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cl_dot_hover_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot.active',
            ]
        );
        $this->add_responsive_control(
            'dots_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'cl_dot_margin',
            [
                'label' => esc_html__('Dots  Gapping', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_control(
            'cl_dots_margin',
            [
                'label' => esc_html__('Dot Area Margins', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .productCatSliderWrap .owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $cat_style = (isset($settings['cat_style']) && $settings['cat_style'] > 0 ? $settings['cat_style'] : 1);

        $cat_list = (isset($settings['cat_list']) && !empty($settings['cat_list']) ? $settings['cat_list'] : array());

        $cat_is_slide = (isset($settings['cat_is_slide']) && !empty($settings['cat_is_slide']) ? $settings['cat_is_slide'] : 'no');
        $cat_slide_autoplay = (isset($settings['cat_slide_autoplay']) && !empty($settings['cat_slide_autoplay']) ? $settings['cat_slide_autoplay'] : 'yes');
        $cat_slide_loop = (isset($settings['cat_slide_loop']) && !empty($settings['cat_slide_loop']) ? $settings['cat_slide_loop'] : 'yes');
        $cat_slide_nav = (isset($settings['cat_slide_nav']) && !empty($settings['cat_slide_nav']) ? $settings['cat_slide_nav'] : 'no');
        $cat_slide_dots = (isset($settings['cat_slide_dots']) && !empty($settings['cat_slide_dots']) ? $settings['cat_slide_dots'] : 'no');

        include dirname(__FILE__) . '/style/category-slider/style-' . $cat_style . '.php';
    }

    protected function content_template()
    {

    }


}