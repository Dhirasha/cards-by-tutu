<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 1:39 PM
 */
function newp_customize_register_header( $wp_customize ) {
    $wp_customize->add_panel( 'newp_header_panel', array(
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header Settings','newp'),
    ) );

//Logo Settings
$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'newp' ),
    'priority'   => 30,
    'panel'      => 'newp_header_panel'
) );

//Settings For Logo Area

$wp_customize->add_setting(
    'newp_hide_title_tagline',
    array( 'sanitize_callback' => 'newp_sanitize_checkbox' )
);

$wp_customize->add_control(
    'newp_hide_title_tagline', array(
        'settings' => 'newp_hide_title_tagline',
        'label'    => __( 'Hide Title and Tagline.', 'newp' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newp_branding_below_logo',
    array( 'sanitize_callback' => 'newp_sanitize_checkbox' )
);

$wp_customize->add_control(
    'newp_branding_below_logo', array(
        'settings' => 'newp_branding_below_logo',
        'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'newp' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
        'active_callback' => 'newp_title_visible'
    )
);

function newp_title_visible( $control ) {
    $option = $control->manager->get_setting('newp_hide_title_tagline');
    return $option->value() == false ;
}
}
add_action( 'customize_register', 'newp_customize_register_header' );