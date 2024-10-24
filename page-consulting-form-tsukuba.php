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
        <p class="mb_02 ta_center">下記項目をご記入ください。後日担当者からご連絡させていただきます。</p>
        <div class="form_wrapper">
          <form action="<?php echo esc_url(get_template_directory_uri()); ?>/consulting-mail/mail.php" method="post" enctype="multipart/form-data">
            <table class="form_table">
              <input type="hidden" name="件名" value="R6つくばサテライト個別相談会申込">
              <input type="hidden" name="サテライトID" value="tsukuba">
              <?php get_template_part('template-parts/form-satelite-base'); ?>
              <tr>
                <td colspan="2" class="nb">
                  <p class="form_label"><span class="form_section_ttl">希望日時</span></p>
                </td>
              </tr>
              <tr>
                <th class="nb">
                  <p class="form_label"><span>第1希望日時</span><span class="require">必須</span></p>
                </th>
                <td class="nb">
                  <select name="第1希望日時" id="first_hope">
                    <option value="" disabled="" selected="">選択してください</option>
                    <?php echo getPossibleDates("tsukuba"); ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>第2希望日時</span><span class="require">必須</span></p>
                </th>
                <td>
                  <select name="第2希望日時" id="second_hope">
                    <option value="" disabled="" selected="">選択してください</option>
                    <?php echo getPossibleDates("tsukuba"); ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>相談内容</span><span class="require">必須</span></p><small>（担当者が詳しくお聞きしますので、簡潔にご記入いただければ結構です。）</small>
                </th>
                <td><textarea name="相談内容" cols="50" rows="5"></textarea></td>
              </tr>
              <?php get_template_part('template-parts/form-reasons'); ?>
              <?php get_template_part('template-parts/form-referral-agency'); ?>
            </table>
            <p class="ta_center mb_03">
              <input type="checkbox" name="プライバシーポリシー" value="同意する" id="agree" required />
              <label for="agree"><a class="td_underline" href="<?php echo home_url(); ?>/privacy" target="_blank">プライバシーポリシー</a>に同意する</label>
            </p>
            <div class="ta_center_table">
              <button class="form_btn base_btn base_btn--orange" type="submit" type="button" value="確認">確認する</button>
            </div>
          </form>
        </div>
      </div>
    <?php endwhile;
    ?>
  </main><!-- #main -->
  <?php get_sidebar(); ?>
</div>  

<?php get_footer(); ?>