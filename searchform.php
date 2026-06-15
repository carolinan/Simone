<?php
/**
 * Template for displaying search forms.
 *
 * @package Simone
 */

?>
<?php $simone_search_id = wp_unique_id( 'search-field-' ); ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-label screen-reader-text" for="<?php echo esc_attr( $simone_search_id ); ?>"><?php esc_html_e( 'Search:', 'simone' ); ?></label>
	<input id="<?php echo esc_attr( $simone_search_id ); ?>" class="search-field" type="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<input class="search-submit" type="submit" value="<?php esc_attr_e( 'Search', 'simone' ); ?>">
</form>
