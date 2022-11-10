<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Google_Map_Widget extends Widget_Base {
    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
        
        $map_api_code = get_theme_mod('map_api', '');
        $apic = ($map_api_code != '') ? '?key=' . $map_api_code : '';
        wp_register_script( 'maps-google-api', 'https://maps.google.com/maps/api/js'.$apic, array('jquery'), '', TRUE );
        wp_enqueue_script('gmaps', plugins_url('/organia-assistance/assets/js/gmaps.js'), array('maps-google-api'), '', TRUE);
    }
    
    public function get_script_depends() {
        return [ 'maps-google-api', 'gmaps' ];
    }
   
    public function get_name() {
        return 'tw-google-map';
    }

    public function get_title() {
        return esc_html__( 'Google Map', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return [ 'organia-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Google Map', 'themewar' ),
            ]
        );
        $this->add_control(
                'map_mode',
                [
                        'label'             => esc_html__( 'Map Mode', 'themewar' ),
                        'type'              => Controls_Manager::SELECT,
                        'default'           => 1,
                        'label_block'       => true,
                        'options' => [
                                1       => esc_html__( 'Ifram', 'themewar' ),
                                2       => esc_html__( 'Custom', 'themewar' ),
                        ],
                ]
        );
        $this->add_control(
                'map_address',
                [
                        'label'             => esc_html__( 'Address', 'themewar' ),
                        'type'              => Controls_Manager::TEXTAREA,
                        'label_block'       => true,
                        'default'           => '1 Grafton Street, Dublin, Ireland',
                        'placeholder'       => esc_html__( 'Insert a valid address', 'themewar' ),
                        'conditions'        => [
                            'terms' => [
                                [
                                        'name'      => 'map_mode',
                                        'operator'  => '!in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                ]
        );
        $this->add_control(
                'grayscale',
                [
                        'label'         => esc_html__( 'Show Grayscale', 'themewar' ),
                        'type'          => Controls_Manager::SWITCHER,
                        'label_on'      => esc_html__( 'Show', 'themewar' ),
                        'label_off'     => esc_html__( 'Hide', 'themewar' ),
                        'return_value'  => 'yes',
                        'default'       => 'no',
                ]
        );
        $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                    'lati',
                    [
                            'label'             => esc_html__( 'Location Latitude', 'themewar' ),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => '-37.815340',
                            'placeholder'       => esc_html__( 'Insert your location latitude', 'themewar' ),
                    ]
            );
            $repeater->add_control(
                    'long',
                    [
                            'label'             => esc_html__( 'Location Longitude', 'themewar' ),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => '144.963230',
                            'placeholder'       => esc_html__( 'Insert your location longitude', 'themewar' ),
                    ]
            );
            $this->add_control(
                'location_list',
                [
                        'label'         => esc_html__( 'Loaction Coordinats', 'themewar' ),
                        'type'          => Controls_Manager::REPEATER,
                        'fields'        => $repeater->get_controls(),
                        'default'       => [
                                [
                                        'lati'                 => '-37.815340',
                                        'long'                 => '144.963230',
                                ],
                        ],
                        'title_field' => '{{{ lati }}}',
                        'condition'         => ['map_mode' => '2']
                ]
            );
        $this->add_control(
                'map_zoom',
                [
                        'label'         => esc_html__( 'Zoom', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'min'           => 1,
                        'max'           => 50,
                        'step'          => 2,
                        'default'       => 10
                ]
        );
        $this->add_control(
                'marker',
                [
                        'label'         => esc_html__( 'Map Marker', 'themewar' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Upload your map marker. Map marker shold be smallar image.', 'themewar'),
                        'condition'     => ['map_mode' => '2'],
                ]
        );
        $this->add_control(
                'map_height',
                [
                        'label'         => esc_html__( 'Map Height', 'themewar' ),
                        'type'          => Controls_Manager::SLIDER,
                        'size_units'    => [ 'px' ],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 2000,
                                        'step' => 1,
                                ]
                        ],
                        'description'   => esc_html__('Insert your map height. Default height is 560px.', 'themewar'),
                        'default' => [
                                'unit' => 'px',
                                'size' => '',
                        ],
                        'selectors'     => [
                                '{{WRAPPER}} .iframe_map iframe' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .google_map'        => 'height: {{SIZE}}{{UNIT}};'
                        ],
                ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings   = $this->get_settings_for_display();
        $map_mode   = (isset($settings['map_mode']) && $settings['map_mode'] > 0) ? $settings['map_mode'] : 1;
        $map_address = (isset($settings['map_address']) && $settings['map_address'] != '') ? $settings['map_address'] : '1 Grafton Street, Dublin, Ireland';
        
        $location_list  = (isset($settings['location_list']) && !empty($settings['location_list'])) ? $settings['location_list'] : array(array('lati' => '-37.815340', 'long' => '144.963230'));
        
        $zoom       = (isset($settings['map_zoom']) && $settings['map_zoom'] > 0) ? $settings['map_zoom'] : '10';
        $marker     = (isset($settings['marker']['url']) && $settings['marker']['url'] != '') ? $settings['marker']['url'] : '';
        $grayscale  = (isset($settings['grayscale']) && $settings['grayscale'] != '') ? $settings['grayscale'] : 'no';
        
        $map_api_code = get_theme_mod('map_api', '');
        
        if($map_mode == 1 && $map_address != ''):
            $frame = 'https://maps.google.com/maps?q='.urlencode($map_address).'&t=&z='.$zoom.'&ie=UTF8&iwloc=&output=embed';
            ?><div class="iframe_map <?php if($grayscale == 'yes'){echo 'grayscale';} ?>"><iframe src="<?php echo esc_url($frame); ?>"></iframe></div><?php   
        elseif($map_mode == 2 && !empty($location_list)):
            $maps_id        = uniqid('gmap_');
            if($map_api_code != ''):
            ?><div data-map-style="<?php if($grayscale == 'yes'){echo 2;}else{echo 1;} ?>" 
                 data-marker="<?php echo esc_url($marker); ?>" 
                 data-coordinates="<?php echo esc_attr(json_encode($location_list)); ?>" 
                 data-zoom="<?php echo esc_attr($zoom); ?>" 
                 class="google_map" 
                 id="<?php echo esc_attr($maps_id); ?>">
            </div><?php
            else:
                ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo esc_html__('Google Map API not set yet. Please insert it under Appearance -> Customize -> Theme Options -> General Settings.', 'themewar'); ?>
                </div>
                <?php
            endif;
        else:
           ?>
            <div class="alert alert-warning" role="alert">
                <?php echo esc_html__('Please Select Map Style and fill up all related fields.', 'themewar'); ?>
            </div>
           <?php
        endif;
    }
    
    protected function content_template() {
        
    }
}