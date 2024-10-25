<?php

/**
 * thanks format
 *
 *
 * @package scratch
 */
session_name('PHPMAILFORMSYSTEM');
session_start();
$thanks_message = $_SESSION['thanks_message'];
if ($thanks_message == '') {
  //$thanks_message = "お申し込みありがとうございました。追って担当者よりご連絡いたします。";
}
$begining_message = "この度は";
$event_name = $_SESSION['event_name'];
if ($event_name == '') {
  $event_name = "茨城県よろず支援拠点のイベント";
}
$event_id = $_SESSION['event_id'];
$ending_message = "へのお申し込みありがとうございました。追って担当者よりご連絡いたします。";
get_header();
?>
<div class="page-wrapper container container--np">
  <main id="primary" class="site-main<?php if (is_page("coronalink")) {
                                        echo " ex_link";
                                      }; ?>">
    <?php
    while (have_posts()) :
      the_post();
    ?>
      <section>
        <header class="entry-header">
          <div class="page-header">
            <?php
            //get custom field of prim-ttl
            $prim_ttl = get_field('prim-ttl');
            if ($prim_ttl) {
              echo '<h1 class="entry-title">' . esc_html($prim_ttl) . '</h1>';
            } else {
              echo '<h1 class="entry-title">' . esc_html(get_the_title()) . '</h1>';
            }
            ?>
          </div>
        </header><!-- .entry-header -->
        <?php scratch_post_thumbnail(true); ?>
        <div class="breadcrumbs container" typeof="BreadcrumbList" vocab="https://schema.org/">
          <div class="container__inner">
            <?php if (function_exists('bcn_display')) {
              bcn_display();
            } ?>
          </div>
        </div>
        <div class="content">
          <div class="container__inner">
            <div class="entry-content thanks_text">
              <div class="thanks_text__head">
                <p><?php echo $begining_message; ?></p>
                <?php if ($event_id) { ?>
                  <a class="thanks_text__event_name" href="<?php echo home_url('/event/' . $event_id); ?>"><?php echo $event_name; ?></a>
                <?php } else { ?>
                  <p class="thanks_text__event_name"><?php echo $event_name; ?></p>
                <?php } ?>
                <p><?php echo $ending_message; ?></p>
              </div>
              <div class="thanks_text__body">
                <?php echo nl2br($thanks_message); ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile;
      ?>
      </section>
  </main><!-- #main -->
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>