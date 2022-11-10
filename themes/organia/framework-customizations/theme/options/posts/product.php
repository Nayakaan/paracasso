<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }
$options = array(
        '_product_meta_01' => array(
                'title'          => esc_html__( 'Fresh & Features', 'organia' ),
                'type'           => 'box',
                'priority'       => 'high',
                'context'        => 'side',
                'options'        => array(
                        '_is_fresh'                    => array(
                                'label'        => esc_html__( 'Is Fresh?', 'organia' ),
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
                                'desc'         => esc_html__('Do you count this product as a fresh product? Then please turn it to Yes.', 'organia'),
                        ),
                        'product_features' => array(
                                'type'  => 'addable-box',
                                'value' => array( ),
                                'label' => esc_html__('Product Features', 'organia'),
                                'desc'  => esc_html__('Add product features here. These features will show on product list view only.', 'organia'),
                                'box-options' => array(
                                    'features' => array( 'type' => 'text' ),
                                ),
                                'template' => '{{- features }}',
                                'limit' => 3,
                                'add-button-text' => esc_html__('Add Feature', 'organia'),
                                'sortable' => true
                        )
                ),
        ),
        '_product_meta' => array(
                'title'          => esc_html__( 'Secondary Image', 'organia' ),
                'type'           => 'box',
                'priority'       => 'low',
                'context'        => 'side',
                'options'        => array(
                        '_secondary_image'      => array(
                                'type'	 => 'upload',
                                'label'	 => false,
                                'desc'	 => esc_html__( 'Upload secondary featured image for this product.', 'organia' ),
                        ),
                ),
        ),
	'main' => array(
		'title'   => esc_html__( 'Product Settings', 'organia' ),
		'type'    => 'box',
		'options' => array(
			'_product_meta' => array(
                                'title'		 => esc_html__( 'Banner Settings', 'organia' ),
                                'type'		 => 'tab',
                                'options'	 => array(
                                        'shop_pros_is_settings'                    => array(
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
                                                'desc'         => esc_html__('Enable bellow settings for this product details page banner. All settings will override customizer "Shop Product Settings" banner options.', 'organia'),
                                        ),
                                        'shop_pros_is_banner'                    => array(
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
                                                'desc'         => esc_html__('Do you want to hide banner only for this product details page? Then please turn it to Hide.', 'organia'),
                                        ),
                                        'shop_pros_banner_bg'	 => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'organia' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image.', 'organia' ),
                                        ),
                                        'shop_pros_banner_color'   => array(
                                                'type'  => 'rgba-color-picker',
                                                'value' => '',
                                                'palettes' => array(),
                                                'label' => esc_html__('Banner BG Color', 'organia'),
                                                'desc'  => esc_html__('Insert your page banner bg color here.', 'organia'),
                                        ),
                                        'shop_pros_is_baner_title'                    => array(
                                                'label'        => esc_html__( 'Is Banner Title?', 'organia' ),
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
                                                'desc'         => esc_html__('Do you want to show page banner title?', 'organia'),
                                        ),
                                        'shop_pros_banner_title'		 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'organia' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'organia' ),
                                        ),
                                        'shop_pros_is_breadcrumb'                    => array(
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
                                        'shop_pros_banner_alignment'                    => array(
                                                'label'         => esc_html__( 'Banner Alignment', 'organia' ),
                                                'type'          => 'short-select',
                                                'value'         => 'left',
                                                'desc'          => esc_html__( 'Select your page banner text alignment.', 'organia' ),
                                                'choices'       => array(
                                                        'left'         => esc_html__( 'Left', 'organia' ),
                                                        'center'       => esc_html__( 'Center', 'organia' ),
                                                        'right'        => esc_html__( 'Right', 'organia' ),
                                                ),
                                        ),
                                ),
                        ),

                        '_prod_content' => array(
                                'title' => esc_html__('Template And Content Settings', 'organia'),
                                'type' => 'tab',
                                'options' => array(
                                        'shop_pros_enable_settings'                    => array(
                                                'label'        => esc_html__( 'Enable Settings?', 'organia' ),
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
                                        ),
                                        'shop_pros_view_style'              => array(
                                                'label'   => esc_html__( 'Product View Style', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'setup your single product view style.', 'organia' ),
                                                'choices' => array(
                                                        '1'     => esc_html__( 'View Style 01', 'organia' ),
                                                        '2'     => esc_html__( 'View Style 02', 'organia' ),
                                                        '3'     => esc_html__( 'View Style 03', 'organia' ),
                                                ),
                                        ),
                                        'shop_pros_gal_style'              => array(
                                                'label'   => esc_html__( 'Gallery Style', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your gallery position style.', 'organia' ),
                                                'choices' => array(
                                                        '1'     => esc_html__( 'Gallery In Left', 'organia' ),
                                                        '2'     => esc_html__( 'Gallery In Right', 'organia' )
                                                ),
                                        ),
                                        'shop_pros_is_pricing_unit'   => array(
                                                'label'        => esc_html__( 'Is Pricing Unit?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_sku'   => array(
                                                'label'        => esc_html__( 'Is SKU?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_tags'   => array(
                                                'label'        => esc_html__( 'Is Tags?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_cats'   => array(
                                                'label'        => esc_html__( 'Is Categories?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_share'   => array(
                                                'label'        => esc_html__( 'Is Share?', 'organia' ),
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
                                        ),
                                        'shop_pros_socials'    => array(
                                                'label'        => esc_html__( 'Select Social Media', 'organia' ),
                                                'type'         => 'checkboxes',
                                                'value'        => array(),
                                                'choices'      => array(
                                                        '1'   => esc_html__( 'Facebook', 'organia' ),
                                                        '2'   => esc_html__( 'Twitter', 'organia' ),
                                                        '3'   => esc_html__( 'Email', 'organia' ),
                                                        '4'   => esc_html__( 'LinkedIn', 'organia' ),
                                                        '5'   => esc_html__( 'Pinterest', 'organia' ),
                                                        '6'   => esc_html__( 'Whatsapp', 'organia' ),
                                                        '7'   => esc_html__( 'Digg', 'organia' ),
                                                        '8'   => esc_html__( 'Tumblr', 'organia' ),
                                                        '9'   => esc_html__( 'Reddit', 'organia' ),
                                                )
                                        ),
                                        'shop_pros_is_upsell'  => array(
                                                'label'        => esc_html__( 'Is Upsell Product?', 'organia' ),
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
                                        ),
                                        'shop_pros_upsell_title'   => array(
                                                'label'        => esc_html__( 'Upsell Title', 'organia' ),
                                                'type'         => 'text',
                                                'value'        => ''
                                        ),
                                        'shop_pros_upsell_style'              => array(
                                                'label'   => esc_html__( 'Upsell Style', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your upsell product view style.', 'organia' ),
                                                'choices' => array(
                                                        '1'     => esc_html__( 'Style 01', 'organia' ),
                                                        '2'     => esc_html__( 'Style 02', 'organia' )
                                                ),
                                        ),
                                        'shop_pros_is_related'                    => array(
                                                'label'        => esc_html__( 'Is Related Product?', 'organia' ),
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
                                        ),
                                        'shop_pros_related_sub_title'                    => array(
                                                'label'        => esc_html__( 'Related Sub Title', 'organia' ),
                                                'type'         => 'text',
                                                'value'        => ''
                                        ),
                                        'shop_pros_related_title'                    => array(
                                                'label'        => esc_html__( 'Related Title', 'organia' ),
                                                'type'         => 'text',
                                                'value'        => ''
                                        ),
                                        'shop_pros_related_style'              => array(
                                                'label'   => esc_html__( 'Related Style', 'organia' ),
                                                'type'    => 'short-select',
                                                'value'   => '1',
                                                'desc'    => esc_html__( 'Select your related product view style.', 'organia' ),
                                                'choices' => array(
                                                        '1'     => esc_html__( 'Style 01', 'organia' ),
                                                        '2'     => esc_html__( 'Style 02', 'organia' )
                                                ),
                                        ),
                                        'shop_pros_is_empty_rating' => array(
                                                'label'        => esc_html__( 'Is Empty Rating?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_flashlabels' => array(
                                                'label'        => esc_html__( 'Is Flash Lebels?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_wishlist' => array(
                                                'label'        => esc_html__( 'Is Wishlist?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_compare' => array(
                                                'label'        => esc_html__( 'Is Compare?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_quickview' => array(
                                                'label'        => esc_html__( 'Is Quick View?', 'organia' ),
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
                                        ),
                                        'shop_pros_is_priceunit' => array(
                                                'label'        => esc_html__( 'Is Pricing Unit?', 'organia' ),
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
                                        ),
                                )
                        )
		),
	),
);
