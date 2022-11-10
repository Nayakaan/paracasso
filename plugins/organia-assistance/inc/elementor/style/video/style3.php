<div class="vd_slider_wrap" 
    data-autoplay="<?php echo ($autoplay == 'yes' ? 1 : 2) ?>" 
    data-loop="<?php echo ($loop == 'yes' ? 1 : 2) ?>" 
    data-nav="<?php echo ($nav == 'yes' ? 1 : 2) ?>" 
    data-dots="<?php echo ($dots == 'yes' ? 1 : 2) ?>" 
    >
    <div class="video-slider owl-carousel">
        <?php 
            if(!empty($video_list)):
                $i = 1;
                foreach($video_list as $ts):
                    $bg_img   = (isset($ts['bg_img']['url']) && $ts['bg_img']['url'] != '') ? $ts['bg_img']['url'] : '';
                    $v_icons  = (isset($ts['v_icons']) ? $ts['v_icons'] : 'twi-play');
                    $v_url    = (isset($ts['v_url']) ? $ts['v_url'] : 'https://player.vimeo.com/video/110853090?h=8f6c17f3e5&color=e35417');
                    
                    if($v_url != ''):
                    ?>
                    <div class="video_banner">
                        <?php if($bg_img != ''): ?>
                            <img src="<?php echo esc_url($bg_img); ?>" alt="<?php the_title_attribute(); ?>"/>
                        <?php endif; ?>
                        <a href="<?php echo esc_url($v_url) ?>" class="popup_video"><i class="<?php echo esc_attr($v_icons); ?>"></i></a>
                    </div>
                    <?php
                    endif;
                    $i++;
                endforeach;
            endif;
        ?>
    </div>
</div>