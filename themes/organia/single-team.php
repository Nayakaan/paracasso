<?php
get_header();
$team_is_banner = get_theme_mod('team_is_banner', 1);
if(defined('FW')):
    $memb_is_settings   = fw_get_db_post_option(get_the_ID(), 'memb_is_settings', 2);
    $memb_is_banner     = fw_get_db_post_option(get_the_ID(), 'memb_is_banner', 1);
    $team_is_banner     = ($memb_is_settings == 1 && $memb_is_banner > 0 ? $memb_is_banner : $team_is_banner);
endif;
if($team_is_banner == 1):
    get_template_part('template-parts/header/single-team', 'header');
endif; 
$post_id = get_the_ID();
?>
<?php if(!get_post_meta(get_the_ID(), '_elementor_edit_mode', true )):?>
    <section class="teamSinglePage">
        <div class="container largeContainer">
            <div class="row">
                <?php while(have_posts()): the_post(); ?>
                    <?php if(has_post_thumbnail()): ?>
                    <div class="col-lg-5 col-md-6">
                        <div class="team_thumb">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), 550, 560); ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-6 offset-lg-1 col-md-6">
                        <div class="tmt_meta">
                            <?php if(fw_get_db_post_option(get_the_ID(), 'mem_designation', '') != ''): ?>
                                <span class="tm_designation"><?php echo fw_get_db_post_option(get_the_ID(), 'mem_designation', ''); ?></span>
                            <?php endif; ?>
                            <h4><?php echo get_the_title(); ?></h4>
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="team_details_page_elemantor">
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
