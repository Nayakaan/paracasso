<?php
    $fot_sidebars = get_theme_mod('fot_sidebars', array());
    if(empty($fot_sidebars)):
        $fot_sidebars = [
            [ 'fot_col_xl' => 'col-xl-4', 'offset_xl' => '', 'fot_col_lg' => 'col-lg-4', 'offset_lg' => '', 'fot_col_md' => 'col-md-4', 'fot_sidebar' => 'sidebar-4' ],
            [ 'fot_col_xl' => 'col-xl-4', 'offset_xl' => '', 'fot_col_lg' => 'col-lg-4','offset_lg' => '', 'fot_col_md' => 'col-md-4','fot_sidebar' => 'sidebar-5' ],
            [ 'fot_col_xl' => 'col-xl-4', 'offset_xl' => '', 'fot_col_lg' => 'col-lg-4', 'offset_lg' => '', 'fot_col_md' => 'col-md-4', 'fot_sidebar' => 'sidebar-6' ],
        ];
    endif;
    
    $is_mailchimp         = get_theme_mod('is_mailchimp', 2);
    $select_mail          = get_theme_mod('select_mail', 0);
    $mail_title           = get_theme_mod('mail_title', esc_html__('Newsletter Signup', 'organia'));
    $animated_image       = get_theme_mod('animated_image', '');
    
    $copy_site_info       = get_theme_mod('copy_site_info', date('Y').' &copy; '.get_bloginfo('name').'. '.esc_html__(' All Rights Reserved.', 'organia'));
    $copy_social_links    = get_theme_mod('copyright_social_links', array());
    
if(is_page() && defined('FW')){
    global $post;
    $page_ID = $post->ID;
    
    $page_footer_enabled            = fw_get_db_post_option($page_ID, 'page_footer_enabled', 2);
    
    if($page_footer_enabled == 1):
        $footer_sidebars            = fw_get_db_post_option($page_ID, 'footer_sidebars', array());
        $footer_is_mail             = fw_get_db_post_option($page_ID, 'footer_is_mail', 2);
        $footer_mail_title          = fw_get_db_post_option($page_ID, 'footer_mail_title', '');
        $page_select_mailchimp      = fw_get_db_post_option($page_ID, 'page_select_mailchimp', 0);
        $page_anim_image            = fw_get_db_post_option($page_ID, 'page_anim_image', array());
        $page_anim_image            = (isset($page_anim_image['url']) && $page_anim_image['url'] != '' ? $page_anim_image['url'] : '');
        $page_c_soc_links           = fw_get_db_post_option($page_ID, 'page_copyright_soc_links', array());
        
        
        $is_mailchimp        = ($footer_is_mail > 0 ? $footer_is_mail : $is_mailchimp);
        $select_mail         = ($page_select_mailchimp > 0 ? $page_select_mailchimp : $select_mail);
        $mail_title          = ($footer_mail_title != '' ? $footer_mail_title : $mail_title);
        $animated_image      = ($page_anim_image != '' ? $page_anim_image : $animated_image);
        $copy_social_links   = (!empty($page_c_soc_links)  ? $page_c_soc_links : $copy_social_links);
        
        $fot_sidebars        = ($footer_sidebars > 0 ? $footer_sidebars : $fot_sidebars);
        
    endif;
}
    
?>
<!-- Begin:: Footer Section -->
<footer class="footer_01 fm_dark">
    <?php if($animated_image != ''): ?>
        <div class="layer_img move_anim_two">
            <img src="<?php echo esc_url($animated_image); ?>" alt="<?php echo get_bloginfo(); ?>"/>
        </div>
    <?php endif; ?>
    <div class="container">
        <?php if($is_mailchimp == 1): ?>
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <aside class="widget mailchimp">
                    <?php if($mail_title != ''): ?><h3 class="widget_title"><?php echo esc_html($mail_title); ?></h3><?php endif; ?>
                    <?php 
                    if($select_mail > 0):
                        echo do_shortcode('[mc4wp_form id="'.$select_mail.'"]');
                    endif;
                    ?>
                </aside>
            </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($fot_sidebars)): ?>
        <div class="row">
            <?php 
                foreach($fot_sidebars as $fs):
                    $class = '';
                    $class .= (isset($fs['fot_col_xl']) && $fs['fot_col_xl'] != '' ? $fs['fot_col_xl'].' ' : '');
                    $class .= (isset($fs['offset_xl']) && $fs['offset_xl'] != '' ? $fs['offset_xl'].' ' : '');
                    $class .= (isset($fs['fot_col_lg']) && $fs['fot_col_lg'] != '' ? $fs['fot_col_lg'].' ' : '');
                    $class .= (isset($fs['offset_lg']) && $fs['offset_lg'] != '' ? $fs['offset_lg'].' ' : '');
                    $class .= (isset($fs['fot_col_md']) && $fs['fot_col_md'] != '' ? $fs['fot_col_md'].' ' : '');
                    $class .= (isset($fs['fot_cust_class']) && $fs['fot_cust_class'] != '' ? $fs['fot_cust_class'].' ' : '');
                    
                    $sidebar = (isset($fs['fot_sidebar']) && $fs['fot_sidebar'] != '' ? $fs['fot_sidebar'] : '');
                    if(!empty($sidebar) && is_active_sidebar($sidebar)):
                        ?>
                        <div class="<?php echo esc_attr($class); ?>">
                            <?php dynamic_sidebar($sidebar); ?>
                        </div>
                        <?php
                    endif;
                endforeach;
            ?>
        </div>
        <?php endif; ?>
    </div>
</footer>
<section class="copyright copy_dark">
    <div class="container">
        <div class="row">
            <?php if($copy_site_info != ''): ?>
                <div class="<?php if(!empty($copy_social_links)): ?>col-md-6<?php else: ?>col-md-12 text-center<?php endif; ?>">
                    <p><?php echo organia_kses($copy_site_info); ?></p>
                </div>
            <?php endif; ?>
            <?php if(!empty($copy_social_links)): ?>
            <div class="col-md-6">
                <div class="copy_social">
                    <?php foreach($copy_social_links as $fsl): ?>
                        <?php
                            $c_profile = (isset($fsl['c_profile']) && $fsl['c_profile'] != '' ? $fsl['c_profile'] : '');
                            $c_url     = (isset($fsl['c_url']) && $fsl['c_url'] != '' ? $fsl['c_url'] : '');
                            if($c_profile != ''):
                            ?>
                            <a target="_blank" href="<?php echo esc_attr($c_url); ?>"><i class="<?php echo esc_attr($c_profile); ?>"></i></a>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End:: Footer Section -->