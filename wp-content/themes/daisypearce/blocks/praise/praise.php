<?php
/**
 * Block Name: Praise
 */
?>
<div class="praise-carousel">
    <?php
        $new_loop = new WP_Query( array(
            'post_type' => 'testimonial'
        ) );
    ?>

    <?php if ( $new_loop->have_posts() ) : ?>
        <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
            <div>
                <blockquote class="praise">
                    <?php echo file_get_contents(get_template_directory() . '/assets/quote.svg', true); ?>
                    <?php the_content(); ?>
                    <footer>
                        <cite><?php the_title(); ?></cite>
                    </footer>
                </blockquote>
            </div>
        <?php endwhile;?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>