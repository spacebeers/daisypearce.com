<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( 'Books', 'daisypearce' ); ?></h1>

			<?php get_template_part('loop-books'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
