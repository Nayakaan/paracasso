<?php if($is_topbar == 'yes'): ?>
<!-- Header Topbar -->
<section class="topbar02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-md-6">
                <?php 
                    if(!empty($info_list)):
                        foreach($info_list as $ts):
                            $icons        = (isset($ts['icons']) ? $ts['icons'] : '');
                            $info_text    = (isset($ts['info_text']) ? $ts['info_text'] : '');
                            $info_url     = (isset($ts['info_url']['url']) ? $ts['info_url']['url'] : '');
                            $target       = $ts['info_url']['is_external'] ? ' target="_blank"' : '' ;
                            $nofollow     = $ts['info_url']['nofollow'] ? ' rel="nofollow"' : '' ;
                            
                            if($info_text != ''):
                                if($info_url != ''):
                                    ?>
                                    <a <?php echo esc_attr($target.' '.$nofollow); ?> class="info" href="<?php echo esc_url($info_url); ?>"><?php if($icons != ''): ?><i class="<?php echo esc_attr($icons); ?>"></i><?php endif; ?><?php echo wp_kses_post($info_text); ?></a>
                                    <?php
                                else:
                                    ?>
                                    <p><?php if($icons != ''): ?><i class="<?php echo esc_attr($icons); ?>"></i><?php endif; ?><?php echo wp_kses_post($info_text); ?></p>
                                    <?php
                                endif;
                            endif;
                        endforeach;
                    endif;
                ?>
            </div>
            <div class="col-md-6">
                <div class="tbaccess">
                    <?php if($is_location == 'yes' && !empty($location_list)): ?>
                        <div class="office_locations">
                            <?php $i = 1; foreach($location_list as $hol): ?>
                                <?php
                                    $ol_flag       = (isset($hol['flag']['url']) && $hol['flag']['url'] != '' ? $hol['flag']['url'] : '');
                                    $lacation_name = (isset($hol['lacation_name']) && $hol['lacation_name'] != '' ? $hol['lacation_name'] : '');
                                    $lacation_url  = (isset($hol['lacation_url']['url']) && $hol['lacation_url']['url'] != '' ? $hol['lacation_url']['url'] : '#');
                                    if($i == 1 && $ol_flag != '' && $lacation_name != ''):
                                ?>
                                <a href="<?php echo esc_url($lacation_url) ?>"><img src="<?php echo esc_url($ol_flag); ?>" alt="<?php echo esc_attr($lacation_name); ?>"/><span><?php echo esc_html($lacation_name); ?></span></a>
                            <?php $i++; endif; endforeach; ?>
                            <div class="all_off_locations">
                                <?php $i = 1; foreach($location_list as $hol): ?>
                                    <?php
                                        $ol_flag       = (isset($hol['flag']['url']) && $hol['flag']['url'] != '' ? $hol['flag']['url'] : '');
                                        $lacation_name = (isset($hol['lacation_name']) && $hol['lacation_name'] != '' ? $hol['lacation_name'] : '');
                                        $lacation_url  = (isset($hol['lacation_url']['url']) && $hol['lacation_url']['url'] != '' ? $hol['lacation_url']['url'] : '#');
                                        if($i > 1 && $ol_flag != '' && $lacation_name != ''):
                                    ?>
                                    <a href="<?php echo esc_url($lacation_url) ?>"><img src="<?php echo esc_url($ol_flag); ?>" alt="<?php echo esc_attr($lacation_name); ?>"/><span><?php echo esc_html($lacation_name); ?></span></a>
                                <?php  endif; $i++; endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <ul>
                        <?php if($is_login != '' && class_exists('WooCommerce')): ?>
                            <li>
                                <?php
                                $mycc = get_option('woocommerce_myaccount_page_id');
                                if (!is_user_logged_in()): ?>
                                    <a class="login" href="<?php echo esc_url(get_the_permalink($mycc)); ?>">
                                        <i class="twi-user"></i><?php echo esc_html($login_label); ?>
                                    </a>
                                <?php else: ?>
                                    <a class="login" href="<?php echo esc_url(get_the_permalink($mycc)); ?>">
                                        <i class="twi-user"></i><?php echo esc_html(get_the_title($mycc)); ?>
                                    </a>
                                    <ul class="account_list">
                                        <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                                            <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                                                <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Header Topbar -->
<?php endif; ?>
<?php if($is_middle == 'yes'): ?>
<!-- Header Middle -->
<section class="headerMiddle <?php if($is_gradian_color == 'yes'): ?>hmd05<?php endif; ?>">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-5 col-lg-3 col-md-4">
                <div class="logo">
                    <?php if (!empty($md_logo)): ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($md_logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                        </a>
                    <?php else: ?>
                        <a class="text" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="<?php if($is_info_box == 'yes'): ?>col-xl-5 col-lg-6 col-md-8<?php else: ?>col-xl-7 col-lg-9 col-md-8<?php endif; ?>">
            <?php $cats = organia_category_array('product_cat', 'All Category', 'DESC', 'ID', 1, 'slug'); ?>
            <?php if($is_search == 'yes'): ?>
                <div class="search-product ajax-search-product">
                    <form class="d-flex" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" name="s" placeholder="<?php if($input_placeholder != ''): echo esc_attr($input_placeholder); else: echo esc_attr__(''.get_totalcount_product().' Products Search. Hit enter...', 'organia'); endif; ?>" autocomplete="off">
                        <input type="hidden" name="post_type" value="product"/>
                        <span class="organia-loading <?php echo esc_attr($is_cat_search != 'yes' ? 'noCat' : ''); ?>"><i class="twi-spinner2"></i></span>
                        <?php if($is_cat_search == 'yes'): ?>
                        <div class="search-category">
                            <select name="product_cat">
                                <option value=""><?php echo esc_html($cat_search_label); ?></option>
                                <?php if (is_array($cats) && !empty($cats)): unset($cats[0]); ?>
                                    <?php foreach ($cats as $term_id => $cat):?>
                                        <option value="<?php echo esc_attr($term_id); ?>"><?php echo esc_html($cat); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <?php endif; ?>
                    </form>
                    <div class="organia-serach_wrapper">
                    </div>
                </div>
            <?php endif; ?>
            </div>
            <?php if($is_info_box == 'yes'): ?>
            <div class="col-xl-2 col-lg-3 col-md-4 cusmm">
                <div class="midIconBox">
                    <?php if($i_icons != ''): ?>
                        <i class="<?php echo esc_attr($i_icons); ?>"></i>
                    <?php endif; ?>
                    <?php if($i_label != ''): ?>
                        <h5><?php echo wp_kses_post($i_label); ?></h5>
                    <?php endif; ?>
                    <?php if($i_value != ''): ?>
                        <p><?php echo wp_kses_post($i_value); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Header Middle -->
<?php endif; ?>
<?php if($is_header == 'yes'): ?>
<!-- Header Start -->
<header class="header02 <?php if($is_sticky == 'yes'): ?>isSticky<?php endif; ?>">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="navBar01">
                    <?php if($is_category == 'yes'): ?>
                    <div class="all-categories-dropdown dropdown02">
                        <a class="select categoryToggle" href="javascript:void(0)">
                            <span></span>
                            <?php echo esc_html($cat_label); ?>
                        </a>
                        <?php if (is_array($select_category) && !empty($select_category)):  ?>
                        <div class="categorie-list">
                            <ul>
                                <?php foreach ($select_category as $cat):
                                    $category     = get_term_by('id', $cat, 'product_cat');
                                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                    $image        = wp_get_attachment_url( $thumbnail_id );
                                    $cat_url      =  get_category_link($category);
                                    ?>
                                    <li><a href="<?php echo esc_url($cat_url); ?>"><span class="thumb"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($cat); ?>"/></span><?php echo esc_html($category->name); ?></a><span>( <?php echo esc_html($category->count); ?> <?php echo esc_html__('Items', 'organia') ?> )</span></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php if($cat_rm_label != ''): ?>
                                <a class="others" href="<?php echo esc_url($cat_rm_url); ?>">
                                    <span><?php echo esc_html__('+', 'themewar'); ?></span> <?php echo esc_html($cat_rm_label); ?></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <nav class="mainMenu">
                        <?php
                            if (has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'primary-menu',
                                    'container' => FALSE,
                                    'menu_class' => '',
                                    'menu_id' => '',
                                    'echo' => true
                                ));
                            } else {
                                if(is_user_logged_in()){
                                    echo '<ul>';
                                    echo '<li><a href="javascript:void(0)">' . esc_html__('No Menu', 'organia') . '</a></li>';
                                    echo '</ul>';
                                }
                            }
                        ?>
                    </nav>
                    <div class="accessNav">
                        <a href="javascript:void(0);" class="menuToggler"><i class="twi-bars1"></i></a>
                        <?php if($is_wishlist == 'yes' && class_exists( 'YITH_WCWL')): ?>
                            <a class="wishlistBtn" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><i class="twi-heart1"></i><span><?php echo YITH_WCWL()->count_products(); ?></span></a>
                        <?php endif; ?>
                        <?php if($is_cart == 'yes' && class_exists('woocommerce')): global $woocommerce; ?>
                            <div class="shoping_cart">
                                <a class="cartBtn organia_aj_cart" href="javascript:void(0);"><i class="twi-shopping-bag1"></i><span><?php echo Tw_Assistance_Helpers::mini_cart_count();?></span></a>
                                    <?php if($is_mini_cart == 'yes'): ?>
                                        <div class="show_cart_area">
                                            <div class="mini_cart widget_shopping_cart_content">
                                                <?php
                                                if(function_exists('woocommerce_mini_cart')):
                                                    if ( ! empty( WC()->cart) ) {
                                                         woocommerce_mini_cart(); 
                                                    }
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
<?php endif; ?>

<!-- Begin:: Mobile Menu -->
<section class="sidebarMenu">
    <div class="sidebarMenuOverlay"></div>
    <div class="SMArea">
        <div class="SMAHeader">
            <h3>
                <i class="twi-bars1"></i> <?php echo esc_html__('Menu', 'organia') ?>
            </h3>
            <a href="javascript:void(0);" class="SMACloser"><i class="twi-times2"></i></a>
        </div>
        <div class="SMABody">
        <?php
            if (has_nav_menu('primary-menu') || has_nav_menu('mobile-menu')) {
                wp_nav_menu(array(
                    'theme_location' => (has_nav_menu('mobile-menu') ?  'mobile-menu' : 'primary-menu'),
                    'container' => FALSE,
                    'menu_class' => '',
                    'menu_id' => '',
                    'echo' => true
                ));
            } else {
                if(is_user_logged_in()){
                    echo '<ul>';
                    echo '<li><a href="javascript:void(0)">' . esc_html__('No Menu', 'organia') . '</a></li>';
                    echo '</ul>';
                }
            }
            ?>
        </div>
    </div>
</section>
<!-- End:: Mobile Menu -->