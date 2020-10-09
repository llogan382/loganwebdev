<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LoganWebDev
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
    <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
    <?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				?>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php loganwebdev_post_thumbnail(); ?>

        <header class="entry-header">
            <script>
            <?php the_field('header_script'); ?>
            </script>
            <?php
		if ( is_singular() ) :
			the_title( '<h1  class="py-4 font-semibold text-yellow-600">', '</h2>' );
		else :
			the_title( '<h1  class="py-4 font-semibold text-yellow-600"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
            <div class="entry-meta">
                <?php
				loganwebdev_posted_on();
				?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->


        <div class="pb-16 space-y-4 entry-content">
            <?php


$project_cat = get_field('category_of_work');
if( $project_cat ) {
	// Do something.
	echo $project_cat;
}
the_excerpt();




		?>
        </div><!-- .entry-content -->


        <style>
        <?php the_field('post_styles');
        ?>
        </style>
        <script>
        <?php the_field('footer_script'); ?>
        </script>
        <hr>

    </article><!-- #post-<?php the_ID(); ?> -->

    <?php


			endwhile;

?>


    <div class="py-16 justify-around flex">


        <?php
$prev_links = get_previous_posts_link();
if( $prev_links ) :
echo '<button class="text-center bg-transparent hover:bg-yellow-700 text-yellow-600 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">' . "$prev_links" . '</button>';

endif; ?>

        <?php
$next_links = get_next_posts_link();
if( $next_links ) :
echo '<button class="text-center bg-transparent hover:bg-yellow-700 text-yellow-600 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">' . "$next_links" . '</button>';

endif; ?>
    </div>



    <?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->

<?php

get_footer();