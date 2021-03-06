<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nirzarpatel_Theme
 */

?>
</div>
<footer id="colophon" class="site-footer">
	<div class="site-info grid-x">


		<?php
		$args = array(
			// Argument for query
			'post_type'   => 'Histories',
			'post_status' => 'publish',
			'orderby'     => 'date',
			'order'       => 'ASC',
			'post_count'  => 3,
		);

		// custom query and passing args
		$query = new WP_Query($args);

		// Check that we have query results
		if ($query->have_posts()) {
			// Start looping over the query results

			while ($query->have_posts()) {
				$query->the_post();
		?>

				<!-- HTML Content -->
				<?php the_post_thumbnail(); ?>
				<h1><?php the_title(); ?></h1>
				<p><?php the_excerpt(); ?></p>
				<a href=" <?php get_permalink(); ?> ">Read More...</a>

		<?php
			}
		}
		wp_reset_postdata();
		?>

		<a href="<?php echo esc_url(__('https://wordpress.org/', 'nirzarpateltheme')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'nirzarpateltheme'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'nirzarpateltheme'), 'nirzarpateltheme', '<a href="http://nirzarpatel.com/">Nirzar Patel</a>');
		?>
	</div><!-- .site-info -->

</footer><!-- #colophon -->
</div>
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>