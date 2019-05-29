<?php 

/**
 * theme template hooks
 *
 * @package wp-dentist
 */

/**
 * site header
 */
add_action( 'wp_dentist_header', 'wp_dentist_template_header' );
function wp_dentist_template_header(){ ?>
	<header id="site-header" class="container">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
				<span class="sr-only"><?php _e( 'Toggle navigation','wp-dentist' ); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

				<h1 id="logo"><a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo esc_html( bloginfo('name') ); ?></a></h1>

			</div>

			<div class="collapse navbar-collapse" id="main-navigation">
				<?php 
				wp_nav_menu( array(
				'menu'              => 'main-nav',
				'theme_location'    => 'main-nav',
				'depth'             => 2,
				'container'         => 'false',
				'container_class'   => 'collapse navbar-collapse',
				'menu_class'        => 'nav navbar-nav navbar-right',
				'fallback_cb'       => 'wp_dentist_primary_menu_fallback',
				'walker'            => new wp_bootstrap_navwalker())
				);
				
				?>
			</div><!-- /.navbar-collapse -->
		</nav>
	</header>
<?php
}

/**
 * related posts
 */
add_action( 'wp_dentist_relate_posts', 'wp_dentist_template_related_posts' );
function wp_dentist_template_related_posts(){ 
	global $post;
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
	if ( get_theme_mod('wp_dentist_related_posts') ):
	$related_class = 'related-hide';
	else :
	$related_class = '';
	endif;
	if (!empty($related)): ?>

		<div class="related-posts<?php echo " " . esc_attr( $related_class ); ?>">
			<h3 class="entry-footer-title"><?php esc_html_e('You may also like ','wp-dentist'); ?></h3>
			<div class="row">
			<?php if( $related ): foreach( $related as $post ) { ?>
			<?php setup_postdata($post); ?>
			
				<div class="col-md-4 related-item">
					<div class="related-image">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php $image_thumb = wp_dentist_catch_that_image_thumb(); $gallery_thumb = wp_dentist_catch_gallery_image_thumb(); 
							if ( has_post_thumbnail()):
							the_post_thumbnail('600x600');  
							elseif(has_post_format('gallery') && !empty($gallery_thumb)): 
							echo $gallery_thumb; 
							elseif(has_post_format('image') && !empty($image_thumb)): 
							echo '<img src="'. esc_url($image_thumb) . '">'; 
							else: ?>
							<?php $blank = get_template_directory_uri() . '/assets/images/blank.jpg'; ?>
							<img src="<?php echo esc_url($blank); ?>">
							<?php endif; ?>
						</a>
					</div>

					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				</div>
			

			<?php } endif; wp_reset_postdata(); ?>

			</div>

		</div>
	<?php endif; 
}

/**
 * Site information
 */
add_action( 'wp_dentist_site_info', 'wp_dentist_template_important_info' );
function wp_dentist_template_important_info(){ 

    if(shortcode_exists( 'contact_details' )){

    $location   = strip_tags( do_shortcode('[contact_details format="horizontal" fields="address"]') );
    $phone      = strip_tags( do_shortcode('[contact_details format="horizontal" fields="phone"]') );
    $social     = do_shortcode('[contact_details type="social" format="horizontal" fields="twitter,facebook,instagram,pinterest,google_plus,linkedin,vimeo,youtube,github"]');
    $email      = strip_tags( do_shortcode('[contact_details format="horizontal" fields="email"]') );

    ?>
	<div class="container">
		<div class="row">
            <?php if( $location ){ ?>
			<div class="site-location info-item col-md-3 col-sm-6">
				<p><?php echo '<span>' . __('Address','wp-dentist') . '</span><br>' . esc_html( $location ); ?></p>
			</div>
            <?php } if( $phone ){ ?>
			<div class="site-phone info-item col-md-3 col-sm-6">
				<p><?php echo '<span>' . __('Phone','wp-dentist') . '</span><br>' . esc_html( $phone ); ?></p>
			</div>
            <?php } if( $social ){ ?>
			<div class="site-social info-item col-md-3 col-sm-6">
				<div><?php echo '<span>' . __('Connect','wp-dentist') . '</span><br>' . wp_kses_post( $social ); ?></div>
			</div>
            <?php } if( $email ){ ?>
			<div class="site-email info-item col-md-3 col-sm-6">
				<p><?php echo '<span>' . __('Email','wp-dentist') . '</span><br>' . esc_html( $email ); ?></p>
			</div>
            <?php } ?>
		</div>
	</div>
<?php
    }
}


/**
 * Homepage Sections
 */
add_action( 'wp_dentist_home_banner', 'wp_dentist_template_banner', 10 );

function wp_dentist_template_banner(){ ?>
	<?php 
        $get_banner_id = get_theme_mod( 'wp_dentist_section_1' );
        $post = get_post( $get_banner_id );
        $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($get_banner_id) );
        $content = apply_filters('the_content', $post->post_content);

        if( $get_banner_id ) :
    ?>
    <section id="banner" style="<?php if( $thumb_url ) { ?> background-image: url( <?php echo esc_url( $thumb_url ); ?> ); <?php } ?>">
        <div class="container">
            <div class="col-md-6 section-content">
                <?php echo $content; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
<?php
}

add_action( 'wp_dentist_home', 'wp_dentist_template_section_1', 10 );
add_action( 'wp_dentist_home', 'wp_dentist_template_section_2', 15 );

function wp_dentist_template_section_1(){

        $get_sec_1_id = get_theme_mod( 'wp_dentist_section_2' );
        $post_1 = get_post( $get_sec_1_id );
        $thumb_url_1 = wp_get_attachment_url( get_post_thumbnail_id($get_sec_1_id) );
        $content_1 = apply_filters('the_content', $post_1->post_content);

        if( $get_sec_1_id ) :
    ?>
        <section id="section-1" style="<?php if( $thumb_url_1 ) { ?> background-image: url( <?php echo esc_url( $thumb_url_1 ); ?> ); <?php } ?>">
            <div class="section-content col-md-6 pull-right">
                <?php echo $content_1; ?>
            </div>
            <span class="clearfix"></span>
        </section>
    <?php endif;

}

function wp_dentist_template_section_2(){

        $get_sec_2_id = get_theme_mod( 'wp_dentist_section_3' );
        $post_2 = get_post( $get_sec_2_id );
        $content_2 = apply_filters('the_content', $post_2->post_content);

        if( $get_sec_2_id ) :
    ?>
        
        <section id="section-2">
            <div class="section-content container">
                <?php echo $content_2; ?>
            </div>
            <span class="clearfix"></span>
        </section>
    
    <?php endif; 
}


/**
 * Footer Hooks
 */
add_action( 'wp_dentist_footer', 'wp_dentist_template_footer_widgets', 10 );
add_action( 'wp_dentist_footer', 'wp_dentist_template_copyright', 15 );

function wp_dentist_template_footer_widgets(){ 
	if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="footer-widgets wrap">
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                    
                    <span class="clearfix"></span>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php
}

function wp_dentist_template_copyright(){ ?>
    <div class="footer-copyright">
        <div class="container">
            &#169; <?php echo date_i18n('Y') . ' '; bloginfo( 'name' ); ?>
            <span><?php if(is_home() || is_front_page()): ?>
                - <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-dentist' ) ); ?>"><?php printf( __( 'Powered by %s', 'wp-dentist' ), 'WordPress' ); ?></a> <span><?php _e('and','wp-dentist'); ?></span> <a href="<?php echo esc_url( __( 'http://localthemes.net/', 'wp-dentist' ) ); ?>"><?php printf( esc_html( '%s', 'wp-dentist' ), 'Local Business Themes' ); ?></a>
            <?php endif; ?>
            </span>
        </div>
    </div>
<?php
}