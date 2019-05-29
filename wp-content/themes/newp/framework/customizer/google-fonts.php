<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 1:03 PM
 */
function newp_customize_register_google_fonts( $wp_customize )
{
    $wp_customize->add_section(
        'newp_typo_options',
        array(
            'title'     => __('Google Web Fonts','newp'),
            'priority'  => 41,
            'panel'     => 'newp_design_panel'
        )
    );

    $font_array = array('Montserrat','Roboto Condensed','Open Sans','Oswald','Slabo','Source Sans Pro');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'newp_title_font',
        array(
            'default'=> 'Montserrat',
            'sanitize_callback' => 'newp_sanitize_gfont'
        )
    );

    function newp_sanitize_gfont( $input ) {
        if ( in_array($input, array('Montserrat','Roboto Condensed','Open Sans','Oswald','Slabo','Source Sans Pro') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'newp_title_font',array(
            'label' => __('Title','newp'),
            'settings' => 'newp_title_font',
            'section'  => 'newp_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'newp_body_font',
        array(	'default'=> 'Source Sans Pro',
            'sanitize_callback' => 'newp_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'newp_body_font',array(
            'label' => __('Body','newp'),
            'settings' => 'newp_body_font',
            'section'  => 'newp_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action( 'customize_register', 'newp_customize_register_google_fonts' );