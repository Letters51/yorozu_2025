<?php

/**
 * The template for displaying archive pages
 *
 * @package scratch
 */

get_header();
?>

<main id="primary" class="site-main container container--np">
	<section>
		<div class="page-wrapper">
			<header class="page-header archive__category-name">
				<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="archive-description">', '</div>');
				?>
			</header><!-- .page-header -->
			<div class="breadcrumbs container" typeof="BreadcrumbList" vocab="https://schema.org/">
				<div class="container__inner">
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>
			</div>
			<div class="container__inner">
				<div class="archive entry-content">
					<ul id="posts-body" class="column-text-list">
						<?php
						if (have_posts()) :
							while (have_posts()) :
								the_post();
						?>
								<li class="column-text-list__item">
									<div class="column-text-list__content">
										<div class="column-text-list__text">
											<div class="column-text-list__tag"><?php echo get_ct_cat_link('tag02'); ?></div>
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
					</ul>
					<div class="ta_center">
						<?php pagination(); ?>
					</div>
					<?php dynamic_sidebar('投稿ページ下部お知らせ'); ?>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>