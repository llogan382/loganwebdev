<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LoganWebDev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123639854-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123639854-1');
</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<meta name="description" content="Logan Web Dev is helping small to medium sized businesses create and accelerate their presence online with custom development, SEO, designs, and integrations."/>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="border-solid border-8 border-gray-600">

	<header id="masthead" class="site-header">
		<div class="site-branding">



				<nav class="flex items-center justify-between flex-auto p-6">

				<img src="<?php echo get_template_directory_uri(); ?>/assets/lwd-logo.png" alt="Luke Logan" />

			<?php

    wp_nav_menu(array(
		'menu'    => 2, //menu id
		'items_wrap'      => '<div id="%1$s" class="flex flex-row %2$s">%3$s</div>',
        'walker'  => new Walker_Quickstart_Menu() //use our custom walker
    ));
			?>
		</nav><!-- #site-navigation -->
				<p class="site-description"><?php echo $loganwebdev_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

		</div><!-- .site-branding -->


	</header><!-- #masthead -->
	<main id="primary" class="site-main">
	<div class="flex">
  <div class="md:w-1/5 w-2"></div>
  <div class="md:w-3/5 w-full">