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
              <input type="hidden" name="件名" value="R6日立サテライト個別相談会申込">
              <input type="hidden" name="サテライトID" value="hitachi">
              <tr>
                <th>
                  <p class="form_label"><span>Email</span><span class="require">必須</span></p>
                </th>
                <td><input size="20" type="email" name="Email" placeholder="例：info@ibaraki-yorozu.go.jp" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>会社名</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="会社名" placeholder="例：株式会社 山田商社" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>会社名<br>フリガナ</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="会社名フリガナ" placeholder="例：カブシキガイシャ ヤマダショウシャ" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>代表者名</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="代表者名" placeholder="例：山田 太郎" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>郵便番号</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="郵便番号" placeholder="例：310-0000" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>住所</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="住所" placeholder="例：〇〇市〇〇町〇〇丁目〇〇番〇〇号" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>担当者役職</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="担当者役職" placeholder="例：部長" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>担当者名</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="担当者名" placeholder="例：山田 太郎" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>電話番号</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="電話番号" placeholder="例：029-224-5339" required /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>FAX番号</span></p>
                </th>
                <td><input size="30" type="text" name="FAX番号" placeholder="例：029-224-5339" /></td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>業種</span><span class="require">必須</span></p>
                </th>
                <td><input size="30" type="text" name="業種" placeholder="例：建設業" required /></td>
              </tr>
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
                  <?php echo getPossibleDates("hitachi"); ?>
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
                  <?php echo getPossibleDates("hitachi"); ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="nb">
                  <p class="form_label"><span class="form_section_ttl">相談内容</span></p>
                </td>
              </tr>
              <tr>
                <th class="nb">
                  <p class="form_label"><span>①相談区分</span><span class="require">必須</span></p>
                </th>
                <td class="nb">
                  <select name="相談区分" id="consulting_type">
                  <option value="" disabled="" selected="">選択してください</option>
                  <?php echo getConsultingType(); ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="form_label"><span>②具体的内容</span><span class="require">必須</span></p><small>（担当者が詳しくお聞きしますので、簡潔にご記入いただければ結構です。）</small>
                </th>
                <td><textarea name="具体的内容" cols="50" rows="5"></textarea></td>
              </tr>

              <tr>
                <th class="nb"><p class="form_label"><span>紹介機関</span></p></th>
                <td class="nb"><input name="紹介機関"></input></td>
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