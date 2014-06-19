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


<!-- List projects -->
      <div class="project-items">
      
        <section="tab p-public">
          <h2>Public Service Projects</h2>
          <ul>
          <?php
          $args = array ( 
          'post_type' => 'projects',
          'category_name' => 'p-public',      
           );
          $custom_query = new WP_Query( $args );
        
          if ( $custom_query->have_posts() ):
              while ( $custom_query->have_posts() ) :
                  $custom_query->the_post();
                  ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php
              endwhile;
          else:
              echo '<p>There are no projects listed.</p>';
          endif;
          wp_reset_query();
          ?>
          </ul>
        </section>
      
        <section="tab p-private">
          <h2>Private Service Projects</h2>
          <ul>
          <?php
          $args = array ( 
          'post_type' => 'projects',
          'category_name' => 'p-private',      
           );
          $custom_query = new WP_Query( $args );
        
          if ( $custom_query->have_posts() ):
              while ( $custom_query->have_posts() ) :
                  $custom_query->the_post();
                  ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php
              endwhile;
          else:
            echo '<p>There are no projects listed.</p>';
          endif;
          wp_reset_query();
          ?>
            </ul>
          </section>
        
          <section="tab p-institutional">
            <h2>Institutional Service Projects</h2>
            <ul>
            <?php
            $args = array ( 
            'post_type' => 'projects',
            'category_name' => 'p-institutional',      
             );
            $custom_query = new WP_Query( $args );

            if ( $custom_query->have_posts() ):
                while ( $custom_query->have_posts() ) :
                    $custom_query->the_post(); ?>
                  
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  
                <?php
                endwhile;
            else:
              echo '<p>There are no projects listed.</p>';
            endif;
            wp_reset_query();
            ?>
            </ul>
          </section>
      
      </div> <!-- project-items -->
</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>