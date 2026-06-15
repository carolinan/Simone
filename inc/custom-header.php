<?php
/**
 * Custom header feature
 *
 * @package simone
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses simone_header_style()
 */
function simone_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'simone_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1280,
		'height'                 => 300,
		'flex-height'            => false,
		'wp-head-callback'       => 'simone_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'simone_custom_header_setup' );

if ( ! function_exists( 'simone_header_style' ) ) {
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see simone_custom_header_setup().
	 */
	function simone_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) {
			?>
			.site-branding {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			<?php
			// If the user has set a custom color for the text use that.
		} else {
			?>
				.site-title a,
				.site-description {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
			<?php
		}
		?>
		</style>
		<?php
	}
} // simone_header_style
