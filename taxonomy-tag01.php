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
					<!--<div class="entry-content__desc">
                        <p>説明が入ります。説明が入ります。説明が入ります。説明が入ります。​
                            説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
                    </div>-->
					<ul id="posts-body" class="column-list">
						<?php
						if (have_posts()) :
							while (have_posts()) :
								the_post();
						?>
								<li class="column-list__item">
									<div class="column-list__left">
										<a class="column-list__image" href="<?php the_permalink(); ?>">
											<figure><?php show_thumbnail('large'); ?></figure>
										</a>
										<div class="column-list__genre"><?php echo get_ct_cat_link('tx01'); ?></div>
									</div>
									<div class="column-list__content">
										<div class="column-list__text">
											<div class="column-list__tag"><?php echo get_ct_cat_link('tag01'); ?></div>
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