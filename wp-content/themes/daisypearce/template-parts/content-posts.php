<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    
    <h1 class="page_title"><?php the_title(); ?></h1>

    <?php the_content(); ?>

    <?php get_template_part('loop'); ?>

    <?php get_template_part('pagination'); ?>
	
</article>