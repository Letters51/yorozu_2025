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
				<h3>事例一覧</h3>
				<ul id="posts-body" class="column-list column-text-list">
					<?php
					$wp_query = new WP_Query(array(
						'post_type' => 'casestudy',
						'posts_per_page' => 10,
						'paged' => get_query_var('paged')
					));

					if (have_posts()) :
						while ($wp_query->have_posts()) :
							$wp_query->the_post(); ?>
							<li class="column-text-list__item">
								<!--<div class="column-list__left">
									<a class="column-list__image" href="<?php the_permalink(); ?>">
										<figure><?php show_thumbnail('large'); ?></figure>
									</a>
									<div class="column-list__genre"><?php echo get_ct_cat_link('tx02'); ?></div>
								</div>-->
								<div class="column-text-list__content">
									<div class="column-text-list__text">
										<!--<div class="column-text-list__tag"><?php echo get_ct_cat_link('tag02'); ?></div>-->
										<a class="column-text-list__title" href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
										<div class="column-text-list__desc">
											<?php the_excerpt(); ?>
										</div>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
					<?php else : ?>
						<li class="ta-c">現在投稿がありません。</li>
					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
				</ul>
				<div class="ta_center">
					<?php pagination(); ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>