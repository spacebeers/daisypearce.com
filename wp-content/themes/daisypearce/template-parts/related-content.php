<?php
    $related_loop = new WP_Query( array(
        'post_type'      => 'book',
        'post__not_in'   => array(get_the_ID()),
        'posts_per_page' => 1,
        'orderby'        => 'rand'
    ) );
?>

<?php if ( $related_loop->have_posts() ) : ?>
    <section class="related-content">
        <h2>More from Daisy Pearce</h2>
        <?php while ( $related_loop->have_posts() ) : $related_loop->the_post(); ?>
            <?php include( locate_template( 'template-parts/book-listing.php', false, false ) ); ?>	
        <?php endwhile;?>
        </section>
<?php endif; ?>



