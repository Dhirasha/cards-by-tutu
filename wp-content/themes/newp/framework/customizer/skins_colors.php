<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 1:10 PM
 */
//Skin
function newp_customize_register_skins( $wp_customize )
{

    $wp_customize->add_setting(
        'newp_skin',
        array(
            'default' => 'default',
            'sanitize_callback' => 'newp_sanitize_skin'
        )
    );

    $skins = array('default' => __('Default(Dark)', 'newp'),
        'brown' => __('Light Brown', 'newp'),
        'green' => __('Green', 'newp'),
        'darkbrown' => __('Dark Brown', 'newp'));

    $wp_customize->add_control(
        'newp_skin', array(
            'label' => __('Choose Skin', 'newp'),
            'description' => __('Default Background Colors for these Skins are: <br />Default: #2f2f2f <br/>Light Brown: #541515 <br/>Green: #4ba851 <br/> Dark Brown: #473432', 'newp'),
            'settings' => 'newp_skin',
            'section' => 'colors',
            'type' => 'select',
            'choices' => $skins,
            'priority' => 1
        )
    );

    function newp_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'darkbrown', 'brown', 'green', 'grayscale')))
            return $input;
        else
            return '';
    }


//Renaming colors section
    $wp_customize->add_section('colors', array(
        'title' => __('Theme Skin & Colors', 'newp'),
        'priority' => 3,
        'panel' => 'newp_design_panel'

    ));

//Replace Header Text Color with, separate colors for Title and Description
//Override newp_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->add_setting('newp_site_titlecolor', array(
        'default' => '#919191',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'newp_site_titlecolor', array(
            'label' => __('Site Title Color', 'newp'),
            'section' => 'colors',
            'settings' => 'newp_site_titlecolor',
            'type' => 'color'
        ))
    );

    $wp_customize->add_setting('newp_header_desccolor', array(
        'default' => '#777',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'newp_header_desccolor', array(
            'label' => __('Site Tagline Color', 'newp'),
            'section' => 'colors',
            'settings' => 'newp_header_desccolor',
            'type' => 'color'
        ))
    );
}
add_action( 'customize_register', 'newp_customize_register_skins' );