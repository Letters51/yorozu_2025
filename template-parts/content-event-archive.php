<?php

/**
 * Template part for displaying posts
 *
 * @package scratch
 */

?>
<div class="archive">
	<ul id="posts-body" class="column-list">
		<?php
		$wp_query = new WP_Query(array(
			'post_type' => 'event',
			'posts_per_page' => 10,
			'paged' => get_query_var('paged'),
			'meta_query' => array(
				array(
					'key' => 'is_accepting',
					'value' => $_GET['is_accepting'],
					//'compare'=>'LIKE'
				)
			)
		));
		get_template_part('elements/event-items');
		?>
	</ul>
	<div class="ta_center">
		<?php pagination(); ?>
	</div>
	<?php dynamic_sidebar('投稿ページ下部お知らせ'); ?>
</div>