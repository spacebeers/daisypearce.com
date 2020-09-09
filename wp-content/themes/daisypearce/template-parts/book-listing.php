<article class="book-listing">
    <div class="book-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a></div>
    <div class="book-content">
        <h3>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="btn">Read more</a>
    </div>
</article>