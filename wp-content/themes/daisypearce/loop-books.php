<?php $count = 0; ?>

<div class="books-list">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php include( locate_template( 'template-parts/book-listing.php', false, false ) ); ?>	
		
		<div class="flair flair-<?php echo ($count % 2 == 0) ? 'right' : 'left'; ?>">
			<?php echo file_get_contents(get_template_directory() . '/assets/flair.svg', true); ?>
			<hr />
		</div>
    <?php $count++; ?>
    <?php endwhile; ?>
</div>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'daisypearce' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
