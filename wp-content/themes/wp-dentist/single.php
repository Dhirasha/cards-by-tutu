<?php
/**
 * The template for displaying all single posts.
 *
 *
 * @package wp-dentist
 */

get_header(); ?>
    
    <div class="page-title-area">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <div id="site-info"><?php 
        /**
         * Functions hooked in to wp_dentist_site_info action.
         *
         * @hooked wp_dentist_template_important_info 
         */
         do_action('wp_dentist_site_info'); ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 content-area">
                <?php
                while ( have_posts() ) : the_post();

                get_template_part( 'contents/content', 'single' );

                endwhile; // End of the loop.
                ?>  
            </div> 

            <?php get_sidebar(); ?>

            <span class="clearfix"></span>
        </div>
    </div>

<?php get_footer(); ?>