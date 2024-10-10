<?php

/**
 * scratch functions and definitions
 *
 * @package scratch
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.5');
}

if (!defined('POST_PER_PAGE')) {
	// Define post per page setting
	define('POST_PER_PAGE', esc_html(get_option('posts_per_page')));
}

if (!function_exists('scratch_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function scratch_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on scratch, use a find and replace
		 * to change 'scratch' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('scratch', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/**
		 * add ogp size thumbnail
		 */
		//add_image_size('ogp', 1200, 630, true);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'scratch'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'scratch_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'scratch_setup');

/**
 * return cat name (post)
 */
function get_category_name()
{
	$category = get_the_category();
	$ret = ($category[0]->name != '') ? $category[0]->name : '未設定';
	return $ret;
}
function get_category_slug()
{
	$category = get_the_category();
	$ret = ($category[0]->slug != '') ? $category[0]->slug : 'none';
	return $ret;
}



/**
 * return cat name with links in ul (ct)
 */
function get_ct_cat_link($tx)
{
	$terms = get_the_terms('', $tx);
	if ($terms) {
		$ret = "<ul>";
		foreach ($terms as $term)
			$ret .= '<li><a href="' . esc_url(get_home_url()) . '\/' . $tx . '\/' . esc_html__($term->slug) . '">' . esc_html__($term->name) . '</a></li>';
		$ret .= "</ul>";
	} else {
		$ret = '';
	}

	return $ret;
}


/**
 * get_show_thumbnail
 */
function get_show_thumbnail($size = 'large', $id = '', $no_image = 'default-image.png')
{
	if (has_post_thumbnail($id)) {
		$ret = get_the_post_thumbnail_url($id, $size);
	} else {
		$ret = get_stylesheet_directory_uri() . '/assets/images/' . $no_image;
	}
	return $ret;
}



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scratch_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('scratch_content_width', 640);
}
add_action('after_setup_theme', 'scratch_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scratch_widgets_init()
{
	/**
	 * add top page widget
	 */
	register_sidebar(array(
		'name' => esc_html__('トップ上部', 'scratch'),
		'id' => 'front-top',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(
		array(
			'name' => esc_html__('トップ中部', 'scratch'),
			'id' => 'front-middle',
			'description' => esc_html__('Add widgets here.', 'scratch'),
			'before_widget' => '<section>',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('トップ下部', 'scratch'),
			'id' => 'front-bottom',
			'description' => esc_html__('Add widgets here.', 'scratch'),
			'before_widget' => '<section>',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	/**
	 * add widget to news
	 */
	register_sidebar(array(
		'name' => esc_html__('投稿ページ上部お知らせ', 'scratch'),
		'id' => 'primary-news-top',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<section id="%1$s" class="widget primary-news %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html__('投稿ページ下部お知らせ', 'scratch'),
		'id' => 'primary-news-bottom',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<aside id="%1$s" class="widget primary-news %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));


	/**
	 * add widget to footer
	 */
	register_sidebar(array(
		'name' => esc_html__('フッター1', 'scratch'),
		'id' => 'footer-1',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('フッター2', 'scratch'),
		'id' => 'footer-2',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('フッター3', 'scratch'),
		'id' => 'footer-3',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('フッター4', 'scratch'),
		'id' => 'footer-4',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('フッター5', 'scratch'),
		'id' => 'footer-5',
		'description' => esc_html__('Add widgets here.', 'scratch'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init', 'scratch_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function scratch_scripts()
{
	wp_enqueue_style('scratch-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('scratch-style', 'rtl', 'replace');
	wp_enqueue_script('scratch-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true);
	wp_enqueue_script('scratch-fix-viewport', get_template_directory_uri() . '/js/fix-viewport.js', array(), _S_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'scratch_scripts');

class le_enqueue
{
	public function register()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}

	public function enqueue()
	{
		wp_enqueue_style('scratch-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
		wp_enqueue_script('scratch-admin-script', get_template_directory_uri() . '/admin/js/admin.js');
	}
}
$le_enqueue = new le_enqueue();
$le_enqueue->register();


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * addmin menu additions.
 */
require get_template_directory() . '/inc/admin-menu.php';

/**
 * custom post type additions.
 */
require get_template_directory() . '/inc/custom-post.php';

/**
 * customizer additions.
 */
require get_template_directory() . '/inc/cutomizer-additional.php';

/**
 * Load Jetpack compatibility file.
 */
//if (defined('JETPACK__VERSION')) {
//require get_template_directory() . '/inc/jetpack.php';
//}

/**
 * add class to Custom logo.
 */
add_filter('wp_get_attachment_image_attributes', function ($attr) {
	if (isset($attr['class']) && 'custom-logo' === $attr['class'])
		$attr['class'] = 'site-branding__logo';
	return $attr;
});

/**
 * if posts are more than a number
 */
function is_more_than($type = 'post', $target)
{
	$number = wp_count_posts($type)->publish;
	return $number > $target;
}

/****************************************************************************
 * short codes
 *****************************************************************************/
/* show compnay-info */
/*function show_company_info()
{
	$name = esc_html__(get_theme_mod('company-name'));
	$place = esc_html__(get_theme_mod('company-place'));
	$map = esc_url(get_theme_mod('company-map'));
	$tel = esc_html__(get_theme_mod('company-tel'));
	$ret = '<dl class="company-info">
		<dt class="company-info__title">' . $name . '</dt>
		<dd class="company-content">
			<address>' . $place . '</address>
			<p class="company-info__elm"><a href="' . $map . '">GOOGLE MAP</a></p>
			<p class="company-info__elm">' . $tel . '</p>
		</dd>
	</dl>';
	return $ret;
}
// Register shortcode
add_shortcode('company-info', 'show_company_info');
*/

/* show compnay-info */
function show_company_info_yorozu()
{
	$name = esc_html__(get_theme_mod('company-name'));
	$postal = esc_html__(get_theme_mod('company-post-number'));
	$place = esc_html__(get_theme_mod('company-place'));
	$place_sub = esc_html__(get_theme_mod('company-place-sub'));
	$time = esc_html__(get_theme_mod('cta-time'));
	//$map = esc_url(get_theme_mod('company-map'));
	$tel = esc_html__(get_theme_mod('company-tel'));
	$ret = '<a href="/"><figure><img width="60" height="61" srcset="' . get_template_directory_uri() . '/assets/images/common/footer_logo@2x.png 2x,' . get_template_directory_uri() . '/assets/images/common/footer_logo@1x.png 1x" src=""></figure></a>
	<dl class="company-info">
			<dt class="company-info__title singo_maru">' . $name . '</dt>
			<dd class="company-content">
			<p class="company-info__elm">' . $postal . '</p>
			<address class="company-info__elm">' . $place . '<br>' . $place_sub . '</address>
			<p class="company-info__elm company-info__elm--tel"><a href="tel:' . $tel . '">' . $tel . '</a></p>
			<p class="company-info__elm">' . $time . '</p>
			</dd>
			</dl>';
	return $ret;
}
// Register shortcode
add_shortcode('company-info-yorozu', 'show_company_info_yorozu');


/**
 * show category
 */
function show_category_name_link($id = false)
{
	$categories = get_the_category($id);
	if (empty($categories)) {
		return false;
	}
	$cats_name = esc_html__($categories[0]->name, 'scratch');
	echo '<a class="category-link" href="' . esc_url(get_category_link($categories[0]->term_id)) .  '" rel="bookmark">' . $cats_name . '</a>';
}

/**
 * show term
 */
function show_term_name_link($id = false)
{
	$taxonomy_names = get_the_taxonomies();
	if (empty($taxonomy_names)) {
		return false;
	}
	$taxonomy_slug = array_keys($taxonomy_names);
	$terms = get_the_terms($id, $taxonomy_slug[0]);

	foreach ($terms as $term) {
		$term_name = $term->name;
		$term_slug = $term->slug;
	}

	$term_link = esc_url(get_term_link($term_slug, $taxonomy_slug[0]));
	echo '<a class="term-link" href="' . $term_link . '">' . $term_name . '</a>';
}

/**
 * post pagenation
 */
function pagination($pages = '', $range = 4)
{
	$showitems = ($range * 2) + 1;

	global $paged;
	if (empty($paged)) $paged = 1;

	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}

	if (1 != $pages) {
		echo "<div class=\"pagination\"><span>Page " . $paged . " / " . $pages . "</span>";
		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
		if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";
		for ($i = 1; $i <= $pages; $i++) {
			if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
				echo ($paged == $i) ? "<span class=\" current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href=\"" . get_pagenum_link($paged + 1) . " \">Next &rsaquo;</a>";
		if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
		echo "</div>\n";
	}
}
/** * post count */ function wp_get_productcat_postcount($cp)
{
	$args = array(
		'post_type' => $cp, //post type, I used 'product'
		'post_status' => 'publish', // just tried to find all published post
		'posts_per_page' => -1 //show all
	);

	$query = new WP_Query($args);

	return (int) $query->post_count;
}

function wp_get_productcat_postcount_term($cp, $taxonomy, $term)
{
	$args = array(
		'post_type' => $cp, //post type, I used 'product'
		'post_status' => 'publish', // just tried to find all published post
		'posts_per_page' => -1, //show all
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => $taxonomy, //taxonomy name here, I used 'product_cat'
				'field' => 'slug',
				'terms' => array($term)
			)
		)
	);

	$query = new WP_Query($args);
	return (int) $query->post_count;
}

/**
 * show thumnail
 */
function show_thumbnail($size = 'large')
{
	if (has_post_thumbnail()) {
		the_post_thumbnail($size);
	} else {
		echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/common/dummy.jpg">';
	}
}



/****************************************************************************************
 * add external link to post
 ****************************************************************************************/
function custom_meta_box_link($object)
{
	wp_nonce_field(basename(__FILE__), "meta-box-nonce_link");
?>
	<div class="meta-box">
		<div class="meta-box__item">
			<label for="meta-box-ttl">リンク</label>
			<p><small>リンク先URLを入力してください。</small></p>
			<input class="meta-box__fullwidth" name="meta-box-link" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-link", true); ?>">
			<p><small>固定ページにリンクする場合はコチラ</small></p>
			<select name="meta-box-link_page" id="pet-select">
				<option value="">ページへのリンク無し</option>
				<?php
				$pages = get_pages();
				foreach ($pages as $page) {
				?>
					<option value="<?php echo get_page_link($page->ID) ?>" class="header-link"><?php echo $page->post_title ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
<?php
}


function add_custom_meta_box_link()
{
	$screens = array('post');
	add_meta_box("demo-meta-box_link", "リンク先設定", "custom_meta_box_link", $screens, "normal", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box_link");


function save_custom_meta_box_link($post_id, $post, $update)
{
	if (!isset($_POST["meta-box-nonce_link"]) || !wp_verify_nonce($_POST["meta-box-nonce_link"], basename(__FILE__)))
		return $post_id;

	if (!current_user_can("edit_post", $post_id))
		return $post_id;

	if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
		return $post_id;

	// Check the user's permissions.
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

		if (!current_user_can('edit_page', $post_id)) {
			return;
		}
	} else {

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	$meta_box_link = "";
	$meta_box_link_page = "";

	if (isset($_POST["meta-box-link"])) {
		$meta_box_link = $_POST["meta-box-link"];
	}
	update_post_meta($post_id, "meta-box-link", $meta_box_link);

	if (isset($_POST["meta-box-link_page"])) {
		$meta_box_link_page = $_POST["meta-box-link_page"];
	}
	update_post_meta($post_id, "meta-box-link_page", $meta_box_link_page);
}

add_action("save_post", "save_custom_meta_box_link", 10, 3);



/****************************************************************************************
 * add title to post menu
 ****************************************************************************************/
function custom_meta_box_markup($object)
{
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
?>
	<div class="meta-box">
		<div class="meta-box__item">
			<label for="meta-box-ttl">ページタイトル</label>
			<p><small>メタタグに設定するタイトルを入力してください。</small></p>
			<input class="meta-box__fullwidth" name="meta-box-ttl" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-ttl", true); ?>">
		</div>
		<div class="meta-box__item">
			<label for="meta-box-des">ページディスクリプション</label>
			<p><small>メタタグに設定するディスクリプションを入力してください。</small></p>
			<textarea class="meta-box__fullwidth" name="meta-box-des" rows="4" cols="80"><?php echo get_post_meta($object->ID, "meta-box-des", true); ?></textarea>
		</div>
		<div class="meta-box__item">
			<label for="meta-box-noindex">noindex</label>
			<p><small>noindexのメタタグを挿入する場合チェックしてください。</small></p>
			<?php
			$checkbox_value = get_post_meta($object->ID, "meta-box-noindex", true);

			if ($checkbox_value == "") {
			?>
				<input class="meta-box__check" name="meta-box-noindex" type="checkbox" value="true">
			<?php
			} else if ($checkbox_value == "true") {
			?>
				<input class="meta-box__check" name="meta-box-noindex" type="checkbox" value="true" checked>
			<?php
			}
			?>
		</div>
	</div>
	<?php
}


function add_custom_meta_box()
{
	$screens = array('post', 'page', 'seminar', 'casestudy');
	add_meta_box("demo-meta-box", "ページメタタグ設定", "custom_meta_box_markup", $screens, "normal", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");


function save_custom_meta_box($post_id, $post, $update)
{
	if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
		return $post_id;

	if (!current_user_can("edit_post", $post_id))
		return $post_id;

	if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
		return $post_id;

	// Check the user's permissions.
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

		if (!current_user_can('edit_page', $post_id)) {
			return;
		}
	} else {

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	$meta_box_ttl = "";
	$meta_box_des = "";
	$meta_box_noindex = "";

	if (isset($_POST["meta-box-ttl"])) {
		$meta_box_ttl = $_POST["meta-box-ttl"];
	}
	update_post_meta($post_id, "meta-box-ttl", $meta_box_ttl);

	if (isset($_POST["meta-box-des"])) {
		$meta_box_des = $_POST["meta-box-des"];
	}
	update_post_meta($post_id, "meta-box-des", $meta_box_des);

	if (isset($_POST["meta-box-noindex"])) {
		$meta_box_noindex = $_POST["meta-box-noindex"];
	}
	update_post_meta($post_id, "meta-box-noindex", $meta_box_noindex);
}

add_action("save_post", "save_custom_meta_box", 10, 3);


/****************************************************************************************
 * remove unneccesary tag from wp head
 ****************************************************************************************/
remove_action('wp_head', '_wp_render_title_tag', 1);
remove_action('wp_head', 'title');
remove_action('wp_head', 'description');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');


/****************************************************************************************
 * add compnay info widget
 ****************************************************************************************/
class footer_company_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'footer_company_widget',

			// Widget name will appear in UI
			__('会社情報', 'footer_company_widget_domain'),

			// Widget description
			array('description' => __('Sample widget based on WPBeginner Tutorial', 'footer_company_widget_domain'),)
		);
	}

	// Creating widget front-end

	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if (!empty($title))
			echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output

		$content = '<dl><dt>' . esc_html__(get_theme_mod('company-name')) . '</dt>';
		$content .= '<dd>';
		$content .= '<p>' . esc_html__(get_theme_mod('company-name')) . '</p>';
		$content .= '<p>' . esc_html__(get_theme_mod('company-post-number')) . '</p>';
		$content .= '<p>' . esc_html__(get_theme_mod('company-place')) . '</p>';
		$content .= '<p>' . esc_html__(get_theme_mod('company-tel')) . '</p>';
		$content .= '<p>' . esc_html__(get_theme_mod('company-map')) . '</p>';
		$content .= '</dd></dl>';

		echo __($content, 'footer_company_widget_domain');
		echo $args['after_widget'];
	}

	// Widget Backend
	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('New title', 'footer_company_widget_domain');
		}
		// Widget admin form
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
	<?php
	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}

	// Class footer_company_widget ends here
}


// Register and load the widget
function wpb_load_widget()
{
	//register_widget('footer_company_widget');
}
//add_action('widgets_init', 'wpb_load_widget');

remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
	while (@ob_end_flush());
});



/****************************************************************************************
 * show latest News
 *
 * Arg :
 * $post_type -> post type
 * $tax -> tax name
 * $wrapper_class -> the dl class name
 * $number -> how many posts to show
 ****************************************************************************************/
function showNews($post_type = "post", $wrapper_class = "", $number = 3)
{
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => $number,
	);
	$query = new WP_Query($args);
	?>
	<dl <?php if (!empty($wrapper_class)) {
			echo "class='" . $wrapper_class . "'";
		} ?>>
		<?php
		if ($query->have_posts()) {

			while ($query->have_posts()) {
				$query->the_post();
				$is_with_link = false;
				$is_internal = false;
				$ex_link = esc_url(get_post_meta(get_the_ID(), "meta-box-link", true));
				$page_link =
					esc_url(get_post_meta(get_the_ID(), "meta-box-link_page", true));
				$is_internal = (empty($page_link)) ? false : true;
				$final_link = ($is_internal) ? $page_link : $ex_link;

				if (!empty($final_link)) {
					$is_with_link = true;
				}

				if (strpos($final_link, "ibaraki-yorozu")) {
					$is_internal = true;
				}
		?>
				<dt><?php the_time('Y.m.d'); ?></dt>
				<?php if ($is_with_link) : ?>
					<dd><a href="<?php echo $final_link; ?>" <?php if (!$is_internal) {
																	echo "target='__blank'";
																} ?>><?php the_title(); ?></a></dd>
				<?php else : ?>
					<dd><?php the_title(); ?></dd>
				<?php endif; ?>
		<?php
			}
		}
		wp_reset_postdata();
		?>
	</dl>
<?php
}


/****************************************************************************************
 * show seminar posts
 *
 * Arg :
 * $tax -> tax name
 * $number -> how many posts to show
 ****************************************************************************************/
function showSeminarPosts($tax = "", $number = 2)
{
	$args = array(
		'post_type' => "seminar",
		'posts_per_page' => $number,
		'tax_query' => array(
			array(
				'taxonomy' => 'tx01',
				'field'    => 'slug',
				'terms'    => $tax
			),
		),
	);
	$query = new WP_Query($args);
?>
	<div class="seminar__parent">
		<?php
		if ($query->have_posts()) {

			while ($query->have_posts()) {
				$query->the_post();
		?>
				<div class="seminar__child">
					<figure>
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail(); ?>
							<?php else : ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/dummy.jpg" alt="画像がありません">
							<?php endif; ?>
						</a>
					</figure>
					<!--<dl>
						<dt><?php the_time('Y.m.d'); ?></dt>
						<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
					</dl>-->
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				</div>
		<?php
			}
		}
		wp_reset_postdata();
		?>
	</div>
<?php
}



/****************************************************************************************
 * show casestudy categories list
 *
 * Arg :
 * $tax -> tax name
 * $number -> how many posts to show
 ****************************************************************************************/
function showCaseCat()
{
	$ret = '<ul class="case_list">';
	$args = array(
		'hide_empty' => false
	);
	$taxonomy = 'tx02';
	$terms = get_terms($taxonomy, $args); // Get all terms of a taxonomy

	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$ret .= '<li><a href="' . get_term_link($term->slug, $taxonomy) . '">' . $term->name . '</a></li>';
		}
	}
	$ret .= '</ul>';

	return $ret;
}

add_shortcode('show-case-cat', 'showCaseCat');


/****************************************************************************************
 * show coordinators
 *
 * Arg :
 * $tax -> tax name
 * $number -> how many posts to show
 ****************************************************************************************/
function showCoordinators()
{
	$ret = '<ul id="posts-body" class="coordinator-list">';
	$args = array(
		'post_type' => 'coordinator',
		'posts_per_page' => -1,
	);
	$query = new WP_Query($args);
	if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
			$ruby_last = esc_html__(get_field('ruby_last'));
			$ruby_first = esc_html__(get_field('ruby_first'));
			$name_last = esc_html__(get_field('name_last'));
			$name_first = esc_html__(get_field('name_first'));
			$title = nl2br(esc_html__(get_field('title')));
			$main_genre = esc_html__(get_field('main_genre'));
			$biography = esc_html__(get_field('biography'));
			$ret .= '<li class="coordinator-list__item">
					<p class="coordinator-list__title"><span>' . $title . '</span></p>
					<figure class="coordinator-list__image">' . get_the_post_thumbnail($query->ID) . '</figure>
					<h3 class="coordinator-list__name"><ruby>' . $name_last . '<rt>' . $ruby_last . '</rt></ruby> <ruby>' . $name_first . '<rt>' . $ruby_first . '</rt></ruby></h3>
					<dl class="coordinator-list__genre">
						<dt>
							■主な相談対応分野
						</dt>
						<dd>
							' . $main_genre . '
						</dd>
					</dl>
					<dl class="coordinator-list__biography">
						<dt>
							■経歴
						</dt>
						<dd>
							' . htmlspecialchars_decode($biography) . '
						</dd>
					</dl>
				</li>';
		endwhile;
	else :
		$ret .= '<li class="ta-c">現在投稿がありません。</li>';
	endif;
	$ret .= '</ul>';
	wp_reset_postdata();

	return $ret;
}

add_shortcode('show-coordinators', 'showCoordinators');


/****************************************************************************************
 * change custom post url to numbers
 ****************************************************************************************/
function seminar_post_type_link($link, $post)
{
	if ($post->post_type === 'seminar') {
		return home_url('/seminar/' . $post->ID);
	} else {
		return $link;
	}
}
add_filter('post_type_link', 'seminar_post_type_link', 1, 2);

function seminar_rewrite_rules_array($rules)
{
	$new_rewrite_rules = array(
		'seminar/([0-9]+)/?$' => 'index.php?post_type=seminar&p=$matches[1]',
	);
	return $new_rewrite_rules + $rules;
}
add_filter('rewrite_rules_array', 'seminar_rewrite_rules_array');

function casestudy_post_type_link($link, $post)
{
	if ($post->post_type === 'casestudy') {
		return home_url('/casestudy/' . $post->ID);
	} else {
		return $link;
	}
}
add_filter('post_type_link', 'casestudy_post_type_link', 1, 2);

function casestudy_rewrite_rules_array($rules)
{
	$new_rewrite_rules = array(
		'casestudy/([0-9]+)/?$' => 'index.php?post_type=casestudy&p=$matches[1]',
	);
	return $new_rewrite_rules + $rules;
}
add_filter('rewrite_rules_array', 'casestudy_rewrite_rules_array');



/****************************************************************************************
 * remove "archive" from category title
 ****************************************************************************************/
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});


/****************************************************************************************
 * remove dns prefetch
 ****************************************************************************************/
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
	if ('dns-prefetch' === $relation_type) {
		return array_diff(wp_dependencies_unique_hosts(), $hints);
	}
	return $hints;
}


/****************************************************************************************
 * whether event is_accepting
 *
 * Arg :
 * $is_accepting -> 募集中 of not
 ****************************************************************************************/
function get_accepting_part($is_accepting)
{
	$ret = "";
	switch ($is_accepting) {
		case "1":
			$ret = '<a class="accept_btn" href="' . home_url() . '/event-accepting?is_accepting=1">募集中</a>';
			break;
		case "2":
			$ret = '<a class="accept_anytime" href="' . home_url() . '/event-anytime?is_accepting=2">ご案内</a>';
			break;
		case "3":
			$ret = '<span class="accept_fined">募集終了</span>';
	}
	return $ret;
}


/****************************************************************************************
 * apply th block editor to Event
 ****************************************************************************************/

add_action('register_post_type_args', function ($args, $postType) {
	if ($postType !== 'event') {
		return $args;
	}

	//$args['show_in_rest'] = true;
	$args['rewrite'] = array(
		'slug' => 'event',
		'with_front' => true,
	);
	//$args['has_archive'] = true;
	//$args['show_ui'] = true;


	return $args;
}, 99, 2);


add_action('register_taxonomy_args', function ($args, $tx) {
	if ($tx !== 'event-category') {
		return $args;
	}
	//$args['show_in_rest'] = true;
	//$args['show_ui'] = true;
	//$args['hierarchical'] = true;
	//$args['show_in_menu'] = true;
	//$args['show_in_nav_menus'] = true;
	return $args;
}, 99, 2);

/****************************************************************************************
 * event mail customiser
 ****************************************************************************************/
function my_custom_customizer_panel($wp_customize)
{
	$wp_customize->add_panel('メールフォーム設定', array(
		'title'       => __('メールフォーム設定', 'textdomain'),
		'description' => __('This is a custom panel for organizing settings.', 'textdomain'),
		'priority'    => 10,
	));
}
add_action('customize_register', 'my_custom_customizer_panel');
// Add custom item to WordPress Customizer
function mytheme_customize_register_event_mail($wp_customize)
{
	// Add a new section
	$wp_customize->add_section('event_section', array(
		'title'      => __('イベントメール設定', 'mytheme'),
		'panel'    => 'メールフォーム設定', // Assign the section to the panel
		'priority'   => 30,
	));

	// Add a new setting
	$wp_customize->add_setting('event_mail_auto_reply', array(
		'default'    => '',
		'transport'  => 'refresh',
	));

	// Add a control to the setting
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'event_mail_auto_reply', array(
		'label'      => __('自動返信メール内容', 'mytheme'),
		'section'    => 'event_section',
		'settings'   => 'event_mail_auto_reply',
		'type' => 'textarea',
	)));
}
add_action('customize_register', 'mytheme_customize_register_event_mail');

// Add custom item to WordPress Customizer
function mytheme_customize_register_applying_form($wp_customize)
{
	// Add a new section
	$wp_customize->add_section('applying_form_section', array(
		'title'      => __('相談会フォーム設定', 'mytheme'),
		'panel'    => 'メールフォーム設定', // Assign the section to the panel
		'priority'   => 30,
	));

	// Add a new setting
	$wp_customize->add_setting('applying_form_section_auto_reply', array(
		'default'    => '',
		'transport'  => 'refresh',
	));

	// Add a control to the setting
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'applying_form_section_auto_reply', array(
		'label'      => __('自動返信メール内容', 'mytheme'),
		'section'    => 'applying_form_section',
		'settings'   => 'applying_form_section_auto_reply',
		'type' => 'textarea',
	)));
	// Add a new setting
	$wp_customize->add_setting('donwnload_csv_tsukuba', array(
		'default'    => '',
		'transport'  => 'refresh',
	));

	// Add a control to the setting
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'donwnload_csv_tsukuba', array(
		'label'      => __('相談会フォームCSVダウンロード', 'mytheme'),
		'section'    => 'applying_form_section',
		'settings'   => array(),
		'type' => 'button',
		'input_attrs' => array(
			'value' => "つくばサテライトCSVをダウンロード", // 
			'class' => 'button button-primary', // 
			'onclick' => 'window.open("' . home_url() . '/wp-content/themes/scratch-master/consulting-mail/mail.php?mode=download&city=tsukuba")',
		),
	)));
	// Add a new setting
	$wp_customize->add_setting('donwnload_csv_hitachinaka', array(
		'default'    => '',
		'transport'  => 'refresh',
	));

	// Add a control to the setting
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'donwnload_csv_hitachinaka', array(
		'label'      => __('', 'mytheme'),
		'section'    => 'applying_form_section',
		'settings'   => array(),
		'type' => 'button',
		'input_attrs' => array(
			'value' => "ひたちなかサテライトCSVをダウンロード", // 
			'class' => 'button button-primary', // 
			'onclick' => 'window.open("' . home_url() . '/wp-content/themes/scratch-master/consulting-mail/mail.php?mode=download&city=hitachinaka")',
		),
	)));
	// Add a new setting
	$wp_customize->add_setting('donwnload_csv_hitachi', array(
		'default'    => '',
		'transport'  => 'refresh',
	));

	// Add a control to the setting
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'donwnload_csv_hitachi', array(
		'label'      => __('', 'mytheme'),
		'section'    => 'applying_form_section',
		'settings'   => array(),
		'type' => 'button',
		'input_attrs' => array(
			'value' => "日立サテライトCSVをダウンロード", // 
			'class' => 'button button-primary', // 
			'onclick' => 'window.open("' . home_url() . '/wp-content/themes/scratch-master/consulting-mail/mail.php?mode=download&city=hitachi")',
		),
	)));
}
add_action('customize_register', 'mytheme_customize_register_applying_form');

// Add custom item to WordPress Customizer
function mytheme_customize_register_contact_form($wp_customize)
{
	// Add a new section
	$wp_customize->add_section('contact_form_section', array(
		'title'      => __('お問い合わせフォーム設定', 'mytheme'),
		'panel'    => 'メールフォーム設定', // Assign the section to the panel
		'priority'   => 30,
	));
	// Add a new setting
	$wp_customize->add_setting('contact_form_section_auto_reply', array(
		'default'    => '',
		'transport'  => 'refresh',
	));
	// Add a control to the setting
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_form_section_auto_reply', array(
		'label'      => __('自動返信メール内容', 'mytheme'),
		'section'    => 'contact_form_section',
		'settings'   => 'contact_form_section_auto_reply',
		'type' => 'textarea',
	)));
	// Add a new setting
	$wp_customize->add_setting('donwnload_csv_contact', array(
		'default'    => '',
		'transport'  => 'refresh',
	));
	// Add a control to the setting
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'donwnload_csv_contact', array(
		'label'      => __('お問い合わせCSVダウンロード', 'mytheme'),
		'section'    => 'contact_form_section',
		'settings'   => array(),
		'type' => 'button',
		'input_attrs' => array(
			'value' => "お問い合わせCSVをダウンロード", // 
			'class' => 'button button-primary', // 
			'onclick' => 'window.open("' . home_url() . '/wp-content/themes/scratch-master/contact-mail/mail.php?mode=download")',
		),
	)));
}
add_action('customize_register', 'mytheme_customize_register_contact_form');

//
//
function getPossibleDates($city)
{
	$ret = "";

	switch ($city) {
		case "tsukuba":
			$ret .= '
<option value="令和６年４月１８日（木）  １３：００～１４：３０">令和６年４月１８日（木）  １３：００～１４：３０</option>
<option value="令和６年４月１８日（木）  １４：３０～１６：００">令和６年４月１８日（木）  １４：３０～１６：００</option>
<option value="令和６年５月１６日（木）  １３：００～１４：３０">令和６年５月１６日（木）  １３：００～１４：３０</option>
<option value="令和６年５月１６日（木）  １４：３０～１６：００">令和６年５月１６日（木）  １４：３０～１６：００</option>
<option value="令和６年６月２０日（木）  １３：００～１４：３０">令和６年６月２０日（木）  １３：００～１４：３０</option>
<option value="令和６年６月２０日（木）  １４：３０～１６：００">令和６年６月２０日（木）  １４：３０～１６：００</option>
<option value="令和６年７月１８日（木）  １３：００～１４：３０">令和６年７月１８日（木）  １３：００～１４：３０</option>
<option value="令和６年７月１８日（木）  １４：３０～１６：００">令和６年７月１８日（木）  １４：３０～１６：００</option>
<option value="令和６年８月２２日（木）  １３：００～１４：３０">令和６年８月２２日（木）  １３：００～１４：３０</option>
<option value="令和６年８月２２日（木）  １４：３０～１６：００">令和６年８月２２日（木）  １４：３０～１６：００</option>
<option value="令和６年９月１９日（木）  １３：００～１４：３０">令和６年９月１９日（木）  １３：００～１４：３０</option>
<option value="令和６年９月１９日（木）  １４：３０～１６：００">令和６年９月１９日（木）  １４：３０～１６：００</option>
<option value="令和６年１０月１７日（木）  １３：００～１４：３０">令和６年１０月１７日（木）  １３：００～１４：３０</option>
<option value="令和６年１０月１７日（木）  １４：３０～１６：００">令和６年１０月１７日（木）  １４：３０～１６：００</option>
<option value="令和６年１１月２１日（木）  １３：００～１４：３０">令和６年１１月２１日（木）  １３：００～１４：３０</option>
<option value="令和６年１１月２１日（木）  １４：３０～１６：００">令和６年１１月２１日（木）  １４：３０～１６：００</option>
<option value="令和６年１２月１９日（木）  １３：００～１４：３０">令和６年１２月１９日（木）  １３：００～１４：３０</option>
<option value="令和６年１２月１９日（木）  １４：３０～１６：００">令和６年１２月１９日（木）  １４：３０～１６：００</option>
<option value="令和７年１月２３日（木）  １３：００～１４：３０">令和７年１月２３日（木）  １３：００～１４：３０</option>
<option value="令和７年１月２３日（木）  １４：３０～１６：００">令和７年１月２３日（木）  １４：３０～１６：００</option>
<option value="令和７年２月２０日（木）  １３：００～１４：３０">令和７年２月２０日（木）  １３：００～１４：３０</option>
<option value="令和７年２月２０日（木）  １４：３０～１６：００">令和７年２月２０日（木）  １４：３０～１６：００</option>
<option value="令和７年３月１３日（木）  １３：００～１４：３０">令和７年３月１３日（木）  １３：００～１４：３０</option>
<option value="令和７年３月１３日（木）  １４：３０～１６：００">令和７年３月１３日（木）  １４：３０～１６：００</option>';
			break;
		case "hitachinaka":
			$ret .= '
<option value="令和６年４月１０日（水） １４：００～１５：３０">令和６年４月１０日（水） １４：００～１５：３０</option>
<option value="令和６年４月１０日（水） １５：３０～１７：００">令和６年４月１０日（水） １５：３０～１７：００</option>
<option value="令和６年５月１５日（水） １４：００～１５：３０">令和６年５月１５日（水） １４：００～１５：３０</option>
<option value="令和６年５月１５日（水） １５：３０～１７：００">令和６年５月１５日（水） １５：３０～１７：００</option>
<option value="令和６年６月１９日（水） １４：００～１５：３０">令和６年６月１９日（水） １４：００～１５：３０</option>
<option value="令和６年６月１９日（水） １５：３０～１７：００">令和６年６月１９日（水） １５：３０～１７：００</option>
<option value="令和６年７月１７日（水） １４：００～１５：３０">令和６年７月１７日（水） １４：００～１５：３０</option>
<option value="令和６年７月１７日（水） １５：３０～１７：００">令和６年７月１７日（水） １５：３０～１７：００</option>
<option value="令和６年８月２１日（水） １４：００～１５：３０">令和６年８月２１日（水） １４：００～１５：３０</option>
<option value="令和６年８月２１日（水） １５：３０～１７：００">令和６年８月２１日（水） １５：３０～１７：００</option>
<option value="令和６年９月１８日（水） １４：００～１５：３０">令和６年９月１８日（水） １４：００～１５：３０</option>
<option value="令和６年９月１８日（水） １５：３０～１７：００">令和６年９月１８日（水） １５：３０～１７：００</option>
<option value="令和６年１０月１６日（水）１４：００～１５：３０">令和６年１０月１６日（水）１４：００～１５：３０</option>
<option value="令和６年１０月１６日（水）１５：３０～１７：００">令和６年１０月１６日（水）１５：３０～１７：００</option>
<option value="令和６年１１月２０日（水）１４：００～１５：３０">令和６年１１月２０日（水）１４：００～１５：３０</option>
<option value="令和６年１１月２０日（水）１５：３０～１７：００">令和６年１１月２０日（水）１５：３０～１７：００</option>
<option value="令和６年１２月１８日（水）１４：００～１５：３０">令和６年１２月１８日（水）１４：００～１５：３０</option>
<option value="令和６年１２月１８日（水）１５：３０～１７：００">令和６年１２月１８日（水）１５：３０～１７：００</option>
<option value="令和７年１月２２日（水）１４：００～１５：３０">令和７年１月２２日（水）１４：００～１５：３０</option>
<option value="令和７年１月２２日（水）１５：３０～１７：００">令和７年１月２２日（水）１５：３０～１７：００</option>
<option value="令和７年２月１９日（水） １４：００～１５：３０">令和７年２月１９日（水） １４：００～１５：３０</option>
<option value="令和７年２月１９日（水） １５：３０～１７：００">令和７年２月１９日（水） １５：３０～１７：００</option>
<option value="令和７年３月１９日（水） １４：００～１５：３０">令和７年３月１９日（水） １４：００～１５：３０</option>
<option value="令和７年３月１９日（水） １５：３０～１７：００">令和７年３月１９日（水） １５：３０～１７：００</option>';
			break;
		case "hitachi":
			$ret .= '
<option value="令和６年４月１６日（火） １３：００～１４：３０">令和６年４月１６日（火） １３：００～１４：３０</option>
<option value="令和６年４月１６日（火） １４：３０～１６：００">令和６年４月１６日（火） １４：３０～１６：００</option>
<option value="令和６年５月１４日（火） １３：００～１４：３０">令和６年５月１４日（火） １３：００～１４：３０</option>
<option value="令和６年５月１４日（火） １４：３０～１６：００">令和６年５月１４日（火） １４：３０～１６：００</option>
<option value="令和６年６月１８日（火） １３：００～１４：３０">令和６年６月１８日（火） １３：００～１４：３０</option>
<option value="令和６年６月１８日（火） １４：３０～１６：００">令和６年６月１８日（火） １４：３０～１６：００</option>
<option value="令和６年７月１６日（火） １３：００～１４：３０">令和６年７月１６日（火） １３：００～１４：３０</option>
<option value="令和６年７月１６日（火） １４：３０～１６：００">令和６年７月１６日（火） １４：３０～１６：００</option>
<option value="令和６年８月２０日（火） １３：００～１４：３０">令和６年８月２０日（火） １３：００～１４：３０</option>
<option value="令和６年８月２０日（火） １４：３０～１６：００">令和６年８月２０日（火） １４：３０～１６：００</option>
<option value="令和６年９月１７日（火） １３：００～１４：３０">令和６年９月１７日（火） １３：００～１４：３０</option>
<option value="令和６年９月１７日（火） １４：３０～１６：００">令和６年９月１７日（火） １４：３０～１６：００</option>
<option value="令和６年１０月１５日（火） １３：００～１４：３０">令和６年１０月１５日（火） １３：００～１４：３０</option>
<option value="令和６年１０月１５日（火） １４：３０～１６：００">令和６年１０月１５日（火） １４：３０～１６：００</option>
<option value="令和６年１１月１９日（火） １３：００～１４：３０">令和６年１１月１９日（火） １３：００～１４：３０</option>
<option value="令和６年１１月１９日（火） １４：３０～１６：００">令和６年１１月１９日（火） １４：３０～１６：００</option>
<option value="令和６年１２月１７日（火） １３：００～１４：３０">令和６年１２月１７日（火） １３：００～１４：３０</option>
<option value="令和６年１２月１７日（火） １４：３０～１６：００">令和６年１２月１７日（火） １４：３０～１６：００</option>
<option value="令和７年１月２１日（火） １３：００～１４：３０">令和７年１月２１日（火） １３：００～１４：３０</option>
<option value="令和７年１月２１日（火） １４：３０～１６：００">令和７年１月２１日（火） １４：３０～１６：００</option>
<option value="令和７年２月１８日（火） １３：００～１４：３０">令和７年２月１８日（火） １３：００～１４：３０</option>
<option value="令和７年２月１８日（火） １４：３０～１６：００">令和７年２月１８日（火） １４：３０～１６：００</option>
<option value="令和７年３月１８日（火） １３：００～１４：３０">令和７年３月１８日（火） １３：００～１４：３０</option>
<option value="令和７年３月１８日（火） １４：３０～１６：００">令和７年３月１８日（火） １４：３０～１６：００</option>
';
	}
	return $ret;
}
//
//
function getConsultingType()
{
	$ret = "";
	$ret .= '
	<option value="経営・技術・販路">経営・技術・販路</option>
	<option value="知的財産">知的財産</option>
	<option value="海外展開">海外展開</option>
	';
	return $ret;
}
/**
 * Adds "Import" button on module list page
 */
// テストの列を追加
function online_manage_columns($columns)
{
	$columns['csv_download'] = 'CSVダウンロード';
	return $columns;
}

// 投稿IDを表示
function online_manage_custom_column_2args($column_name, $post_id)
{
	// if post_type is event
	if ('event' == get_post_type($post_id)) {
		if ('csv_download' == $column_name)
			//if file exists, show download link
			if (file_exists(get_template_directory() . '/event-mail/data/data' . $post_id . '.csv')) {
				echo '<a href="' . home_url() . '/wp-content/themes/scratch-master/event-mail/mail.php?mode=download&event_id=' . $post_id . '" class="button button-primary" target="_blank">CSVダウンロード</a>';
			} else {
				echo 'CSVがありません';
			}
	}
}

add_filter('manage_posts_columns', 'online_manage_columns');
add_action('manage_posts_custom_column', 'online_manage_custom_column_2args', 10, 2);
