<?php

/**
 * The template for displaying all pages
 *
 *
 * @package scratch
 */

get_header();
?>
<div class="page-wrapper container container--np">
  <main id="primary" class="site-main<?php if (is_page("coronalink")) {
                                        echo " ex_link";
                                      }; ?>">
    <?php
    while (have_posts()) :
      the_post();
      get_template_part('template-parts/content', 'page');
    ?>

      <!-- reading -->
      <div class="container__inner">
        <p>茨城県よろず支援拠点では、中小企業・小規模事業者の皆様のために無料で経営相談を行っております。お気軽にお問い合わせください。専門のコーディネーターが親身になって対応いたします。</p>

        <div class="form_wrapper">
          <form action="<?php echo esc_url(get_template_directory_uri()); ?>/mail/mail.php" method="post" enctype="multipart/form-data">
            <table class="form_table">
              <tr>
                <th>Email<span class="require">*</span></th>
                <td><input size="20" type="text" name="お名前" /></td>
              </tr>
              <tr>
                <th>相談企業名<span class="require">*</span></th>
                <td><input size="30" type="text" name="電話番号" /></td>
              </tr>
              <tr>
                <th>住所（市町村のみでも可）<span class="require">*</span></th>
                <td><input size="30" type="text" name="Email" /></td>
              </tr>
              <tr>
                <th>担当者名<span class="require">*</span></th>
                <td><input size="30" type="text" name="Email" /></td>
              </tr>
              <tr>
                <th>担当者役職<span class="require">*</span></th>
                <td><input size="30" type="text" name="Email" /></td>
              </tr>
              <tr>
                <th>電話番号<span class="require">*</span></th>
                <td><input size="30" type="text" name="Email" /></td>
              </tr>
              <tr>
                <th>業種<span class="require">*</span></th>
                <td><input size="30" type="text" name="Email" /></td>
              </tr>
              <tr>
                <th>相談内容　（担当者が詳しくお聞きしますので、簡潔にご記入いただければ結構です。）<br /></th>
                <td><textarea name="お問い合わせ内容" cols="50" rows="5"></textarea></td>
              </tr>
              <tr>
                <th>紹介機関名　※紹介機関がある場合は次の３項目をご記載ください。<br /></th>
                <td><textarea name="お問い合わせ内容" cols="50" rows="5"></textarea></td>
              </tr>
              <tr>
                <th>紹介機関担当者名<br /></th>
                <td><textarea name="お問い合わせ内容" cols="50" rows="5"></textarea></td>
              </tr>
              <tr>
                <th>紹介機関電話番号<br /></th>
                <td><textarea name="お問い合わせ内容" cols="50" rows="5"></textarea></td>
              </tr>
            </table>
            <input class="base_btn base_btn--orange" type="submit" value="　 確認 　" />
          </form>
        </div>
      </div>
    <?php endwhile;
    ?>
  </main><!-- #main -->
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>