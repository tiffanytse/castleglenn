<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<div class="service-bar">
<aside>
<a class="service-type" title="Public" href="<?php get_template_directory_uri(); ?>public/">
	<img src="<?php echo get_theme_root_uri() ?>/castle-glenn/imgs/institutional.jpg">
	<h2>Public</h2>
</a>
	<p>Description of type.</p>
</aside>

<aside>
<a class="service-type middle" title="Private" href="<?php get_template_directory_uri(); ?>private/">
<img src="<?php echo get_theme_root_uri() ?>/castle-glenn/imgs/business.jpg">
<h2>Private</h2>
</a>
<p>Description of type.</p>
</aside>


<aside>
<a class="service-type" title="Institutional" href="<?php get_template_directory_uri(); ?>institutional/">
<img src="<?php echo get_theme_root_uri() ?>/castle-glenn/imgs/government.jpg">
<h2>Institutional</h2>
</a>
<p>Description of type.</p>
</aside>

</div>
