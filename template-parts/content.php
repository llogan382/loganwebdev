<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LoganWebDev
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
			the_title( '<h5  class="py-4 font-semibold text-yellow-600">', '</h5>' );
		else :
			the_title( '<h5  class="py-4 font-semibold text-yellow-600"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				loganwebdev_posted_on();
				loganwebdev_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="pb-16 entry-content">
		<?php


$project_cat = get_field('category_of_work');
if( $project_cat ) {
	// Do something.
	echo $project_cat;
}

		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'loganwebdev' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);




		?>
	</div><!-- .entry-content -->


	<style>
	<?php the_field('post_styles');?>
	</style>
<script>
<?php the_field('footer_script'); ?>
</script>
	<hr>

</article><!-- #post-<?php the_ID(); ?> -->
