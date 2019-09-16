<?php
/**
* Template Name: About Page
*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package loganwebdev
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php



		while ( have_posts() ) :
			the_post();
?>


        <?php loganwebdev_post_thumbnail(); ?>

        <div class="about-content">
            <div class="about-top">
                <h3>We are web builders. </h3>

            </div>
            <div class="about-2">
                <div class="about-2-logos">
                </div>
                <div class="about-2-text"></div>
                <p>
                Logan Web Dev is a web development company that elevates the impact of companies in their online presence.
                </p>
            </div>
        </div><!-- .entry-content -->

                <?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
