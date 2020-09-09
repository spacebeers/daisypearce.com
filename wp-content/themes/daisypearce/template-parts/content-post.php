<article class="book-listing">
    <div class="book-image">
        <?php the_post_thumbnail( 'medium' ); ?>
    </div>
    <div class="book-content">
        <h3><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="btn">Read more</a>
    </div>
</article>