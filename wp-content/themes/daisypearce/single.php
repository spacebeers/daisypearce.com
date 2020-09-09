<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- post title -->
                <h1><?php the_title(); ?></h1>
                <!-- /post title -->
                <div class="book-columns">
                    <div class="book-content">
                        <?php the_content(); // Dynamic Content ?>

                        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
                    </div>
                    <div class="book-image">
                        <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                            <div class="post-image">
                                <?php the_post_thumbnail("full"); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <!-- /article -->

        <?php endwhile; ?>

        <?php else: ?>

            <!-- article -->
            <article>

                <h1><?php _e( 'Sorry, nothing to display.', 'wave' ); ?></h1>

            </article>
            <!-- /article -->

        <?php endif; ?>
    </article>

<?php get_footer(); ?>
