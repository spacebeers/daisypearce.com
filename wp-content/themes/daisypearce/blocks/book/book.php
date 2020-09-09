<?php
/**
 * Block Name: Book
 */

    $book = get_field('book');
    if ($book): 
        $book_image_url = get_the_post_thumbnail_url($book->ID, 'large'); 
    ?>
        <div class="book-block">
            <h2 class="sr-only"><?php echo esc_html( $book->post_title ); ?></h2>
            <a href="<?php echo get_permalink( $book->ID ); ?>" aria-label="Read more about <?php echo esc_html( $book->post_title ); ?>">
                <img src="<?php echo $book_image_url; ?>" alt="<?php echo esc_html( $book->post_title ); ?> book cover image">  
            </a>
        </div>
    <?php endif; ?>
