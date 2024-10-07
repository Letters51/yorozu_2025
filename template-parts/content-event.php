<?php

/**
 * Template part for displaying posts
 *
 * @package scratch
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header single-header">
		<div class="entry-meta entry-header__meta">
			<?php
			$categories = get_the_terms($post->ID, "event-category");
			if ($categories) {
				foreach ($categories as $category) {
					$cat_class = "event_cat ds_inline_block event_cat--" . $category->slug;
					echo "<a href='"  . esc_html(get_category_link($category->term_id)) . "'><span class='" . $cat_class . "'>" . $category->name . "</span></a>";
				};
			} ?>
		</div><!-- .entry-meta -->
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title entry-header__title">', '</h1>');
		else :
			the_title('<h2 class="entry-title entry-header__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		?>

	</header><!-- .entry-header -->

	<?php //scratch_post_thumbnail(true);
	?>
	<div class="post-content">
		<?php eo_get_template_part('event-meta', 'event-single'); ?>
		<div class="event_main">
			<?php the_content(); ?>
		</div>
		<div class="event_content">
			<div class="event_content__left">
				<div class="event_head">
					<?php //get scr values
					$event_att = array(
						"download" => SCF::get('download_file'),
						"apply" => SCF::get('apply_url'),
						"btn_ttl" => SCF::get('btn_ttl'),
						"btn_ttl_typein" => SCF::get('btn_ttl_typein'),
					);

					$final_btn_ttl = $event_att['btn_ttl_typein'] != "" ? $event_att['btn_ttl_typein'] : $event_att['btn_ttl'];


					$event_contents = SCF::get('event_sections');
					$main_img = get_post_meta(get_the_ID(), 'main_img', true);
					?>
					<?php if ($event_att["download"] != "") : ?>
						<?php
						$img = get_post_meta(get_the_ID(), 'download_file', true);
						$imgUrl = wp_get_attachment_url($img);

						?>
						<p class="event_head__download"><a href="<?php echo $imgUrl; ?>" target="_blank">＞pdfダウンロード</a></p>
					<?php endif; ?>
					<?php if ($event_att["apply"] != "" || $final_btn_ttl != "このボタンを使用しない") : ?>
						<p class="event_head__apply page_btn"><a class="wp-block-button__link has-white-color has-luminous-vivid-orange-background-color has-text-color has-background" href="<?php echo ($event_att["apply"]); ?>" style="border-radius:0px" target="_blank"><?php echo $final_btn_ttl; ?></a></p>
					<?php endif; ?>
				</div>
				<div class="event_desc">
					<?php if ($main_img != "") : ?>
						<div class="event_content__right">
							<figure class="">
								<?php
								$mainimgUrl = wp_get_attachment_url($main_img);
								?>
								<img src="<?php echo $mainimgUrl; ?>" alt="">
							</figure>
						</div>
					<?php endif; ?>
					<?php foreach ($event_contents as $event_content) : ?>
						<h3>
							<?php echo $event_content["e_section_title"]; ?>
						</h3>
						<div>
							<?php echo $event_content["e_section_content_plus"]; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if ($event_att["apply"] != "" || $final_btn_ttl != "このボタンを使用しない") : ?>
					<p class="event_head__apply page_btn"><a class="wp-block-button__link has-white-color has-luminous-vivid-orange-background-color has-text-color has-background" href="<?php echo ($event_att["apply"]); ?>" style="border-radius:0px" target="_blank"><?php echo $final_btn_ttl; ?></a></p>
				<?php endif; ?>
			</div>
		</div>
		<?php wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'scratch'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php scratch_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article> <!-- #post-<?php the_ID(); ?> -->