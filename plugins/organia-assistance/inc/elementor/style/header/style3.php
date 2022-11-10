<?php if ($is_topbar == 'yes'): ?>
    <!-- Header Topbar -->
    <section class="topbar03">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (!empty($info_list)):
                        foreach ($info_list as $ts):
                            $icons = (isset($ts['icons']) ? $ts['icons'] : '');
                            $info_text = (isset($ts['info_text']) ? $ts['info_text'] : '');
                            $info_url = (isset($ts['info_url']['url']) ? $ts['info_url']['url'] : '');
                            $target = $ts['info_url']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $ts['info_url']['nofollow'] ? ' rel="nofollow"' : '';

                            if ($info_text != ''):
                                if ($info_url != ''):
                                    ?>
                                    <a <?php echo esc_attr($target . ' ' . $nofollow); ?> class="info" href="<?php echo esc_url($info_url); ?>"><?php if ($icons != ''): ?><i class="<?php echo esc_attr($icons); ?>"></i><?php endif; ?><?php echo wp_kses_post($info_text); ?></a>
                                <?php
                                else:
                                    ?>
                                    <p class="info"><?php if ($icons != ''): ?><i class="<?php echo esc_attr($icons); ?>"></i><?php endif; ?><?php echo wp_kses_post($info_text); ?></p>
                                <?php
                                endif;
                            endif;
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="col-md-6">
                    <div class="tbaccess">
                        <?php
                        if (!empty($settings['tw_topnav_menu'])) {
                            wp_nav_menu(array(
                                'menu' => $settings['tw_topnav_menu'],
                                'container' => FALSE,
                                'menu_class' => '',
                                'menu_id' => '',
                                'echo' => true
                            ));
                        } else {
                            if(is_user_logged_in()){
                                echo '<ul>';
                                echo '<li><a href="javascript:void(0)">' . esc_html__('Select Topbar Menu', 'themewar') . '</a></li>';
                                echo '</ul>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Header Topbar -->
<?php endif; ?>
<?php if ($is_middle == 'yes'): ?>
    <!-- Header Middle -->
    <section class="headerMiddle hm02">
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
                <div class="col-xl-5 col-lg-6 col-md-5">
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
                <div class="col-xl-2 col-lg-3 col-md-3">
                    <div class="accessNav">
                        <?php if ($is_logins == 'yes' && class_exists('woocommerce')): global $woocommerce; ?>
                            <a class="userBtn" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><i class="twi-user1"></i></a>
                        <?php endif; ?>
                        <?php if ($is_wishlists == 'yes' && class_exists('YITH_WCWL')): ?>
                            <a class="wishlistBtn" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><i class="twi-heart1"></i><span><?php echo YITH_WCWL()->count_products(); ?></span></a>
                        <?php endif; ?>
                        <?php if ($is_carts == 'yes' && class_exists('woocommerce')): global $woocommerce; ?>
                            <div class="shoping_cart">
                                <a class="cartBtn organia_aj_cart" href="javascript:void(0);"><i class="twi-shopping-bag1"></i><span><?php echo Tw_Assistance_Helpers::mini_cart_count(); ?></span></a>
                                <?php if ($is_mini_carts == 'yes'): ?>
                                    <div class="show_cart_area">
                                        <div class="mini_cart widget_shopping_cart_content">
                                            <?php
                                            if (function_exists('woocommerce_mini_cart')):
                                                if (!empty(WC()->cart)) {
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
    </section>
    <!-- Header Middle -->
<?php endif; ?>
<?php if ($is_header == 'yes'): ?>
    <!-- Header Start -->
    <header class="header03 <?php if ($is_sticky == 'yes'): ?>isSticky<?php endif; ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navBar01">
                        <?php if ($is_category == 'yes'): ?>
                            <div class="all-categories-dropdown">
                                <a class="select categoryToggle" href="javascript:void(0)">
                                    <span></span>
                                    <?php echo esc_html($cat_label); ?>
                                    <i class="twi-angle-down"></i>
                                </a>
                                <?php if (is_array($select_category) && !empty($select_category)): ?>
                                    <div class="categorie-list">
                                        <ul>
                                            <?php foreach ($select_category as $cat):
                                                $category = get_term_by('id', $cat, 'product_cat');
                                                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                                $image = wp_get_attachment_url($thumbnail_id);
                                                $cat_url = get_category_link($category);
                                                ?>
                                                <li><a href="<?php echo esc_url($cat_url); ?>"><span class="thumb"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($cat); ?>"/></span><?php echo esc_html($category->name); ?></a><span>( <?php echo esc_html($category->count); ?> <?php echo esc_html__('Items', 'organia') ?> )</span></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php if ($cat_rm_label != ''): ?>
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
                        <a href="javascript:void(0);" class="menuToggler"><i class="twi-bars1"></i></a>
                        <?php if ($is_info_boxs == 'yes'): ?>
                            <div class="midIconBox">
                                <?php if ($i_iconss != ''): ?>
                                    <i class="<?php echo esc_attr($i_iconss); ?>"></i>
                                <?php endif; ?>
                                <?php if ($i_labels != ''): ?>
                                    <h5><?php echo wp_kses_post($i_labels); ?></h5>
                                <?php endif; ?>
                                <?php if ($i_values != ''): ?>
                                    <p><?php echo wp_kses_post($i_values); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
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