<?php
    if (($key = array_search(0, $folio_category)) !== false) {
        unset($folio_category[$key]);
    }
    if (($key = array_search(0, $pfs_folio)) !== false) {
        unset($pfs_folio[$key]);
    }
    $cat_args = array(
        'orderby'       => 'ID',
        'order'         => 'DESC', 
        'hide_empty'    => 1,
        'hierarchical'  => 1,
        'taxonomy'      => 'gallery_cat'
    );
    if(!empty($folio_category)):
        $cat_args['include'] = $folio_category;
    endif;
    $categories = get_categories( $cat_args );
if($is_filter == 'yes' && !empty($categories)): ?>
<div class="row">
    <div class="col-md-12">
        <ul class="filter_menu_3 shaff_filter clearfix text-<?php echo esc_attr($filtr_alignment); ?>">
            <li class="active" data-group="all"><?php echo esc_html__('All', 'themewar'); ?></li>
            <?php 
                foreach($categories as $cat):
                    ?><li class="filter" data-group="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></li><?php
                endforeach;
            ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<?php
    $page = (get_query_var('paged') != '') ? get_query_var('paged') : 1;
    $fargs = array(
        'post_type'         => 'gallery',
        'post_status'       => 'publish',
        'posts_per_page'    => $folio_no_item,
        'orderby'           => $folio_order_by,
        'order'             => $folio_order,
        'paged'             => $page
    );
    if(!empty($folio_category)){
        $fargs['tax_query']   = array(
            'relation'      => 'AND', 
            array(
                'taxonomy'  => 'gallery_cat', 
                'field'     => 'id', 
                'terms'     => $folio_category,
                'operator'  => 'IN'
            )
        );
    }
    if(!empty($pfs_folio)){
        $fargs['post__in'] = $pfs_folio;
    }
    query_posts($fargs);
    if(have_posts()): ?>
        <div class="row galleryRow <?php echo ($is_filter == 'yes' ? 'shaff_grid' : ''); ?>">
            <?php
            $i = 1;
            while(have_posts()):
                the_post();
                $terms = get_the_terms(get_the_ID(), 'gallery_cat');
                $groups = '["all", ';
                if (is_array($terms) && count($terms) > 0){
                    $p = 1;
                    $c = count($terms);
                    foreach ($terms as $term){
                        if($p == $c){
                            $groups .= '"'.$term->slug.'"';
                        }else{
                            $groups .= '"'.$term->slug.'", ';
                        }
                        $p++;
                    }
                }
                $groups .= ']';
                ?>
                <div class="col-lg-2 cusGCol <?php if($is_filter == 'yes'): ?>shaff_item<?php endif; ?>" <?php if($is_filter == 'yes'): ?>data-groups='<?php echo esc_attr($groups); ?>'<?php endif; ?>>
                    <div class="gallerItem_2">
                        <img src="<?php echo makeover_post_thumbnail(get_the_ID(), 380, 500); ?>" alt="<?php echo get_the_title(); ?>">
                        <div class="galleryItem_2_btn">
                            <a class="popup_img" href="<?php echo makeover_post_thumbnail(get_the_ID(), 'full'); ?>"><i class="icofont-search"></i></a>
                            <a href="<?php echo get_the_permalink(); ?>"><i class="icofont-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            endwhile;
            ?>
            <?php if($is_filter == 'yes'): ?><div class="col-md-1 shaf_sizer"></div><?php endif; ?>
        </div>
        <?php if($is_pagination == 'yes'): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="make_pagination folio_list_pagin text-<?php echo esc_attr($pagination_alignment); ?>">
                    <?php
                        the_posts_pagination(
                            array(
                                'prev_text'          => wp_kses_post( '<i class="icofont-simple-left"></i>' ),
                                'next_text'          => wp_kses_post( '<i class="icofont-simple-right"></i>' ),
                                'before_page_number' => '',
                            )
                        );
                    ?>
                </div>
            </div>  
        </div>
        <?php endif; ?>
<?php
    endif;
    wp_reset_query(); 