<?php
/**
 * Template Name: Homepage
 *
 *
 * @package wp-dentist
 */

get_header(); ?>

    <?php 
     /**
     * Functions hooked in to wp_dentist_home_banner action.
     *
     * @hooked wp_dentist_template_banner 
     */
    do_action('wp_dentist_home_banner'); ?>

    <div id="site-info"><?php 
        /**
         * Functions hooked in to wp_dentist_site_info action.
         *
         * @hooked wp_dentist_template_important_info 
         */
         do_action('wp_dentist_site_info'); ?>
    </div>
    
    <?php 
    /**
     * Functions hooked in to wp_dentist_home action.
     *
     * @hooked wp_dentist_template_section_1 -10 
     * @hooked wp_dentist_template_section_2 -15
     */
    do_action('wp_dentist_home'); 

get_footer(); ?>