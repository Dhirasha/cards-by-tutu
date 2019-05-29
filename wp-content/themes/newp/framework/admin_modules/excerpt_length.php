<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 4/4/2018
 * Time: 12:57 PM
 */

//Function to Trim Excerpt Length & more..
function newp_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'newp_excerpt_length', 999 );

function newp_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'newp_excerpt_more' );
