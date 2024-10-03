<?php

/**
 * The template for displaying all single posts
 *
 * @package scratch
 */

get_header();
?>

<main id="primary" class="site-main container container--np">
	<section>
		<div class="page-wrapper">

			<div class="breadcrumbs container" typeof="BreadcrumbList" vocab="https://schema.org/">
				<div class="container__inner">
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>
			</div>
			<div class="container__inner">
				<div class="single entry-content">
					<div id="posts-body" class="column-list">
						<?php
						while (have_posts()) :
							the_post();
							get_template_part('template-parts/content', get_post_type());
							the_post_navigation(
								array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__('<<', 'scratch') . '</span> <span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__('>>', 'scratch') . '</span> <span class="nav-title">%title</span>',
									'screen_reader_text' => __(''),
								)
							);
						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
