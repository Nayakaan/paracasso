<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
        'shop_tags_html_01' => array(
                'type'  => 'html-full',
                'value' => '',
                'attr'  => array( 'class' => 'custom-class' ),
                'label' => '',
                'html'  => '<div class="customizer_label displayBlocks">'.esc_html__('Banner Settings', 'organia').'</div>',
        ),
        'shop_tags_is_settings'                    => array(
                'label'        => esc_html__( 'Enable Settings', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2',
                'desc'         => esc_html__('If you enable settings here for this Tag then Base Tag Banner Settings will override by those individual settings.', 'organia'),
        ),
        'shop_tags_is_banner'                    => array(
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
                'desc'         => esc_html__('Sect this category page banner informations.', 'organia'),
        ),
        'shop_tags_banner_bg'	 => array(
                'type'	 => 'upload',
                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                'desc'	 => esc_html__( 'Upload your page banner bg image and this only work for dark version.', 'organia' ),
        ),
        'shop_tags_banner_bg_color'	 => array(
                'type'  => 'rgba-color-picker',
                'value' => '',
                'palettes' => array(),
                'label' => esc_html__('Banner BG Color', 'organia'),
        ),
        'shop_tags_banner_title'		 => array(
                'type'		 => 'text',
                'value'		 => '',
                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
        ),
        'shop_tags_is_breadcrumb'                    => array(
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
        'shop_tags_banner_alignment'              => array(
                'label'   => esc_html__( 'Banner Alignment', 'organia' ),
                'type'    => 'short-select',
                'value'   => 'center',
                'desc'    => esc_html__( 'Select your category banner text alignment.', 'organia' ),
                'choices' => array(
                        'left'         => esc_html__( 'Left', 'organia' ),
                        'center'        => esc_html__( 'Center', 'organia' ),
                        'right'         => esc_html__( 'Right', 'organia' ),
                ),
        ),
    
        
        'shop_tags_html_02' => array(
                'type'  => 'html-full',
                'value' => '',
                'attr'  => array( 'class' => 'custom-class' ),
                'label' => '',
                'html'  => '<div class="customizer_label displayBlocks">'.esc_html__('Top Block Settings', 'organia').'</div>',
        ),
        'shop_tags_show_top_blocks'                    => array(
                'label'        => esc_html__( 'Show Top Blocks?', 'organia' ),
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
                'desc'         => esc_html__('Do you want to show top blocks? Then please turn it to Yes.', 'organia'),
        ),
        'shop_tags_top_blocks' => array(
                'type'  => 'addable-box',
                'value' => array( ),
                'label' => esc_html__('Top Blocks', 'organia'),
                'desc'  => esc_html__('Add blocks if you want to show on top of tag page.', 'organia'),
                'box-options' => array(
                    'top_blocks' => array( 
                        'label'   => esc_html__( 'Blocks', 'organia' ),
                        'type'    => 'short-select',
                        'value'   => '0',
                        'choices' => organia_post_array('blocks', esc_html__('Select Block', 'organia')),
                    ),
                ),
                'template' => '{{- top_blocks }}',
                'add-button-text' => esc_html__('Add Block', 'organia'),
                'sortable' => true
        ),
        
    
        
        'shop_tags_html_03' => array(
                'type'  => 'html-full',
                'value' => '',
                'attr'  => array( 'class' => 'custom-class' ),
                'label' => '',
                'html'  => '<div class="customizer_label displayBlocks">'.esc_html__('Content Settings', 'organia').'</div>',
        ),
        'shop_tags_enable_con_settings'                    => array(
                'label'        => esc_html__( 'Enable Content Settings', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Enable', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Disable', 'organia' )
                ),
                'value'        => '2',
                'desc'         => esc_html__('If you wanna override customizer shop settings for this category then enable it an configure bellow settings as you want.', 'organia'),
        ),
        'shop_tags_is_category_dropdown'                    => array(
                'label'        => esc_html__( 'Is Category Dropdown?', 'organia' ),
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
                'desc'         => esc_html__('Do you want to show top blocks? Then please turn it to Yes.', 'organia'),
        ),
        'shop_tags_dropdown_label'		 => array(
                'type'		 => 'text',
                'value'		 => esc_html__('Categories', 'organia'),
                'label'		 => esc_html__( 'Dropdown Label', 'organia' )
        ),
        'shop_tags_categories' => array(
                'type'  => 'addable-box',
                'value' => array( ),
                'label' => esc_html__('Dropdown Categories', 'organia'),
                'box-options' => array(
                    'cat_id' => array( 
                        'label'   => esc_html__( 'Category', 'organia' ),
                        'type'    => 'short-select',
                        'value'   => '0',
                        'choices' => organia_category_array('product_cat')
                    ),
                ),
                'template' => '{{- cat_id }}',
                'add-button-text' => esc_html__('Add Category', 'organia'),
                'sortable' => true
        ),
        'shop_tags_is_sort'                    => array(
                'label'        => esc_html__( 'Is Sort?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '1'
        ),
        'shop_tags_sort_label'		 => array(
                'type'		 => 'text',
                'value'		 => esc_html__('Sort By:', 'organia'),
                'label'		 => esc_html__( 'Sort Label', 'organia' )
        ),
        'shop_tags_is_view_toggler'                    => array(
                'label'        => esc_html__( 'Is View Toggler?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '1'
        ),
        'shop_tags_default_view'              => array(
                'label'   => esc_html__('Default View', 'organia'),
                'type'    => 'select',
                'value'   => '1',
                'choices' => array(
                        '1'      => esc_html__('Grid View', 'organia'),
                        '2'      => esc_html__('List View', 'organia')
                ),
        ),
        'shop_tags_product_style'              => array(
                'label'   => esc_html__('Product Style', 'organia'),
                'type'    => 'select',
                'value'   => '1',
                'choices' => array(
                        '1'       => esc_html__('Style 01', 'organia'),
                        '2'       => esc_html__('Style 02', 'organia'),
                        '3'       => esc_html__('Style 03', 'organia'),
                        '4'       => esc_html__('Style 04', 'organia'),
                        '5'       => esc_html__('Style 05', 'organia'),
                        '6'       => esc_html__('Style 06', 'organia')
                ),
        ),
        'shop_tags_thumb_width'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1
                ),
                'label' => esc_html__('Thumbnail Width', 'organia'),
        ),
        'shop_tags_thumb_height'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1
                ),
                'label' => esc_html__('Thumbnail Height', 'organia'),
        ),
        'shop_tags_list_thumb_width'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1
                ),
                'label' => esc_html__('List Thumbnail Width', 'organia'),
        ),
        'shop_tags_list_thumb_height'              => array(
                'type'  => 'slider',
                'value' => '',
                'properties' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1
                ),
                'label' => esc_html__('List Thumbnail Height', 'organia'),
        ),
        'shop_tags_product_mode'              => array(
                'label'   => esc_html__('Product Mode', 'organia'),
                'desc'   => esc_html__('This option only work for product Style 01.', 'organia'),
                'type'    => 'select',
                'value'   => '1',
                'choices' => array(
                        '1'       => esc_html__('Group Rounded', 'organia'),
                        '2'       => esc_html__('Single Rounded', 'organia')
                ),
        ),
        'shop_tags_col_per_row'              => array(
                'label'   => esc_html__('Collumn Per Row XL', 'organia'),
                'desc'    => esc_html__('How many item you want to show per row in xl device?', 'organia'),
                'type'    => 'select',
                'value'   => '4',
                'choices' => array(
                        '2'       => esc_html__('2 Columns', 'organia'),
                        '3'       => esc_html__('3 Columns', 'organia'),
                        '4'       => esc_html__('4 Columns', 'organia'),
                ),
        ),
        'shop_tags_col_per_row_lg'              => array(
                'label'   => esc_html__('Collumn Per Row LG', 'organia'),
                'desc'    => esc_html__('How many item you want to show per row in LG device?', 'organia'),
                'type'    => 'select',
                'value'   => '4',
                'choices' => array(
                        '2'       => esc_html__('2 Columns', 'organia'),
                        '3'       => esc_html__('3 Columns', 'organia'),
                        '4'       => esc_html__('4 Columns', 'organia')
                ),
        ),
        'shop_tags_sidebar'              => array(
                'label'   => esc_html__('Sidebar Position', 'organia'),
                'type'    => 'select',
                'value'   => '1',
                'choices' => array(
                        '1'      => esc_html__('Full Width','organia'),
                        '2'      => esc_html__('Left Sidebar','organia'),
                        '3'      => esc_html__('Right Sidebar','organia'),
                ),
        ),
        'shop_tags_is_empty_rating'                    => array(
                'label'        => esc_html__( 'Is Empty Rating?', 'organia' ),
                'type'         => 'switch',
                'desc'         => esc_html__( 'Dow you want to show empty rating start where thers is no rating available for the product?', 'organia' ),
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2'
        ),
        'shop_tags_is_flashlabels'                    => array(
                'label'        => esc_html__( 'Is Flash Lebels?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2'
        ),
        'shop_tags_is_wishlist'                    => array(
                'label'        => esc_html__( 'Is Wishlist?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2'
        ),
        'shop_tags_is_compare'                    => array(
                'label'        => esc_html__( 'Is Compare?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2'
        ),
        'shop_tags_is_quickview'                    => array(
                'label'        => esc_html__( 'Is Quick View?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2'
        ),
        'shop_tags_is_pricing_unit'                    => array(
                'label'        => esc_html__( 'Is Pricing Unit?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2'
        ),
        'shop_tags_is_res_count'                    => array(
                'label'        => esc_html__( 'Is Result Count?', 'organia' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'organia' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'organia' )
                ),
                'value'        => '2'
        ),
        'shop_tags_pagi_align'              => array(
                'label'   => esc_html__('Pagination Alignment', 'organia'),
                'type'    => 'select',
                'value'   => 'center',
                'choices' => array(
                        'left'      => esc_html__('Left','organia'),
                        'center'    => esc_html__('Center','organia'),
                        'right'     => esc_html__('Right','organia'),
                ),
        ),
        
    
        
        'shop_tags_html_04' => array(
                'type'  => 'html-full',
                'value' => '',
                'attr'  => array( 'class' => 'custom-class' ),
                'label' => '',
                'html'  => '<div class="customizer_label displayBlocks">'.esc_html__('Bottom Block Settings', 'organia').'</div>',
        ),
        'shop_tags_show_bottom_blocks'                    => array(
                'label'        => esc_html__( 'Show Bottom Blocks?', 'organia' ),
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
                'desc'         => esc_html__('Do you want to show bottom blocks? Then please turn it to Yes.', 'organia'),
        ),
        'shop_tags_bottom_blocks' => array(
                'type'  => 'addable-box',
                'value' => array( ),
                'label' => esc_html__('Bottom Blocks', 'organia'),
                'desc'  => esc_html__('Add blocks if you want to show on bottom of tag page.', 'organia'),
                'box-options' => array(
                    'bottom_blocks' => array( 
                        'label'   => esc_html__( 'Blocks', 'organia' ),
                        'type'    => 'short-select',
                        'value'   => '0',
                        'choices' => organia_post_array('blocks', esc_html__('Select Block', 'organia')),
                    ),
                ),
                'template' => '{{- bottom_blocks }}',
                'add-button-text' => esc_html__('Add Block', 'organia'),
                'sortable' => true
        ),
);