<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 12:58 PM
 */

/**
 * newp functions and definitions
 *
 * @package newp
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}


/*
** Function for Backwards Compatibility of Custom Logo. Remove on WP 4.7
*/
//Backwards Compatibility FUnction
function newp_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}

function newp_has_logo() {
    if (function_exists( 'has_custom_logo')) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}