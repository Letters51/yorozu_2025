<?php

/**
 * The template for displaying archive pages
 *
 * @package scratch
 */

get_header();
?>

<main id="primary" class="site-main container">
	<div class="page-wrapper container__inner archive entry-content">
		<section>
			<header class="page-header archive__category-name">
				<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				//the_archive_description('<div class="archive-description">', '</div>');
				?>
			</header><!-- .page-header -->
			<?php dynamic_sidebar('投稿ページ上部お知らせ'); ?>

			<ul id="posts-body" class="column-list">
				<?php

				if (have_posts()) :
					while (have_posts()) :
						the_post();
						$categories = get_the_category();
						$cat_slug = ($categories[0]->slug != '') ? esc_html($categories[0]->slug) : '未設定';
						$cat_name = ($categories[0]->name != '') ? esc_html($categories[0]->name) : '未設定';
				?>
						<li class="column-list__item">
							<a class="column-list__link" href="<?php the_permalink(); ?>">
								<figure class="column-list__image"><?php show_thumbnail('large'); ?></figure>
								<p class="column-list__genre"><span><?php echo $cat_name; ?></span></p>
								<p class="column-list__title"><?php the_title(); ?></p>
							</a>
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
		</section>
	</div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>