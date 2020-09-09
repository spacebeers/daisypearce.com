<?php 
    $option_page = 'cpt_news';
    get_header(); ?>
    <main role="main">
		<!-- section -->
		<section>	
            <article id="post-<?php the_ID(); ?>" <?php post_class("page book-page"); ?>>
                <div class="post-contents">
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1><?php the_title(); ?></h1>
                            <div class="book-columns">
                                <div class="book-content">
                                    <?php the_content(); // Dynamic Content ?>     

                                    <?php
                                        // Check rows exists.
                                        if ( have_rows('purchase_links') ): 
                                    ?>  
                                        <div class="retail-links">
                                            <h2>Own <?php the_title(); ?></h2>

                                            <p>Experience <?php the_title(); ?> for yourself from one of these retailers:</p>
                                            
                                            <?php 
                                                // Loop through rows.
                                                while( have_rows('purchase_links') ) : the_row();

                                                    // Load sub field value.
                                                    $link = get_sub_field('link');
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                    <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                                                <?php // End loop.
                                                endwhile;
                                            ?>

                                        </div>
                                        <?php 
                                        endif;
                                    ?>

                                    <?php include( locate_template( 'template-parts/post-share.php', false, false ) ); ?>		
                                </div>
                                <div class="book-image">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </div>
                            </div>    
                        </article>
                        <!-- /article -->
                        <div class="flair flair-right">
                            <?php echo file_get_contents(get_template_directory() . '/assets/flair.svg', true); ?>
                            <hr />
                        </div>

                        <?php
                            $categories = get_the_category();

                            $new_loop = new WP_Query( array(
                                'post_type' => 'testimonial',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field'    => 'slug',
                                        'terms'    => $categories[0]->slug,
                                        ),
                                    ),
                                )
                            );
                        ?>
                        <?php if ( $new_loop->have_posts() ) : ?>

                            <h2>Praise for <?php the_title(); ?></h2>
                            
                            <div class="praise-carousel">
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
                                <?php wp_reset_query(); ?>
                            </div>
                            <div class="flair flair-left">
                                <?php echo file_get_contents(get_template_directory() . '/assets/flair.svg', true); ?>
                                <hr />
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h1><?php _e( 'Sorry, nothing to display.', 'daisypearce' ); ?></h1>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>
                </div>	
            </article>
        </section>
        <?php include( locate_template( 'template-parts/related-content.php', false, false ) ); ?>			
    </main>
<?php get_footer(); ?>
