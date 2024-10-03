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
				<?php $wp_query = new WP_Query(array(
					'post_type' => 'post',
					'posts_per_page' => 6,
					'paged' => get_query_var('paged')
				));
				?>
				<dl class="news__list mb_05">
					<?php
					if ($wp_query->have_posts()) :
						while ($wp_query->have_posts()) :
							$wp_query->the_post();
							$is_with_link = false;
							$is_internal = false;
							$ex_link = esc_url(get_post_meta(get_the_ID(), "meta-box-link", true));
							$page_link =
								esc_url(get_post_meta(get_the_ID(), "meta-box-link_page", true));
							$is_internal = (empty($page_link)) ? false : true;
							$final_link = ($is_internal) ? $page_link : $ex_link;

							if (!empty($final_link)) {
								$is_with_link = true;
							}

							if (strpos($final_link, "ibaraki-yorozu")) {
								$is_internal = true;
							}
					?>
							<dt><?php the_time('Y.m.d'); ?></dt>
							<?php if ($is_with_link) : ?>
								<dd><a href="<?php echo $final_link; ?>" <?php if (!$is_internal) {
																				echo "target='__blank'";
																			} ?>><?php the_title(); ?></a></dd>
							<?php else : ?>
								<dd><?php the_title(); ?></dd>
							<?php endif; ?>
					<?php
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</dl>
				<div class="ta_center">
					<?php pagination();
					?>
				</div>
				<?php dynamic_sidebar('投稿ページ下部お知らせ'); ?>
			</div>
		</div>
	</main><!-- #main -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>