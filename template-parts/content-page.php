<?php

/**
 * Template part for displaying page content in page.php
 *
 * @package scratch
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="page-header">
			<?php
			//get custom field of prim-ttl
			$prim_ttl = get_field('prim-ttl');
			if ($prim_ttl) {
				echo '<h1 class="entry-title">' . esc_html($prim_ttl) . '</h1>';
			} else {
				echo '<h1 class="entry-title">' . esc_html(get_the_title()) . '</h1>';
			}
			?>
		</div>
	</header><!-- .entry-header -->

	<?php scratch_post_thumbnail(true); ?>
	<div class="breadcrumbs container" typeof="BreadcrumbList" vocab="https://schema.org/">
		<div class="container__inner">
			<?php if (function_exists('bcn_display')) {
				bcn_display();
			} ?>
		</div>
	</div>

	<div class="container__inner">
		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'scratch'),
					'after'  => '</div>',
				)
			);
			?>

		</div><!-- .entry-content -->
	</div>

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'scratch'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->