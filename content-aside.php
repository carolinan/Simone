<?php
/**
 * Custom template for Asides
 *
 * @package Simone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="index-box">

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer entry-meta">
			<?php simone_posted_on(); ?>
	</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
