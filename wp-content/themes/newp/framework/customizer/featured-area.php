<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 1:49 PM
 */
function newp_customize_register_farea( $wp_customize )
{
// CREATE THE FCA PANEL
$wp_customize->add_panel( 'newp_fca_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Featured Content Areas','newp'),
    'description'    => '',
) );

//FEATURED AREA 1
$wp_customize->add_section(
    'newp_fc_boxes',
    array(
        'title'     => __('Featured Area 1','newp'),
        'priority'  => 10,
        'panel'     => 'newp_fca_panel'
    )
);

$wp_customize->add_setting(
    'newp_box_enable',
    array( 'sanitize_callback' => 'newp_sanitize_checkbox' )
);

$wp_customize->add_control(
    'newp_box_enable', array(
        'settings' => 'newp_box_enable',
        'label'    => __( 'Enable Featured Area 1.', 'newp' ),
        'section'  => 'newp_fc_boxes',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newp_box_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);

$wp_customize->add_control(
    'newp_box_title', array(
        'settings' => 'newp_box_title',
        'label'    => __( 'Title for the Boxes','newp' ),
        'section'  => 'newp_fc_boxes',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'newp_box_cat',
    array( 'sanitize_callback' => 'newp_sanitize_category' )
);

$wp_customize->add_control(
    new Newp_WP_Customize_Category_Control(
        $wp_customize,
        'newp_box_cat',
        array(
            'label'    => __('Category For Square Boxes.','newp'),
            'settings' => 'newp_box_cat',
            'section'  => 'newp_fc_boxes'
        )
    )
);
}
add_action( 'customize_register', 'newp_customize_register_farea' );