<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package loganwebdev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="_SV4gkSePhPfzMvIQIzMKxDQ-yVWx7TzXU2REZyIk5U" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script>

	<?php the_field('header_script'); ?>
	</script>

		<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'loganwebdev' ); ?></a>

	<header id="masthead" class="site-header">
	<nav class="navbar">

<?php
wp_nav_menu( array(
	'theme_location'    => 'primary',

) );
?>
</nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
