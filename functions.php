<?php
/**
 * loganwebdev functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package loganwebdev
 */

if ( ! function_exists( 'loganwebdev_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function loganwebdev_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on loganwebdev, use a find and replace
		 * to change 'loganwebdev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'loganwebdev', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.











		/* Theme setup */
		// from https://github.com/wp-bootstrap/wp-bootstrap-navwalker
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'loganwebdev' ),
		) );





		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'loganwebdev_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'loganwebdev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function loganwebdev_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'loganwebdev_content_width', 640 );
}
add_action( 'after_setup_theme', 'loganwebdev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function loganwebdev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'loganwebdev' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'loganwebdev' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'loganwebdev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function loganwebdev_scripts() {
	wp_enqueue_style( 'loganwebdev-style', get_stylesheet_uri() );

    wp_enqueue_script( 'loganwebdev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );



	wp_enqueue_script( 'loganwebdev-custom', get_template_directory_uri() . '/js/lwd.js', array(), '20151215', true );








	wp_enqueue_script( 'loganwebdev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'loganwebdev_scripts' );



/*

Adds scripts for Greensock


wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true );
wp_enqueue_script('jQuery');
*/


// wp_register_script(null, 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);
// wp_enqueue_script( null );

wp_register_script('lwd-tweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', null, null, true);
wp_enqueue_script( 'lwd-tweenMax');

wp_register_script('lwd-scrollMagic','https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', null, null, true);
wp_enqueue_script( 'lwd-scrollMagic');

wp_register_script('lwd-scroll-magic-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', 'lwd-tweenMax', null, true);
wp_enqueue_script( 'lwd-scroll-magic-animation');

wp_register_script('lwd-scrollMagic-debug','https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', null, null, true);
wp_enqueue_script( 'lwd-scrollMagic-debug');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

