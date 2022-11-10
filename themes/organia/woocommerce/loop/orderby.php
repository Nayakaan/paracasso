<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shop_sort_label = get_theme_mod('shop_sort_label', esc_html__('Sort By:', 'organia'));
if(is_tax('product_cat') && defined('FW')):
    $term = get_queried_object();
    $term_id = $term->term_id;
    $shop_cats_enable_con_settings = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_enable_con_settings', 2);
    $shop_cats_sort_label = fw_get_db_term_option($term_id, 'product_cat', 'shop_cats_sort_label', '');
    $shop_sort_label = ($shop_cats_enable_con_settings == 1 && !empty($shop_cats_sort_label) ? $shop_cats_sort_label : $shop_sort_label);
elseif(is_tax('product_tag') && defined('FW')):
    $term = get_queried_object();
    $term_id = $term->term_id;
    $shop_tags_enable_con_settings = fw_get_db_term_option($term_id, 'product_cat', 'shop_tags_enable_con_settings', 2);
    $shop_tags_sort_label = fw_get_db_term_option($term_id, 'product_cat', 'shop_tags_sort_label', '');
    $shop_sort_label = ($shop_tags_enable_con_settings == 1 && !empty($shop_tags_sort_label) ? $shop_tags_sort_label : $shop_sort_label);
endif;
?>
<form class="woocommerce-ordering sorting select-area" method="get">
        <?php if(!empty($shop_sort_label)): ?>
            <h5><?php echo organia_kses($shop_sort_label); ?></h5>
        <?php endif; ?>
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'organia' ); ?>">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
