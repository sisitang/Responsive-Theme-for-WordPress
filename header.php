<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package hope
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
            <div class="inner_header">
                <div class="mobile_menu"></div>
                <?php if ( get_header_image() ) : ?>
                <div class="logo_img_customized">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="tradeworks logo">
                </div>
                <?php endif; // End header image check. ?>	
                <?php hope_social_menu() ?>
                <div class="menu-wrapper">
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                        </nav><!-- #site-navigation -->
                        <button class="givenowbutton">Give Now</button>
                        <button class="shopbutton">Shop</button>
                </div>
            </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
