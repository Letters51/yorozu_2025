<?php

/**
 * The template for displaying all pages
 *
 *
 * @package scratch
 */

get_header();
?>
<div class="page-wrapper container container--np">
	<main id="primary" class="site-main<?php if(is_page("coronalink")){echo " ex_link";};?>">

		<?php
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content', 'page');
		endwhile;
		?>

	</main><!-- #main -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>