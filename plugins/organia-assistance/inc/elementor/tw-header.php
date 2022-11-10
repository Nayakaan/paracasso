<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Tw_Header_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'tw-header';
    }

    public function get_title()
    {
        return esc_html__('All Headers', 'themewar');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['organia-elements'];
    }

    public function get_menus()
    {
        $list = array('0' => esc_html('Select Menu', 'themewar'));
        $menus = wp_get_nav_menus();
        foreach ($menus as $menu) {
            $list[$menu->slug] = $menu->name;
        }
        return $list;
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'tw_content_tab',
            [
                'label' => esc_html__('Headers', 'themewar'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'header_style', [
                'label' => esc_html__('Select Header Style', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    1 => esc_html__('Style 01', 'themewar'),
                    2 => esc_html__('Style 02', 'themewar'),
                    3 => esc_html__('Style 03', 'themewar'),
                    4 => esc_html__('Style 04', 'themewar'),
                ],
            ]
        );
        $this->add_control(
            'is_topbar',
            [
                'label' => esc_html__('Is Topbar?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show header topbar?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icons',
            [
                'label' => esc_html__('Info Icon', 'themewar'),
                'type' => Controls_Manager::ICON,
                'label_block' => TRUE,
            ]
        );
        $repeater->add_control(
            'info_text', [
                'label' => esc_html__('Info Text', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => TRUE,
                'placeholder' => esc_html__('info text', 'themewar'),
            ]
        );
        $repeater->add_control(
            'info_url', [
                'label' => esc_html__('Info Url', 'themewar'),
                'type' => Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'themewar'),
                'description' => esc_html__('Do you want to link this info. then insert link?', 'themewar'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'info_list', [
                'label' => esc_html__('Info Item', 'themewar'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icons' => '',
                        'info_text' => '',
                        'info_url' => '',
                    ],
                ],
                'title_field' => '{{{ info_text }}}',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ]
                    ],
                ],
            ]
        );
        $repeaters = new \Elementor\Repeater();
        $repeaters->add_control(
            's_icons',
            [
                'label' => esc_html__('Social Icon', 'themewar'),
                'type' => Controls_Manager::ICON,
                'label_block' => TRUE,
            ]
        );
        $repeaters->add_control(
            's_url', [
                'label' => esc_html__('Social Url', 'themewar'),
                'type' => Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'themewar'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            's_list', [
                'label' => esc_html__('Social Item', 'themewar'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeaters->get_controls(),
                'default' => [
                    [
                        's_icons' => '',
                        's_url' => '',
                    ],
                ],
                'title_field' => '{{{ s_icons }}}',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_location',
            [
                'label' => esc_html__('Is Store Location?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to store location?', 'themewar'),
                'return_value' => 'yes',
                'default'    => 'no',
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'is_topbar',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ]
                    ],
                ],
            ]
        );
        $repeaterss = new \Elementor\Repeater();
        $repeaterss->add_control(
            'flag',
            [
                'label'         => esc_html__('Flag Image', 'themewar'),
                'type'          => Controls_Manager::MEDIA,
                'description'   => esc_html__('Upload your store location flag. Flag size should be 21x21px.', 'themewar'),
            ]
        );
        $repeaterss->add_control(
            'lacation_name', [
                'label' => esc_html__('Location Name', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => TRUE,
                'placeholder' => esc_html__('info text', 'themewar'),
            ]
        );
        $repeaterss->add_control(
            'lacation_url', [
                'label' => esc_html__('Location Url', 'themewar'),
                'type' => Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'themewar'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'location_list', [
                'label'  => esc_html__('Locations Item', 'themewar'),
                'type'   => Controls_Manager::REPEATER,
                'fields' => $repeaterss->get_controls(),
                'default' => [
                    [
                        'flag'              => '',
                        'lacation_name'     => '',
                        'lacation_url'      => '',
                    ],
                ],
                'title_field' => '{{{ lacation_name }}}',
                'conditions' => [
                    'terms'  => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name'     => 'is_location',
                            'operator' => '==',
                            'value'     => 'yes',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_login',
            [
                'label' => esc_html__('Is Login Btn?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show header topbar login btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'login_label', [
                'label' => esc_html__('Login Btn Label', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => TRUE,
                'placeholder' => esc_html__('Login', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_login',
                            'operator' => '==',
                            'value' => 'yes',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'tw_topnav_menu',
            [
                'label' => esc_html__('Select Topbar menu', 'themewar'),
                'type' => Controls_Manager::SELECT,
                'default' => 0,
                'options' => $this->get_menus(),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['3', '4'],
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_middle_header',
            [
                'label' => esc_html__('Is Middle Header?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show header middle?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['2', '3', '4'],
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'md_logo',
            [
                'label' => esc_html__('Logo', 'themewar'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('Upload your site logo. logo size should be 193x76px.', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['2', '3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_search',
            [
                'label' => esc_html__('Is Search?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show search in header middle?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['2', '3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'input_placeholder',
            [
                'label' => esc_html__('Search Input Placeholder', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['2', '3', '4'],
                        ],
                        [
                            'name'     => 'is_middle_header',
                            'operator' => '==',
                            'value'    => 'yes',
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_cat_search',
            [
                'label' => esc_html__('Is Search Category Btn?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show search  category btn in header middle?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['2', '3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_search',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'cat_search_label',
            [
                'label' => esc_html__('Category Btn Label', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'default' => esc_html__('Select a Categories', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['2', '3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_search',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_cat_search',
                            'operator' => '==',
                            'value'   => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_logins',
            [
                'label' => esc_html__('Is Login?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show login btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_wishlists',
            [
                'label' => esc_html__('Is Wishlist?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show wishlist btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_carts',
            [
                'label' => esc_html__('Is Cart?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show cart btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_mini_carts',
            [
                'label' => esc_html__('Is Hover Mini Cart?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show cart btn hover mini cart?', 'themewar'),
                'return_value' => 'yes',
                'default'    => 'no',
                'conditions' => [
                    'terms'  => [
                        [
                            'name' => 'header_style',
                            'operator' => 'in',
                            'value' => ['3', '4'],
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name'      => 'is_carts',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_info_box',
            [
                'label' => esc_html__('Is Info Box?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show info box in header middle?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_gradian_color',
            [
                'label' => esc_html__('Is Gradiant Color?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to gridian color view?', 'themewar'),
                'return_value' => 'yes',
                'default'    => 'no',
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '2',
                        ],
                        [
                            'name'      => 'is_middle_header',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                        [
                            'name'      => 'is_info_box',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_icons',
            [
                'label' => esc_html__('Info Icon', 'themewar'),
                'type' => Controls_Manager::ICON,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_info_box',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_label',
            [
                'label' => esc_html__('Info Label', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_info_box',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_value',
            [
                'label' => esc_html__('Info Value', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_info_box',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_header',
            [
                'label' => esc_html__('Is Main Header?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show main header?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'themewar'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('Upload your site logo. logo size should be 193x76px.', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_category',
            [
                'label' => esc_html__('Is Category Toggler?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show category toggler btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'cat_label',
            [
                'label' => esc_html__('Category Toggler Label', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('All Categories', 'themewar'),
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_category',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'select_category',
            [
                'label' => esc_html__('Select Category', 'themewar'),
                'type' => Controls_Manager::SELECT2,
                'description' => esc_html__('please select category name.', 'themewar'),
                'label_block' => TRUE,
                'multiple' => true,
                'default' => '',
                'options' => organia_category_array('product_cat'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_category',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'cat_rm_label',
            [
                'label' => esc_html__('Category Read More Label', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_category',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'cat_rm_url',
            [
                'label' => esc_html__('Category Read More Url', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_category',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_serch',
            [
                'label' => esc_html__('Is Search?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show search popup form?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'inpul1_placeholder',
            [
                'label' => esc_html__('Search Input Placeholder', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_serch',
                            'operator' => '==',
                            'value'   => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_cat_serch',
            [
                'label' => esc_html__('Is Search Category Btn?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show search category btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_serch',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'ct_btn_label',
            [
                'label' => esc_html__('Category Btn Label', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'default' => esc_html__('Select a Categories', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_cat_serch',
                            'operator' => '==',
                            'value'   => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_wishlist',
            [
                'label' => esc_html__('Is Wishlist?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show wishlist btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_cart',
            [
                'label' => esc_html__('Is Cart?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show cart btn?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_mini_cart',
            [
                'label' => esc_html__('Is Hover Mini Cart?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show cart btn hover mini cart?', 'themewar'),
                'return_value' => 'yes',
                'default'    => 'no',
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '!in',
                            'value' => ['3', '4'],
                        ],
                        [
                            'name'      => 'is_header',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                        [
                            'name'      => 'is_cart',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_info_boxs',
            [
                'label' => esc_html__('Is Info Box?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show info box in header?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ],
                        [
                            'name'      => 'is_header',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_iconss',
            [
                'label' => esc_html__('Info Icon', 'themewar'),
                'type' => Controls_Manager::ICON,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_info_boxs',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_labels',
            [
                'label' => esc_html__('Info Label', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_info_boxs',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'i_values',
            [
                'label' => esc_html__('Info Value', 'themewar'),
                'type' => Controls_Manager::TEXT,
                'label_block' => TRUE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ],
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'is_info_boxs',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'is_sticky',
            [
                'label' => esc_html__('Is Sticky Header?', 'themewar'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'themewar'),
                'label_off' => esc_html__('No', 'themewar'),
                'description' => esc_html__('Do you want to show sticky header?', 'themewar'),
                'return_value' => 'yes',
                'default' => 'no',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_2', [
                'label' => esc_html__('Topbar Style', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'topbar_background',
                'label' => esc_html__('Area Background', 'themewar'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .topbarBG, {{WRAPPER}} .topbar02, {{WRAPPER}} .topbar03',
            ]
        );
        $this->add_responsive_control(
            'top_area_radius',
            [
                'label' => esc_html__('Area Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .topbarBG' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .topbar02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .topbar03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'top_area_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .topbarBG, {{WRAPPER}} .topbar02, {{WRAPPER}} .topbar03',
            ]
        );
        $this->add_responsive_control(
            'info_icon_color_conborder',
            [
                'label' => esc_html__('Container Border Bottom Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .barBottom' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '4',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'top_area_padding',
            [
                'label' => esc_html__('Area Padding', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .topbarBG' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .topbar02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .topbar03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_area_margin',
            [
                'label' => esc_html__('Area Margins', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .topbarBG' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .topbar02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .topbar03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_un_one',
            [
                'label' => esc_html__('Info Item Icon Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'info_icon_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tpdesc p i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .topbar02 p i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .info i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_icon_hover_color',
            [
                'label' => esc_html__('Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_icon_typography',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .tpdesc p i, {{WRAPPER}} .info i, {{WRAPPER}} .topbar02 p i',
            ]
        );
        $this->add_control(
            'heading_un_two',
            [
                'label' => esc_html__('Info Item Text Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'info_text_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tpdesc p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .topbar02 p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .info' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_text_hover_color',
            [
                'label' => esc_html__('Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_text_typography',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .tpdesc p, {{WRAPPER}} .info, {{WRAPPER}} .topbar02 p',
            ]
        );
        $this->add_responsive_control(
            'info_border_color',
            [
                'label' => esc_html__('Border Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tpdesc p' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .info::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'heading_un_three',
            [
                'label' => esc_html__('Social Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_social_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tosocial a' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_social_hover_color',
            [
                'label' => esc_html__('Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tosocial a:hover' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_social_typography',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .tosocial a',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_four',
            [
                'label' => esc_html__('Store Location Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_language_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .office_locations > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .all_off_locations a'  => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name'     => 'header_style',
                            'operator' => '==',
                            'value'    => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_language_icon_color',
            [
                'label' => esc_html__(' Icon Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .office_locations > a:after' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name'     => 'header_style',
                            'operator' => '==',
                            'value'    => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_language_hover_color',
            [
                'label' => esc_html__('Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .office_locations > a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .all_off_locations a:hover'  => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_language_hover_icon_color',
            [
                'label' => esc_html__('Hover Icon Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .office_locations > a:hover:after' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name'     => 'header_style',
                            'operator' => '==',
                            'value'    => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_language_typography',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .office_locations > a',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'language_border_color',
            [
                'label' => esc_html__('Border Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbaccess ul li:last-child::after' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_five',
            [
                'label' => esc_html__('Login Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_login_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .login' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_login_hover_color',
            [
                'label' => esc_html__('Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .login:hover' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_login_typography',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .login',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'login_border_color',
            [
                'label' => esc_html__('Border Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbaccess ul li:last-child::after' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_six',
            [
                'label' => esc_html__('Navigation Menu Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topbar03 .tbaccess ul li a' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_hover_color',
            [
                'label' => esc_html__('Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topbar03 .tbaccess ul li a:hover' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_login_typography',
                'label' => esc_html__('Typography', 'themewar'),
                'selector' => '{{WRAPPER}} .topbar03 .tbaccess ul li a',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_border_color',
            [
                'label' => esc_html__('Border Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .topbar03 .tbaccess ul li:last-child::after' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_topbar',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_03', [
                'label' => esc_html__('Header Middle Styling', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hmiddle_background',
                'label' => esc_html__('Area Background', 'themewar'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .headerMiddle, {{WRAPPER}} .hm02',
            ]
        );
        $this->add_responsive_control(
            'hmiddle_area_radius',
            [
                'label' => esc_html__('Area Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .headerMiddle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .hm02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'hmiddle_area_border',
                'label' => esc_html__('Area Border', 'themewar'),
                'selector' => '{{WRAPPER}} .headerMiddle, {{WRAPPER}} .hm02',
            ]
        );
        $this->add_responsive_control(
            'hmiddle_area_padding',
            [
                'label' => esc_html__('Area Padding', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .headerMiddle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .hm02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'hmiddle_area_margin',
            [
                'label' => esc_html__('Area Margins', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .headerMiddle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .hm02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_un_seven',
            [
                'label' => esc_html__('Logo Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'md_img_width',
            [
                'label' => esc_html__('Width', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'md_img_height',
            [
                'label' => esc_html__('Height', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'hmiddle_logo_padding',
            [
                'label' => esc_html__('Paddings', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_un_eight',
            [
                'label' => esc_html__('Category Search Input Field Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'input_color',
            [
                'label' => esc_html__('Field Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-product input[type="search"]' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .search-product input[type="search"]::-moz-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .search-product input[type="search"]::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .search-product input[type="search"]::-ms-input-placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_border_color',
                'label' => esc_html__('Input Border', 'themewar'),
                'selector' => '{{WRAPPER}} .search-product',
            ]
        );
        $this->add_responsive_control(
            'input_border_radius',
            [
                'label' => esc_html__('Input Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .search-product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_un_nine',
            [
                'label' => esc_html__('Category Select Btn Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'select_color',
            [
                'label' => esc_html__('Select Text Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-category select' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .search-category .nice-select' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'select_icon_color',
            [
                'label' => esc_html__('Select Icon Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-category .nice-select::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'select_bg_color',
            [
                'label' => esc_html__('Select BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-category' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'select_border_color',
                'label' => esc_html__('Select Border', 'themewar'),
                'selector' => '{{WRAPPER}} .search-category',
            ]
        );
        $this->add_responsive_control(
            'select_border_radius',
            [
                'label' => esc_html__('Select Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .search-category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_un_ten',
            [
                'label' => esc_html__('Info Box Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_box_padding',
            [
                'label' => esc_html__('Info Box Area Paddings', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .midIconBox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'heading_icon_gr_color',
            [
                'label' => esc_html__('Info Icon Gradiant Color', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_gradian_color',
                            'operator' => '==',
                            'value' => 'yes',
                        ]
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
                                    'name' => 'is_middle_header',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                                [
                                    'name' => 'header_style',
                                    'operator' => '==',
                                    'value' => '2',
                                ],
                                [
                                    'name' => 'is_gradian_color',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ]
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .hmd05 .midIconBox i',
                ]
        );
        $this->add_responsive_control(
            'info_box_icon_color',
            [
                'label' => esc_html__('Info Icon Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .midIconBox i' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_gradian_color',
                            'operator' => '!=',
                            'value' => 'yes',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'info_box_label_color',
            [
                'label' => esc_html__('Info Label Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .midIconBox h5' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ]
                    ],
                ],
            ]
        );

        $this->add_control(
            'heading_value_gr_color',
            [
                'label' => esc_html__('Info Value Gradiant Color', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                        [
                            'name' => 'is_gradian_color',
                            'operator' => '==',
                            'value' => 'yes',
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'wc_ib_value_gr_color',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'is_middle_header',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                                [
                                    'name' => 'header_style',
                                    'operator' => '==',
                                    'value' => '2',
                                ],
                                [
                                    'name' => 'is_gradian_color',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ]
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .hmd05 .midIconBox p',
                ]
        );
        $this->add_responsive_control(
            'info_box_value_color',
            [
                'label' => esc_html__('Info Value Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .midIconBox p' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '2',
                        ],
                                [
                                    'name' => 'is_gradian_color',
                                    'operator' => '!=',
                                    'value' => 'yes',
                                ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_eleven', [
                'label' => esc_html__('Login / Wishlist / Cart Btn Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->start_controls_tabs('style_login');
        $this->start_controls_tab(
            'login_style_normal',
            [
                'label' => esc_html__('Normal', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'login_label_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_login_bg',
            [
                'label' => esc_html__('BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_login_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .hm02 .accessNav a, {{WRAPPER}} .accessNav a.cartBtn',
            ]
        );
        $this->add_responsive_control(
            'login_count_number_color',
            [
                'label' => esc_html__('Number Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'login_count_numberr_bg',
            [
                'label' => esc_html__('Number BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'login_style_hover',
            [
                'label' => esc_html__('Hover', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_middle_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'login_hover_color',
            [
                'label' => esc_html__('Label Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'login_1_hover_bg',
            [
                'label' => esc_html__('BG Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'login_hover_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .hm02 .accessNav a:hover, {{WRAPPER}} .accessNav a.cartBtn:hover',
            ]
        );
        $this->add_responsive_control(
            'login_count_number_hover_color',
            [
                'label' => esc_html__('Number Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'login_count_number_hover_bg',
            [
                'label' => esc_html__('Number BG Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm02 .accessNav a:hover span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_04', [
                'label' => esc_html__('Main Header Styling', 'themewar'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'header_bg',
            [
                'label' => esc_html__('Header BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header01 .navBar01' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .header02' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .header03' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['4'],
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'header_fourn_bg',
            [
                'label' => esc_html__('Header BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header04 .navBar01' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '4',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'header_right_bg',
            [
                'label' => esc_html__('Header Right BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header03::after' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'header_sticky_bg',
            [
                'label' => esc_html__('Sticky Header BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  header.fixedHeader' => 'background: {{VALUE}}',
                    '{{WRAPPER}}  .fixedHeader.header01 .navBar01' => 'background: {{VALUE}}',
                    '{{WRAPPER}}  header.fixedHeader.header02' => 'background: {{VALUE}}',
                    '{{WRAPPER}}  header.fixedHeader.header03' => 'background: {{VALUE}}',
                    '{{WRAPPER}}  header.fixedHeader.header04 .navBar01' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'header_box_shadow',
                'label' => esc_html__('Box Shadow', 'themewar'),
                'selector' => '{{WRAPPER}} .header01 .navBar01, {{WRAPPER}} .header02, {{WRAPPER}} .header03',
            ]
        );
        $this->add_responsive_control(
            'header_area_radius',
            [
                'label' => esc_html__('Border Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header01 .navBar01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .header02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .header03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'header_area_border',
                'label' => esc_html__('Area Border', 'themewar'),
                'selector' => '{{WRAPPER}} .header01 .navBar01, {{WRAPPER}} .header02, {{WRAPPER}} .header03',
            ]
        );
        $this->add_responsive_control(
            'header_padding',
            [
                'label' => esc_html__('Area Padding', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header01 .navBar01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .header02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .header03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'header_margin',
            [
                'label' => esc_html__('Area Margins', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header01 .navBar01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .header02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .header03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_un_logo', [
                'label' => esc_html__('Logo Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_width', [
                'label' => esc_html__('Width', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_height', [
                'label' => esc_html__('Height', 'themewar'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_border_bg', [
                'label' => esc_html__('Logo Border Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo:after' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_padding', [
                'label' => esc_html__('Paddings', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'is_header',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_catToggler', [
                'label' => esc_html__('Category Toggler Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'catToggler_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .all-categories-dropdown .select' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .select span' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .select span:before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .select span:after' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'catTogglerr_bg',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name' => 'header_style',
                                    'operator' => '!in',
                                    'value' => ['1'],
                                ]
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .all-categories-dropdown .select',
                ]
        );
        $this->add_responsive_control(
            'catToggler_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .all-categories-dropdown .select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['1'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_control(
            'heading_un_menu', [
                'label' => esc_html__('Menu Level 1 Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'menu_color',
            [
                'label' => esc_html__('Menu Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu a.mega-menu-link' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_hover_color',
            [
                'label' => esc_html__('Menu Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu ul li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu ul li.current-menu-item > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li:hover > a.mega-menu-link' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_hover_border_color',
            [
                'label' => esc_html__('Menu Hover Border Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu > ul > li > a:before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a.mega-menu-link > span.mega-indicator::after' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'heading_un_sub_menu', [
                'label' => esc_html__('Menu Level 2 Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'submenu_bg_color',
            [
                'label' => esc_html__('Menu BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu > ul ul' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu li ul.mega-sub-menu' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_border_color',
            [
                'label' => esc_html__('Menu Border Bottom Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu > ul ul' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu li ul.mega-sub-menu' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_color',
            [
                'label' => esc_html__('Menu Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu ul ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu li ul.mega-sub-menu li.mega-menu-item a' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_hover_color',
            [
                'label' => esc_html__('Menu Hover Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu > ul > li > ul li.current-menu-item > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu > ul > li > ul li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu li ul.mega-sub-menu > li.mega-current_page_item > a' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}}  .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu li ul.mega-sub-menu > li.mega-menu-item:hover > a' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_hover_border_color',
            [
                'label' => esc_html__('Menu Hover Border Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mainMenu > ul ul li:hover > a:before' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu li ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link::after' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'heading_un_search', [
                'label' => esc_html__('Search Btn Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'search_border_right_color',
            [
                'label' => esc_html__('Border Right Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav .searchBtn:after' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->start_controls_tabs('style_search');
        $this->start_controls_tab(
            'search_style_normal',
            [
                'label' => esc_html__('Normal', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'search_label_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav .searchBtn' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_search_bg',
            [
                'label' => esc_html__('BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav .searchBtn' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'search_style_hover',
            [
                'label' => esc_html__('Hover', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'search_hover_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav .searchBtn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accessNav .searchBtn.active' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'search_1_hover_bg',
            [
                'label' => esc_html__('BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav .searchBtn:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .accessNav .searchBtn.active' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '==',
                            'value' => '1',
                        ]
                    ],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'heading_un_wc', [
                'label' => esc_html__('Wishlist / Cart Btn Style', 'themewar'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->start_controls_tabs('style_wc');
        $this->start_controls_tab(
            'wc_style_normal',
            [
                'label' => esc_html__('Normal', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'wc_label_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav a.wishlistBtn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'btn_wc_bg',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name'      => 'header_style',
                                    'operator'  => '!in',
                                    'value'     => ['3', '4'],
                                ]
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .accessNav a.wishlistBtn, {{WRAPPER}} .accessNav a.cartBtn',
                ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_wc_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .accessNav a.wishlistBtn, {{WRAPPER}} .accessNav a.cartBtn',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'wc_count_number_color',
            [
                'label' => esc_html__('Number Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav a.wishlistBtn span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn span' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'wc_count_number_bg',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name'      => 'header_style',
                                    'operator'  => '!in',
                                    'value'     => ['3', '4'],
                                ]
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .accessNav a.wishlistBtn span, {{WRAPPER}} .accessNav a.cartBtn span',
                ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'wc_style_hover',
            [
                'label' => esc_html__('Hover', 'themewar'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'wc_label_hover_color',
            [
                'label' => esc_html__('Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav a.wishlistBtn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .shoping_cart:hover a.cartBtn' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'btn_wc_hover_bg',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name'      => 'header_style',
                                    'operator'  => '!in',
                                    'value'     => ['3', '4'],
                                ]
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .accessNav a.wishlistBtn:hover, {{WRAPPER}} .accessNav a.cartBtn:hover, {{WRAPPER}} .shoping_cart:hover a.cartBtn',
                ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_wc_hover_border',
                'label' => esc_html__('Border', 'themewar'),
                'selector' => '{{WRAPPER}} .accessNav a.wishlistBtn:hover, {{WRAPPER}} .accessNav a.cartBtn:hover, {{WRAPPER}} .shoping_cart:hover a.cartBtn',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'wc_hover_count_number_color',
            [
                'label' => esc_html__('Number Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accessNav a.wishlistBtn:hover span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accessNav a.cartBtn:hover span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .shoping_cart:hover a.cartBtn span' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator' => '!in',
                            'value' => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'wc_hover_count_number_bg',
                        'label' => esc_html__( 'Background', 'themewar' ),
                        'types' => [ 'classic', 'gradient'],
                        'conditions' => [
                            'terms'  => [
                                [
                                    'name'      => 'header_style',
                                    'operator'  => '!in',
                                    'value'     => ['3', '4'],
                                ]
                            ],
                        ],
                        'selector' => '{{WRAPPER}} .accessNav a.wishlistBtn:hover span, {{WRAPPER}} .accessNav a.cartBtn:hover span, {{WRAPPER}} .shoping_cart:hover a.cartBtn span',
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'hinfo_box_padding',
            [
                'label' => esc_html__('Info Box Area Paddings', 'themewar'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .midIconBox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'hinfo_box_icon_color',
            [
                'label' => esc_html__('Info Icon Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .midIconBox i' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'hinfo_box_icon_bg_color',
            [
                'label' => esc_html__('Info Icon BG Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .midIconBox i' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'hinfo_box_label_color',
            [
                'label' => esc_html__('Info Label Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .midIconBox h5' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'hinfo_box_value_color',
            [
                'label' => esc_html__('Info Value Color', 'themewar'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .midIconBox p' => 'color: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'header_style',
                            'operator'  => 'in',
                            'value'     => ['3', '4'],
                        ]
                    ],
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $header_style = (isset($settings['header_style']) && $settings['header_style'] > 0) ? $settings['header_style'] : 1;
        $is_topbar = $settings['is_topbar'];
        $info_list = (isset($settings['info_list']) && !empty($settings['info_list'])) ? $settings['info_list'] : array();
        $s_list = (isset($settings['s_list']) && !empty($settings['s_list'])) ? $settings['s_list'] : array();
        $is_login = $settings['is_login'];
        $login_label = $settings['login_label'];
        $is_middle = $settings['is_middle_header'];
        $md_logo = (isset($settings['md_logo']['url']) && $settings['md_logo']['url'] != '') ? $settings['md_logo']['url'] : '';
        $logo = (isset($settings['logo']['url']) && $settings['logo']['url'] != '') ? $settings['logo']['url'] : '';
        $is_search = $settings['is_search'];
        $is_cat_search = $settings['is_cat_search'];
        $cat_search_label  = $settings['cat_search_label'];
        $input_placeholder = $settings['input_placeholder'];

        $is_info_box = $settings['is_info_box'];
        $is_gradian_color = $settings['is_gradian_color'];
        $i_icons = $settings['i_icons'];
        $i_label = $settings['i_label'];
        $i_value = $settings['i_value'];
        $is_header = $settings['is_header'];
        $is_serch = $settings['is_serch'];
        $is_cat_serch = $settings['is_cat_serch'];
        $inpul1_placeholder = $settings['inpul1_placeholder'];
        $ct_btn_label = $settings['ct_btn_label'];

        $is_wishlist = $settings['is_wishlist'];
        $is_cart = $settings['is_cart'];
        $is_mini_cart = $settings['is_mini_cart'];
        $is_sticky = $settings['is_sticky'];
        $is_category = $settings['is_category'];
        $cat_label = (isset($settings['cat_label']) && $settings['cat_label'] != '') ? $settings['cat_label'] : esc_html__('All Categories', 'themewar');
        $select_category = $settings['select_category'];
        $cat_rm_label = $settings['cat_rm_label'];
        $cat_rm_url = $settings['cat_rm_url'];
        $is_logins = $settings['is_logins'];
        $is_wishlists = $settings['is_wishlists'];
        $is_carts = $settings['is_carts'];
        $is_mini_carts = $settings['is_mini_carts'];
        $is_info_boxs = $settings['is_info_boxs'];
        $i_iconss = $settings['i_iconss'];
        $i_labels = $settings['i_labels'];
        $i_values = $settings['i_values'];
        $is_location = $settings['is_location'];
        $location_list = (isset($settings['location_list']) && !empty($settings['location_list'])) ? $settings['location_list'] : array();

        include dirname(__FILE__) . '/style/header/style' . $header_style . '.php';
    }
}