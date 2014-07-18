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
  

 
// Create a function to enqueue our scripts
function add_my_scripts() {
 
  // Enqueue the modernizr script file and specify that it should be placed in the <head>
  wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri(). '/js/modernizr.custom.min.js');
  wp_enqueue_script( 'respond', get_stylesheet_directory_uri(). '/js/respond.min.js');
}
 
// Run this function during the wp_enqueue_scripts action
add_action('wp_enqueue_scripts', 'add_my_scripts');
 
 
  
  
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
  
// Add pagination

if ( ! function_exists( 'my_pagination' ) ) :
	function my_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	}
endif;


/**
 * Filter snippet
 */
function prefix_pgm_description( $description ) {
	global $post;
	
	$description = '';
	$description .= '<div>';
	
	$description .= '<h4>' . get_the_title() . '</h4>';	
	$description .= wpautop(get_post_meta(get_the_ID(), '_pronamic_google_maps_address', true));
	$description .= '</div>';

	return $description;
}

add_filter( 'pronamic_google_maps_item_description', 'prefix_pgm_description' );

// Archive for All Post Types

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'projects'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

// Meta Info

function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );



	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( '<div class="meta-info"><span class="by-author"> By %4$s</span>  %3$s <span class="tags"> %2$s </span></div>', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( '<div class="meta-info"><span class="by-author"> By %4$s</span> %3$s</div>', 'twentytwelve' );
	} else {
		$utility_text = __( '<span class="by-author"> By %4$s</span>', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}