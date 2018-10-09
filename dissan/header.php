<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dissan
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
   <link href="https://fonts.googleapis.com/css?family=Nunito:300,800" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,700,700i" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dissan' ); ?></a>

	<header class="site-header">
		
      <div class="inner-header">

         <?php if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-logo"><?php the_custom_logo(); ?></h1><!-- .site-logo -->
         <?php endif; ?>
         

         <nav class="main-nav">
            <div class="mobile-menu"></div>
            <?php
            wp_nav_menu( array(
               'theme_location' => 'menu-1',
               'menu_id'        => 'primary-menu',
            ) );
            ?>
		   </nav><!-- .main-nav -->
      
      </div><!-- .inner-header -->

	</header><!-- #masthead -->
