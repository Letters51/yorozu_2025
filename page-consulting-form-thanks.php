<?php

/**
 * thanks format
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
      <div class="content">
        <div class="container__inner">
          <div class="entry-content ta_center thanks_text">
            <h1>お問い合わせありがとうございました。</h1>
            <p>早急にご返信致しますので今しばらくお待ちください。</p>
          </div>
        </div>
      </div>
    <?php endwhile;
    ?>
  </main><!-- #main -->
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>