<?php
/**
 * The template for displaying the footer.
 *
 * @package wp-dentist
 */

?>  
            </div>
            <div id="site-info" class="bottom"><?php 
            /**
             * Functions hooked in to wp_dentist_site_info action.
             *
             * @hooked wp_dentist_template_important_info 
             */
            do_action('wp_dentist_site_info'); ?></div>
            <footer class="footer" role="contentinfo">
                <?php
                /**
                 * Functions hooked in to wp_dentist_footer action.
                 *
                 * @hooked wp_dentist_template_footer_widgets -10 
                 * @hooked wp_dentist_template_copyright -15
                 */ 
                    do_action('wp_dentist_footer'); 
                ?>
            </footer>

        <?php wp_footer(); ?>
    </body>

</html>