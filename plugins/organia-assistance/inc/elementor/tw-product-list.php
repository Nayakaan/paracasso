<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_product_list_Widget extends Widget_Base {
    public function get_name() {
        return 'tw-product-list';
    }
    public function get_title() {
        return esc_html__('Product List', 'themewar');
    }
    public function get_icon() {
        return 'eicon-product-categories';
    }
    public function get_categories() {
        return ['organia-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Product List', 'themewar' ),
            ]
        );
                $this->add_control( 'pl_title', [
                                'label'         => esc_html__( 'List Title', 'themewar' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__( 'Fruits Items' , 'themewar' ),
                                'label_block'   => true,
                        ]
                );
                $this->add_control('pl_icon_img', [
				'label' => esc_html__( 'List Icon Img', 'plugin-domain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [],
                                'description'   => esc_html__('Image size should be 33x33px. Otherwise it will hard crop to match the design.', 'themewar'),
			]
		);
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control('pl_item_title', [
                                        'label'         => esc_html__( 'Item Title', 'themewar' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => esc_html__( 'Tomatoes' , 'themewar' ),
                                        'label_block'   => true,
                                ]
                        );
                        $repeater->add_control( 'pl_linked_product', [
                                        'label' => esc_html__('Linked Product', 'themewar'),
                                        'type' => 'tw_autocomplete',
                                        'description' => esc_html__('Select specific product.', 'themewar'),
                                        'action' => 'tw_get_post',
                                        'post_type' => 'product',
                                        'multiple' => false
                                ]
                        );
                $this->add_control( 'pl_list', [
                                'label'         => esc_html__( 'List Items', 'themewar' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                                'pl_item_title'       => '',
                                                'pl_linked_product'       => ''

                                        ],
                                ],
                                'title_field' => '{{{ pl_item_title }}}',
                        ]
                );
                $this->add_control('pl_list_img', [
				'label' => esc_html__( 'List Large IMG', 'plugin-domain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [],
                                'description'   => esc_html__('Image should be transparent.', 'themewar'),
			]
		);
                $this->add_control('pl_btn_label', [
                                'label'             => esc_html__('Button Label', 'themewar'),
                                'type'              => Controls_Manager::TEXT,
                                'label_block'       => true,
                                'default'           => esc_html__('Shop Now', 'themewar'),
                        ]
                );
                $this->add_control('pl_btn_url', [
                                'label'             => esc_html__( 'Button URL', 'themewar' ),
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
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Area Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
				'name' => 'pl_area_bg',
				'label' => esc_html__( 'Area Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .riTop',
			]
		);
                $this->add_responsive_control( 'pl_area_radius', [
                                'label' => esc_html__( 'Area Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .riTop' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control( 'pl_area_padding', [
                                'label' => esc_html__( 'Area Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .riTop' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
				'name' => 'pl_area_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .riTop',
			]
		);
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Title Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'pl_title_typo',
                                'label'     => esc_html__('Title Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .ratedItem01 h3',
                        ]
                );
                $this->add_responsive_control( 'pl_title_color', [
                                'label' => esc_html__( 'Title Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ratedItem01 h3'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'pl_title_margin', [
                                'label' => esc_html__( 'Title Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ratedItem01 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control( 'pl_title_image_width', [
				'label' => esc_html__( 'Title Image Width', 'themewar' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .ratedItem01 h3 img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control( 'pl_title_image_height', [
				'label' => esc_html__( 'Title Image Height', 'themewar' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .ratedItem01 h3 img' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control( 'pl_title_img_margin', [
                                'label' => esc_html__( 'Title Image Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .ratedItem01 h3 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('List Item Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'pl_list_item_typo',
                                'label'     => esc_html__('List Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .ratedItem01 ul li',
                        ]
                );
                $this->add_responsive_control( 'pl_list_color', [
                                'label' => esc_html__( 'List Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ratedItem01 ul li'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'pl_list_hover_color', [
                                'label' => esc_html__( 'List Hover Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ratedItem01 ul li a:hover'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'pl_list_bullet_color', [
                                'label' => esc_html__( 'List Bullet Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ratedItem01 ul li:before'   => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'pl_list_item_margin', [
                                'label' => esc_html__( 'List Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ratedItem01 ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                ); 
                $this->add_responsive_control( 'pl_list_margin', [
                                'label' => esc_html__( 'List Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ratedItem01 ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                ); 
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Button Area Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'pl_btn_typo',
                                'label'     => esc_html__('Button Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .btn_tp',
                        ]
                );
                $this->add_responsive_control( 'pl_btn_color', [
                                'label' => esc_html__( 'Button Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .btn_tp'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'pl_btn_hover_color', [
                                'label' => esc_html__( 'Button Hover Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .btn_tp:hover'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'pl_btn_bg_color', [
                                'label' => esc_html__( 'Button BG Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ratedItem01:after'   => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'pl_btn_radius', [
                                'label' => esc_html__( 'Button Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .ratedItem01:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                ); 
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5', [
                    'label'         => esc_html__('Large Image Styling', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_responsive_control( 'pl_large_image_width', [
				'label' => esc_html__( 'Image Width', 'themewar' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					]
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .ratedItem01 .rtlayer' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control( 'pl_large_image_height', [
				'label' => esc_html__( 'Image Height', 'themewar' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					]
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .ratedItem01 .rtlayer' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        $this->add_responsive_control( 'pl_large_image_margin', [
                        'label' => esc_html__( 'Image Margin', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .ratedItem01 .rtlayer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                ]
        );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $pl_title       = (isset($settings['pl_title']) && !empty($settings['pl_title'])) ? $settings['pl_title'] : '';
        $pl_icon_img    = (isset($settings['pl_icon_img']['url']) && !empty($settings['pl_icon_img']['url'])) ? $settings['pl_icon_img']['url'] : '';
        
        $pl_list        = (isset($settings['pl_list']) && !empty($settings['pl_list']) ? $settings['pl_list'] : []);
        $pl_list_img    = (isset($settings['pl_list_img']['url']) && !empty($settings['pl_list_img']['url'])) ? $settings['pl_list_img']['url'] : '';
        
        $pl_btn_label   = (isset($settings['pl_btn_label']) && !empty($settings['pl_btn_label'])) ? $settings['pl_btn_label'] : '';
        $pl_btn_url     = (isset($settings['pl_btn_url']) && !empty($settings['pl_btn_url'])) ? $settings['pl_btn_url'] : [];
        
        $target         = isset($pl_btn_url['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($pl_btn_url['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url        = (isset($pl_btn_url['url']) && $pl_btn_url['url'] != '') ? $pl_btn_url['url'] : '#';
        
        ?>
        <div class="ratedItem01 <?php echo (empty($pl_btn_label) ? 'noBTNS' : ''); ?> <?php echo (empty($pl_list_img) ? 'noIMGS' : ''); ?>">
            <div class="riTop">
                <?php if(!empty($pl_title)): ?>
                <h3><?php echo (!empty($pl_icon_img) ? '<img src="'.$pl_icon_img.'" alt="'.$pl_title.'">': ''); ?><?php echo $pl_title; ?></h3>
                <?php endif; ?>
                <?php if(!empty($pl_list)): ?>
                <ul>
                    <?php 
                        foreach($pl_list as $pls):
                            $pl_item_title = (isset($pls['pl_item_title']) && !empty($pls['pl_item_title']) ? $pls['pl_item_title'] : '');
                            $pl_linked_product = (isset($pls['pl_linked_product']) && $pls['pl_linked_product'] > 0 ? $pls['pl_linked_product'] : 0);
                            if($pl_linked_product > 0):
                                $pl_item_title = (!empty($pl_item_title) ? $pl_item_title : get_the_title($pl_linked_product));
                                echo '<li><a href="'.get_the_permalink($pl_linked_product).'">'.$pl_item_title.'</a></li>';
                            endif;
                        endforeach;
                    ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php if(!empty($pl_btn_label)): ?>
                <a <?php echo esc_attr($target.' '.$nofollow); ?> class="btn_tp" href="<?php echo $btn_url; ?>"><?php echo esc_html($pl_btn_label); ?></a>
            <?php endif; ?>
            <?php if(!empty($pl_list_img)): ?>
                <img class="rtlayer" src="<?php echo esc_url($pl_list_img); ?>" alt="<?php echo esc_url($pl_title); ?>">
            <?php endif; ?>
        </div>
        <?php
    }
    
    protected function content_template() {
        
    }
}