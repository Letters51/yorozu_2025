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
				//the_archive_description('<div class="archive-description">', '</div>');
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
					<h2>相談スタッフ</h2>
					<ul id="posts-body" class="coordinator-list">
						<?php
						if (have_posts()) :
							while (have_posts()) :
								the_post();
								$title = nl2br(esc_html__(get_field('title')));
								$main_genre = esc_html__(get_field('main_genre'));
								$biography = esc_html__(get_field('biography'));
						?>
								<li class="coordinator-list__item">
									<p><?php echo $title; ?></p>
									<figure>
										<?php the_post_thumbnail() ?>
									</figure>
									<h3><?php the_title(); ?></h3>
									<dl>
										<dt>
											【主な相談対応分野】
										</dt>
										<dd>
											<?php echo $main_genre; ?>
										</dd>
										<dt>
											【経歴】
										</dt>
										<dd>
											<?php echo $biography; ?>
										</dd>
									</dl>
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