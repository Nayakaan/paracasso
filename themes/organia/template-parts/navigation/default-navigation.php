<?php
/**
 * Displays Defeault header navigation
 */

$header_is_topbar = get_theme_mod('header_is_topbar', 2);
$header_topbar_info = get_theme_mod('header_topbar_info', '');

$header_is_locations = get_theme_mod('header_is_locations', 2);
$header_off_locations = get_theme_mod('header_off_locations', array());

$header_is_login = get_theme_mod('header_is_login', 2);
$btn_label = get_theme_mod('btn_label', esc_html__('Login', 'organia'));

$header_is_hmiddle = get_theme_mod('header_is_hmiddle', 2);
$header_is_search = get_theme_mod('header_is_search', 2);
$header_is_cat_search = get_theme_mod('header_is_cat_search', 2);
$header_is_infobox = get_theme_mod('header_is_infobox', 2);
$info_label = get_theme_mod('info_label', '');
$info_value = get_theme_mod('info_value', '');
$header_is_category = get_theme_mod('header_is_category', 2);
$select_category = get_theme_mod('select_category', array());
$category_label = get_theme_mod('category_label', esc_html__('All Categories', 'organia'));
$category_more_label = get_theme_mod('category_more_label', '');
$category_more_url = get_theme_mod('category_more_url', '');
$header_is_wishlist = get_theme_mod('header_is_wishlist', 2);
$header_is_cart = get_theme_mod('header_is_cart', 2);


$header_is_sticky = get_theme_mod('header_is_sticky', 2);
$header_logo = get_theme_mod('header_logo', '');
$header_logos = get_theme_mod('header_logos', '');
$select_type = get_theme_mod('select_type', 1);

$cats = organia_category_array('product_cat', 'All Category', 'DESC', 'ID', 1, 'slug');
$right = '';
if ($header_is_cart != 1 && $header_is_wishlist != 1) {
    $right = 'dRight';
}

?>
<?php if ($header_is_topbar == 1): ?>
    <!-- Header Topbar -->
    <section class="topbar02">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <?php if ($header_topbar_info != ''): ?>
                        <p><?php echo organia_kses($header_topbar_info); ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="tbaccess">
                        <?php if ($header_is_locations == 1 && !empty($header_off_locations)): ?>
                            <div class="office_locations">
                                <?php $i = 1;
                                foreach ($header_off_locations as $hol): ?>
                                    <?php
                                    $ol_flag = (isset($hol['ol_flag']) && $hol['ol_flag'] != '' ? $hol['ol_flag'] : '');
                                    $ol_name = (isset($hol['ol_name']) && $hol['ol_name'] != '' ? $hol['ol_name'] : '');
                                    $ol_url = (isset($hol['ol_url']) && $hol['ol_url'] != '' ? $hol['ol_url'] : '#');
                                    if ($i == 1 && $ol_flag != '' && $ol_name != ''):
                                        ?>
                                        <a href="<?php echo esc_url($ol_url) ?>"><img src="<?php echo organia_attachment_url($ol_flag, 'full'); ?>" alt="<?php echo esc_attr($ol_name); ?>"/><span><?php echo esc_html($ol_name); ?></span></a>
                                        <?php $i++; endif; endforeach; ?>
                                <div class="all_off_locations">
                                    <?php $i = 1;
                                    foreach ($header_off_locations as $hol): ?>
                                        <?php
                                        $ol_flag = (isset($hol['ol_flag']) && $hol['ol_flag'] != '' ? $hol['ol_flag'] : '');
                                        $ol_name = (isset($hol['ol_name']) && $hol['ol_name'] != '' ? $hol['ol_name'] : '');
                                        $ol_url = (isset($hol['ol_url']) && $hol['ol_url'] != '' ? $hol['ol_url'] : '#');
                                        if ($i > 1 && $ol_flag != '' && $ol_name != ''):
                                            ?>
                                            <a href="<?php echo esc_url($ol_url) ?>"><img src="<?php echo organia_attachment_url($ol_flag, 'full'); ?>" alt="<?php echo esc_attr($ol_name); ?>"/><span><?php echo esc_html($ol_name); ?></span></a>
                                        <?php endif;
                                        $i++; endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($header_is_login == 1 && class_exists('WooCommerce')): ?>
                            <ul>
                                <li>
                                    <?php
                                    $mycc = get_option('woocommerce_myaccount_page_id');
                                    if (!is_user_logged_in()): ?>
                                        <a class="login" href="<?php echo esc_url(get_the_permalink($mycc)); ?>">
                                            <i class="twi-user"></i><?php echo esc_html($btn_label); ?>
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
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Header Topbar -->
<?php endif; ?>
<?php if ($header_is_hmiddle == 1): ?>
    <!-- Header Middle -->
    <section class="headerMiddle">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-xl-5 col-lg-3 col-md-4">
                    <div class="logo">
                        <?php if (!empty($header_logo)): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                            </a>
                        <?php else: ?>
                            <a class="text" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="<?php if ($header_is_infobox == 1): ?>col-xl-5 col-lg-6 col-md-8<?php else: ?>col-xl-7 col-lg-9 col-md-8<?php endif; ?>">
                    <?php if ($header_is_search == 1): ?>
                        <div class="search-product ajax-search-product">
                            <form class="d-flex" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="search" name="s" placeholder="<?php echo get_totalcount_product().esc_attr__(' Products Search. Hit enter...', 'organia'); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
                                <input type="hidden" name="post_type" value="product"/>
                                <span class="organia-loading <?php echo esc_attr($header_is_cat_search != 1 ? 'noCat' : ''); ?>"><i class="twi-spinner2"></i></span>
                                <?php if ($header_is_cat_search == 1): ?>
                                    <div class="search-category">
                                        <select name="product_cat">
                                            <option value=""><?php esc_html_e('Select a Categories', 'organia'); ?></option>
                                            <?php if (is_array($cats) && !empty($cats)): unset($cats[0]); ?>
                                                <?php foreach ($cats as $term_id => $cat): ?>
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
                <?php if ($header_is_infobox == 1): ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 cusmm">
                        <div class="midIconBox">
                            <i class="<?php echo esc_attr__('twi-headphones-alt2', 'organia'); ?>"></i>
                            <?php if ($info_label != ''): ?>
                                <h5><?php echo esc_html($info_label); ?></h5>
                            <?php endif; ?>
                            <?php if ($info_value != ''): ?>
                                <p><?php echo esc_html($info_value); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Header Middle -->
<?php endif; ?>
<!-- Header Start -->
<header class="header02 defaultHeader <?php echo esc_attr($header_is_sticky == 1 ? 'isSticky' : ''); ?>">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="navBar01 <?php echo esc_attr($right); ?>">
                    <?php if ($select_type == 2): ?>
                        <?php if ($header_is_category == 1): ?>
                            <div class="all-categories-dropdown dropdown02">
                                <a class="select categoryToggle" href="javascript:void(0)">
                                    <span></span>
                                    <?php echo esc_html($category_label); ?>
                                </a>
                                <?php if (is_array($select_category) && !empty($select_category)): ?>
                                    <div class="categorie-list">
                                        <?php if (in_array('0', $select_category)) unset($select_category[0]); ?>
                                        <ul>
                                            <?php if (!empty($select_category)): ?>
                                                <?php foreach ($select_category as $cat):
                                                    $category = get_term_by('id', $cat, 'product_cat');
                                                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                                    $image = wp_get_attachment_url($thumbnail_id);
                                                    $cat_url = get_category_link($category);
                                                    ?>
                                                    <li><a href="<?php echo esc_url($cat_url); ?>"><span class="thumb"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($cat); ?>"/></span><?php echo esc_html($category->name); ?></a><span>( <?php echo esc_html($category->count); ?> <?php echo esc_html__('Items', 'organia') ?> )</span></li>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </ul>
                                        <?php if ($category_more_label != ''): ?>
                                            <a class="others" href="<?php echo esc_url($category_more_url); ?>">
                                                <span><?php echo esc_html__('+', 'organia'); ?></span> <?php echo esc_html($category_more_label); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="logo">
                            <?php if (!empty($header_logos)): ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url($header_logos); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                                </a>
                            <?php else: ?>
                                <a class="text" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
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
                        <?php if ($header_is_wishlist == 1 && class_exists('YITH_WCWL')): ?>
                            <a class="wishlistBtn" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><i class="twi-heart1"></i><span><?php echo YITH_WCWL()->count_products(); ?></span></a>
                        <?php endif; ?>
                        <?php if ($header_is_cart == 1 && class_exists('woocommerce')): global $woocommerce; ?>
                            <div class="shoping_cart">
                                <a class="cartBtn organia_aj_cart" href="javascript:void(0);"><i class="twi-shopping-bag1"></i><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'organia'), $woocommerce->cart->cart_contents_count); ?></span></a>
                               The thest <div class="show_cart_area">
                                    <div class="mini_cart widget_shopping_cart_content">
                                        <?php
                                        if (function_exists('woocommerce_mini_cart')):
                                            woocommerce_mini_cart();
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Begin:: Popup Menu -->
<section class="sidebarMenu">
    <div class="sidebarMenuOverlay"></div>
    <div class="SMArea">
        <div class="SMAHeader">
            <h3>
                <i class="twi-bars1"></i> <?php echo esc_html__('Menu', 'organia'); ?>
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
<!-- End:: Popup Menu -->