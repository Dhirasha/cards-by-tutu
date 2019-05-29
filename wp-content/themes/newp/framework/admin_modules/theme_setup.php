<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 12:56 PM
 */


if ( ! function_exists( 'newp_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function newp_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on newp, use a find and replace
         * to change 'newp' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'newp', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         *
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'newp' ),
            'bottom' => __( 'Bottom Menu', 'newp' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'image', 'video'
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'newp_custom_background_args', array(
            'default-color' => '2f2f2f',
            'default-image' => '',
        ) ) );

        add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        add_image_size('newp-pop-thumb',542, 343, true );

        //RT Slider Support
        add_theme_support('rt-slider', array( 10 , 'pages',
            'config' => array(
                'options' => array('speed', 'duration','random', 'autoplay','pager'),
            )
        ));

        //WooCommerce Support
        add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-lightbox' );



    }
endif; // newp_setup
add_action( 'after_setup_theme', 'newp_setup' );