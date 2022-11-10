<?php

if($column == 3):
    $columns = 'col-lg-4 col-md-6';
else:
    $columns = 'col-lg-3 col-md-6';
endif;
$tmarg = array(
    'post_type'             => 'team',
    'post_status'           => 'publish',
    'orderby'               => $order_by,
    'order'                 => $order,
    'posts_per_page'        => $no_of_items
);

$teams = new WP_Query($tmarg);
if($teams->have_posts()):
    echo '<div class="row team_grid_row">';
    while($teams->have_posts()):
        $teams->the_post();
        $mem_designation = '';
        $mem_socials     = array();
        if(defined('FW')){
            $mem_designation = fw_get_db_post_option(get_the_ID(), 'mem_designation', '');
            $mem_socials     = fw_get_db_post_option(get_the_ID(), 'mem_socials', array());
        }
        $linked = ($is_linked == 'yes' ? get_the_permalink() : 'javascript:void(0);');
        if($styles == 2):
            $w = '';
            $h = '';
            if($column == 3):
                $w = '420';
                $h = '420';
            else:
                $w = '311';
                $h = '400';
            endif;
            ?>
            <div class="<?php echo esc_attr($columns); ?>">
                <div class="teamItem02">
                    <div class="tmThumb02">
                        <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h) ?>" alt="<?php echo get_the_title(); ?>">
                        <div class="tm_socail02">
                            <?php
                                foreach($mem_socials as $ms):
                                    $mem_social_url  = (isset($ms['mem_social_url']) && $ms['mem_social_url'] != '') ? $ms['mem_social_url'] : '#';
                                    $mem_social_icon = (isset($ms['mem_social_icon']) && $ms['mem_social_icon'] != '') ? $ms['mem_social_icon'] : '#';
                                    $social_icon = '';
                                    if(isset($mem_social_icon['type']) && $mem_social_icon['type'] != 'custom-upload'):
                                        if(isset($mem_social_icon['icon-class']) && $mem_social_icon['icon-class'] != ''):
                                            $social_icon = $mem_social_icon['icon-class'];
                                        endif;
                                        echo '<a href="'.$mem_social_url.'"><i class="'.$social_icon.'"></i></a>';
                                    endif;
                                endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="tmContent">
                        <h5><a href="<?php echo esc_url($linked); ?>"><?php echo get_the_title(); ?></a></h5>
                        <?php if($mem_designation != ''): ?>
                            <p><?php echo esc_html($mem_designation); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        elseif ($styles == 3):
            $w = '';
            $h = '';
            if($column == 3):
                $w = '420';
                $h = '420';
            else:
                $w = '307';
                $h = '307';
            endif;
            ?>
            <div class="<?php echo esc_attr($columns); ?>">
                <div class="teamItem03 text-center">
                    <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h) ?>" alt="<?php echo get_the_title(); ?>">
                    <div class="tmContent">
                        <h5><a href="<?php echo esc_url($linked); ?>"><?php echo get_the_title(); ?></a></h5>
                        <?php if($mem_designation != ''): ?>
                            <p><?php echo esc_html($mem_designation); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        else:
            $w = '';
            $h = '';
            if($column == 3):
                $w = '420';
                $h = '420';
            else:
                $w = '307';
                $h = '307';
            endif;
            ?>
            <div class="<?php echo esc_attr($columns); ?>">
                <div class="teamItem01 text-center">
                    <div class="tmWrapper">
                        <div class="tmThumb">
                            <img src="<?php echo organia_post_thumbnail(get_the_ID(), $w, $h) ?>" alt="<?php echo get_the_title(); ?>">
                            <div class="tm_socail">
                                <?php
                                    foreach($mem_socials as $ms):
                                        $mem_social_url  = (isset($ms['mem_social_url']) && $ms['mem_social_url'] != '') ? $ms['mem_social_url'] : '#';
                                        $mem_social_icon = (isset($ms['mem_social_icon']) && $ms['mem_social_icon'] != '') ? $ms['mem_social_icon'] : '#';
                                        $social_icon = '';
                                        if(isset($mem_social_icon['type']) && $mem_social_icon['type'] != 'custom-upload'):
                                            if(isset($mem_social_icon['icon-class']) && $mem_social_icon['icon-class'] != ''):
                                                $social_icon = $mem_social_icon['icon-class'];
                                            endif;
                                            echo '<a href="'.$mem_social_url.'"><i class="'.$social_icon.'"></i></a>';
                                        endif;
                                    endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tmContent">
                        <h5><a href="<?php echo esc_url($linked); ?>"><?php echo get_the_title(); ?></a></h5>
                        <?php if($mem_designation != ''): ?>
                            <p><?php echo esc_html($mem_designation); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        endif;
    endwhile;
    echo '</div>';
endif;
wp_reset_postdata();