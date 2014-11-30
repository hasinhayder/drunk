<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package drunk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<div class="banner">
		<div class="container" id="header">
			<div class="row">
				<div class="col-md-5">

					<a class="skip-link screen-reader-text"
					   href="#content"><?php _e( 'Skip to content', 'drunk' ); ?></a>

					<header id="masthead" class="site-header" role="banner">
						<div class="site-branding wow bounceInDown">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
							                          rel="home"><?php bloginfo( 'name' ); ?></a></h1>

							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
						<!-- .site-branding -->


					</header>
					<!-- #masthead -->
				</div>
				<div class="col-md-7">
					<nav id="site-navigation" class="wow fadeIn" role="navigation">
						<button class="menu-toggle" aria-controls="menu"
						        aria-expanded="false"><?php _e( 'Primary Menu', 'drunk' ); ?></button>
						<?php wp_nav_menu( array( 'menu_class'=>'pull-right wow fadeIn', 'theme_location' => 'primary' ) ); ?>
					</nav>
					<!-- #site-navigation -->
				</div>
			</div>
		</div>
	</div>


	<div id="content" class="site-content">
