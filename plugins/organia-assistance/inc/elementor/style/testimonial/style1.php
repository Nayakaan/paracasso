<div class="testimonial01 testi_wrap" 
    data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
    >
    <div class="testicontent01">
        <?php 
            if(!empty($testimony_list)):
                foreach($testimony_list as $ts):
                    $rating       = (isset($ts['author_rating']) ? $ts['author_rating'] : 5);
                    $quote        = (isset($ts['quote']) ? $ts['quote'] : '');
                    
                    if($quote != ''):
                    ?>
                    <div class="item">
                        <div class="ratings">
                            <?php echo ($rating > 0 ? str_repeat('<i class="twi-star"></i>', $rating) : ''); ?>
                        </div>
                        <?php if($quote != ''): ?>
                            <p class="quatation">
                                <?php echo wp_kses_post($quote); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php
                    endif;
                endforeach;
            endif;
        ?>
    </div>
    <div class="testimonialNav">
        <?php 
            if(!empty($testimony_list)):
                foreach($testimony_list as $ts):
                    $au_img       = (isset($ts['au_img']['url']) && $ts['au_img']['url'] != '') ? $ts['au_img']['url'] : 'https://via.placeholder.com/88x88.jpg';
                    $title        = (isset($ts['title']) ? $ts['title'] : '');
                    $designation  = (isset($ts['designation']) ? $ts['designation'] : '');
                    
                    if($au_img != ''):
                    ?>
                    <div class="item">
                        <div class="autho_thumb">
                            <img src="<?php echo esc_url ($au_img); ?>" alt="<?php echo esc_attr__('author', 'themewar'); ?>">
                        </div>
                        <div class="test_author">
                            <?php if($title != ''): ?>
                                <h5><?php echo wp_kses_post($title); ?></h5>
                            <?php endif; ?>
                            <?php if($designation != ''): ?>
                                <p><?php echo wp_kses_post($designation); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    endif;
                endforeach;
            endif;
        ?>
    </div>
</div>