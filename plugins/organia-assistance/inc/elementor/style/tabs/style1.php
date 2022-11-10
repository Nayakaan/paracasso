<?php
$tabs_id        = uniqid('tw-tabs-');
if(count($list) > 0):
    ?>
    <div class="row">
        <div class="col-xl-4 col-lg-12">
            <ul class="nav organTab" id="organTab" role="tablist">
            <?php 
                $i = 1;
                foreach ($list as $key => $item):
                    $tab_image  = (isset($item['tab_image']['url'])) ? $item['tab_image']['url'] : '';
                    $title      = (isset($item['tab_title'])) ? $item['tab_title'] : '';
                        ?>
                        <li role="presentation">
                            <?php if($title != ''): ?>
                            <a href="#<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" aria-controls="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" class="<?php if($i == 2){ echo 'active'; } ?>" role="tab" data-toggle="tab"><?php
                                if($tab_image != ''):
                                    ?><img src="<?php echo esc_url($tab_image); ?>" alt="<?php echo esc_attr($title) ?>"><?php
                                endif;
                                echo esc_html($title); ?>
                            </a>
                            <?php endif; ?>
                        </li>
                    <?php
                $i++;
                endforeach;
            ?>
            </ul>
        </div>
        <div class="col-xl-8 col-lg-12">
            <div class="tab-content anim-right">
                <?php 
                    $i = 1;
                    foreach ($list as $key => $item):
                        $tab_block  = (isset($item['tab_block'])) ? $item['tab_block'] : 0;
                        if($tab_block > 0):
                            ?>
                            <div class="tab-pane fade <?php if($i == 1): ?> show active <?php endif; ?>" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" role="tabpanel">
                                <div class="organTabContent">
                                    <?php
                                        echo \Elementor\Plugin::$instance->frontend->get_builder_content( $tab_block );
                                    ?>
                                </div>
                            </div>
                            <?php
                            $i++;
                        endif;
                    endforeach;
                ?>
            </div>
        </div>
    </div>
    <?php
endif;
