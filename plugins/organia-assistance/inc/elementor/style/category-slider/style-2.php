<?php if(!empty($cat_list)): ?>
    <?php if($cat_is_slide == 'yes'): ?>
        <div class="productCatSliderWrap" 
            data-autoplay="<?php echo $cat_slide_autoplay; ?>" 
            data-loop="<?php echo $cat_slide_loop; ?>" 
            data-nav="<?php echo $cat_slide_nav; ?>" 
            data-dots="<?php echo $cat_slide_dots; ?>"
            >
           <div class="cateSlider owl-carousel">
               <?php
                    foreach($cat_list as $cl):
                        $cat_list_category = (isset($cl['cat_list_category']) && $cl['cat_list_category'] > 0 ? $cl['cat_list_category'] : '');
                    $list_cat_image = (isset($cl['list_cat_image']) && !empty($cl['list_cat_image']) ? $cl['list_cat_image'] : array());
                    $list_thumbnail_id = (isset($list_cat_image['id']) && $list_cat_image['id'] > 0 ? $list_cat_image['id'] : 0);
                    $list_cat_title = (isset($cl['list_cat_title']) && !empty($cl['list_cat_title']) ? $cl['list_cat_title'] : '');
                    $cat_list_count = (isset($cl['cat_list_count']) && $cl['cat_list_count'] > 0 ? $cl['cat_list_count'] : '');
                    $list_cat_btn_url = (isset($cl['list_cat_btn_url']) && !empty($cl['list_cat_btn_url']) ? $cl['list_cat_btn_url'] : array());
                    $list_cat_btn_url = (isset($list_cat_btn_url['url']) && $list_cat_btn_url['url'] != '') ? $list_cat_btn_url['url'] : '';
                    
                    if($cat_list_category > 0):
                        $category = get_term_by( 'id', $cat_list_category, 'product_cat');
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                        
                        $list_thumbnail_id = ($list_thumbnail_id > 0 ? $list_thumbnail_id : $thumbnail_id);
                        $list_cat_title = ($list_cat_title != '' ? $list_cat_title : $category->name);
                        $cat_list_count = ($cat_list_count > 0 ? $cat_list_count : $category->count);
                        $list_cat_btn_url = ($list_cat_btn_url != '' ? $list_cat_btn_url : get_category_link( $category->term_id));
                    endif;
                       ?>
                       <div class="cateItem02 text-center">
                            <a href="<?php echo esc_url($list_cat_btn_url); ?>">
                                <img src="<?php echo organia_attachment_url($list_thumbnail_id, 288, 288) ?>" alt="<?php echo esc_attr($list_cat_title); ?>">
                            </a>
                            <div class="cate_content">
                                <a class="cate" href="<?php echo esc_url($list_cat_btn_url); ?>"><?php echo esc_html($list_cat_title); ?></a>
                                <span>( <?php echo esc_html($cat_list_count); ?> <?php echo esc_html__('Items', 'themewar') ?> )</span>
                            </div>
                        </div>
                       <?php
                   endforeach;
               ?>
           </div>
       </div>
    <?php else: ?>
        <div class="row">
            <?php
                foreach($cat_list as $cl):
                    $cat_list_category = (isset($cl['cat_list_category']) && $cl['cat_list_category'] > 0 ? $cl['cat_list_category'] : '');
                    $list_cat_image = (isset($cl['list_cat_image']) && !empty($cl['list_cat_image']) ? $cl['list_cat_image'] : array());
                    $list_thumbnail_id = (isset($list_cat_image['id']) && $list_cat_image['id'] > 0 ? $list_cat_image['id'] : 0);
                    $list_cat_title = (isset($cl['list_cat_title']) && !empty($cl['list_cat_title']) ? $cl['list_cat_title'] : '');
                    $cat_list_count = (isset($cl['cat_list_count']) && $cl['cat_list_count'] > 0 ? $cl['cat_list_count'] : '');
                    $list_cat_btn_url = (isset($cl['list_cat_btn_url']) && !empty($cl['list_cat_btn_url']) ? $cl['list_cat_btn_url'] : array());
                    $list_cat_btn_url = (isset($list_cat_btn_url['url']) && $list_cat_btn_url['url'] != '') ? $list_cat_btn_url['url'] : '';
                    
                    if($cat_list_category > 0):
                        $category = get_term_by( 'id', $cat_list_category, 'product_cat');
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                        
                        $list_thumbnail_id = ($list_thumbnail_id > 0 ? $list_thumbnail_id : $thumbnail_id);
                        $list_cat_title = ($list_cat_title != '' ? $list_cat_title : $category->name);
                        $cat_list_count = ($cat_list_count > 0 ? $cat_list_count : $category->count);
                        $list_cat_btn_url = ($list_cat_btn_url != '' ? $list_cat_btn_url : get_category_link( $category->term_id));
                    endif;
                    
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="cateItem02 text-center">
                            <a href="<?php echo esc_url($list_cat_btn_url); ?>">
                                <img src="<?php echo organia_attachment_url($list_thumbnail_id, 288, 288) ?>" alt="<?php echo esc_attr($list_cat_title); ?>">
                            </a>
                            <div class="cate_content">
                                <a class="cate" href="<?php echo esc_url($list_cat_btn_url); ?>"><?php echo esc_html($list_cat_title); ?></a>
                                <span>( <?php echo esc_html($cat_list_count); ?> <?php echo esc_html__('Items', 'themewar') ?> )</span>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
        <strong><?php echo esc_html__('Oops! ', 'themewar'); ?></strong><?php echo esc_html__('Items not found', 'themewar') ?>
    </div>
<?php endif; ?>
