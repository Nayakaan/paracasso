<?php if ($is_topbar == 'yes'): ?>
    <!-- Header Topbar -->
    <section class="topbar01">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12">
                    <div class="topbarBG">
                        <div class="tpdesc">
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
                                            <p><?php if ($icons != ''): ?><i class="<?php echo esc_attr($icons); ?>"></i><?php endif; ?><?php echo wp_kses_post($info_text); ?></p>
                                        <?php
                                        endif;
                                    endif;
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="tosocial">
                            <?php
                            if (!empty($s_list)):
                                foreach ($s_list as $sl):
                                    $s_icons = (isset($sl['s_icons']) ? $sl['s_icons'] : '');
                                    $s_url = (isset($sl['s_url']['url']) ? $sl['s_url']['url'] : '');
                                    $target = $sl['s_url']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $sl['s_url']['nofollow'] ? ' rel="nofollow"' : '';

                                    if ($s_icons != ''):
                                        ?>
                                        <a <?php echo esc_attr($target . ' ' . $nofollow); ?> href="<?php echo esc_url($s_url); ?>"><i class="<?php echo esc_attr($s_icons); ?>"></i></a>
                                    <?php
                                    endif;
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Header Topbar -->
<?php endif; ?>
<?php if ($is_header == 'yes'): ?>
    <!-- Header Start -->
    <header class="header01 <?php if ($is_sticky == 'yes'): ?>isSticky<?php endif; ?>">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navBar01">
                        <div class="logo">
                            <?php if (!empty($logo)): ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url($logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                                </a>
                            <?php else: ?>
                                <a class="text" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                            <?php endif; ?>
                        </div>
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
                            <?php if ($is_serch == 'yes'): ?>
                                <a class="searchBtn" href="javascript:void(0);"><i class="twi-search1"></i></a>
                            <?php endif; ?>
                            <?php if ($is_wishlist == 'yes' && class_exists('YITH_WCWL')): ?>
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
                        <?php $cats = organia_category_array('product_cat', 'All Category', 'DESC', 'ID', 1, 'slug'); ?>
                        <?php if ($is_serch == 'yes'): ?>
                            <div class="header01SearchBar ajax-search-product">
                                <form class="d-flex" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="search" name="s" placeholder="<?php if($inpul1_placeholder != ''): echo esc_attr($inpul1_placeholder); else: echo esc_attr__(''.get_totalcount_product().' Products Search. Hit enter...', 'organia'); endif; ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
                                    <input type="hidden" name="post_type" value="product"/>
                                    <span class="organia-loading <?php echo esc_attr($is_cat_serch != 'yes' ? 'noCat' : ''); ?>"><i class="twi-spinner2"></i></span>
                                    <?php if ($is_cat_serch == 'yes'): ?>
                                    <div class="search-category">
                                        <select name="product_cat">
                                            <option value=""><?php echo esc_html($ct_btn_label); ?></option>
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