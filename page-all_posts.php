<?php

/**
 * The template for displaying all pages
 *
 * Template Name: post-list 
 * @package scratch
 */

get_header();
?>

<main id="primary" class="site-main container">
	<div class="container__inner">
		<div class="post-body">
			<?php
			$paged = (int) get_query_var('paged');
			$args = array(
				'posts_per_page' => POST_PER_PAGE,
				'paged' => $paged,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish'
			);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post();
					get_template_part('template-parts/content', 'archive');
				endwhile;
			endif;

			?>
		</div>
		<?php

		if (function_exists("pagination") && !(if_use_load_more())) :
			pagination($the_query->max_num_pages);
		else : ?>
			<button class="fetch_more_post">投稿をもっと見る</button>
		<?php endif;
		wp_reset_postdata();
		?>
	</div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
