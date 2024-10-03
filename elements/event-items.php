<?php
if (have_posts()) :
    while ($wp_query->have_posts()) :
        $wp_query->the_post();
        $date = eo_get_schedule_start('Y/m/d');
        $is_accepting = esc_html__(get_field('is_accepting'));

?>
        <li class="column-list__item">
            <div class="column-list__left">
                <a class="column-list__image" href="<?php the_permalink(); ?>">
                    <figure><?php show_thumbnail('large'); ?></figure>
                </a>
                <div class="column-list__cat"><?php
                                                $categories = get_the_terms($post->ID, "event-category");
                                                if ($categories) {
                                                    foreach ($categories as $category) {
                                                        $cat_class = "event_cat event_cat--" . $category->slug;
                                                        echo "<span class='" . $cat_class . "'>" . $category->name . "</span>";
                                                    }
                                                }; ?></div>
            </div>
            <div class="column-list__content">
                <div class="column-list__text">
                    <div class="column-list__date"><span class="add_day_after"><?php echo $date; ?></span> 開催<?php echo get_accepting_part($is_accepting); ?></div>
                    <a class="column-list__title" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <div class="column-list__desc">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </li>
    <?php endwhile; ?>
<?php else : ?>
    <li class="ta-c">現在投稿がありません。</li>
<?php endif;
wp_reset_postdata(); ?>