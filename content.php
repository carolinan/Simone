<?php
/**
 * Template for the content.
 *
 * @package Simone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { // Custom template for the first post on the front page.
		if ( has_post_thumbnail() ) {
			echo '<div class="front-index-thumbnail clear">';
			echo '<div class="image-shifter">';
			echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" aria-label="' . esc_attr( sprintf( __( 'Read %s', 'simone' ), simone_get_read_more_title() ) ) . '">';
			the_post_thumbnail();
			echo '</a>';
			echo '</div>';
			echo '</div>';
		}
		echo '<div class="index-box';
		if ( has_post_thumbnail() ) { echo ' has-thumbnail'; };
		echo '">';
	} else {
		echo '<div class="index-box">';
		if ( has_post_thumbnail() ) {
			echo '<div class="small-index-thumbnail clear">';
			echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" aria-label="' . esc_attr( sprintf( __( 'Read %s', 'simone' ), simone_get_read_more_title() ) ) . '">';
			echo the_post_thumbnail( 'index-thumb' );
			echo '</a>';
			echo '</div>';
		}
	}
	?>
	<header class="entry-header clear">
		<?php
		// Display a thumb tack in the top right hand corner if this post is sticky.
		if ( is_sticky() ) {
			echo '<i class="fa fa-thumb-tack sticky-post"></i>';
		}

		/* translators: used between list items, there is a space after the comma. */
		$category_list = get_the_category_list( __( ', ', 'simone' ) );
		?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php simone_the_title(); ?>
			</a>
		</h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php simone_posted_on(); ?>
			<?php
			if ( simone_categorized_blog() ) {
				echo '<span class="mobile-hide"> </span><span class="category-list">' . sprintf( __( 'Filed under %s', 'simone' ), $category_list ) . '</span><span class="mobile-hide">.</span>';
			}
			?>
			<?php
			$simone_has_comments_link = ! post_password_required() && ( comments_open() || '0' != get_comments_number() );
			if ( $simone_has_comments_link ) {
				echo '<span class="comments-link">';
				comments_popup_link( __( 'Leave a comment', 'simone' ), __( '1 Comment', 'simone' ), __( '% Comments', 'simone' ) );
				echo '<span class="meta-separator">' . esc_html_x( '.', 'separator between post meta links', 'simone' ) . '</span></span>';
			}
			?>
			<?php edit_post_link( __( 'Edit', 'simone' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

		<?php
		if ( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) {
			echo '<div class="entry-content">';
			the_content();
			echo '</div>';
			echo '<footer class="entry-footer continue-reading">';
			echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . __('Read <span aria-hidden="true">the article</span>', 'simone') . '<i class="fa fa-arrow-circle-o-right"></i><span class="screen-reader-text"> ' . esc_html( simone_get_read_more_title() ) . '</span></a>';
			echo '</footer><!-- .entry-footer -->';
		} else {
			?>
			<div class="entry-content">
				<?php
				$simone_archive_content = get_option( 'archive_setting' );
				if ( $simone_archive_content == 'content' ) {
					the_content();
				} else {
					the_excerpt();
				}
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer continue-reading">
			<?php
			if ( $simone_archive_content == 'content' ) {
				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . __('Read <span aria-hidden="true">the article</span>', 'simone') . '<i class="fa fa-arrow-circle-o-right"></i><span class="screen-reader-text"> ' . esc_html( simone_get_read_more_title() ) . '</span></a>';
			} else {
				echo '<a href="' . esc_url( get_permalink() ). '" rel="bookmark">' . __('Continue Reading', 'simone' ) . '<i class="fa fa-arrow-circle-o-right"></i><span class="screen-reader-text"> ' . esc_html( simone_get_read_more_title() ) . '</span></a>';
			}
			?>
			</footer><!-- .entry-footer -->
			<?php
		}
		?>

	</div>
</article><!-- #post-## -->
