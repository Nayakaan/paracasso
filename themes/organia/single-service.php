<?php
get_header();
$serv_single_is_banner = get_theme_mod('serv_single_is_banner', 1);
$srv_is_settings = 2;
$srv_is_banner   = 1;
if(defined('FW')):
    $srv_is_settings = fw_get_db_post_option(get_the_ID(), 'srv_is_settings', 2);
    $srv_is_banner = fw_get_db_post_option(get_the_ID(), 'srv_is_banner', 1);
    $serv_single_is_banner = ($srv_is_settings == 1 ? $srv_is_banner : $serv_single_is_banner);
endif;
if($serv_single_is_banner == 1):
    get_template_part('template-parts/header/service-single', 'header');
endif;
$post_id = get_the_ID();
?>
<?php if(!get_post_meta(get_the_ID(), '_elementor_edit_mode', true )):?>
    <section class="singleService">
        <div class="container largeContainer">
            <div class="row">
                <?php while(have_posts()): the_post(); ?>
                    <div class="col-md-6">
                        <?php if(has_post_thumbnail()): ?>
                        <div class="ser_thumb">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), 645, 415); ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <div class="service_area">
                            <?php
                                $service_sub_title = '';
                                if(defined('FW')){
                                    $service_sub_title  = fw_get_db_post_option(get_the_ID(), 'service_sub_title', '');
                                }
                            ?>
                            <?php if($service_sub_title != ''): ?>
                                <h5><?php echo organia_kses($service_sub_title); ?></h5>
                            <?php endif; ?>
                            <h2><?php echo get_the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="service_details_page_elemantor">
        <?php
            while(have_posts()):
                the_post();
                the_content();
            endwhile;
        ?>
    </section>
<?php endif; ?>

<?php
get_footer();