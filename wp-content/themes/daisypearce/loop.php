<?php $count = 0; ?>

<div class="books-list">
	<?php 
		$related_loop = new WP_Query( array(
			'post_type'      => 'post'
		) );
		
		if ( $related_loop->have_posts() ) : 

			while ( $related_loop->have_posts() ) : $related_loop->the_post();
	?>
				<?php include( locate_template( 'template-parts/book-listing.php', false, false ) ); ?>	
				
				<div class="flair flair-<?php echo ($count % 2 == 0) ? 'left' : 'right'; ?>">
					<?php echo file_get_contents(get_template_directory() . '/assets/flair.svg', true); ?>
					<hr />
				</div>
   			<?php $count++; ?>
    <?php endwhile; ?>
</div>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'wave' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
