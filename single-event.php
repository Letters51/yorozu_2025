<?php

/**
 * The template for displaying all single posts
 *
 * @package scratch
 */
session_name('PHPMAILFORMSYSTEM');
session_start();

$participant02_name = isset($_SESSION['participant02_name']) ? $_SESSION['participant02_name'] : '';
$participant02_ruby = isset($_SESSION['participant02_ruby']) ? $_SESSION['participant02_ruby'] : '';
$participant02_position = isset($_SESSION['participant02_position']) ? $_SESSION['participant02_position'] : '';
$participant03_name = isset($_SESSION['participant03_name']) ? $_SESSION['participant03_name'] : '';
$participant03_ruby = isset($_SESSION['participant03_ruby']) ? $_SESSION['participant03_ruby'] : '';
$participant03_position = isset($_SESSION['participant03_position']) ? $_SESSION['participant03_position'] : '';


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
									<div class="form_wrapper form_wrapper--back">
										<form action="<?php echo esc_url(get_template_directory_uri()); ?>/event-mail/mail.php" method="post" enctype="multipart/form-data">
											<table class="form_table form_table--nbt">
												<tr>
													<th>
														<p class="form_label"><span>件名</span></p>
													</th>
													<td><textarea class="textarea_event_title" style="resize: none;" size="20" type="text" name="件名" placeholder="<?php echo str_replace("<br>", "\n", get_the_title()); ?>への申込" readonly></textarea></td>
												</tr>
												<tr>
													<th>
														<p class="form_label"><span>Email</span><span class="require">必須</span></p>
													</th>
													<td><input size="20" type="text" name="Email" placeholder="例：info@ibaraki-yorozu.go.jp" required /></td>
												</tr>
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
													<td><input size="30" type="text" name="連絡のとれる電話番号" placeholder="例：000-000-0000" required /></td>
												</tr>
												<tr>
													<th>
														<p class="form_label"><span>参加者</span></p>
													</th>
													<td class="pb_03">
														<div class="participant_input show">
															<p class="participant_number"><span class="participant_number__ttl">参加者（１）</span><span class="require">必須</span></p>
															<p>お名前</p>
															<input size="30" type="text" name="参加者(1)名前" placeholder="例：山田 太郎" required />
															<p>ふりがな</p>
															<input size="30" type="text" name="参加者(1)ふりがな" placeholder="例：やまだ たろう" required />
															<p>役職</p>
															<input size="30" type="text" name="参加者(1)役職" placeholder="例：部長" required />
														</div>

														<?php if ($participant02_name != ''): ?>
															<fieldset class="participant_input hide show">
															<?php else: ?>
																<fieldset class="participant_input hide" disabled>
																<?php endif; ?>
																<p class="participant_number"><span class="participant_number__ttl">参加者（2）</span></p>
																<p>お名前</p>
																<input size="30" type="text" name="参加者(2)名前" />
																<p>ふりがな</p>
																<input size="30" type="text" name="参加者(2)ふりがな" />
																<p>役職</p>
																<input size="30" type="text" name="参加者(2)役職" />
																</fieldset>
																<?php if ($participant03_name != ''): ?>
																	<fieldset class="participant_input hide show">
																	<?php else: ?>
																		<fieldset class="participant_input hide" disabled>
																		<?php endif; ?>
																		<p class="participant_number"><span class="participant_number__ttl">参加者（3）</span></p>
																		<p>お名前</p>
																		<input size="30" type="text" name="参加者(3)名前" />
																		<p>ふりがな</p>
																		<input size="30" type="text" name="参加者(3)ふりがな" />
																		<p>役職</p>
																		<input size="30" type="text" name="参加者(3)役職" />
																		</fieldset>
																		<div class="add_participant_btn_wrapper">
																			<button type="button" class="add_participant_btn">追加</button>
																			<button type="button" class="add_participant_btn add_participant_btn--minus">取消</button>
																		</div>
													</td>
												</tr>
												<tr>
													<th>
														<p class="form_label"><span>申込みの<br>きっかけ</span><span class="require">必須</span></p><small>（どの様にして案内をしりましたか？）</small>
													</th>
													<td><textarea size="30" type="text" name="きっかけ" placeholder="例：知人の紹介、ウェブサイト、SNS、広告、その他" required></textarea></td>
												</tr>
												<?php
												$form_free_area = SCF::get('form_free_area');
												if ($form_free_area):
													foreach ($form_free_area as $form_free_area_item):
												?>
														<?php if ($form_free_area_item['form_free_area_item'] != ''): ?>
															<tr>
																<th>
																	<p class="form_label"><span><?php echo nl2br(esc_html($form_free_area_item['form_free_area_item'])); ?></span><?php if ($form_free_area_item['is_required']) {
																																														echo '<span class="require">必須</span>';
																																													} ?></p>
																</th>
																<td><input size="30" type="text" name="<?php echo esc_html(str_replace("\r\n", "", $form_free_area_item['form_free_area_item'])); ?>" <?php if ($form_free_area_item['is_required']) {
																																																			echo " required";
																																																		} ?> placeholder="<?php echo esc_html($form_free_area_item['placeholder']); ?>" /></td>
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
											<p class="ta_center mb_03">
												<input type="checkbox" name="プライバシポリシー" value="同意する" id="agree" required />
												<label for="agree"><a class="td_underline" href="<?php echo home_url(); ?>/privacy">プライバシーポリシー</a>に同意する</label>
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
