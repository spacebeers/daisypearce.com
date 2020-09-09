<?php
    global $wpdb;
    include('classes/acf-blocks.php');

    add_action('admin_head', 'my_custom_fonts');

    function my_custom_fonts() {
        echo "<style>
            [data-type='acf/seperator'] .flair {
                border-top: 2px solid black;
            }

            [data-type='acf/seperator'] .flair hr {
                display: none;
            }
        </style>";
    }
    
    // Menus
	register_nav_menus( array(
        'main_menu' => 'Main menu',
        'footer_menu' => 'Footer menu'
	) );

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }

    function change_page_menu_classes($menu)  {
        global $post;
        if (get_post_type($post) == 'book') {
            $menu = str_replace( 'current-menu-item', '', $menu ); 
            $menu = str_replace( 'menu-item-54', 'menu-item-54 current-menu-item', $menu ); 
            return $menu;
        }
        if (get_post_type($post) == 'post') {
            $menu = str_replace( 'current-menu-item', '', $menu ); 
            $menu = str_replace( 'menu-item-17', 'menu-item-17 current-menu-item', $menu ); 
            return $menu;
        }

        return $menu;
    }
    add_filter( 'nav_menu_css_class', 'change_page_menu_classes', 10,2 );

    // Fonts
    function wpb_enqueue_styles() {
        wp_enqueue_style( 'theme', get_template_directory_uri() . '/style.css', false, '0.4', 'all');
        wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400;1,600&display=swap', false, '0.3', 'all');
        wp_enqueue_style( 'morefonts', 'https://fonts.googleapis.com/css2?family=Nanum+Myeongjo:wght@400;700&display=swap', false, '0.3', 'all');
    }

    add_action( 'wp_enqueue_scripts', 'wpb_enqueue_styles' );

    // Vendor scripts
    function daisypearce_theme_name_scripts() {
        wp_enqueue_script( 'app', get_template_directory_uri() . '/scripts/app.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/scripts/slick/slick.min.js', array ( 'jquery' ), 1.1, true);
        wp_register_script('share-async', 'https://platform-api.sharethis.com/js/sharethis.js#property=5f1c7324877a5900136dd45d&product=inline-share-buttons', '', 2, false);
        wp_enqueue_script('share-async');
    }
    add_action( 'wp_enqueue_scripts', 'daisypearce_theme_name_scripts' );

	// Post support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
    add_post_type_support( 'page', 'excerpt' );

    // Sidebars

    /**
    * Register widgetized area and update sidebar with default widgets
    */
    function daisypearce_widgets_init() {
        register_sidebar( array(
            'name' => __( 'Footer area left', 'daisypearce' ),
            'id' => 'footer-area-left-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
        register_sidebar( array(
            'name' => __( 'Footer area right', 'daisypearce' ),
            'id' => 'footer-area-right-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
    }
    add_action( 'widgets_init', 'daisypearce_widgets_init' );

        // Custom post types
    function create_posttype() {
        register_post_type('testimonial',
            array(
                'labels' => array(
                    'name' => __( 'Testimonials' ),
                    'singular_name' => __( 'Testimonial' )
                ),
                'public' => false,
                'has_archive' => false,
                'taxonomies'  => array( 'category' ),
                'rewrite' => array('slug' => 'testimonials'),
                'supports' => array('title', 'editor'),
            )
        );

        register_post_type('book',
            array(
                'labels' => array(
                    'name' => __( 'Book' ),
                    'singular_name' => __( 'Books' )
                ),
                'public' => true,
                'has_archive' => true,
                'taxonomies'  => array( 'category' ),
                'rewrite' => array('slug' => 'books'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
            )
        );
    }

    flush_rewrite_rules();

    add_action( 'init', 'create_posttype' );

    // Disable all comments
    // Removes from admin menu
    add_action( 'admin_menu', 'my_remove_admin_menus' );
    function my_remove_admin_menus() {
        remove_menu_page( 'edit-comments.php' );
    }
    // Removes from post and pages
    add_action('init', 'remove_comment_support', 100);

    function remove_comment_support() {
        remove_post_type_support( 'post', 'comments' );
        remove_post_type_support( 'page', 'comments' );
    }
    // Removes from admin bar
    function mytheme_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

    // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
    function daisypearce_pagination()
    {
        global $wp_query;
        $big = 1;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
    }

        
    // Limit available blocks in editor

    // Available blocks are:
    // core/shortcode
    // core/image
    // core/gallery
    // core/heading
    // core/quote
    // core/embed
    // core/list
    // core/separator
    // core/more
    // core/button
    // core/pullquote
    // core/table
    // core/preformatted
    // core/code
    // core/html
    // core/freeform
    // core/latest-posts
    // core/categories
    // core/cover-image
    // core/text-columns
    // core/verse
    // core/video
    // core/audio
    // core/block
    // core/paragraph
    
    // core-embed/twitter
    // core-embed/youtube
    // core-embed/facebook
    // core-embed/instagram
    // core-embed/wordpress
    // core-embed/soundcloud
    // core-embed/spotify
    // core-embed/flickr
    // core-embed/vimeo
    // core-embed/animoto
    // core-embed/cloudup
    // core-embed/collegehumor
    // core-embed/dailymotion
    // core-embed/funnyordie
    // core-embed/hulu
    // core-embed/imgur
    // core-embed/issuu
    // core-embed/kickstarter
    // core-embed/meetup-com
    // core-embed/mixcloud
    // core-embed/photobucket
    // core-embed/polldaddy
    // core-embed/reddit
    // core-embed/reverbnation
    // core-embed/screencast
    // core-embed/scribd
    // core-embed/slideshare
    // core-embed/smugmug
    // core-embed/speaker
    // core-embed/ted
    // core-embed/tumblr
    // core-embed/videopress
    // core-embed/wordpress-tv

    function daisypearce_allowed_blocks() {
        return array(
          'core/shortcode',
          'core/heading',
          'core/paragraph',
          'core/image',
          'core/text-columns',
          'core/columns',
          'core/list',
          'core/table',
          'core-embed/vimeo',
          'core-embed/youtube',
          'acf/praise',
          'acf/book',
          'acf/seperator'
        );
    }
    add_filter( 'allowed_block_types', 'daisypearce_allowed_blocks' );
?>