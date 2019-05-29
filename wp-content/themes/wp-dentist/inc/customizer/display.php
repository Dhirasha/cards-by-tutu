<?php 

/**
 * Customizer Display
 *
 * @package wp-dentist
 */

  function wp_dentist_apply_color() {

    if( get_theme_mod('wp_dentist_color_settings') ){
      $primary  =   esc_html( get_theme_mod('wp_dentist_color_settings') );
    }else{
      $primary  =  '#00bcd4';
    }

    if( get_theme_mod('wp_dentist_footer_bg') ){
      $footer_bg  =   esc_html( get_theme_mod('wp_dentist_footer_bg') );
    }else{
      $footer_bg  =  '#2b364c';
    }

    $custom_css = "
        a,
        a:hover,
        #site-info .info-item p:before, #site-info .info-item div:before
        #main-navigation ul.navbar-nav > li.active > a,
        .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover{
            color: {$primary};
        }
        .widget #wp-calendar caption{
            background: {$primary};
        }
        .page-title-area,
        #site-header .navbar-default .navbar-toggle,
        .comment .comment-reply-link,
        input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link{
            background-color: {$primary};
        }
        .comment .comment-reply-link,
        input[type='submit'], button[type='submit'], .btn, .comment .comment-reply-link{
            border: 1px solid {$primary};
        }
        footer.footer{
            background: {$footer_bg};
        }
        
      ";

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '', 'all' );
    wp_enqueue_style( 'wp-dentist-main-stylesheet', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
    wp_add_inline_style( 'wp-dentist-main-stylesheet', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'wp_dentist_apply_color', 999 );