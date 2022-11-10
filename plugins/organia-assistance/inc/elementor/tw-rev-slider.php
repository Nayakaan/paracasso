<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Tw_Rev_Slider_Widgets extends Widget_Base {

    public function get_name() {
        return 'tw-rev-slider';
    }

    public function get_title() {
        return esc_html__('Rev Slider', 'themewar');
    }

    public function get_icon() {
        return 'eicon-slideshow';
    }

    public function get_categories() {
        return [ 'organia-elements'];
    }

    protected function _register_controls() {
        global $wpdb;
        $query = sprintf('select r.title, r.id, r.alias from %srevslider_sliders r',$wpdb->prefix);
        $sliders = $wpdb->get_results($query, ARRAY_A);
        $slides = array('0' => esc_html__('Please Select', 'themewar'));
        if(count($sliders) > 0):
            foreach($sliders as $sl):
                $slides[$sl['alias']] = $sl['title'];
            endforeach;
        endif;
        $this->start_controls_section(
                'section_tab_1', [
                    'label' => esc_html__('Rev Slider', 'themewar'),
                ]
        );
        $this->add_control(
                'rev_alise',
                [
                        'label'     => esc_html__( 'Select Slider', 'themewar' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 0,
                        'options'   => $slides,
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'         => esc_html__( 'Area Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'area_margin',
                [
                        'label' => esc_html__( 'Margins', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .organia_rev_slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'area_padding',
                [
                        'label' => esc_html__( 'Paddings', 'themewar' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .organia_rev_slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name'      => 'ab_img_shadow',
                        'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .organia_rev_slider',
                ]
        );
        $this->add_responsive_control(
            'ab_img_radius',
            [
                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} organia_rev_slider'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();
        
    }

    protected function render() {
        $settings       = $this->get_settings_for_display();
        $rev_alise      = (isset($settings['rev_alise']) && $settings['rev_alise'] != '') ? $settings['rev_alise'] : '';
        
        
        if($rev_alise != ''){ ?>
            <section class="organia_rev_slider">
                <?php echo do_shortcode('[rev_slider alias="'.$rev_alise.'"]'); ?>
            </section>
        <?php    
        }else{
            echo '<div class="alert alert-warning" role="alert"> <strong>Warning!</strong> Please select a slider from dropdown. </div>';
        }
    }

    protected function content_template() {
        
    }

}
