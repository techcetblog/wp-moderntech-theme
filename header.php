<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ModernTech
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'moderntech_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,400;0,700;1,400;1,500&family=Crimson+Text:ital,wght@0,400;0,700;1,400;1,700&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?> <?php moderntech_body_attributes(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
	<div class="site" id="page">

		<!-- ******************* Top Bar ******************* -->
		<div id="top-bar">
			<div class="container">
				<div class="login-register-mobile">
					<?php if(!is_user_logged_in()): ?>
					<a href="<?php echo wp_login_url(); ?>">
						<i class="fa fa-user-circle"></i>
						<span>Login</span>
					</a>
					<?php else: ?>
					<a href="<?php echo wp_logout_url(); ?>">
						<span>Logout</span>
						<i class="fa fa-power-off"></i>
					</a>
					<?php endif; ?>
				</div>
				<div class="contact-info">
					<div class="contact-item phone">
						<i class="fa fa-phone"></i>
						<span>+91 97491 29272</span>
					</div>
					<div class="contact-item email">
						<i class="fa fa-envelope-o"></i>
						<a href="mailto:surajitbasak109@gmail.com">surajitbasak109@gmail.com</a>
					</div>
					<div class="contact-item search">
						<form action="/" role="search" method="GET">
							<i class="fa fa-search"></i>
							<input type="text" name="s" aria-label="search text" placeholder="Search..." />
						</form>
					</div>
				</div>
				<div class="login-register">
					<?php if(!is_user_logged_in()): ?>
					<a href="<?php echo wp_login_url(); ?>">
						<span>Login / Register</span>
						<i class="fa fa-user-circle"></i>
					</a>
					<?php else: ?>
					<a href="<?php echo wp_logout_url(); ?>">
						<span>Logout</span>
						<i class="fa fa-power-off"></i>
					</a>
					<?php endif; ?>
				</div>
				<div class="top-social-icons">
					<ul class="social-menu">
						<li>
							<a href="http://facebook.com/freshtechbloggers" target="_blank" title="Facebook">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li>
							<a href="https://www.linkedin.com/in/surajit-basak-5a75587a/" target="_blank" title="Linkedin">
								<i class="fa fa-linkedin"></i>
							</a>
						</li>
						<li>
							<a href="https://www.youtube.com/channel/UCmSndEuckFjUhdZmzqO1SBg" target="_blank" title="Youtube">
								<i class="fa fa-youtube"></i>
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/surajit4490/" target="_blank" title="Instagram">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- <div class="mobile-menu">
					Menu
					<i class="fa fa-bars"></i>
				</div> -->
			</div>
		</div>
		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar">

			<nav id="main-nav" class="navbar navbar-expand-lg navbar-light" aria-labelledby="main-nav-label">

				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e( 'Main Navigation', 'moderntech' ); ?>
				</h2>

			<?php if ( 'container' === $container ) : ?>
				<div class="container">
			<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>

						<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- end custom logo -->

					<?php if ( '' != get_bloginfo( 'description' ) ) : ?>
						<!-- Site Description -->
						<div class="site-description"> <?php echo bloginfo( 'description' ); ?> </div>
						<!-- end of site description -->
					<?php endif; ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'moderntech' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->
