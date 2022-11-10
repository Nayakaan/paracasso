<?php
/**
 * Creates product widget thumbnail
 */

class Tw_Products_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'woocommerce widget_products',
            'description'   => 'Organia Product widgets.'
        );
        
        parent::__construct('org-prowt', esc_html__('Organia Product widgets', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Best Seller', 'themewar' );
        $number_of_products = (isset($instance['number_of_products']) && $instance['number_of_products'] != '') ? $instance['number_of_products'] : 4;
        $product_type = (isset($instance['product_type']) && $instance['product_type'] != '') ? $instance['product_type'] : 'best';
        $is_empty_rating = (isset($instance['is_empty_rating']) && $instance['is_empty_rating'] != '') ? $instance['is_empty_rating'] : 'yes';
        $ord_by = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        $btn_label = (isset($instance['btn_label']) && $instance['btn_label'] != '') ? $instance['btn_label'] : esc_html__( 'View All', 'themewar' );
        $btn_url = (isset($instance['btn_url']) && $instance['btn_url'] != '') ? $instance['btn_url'] : '';
        
        
        $title = apply_filters( 'widget_title', $title );
        echo wp_kses_post($args['before_widget']);
        if ( ! empty( $title ) )
        {
            echo wp_kses_post($args['before_title']) . esc_html($title) . $args['after_title'];
        }
        
        $querys = [
            'post_type'     => 'product',
            'post_status'   => 'publish',
            'paged'         => get_query_var('paged') ? get_query_var('paged') : 1,
            'orderby'       => $ord_by,
            'order'         => $ord,
            'posts_per_page' => $number_of_products
        ];
        if ('featured' === $product_type) {
            if(isset($querys['tax_query'])):
                $querys['tax_query'][] = array(
                        'taxonomy' => 'product_visibility', 
                        'field' => 'name', 
                        'terms' => 'featured',
                        'operator' => 'IN',
                );
            else:
                $querys['tax_query']   = array(
                    'relation' => 'AND', 
                    array(
                        'taxonomy' => 'product_visibility', 
                        'field' => 'name', 
                        'terms' => 'featured',
                        'operator' => 'IN',
                    ) 
                );
            endif;
        }
        //On Sell product
        if ('sale' === $product_type) {
            $querys['post__in'] = wc_get_product_ids_on_sale();
        }
        //Best Sell product
        if ('best' === $product_type) {
            $querys['orderby'] = 'meta_value_num';
            $querys['meta_key'] = 'total_sales';
            $querys['order'] = 'DESC';
        }

        $tw_query = new WP_Query($querys);
        if($tw_query->have_posts()){
            $i = 1;
            echo '<ul class="product_list_widget">';
                while($tw_query->have_posts()): $tw_query->the_post(); $product = wc_get_product(get_the_ID())
                ?>
                <li class="clearfix">
                    <?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
                        <div class="product_widget_item">
                            <div class="widproThumb">
                                <img src="<?php echo organia_post_thumbnail($product->get_id(), 78, 64); ?>" alt="<?php echo get_the_title(); ?>"/>
                            </div>
                            <div class="widProContent">
                                <div class="ratings">
                                    <?php if ( $product->get_average_rating() > 0 ) : ?>
                                        <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                                        <span class="rating-count">(<?php echo organia_kses($product->get_review_count()); ?>)</span>
                                    <?php else: ?>
                                        <?php if('yes' === $is_empty_rating): ?>
                                            <div class="star-rating"></div>
                                            <span class="rating-count"><?php echo esc_html__('(0)', 'organia') ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <h3><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo substr(wp_strip_all_tags($product->get_name()), 0, 14); ?></a></h3>
                                <div class="pi01Price clearfix">
                                    <?php echo organia_kses($product->get_price_html()); ?>
                                </div>
                            </div>
                        </div>
                    <?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
                </li>
                <?php
                $i++;
                endwhile;
            echo '</ul>';
            if($btn_label != ''): ?><a href="<?php echo esc_url($btn_url); ?>" class="organ_btn"><?php echo esc_html($btn_label); ?><i class="twi-arrow-right1"></i></a><?php endif;
        }
        wp_reset_postdata();
        
        echo wp_kses_post($args['after_widget']);
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        return $new_instance;
    }
    
    function form($instance)
    {
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Best Seller', 'themewar' );
        $number_of_products = (isset($instance['number_of_products']) && $instance['number_of_products'] != '') ? $instance['number_of_products'] : 4;
        $product_type = (isset($instance['product_type']) && $instance['product_type'] != '') ? $instance['product_type'] : 'best';
        $is_empty_rating = (isset($instance['is_empty_rating']) && $instance['is_empty_rating'] != '') ? $instance['is_empty_rating'] : 'yes';
        $ord_by = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        $btn_label = (isset($instance['btn_label']) && $instance['btn_label'] != '') ? $instance['btn_label'] : esc_html__( 'View All', 'themewar' );
        $btn_url = (isset($instance['btn_url']) && $instance['btn_url'] != '') ? $instance['btn_url'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
    <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'number_of_products' )); ?>"><?php _e( 'Number Of Posts:' , 'themewar' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_products' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_of_products' )); ?>" type="number" value="<?php echo esc_attr( $number_of_products ); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'product_type' )); ?>"><?php _e( 'Product Types:' , 'themewar' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'product_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'product_type' )); ?>">
            <option value="all" <?php if($product_type == 'all'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('All Product', 'themewar'); ?></option>
            <option value="featured" <?php if($product_type == 'featured'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Featured Product', 'themewar'); ?></option>
            <option value="sale" <?php if($product_type == 'sale'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Sale Product', 'themewar'); ?></option>
            <option value="best" <?php if($product_type == 'best'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Best Seller Product', 'themewar'); ?></option>
            <option value="top" <?php if($product_type == 'top'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Top Rated Product', 'themewar'); ?></option>
            <option value="rand" <?php if($product_type == 'rand'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Random Product', 'themewar'); ?></option>
        </select>
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>"><?php _e( 'Order:' , 'themewar' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ord' )); ?>">
            <option value="ASC" <?php if($ord == 'ASC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ASC', 'themewar'); ?></option>
            <option value="DESC" <?php if($ord == 'DESC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('DESC', 'themewar'); ?></option>
        </select>
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'is_empty_rating' )); ?>"><?php _e( 'Is Empty Ratins:' , 'themewar' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'is_empty_rating' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'is_empty_rating' )); ?>">
            <option value="yes" <?php if($is_empty_rating == 'yes'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Yes', 'themewar'); ?></option>
            <option value="no" <?php if($is_empty_rating == 'no'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('No', 'themewar'); ?></option>
        </select>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'btn_label' )); ?>"><?php _e( 'Btn Label:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btn_label' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btn_label' )); ?>" type="text" value="<?php echo esc_attr( $btn_label ); ?>" />
   </p>
   <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'btn_url' )); ?>"><?php _e( 'Btn url:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btn_url' )); ?>" type="text" value="<?php echo esc_attr( $btn_url ); ?>" />
   </p>
        
        <?php
    }
}