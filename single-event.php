<?php

/**
 * The template for displaying all single posts
 *
 * @package scratch
 */

get_header();
?>

<main id="primary" class="site-main container container--np">
	<section>
		<div class="page-wrapper">

			<div class="breadcrumbs container" typeof="BreadcrumbList" vocab="https://schema.org/">
				<div class="container__inner">
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>
			</div>
			<div class="container__inner">
				<div class="single entry-content">
					<div id="posts-body" class="column-list">
						<?php
						while (have_posts()) :
							the_post();
							get_template_part('template-parts/content', get_post_type()); ?>
							<h3>申し込み</h3>
							<div class="form_area">
								<p>茨城県よろず支援拠点では、中小企業・小規模事業者の皆様のために無料で経営相談を行っております。お気軽にお問い合わせください。専門のコーディネーターが親身になって対応いたします。</p>
								<!-- diable after the deadline -->
								<?php
								$is_after_deadline = false;
								$is_accepting = esc_html__(get_field('is_accepting'));
								if ($is_accepting == 3) {
									$is_after_deadline = true;
								}
								?>
								<?php if ($is_after_deadline): ?>
									<p>申込みは締め切られました。</p>
								<?php else: ?>
									<div class="form_wrapper">
										<form action="<?php echo esc_url(get_template_directory_uri()); ?>/event_mail/mail.php" method="post" enctype="multipart/form-data">
											<input type="hidden" name="event_id" value="<?php echo get_the_ID(); ?>">
											<input type="hidden" name="form_type" value="event">
											<table class="form_table">
												<tr>
													<th>件名<span class="require">*</span></th>
													<td><textarea class="textarea_event_title" size="20" type="text" name="件名" placeholder="<?php echo strip_tags(get_the_title()); ?>申込"></textarea></td>
												</tr>
												<tr>
													<th>Email<span class="require">*</span></th>
													<td><input size="20" type="text" name="Email" required /></td>
												</tr>
												<tr>
													<th>企業名<span class="require">*</span></th>
													<td><input size="30" type="text" name="企業名" required /></td>
												</tr>
												<tr>
													<th>住所<span class="require">*</span></th>
													<td><input size="30" type="text" name="住所" required /></td>
												</tr>
												<tr>
													<th>電話番号<span class="require">*</span></th>
													<td><input size="30" type="text" name="連絡のとれる電話番号" required /></td>
												</tr>
												<tr>
													<th>参加者<span class="require">*</span></th>
													<td>
														<template id="participant_input_template">
															<div class="participant_input">
																<p class="participant_number">参加者（１）</p>
																<p>お名前</p>
																<input size="30" type="text" name="参加者(1)名前" />
																<p>ふりがな</p>
																<input size="30" type="text" name="参加者(1)ふりがな" />
																<p>役職</p>
																<input size="30" type="text" name="参加者(1)役職" />
															</div>
														</template>
														<div class="participant_input">
															<p class="participant_number">参加者（１）</p>
															<p>お名前</p>
															<input size="30" type="text" name="参加者(1)名前" required />
															<p>ふりがな</p>
															<input size="30" type="text" name="参加者(1)ふりがな" required />
															<p>役職</p>
															<input size="30" type="text" name="参加者(1)役職" required />
														</div>
														<div class="participant_input hide">
															<p class="participant_number">参加者（2）</p>
															<p>お名前</p>
															<input size="30" type="text" name="参加者(2)名前" disabled/>
															<p>ふりがな</p>
															<input size="30" type="text" name="参加者(2)ふりがな" disabled/>
															<p>役職</p>
															<input size="30" type="text" name="参加者(2)役職" disabled/>
														</div>
														<div class="participant_input hide">
															<p class="participant_number">参加者（3）</p>
															<p>お名前</p>
															<input size="30" type="text" name="参加者(3)名前" disabled/>
															<p>ふりがな</p>
															<input size="30" type="text" name="参加者(3)ふりがな" disabled/>
															<p>役職</p>
															<input size="30" type="text" name="参加者(3)役職" disabled/>
														</div>
														<button type="button" class="add_participant_btn">追加</button>
														<button type="button" class="add_participant_btn add_participant_btn--minus">削除</button>
													</td>
												</tr>
												<tr>
													<th>申込みのきっかけ（どの様にして案内をしりましたか？）<span class="require">*</span></th>
													<td><textarea size="30" type="text" name="きっかけ" required></textarea></td>
												</tr>
												<?php
												$form_free_area = SCF::get('form_free_area');
												if ($form_free_area):
													foreach ($form_free_area as $form_free_area_item):
												?>
														<?php if ($form_free_area_item['form_free_area_item'] != ''): ?>
															<tr>
																<th><?php echo $form_free_area_item['form_free_area_item']; ?><?php if ($form_free_area_item['is_required']) {
																																	echo '<span class="require">*</span>';
																																} ?></th>
																<td><input size="30" type="text" name="<?php echo $form_free_area_item['form_free_area_item']; ?>" <?php if ($form_free_area_item['is_required']) {
																																										echo " required";
																																									} ?> placeholder="<?php echo $form_free_area_item['placeholder']; ?>" /></td>
															</tr>
												<?php endif;
													endforeach;
												endif;
												?>
												<tr>
													<th>備考<br /></th>
													<td><textarea name="備考" cols="50" rows="5"></textarea></td>
												</tr>
											</table>
											<input class="base_btn base_btn--orange" type="submit" value="　 確認 　" />
										</form>
									</div>
								<?php endif; ?>
							</div>
						<?php the_post_navigation(
								array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__('<<', 'scratch') . '</span> <span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__('>>', 'scratch') . '</span> <span class="nav-title">%title</span>',
									'screen_reader_text' => __(''),
								)
							);
						endwhile; // End of the loop.
						?>
						<!-- reading -->

					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
