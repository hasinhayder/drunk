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
<div class="sidenav panel" id="sidenav">
    <nav id="site-navigation" class="wow" role="navigation">
        <button class="menu-toggle" aria-controls="menu"
                aria-expanded="false"><?php _e( 'Primary Menu', 'drunk' ); ?></button>
        <?php wp_nav_menu( array( 'menu_class'=>'pull-right wow fadeIn', 'theme_location' => 'primary' ) ); ?>
    </nav>
</div>
<div id="drunkmain" class="wrap">


<div id="page" class="hfeed site ">
	<div class="banner bannerbg" id="mainbanner">
        <div class="banner-overlay"></div>
		<div class="container" id="header">
            <div class="row">
                <div class="col-md-12">
                    <div class="resp wow fadeInDown">
                        <a href="#sidenav" id="sidemenu">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <!-- #site-navigation -->
                </div>
            </div>
			<div class="row">
				<div class="col-md-12">

					<a class="skip-link screen-reader-text"
					   href="#content"><?php _e( 'Skip to content', 'drunk' ); ?></a>

					<header id="masthead" class="site-header" role="banner">
						<div class="site-branding wow bounceInDown">
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>

							<h2 class="site-description wow bounceInDown"><?php bloginfo( 'description' ); ?></h2>
						</div>
						<!-- .site-branding -->
					</header>
					<!-- #masthead -->
				</div>
			</div>
		</div>
	</div>
<!--    <div class="miniquote">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-1"></div>-->
<!--                <div class="col-md-10">-->
<!--                    <p>Whenever you find yourself on the side of the majority, it is time to pause and reflect</p>-->
<!--                    <p class="author"> Mark Twain</p>-->
<!--                </div>-->
<!--                <div class="col-md-1"></div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


	<div id="content" class="site-content">
