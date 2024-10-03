<?php

/**
 * show column list
 * @package scratch
 */

?>


<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 12
);
$query = new WP_Query($args);
if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();
        $categories = get_the_category();
        $cat_slug = ($categories[0]->slug != '') ? esc_html($categories[0]->slug) : '未設定';
        $cat_name = ($categories[0]->name != '') ? esc_html($categories[0]->name) : '未設定';
?>
        <li class="column-list__item">
            <a class="column-list__link" href="<?php the_permalink(); ?>">
                <figure class="column-list__image"><?php show_thumbnail('large'); ?></figure>
                <p class="column-list__genre"><span><?php echo $cat_name; ?></span></p>
                <p class="column-list__title"><?php the_title(); ?></p>
            </a>
        </li>
    <?php endwhile; ?>
<?php else : ?>
    <li class="ta-c">現在投稿がありません。</li>
<?php endif; ?>
<?php wp_reset_postdata(); ?>