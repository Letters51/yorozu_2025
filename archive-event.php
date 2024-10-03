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
				<h3>イベント一覧</h3>

				<div class="archive">
					<ul id="posts-body" class="column-list">
						<?php
						$wp_query = new WP_Query(array(
							'post_type' => 'event',
							'posts_per_page' => 10,
							'paged' => get_query_var('paged')
						));

						if (have_posts()) :
							while ($wp_query->have_posts()) :
								$wp_query->the_post();
								$date = eo_get_schedule_start('Y/m/d');
						?>
								<li class="column-list__item">
									<div class="column-list__left">
										<a class="column-list__image" href="<?php the_permalink(); ?>">
											<figure><?php show_thumbnail('large'); ?></figure>
										</a>
										<div class="column-list__cat"><?php
																		$categories = get_the_terms($post->ID, "event-category");
																		foreach ($categories as $category) {
																			$cat_class = "event_cat event_cat--" . $category->slug;
																			echo "<span class='" . $cat_class . "'>" . $category->name . "</span>";
																		}; ?></div>
									</div>
									<div class="column-list__content">
										<div class="column-list__text">
											<div class="column-list__date"><?php echo $date; ?>開催</div>
											<a class="column-list__title" href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
											<div class="column-list__desc">
												<?php the_excerpt(); ?>
											</div>
										</div>
									</div>
								</li>
							<?php endwhile; ?>
						<?php else : ?>
							<li class="ta-c">現在投稿がありません。</li>
						<?php endif;
						wp_reset_postdata(); ?>
					</ul>
					<div class="ta_center">
						<?php pagination(); ?>
					</div>
					<?php dynamic_sidebar('投稿ページ下部お知らせ'); ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>