<?php

/**
 * The main template file
 *
 * @package scratch
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if (get_header_image()) : ?>
		<div class="container container--np">
			<div id="top-slide" class="full-slide">
				<div id="top_copy" class="top_copy">
					<p>
						各分野のスペシャリストが<br>
						あなたのお悩み解決します
					</p>
					<div class="mv_btns">
						<a class="orange_round_btn" href="<?php echo home_url(); ?>/coronalink/">補助金・施策一覧（直リン）</a>
						<a target="_blank" class="orange_round_btn" href="https://www.youtube.com/channel/UCmvk0HMp_vm_uyHOKeR-tUw">YouTube公式チャンネル</a>
						<a class="orange_round_btn" href="<?php echo home_url(); ?>/cooperation/">連携機関一覧</a>
						<!--<a target="_blank" class="orange_round_btn" href="https://www.youtube.com/playlist?list=PLvXOIM4Ng3YZi7-5RrUYmT3xq2gTYxZxe">茨城よろずチャンネル</a>-->
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<section>
		<!-- news -->
		<div class="news container container--light_orange pt_03 pb_03">
			<div class="container__inner">
				<div class="news__inner">
					<div class="news__body">
						<h2 class="news__title">お知らせ</h2>
						<?php showNews("post", "news__list", 3); ?>
					</div>
					<div class="ta_right mt_03">
						<a href="<?php echo home_url(); ?>/news/" class="arrow_btn underline">お知らせ一覧を見る</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /.news -->
	</section>

	<section>
		<!--event-->
		<div class="event container">
			<div class="container__inner">
				<div class="ta_center">
					<h2 class="lined_title event__ttl">イベント</h2>
				</div>
				<div class="event_body">
					<?php
					$list_count = 6;
					//$sticky = get_option('sticky_posts');
					//if (!empty($sticky)) $list_count -= count($sticky);
					$counter = 0;
					$args = array(
						'post_type' => 'event',
						'posts_per_page' => $list_count,
						'ignore_sticky_posts' => 0,
					);
					$query = new WP_Query($args);
					if ($query->have_posts()) :
						while ($query->have_posts()) :
							$query->the_post();
							$date = eo_get_schedule_start('Y/m/d');
							$is_accepting = esc_html__(get_field('is_accepting'));
					?>
							<div class="event_body__item">
								<p class="event_body__cat">
									<?php
									$categories = get_the_terms($post->ID, "event-category");
									if ($categories) {
										foreach ($categories as $category) {
											$cat_class = "event_cat event_cat--" . $category->slug;
											echo "<span class='" . $cat_class . "'>" . $category->name . "</span>";
										}
									}; ?></p>
								<div class="event_body__conte">
									<a href="<?php the_permalink(); ?>">
										<figure class="event_body__img">
											<?php if (has_post_thumbnail()) : ?>
												<?php the_post_thumbnail(); ?>
											<?php else : ?>
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/dummy.jpg" alt="画像がありません">
											<?php endif; ?>
										</figure>
									</a>
									<div class="event_body__txt">
										<div class="event_body__date"><span class="add_day_after"><?php echo $date; ?></span> 開催<?php echo get_accepting_part($is_accepting); ?></div>
										<h3 class="event_body__ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<!--<div class="event_body__desc show-pc"><?php //echo mb_substr(get_the_excerpt(), 0, 50);
																					?>…</div>-->
									</div>
								</div>
							</div>
							<?php ++$counter; ?>
							<?php if ($counter == 6) {
								break;
							} ?>
						<?php endwhile; ?>
					<?php endif;
					wp_reset_postdata();
					?>
				</div>
				<div class="ta_right mt_03">
					<a href="<?php echo home_url(); ?>/event-page/" class="arrow_btn underline">カレンダーを見る</a>
				</div>
			</div>

		</div>
		<!-- /.event -->
	</section>

	<section>
		<!-- issues -->
		<div class="issues container container--light_orange">
			<div class="container__inner">
				<h3 class="issues__title">こんな課題ありませんか？</h3>
				<ul class="issues__list">
					<li>
						<p>売上を<br>
							伸ばしたい</p>
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 247.109 214.408" role="img" aria-label="グラフ">
							<g id="Group_7" data-name="Group 7" transform="translate(-832.392 -999.381)">
								<path id="Path_11" data-name="Path 11" d="M1073.595,1213.789H838.3a5.905,5.905,0,0,1-5.9-5.906v-192.52a5.906,5.906,0,1,1,11.812,0v186.614h229.391a5.906,5.906,0,1,1,0,11.812Z" fill="#05135a" />
								<g id="Group_3" data-name="Group 3">
									<rect id="Rectangle_1" data-name="Rectangle 1" width="39.036" height="45.247" transform="translate(860.921 1146.667)" fill="#5e9cdd" />
									<path id="Path_12" data-name="Path 12" d="M899.957,1195.851H860.92a3.937,3.937,0,0,1-3.937-3.937v-45.247a3.938,3.938,0,0,1,3.937-3.938h39.037a3.938,3.938,0,0,1,3.938,3.938v45.247A3.938,3.938,0,0,1,899.957,1195.851Zm-35.1-7.875H896.02V1150.6H864.858Z" fill="#05135a" />
								</g>
								<g id="Group_4" data-name="Group 4">
									<rect id="Rectangle_2" data-name="Rectangle 2" width="39.036" height="74.967" transform="translate(917.109 1116.946)" fill="#5e9cdd" />
									<path id="Path_13" data-name="Path 13" d="M956.146,1195.851H917.109a3.937,3.937,0,0,1-3.937-3.937v-74.968a3.937,3.937,0,0,1,3.937-3.937h39.037a3.937,3.937,0,0,1,3.937,3.937v74.968A3.937,3.937,0,0,1,956.146,1195.851Zm-35.1-7.875h31.161v-67.092H921.047Z" fill="#05135a" />
								</g>
								<g id="Group_5" data-name="Group 5">
									<rect id="Rectangle_3" data-name="Rectangle 3" width="39.036" height="112.68" transform="translate(973.298 1079.233)" fill="#5e9cdd" />
									<path id="Path_14" data-name="Path 14" d="M1012.334,1195.851H973.3a3.938,3.938,0,0,1-3.938-3.937V1079.233a3.938,3.938,0,0,1,3.938-3.937h39.036a3.938,3.938,0,0,1,3.938,3.937v112.681A3.938,3.938,0,0,1,1012.334,1195.851Zm-35.1-7.875H1008.4v-104.8H977.235Z" fill="#05135a" />
								</g>
								<g id="Group_6" data-name="Group 6">
									<rect id="Rectangle_4" data-name="Rectangle 4" width="39.036" height="151.167" transform="translate(1029.487 1040.746)" fill="#5e9cdd" />
									<path id="Path_15" data-name="Path 15" d="M1068.523,1195.851h-39.036a3.938,3.938,0,0,1-3.938-3.937V1040.746a3.937,3.937,0,0,1,3.938-3.937h39.036a3.936,3.936,0,0,1,3.937,3.937v151.168A3.937,3.937,0,0,1,1068.523,1195.851Zm-35.1-7.875h31.161V1044.684h-31.161Z" fill="#05135a" />
								</g>
								<path id="Path_16" data-name="Path 16" d="M871.217,1095.009a3.938,3.938,0,0,1-2.424-7.043l48-37.411a3.938,3.938,0,0,1,5.233.349l18.6,18.977,81.192-69.553a3.938,3.938,0,1,1,5.123,5.981l-83.988,71.948a3.939,3.939,0,0,1-5.374-.235l-18.716-19.095-45.228,35.25A3.913,3.913,0,0,1,871.217,1095.009Z" fill="#05135a" />
								<path id="Path_17" data-name="Path 17" d="M1024.379,1031.345a3.938,3.938,0,0,1-3.938-3.938v-20.151H1000.29a3.938,3.938,0,0,1,0-7.875h24.089a3.937,3.937,0,0,1,3.937,3.937v24.089A3.937,3.937,0,0,1,1024.379,1031.345Z" fill="#05135a" />
							</g>
						</svg>

					</li>
					<li>
						<p>経営を<br>
							改善したい</p>
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 273.291 297.074" role="img" aria-label="頭脳">
							<g id="Group_2" data-name="Group 2" transform="translate(-1307.038 -1858.846)">
								<path id="Path_1" data-name="Path 1" d="M1515.042,2155.92H1420.4a12.1,12.1,0,0,1-12.082-12.083v-32.478a1.034,1.034,0,0,0-1.069-1.034l-40.441,1.315c-.089,0-.18,0-.268,0a14.577,14.577,0,0,1-14.39-12.378l-1.1-5.166a5.873,5.873,0,0,1-.13-1.316c.117-8.765-.55-18.184-1.436-20.442a20.308,20.308,0,0,0-2.675-3.151c-2.306-1.335-3.026-3.828-2.312-6.42l2.193-7.967-.8-3.038c-.015-.057-.029-.114-.042-.17l-28.621-2.387a11.1,11.1,0,0,1-9.42-15.079l16.2-41.677a53.332,53.332,0,0,0,3.455-15.732,126.592,126.592,0,0,1,126.288-117.874c34.279,0,65.989,11.579,89.288,32.6,24.05,21.7,37.295,52.051,37.295,85.453,0,38.408-17.121,79.136-43.617,103.762a29.656,29.656,0,0,0-9.588,21.584v41.589A12.1,12.1,0,0,1,1515.042,2155.92ZM1407.3,2098.512a12.849,12.849,0,0,1,12.836,12.847v32.478a.27.27,0,0,0,.269.27h94.639a.271.271,0,0,0,.27-.27v-41.589a41.507,41.507,0,0,1,13.359-30.236c24.2-22.5,39.846-59.829,39.846-95.11,0-60.569-49.341-106.244-114.771-106.244-60.133,0-110.429,46.94-114.5,106.863a65.134,65.134,0,0,1-4.23,19.21l-15.854,40.786,28.2,2.35a11.188,11.188,0,0,1,10.028,9.175l1.132,4.286a5.924,5.924,0,0,1-.017,3.074l-1.7,6.162c.723.832,1.542,1.86,2.442,3.122,2.472,3.459,3.646,12.4,3.492,26.588l1.009,4.718c.032.152.059.3.079.457a2.747,2.747,0,0,0,2.693,2.381l40.351-1.311C1407.012,2098.515,1407.155,2098.512,1407.3,2098.512Zm-60.592-29.408h0Z" fill="#05135a" />
								<g id="Group_1" data-name="Group 1">
									<path id="Path_2" data-name="Path 2" d="M1471.368,2009.169h-19.234a10.165,10.165,0,0,1-10.152-9.984l-.407-5.347a34.363,34.363,0,1,1,39.757,0l-.407,5.343C1480.848,2004.887,1476.766,2009.169,1471.368,2009.169Zm-9.915-69.846a26.486,26.486,0,0,0-14.011,48.964,3.932,3.932,0,0,1,1.839,3.039l.564,7.391c.008.1.011.2.011.3a2.308,2.308,0,0,0,2.278,2.277h19.234c1.6,0,1.683-1.9,1.683-2.277,0-.1,0-.2.012-.3l.563-7.391a3.935,3.935,0,0,1,1.839-3.039,26.486,26.486,0,0,0-14.012-48.964Z" fill="#05135a" />
									<path id="Path_3" data-name="Path 3" d="M1452.657,1969.562c0-4.859,3.938-8.146,8.8-8.146s8.8,3.287,8.8,8.146c0,6.475-8.8,15.3-8.8,15.3S1452.657,1976.648,1452.657,1969.562Z" fill="#5e9cdd" />
									<path id="Path_4" data-name="Path 4" d="M1461.45,2038.7a11.249,11.249,0,0,1-11.232-11.022,3.936,3.936,0,0,1,3.861-4.012l14.6-.279h.077a3.938,3.938,0,0,1,3.935,3.862,11.236,11.236,0,0,1-11.02,11.45h0C1461.6,2038.7,1461.522,2038.7,1461.45,2038.7Zm.143-3.938h0Z" fill="#05135a" />
									<path id="Path_5" data-name="Path 5" d="M1468.753,2019.843h-14.6a3.938,3.938,0,0,1,0-7.875h14.6a3.938,3.938,0,0,1,0,7.875Z" fill="#05135a" />
									<path id="Path_6" data-name="Path 6" d="M1461.453,1920.989a3.936,3.936,0,0,1-3.937-3.937v-15.436a3.938,3.938,0,0,1,7.875,0v15.436A3.937,3.937,0,0,1,1461.453,1920.989Z" fill="#5e9cdd" />
									<path id="Path_7" data-name="Path 7" d="M1437.235,1927.48a3.939,3.939,0,0,1-3.414-1.969l-7.717-13.367a3.938,3.938,0,0,1,6.821-3.938l7.717,13.367a3.939,3.939,0,0,1-3.407,5.907Z" fill="#5e9cdd" />
									<path id="Path_8" data-name="Path 8" d="M1419.5,1945.212a3.928,3.928,0,0,1-1.965-.528l-13.367-7.718a3.938,3.938,0,0,1,3.938-6.82l13.367,7.717a3.939,3.939,0,0,1-1.973,7.349Z" fill="#5e9cdd" />
									<path id="Path_9" data-name="Path 9" d="M1503.411,1945.212a3.939,3.939,0,0,1-1.973-7.349l13.368-7.717a3.937,3.937,0,1,1,3.937,6.82l-13.367,7.718A3.928,3.928,0,0,1,1503.411,1945.212Z" fill="#5e9cdd" />
									<path id="Path_10" data-name="Path 10" d="M1485.672,1927.48a3.938,3.938,0,0,1-3.406-5.907l7.716-13.367a3.938,3.938,0,0,1,6.821,3.938l-7.717,13.367A3.94,3.94,0,0,1,1485.672,1927.48Z" fill="#5e9cdd" />
								</g>
							</g>
						</svg>

					</li>
					<li>
						<p>事業を<br>
							承継したい</p>
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 304.037 245.88" role="img" aria-label="協力">
							<g id="Group_18" data-name="Group 18" transform="translate(-792.986 -1452.807)">
								<g id="Group_14" data-name="Group 14">
									<circle id="Ellipse_4" data-name="Ellipse 4" cx="33.807" cy="33.807" r="33.807" transform="translate(804.486 1500.616) rotate(-45)" fill="#5e9cdd" />
									<path id="Path_29" data-name="Path 29" d="M852.295,1540.329a39.713,39.713,0,1,1,39.712-39.713A39.757,39.757,0,0,1,852.295,1540.329Zm0-67.613a27.9,27.9,0,1,0,27.9,27.9A27.931,27.931,0,0,0,852.295,1472.716Z" fill="#05135a" />
								</g>
								<g id="Group_15" data-name="Group 15">
									<path id="Path_30" data-name="Path 30" d="M853.231,1554.588H833.725a22.553,22.553,0,0,0-20.923,14.135l-11.445,28.445a34.14,34.14,0,0,0-2.39,15.027l5.408,80.585h95.489v-40.924l45.612,5.12a15.144,15.144,0,0,0,16.177-10.64h0a15.144,15.144,0,0,0-10.815-19.1l-48.6-12.151-2.667-34.229a21.357,21.357,0,0,0-10.921-17.011l-.263-.147A72.389,72.389,0,0,0,853.231,1554.588Z" fill="#5e9cdd" />
									<path id="Path_31" data-name="Path 31" d="M899.864,1698.687H804.375a5.907,5.907,0,0,1-5.893-5.511l-5.408-80.585a40.288,40.288,0,0,1,2.8-17.627l11.446-28.444a28.33,28.33,0,0,1,26.4-17.838h19.506a78.489,78.489,0,0,1,38.021,9.852l.268.15a27.192,27.192,0,0,1,13.937,21.712l2.337,29.99,44.477,11.119a21.05,21.05,0,0,1-7.454,41.34l-39.047-4.383v34.318A5.907,5.907,0,0,1,899.864,1698.687ZM809.9,1686.874h84.06v-35.018a5.9,5.9,0,0,1,6.564-5.869l45.613,5.119a9.238,9.238,0,0,0,3.27-18.142l-48.6-12.151a5.905,5.905,0,0,1-4.456-5.27l-2.667-34.23a15.412,15.412,0,0,0-7.9-12.306l-.267-.15a66.646,66.646,0,0,0-32.281-8.363H833.725a16.573,16.573,0,0,0-15.444,10.434l-11.445,28.444a28.416,28.416,0,0,0-1.977,12.428Z" fill="#05135a" />
								</g>
								<g id="Group_16" data-name="Group 16">
									<circle id="Ellipse_5" data-name="Ellipse 5" cx="33.807" cy="33.807" r="33.807" transform="matrix(0.974, -0.226, 0.226, 0.974, 996.999, 1475.345)" fill="#fff" />
									<path id="Path_32" data-name="Path 32" d="M1037.583,1540.329a39.713,39.713,0,1,1,39.712-39.713A39.758,39.758,0,0,1,1037.583,1540.329Zm0-67.613a27.9,27.9,0,1,0,27.9,27.9A27.932,27.932,0,0,0,1037.583,1472.716Z" fill="#05135a" />
								</g>
								<g id="Group_17" data-name="Group 17">
									<path id="Path_33" data-name="Path 33" d="M1030.63,1554.588h25.592a22.452,22.452,0,0,1,20.829,14.072l12.315,30.607a24.25,24.25,0,0,1,1.7,10.671l-5.56,82.842H990.014v-40.924l-45.612,5.12a15.144,15.144,0,0,1-16.177-10.64h0a15.144,15.144,0,0,1,10.815-19.1l48.6-12.151,2.341-30.039A29.18,29.18,0,0,1,1004.9,1561.8l1.85-1.028A49.166,49.166,0,0,1,1030.63,1554.588Z" fill="#fff" />
									<path id="Path_34" data-name="Path 34" d="M1085.5,1698.687H990.015a5.907,5.907,0,0,1-5.907-5.907v-34.318l-39.047,4.383a21.05,21.05,0,0,1-7.454-41.34l44.477-11.119,2.011-25.8a35,35,0,0,1,17.941-27.946l1.85-1.028a55.2,55.2,0,0,1,26.743-6.93h25.593a28.23,28.23,0,0,1,26.308,17.774l12.315,30.607a30.339,30.339,0,0,1,2.111,13.271l-5.56,82.842A5.906,5.906,0,0,1,1085.5,1698.687Zm-89.583-11.813h84.06l5.19-77.331a18.438,18.438,0,0,0-1.284-8.072l-12.314-30.607a16.472,16.472,0,0,0-15.35-10.37h-25.593a43.367,43.367,0,0,0-21.007,5.444l-1.85,1.028a23.216,23.216,0,0,0-11.9,18.538l-2.341,30.039a5.9,5.9,0,0,1-4.455,5.27l-48.6,12.151a9.238,9.238,0,0,0,3.27,18.142l45.613-5.119a5.9,5.9,0,0,1,6.564,5.869Zm-8.278-71.79h0Z" fill="#05135a" />
								</g>
							</g>
						</svg>

					</li>
					<li>
						<p>生産性を<br>
							向上させたい</p>
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 329.378 299.455" role="img" aria-label="生産性">
							<g id="Group_13" data-name="Group 13" transform="translate(-780.227 -506.429)">
								<path id="Path_18" data-name="Path 18" d="M1050.471,650.558H989.678a5.906,5.906,0,0,1-5.906-5.906,38.857,38.857,0,0,0-77.714,0,5.907,5.907,0,0,1-5.907,5.906H839.36a5.906,5.906,0,0,1-5.906-5.906c0-2.839.115-5.737.342-8.652l-21.405-16.2a5.907,5.907,0,0,1-2.194-6.024,137.722,137.722,0,0,1,7.532-23.312,5.906,5.906,0,0,1,5.318-3.587l26.884-.523a112.075,112.075,0,0,1,10.152-14l-7.785-25.67a5.907,5.907,0,0,1,1.767-6.162,139.077,139.077,0,0,1,19.813-14.452,5.9,5.9,0,0,1,6.415.217l22.053,15.352a110.792,110.792,0,0,1,16.45-5.364l8.8-25.334A5.9,5.9,0,0,1,932.654,507c4.363-.384,8.373-.571,12.261-.571s7.9.187,12.262.571a5.9,5.9,0,0,1,5.061,3.945l8.8,25.334a110.992,110.992,0,0,1,16.45,5.364l22.051-15.352a5.91,5.91,0,0,1,6.414-.217,138.861,138.861,0,0,1,19.814,14.453,5.9,5.9,0,0,1,1.767,6.161l-7.783,25.671a112.144,112.144,0,0,1,10.151,14l26.884.523a5.908,5.908,0,0,1,5.318,3.588,137.794,137.794,0,0,1,7.532,23.309,5.907,5.907,0,0,1-2.194,6.025l-21.4,16.2c.227,2.916.341,5.813.341,8.652A5.905,5.905,0,0,1,1050.471,650.558Zm-55.229-11.812h49.143q-.146-2.41-.406-4.843a5.9,5.9,0,0,1,2.309-5.339l20.932-15.842a126.067,126.067,0,0,0-4.551-14.109l-26.283-.511a5.906,5.906,0,0,1-5.008-2.964,100.179,100.179,0,0,0-12.609-17.384,5.9,5.9,0,0,1-1.276-5.679l7.611-25.1a127.219,127.219,0,0,0-12.008-8.766l-21.559,15.009a5.909,5.909,0,0,1-5.8.539,98.934,98.934,0,0,0-20.408-6.651,5.908,5.908,0,0,1-4.376-3.845l-8.6-24.778a115.123,115.123,0,0,0-14.871,0l-8.6,24.778A5.908,5.908,0,0,1,924.5,547.1a99.011,99.011,0,0,0-20.408,6.65,5.908,5.908,0,0,1-5.8-.538l-21.561-15.009a127.235,127.235,0,0,0-12.007,8.765l7.612,25.1a5.9,5.9,0,0,1-1.276,5.68,100.192,100.192,0,0,0-12.611,17.383,5.9,5.9,0,0,1-5.007,2.964l-26.283.511a125.964,125.964,0,0,0-4.552,14.11l20.933,15.842a5.91,5.91,0,0,1,2.309,5.339q-.261,2.428-.406,4.843h49.141a50.673,50.673,0,0,1,100.655,0Z" fill="#05135a" />
								<g id="Group_12" data-name="Group 12">
									<g id="Group_8" data-name="Group 8">
										<circle id="Ellipse_1" data-name="Ellipse 1" cx="30.751" cy="30.751" r="30.751" transform="matrix(0.23, -0.973, 0.973, 0.23, 817.908, 664.531)" fill="#fff" />
										<path id="Path_19" data-name="Path 19" d="M854.9,678.325a36.657,36.657,0,1,1,36.657-36.658A36.7,36.7,0,0,1,854.9,678.325Zm0-61.5a24.845,24.845,0,1,0,24.846,24.844A24.873,24.873,0,0,0,854.9,616.823Z" fill="#05135a" />
									</g>
									<path id="Path_20" data-name="Path 20" d="M923.669,773.837H786.133a5.906,5.906,0,0,1-5.9-6.088c.014-.43.368-10.709,4.036-27.266,6.586-29.736,21.76-48.736,45.1-56.473a5.905,5.905,0,0,1,6.973,2.653l17.17,29.737h2.785l17.17-29.737a5.91,5.91,0,0,1,6.973-2.653c23.34,7.737,38.515,26.737,45.1,56.474h0c3.666,16.556,4.021,26.835,4.034,27.265a5.906,5.906,0,0,1-5.9,6.088Zm-131.11-11.811H917.244a185.335,185.335,0,0,0-3.239-18.988h0c-5.174-23.363-16.207-38.849-32.828-46.11L864.818,725.26a5.907,5.907,0,0,1-5.115,2.953h0l-9.6,0a5.905,5.905,0,0,1-5.114-2.953l-16.358-28.33c-16.621,7.261-27.653,22.747-32.828,46.11A185,185,0,0,0,792.559,762.026Z" fill="#05135a" />
									<g id="Group_9" data-name="Group 9">
										<circle id="Ellipse_2" data-name="Ellipse 2" cx="30.751" cy="30.751" r="30.751" transform="translate(991.442 641.668) rotate(-45)" fill="#fff" />
										<path id="Path_21" data-name="Path 21" d="M1034.931,678.325a36.657,36.657,0,1,1,36.656-36.658A36.7,36.7,0,0,1,1034.931,678.325Zm0-61.5a24.845,24.845,0,1,0,24.845,24.844A24.873,24.873,0,0,0,1034.931,616.823Z" fill="#05135a" />
									</g>
									<path id="Path_22" data-name="Path 22" d="M1103.7,773.837H966.163a5.906,5.906,0,0,1-5.9-6.088c.014-.43.368-10.709,4.036-27.266,6.586-29.736,21.76-48.736,45.1-56.473a5.9,5.9,0,0,1,6.973,2.653l17.17,29.737h2.785l17.17-29.737a5.91,5.91,0,0,1,6.973-2.653c23.341,7.737,38.515,26.737,45.1,56.474h0c3.666,16.556,4.021,26.835,4.035,27.265a5.908,5.908,0,0,1-5.9,6.088Zm-131.11-11.811h124.685a184.962,184.962,0,0,0-3.238-18.988h0c-5.175-23.363-16.208-38.849-32.829-46.11l-16.359,28.332a5.907,5.907,0,0,1-5.115,2.953h0l-9.6,0a5.9,5.9,0,0,1-5.113-2.953l-16.358-28.33c-16.62,7.261-27.653,22.747-32.827,46.11A185.043,185.043,0,0,0,972.588,762.026Z" fill="#05135a" />
									<g id="Group_10" data-name="Group 10">
										<circle id="Ellipse_3" data-name="Ellipse 3" cx="30.751" cy="30.751" r="30.751" transform="translate(900.632 673.715) rotate(-45)" fill="#5e9cdd" />
										<path id="Path_23" data-name="Path 23" d="M944.121,710.372a36.657,36.657,0,1,1,36.656-36.657A36.7,36.7,0,0,1,944.121,710.372Zm0-61.5a24.845,24.845,0,1,0,24.844,24.845A24.873,24.873,0,0,0,944.121,648.87Z" fill="#05135a" />
									</g>
									<g id="Group_11" data-name="Group 11">
										<path id="Path_24" data-name="Path 24" d="M1008.991,773.808c-5.531-24.97-18.067-44.479-41.193-52.145l-18.876,32.691h-9.6l-18.875-32.69c-23.125,7.666-35.661,27.175-41.192,52.145-3.59,16.206-3.9,26.17-3.9,26.17h137.535S1012.58,790.014,1008.991,773.808Z" fill="#5e9cdd" />
										<path id="Path_25" data-name="Path 25" d="M1012.888,805.884H875.353a5.906,5.906,0,0,1-5.9-6.088c.014-.43.368-10.709,4.036-27.265,6.586-29.737,21.76-48.737,45.1-56.473a5.905,5.905,0,0,1,6.973,2.652l17.17,29.737h2.785l17.17-29.737a5.91,5.91,0,0,1,6.973-2.652c23.341,7.736,38.515,26.736,45.1,56.473h0c3.666,16.556,4.021,26.835,4.035,27.265a5.908,5.908,0,0,1-5.9,6.088Zm-131.11-11.812h124.685a185.359,185.359,0,0,0-3.238-18.987c-5.175-23.363-16.208-38.849-32.829-46.11l-16.359,28.332a5.907,5.907,0,0,1-5.115,2.953h0l-9.605,0a5.9,5.9,0,0,1-5.113-2.952l-16.358-28.331c-16.62,7.261-27.653,22.747-32.827,46.11A184.8,184.8,0,0,0,881.778,794.072Z" fill="#05135a" />
									</g>
									<path id="Path_26" data-name="Path 26" d="M944.121,760.259a5.905,5.905,0,0,1-5.906-5.9V717.911a5.905,5.905,0,1,1,11.811,0v36.443A5.905,5.905,0,0,1,944.121,760.259Z" fill="#05135a" />
									<path id="Path_27" data-name="Path 27" d="M854.9,728.213A5.906,5.906,0,0,1,849,722.307V686.188a5.906,5.906,0,1,1,11.811,0v36.119A5.906,5.906,0,0,1,854.9,728.213Z" fill="#05135a" />
									<path id="Path_28" data-name="Path 28" d="M1034.931,727.57a5.906,5.906,0,0,1-5.906-5.906V686.188a5.906,5.906,0,1,1,11.811,0v35.476A5.906,5.906,0,0,1,1034.931,727.57Z" fill="#05135a" />
								</g>
							</g>
						</svg>
					</li>
					<li>
						<p class="one_line">起業したい</p>
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 274.183 365.96" role="img" aria-label="拡大">
							<g id="Group_21" data-name="Group 21" transform="translate(-1820.682 -490.408)">
								<path id="Path_35" data-name="Path 35" d="M1884.6,856.368a5.909,5.909,0,0,1-1.011-.087l-56.621-9.766a5.906,5.906,0,1,1,2.008-11.64l56.621,9.767a5.906,5.906,0,0,1-1,11.726Z" fill="#05135a" />
								<path id="Path_36" data-name="Path 36" d="M1826.591,843.834a5.907,5.907,0,0,1-5.561-7.9L1837,791.37a5.906,5.906,0,1,1,11.119,3.985l-11.5,32.083L1902.4,800.5a5.906,5.906,0,0,1,4.477,10.931l-78.053,31.96A5.9,5.9,0,0,1,1826.591,843.834Z" fill="#05135a" />
								<path id="Path_37" data-name="Path 37" d="M2015.671,766.414a5.907,5.907,0,0,1-2.24-11.373l58.511-23.959-14.223-4.713a5.906,5.906,0,1,1,3.715-11.213l29.38,9.734a5.906,5.906,0,0,1,.381,11.072l-73.288,30.009A5.89,5.89,0,0,1,2015.671,766.414Z" fill="#05135a" />
								<path id="Path_38" data-name="Path 38" d="M2079.191,765.086a5.908,5.908,0,0,1-5.591-7.811l9.766-28.682a5.906,5.906,0,0,1,11.182,3.807l-9.767,28.683A5.909,5.909,0,0,1,2079.191,765.086Z" fill="#05135a" />
								<path id="Path_39" data-name="Path 39" d="M2030.945,856.368a5.906,5.906,0,0,1-1-11.726l56.621-9.767a5.906,5.906,0,1,1,2.008,11.64l-56.621,9.766A5.909,5.909,0,0,1,2030.945,856.368Z" fill="#05135a" />
								<path id="Path_40" data-name="Path 40" d="M2088.956,843.834a5.886,5.886,0,0,1-2.237-.441l-82.492-33.778a5.905,5.905,0,1,1,4.476-10.93l70.22,28.753-11.5-32.083a5.906,5.906,0,1,1,11.119-3.985l15.973,44.565a5.907,5.907,0,0,1-5.561,7.9Z" fill="#05135a" />
								<path id="Path_41" data-name="Path 41" d="M1904.641,768.364a5.893,5.893,0,0,1-2.237-.442l-78.052-31.96a5.905,5.905,0,0,1,.457-11.1l30.764-9.734a5.906,5.906,0,0,1,3.563,11.262l-15.22,4.815,62.965,25.782a5.907,5.907,0,0,1-2.24,11.373Z" fill="#05135a" />
								<path id="Path_42" data-name="Path 42" d="M1836.355,765.086a5.907,5.907,0,0,1-5.589-4L1821,732.4a5.906,5.906,0,0,1,11.182-3.807l9.766,28.682a5.908,5.908,0,0,1-5.592,7.811Z" fill="#05135a" />
								<g id="Group_19" data-name="Group 19">
									<circle id="Ellipse_6" data-name="Ellipse 6" cx="25.792" cy="25.792" r="25.792" transform="translate(1930.998 496.314)" fill="#5e9cdd" />
									<path id="Path_43" data-name="Path 43" d="M1956.789,553.8a31.7,31.7,0,1,1,31.7-31.7A31.734,31.734,0,0,1,1956.789,553.8Zm0-51.584a19.886,19.886,0,1,0,19.886,19.885A19.908,19.908,0,0,0,1956.789,502.22Z" fill="#05135a" />
								</g>
								<g id="Group_20" data-name="Group 20">
									<path id="Path_44" data-name="Path 44" d="M2008.757,604.538c-2.317-31.663-16.332-39.733-33.859-41.782l-17.05,31.812L1940.8,562.756c-17.527,2.049-31.543,10.119-33.86,41.782-3.034,41.469,0,62.54,0,62.54l14.5,10.114,2.108,115.472h23.684l4.552-84.96h12.137l4.551,84.96h23.685l2.107-115.472,14.5-10.114S2011.791,646.007,2008.757,604.538Z" fill="#5e9cdd" />
									<path id="Path_45" data-name="Path 45" d="M1992.152,798.57h-23.684a5.906,5.906,0,0,1-5.9-5.59l-4.251-79.371h-.942l-4.252,79.371a5.906,5.906,0,0,1-5.9,5.59h-23.684a5.9,5.9,0,0,1-5.9-5.8l-2.052-112.459-12.026-8.391a5.9,5.9,0,0,1-2.467-4c-.128-.886-3.091-22.184-.045-63.814,2.177-29.75,14.224-44.312,39.064-47.216a5.909,5.909,0,0,1,5.891,3.076l11.844,22.1,11.844-22.1a5.92,5.92,0,0,1,5.891-3.076c24.84,2.9,36.888,17.466,39.064,47.216,3.046,41.63.083,62.928-.044,63.814a5.908,5.908,0,0,1-2.467,4l-12.027,8.391-2.051,112.459A5.906,5.906,0,0,1,1992.152,798.57Zm-18.087-11.811h12.289l2-109.675a5.907,5.907,0,0,1,2.527-4.735l12.307-8.587c.65-6.622,2.043-26.468-.322-58.793-1.847-25.261-11.119-33.179-24.729-35.755l-15.084,28.143a5.906,5.906,0,0,1-5.2,3.116h0a5.9,5.9,0,0,1-5.205-3.116l-15.083-28.143c-13.611,2.576-22.882,10.494-24.73,35.755-2.365,32.321-.972,52.165-.321,58.793l12.306,8.587a5.9,5.9,0,0,1,2.527,4.735l2,109.675h12.287l4.252-79.371a5.907,5.907,0,0,1,5.9-5.591h12.138a5.906,5.906,0,0,1,5.9,5.591Zm34.692-119.681h0Z" fill="#05135a" />
								</g>
							</g>
						</svg>
					</li>
				</ul>
			</div>
		</div>
		<!-- /issues -->

		<!-- solution -->
		<div class="solution container">
			<div class="container__inner">
				<h2 class="solution__title">よろず支援拠点は<br>
					国が設置した<br class="show-sp">無料の経営相談所です</h2>
				<p class="solution__read">さまざまな経営課題に応え、<br>
					100万件以上の相談実績を<br class="show-sp">積み重ねてきました</p>
			</div>
		</div>
		<!-- /solution -->

	</section>

	<!-- branch -->
	<section>
		<div class="branch container container--light_orange container--npb">
			<div class="container__inner">
				<div class="ta_center">
					<h3 class="lined_title">よろず支援拠点は</h3>
				</div>
				<div class="branch__item branch__item--rv_sp">
					<div class="branch__text first">
						<dl>
							<dt>国が設置した経営相談所</dt>
							<dd>よろず支援拠点は中小企業・小規模事業者のための経営相談所です。</dd>
						</dl>
						<a class="base_btn base_btn--orange" href="<?php echo home_url(); ?>/about/">よろず支援拠点とは</a>
					</div>
					<figure class="branch__image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/national.svg" width="310" height="316" alt="経営相談イメージ">
					</figure>
				</div>
				<div class="branch__item branch__item--left">
					<figure class="branch__image first">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/repeat.svg" width="416" height="273" alt="経営相談イメージ">
					</figure>
					<div class="branch__text branch__text--narrow">
						<dl>
							<dt>何度でも無料で相談が可能です</dt>
							<dd>よろず支援拠点の相談に料金はかかりません。<br>
								回数制限も無く何度でも相談していただけます。</dd>
						</dl>
						<a class="base_btn base_btn--orange mb_01" href="<?php echo home_url(); ?>/inquiry/">よろず支援拠点へのご相談</a>
						<a class="base_btn base_btn--orange" href="<?php echo home_url(); ?>/consulting/">サテライト拠点での相談会</a>
					</div>
				</div>
				<div class="branch__item branch__item--rv_sp">
					<div class="branch__text first first--mr45">
						<dl>
							<dt>様々な経営課題に対応</dt>
							<dd>よろず支援拠点は、高度な専門性と支援ネットワークを<br>有しています。<br>
								これらを駆使しながら、様々な経営課題に応えていきます。
							</dd>
						</dl>
						<a class="base_btn base_btn--coordinator base_btn--orange" href="<?php echo home_url(); ?>/coordinater/">コーディネーターについて詳しく見る</a>
					</div>
					<figure class="branch__image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/solution.svg" width="416" height="336" alt="経営相談イメージ">
					</figure>
				</div>
				<div class="branch__item branch__item--center branch__item--last">
					<div class="branch__text">
						<dl>
							<dt>100万件以上の相談実績
							</dt>
							<dd>よろず支援拠点は設立以来、延べ100万件以上の相談に対応してきました。<br>相談者の9割以上に満足していただいています。
							</dd>
						</dl>
					</div>
					<a class="base_btn base_btn--orange" href="<?php echo home_url(); ?>/leaflet/">資料コーナー(事例集)</a>
					<figure class="branch__image branch__image--last">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/achievement.svg" width="705" width="232" alt="経営相談イメージ">
					</figure>
				</div>
			</div>
		</div>
	</section>
	<!-- /branch -->

	<!-- seminar -->
	<!--<section>
		<div class="seminar container container--grid">
			<div class="container__inner">
				<div class="ta_center">
					<h3 class="lined_title">セミナー・勉強会</h3>
				</div>
				<div class="seminar__body">
					<div class="seminar__item">
						<h3>ミニセミナー</h3>
						<?php //showSeminarPosts("miniseminar");
						?>
					</div>
					<div class="seminar__item">
						<h3>よろずcafé（勉強会）</h3>
						<?php //showSeminarPosts("cafe-learning");
						?>
					</div>
					<div class="seminar__item">
						<h3>よろずチャンネル</h3>
						<?php //showSeminarPosts("channel");
						?>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<!-- /seminar -->

	<!-- calendar -->
	<!--<section>
		<div class="calendar container">
			<div class="container__inner">
				<div class="calendar__body">
					<div>
						<h3 class="calendar__title">よろずカレンダー</h3>
						<p>中小企業・小規模事業者のためのイベントスケジュールです。<br>
							※都合によりイベントの日程が変更になることもございます。ご了承ください。</p>
					</div>
					<dl class="calendar__list">
						<dt class="calendar__cat calendar__cat--red">ミニセミナー</dt>
						<dd class="calendar__desc">講師を招き、経営課題の解決にむけたヒントを分かりやすく説明します。<br>
							また、質疑応答の時間を設け、参加者が納得いくまでご説明します。</dd>
						<dt class="calendar__cat calendar__cat--yello">よろずcafé（勉強会）</dt>
						<dd class="calendar__desc">当拠点のコーディネーターが参加者と一緒に、課題解決に向けたアドバイスをしていきます。<br>
							経営に役立つポイントを気軽に学ぶことができます。</dd>
						<dt class="calendar__cat calendar__cat--green">サテライト相談会</dt>
						<dd class="calendar__desc">県内３ヵ所（つくば・ひたちなか・日立）にサテライト拠点を設置し、毎月1回個別相談会を開催しています。<br>
							また、各金融機関でも相談対応を行っております。</dd>
						<dt class="calendar__cat calendar__cat--blue">その他</dt>
						<dd class="calendar__desc"></dd>
					</dl>
					!--<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTokyo&amp;src=aWJhcmFraXlvcm96dUBnbWFpbC5jb20&amp;src=czZuNTVtN2k5bnRvbzBvNHBwa3JlMDl2NmNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=c3Blcm8wMGY4Y2Z1ZzZpbnIxY2gzbW1kMzRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%2333B679&amp;color=%23F6BF26&amp;color=%23E67C73" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>--
					<iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FTokyo&showTitle=0&src=aWJhcmFraXlvcm96dUBnbWFpbC5jb20&src=ZDduMmFhaTFsOGtvb2k0ZzQ2NW5xZ2t0dDBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=czZuNTVtN2k5bnRvbzBvNHBwa3JlMDl2NmNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=c3Blcm8wMGY4Y2Z1ZzZpbnIxY2gzbW1kMzRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%2333B679&color=%237986CB&color=%23F6BF26&color=%23E67C73" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
				</div>
			</div>
		</div>
	</section>-->
	<!-- /.calendar -->

	<!-- map -->
	<section>
		<div class="map container">
			<div class="container__inner">
				<div class="ta_center">
					<h3 class="lined_title">アクセスマップ</h3>
				</div>
				<div class="map__body">
					<div class="map__item">
						<p class="map__title">水戸事務所</p>
						<address>水戸市桜川2-2-35　<br class="show-sp">茨城県産業会館 9階</address>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1606.3440389525354!2d140.4771287339944!3d36.36833362063388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f30!3m3!1m2!1s0x60222506b2a34f89%3A0x1027899bf7d77243!2z6Iyo5Z-O55yM55Sj5qWt5Lya6aSo!5e0!3m2!1sja!2sjp!4v1621559603383!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
					<div class="map__item">
						<p class="map__title">つくば事務所</p>
						<address>つくば市千現2-1-6　<br class="show-sp">つくば研究支援センター内​</address>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9122.595903087427!2d140.12234595263521!3d36.06118324868275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60220cc14e39683f%3A0x13ccdf720abf9d41!2z44CSMzA1LTAwNDcg6Iyo5Z-O55yM44Gk44GP44Gw5biC5Y2D54--77yS5LiB55uu77yR4oiS77yW!5e0!3m2!1sja!2sjp!4v1624342192311!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /map -->
</main><!-- #main -->

<?php

get_footer();
