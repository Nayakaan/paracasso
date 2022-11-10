<?php
$fields[] = array(
        'type'        => 'color',
	'settings'    => 'cp_primary_color_hex',
	'label'       => esc_html__( 'Primary Color Hex', 'organia' ),
	'description' => esc_html__( 'Insert your site primary color HEX code.', 'organia' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
        'transport'   => 'auto',
	'output'      => [
		[
			'element'  => ':root',
			'property' => '--theme-color'
		],
	],
);
$fields[] = array(
    'type'        => 'color',
	'settings'    => 'cp_primary_color_rgb',
	'label'       => esc_html__( 'Primary Color RGBA', 'organia' ),
	'description' => esc_html__( 'Insert your site primary color RGBA code.', 'organia' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
        'choices'     => [
		'alpha' => true,
	],
    'transport'   => 'auto',
	'output'      => [
                [
                        'element'  => '.video_banner .popup_video',
                        'property' => 'background',
                ],
                [
                        'element'  => '',
                        'property' => 'color',
                ],
                [
                        'element'  => '',
                        'property' => 'border-color',
                ],
        ]
);
$fields[] = array(
    'type'        => 'custom',
	'settings'    => 'color_custom_04',
	'label'       => FALSE,
	'section'     => 'colorpreset_section',
	'default'     => '<div class="customizer_label">'.esc_html__('Home 04 Gradian Color', 'organia').'</div>',
);
$fields[] = array(
	'type'        => 'color',
	'settings'    => 'it_grstart_color_start_hex',
	'label'       => esc_html__( 'Gradian Start Color Hex', 'organia' ),
	'description' => esc_html__( 'Insert your home 04 gradian color starting HEX code.', 'organia' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
		'transport'   => 'auto',
	'output'      => [
		[
			'element'  => ':root',
			'property' => '--color-start'
		],
	],
);
$fields[] = array(
	'type'        => 'color',
	'settings'    => 'it_grend_color_start_hex',
	'label'       => esc_html__( 'Gradian Ending Color Hex', 'organia' ),
	'description' => esc_html__( 'Insert your home 04 gradian color ending HEX code.', 'organia' ),
	'section'     => 'colorpreset_section',
	'default'     => '',
		'transport'   => 'auto',
	'output'      => [
		[
			'element'  => ':root',
			'property' => '--color-end'
		],
	],
);