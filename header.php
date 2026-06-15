<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Simone
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php
if ( is_singular() && pings_open() ) {
	printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
}

wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="hfeed site wp-site-blocks">

	<header id="masthead" class="site-header" role="banner">
		<a class="skip-link screen-reader-text" id="wp-skip-link" href="#content"><?php _e( 'Skip to content', 'simone' ); ?></a>
			<?php if ( get_header_image() && ( 'blank' == get_header_textcolor() ) ) { ?>
				<figure class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
					</a>
				</figure>
			<?php } // End header image check. ?>
			<?php
			if ( get_header_image() && ! ( 'blank' == get_header_textcolor() ) ) {
				echo '<div class="site-branding header-background-image" style="background-image: url(' . esc_url( get_header_image() ) . ')">';
			} else {
				echo '<div class="site-branding">';
			}
			?>
			<div class="title-box">
				<?php if ( is_home() ) { ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php } ?>
				<?php
					if ( get_bloginfo( 'description' ) ) {
					?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php } ?>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation clear" role="navigation" aria-label="<?php esc_attr_e( 'Main', 'simone' ); ?>">
			<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false" data-label-open="<?php esc_attr_e( 'Open menu', 'simone' ); ?>" data-label-close="<?php esc_attr_e( 'Close menu', 'simone' ); ?>"><span aria-hidden="true"><?php _e( 'Menu', 'simone' ); ?></span><span class="screen-reader-text"><?php _e( 'Open menu', 'simone' ); ?></span></button>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			<div class="extra-menu">
				<div class="search-toggle">
					<button type="button" aria-controls="header-search-container" aria-expanded="false" data-label-open="<?php esc_attr_e( 'Open search form', 'simone' ); ?>" data-label-close="<?php esc_attr_e( 'Close search form', 'simone' ); ?>"><span class="screen-reader-text"><?php _e( 'Open search form', 'simone' ); ?></span></button>
				</div>
				<div id="header-search-container" class="search-box-wrapper clear hide" hidden>
					<div class="search-box clear">
						<?php get_search_form(); ?>
					</div>
				</div>
				<?php simone_social_menu(); ?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
