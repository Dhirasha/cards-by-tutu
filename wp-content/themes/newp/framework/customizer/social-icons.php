<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 1:45 PM
 */
function newp_customize_register_social( $wp_customize )
{

// Social Icons
    $wp_customize->add_section('newp_social_section', array(
        'title' => __('Social Icons', 'newp'),
        'priority' => 44,
        'panel'      => 'newp_header_panel'

    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-', 'newp'),
        'facebook' => __('Facebook', 'newp'),
        'twitter' => __('Twitter', 'newp'),
        'google-plus' => __('Google Plus', 'newp'),
        'instagram' => __('Instagram', 'newp'),
        'rss' => __('RSS Feeds', 'newp'),
        'vine' => __('Vine', 'newp'),
        'vimeo-square' => __('Vimeo', 'newp'),
        'youtube' => __('Youtube', 'newp'),
        'flickr' => __('Flickr', 'newp'),
    );

    $social_count = count($social_networks);

    for ($x = 1; $x <= ($social_count - 3); $x++) :

        $wp_customize->add_setting(
            'newp_social_' . $x, array(
            'sanitize_callback' => 'newp_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control('newp_social_' . $x, array(
            'settings' => 'newp_social_' . $x,
            'label' => __('Icon ', 'newp') . $x,
            'section' => 'newp_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'newp_social_url' . $x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control('newp_social_url' . $x, array(
            'settings' => 'newp_social_url' . $x,
            'description' => __('Icon ', 'newp') . $x . __(' Url', 'newp'),
            'section' => 'newp_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function newp_sanitize_social($input)
    {
        $social_networks = array(
            'none',
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if (in_array($input, $social_networks))
            return $input;
        else
            return '';
    }
}
add_action( 'customize_register', 'newp_customize_register_social' );
	