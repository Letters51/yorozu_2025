<?php

/**
 * Template part for displaying posts
 *
 * @package scratch
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="archive-body">
		<div class="archive-body__image">
			<?php scratch_post_thumbnail(false); ?>
		</div>
		<div class="archive-body__text">
			<header class="entry-header">
				<?php

				the_title('<h2 class="entry-title entry-header__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

				if ('post' === get_post_type()) :
				?>
					<div class="entry-meta entry-header__meta">
						<?php
						scratch_posted_on();
						//scratch_posted_by();
						show_category_name_link();

						?>

					</div><!-- .entry-meta -->

				<?php else : ?>
					<div class="entry-meta entry-header__meta">
						<?php
						scratch_posted_on();
						//scratch_posted_by();

						show_term_name_link($post->ID);
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
		</div>
	</div>
</article> <!-- #post-<?php the_ID(); ?> -->