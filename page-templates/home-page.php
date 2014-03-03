<?php
/**
 * Template Name: Home Page Template
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
      <!-- slider -->
      <div class="margin-auto">
      <?php echo do_shortcode("[metaslider id=347]"); ?>
      </div>
      <!-- slider -->
      <div class="blue-box"></div>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="home-content">
				<?php get_template_part( 'content', 'page' ); ?>
        </div>
			<?php endwhile; // end of the loop. ?>

			<?php get_template_part( 'services-bar'); ?>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>