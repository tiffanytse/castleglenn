<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo" class="wrapper margin-auto">
	  <!-- Footer Navigation -->
    <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu', 'fallback_cb' => false ) ); ?>
    <!-- Footer navigation close -->
    
		<div class="site-info">
			<p>Copyright &copy; <?php echo date('Y') ?> Castleglenn Consultants Inc. 
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
  </div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>