<?php
/**
 * Template Name: Projects Listing Page Template
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
			<?php get_template_part( 'projects-content-page', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>
    <div class="left col-65">
    <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        query_posts(array(
        	'post_type'      => 'projects', // You can add a custom post type if you like
        	'paged'          => $paged,
        	'posts_per_page' => 10,
        	'caller_get_posts' => 1,
        	'rewrite' => array( 'slug' => 'project-list' ),
        ));  
          
        if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

        	<?php get_template_part('projects-content', get_post_format() );   ?>

        <?php endwhile;?>

          <div class="pagination">
            <?php echo my_pagination(); ?>
          </div>
        
        <?php else : ?>

          <?php echo "There were no posts found." ?>

        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>
      <div class="right col-35">
        <?php get_sidebar(); ?>
      </div>

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>