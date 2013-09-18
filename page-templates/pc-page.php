<?php
/**
 * Template Name: Public Consultation Page
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="news-content">
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>
			<div class="news-items">
					<?php query_posts( array( 
						        'post_type' => 'public-consultation',
						        'showposts' => 10
											) );

									if ( have_posts() ) while ( have_posts() ) : the_post();
				//get_post_content shows the next and previous posts
										get_template_part('pc-content', get_post_format() ); 

									endwhile; 

								wp_reset_query(); ?>
				
				
				
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>