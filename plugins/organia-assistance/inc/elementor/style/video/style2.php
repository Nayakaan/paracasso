<div class="video_banner">
    <?php if($vbg_img != ''): ?>
        <img src="<?php echo esc_url($vbg_img); ?>" alt="<?php the_title_attribute(); ?>"/>
    <?php endif; ?>
    <a href="<?php echo esc_url($video_url) ?>" class="popup_video"><i class="<?php echo esc_attr($video_icons); ?>"></i></a>
</div>