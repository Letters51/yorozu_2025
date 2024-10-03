<?php

/**
 *
 * @package scratch
 */
?>

<section class="container">
    <div class="container__inner">
        <h1 class="section-title">News</h1>
        <div class="news">
            <dl class="news__list">
                <?php

                $args = array(
                    'post_type' => array(
                        'post',              // post
                        'seminar',
                        'casestudy'
                    ),
                    'posts_per_page' => 3
                );
                $my_query = new WP_Query($args);
                if ($my_query->have_posts()) :
                    while ($my_query->have_posts()) :
                        $my_query->the_post();
                        $post_type = get_post_type();
                        if ('post' !== $post_type) {
                            $type = get_post_type_object($post_type);  //post types object
                            $slug = $type->rewrite['slug']; // post type slug
                            $label = esc_html(($type)->label); // post type label
                            $url = esc_url(get_post_type_archive_link($slug)); // post archive link
                        } else {
                            $label = 'ブログ';
                            $url = esc_url(get_the_permalink());
                        }
                ?>
                        <dt class="news__time"><?php the_time('Y年m月d日'); ?><span class="news__separator">|</span><span class="news__type"><a href="<?php echo $url; ?>"><?php echo $label; ?></a></span><span class="news__separator">|</span></dt>
                        <dd class=" news__body"><a class="news_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
                <?php
                    endwhile; // End of the loop.
                endif;
                wp_reset_postdata();

                ?>
            </dl>
        </div>
    </div>
    <!--.news -->
</section>