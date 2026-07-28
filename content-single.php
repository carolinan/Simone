<?php
/**
 * Outputs the single post content. Displayed by single.php.
 *
 * @package Simone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="single-post-thumbnail clear">';
		echo '<div class="image-shifter">';
		the_post_thumbnail();
		echo '</div>';
		echo '</div>';
	}
	?>
	<header class="entry-header clear">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'simone' ) );
		?>
		<h1 class="entry-title"><?php simone_the_title(); ?></h1>
		<div class="entry-meta">
			<?php simone_posted_on(); ?>
			<?php
			if ( simone_categorized_blog() ) {
				echo '<span class="mobile-hide"> </span><span class="category-list">' . sprintf( __( 'Filed under %s', 'simone' ), $category_list ) . '</span><span class="mobile-hide">.</span>';
			}
			?>
			<?php
			if ( ! post_password_required() && ( comments_open() || '0' !== get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					simone_get_comments_popup_link_text( get_comments_number() ),
					simone_get_comments_popup_link_text( 1 ),
					simone_get_comments_popup_link_text( get_comments_number() )
				);
				echo '<span class="meta-separator">' . esc_html_x( '.', 'separator between post meta links', 'simone' ) . '</span></span>';
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'simone' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' );
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
