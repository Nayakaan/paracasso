<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$desc = esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'organia' );
$help = sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
	esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'organia' ),
	esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'organia' )
);

$options = array(
	'demo_text'                      => array(
		'label' => esc_html__( 'Text', 'organia' ),
		'type'  => 'text',
		'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_short_text'                => array(
		'label' => esc_html__( 'Short Text', 'organia' ),
		'type'  => 'short-text',
		'value' => '7',
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_password'                  => array(
		'label' => esc_html__( 'Password', 'organia' ),
		'type'  => 'password',
		'value' => 'Dotted text',
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_hidden'                    => array(
		'label' => false,
		'type'  => 'hidden',
		'value' => '{some: "json"}',
		'desc'  => false,
	),
	'demo_textarea'                  => array(
		'label' => esc_html__( 'Textarea', 'organia' ),
		'type'  => 'textarea',
		'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'desc'  => $desc,
		'help'  => array(
			'icon' => 'video',
			'html' => ''
		),
	),
	'demo_wp_editor'                 => array(
		'label'  => esc_html__( 'Rich Text Editor', 'organia' ),
		'type'   => 'wp-editor',
		'value'  => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
		'desc'   => $desc,
		'help'   => $help,
		'reinit' => true,
	),
	'demo_html'                      => array(
		'label' => esc_html__( 'HTML', 'organia' ),
		'type'  => 'html',
		'value' => '{some: "json"}',
		'desc'  => $desc,
		'html'  => '<em>Lorem</em> <b>ipsum</b> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADWSURBVDjLlZNNCsIwEEZzKW/jyoVbD+Aip/AGgmvRldCKNxDBv4LSfSG7kBZix37BQGiapA48ZpjMvIZAGRExwDmnESw7MMvsHnMFTdOQUsqjrmtXsggKEEVReCDseZc/HbOgoCxLDytwUEFBVVUe/fjNDguEEFGSAiml4Xq+DdZJAV78sM1oOpnT/fI0oEYPZ0lBtjuaBWSttcHtRQWvx9sMrlcb7+HQwxlmojfI9ycziGyj34sK3AV8zd7KFSYFCCwO1aMFsQgK8DO1bRsFM0HBP9i9L2ONMKHNZV7xAAAAAElFTkSuQmCC">',
		'help'  => $help,
	),
	'demo_checkbox'                  => array(
		'label' => esc_html__( 'Checkbox', 'organia' ),
		'type'  => 'checkbox',
		'value' => true,
		'desc'  => $desc,
		'text'  => esc_html__( 'Custom text', 'organia' ),
		'help'  => $help,
	),
	'demo_checkboxes'                => array(
		'label'   => esc_html__( 'Checkboxes', 'organia' ),
		'type'    => 'checkboxes',
		'value'   => array(
			'c1' => false,
			'c2' => true,
		),
		'desc'    => $desc,
		'choices' => array(
			'c1' => esc_html__( 'Checkbox 1 Custom Text', 'organia' ),
			'c2' => esc_html__( 'Checkbox 2 Custom Text', 'organia' ),
			'c3' => esc_html__( 'Checkbox 3 Custom Text', 'organia' ),
		),
		'help'    => $help,
	),
	'demo_switch'                    => array(
		'label'        => esc_html__( 'Switch', 'organia' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__( 'Yes', 'organia' )
		),
		'left-choice'  => array(
			'value' => 'no',
			'label' => esc_html__( 'No', 'organia' )
		),
		'value'        => 'yes',
		'desc'         => $desc,
		'help'         => $help,
	),
	'demo_select'                    => array(
		'label'   => esc_html__( 'Select', 'organia' ),
		'type'    => 'select',
		'value'   => 'c',
		'desc'    => $desc,
		'choices' => array(
			''  => '---',
			'a' => esc_html__( 'Lorem ipsum', 'organia' ),
			'b' => array(
				'text' => esc_html__( 'Consectetur', 'organia' ),
				'attr' => array(
					'label'         => 'Label overrides text',
					'data-whatever' => 'some data',
				),
			),
			array(
				'attr'    => array(
					'label'         => esc_html__( 'Optgroup Label', 'organia' ),
					'data-whatever' => 'some data',
				),
				'choices' => array(
					'c' => esc_html__( 'Sed ut perspiciatis', 'organia' ),
					'd' => esc_html__( 'Excepteur sint occaecat', 'organia' ),
				),
			),
			1   => esc_html__( 'One', 'organia' ),
			2   => esc_html__( 'Two', 'organia' ),
			3   => esc_html__( 'Three', 'organia' ),
		),
		'help'    => $help,
	),
	'demo_short_select'              => array(
		'label'   => esc_html__( 'Short Select', 'organia' ),
		'type'    => 'short-select',
		'value'   => '7',
		'desc'    => $desc,
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
		),
		'help'    => $help,
	),
	'demo_select_multiple'           => array(
		'label'   => esc_html__( 'Select Multiple', 'organia' ),
		'type'    => 'select-multiple',
		'value'   => array( 'c', '2' ),
		'desc'    => $desc,
		'choices' => array(
			''  => '---',
			'a' => esc_html__( 'Lorem ipsum', 'organia' ),
			'b' => array(
				'text' => esc_html__( 'Consectetur', 'organia' ),
				'attr' => array(
					'label'         => 'Label overrides text',
					'data-whatever' => 'some data',
				),
			),
			array(
				'attr'    => array(
					'label'         => esc_html__( 'Optgroup Label', 'organia' ),
					'data-whatever' => 'some data',
				),
				'choices' => array(
					'c' => esc_html__( 'Sed ut perspiciatis', 'organia' ),
					'd' => esc_html__( 'Excepteur sint occaecat', 'organia' ),
				),
			),
			1   => esc_html__( 'One', 'organia' ),
			2   => esc_html__( 'Two', 'organia' ),
			3   => esc_html__( 'Three', 'organia' ),
		),
		'help'    => $help,
	),
	'demo_group_multi_select'        => array(
		'type'    => 'group',
		'options' => array(
			'demo_multi_select_posts'      => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Posts', 'organia' ),
				'population' => 'posts',
				'source'     => 'page',
				'desc'       => $desc,
				'help'       => $help,
			),
			'demo_multi_select_taxonomies' => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Taxonomies', 'organia' ),
				'population' => 'taxonomy',
				'source'     => 'category',
				'desc'       => $desc,
				'help'       => $help,
			),
			'demo_multi_select_users'      => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Users', 'organia' ),
				'population' => 'users',
				'source'     => 'administrator',
				'desc'       => $desc,
				'help'       => $help,
			),
			'demo_multi_select_array'      => array(
				'type'       => 'multi-select',
				'label'      => esc_html__( 'Multi-Select: Custom Array', 'organia' ),
				'population' => 'array',
				'choices'    => array(
					'hello' => esc_html__( 'Hello', 'organia' ),
					'world' => esc_html__( 'World', 'organia' ),
				),
				'desc'       => $desc,
				'help'       => $help,
			),
		),
	),
	'demo_radio'                     => array(
		'label'   => esc_html__( 'Radio', 'organia' ),
		'type'    => 'radio',
		'value'   => 'c2',
		'desc'    => $desc,
		'choices' => array(
			'c1' => esc_html__( 'Radio 1 Custom Text', 'organia' ),
			'c2' => esc_html__( 'Radio 2 Custom Text', 'organia' ),
			'c3' => esc_html__( 'Radio 3 Custom Text', 'organia' ),
		),
		'help'    => $help,
	),
	'demo_radio_text'                => array(
		'label'   => esc_html__( 'Radio Text', 'organia' ),
		'type'    => 'radio-text',
		'value'   => '50',
		'desc'    => $desc,
		'choices' => array(
			'25'  => esc_html__( '25%', 'organia' ),
			'50'  => esc_html__( '50%', 'organia' ),
			'100' => esc_html__( '100%', 'organia' ),
		),
		'help'    => $help,
	),
	'demo_image_picker'              => array(
		'label'   => esc_html__( 'Image Picker', 'organia' ),
		'type'    => 'image-picker',
		'value'   => '',
		'desc'    => $desc,
		'choices' => array(
			'choice-1' => array(
				'small' => array(
					'height' => 70,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb1.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip1.jpg'
				),
			),
			'choice-2' => array(
				'small' => array(
					'height' => 70,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb2.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip2.jpg'
				),
			),
		),
		'help'    => $help,
	),
	'demo_icon_v2'                      => array(
		'label' => esc_html__( 'Icon v2', 'organia' ),
		'type'  => 'icon-v2',
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_upload'                    => array(
		'label'       => esc_html__( 'Single Upload', 'organia' ),
		'desc'        => $desc,
		'type'        => 'upload',
		'images_only' => false,
		'help'        => $help,
	),
	'demo_upload_images'             => array(
		'label' => esc_html__( 'Single Upload (Images Only)', 'organia' ),
		'desc'  => $desc,
		'type'  => 'upload',
		'help'  => $help,
	),
	'demo_multi_upload'              => array(
		'label'       => esc_html__( 'Multi Upload', 'organia' ),
		'desc'        => $desc,
		'type'        => 'multi-upload',
		'images_only' => false,
		'help'        => $help,
	),
	'demo_multi_upload_images'       => array(
		'label' => esc_html__( 'Multi Upload (Images Only)', 'organia' ),
		'desc'  => $desc,
		'type'  => 'multi-upload',
		'help'  => $help,
	),
	'demo_color_picker'              => array(
		'label' => esc_html__( 'Color Picker', 'organia' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_rgba_color_picker'         => array(
		'label' => esc_html__( 'RGBA Color Picker', 'organia' ),
		'type'  => 'rgba-color-picker',
		'value' => 'rgba(255, 0, 0, .5)',
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_gradient'                  => array(
		'label' => esc_html__( 'Gradient', 'organia' ),
		'type'  => 'gradient',
		'value' => array(
			'primary'   => '#ffffff',
			'secondary' => '#ffffff'
		),
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_background_image'          => array(
		'label'   => esc_html__( 'Background Image', 'organia' ),
		'type'    => 'background-image',
		'value'   => 'none',
		'choices' => array(
			'none' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/no_pattern.jpg',
				'css'  => array(
					'background-image' => 'none'
				)
			),
			'bg-1' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/diagonal_bottom_to_top_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-2' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/diagonal_top_to_bottom_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-3' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/dots_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/dots_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-4' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/romb_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/romb_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-5' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/square_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/square_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-6' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/noise_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/noise_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-7' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/vertical_lines_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/vertical_lines_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
			'bg-8' => array(
				'icon' => get_template_directory_uri() . '/images/patterns/waves_pattern_preview.jpg',
				'css'  => array(
					'background-image'  => 'url("' . get_template_directory_uri() . '/images/patterns/waves_pattern.png' . '")',
					'background-repeat' => 'repeat',
				)
			),
		),
		'desc'    => $desc,
		'help'    => $help,
	),
	'demo_typography-v2'             => array(
		'label'      => esc_html__( 'Typography V2', 'organia' ),
		'type'       => 'typography-v2',
		'value'      => array(
			'family'         => 'Amarante',
//			For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
//			'style' => 'italic',
//			'weight' => 700,
			'subset'         => 'latin-ext',
			'variation'      => 'regular',
			'size'           => 14,
			'line-height'    => 13,
			'letter-spacing' => - 2,
			'color'          => '#0000ff'
		),
		'components' => array(
			'family'         => true,
			//'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
			'size'           => true,
			'line-height'    => true,
			'letter-spacing' => true,
			'color'          => true
		),
		'desc'       => $desc,
		'help'       => $help,
	),
	'demo_datetime_range'            => array(
		'type'             => 'datetime-range',
		'attr'             => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
		'label'            => esc_html__( 'Demo date range', 'organia' ),
		'desc'             => $desc,
		'help'             => $help,
		'datetime-pickers' => array(
			'from' => array(
				'timepicker' => false,
				'datepicker' => true,
			),
			'to'   => array(
				'timepicker' => false,
				'datepicker' => true,
			)
		),
		'value'            => array(
			'from' => '',
			'to'   => ''
		)
	),
	'demo_datetime_picker'           => array(
		'type'            => 'datetime-picker',
		'value'           => '',
		'attr'            => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
		'label'           => esc_html__( 'Date & Time picker', 'organia' ),
		'desc'            => $desc,
		'help'            => $help,
		'datetime-picker' => array(
			'format'        => 'd-m-Y H:i',
			'extra-formats' => array(),
			'moment-format' => 'DD-MM-YYYY HH:mm',
			'scrollInput'   => false,
			'maxDate'       => false,
			'minDate'       => false,
			'timepicker'    => true,
			'datepicker'    => true,
			'defaultTime'   => '12:00'
		)
	),
	'demo_slider'                    => array(
		'label' => esc_html__( 'Slider', 'organia' ),
		'type'  => 'slider',
		'value' => 10,
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_range_slider'              => array(
		'label' => esc_html__( 'Range Slider', 'organia' ),
		'type'  => 'range-slider',
		'value' => array(
			'from' => 30,
			'to'   => 50
		),
		'desc'  => $desc,
		'help'  => $help,
	),
	'demo_addable_popup'             => array(
		'label'         => esc_html__( 'Addable Popup', 'organia' ),
		'type'          => 'addable-popup',
		'desc'          => $desc,
		'template'      => '{{- demo_text }}',
		'popup-options' => array(
			'demo_text'                => array(
				'label' => esc_html__( 'Text', 'organia' ),
				'type'  => 'text',
				'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'desc'  => $desc,
				'help'  => $help,
			),
			'demo_image_picker'        => array(
				'label'   => esc_html__( 'Image Picker', 'organia' ),
				'type'    => 'image-picker',
				'value'   => '',
				'desc'    => $desc,
				'choices' => array(
					'choice-1' => array(
						'label' => esc_html__( 'First Image', 'organia' ),
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb1.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip1.jpg'
						),
					),
					'choice-2' => array(
						'label' => esc_html__( 'Second Image', 'organia' ),
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb2.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip2.jpg'
						),
					),
				),
				'help'    => $help,
			),
			'demo_upload_images'       => array(
				'label' => esc_html__( 'Single Upload (Images Only)', 'organia' ),
				'desc'  => $desc,
				'type'  => 'upload',
				'help'  => $help,
			),
			'demo_addable_popup_inner' => array(
				'label'         => esc_html__( 'Addable Popup', 'organia' ),
				'type'          => 'addable-popup',
				'desc'          => $desc,
				'template'      => 'Title color-picker value : {{- demo_color_picker }}',
				'popup-options' => array(
					'demo_multi_upload_images' => array(
						'label' => esc_html__( 'Multi Upload (images only)', 'organia' ),
						'desc'  => $desc,
						'type'  => 'multi-upload',
						'help'  => $help,
					),
					'demo_color_picker'        => array(
						'label' => esc_html__( 'Color Picker', 'organia' ),
						'type'  => 'color-picker',
						'value' => '',
						'desc'  => $desc,
						'help'  => $help,
					)
				)
			),
		),
	),
	'demo_addable_option'            => array(
		'label'  => esc_html__( 'Addable Option', 'organia' ),
		'type'   => 'addable-option',
		'option' => array(
			'type' => 'text',
		),
		'value'  => array( 'Option 1', 'Option 2', 'Option 3' ),
		'desc'   => $desc,
		'help'   => $help
	),
	'demo_addable_box'               => array(
		'label'        => esc_html__( 'Addable Box', 'organia' ),
		'type'         => 'addable-box',
		'value'        => array(),
		'desc'         => $desc,
		'help'         => $help,
		'box-controls' => array(//'custom' => '<small class="dashicons dashicons-smiley" title="Custom"></small>',
		),
		'box-options'  => array(
			'demo_text'     => array(
				'label' => esc_html__( 'Text', 'organia' ),
				'type'  => 'text',
				'value' => 'Lorem ipsum dolor sit amet',
				'desc'  => $desc,
				'help'  => $help,
			),
			'demo_textarea' => array(
				'label' => esc_html__( 'Textarea', 'organia' ),
				'type'  => 'textarea',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'desc'  => $desc,
				'help'  => array(
					'icon' => 'video',
					'html' => ''
				),
			),
		),
		'template'     => '{{- demo_text }}',
		'limit'        => 3,
	),
	'demo_group'                     => array(
		'type'    => 'group',
		'options' => array(
			'demo_text_in_group'     => array(
				'label' => esc_html__( 'Text in Group', 'organia' ),
				'type'  => 'text',
				'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'desc'  => $desc,
				'help'  => $help,
			),
			'demo_password_in_group' => array(
				'label' => esc_html__( 'Password in Group', 'organia' ),
				'type'  => 'password',
				'value' => 'Dotted text',
				'desc'  => $desc,
				'help'  => $help,
			),
		),
	),
	'demo_multi'                     => array(
		'label'         => false,
		'type'          => 'multi',
		'value'         => array(),
		'desc'          => false,
		'inner-options' => array(
			'demo_text'     => array(
				'label' => esc_html__( 'Text in Multi', 'organia' ),
				'type'  => 'text',
				'value' => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'desc'  => $desc,
				'help'  => $help,
			),
			'demo_textarea' => array(
				'label' => esc_html__( 'Textarea in Multi', 'organia' ),
				'type'  => 'textarea',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'desc'  => $desc,
				'help'  => $help,
			),
		),
	),
	'demo_multi_picker_select'       => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Multi Picker: Select', 'organia' ),
				'type'    => 'select',
				'choices' => array(
					'phone'  => esc_html__( 'Phone', 'organia' ),
					'laptop' => esc_html__( 'Laptop', 'organia' )
				),
				'desc'    => $desc,
				'help'    => $help
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'organia' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'organia' ),
						'32' => esc_html__( '32Gb', 'organia' ),
						'64' => esc_html__( '64Gb', 'organia' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'organia' ),
				)
			),
		),
		'show_borders' => false,
	),
	'demo_multi_picker_radio'        => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'value'        => array(
			'gadget' => 'laptop',
		),
		'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Multi Picker: Radio', 'organia' ),
				'type'    => 'radio',
				'choices' => array(
					'phone'  => esc_html__( 'Phone', 'organia' ),
					'laptop' => esc_html__( 'Laptop', 'organia' )
				),
				'desc'    => $desc,
				'help'    => $help
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'organia' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'organia' ),
						'32' => esc_html__( '32Gb', 'organia' ),
						'64' => esc_html__( '64Gb', 'organia' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'organia' ),
				)
			),
		),
		'show_borders' => false,
	),
	'demo_multi_picker_image_picker' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Multi Picker: Image Picker', 'organia' ),
				'type'    => 'image-picker',
				'choices' => array(
					'phone'  => array(
						'label' => esc_html__( 'Phone', 'organia' ),
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb1.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip1.jpg'
						),
					),
					'laptop' => array(
						'label' => esc_html__( 'Laptop', 'organia' ),
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/thumb2.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/image-picker-demo/tooltip2.jpg'
						),
					)
				),
				'desc'    => $desc,
				'help'    => $help
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'organia' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'organia' ),
						'32' => esc_html__( '32Gb', 'organia' ),
						'64' => esc_html__( '64Gb', 'organia' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'organia' ),
				)
			),
		),
		'show_borders' => false,
	),
	'demo_multi_picker_switch'       => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'        => esc_html__( 'Switch', 'organia' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'laptop',
					'label' => esc_html__( 'Laptop', 'organia' )
				),
				'left-choice'  => array(
					'value' => 'phone',
					'label' => esc_html__( 'Phone', 'organia' )
				),
				'value'        => 'yes',
				'desc'         => $desc,
				'help'         => $help,
			)
		),
		'choices'      => array(
			'phone'  => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'memory' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Memory', 'organia' ),
					'choices' => array(
						'16' => esc_html__( '16Gb', 'organia' ),
						'32' => esc_html__( '32Gb', 'organia' ),
						'64' => esc_html__( '64Gb', 'organia' ),
					)
				)
			),
			'laptop' => array(
				'price'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'organia' ),
				),
				'webcam' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Webcam', 'organia' ),
				)
			),
		),
		'show_borders' => false,
	),
);
