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
          <form action="<?php echo esc_url(get_template_directory_uri()); ?>/contact-mail/mail.php" method="post" enctype="multipart/form-data">
            <table class="form_table">
              <tr>
                <th>
                  <p class="form_label"><span>Email</span><span class="require">必須</span></p>
                </th>
                <td><input size="20" type="email" name="Email" placeholder="例：info@ibaraki-yorozu.go.jp" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>企業名</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="相談企業名" placeholder="例：株式会社 山田商社" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>住所</span><span class="require">必須</span></p><small>（市町村のみでも可）</small>
                </th>
                <td><input size="30" type="text" name="住所" placeholder="例：〇〇市〇〇町〇〇丁目〇〇番〇〇号" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>担当者名</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="担当者名" placeholder="例：山田 太郎" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>担当者役職</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="担当者役職" placeholder="例：部長" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>電話番号</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="電話番号" placeholder="例：029-224-5339" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>業種</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="業種" placeholder="例：建設業" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>相談内容</span></p><small>（担当者が詳しくお聞きしますので、簡潔にご記入いただければ結構です。）</small>
                </th>
                <td><textarea name="相談内容" cols="50" rows="5"></textarea></td>
              </tr>
              <tr>
                <td class="nb pb_00" colspan="2"><small>※紹介機関がある場合は次の３項目をご記載ください。</small></td>
              </tr>
              <tr>
                <th class="nb pb_00"><p class="form_label"><span>紹介機関名</span></p></th>
                <td class="nb pb_00"><input name="紹介機関名"></input></td>
              </tr>
              <tr>
                <th class="nb pb_00"><p class="form_label"><span>紹介機関担当者名</span></p></th>
                <td class="nb pb_00"><input name="紹介機関担当者名"></input></td>
              </tr>
              <tr>
                <th><p class="form_label"><span>紹介機関電話番号</span></p></th>
                <td><input name="紹介機関電話番号"></input></td>
              </tr>
            </table>
            <p class="ta_center mb_03">
              <input type="checkbox" name="プライバシーポリシー" value="同意する" id="agree" required />
              <label for="agree"><a class="td_underline" href="<?php echo home_url(); ?>/privacy">プライバシーポリシー</a>に同意する</label>
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