<header id="masthead" class="site-header" role="banner">
    <div class="container">
        <div class="site-branding">
            <?php if ( newp_has_logo() ) : ?>
                <div id="site-logo">
                    <?php newp_logo(); ?>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>

        <div id="social-icons">
            <div id="top-search-form"><?php get_search_form(); ?></div>
            <?php get_template_part('modules/social/social', 'fa'); ?>
        </div>

    </div>

</header><!-- #masthead -->
