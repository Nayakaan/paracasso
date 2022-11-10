<?php
$fields[] = array(
    'type'        => 'typography',
	'settings'    => 'primary_fonts',
	'label'       => esc_html__( 'Primary Typography', 'organia' ),
	'section'     => 'font_section',
	'default'     => [
        'font-family'    => '',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body, .header01SearchBar input[type="search"], .search-product input[type="search"], body .widget_shopping_cart_content ul li .mc_item .pi01Price, .lkbook_content02 h3, .cate_content, .withbg li, .standard .blogContent p, .sic_the_content blockquote::before, .list_pro_content ul, .icon_box_07 h3',
		],
	],
    'description'   => esc_html__('Primary typography by default effect on each element under boody excepts some special elements those are under Secondary Typography.', 'organia')
);
$fields[] = array(
    'type'               => 'typography',
	'settings'           => 'secondary_fonts',
	'label'              => esc_html__( 'Secondary Typography', 'organia' ),
	'section'            => 'font_section',
	'default'            => [
        'font-family'    => '',
	],
	'transport'         => 'auto',
	'output'            => [
        [
            'element'  => 'h1, h2, h3, h4, h5, h6, .subTitle, .organ_btn, .topbarBG, .navBar01, .SMArea, .icon_box_03, .icon_box_01, .cateItem, .organTab li a, .filter_menu li, .productItem01, .pi01Price, .ratedItem01, .productItem02, .pstock, .psold, .commoncount, .filterMenu li a, .timerTitle, .productItem03, .blogItem01, .contactbox, .topbar02, .headerMiddle, .widget_shopping_cart_content p.total, .listItem li, .productItem04, .productItem05, .offerexpire, .fact_01, .productItem06, .onlybtn, .tmContent, .topbar03, .filter_menu02 li, .productItem07, .productItem08, .blogItem02, .testmonialItem .quote, .tsauthor, .btn_position.SubsrcribeForm .yikes-easy-mc-form .yikes-easy-mc-submit-button, .copyright, .siteInfo, .breadcrumbs, .organ_pagination, .pp_post_item span, .sidebar ol li, .sidebar ul li, .bannerContent, .sic_the_content blockquote, .sic_the_content blockquote.wp-block-quote, .tags, .single_comment .cm_date, .comment-reply-link, .commentForm input[type="email"], .commentForm input[type="url"], .commentForm input[type="tel"], .commentForm textarea, .filterBy, .sorting, .productItemlist, .woocommerce .widget_price_filter .price_slider_amount, .tagcloud a, .qty_weight .quantity label, .woocommerce div.product form.cart .variations label, .woocommerce div.product .reset_variations, .woocommerce-variation-price, .product_tabarea .productTabs li a, .product_tabarea .additional_information table tr th, .product_tabarea .additional_information table tr td, .mtItem02, .contact_form, .contetn_404 input[type="search"], .ss_parent span, .woocommerce .woocommerce-message .button, .woocommerce .return-to-shop .button, .woocommerce .cartPage, body .select2-results__option, .create-account label, #ship-to-different-address label, .woocommerce .woocommerce-checkout-payment ul li input[type="radio"] ~ label, .woocommerce ul.order_details li strong, .woocommerce .woocommerce-form-login .woocommerce-form-login__rememberme, .woocommerce-account .woocommerce-MyAccount-navigation ul, .woocommerce .woocommerce-MyAccount-content .woocommerce-info .button, .woocommerce .woocommerce-MyAccount-content table.shop_table tbody tr td .button, .woocommerce-account .addresses .title .edit, span.rating-count, .org_pro_tab li.tabStyle_1 a, .org_pro_tab li.tabStyle_2 a, .filter_menu03 li, .mainMenu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.mega-menu-item > a.mega-menu-link, .loaderO span, .loginTab li a, .woocommerce .widget_price_filter .price_slider_amount .button, .woocommerce.yith-wcwl-form.wishlist-fragment, .woocommerce .product_details.qickDetails form.cart .variations td.label, .woocommerce .product_details.qickDetails .reset_variations, .woocommerce div.product form.cart .group_table td, .woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__label, .woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__price, .icon_box_07 .organ_btn, .ctaOffer .woocommerce a.added_to_cart.wc-forward, .ctaOffer a.gradinBtn, .ctaOffer .woocommerce a.organia-add-to-cart, .orgoTab05 li a, .rmBtn a, .productItem10 .pdq_main.loopQty input[type="number"], .productItem10 .pdq_main.loopQty button.loopqQtyBtn, .categoryBox span, .productItem09 .prLabels, .org_pro_tab.grNavigation, .woocommerce .productItem11 .product_content04 a.added_to_cart.wc-forward, .woocommerce .productItem11 .product_content04 .organia-add-to-cart',
            'property' => 'font-family'
        ]
	],
    'description'      => esc_html__('This typography settings only for those special elements and Its only used Font Family from options.', 'organia')
);