<?php

// Add the new menu
register_nav_menus( array(
    'primary' => __( 'Top Menu (Header)', 'tto' ),
    'footer' => __( 'Footer Menu', 'tto'),
) );


//Add custom login stylesheet
function custom_login_css() {
  echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login.css" />';
}
  add_action('login_head', 'custom_login_css');
  
  
  
  /* Remove Google Open Sans */

  function mytheme_dequeue_fonts() {
  wp_dequeue_style( 'twentytwelve-fonts' );
  }

  add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );

  /* Enqueue New Google Fonts */


  function load_google_fonts() {
              wp_register_style('googleFontsSourceSansPro','http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic');
              wp_enqueue_style( 'googleSourceSansPro'); 

  }
  add_action('wp_print_styles', 'load_google_fonts');  
  
  
