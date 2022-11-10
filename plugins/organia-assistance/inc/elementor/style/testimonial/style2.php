<div class="testi_wrap" 
    data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
    data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
    data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
    data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
    >
    <div class="testimonial02 owl-carousel">
        <?php 
            if(!empty($testimony_lists)):
                foreach($testimony_lists as $ts):
                    $quote1       = (isset($ts['quote1']) ? $ts['quote1'] : '');
                    $quote2       = (isset($ts['quote2']) ? $ts['quote2'] : '');
                    $titles       = (isset($ts['titles']) ? $ts['titles'] : '');
                    $designations = (isset($ts['designations']) ? $ts['designations'] : '');
                    
                    if($quote1 != ''):
                    ?>
                    <div class="testmonialItem">
                        <?php if($quote1 != ''): ?>
                            <div class="quote">
                                <?php echo wp_kses_post($quote1); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($quote2 != ''): ?>
                            <p class="quatation">
                                <?php echo wp_kses_post($quote2); ?>
                            </p>
                        <?php endif; ?>
                        <div class="tsauthor">
                            <?php if($titles != ''): ?>
                                <span><?php echo wp_kses_post($titles); ?></span>
                            <?php endif; ?>
                            <?php if($designations != ''): ?>
                                <i>/</i>
                                <?php echo wp_kses_post($designations); ?>
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