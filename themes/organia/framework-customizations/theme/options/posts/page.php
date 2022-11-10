<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$all_header = array(
    '0' => esc_html__('Default Header', 'organia')
);
global $wpdb; 
$table = $wpdb->prefix.'posts';
$sql = "SELECT * FROM $table WHERE post_type = 'tw-header-builder' and post_status = 'publish' order by post_title ASC";
$results = $wpdb->get_results($sql, ARRAY_A);

if(!empty($results)):
    foreach ($results as $rs):
        $all_header[$rs['ID']] = $rs['post_title'];
    endforeach;
endif;

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

$options = array(
	'mains' => array(
		'title'   => esc_html__( 'Page Settings Box', 'organia' ),
		'type'    => 'box',
		'options' => array(
                        'pageheadersettings' => array(
                                'title'   => esc_html__( 'Custom Header Settings', 'organia' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'page_header_enabled'     => array(
                                                'type'  => 'switch',
                                                'value' => '2',
                                                'label' => esc_html__('Enable Setting', 'organia'),
                                                'desc'  => esc_html__('Do you want to enable custom header settings for this page?', 'organia'),
                                                'right-choice' => array(
                                                    'value' => '1',
                                                    'label' => esc_html__('Yes', 'organia'),
                                                ),
                                                'left-choice' => array(
                                                    'value' => '2',
                                                    'label' => esc_html__('No', 'organia'),
                                                ),
                                        ),
                                        'page_header_style'         => array(
                                                'type'    => 'select',
                                                'value'   => '0',
                                                'label'   => esc_html__('Select Header Style', 'organia'),
                                                'desc'    => esc_html__('Select page header for this page.', 'organia'),
                                                'choices' => $all_header
                                        ),
                                )
                        ),
                        'footersettings'  => array(
                                'title'   => esc_html__( 'Custom Footer Settings', 'organia' ),
                                'type'    => 'tab',
                                'options' => array(
                                    'page_footer_enabled'   => array(
                                            'type'          => 'switch',
                                            'value'         => '2',
                                            'label'         => esc_html__('Enable Setting', 'organia'),
                                            'desc'          => esc_html__('Do you want to enable custom footer settings for this page?', 'organia'),
                                            'right-choice'  => array(
                                                'value'     => '1',
                                                'label'     => esc_html__('Yes', 'organia'),
                                            ),
                                            'left-choice'   => array(
                                                'value'     => '2',
                                                'label'     => esc_html__('No', 'organia'),
                                            ),
                                    ),
                                    'page_footer_style' => array(
                                            'label'     => esc_html__( 'Select Footer Style', 'organia' ),
                                            'type'      => 'select',
                                            'value'     => '0',
                                            'choices'   => $all_footer
                                    ),
                            ),
                        ),
                        'bannersettings' => array(
                                'title'   => esc_html__( 'Banner Settings', 'organia' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'page_is_settings'                    => array(
                                                'label'        => esc_html__( 'Enable Settings', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'organia' )
                                                ),
                                                'value'        => '2',
                                                'desc'         => esc_html__('Enable bellow settings for this page banner.', 'organia'),
                                        ),
                                        'page_is_banner'                    => array(
                                                'label'        => esc_html__( 'Is Banner', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'organia' )
                                                ),
                                                'value'        => '1',
                                                'desc'         => esc_html__('Do you want to hide banner only for this page? Then please turn it to Hide.', 'organia'),
                                        ),
                                        'page_banner_bg' => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image and this only work for dark version.', 'organia' ),
                                        ),
                                        'page_banner_bg_color'	=> array(
                                                'type'          => 'rgba-color-picker',
                                                'value'         => '',
                                                'palettes'      => array(),
                                                'label'         => esc_html__('Banner BG Color', 'organia'),
                                                'desc'          => esc_html__('Insert your page banner bg color here.', 'organia'),
                                        ),
                                        'page_banner_title'	 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
                                        ),
                                        'page_is_breadcrumb'   => array(
                                                'label'        => esc_html__( 'Is Breadcrumb?', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'organia' )
                                                ),
                                                'value'        => '1',
                                                'desc'         => esc_html__('Do you want to show breadcrumb on page banner?', 'organia'),
                                        ),
                                        'page_banner_alignment'              => array(
                                                'label'   => esc_html__( 'Banner Content Alignment', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'choices' => array(
                                                        'left'         => esc_html__( 'Left', 'organia' ),
                                                        'center'       => esc_html__( 'Center', 'organia' ),
                                                        'right'        => esc_html__( 'Right', 'organia' ),
                                                ),
                                        ),
                                )   
                        ),
                        'pagesettings' => array(
                                'title'   => esc_html__( 'Page Settings', 'organia' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'page_body_bg' => array(
                                                'type'   => 'upload',
                                                'label'  => esc_html__( 'Home Template BG IMG', 'organia' ),
                                                'desc'   => esc_html__( 'Upload your page home page template body bg image, this only for this page.', 'organia' ),
                                        ),
                                        'page_body_bg_color'  => array(
                                                'type'          => 'rgba-color-picker',
                                                'value'         => '',
                                                'palettes'      => array(),
                                                'label'         => esc_html__('Body BG Color', 'organia'),
                                                'desc'          => esc_html__('Upload your page home page template body bg color, this only for this page.', 'organia'),
                                        ),
                                        'page_is_con_settings'                    => array(
                                                'label'        => esc_html__( 'Enable Content Settings', 'organia' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'organia' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'organia' )
                                                ),
                                                'value'        => '2',
                                                'desc'         => esc_html__('Enable bellow settings for this page content are.', 'organia'),
                                        ),
                                        'page_sidebar'              => array(
                                                'label'   => esc_html__( 'Sidebar Template', 'organia' ),
                                                'type'    => 'select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your page template. This option only work for this page.', 'organia' ),
                                                'choices' => array(
                                                        '1'         => esc_html__( 'No Sidebar', 'organia' ),
                                                        '2'         => esc_html__( 'Left Sidebar', 'organia' ),
                                                        '3'         => esc_html__( 'Right Sidebar', 'organia' )
                                                ),
                                        ),
                                )
                        ),
                        
                        
		),
	),
);
