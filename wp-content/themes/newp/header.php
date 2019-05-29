<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package newp
 */
?>
<?php get_template_part('modules/header/head'); ?>


<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newp' ); ?></a>

    <?php get_template_part('modules/header/jumbosearch'); ?>
    <?php get_template_part('modules/header/masthead'); ?>
    <?php get_template_part('modules/header/header-image'); ?>
    <?php get_template_part('modules/header/top-bar'); ?>
	
	<div class="mega-container">
			
		<?php if ( class_exists('rt_slider') ) :
			rt_slider::render('framework/featured-components/slider', 'nivo' );
		endif; ?>
		
		<?php get_template_part('framework/featured-components/featured', 'area1'); ?>
	
		<div id="content" class="site-content container">