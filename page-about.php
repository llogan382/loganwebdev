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
                <div class="about-2-text">

                <p>
                Logan Web Dev is a web development company that elevates the impact of companies in their online presence.
                <span class="lwd-about-span">
                    I research design trends and best practices so you don't have to.
                </span>
                </p>
                </div>

            </div>
            <div class="about-example-grid">
                <div class="about-example-grid-item about-item1">
                Image by <a href="https://pixabay.com/users/coffeebeanworks-558718/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2083456">Coffee Bean</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2083456">Pixabay</a>
                </div>


                <div class="about-example-grid-item about-item3">
                    \Image by <a href="https://pixabay.com/users/coffeebeanworks-558718/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2083456">Coffee Bean</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2083456">Pixabay</a>
                </div>
                <div class="about-example-grid-item about-item4">
                    Image by <a href="https://pixabay.com/users/Free-Photos-242387/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1209863">Free-Photos</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1209863">Pixabay</a>

                </div>
                <div class="about-example-grid-item about-item5">
                Image by <a href="https://pixabay.com/users/rawpixel-4283981/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1985856">rawpixel</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1985856">Pixabay</a>
                </div>
                <div class="about-example-grid-item about-item6">
                Image by <a href="https://pixabay.com/users/monicore-1499084/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2548653">monicore</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2548653">Pixabay</a>

                </div>
                <div class="about-example-grid-item about-item2">
                Image by <a href="https://pixabay.com/users/typographyimages-3575871/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1915628">Darwin Laganzon</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1915628">Pixabay</a>


                </div>

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





