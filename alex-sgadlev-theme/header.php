<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alex-sgadlev-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header class="site-header">
		<div class="container">

			<div class="entry-container">

				<div class="header-logo align-middle">
					<?php the_custom_logo(); ?>
				</div>

				<div class="nav-container text-right align-middle">

					<div class="d-inline">
						<button id="m-nav" class="menu-toggle d-xs-inline-block d-sm-inline-block d-md-none" aria-controls="primary-menu">
							<span class="w-tools-icon"></span>	
						</button>
					<nav id="site-navigation" class="main-navigation nav-item">
						<div class="header-menu">
							<button type="button" class="close-nav d-sm-block d-md-none" data-dismiss="site-navigation" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<div class="b-nav-overlay"></div>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container_class'     => 'header-menu-container',
								)
							);
							?>
						</div>	
					</nav><!-- #site-navigation -->

					<div class="button simple-button nav-item">
						<button type="button" class="btn">I am Button</button>
					</div>

					</div>

				</div>
				
				</div>


		</div>
	</header><!-- #masthead -->
