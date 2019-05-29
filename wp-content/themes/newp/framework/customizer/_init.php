<?php
/**
 * newp Theme Customizer
 *
 * @package newp
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newp_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel  = 'newp_header_panel';
}
add_action( 'customize_register', 'newp_customize_register' );
//Load All Individual Settings Based on Sections/Panels.

require_once get_template_directory().'/framework/customizer/sanitization.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/featured-area.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/design_layout.php';
require_once get_template_directory().'/framework/customizer/skins_colors.php';
require_once get_template_directory().'/framework/customizer/google-fonts.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newp_customize_preview_js() {
    wp_enqueue_script( 'newp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'newp_customize_preview_js' );
