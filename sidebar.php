<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Simone
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Sidebar', 'simone' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
