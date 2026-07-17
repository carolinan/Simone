<?php
/**
 * The footer sidebar
 *
 * @package Simone
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="supplementary">
	<section id="footer-widgets" class="footer-widgets widget-area">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</section><!-- #footer-widgets -->
</div><!-- #supplementary -->
