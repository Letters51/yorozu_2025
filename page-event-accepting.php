<?php

/**
 * The template for displaying all pages
 *
 * Template Name: 活用事例
 * @package scratch
 */

get_header();
?>

<div class="page-wrapper container container--np">
	<main id="primary" class="site-main">
	<?php
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content', 'page');
		endwhile;
		?>
		<div class="container__inner">
			<div class="archive entry-content">
				<h3>募集中イベント一覧</h3>
				<?php get_template_part('template-parts/content', 'event-archive');?>
			</div>
		</div>
	</main><!-- #main -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>