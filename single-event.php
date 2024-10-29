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
								$thanks_message = esc_html__(get_field('thanks-message'));
								$event_name = esc_html(str_replace("<br>", "\n", get_the_title()));
								$event_name_br = str_replace("\n", "<br>", $event_name);
								?>
								<?php if ($is_after_deadline): ?>
									<hr>
									<p class="pb_03 mt_03">申込みは締め切られました。</p>
									<hr>
								<?php else: ?>
									<div class="form_wrapper form_wrapper--back">
										<?php
										session_start();
										//initialize event_name
										$_SESSION['event_name'] = "";
										?>
										<form action="<?php echo esc_url(get_template_directory_uri()); ?>/event-mail/mail.php" method="post" enctype="multipart/form-data">
											<input type="hidden" name="投稿ID" value="<?php echo esc_html(get_the_ID()); ?>">
											<textarea name="サンクス文面" id="thanks_message" hidden value=""><?php echo $thanks_message; ?></textarea>
											<textarea name="イベント名" id="event_name" hidden value=""><?php echo $event_name; ?></textarea>
											<table class="form_table form_table--nbt">
												<tr>
													<th>
														<p class="form_label"><span>件名</span></p>
													</th>
													<td><textarea class="textarea_event_title" style="resize: none;" type="text" name="件名" placeholder="<?php echo $event_name; ?>への申込" readonly hidden></textarea>
														<div class="form_label--md"><?php echo $event_name_br; ?>への申込</div>
													</td>
												<tr>
												<tr>
													<th>
														<p class="form_label"><span>企業名</span><span class="require">必須</span></p>
													</th>
													<td><input size="30" type="text" name="企業名" placeholder="例：株式会社 山田商社" required /></td>
												</tr>
												<tr>
													<th>
														<p class="form_label"><span>住所</span><span class="require">必須</span></p>
													</th>
													<td><input size="30" type="text" name="住所" placeholder="例：〇〇市〇〇町〇〇丁目〇〇番〇〇号" required /></td>
												</tr>
												<tr>
													<th>
														<p class="form_label"><span>電話番号</span><span class="require">必須</span></p>
													</th>
													<td><input size="30" type="tel" name="連絡のとれる電話番号" placeholder="例：029-224-5339" required /></td>
												</tr>
												<tr>
													<th>
														<p class="form_label"><span>参加者</span></p>
													</th>
													<td>
														<div class="participant_input show">
															<p class="form_label form_label--mini"><span>氏名</span><span class="require">必須</span></p>
															<input size="30" type="text" name="参加者氏名" placeholder="例：山田 太郎" required />
															<p class="form_label form_label--mini"><span>ふりがな</span><span class="require">必須</span></p>
															<input size="30" type="text" name="参加者ふりがな" placeholder="例：やまだ たろう" required />
															<p class="form_label form_label--mini"><span>メールアドレス</span><span class="require">必須</span></p>
															<input size="30" type="email" name="参加者メールアドレス" placeholder="例：info@ibaraki-yorozu.go.jp" required />
															<p class="form_label form_label--mini"><span>役職名</span></p>
															<input size="30" type="text" name="参加者役職名" placeholder="例：部長" />
														</div>
													</td>
												</tr>
												<?php get_template_part('template-parts/form-reasons'); ?>
												<?php
												//assign form_free_area
												$free_01_ttl = get_field('free_01_ttl') ? get_field('free_01_ttl') : '自由欄(1)';
												$free_01_holder = get_field('free_01_holder') ? get_field('free_01_holder') : '';
												$free_01_required = get_field('free_01_required') ? get_field('free_01_required') : '';
												$free_02_ttl = get_field('free_02_ttl') ? get_field('free_02_ttl') : '自由欄(2)';
												$free_02_holder = get_field('free_02_holder') ? get_field('free_02_holder') : '';
												$free_02_required = get_field('free_02_required') ? get_field('free_02_required') : '';
												$free_03_ttl = get_field('free_03_ttl') ? get_field('free_03_ttl') : '自由欄(3)';
												$free_03_holder = get_field('free_03_holder') ? get_field('free_03_holder') : '';
												$free_03_required = get_field('free_03_required') ? get_field('free_03_required') : '';
												?>
												<tr <?php if ($free_01_ttl == '自由欄(1)') {
														echo "class='hide_row'";
													} ?>>
													<th>
														<p class="form_label"><span><?php echo $free_01_ttl; ?></span><?php if ($free_01_required) {
																															echo '<span class="require">必須</span>';
																														} ?></p>
													</th>
													<td><input size="30" type="text" name="<?php echo $free_01_ttl; ?>" <?php if ($free_01_required) {
																															echo " required";
																														} ?> placeholder="<?php echo $free_01_holder; ?>" /></td>
												</tr>
												<tr <?php if ($free_02_ttl == '自由欄(2)') {
														echo "class='hide_row'";
													} ?>>
													<th>
														<p class="form_label"><span><?php echo $free_02_ttl; ?></span><?php if ($free_02_required) {
																															echo '<span class="require">必須</span>';
																														} ?></p>
													</th>
													<td><input size="30" type="text" name="<?php echo $free_02_ttl; ?>" <?php if ($free_02_required) {
																															echo " required";
																														} ?> placeholder="<?php echo $free_02_holder; ?>" /></td>
												</tr>
												<tr <?php if ($free_03_ttl == '自由欄(3)') {
														echo "class='hide_row'";
													} ?>>
													<th>
														<p class="form_label"><span><?php echo $free_03_ttl; ?></span><?php if ($free_03_required) {
																															echo '<span class="require">必須</span>';
																														} ?></p>
													</th>
													<td><input size="30" type="text" name="<?php echo $free_03_ttl; ?>" <?php if ($free_03_required) {
																															echo " required";
																														} ?> placeholder="<?php echo $free_03_holder; ?>" /></td>
												</tr>
												<tr>
													<th>
														<p class="form_label"><span>備考</span></p>
													</th>
													<td><textarea name="備考" cols="50" rows="5"></textarea></td>
												</tr>
											</table>
											<p class="ta_center mb_03">
												<input type="checkbox" name="プライバシーポリシー" value="同意する" id="agree" required />
												<label for="agree"><a class="td_underline" href="<?php echo home_url(); ?>/privacy" target="_blank">プライバシーポリシー</a>に同意する</label>
											</p>
											<div class="ta_center_table">
												<button class="form_btn base_btn base_btn--orange" type="submit" type="button" value="確認">申し込み内容を確認する</button>
											</div>
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
