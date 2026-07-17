<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package simone
 */

if ( ! function_exists( 'simone_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 *
	 * @return void
	 */
	function simone_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		// &larr and &rarr are left and right arrows, respectively. These are screen-reader safe.
		$links = paginate_links(
			array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $GLOBALS['wp_query']->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 2,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => __( '&larr; Previous', 'simone' ),
				'next_text' => __( 'Next &rarr;', 'simone' ),
				'type'      => 'list',
			)
		);

		if ( $links ) {
			?>
			<nav class="navigation paging-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Posts', 'simone' ); ?>">
				<?php echo $links; ?>
			</nav><!-- .navigation -->
			<?php
		}
	}
}

if ( ! function_exists( 'simone_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 *
	 * @return void
	 */
	function simone_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Posts', 'simone' ); ?>">
			<div class="post-nav-box clear">
				<div class="nav-links">
				<?php
				previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . __( 'Previous Post:', 'simone' ) . '</div>%link</div>', '%title' );
				next_post_link( '<div class="nav-next"><div class="nav-indicator">' . __( 'Next Post:', 'simone' ) . '</div>%link</div>', '%title' );
				?>
				</div><!-- .nav-links -->
			</div><!-- .post-nav-box -->
		</nav><!-- .navigation -->
		<?php
	}
}

if ( ! function_exists( 'simone_attachment_nav' ) ) {
	/**
	 * Display navigation to next/previous image in attachment pages.
	 */
	function simone_attachment_nav() {
		?>
		<nav class="navigation post-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Images', 'simone' ); ?>">
			<div class="post-nav-box clear">
				<div class="nav-links">
				<?php
				previous_image_link( false, '<div class="nav-previous">' . __( 'Previous Image', 'simone' ) . '</div>' );
				next_image_link( false, '<div class="nav-next">' . __( 'Next Image', 'simone' ) . '</div>' );
				?>
				</div><!-- .nav-links -->
			</div><!-- .post-nav-box -->
		</nav><!-- .navigation -->
		<?php
	}
}

if ( ! function_exists( 'simone_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function simone_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( _x('F jS, Y', 'Public posted on date', 'simone') ) ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date( _x('F jS, Y', 'Public modified on date', 'simone') ) )
		);
		// Translators: Text wrapped in mobile-hide class is hidden on wider screens.
		printf( _x( '<span class="byline">Written by %1$s</span><span class="mobile-hide"> on </span><span class="posted-on">%2$s</span><span class="mobile-hide">.</span>', 'mobile-hide class is used to hide connecting elements like "on" and "." on wider screens.', 'simone' ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			),
			$time_string
		);
	}
}

if ( ! function_exists( 'simone_get_comments_popup_link_text' ) ) {
	/**
	 * Return comment link text with a hidden post-specific label.
	 *
	 * @param int $comments_number Comment count.
	 * @return string
	 */
	function simone_get_comments_popup_link_text( $comments_number ) {
		$post_title = get_the_title() ? get_the_title() : simone_get_untitled_title();

		if ( 0 === (int) $comments_number ) {
			$text = __( 'Leave a comment', 'simone' );
			$screen_reader_text = sprintf( __( ' on %s', 'simone' ), $post_title );
		} elseif ( 1 === (int) $comments_number ) {
			$text = __( '1 Comment', 'simone' );
			$screen_reader_text = sprintf( __( ' on %s', 'simone' ), $post_title );
		} else {
			$text = sprintf( __( '%s Comments', 'simone' ), number_format_i18n( (int) $comments_number ) );
			$screen_reader_text = sprintf( __( ' on %s', 'simone' ), $post_title );
		}

		return $text . '<span class="screen-reader-text">' . esc_html( $screen_reader_text ) . '</span>';
	}
}

if ( ! function_exists( 'simone_edit_post_link' ) ) {
	/**
	 * Add a unique accessible name to the edit link.
	 *
	 * @param string $link    Edit link HTML.
	 * @param int    $post_id Post ID.
	 * @param string $text    Link text.
	 * @return string
	 */
	function simone_edit_post_link( $link, $post_id, $text ) {
		if ( is_single() ) {
			return $link;
		}

		$post_title = get_the_title( $post_id ) ? get_the_title( $post_id ) : simone_get_untitled_title( $post_id );
		$screen_reader_text = '<span class="screen-reader-text"> ' . esc_html( $post_title ) . '</span>.';

		return preg_replace(
			'/(<a[^>]*>)(.*?)(<\/a>)/s',
			'$1$2' . $screen_reader_text . '$3',
			$link,
			1
		);
	}
	add_filter( 'edit_post_link', 'simone_edit_post_link', 10, 3 );
}

/**
 * Returns true if a blog has more than 1 category.
 */
function simone_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so simone_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so simone_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in simone_categorized_blog.
 */
function simone_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'simone_category_transient_flusher' );
add_action( 'save_post', 'simone_category_transient_flusher' );

/*
 * Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 */
function simone_social_menu() {
	if ( has_nav_menu( 'social' ) ) {
		wp_nav_menu(
			array(
				'theme_location'  => 'social',
				'container'       => 'div',
				'container_id'    => 'menu-social',
				'container_class' => 'menu-social',
				'menu_id'         => 'menu-social-items',
				'menu_class'      => 'menu-items',
				'depth'           => 1,
				'link_before'     => '<span class="screen-reader-text">',
				'link_after'      => '</span>',
				'fallback_cb'     => '',
			)
		);
	}
}

/**
 * Capture the custom background color and pass it to the background of featured images on single pages
 */
function simone_background_style() {
	if ( is_single() && has_post_thumbnail() ) {
		$background_color = get_background_color();
		echo '<style type="text/css">';
		echo '.single-post-thumbnail { background-color: #' . sanitize_hex_color( $background_color ) . '; }';
		echo '</style>';
	}
}
add_action( 'wp_head', 'simone_background_style' );

if ( ! function_exists( 'simone_the_attached_image' ) ) :
	/**
	 * Print the attached image with a link to the next attached image.
	 *
	 * Appropriated from Twenty Fourteen 1.0
	 */
	function simone_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default Twenty Fourteen attachment size.
		 */
		$attachment_size     = apply_filters( 'simone_attachment_size', array( 700, 700 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		* Grab the IDs of all the image attachments in a gallery so we can get the URL
		* of the next adjacent image in a gallery, or the first image (if we're
		* looking at the last image in a gallery), or, in a gallery of one, just the
		* link to that image file.
		*/
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			}

			// or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
endif;


if ( ! function_exists( 'simone_get_untitled_title' ) ) {
	/**
	 * Return a unique fallback text when a title is missing.
	 */
	function simone_get_untitled_title( $post_id = 0 ) {
		$post_id = $post_id ? absint( $post_id ) : get_the_ID();

		return sprintf(
			/* translators: %d: Post ID. */
			__( 'untitled post #%d', 'simone' ),
			$post_id
		);
	}
}

if ( ! function_exists( 'simone_the_title' ) ) {
	/**
	 * Display a post title, with a hidden fallback for untitled content.
	 */
	function simone_the_title() {
		if ( get_the_title() ) {
			the_title();
			return;
		}

		printf(
			'<span class="screen-reader-text">%s</span>',
			esc_html( simone_get_untitled_title() )
		);
	}
}

if ( ! function_exists( 'simone_get_read_more_title' ) ) {
	/**
	 * Return a unique link text for read-more links.
	 */
	function simone_get_read_more_title( $post_id = 0 ) {
		$post_id          = $post_id ? absint( $post_id ) : get_the_ID();
		$title            = get_the_title( $post_id );
		$post_type        = get_post_type( $post_id );
		$post_type_object = $post_type ? get_post_type_object( $post_type ) : null;
		$type_label       = $post_type_object ? $post_type_object->labels->singular_name : __( 'Content', 'simone' );

		if ( $title ) {
			return $title;
		}

		return sprintf(
			/* translators: 1: Post type singular name, for example, post. 2: Post ID. */
			__( '%1$s #%2$d', 'simone' ),
			$type_label,
			$post_id
		);
	}
}
