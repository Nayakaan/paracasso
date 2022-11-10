<?php
/**
 * Template for displaying search forms
 */

?>
<form class="search_form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Type here', 'placeholder', 'organia' ); ?>">
    <button type="submit"><i class="twi-search1"></i></button>
</form>
