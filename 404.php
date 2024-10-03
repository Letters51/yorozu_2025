<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package scratch
 */

get_header();
?>

<main id="primary" class="site-main container">

	<section class="error-404 not-found container__inner">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e('お探しのページが見つかりませんでした。', 'scratch'); ?></h1>
		</header><!-- .page-header -->
		<p style="width:300px; margin:0 auto; font-size:14px;"><a class="cta__btn base_btn base_btn--orange base_btn--cta" href="/">サイトトップへ</a></p>
		<!--<div class="page-content">
			<p><?php esc_html_e('このURLからはページが見つかりませんでした。下記の検索もご利用ください。', 'scratch'); ?></p>

			<?php
			get_search_form();

			the_widget('WP_Widget_Recent_Posts');
			?>


			<?php
			/* translators: %1$s: smiley */
			$scratch_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'scratch'), convert_smilies(':)')) . '</p>';
			the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$scratch_archive_content");

			the_widget('WP_Widget_Tag_Cloud');
			?>

		</div> -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
