<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LoganWebDev
 */

get_header();
?>

<main id="primary" class="site-main">


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
            <h1 class="py-12 text-4xl font-bold">
				<?php

				the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
                </h1>
            </header><!-- .page-header -->

            <hr>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
                the_post();


				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );


			endwhile;




		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
        ?>

<hr>
</div>

	</main><!-- #main -->

<?php
get_footer();
