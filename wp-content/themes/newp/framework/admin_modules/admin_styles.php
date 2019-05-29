<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 12:54 PM
 */

/**
 * Enqueue Scripts for Admin
 */
if ( is_customize_preview() ) {
    function newp_custom_wp_admin_style() {
        wp_enqueue_style( 'newp-admin_css', get_template_directory_uri() . '/assets/theme-styles/css/admin.css' );
    }
    add_action( 'admin_enqueue_scripts', 'newp_custom_wp_admin_style' );
}
