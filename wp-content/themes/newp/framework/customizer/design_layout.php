<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 1:08 PM
 */
function newp_customize_register_layout_design( $wp_customize ) {

// Layout and Design
$wp_customize->add_panel( 'newp_design_panel', array(
    'priority'       => 2,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Design & Layout','newp'),
) );

$wp_customize->add_section(
    'newp_design_options',
    array(
        'title'     => __('Blog Layout','newp'),
        'priority'  => 0,
        'panel'     => 'newp_design_panel'
    )
);


$wp_customize->add_setting(
    'newp_blog_layout',
    array( 'sanitize_callback' => 'newp_sanitize_blog_layout' )
);

function newp_sanitize_blog_layout( $input ) {
    if ( in_array($input, array('grid','newp') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'newp_blog_layout',array(
        'label' => __('Select Layout','newp'),
        'settings' => 'newp_blog_layout',
        'section'  => 'newp_design_options',
        'type' => 'select',
        'default' => 'newp',
        'choices' => array(
            'grid' => __('Basic Blog Layout','newp'),
            'newp' => __('Newp Default Layout','newp'),
        )
    )
);

$wp_customize->add_section(
    'newp_sidebar_options',
    array(
        'title'     => __('Sidebar Layout','newp'),
        'priority'  => 0,
        'panel'     => 'newp_design_panel'
    )
);

$wp_customize->add_setting(
    'newp_disable_sidebar',
    array( 'sanitize_callback' => 'newp_sanitize_checkbox' )
);

$wp_customize->add_control(
    'newp_disable_sidebar', array(
        'settings' => 'newp_disable_sidebar',
        'label'    => __( 'Disable Sidebar Everywhere.','newp' ),
        'section'  => 'newp_sidebar_options',
        'type'     => 'checkbox',
        'default'  => false
    )
);

$wp_customize->add_setting(
    'newp_disable_sidebar_home',
    array( 'sanitize_callback' => 'newp_sanitize_checkbox' )
);

$wp_customize->add_control(
    'newp_disable_sidebar_home', array(
        'settings' => 'newp_disable_sidebar_home',
        'label'    => __( 'Disable Sidebar on Home/Blog.','newp' ),
        'section'  => 'newp_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'newp_show_sidebar_options',
        'default'  => false
    )
);

$wp_customize->add_setting(
    'newp_disable_sidebar_front',
    array( 'sanitize_callback' => 'newp_sanitize_checkbox' )
);

$wp_customize->add_control(
    'newp_disable_sidebar_front', array(
        'settings' => 'newp_disable_sidebar_front',
        'label'    => __( 'Disable Sidebar on Front Page.','newp' ),
        'section'  => 'newp_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'newp_show_sidebar_options',
        'default'  => false
    )
);


$wp_customize->add_setting(
    'newp_sidebar_width',
    array(
        'default' => 3,
        'sanitize_callback' => 'newp_sanitize_positive_number' )
);

$wp_customize->add_control(
    'newp_sidebar_width', array(
        'settings' => 'newp_sidebar_width',
        'label'    => __( 'Sidebar Width','newp' ),
        'description' => __('Min: 25%, Default: 33%, Max: 40%','newp'),
        'section'  => 'newp_sidebar_options',
        'type'     => 'range',
        'active_callback' => 'newp_show_sidebar_options',
        'input_attrs' => array(
            'min'   => 3,
            'max'   => 5,
            'step'  => 1,
            'class' => 'sidebar-width-range',
            'style' => 'color: #0a0',
        ),
    )
);

/* Active Callback Function */
function newp_show_sidebar_options($control) {

    $option = $control->manager->get_setting('newp_disable_sidebar');
    return $option->value() == false ;

}

$wp_customize-> add_section(
    'newp_custom_footer',
    array(
        'title'			=> __('Custom Footer Text','newp'),
        'description'	=> __('Enter your Own Copyright Text.','newp'),
        'priority'		=> 11,
        'panel'			=> 'newp_design_panel'
    )
);

$wp_customize->add_setting(
    'newp_footer_text',
    array(
        'default'		=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'newp_footer_text',
    array(
        'section' => 'newp_custom_footer',
        'settings' => 'newp_footer_text',
        'type' => 'text'
    )
);
}
add_action( 'customize_register', 'newp_customize_register_layout_design' );