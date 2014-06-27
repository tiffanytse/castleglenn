<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php
		
		if(is_singular()) {
         //echo do_shortcode("[googlemaps width=900 height=400 marker_options='array('icon'=>'htp://imgur.com/bFRjgj2.png')']");
         // adds google map for projects custom post type
         
         if ( function_exists( 'pronamic_google_maps' ) ) {
           
             pronamic_google_maps(
                 array(
                     'width'          => 900,
                     'height'         => 200,
                     'map_type_id'    => 'roadmap',
                     'marker_options' => array(
                          'icon' => '/castleglenn/wp-content/themes/castle-glenn/imgs/marker.png'
                      ),
                      'map_options' => array(
                          'scrollwheel'=> false,
                      ),                                   
                 )
             );
         }
         
    } else {
      // Display nothing
    }

    ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>