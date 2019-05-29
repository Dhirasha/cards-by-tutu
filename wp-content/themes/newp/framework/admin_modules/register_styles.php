<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 12:56 PM
 */

/**
 * Enqueue scripts and styles.
 */
function newp_scripts() {
    wp_enqueue_style( 'newp-style', get_stylesheet_uri() );

    wp_enqueue_style('newp-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('newp_title_font', 'Montserrat')) ).':100,300,400,700' );

    wp_enqueue_style('newp-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('newp_body_font', 'Source Sans Pro')) ).':100,300,400,700' );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

    wp_enqueue_style( 'nivo-slider-skin', get_template_directory_uri() . '/assets/css/nivo-dark/dark.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'flex-image', get_template_directory_uri() . '/assets/css/jquery.flex-images.css' );

    wp_enqueue_style( 'hover', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'newp-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('newp_skin', 'default').'.css' );

    wp_enqueue_script( 'newp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'newp-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'newp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'newp-custom-js', get_template_directory_uri() . '/js/custom.js' );

    // Localize the script with new data
    $translation_array = array(
        'menu_text' => __( 'Menu', 'newp' ),
    );
    wp_localize_script( 'newp-externaljs', 'menu_obj', $translation_array );

}
add_action( 'wp_enqueue_scripts', 'newp_scripts' );