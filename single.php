<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LoganWebDev
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			?>


<div class="py-16 justify-around flex">
  <button class="text-center bg-transparent hover:bg-yellow-700 text-yellow-600 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">

  <?php
			previous_post_link();
			?>
	</button>
			<button class="text-center bg-transparent hover:bg-yellow-700 text-yellow-600 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
			HI
		<?php
			next_post_link();

			?>
	</button>
		</div>
		<?php
		endwhile;
		?>


	</main><!-- #main -->

<?php
get_footer();


