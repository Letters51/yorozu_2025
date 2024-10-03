<?php

/**
 * The template for displaying all single posts
 *
 * @package scratch
 */

get_header();
?>





<div class="container container--np">
    <main id="primary" class="site-main">
        <article>
            <header class="entry-header">
                <div class="page-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </div>
            </header><!-- .entry-header -->
            <div class="breadcrumbs container" typeof="BreadcrumbList" vocab="https://schema.org/">
                <div class="container__inner">
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>
            </div>
            <div class="container__inner">
                <div class="entry-content casestudy">
                    <?php
                    while (have_posts()) :
                        the_post();
                        $for_who = esc_html__(get_field('for_who'));
                        $content = esc_html__(get_field('content'));
                        $cooperation = esc_html__(get_field('cooperation'));
                        $voice = esc_html__(get_field('voice'));
                    ?>
                        <!--<figure>
							<?php //scratch_post_thumbnail(true); 
                            ?>
						</figure>-->
                        <div class="casestudy-list">
                            <h3 class="casestudy-list__title casestudy-list__title--customer">1.相談者</h3>
                            <p><?php echo htmlspecialchars_decode($for_who); ?></p>
                            <h3 class="casestudy-list__title casestudy-list__title--support">2.支援内容</h3>
                            <p><?php echo htmlspecialchars_decode($content); ?></p>
                            <h3 class="casestudy-list__title casestudy-list__title--collaborator">3.連携機関</h3>
                            <p><?php echo htmlspecialchars_decode($cooperation); ?></p>

                            <div class="casestudy-voice">
                                <h3 class="casestudy-voice__title">利用者の声</h3>
                                <div class="casestudy-voice__body">
                                    <?php echo htmlspecialchars_decode($voice); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        the_post_navigation(
                            array(
                                'prev_text' => '<span class="nav-subtitle">' . esc_html__('<<', 'scratch') . '</span> <span class="nav-title">%title</span>',
                                'next_text' => '<span class="nav-subtitle">' . esc_html__('>>', 'scratch') . '</span> <span class="nav-title">%title</span>',
                                'screen_reader_text' => __(''),
                            )
                        );

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </article>
    </main><!-- #main -->
</div>
<?php
get_sidebar();
get_footer();
