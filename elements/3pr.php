<?php

/**
 *
 * @package scratch
 */

$le_3pr_info = array(
	array(
		'pic' => get_theme_mod('three-pr-pic-01'),
		'ttl' => esc_html__(get_theme_mod('three-pr-ttl-01')),
		'text' => esc_html__(get_theme_mod('three-pr-txt-01')),
	),
	array(
		'pic' => get_theme_mod('three-pr-pic-02'),
		'ttl' => esc_html__(get_theme_mod('three-pr-ttl-02')),
		'text' => esc_html__(get_theme_mod('three-pr-txt-02')),
	),
	array(
		'pic' => get_theme_mod('three-pr-pic-03'),
		'ttl' => esc_html__(get_theme_mod('three-pr-ttl-03')),
		'text' => esc_html__(get_theme_mod('three-pr-txt-03')),
	),
);
?>
<section class="container">
	<div class="container__inner">
		<h1 class="section-title">トピックス</h1>
		<div class="contents-list flex flex--around">
			<?php for ($i = 0; $i < 3; $i++) :
				$le_pic = wp_get_attachment_url($le_3pr_info[$i]['pic']);

			?>


				<div class="contents-list__item">
					<figure class="contents-list__image"><img src="<?php if ($le_pic) {
																		echo $le_pic;
																	} else {
																		echo 'https://via.placeholder.com/150';
																	} ?>" alt=""></figure>
					<h2 class="contents-list__itemTitle"><?php echo $le_3pr_info[$i]['ttl']; ?></h2>
					<p class="contents-list__text"><?php echo $le_3pr_info[$i]['text']; ?></p>
				</div>


			<?php endfor; ?>
		</div>
	</div><!-- .contents-list -->
</section>