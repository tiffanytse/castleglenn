<?php
/**
 * Template Name: Client Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

      <article>
      <header class="entry-header">
        <h2 class="alpha entry-title">Our Past Projects</h2>
      </header>
			<?php
			// adds decription to hover of Googlemap pin
			function prefix_pgmm_item($itemContent) {
      	$itemContent = '';
      	$itemContent .= '<h2>';
      	$itemContent .= '	<a href="'. get_permalink() .'">';
      	$itemContent .= '		'. get_the_title();
      	$itemContent .= '	</a>';
      	$itemContent .= '</h2>';
        $itemContent .= '<br>';
      	$itemContent .= wpautop(get_post_meta(get_the_ID(), '_pronamic_google_maps_description', true));
        $itemContent .= '<br>';
      	return $itemContent;
      }
      // adds google map for projects custom post type
      add_filter('pronamic_google_maps_mashup_item', 'prefix_pgmm_item');
      if ( function_exists( 'pronamic_google_maps_mashup' ) ) {
          pronamic_google_maps_mashup(
              array(
                  'post_type' => 'projects'
              ), 
              array(
                  'width'          => 900,
                  'height'         => 400, 
                  'nopaging'       => true,
                  'map_type_id'    => 'roadmap',
                  'marker_options' => array(
                                  'icon' => 'http://imgur.com/bFRjgj2.png'
                              )
              )                
          );
      }
      ?>
      </article>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>