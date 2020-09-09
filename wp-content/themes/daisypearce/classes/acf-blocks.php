<?php
    add_action('acf/init', 'my_acf_init_block_types');
    function my_acf_init_block_types() {
    
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            acf_register_block_type(array(
                'name'              => 'seperator',
                'title'             => __('Lovely seperator'),
                'description'       => __('A custom seperator block.'),
                'render_template'   => 'blocks/seperator/seperator.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'supports'          => array( 'align' => false ),
                'keywords'          => array( 'seperator', 'quote' ),
            ));

            acf_register_block_type(array(
                'name'              => 'book',
                'title'             => __('Book'),
                'description'       => __('A custom book block.'),
                'render_template'   => 'blocks/book/book.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'supports'          => array( 'align' => false ),
                'keywords'          => array( 'book', 'quote' )
            ));

            acf_register_block_type(array(
                'name'              => 'praise',
                'title'             => __('Praise'),
                'description'       => __('A custom praise block.'),
                'render_template'   => 'blocks/praise/praise.php',
                'category'          => 'formatting',
                'icon'              => 'welcome-view-site',
                'supports'          => array( 'align' => false ),
                'keywords'          => array( 'praise' )
            ));
        }
    }