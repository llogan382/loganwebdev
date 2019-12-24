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
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NJDRQP7');</script>
<!-- End Google Tag Manager -->

<meta name="google-site-verification" content="_SV4gkSePhPfzMvIQIzMKxDQ-yVWx7TzXU2REZyIk5U" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Description" content="Logan Web Dev is a web developer based out of Greensboro, NC and focusing on small-business needs including SEO, Analytics, WordPress, Migrations, anf front-end-development">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123639854-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123639854-1');
</script>
	<link rel="profile" rel=preconnect href="https://gmpg.org/xfn/11">
	<script>

	<?php the_field('header_script'); ?>
	</script>

		<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe rel=preconnect src="https://www.googletagmanager.com/ns.html?id=GTM-NJDRQP7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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
