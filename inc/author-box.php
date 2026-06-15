<?php
/**
 * Dispay author bio and other information on single posts and author index page.
 * Dependent on bio being available for current author.
 *
 * @package simone
 */

?>

<div class="reveal-bio">
	<button type="button" class="fa fa-minus-circle" aria-expanded="true" aria-controls="author-info" data-show-label="<?php esc_attr_e( 'Show Author Bio', 'simone' ); ?>" data-hide-label="<?php esc_attr_e( 'Hide Author Bio', 'simone' ); ?>">
		<span class="screen-reader-text"><?php esc_html_e( 'Hide Author Bio', 'simone' ); ?></span>
	</button>
</div>

<div id="author-info" class="author-info<?php echo get_option( 'show_avatars' ) ? '' : ' no-author-avatar'; ?>">

	<?php if ( get_option( 'show_avatars' ) ) : ?>
		<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 96 ); ?>
		</div><!-- .author-avatar -->
	<?php endif; ?>
	<div class="author-meta">
		<h2 class="author-title"><?php printf( __( 'About %s', 'simone' ), get_the_author() ); ?></h2>
		<div class="share-and-more">
			<?php
			// Change language depending on number of posts.
			$posts_posted = get_the_author_posts();
			if ( $posts_posted == 1) {
				printf(
					/* translators: May be followed by another sentence. There is a space after the punctuation mark.  */
					__( 'One article and counting. ', 'simone' )
				);
			} else {
				printf(
					/* translators: May be followed by another sentence. There is a space after the punctuation mark.  */
					__( '%s articles and counting. ', 'simone' ),
					$posts_posted
				);
			}
			// Check if social media info is collected in user profile.
			// Usually handled by a plugin like WordPress SEO by Yoast.
			$author_twitter    = get_the_author_meta( 'twitter' );
			$author_facebook   = get_the_author_meta( 'facebook' );
			if ( $author_twitter || $author_facebook ) {
				echo '<div class="author-social-media">';
				printf( __( 'Follow %s on social media: ', 'simone' ), get_the_author() );
				if ( $author_twitter ) {
					echo '<a href="https://x.com/' . esc_attr( $author_twitter ) . '" rel="author"><span aria-hidden="true">X</span><span class="screen-reader-text">' . __( 'X', 'simone' ) . '</span></a>';
				}
				if ( $author_facebook ) {
					echo '<a href="' . esc_url( $author_facebook ) . '" rel="author"><i class="fa fa-facebook"></i><span class="screen-reader-text">' . __( 'Facebook', 'simone' ) . '</span></a>';
				}
				echo '</div>';
			}
			?>
		</div>
	</div>
	<div class="author-description">
			<p class="author-bio">
				<?php the_author_meta( 'description' ); ?>
			</p>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( __( 'All posts by %s', 'simone' ), get_the_author() . ' <i class="fa fa-arrow-circle-o-right"></i>' ); ?>
		</a>
	</div><!-- .author-description -->
</div><!-- .author-info -->
