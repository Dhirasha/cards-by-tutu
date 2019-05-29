<?php 

/**
 * Customizer settings
 *
 * @package wp-dentist
 */

if ( ! function_exists( 'wp_dentist_theme_customizer' ) ) :
  function wp_dentist_theme_customizer( $wp_customize ) {

    /* Homepage Sections */
    $wp_customize->add_section( 'wp_dentist_homepage' , array(
      'title'       => __( 'Homepage Sections', 'wp-dentist' ),
      'priority'    => 30,
      'description' => __( 'Select a page to be assigned for each section', 'wp-dentist' ),
    ) );

    $wp_customize->add_setting( 'wp_dentist_section_1', array (
      'sanitize_callback' => 'wp_dentist_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_dentist_section_1', array(
      'label'    => __( 'Banner', 'wp-dentist' ),
      'section'  => 'wp_dentist_homepage',
      'settings' => 'wp_dentist_section_1',
      'type'     => 'dropdown-pages'
    ) ) );

    $wp_customize->add_setting( 'wp_dentist_section_2', array (
      'sanitize_callback' => 'wp_dentist_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_dentist_section_2', array(
      'label'    => __( 'Section 1', 'wp-dentist' ),
      'section'  => 'wp_dentist_homepage',
      'settings' => 'wp_dentist_section_2',
      'type'     => 'dropdown-pages'
    ) ) );

    $wp_customize->add_setting( 'wp_dentist_section_3', array (
      'sanitize_callback' => 'wp_dentist_sanitize_dropdown_pages',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_dentist_section_3', array(
      'label'    => __( 'Section 2', 'wp-dentist' ),
      'section'  => 'wp_dentist_homepage',
      'settings' => 'wp_dentist_section_3',
      'type'     => 'dropdown-pages'
    ) ) );
    
    /* color scheme option */
    $wp_customize->add_setting( 'wp_dentist_color_settings', array (
      'default' => '#00bcd4',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_dentist_color_settings', array(
      'label'    => __( 'Primary Color Scheme', 'wp-dentist' ),
      'section'  => 'colors',
      'settings' => 'wp_dentist_color_settings',
    ) ) );

    $wp_customize->add_setting( 'wp_dentist_footer_bg', array (
      'default' => '#2b364c',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_dentist_footer_bg', array(
      'label'    => __( 'Footer Background', 'wp-dentist' ),
      'section'  => 'colors',
      'settings' => 'wp_dentist_footer_bg',
    ) ) );
  
  }
endif;
add_action('customize_register', 'wp_dentist_theme_customizer');


/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'wp_dentist_sanitize_checkbox' ) ) :
  function wp_dentist_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
      return 1;
    } else {
      return '';
    }
  }
endif;

/**
 * Sanitize text field html
 */
if ( ! function_exists( 'wp_dentist_sanitize_field_html' ) ) :
  function wp_dentist_sanitize_field_html( $str ) {
    $allowed_html = array(
    'a' => array(
    'href' => array(),
    ),
    'br' => array(),
    'span' => array(),
    );
    $str = wp_kses( $str, $allowed_html );
    return $str;
  }
endif;

if ( ! function_exists( 'wp_dentist_sanitize_dropdown_pages' ) ) :
  function wp_dentist_sanitize_dropdown_pages( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
  }
endif;