<?php
$all_footer = array(
    '0' => esc_html__('Default Footer', 'organia')
);
global $wpdb;
$table = $wpdb->prefix.'posts';
$sql = "SELECT * FROM $table WHERE post_type = 'tw-footer-builder' and post_status = 'publish' order by post_title ASC";
$results = $wpdb->get_results($sql, ARRAY_A);

if(!empty($results)):
    foreach ($results as $rs):
        $all_footer[$rs['ID']] = $rs['post_title'];
    endforeach;
endif;

$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'footer_custom_01',
    'label'       => FALSE,
    'section'     => 'footer_settings',
    'default'     => '<div class="customizer_label">'.esc_html__('Footer Settings', 'organia').'</div>',
);
$fields[] = array(
        'type'        => 'select',
        'settings'    => 'footer_style',
        'label'       => esc_html__( 'Select Footer Style', 'organia' ),
        'section'     => 'footer_settings',
        'default'     => '0',
        'choices'     => $all_footer
);
$fields[] = array(
        'type'        => 'custom',
    'settings'    => 'footer_custom_03',
    'label'       => FALSE,
    'section'     => 'footer_settings',
    'default'     => '<div class="customizer_label mt40">'.esc_html__('Copyright Settings', 'organia').'</div>',
        'active_callback' => array(
            array(
                'setting'   => 'footer_style',
                'operator'  => 'in',
                'value'     => ['0']
            )
        ),
);
$fields[] = array(
        'type'        => 'editor',
        'settings'    => 'copy_site_info',
        'label'       => esc_html__( 'Copyright Info', 'organia' ),
        'section'     => 'footer_settings',
        'default'     => date('Y').' '.get_bloginfo('name').'. '.esc_html__(' All rights reserved.', 'organia'),
        'active_callback' => array(
            array(
                'setting'   => 'footer_style',
                'operator'  => 'in',
                'value'     => ['0']
            )
        ),
);