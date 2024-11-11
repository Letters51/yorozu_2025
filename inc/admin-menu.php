<?php

/**
 * 
 * @package scratch
 */


/****
 * admin menus - advanced settings
 */
final class AddOtherDetail
{
    public $le_page_ga = array();
    public $le_page_slug;
    function __construct($arg, $slug)
    {
        $arg['callback'] = array($this, 'le_page_ga_callback');
        $this->le_page_ga = $arg;
        $this->le_page_slug = $slug;
    }
    public function register()
    {
        add_action('admin_menu', array($this, 'le_add_menu_page'));
    }
    public function le_add_menu_page()
    {
        add_menu_page($this->le_page_ga['page_title'], $this->le_page_ga['menu_title'], $this->le_page_ga['capability'], $this->le_page_ga['menu_slug'], $this->le_page_ga['callback'], $this->le_page_ga['icon_url'], $this->le_page_ga['position']);
    }
    public function le_page_ga_callback()
    {
        return require_once(get_template_directory() . '/admin/page-templates/admin-' . $this->le_page_slug . '.php');
    }
}


/** lay カスタム投稿設定 **/
$arg_custom_post =
    [
        'page_title' => 'cp',
        'menu_title' => 'カスタム投稿設定',
        'capability' => 'manage_options',
        'menu_slug' => 'custom_post',
        'icon_url' => 'dashicons-admin-tools',
        'position' => 15
    ];
$add_custom_post = new AddOtherDetail($arg_custom_post, $arg_custom_post['menu_slug']);
$add_custom_post->register();


/* add fields */
final class AddFileds
{
    public $settings = array();
    public $sections = array();
    public $fields = array();

    function __construct($args_set, $args_sec, $args_fie)
    {
        for ($i = 0; sizeof($args_set) > $i; $i++) {
            $args_set[$i]['callback'] = array($this, 'inputSanitize');
        }
        $this->settings = $args_set;

        for ($i = 0; sizeof($args_sec) > $i; $i++) {
            $args_sec[$i]['callback'] = array($this, 'leAdminSection');
        }
        $this->sections = $args_sec;

        for ($i = 0; sizeof($args_fie) > $i; $i++) {
            $args_fie[$i]['callback'] = array($this, 'show_field');
        }
        $this->fields = $args_fie;
    }

    public function register()
    {
        add_action('admin_init', array($this, 'registerCustomFields'));
    }

    public function inputSanitize($input)
    {
        return htmlspecialchars($input, ENT_QUOTES);
    }

    public function leAdminSection()
    {
        echo "挿入タグを入力してください。";
    }

    public function show_field($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $value = esc_html(get_option($name));
        echo '<textarea rows="5" cols="100" id="' . $name . '" class="' . $classes . '" name="' . $name . '" placeholder="テキストを入力してください。">' . $value . '</textarea>';
    }

    public function registerCustomFields()
    {
        //register setting
        foreach ($this->settings as $setting) {
            register_setting($setting["option_group"], $setting["option_name"], (isset($setting["callback"]) ? $setting["callback"] : ''));
        }

        //add settings section
        foreach ($this->sections as $section) {
            add_settings_section($section["id"], $section["title"], (isset($section["callback"]) ? $section["callback"] : ''), $section["page"]);
        }

        //add settings field
        foreach ($this->fields as $field) {
            add_settings_field($field["id"], $field["title"], (isset($field["callback"]) ? $field["callback"] : ''), $field["page"], $field["section"], (isset($field["args"]) ? $field["args"] : ''));
        }
    }
}

/** form for 高度な設定 **/
$other_detail_set =
    [
        [
            'option_group' => 'ga_settings',
            'option_name' => 'ga_manager',
        ],
        [
            'option_group' => 'ga_settings',
            'option_name' => 'inhead_manager',
        ],
        [
            'option_group' => 'ga_settings',
            'option_name' => 'afterbody_manager',
        ],
        [
            'option_group' => 'ga_settings',
            'option_name' => 'beforebody_manager',
        ]
    ];

$other_detail_sec =
    [
        [
            'id' => 'ga_sections',
            'title' => '設定01',
            'page' => 'other_detail'
        ]
    ];

$other_detail_fie =
    [
        [
            'id' => 'ga_manager',
            'title' => 'GAタグ',
            'page' => 'other_detail',
            'section' => 'ga_sections',
            'args' => array(
                'label_for' => 'ga_manager',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'inhead_manager',
            'title' => 'headの間のタグ（headタグ閉じる直前）',
            'page' => 'other_detail',
            'section' => 'ga_sections',
            'args' => array(
                'label_for' => 'inhead_manager',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'afterbody_manager',
            'title' => 'body直下のタグ',
            'page' => 'other_detail',
            'section' => 'ga_sections',
            'args' => array(
                'label_for' => 'afterbody_manager',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'beforebody_manager',
            'title' => 'body閉じる前のタグ',
            'page' => 'other_detail',
            'section' => 'ga_sections',
            'args' => array(
                'label_for' => 'beforebody_manager',
                'class' => 'ui-toggle'
            ),
        ]
    ];


$os_add_field = new AddFileds($other_detail_set, $other_detail_sec, $other_detail_fie);
$os_add_field->register();


/** form for カスタム投稿01 **/
$seminar_set =
    [
        [
            'option_group' => 'seminar_settings',
            'option_name' => 'seminar_label',
        ],
        [
            'option_group' => 'seminar_settings',
            'option_name' => 'seminar_description',
        ],
        [
            'option_group' => 'seminar_settings',
            'option_name' => 'seminar_taxonomy',
        ]
    ];

$seminar_sec =
    [
        [
            'id' => 'seminar_sections',
            'title' => 'カスタム投稿01',
            'page' => 'custom_post01'
        ]
    ];

$seminar_fie =
    [
        [
            'id' => 'seminar_label',
            'title' => 'カスタム投稿名',
            'page' => 'custom_post01',
            'section' => 'seminar_sections',
            'args' => array(
                'label_for' => 'seminar_label',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'seminar_description',
            'title' => 'ディスクリプション',
            'page' => 'custom_post01',
            'section' => 'seminar_sections',
            'args' => array(
                'label_for' => 'seminar_description',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'seminar_taxonomy',
            'title' => 'タクソノミー名',
            'page' => 'custom_post01',
            'section' => 'seminar_sections',
            'args' => array(
                'label_for' => 'seminar_taxonomy',
                'class' => 'ui-toggle'
            ),
        ]

    ];
$cp1_add_field = new AddFileds($seminar_set, $seminar_sec, $seminar_fie);
$cp1_add_field->register();

$casestudy_set =
    [
        [
            'option_group' => 'casestudy_settings',
            'option_name' => 'casestudy_label',
        ],
        [
            'option_group' => 'casestudy_settings',
            'option_name' => 'casestudy_description',
        ],
        [
            'option_group' => 'casestudy_settings',
            'option_name' => 'casestudy_taxonomy',
        ]
    ];

$casestudy_sec =
    [
        [
            'id' => 'casestudy_sections',
            'title' => 'カスタム投稿02',
            'page' => 'custom_post02'
        ]
    ];

$casestudy_fie =
    [
        [
            'id' => 'casestudy_label',
            'title' => 'カスタム投稿名',
            'page' => 'custom_post02',
            'section' => 'casestudy_sections',
            'args' => array(
                'label_for' => 'casestudy_label',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'casestudy_description',
            'title' => 'ディスクリプション',
            'page' => 'custom_post02',
            'section' => 'casestudy_sections',
            'args' => array(
                'label_for' => 'casestudy_description',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'casestudy_taxonomy',
            'title' => 'タクソノミー名',
            'page' => 'custom_post02',
            'section' => 'casestudy_sections',
            'args' => array(
                'label_for' => 'casestudy_taxonomy',
                'class' => 'ui-toggle'
            ),
        ]
    ];
$cp2_add_field = new AddFileds($casestudy_set, $casestudy_sec, $casestudy_fie);
$cp2_add_field->register();


$coordinator_set =
    [
        [
            'option_group' => 'coordinator_settings',
            'option_name' => 'coordinator_label',
        ],
        [
            'option_group' => 'coordinator_settings',
            'option_name' => 'coordinator_description',
        ],
        [
            'option_group' => 'coordinator_settings',
            'option_name' => 'coordinator_taxonomy',
        ]
    ];

$coordinator_sec =
    [
        [
            'id' => 'coordinator_sections',
            'title' => 'カスタム投稿03',
            'page' => 'custom_post03'
        ]
    ];

$coordinator_fie =
    [
        [
            'id' => 'coordinator_label',
            'title' => 'カスタム投稿名',
            'page' => 'custom_post03',
            'section' => 'coordinator_sections',
            'args' => array(
                'label_for' => 'coordinator_label',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'coordinator_description',
            'title' => 'ディスクリプション',
            'page' => 'custom_post03',
            'section' => 'coordinator_sections',
            'args' => array(
                'label_for' => 'coordinator_description',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'coordinator_taxonomy',
            'title' => 'タクソノミー名',
            'page' => 'custom_post03',
            'section' => 'coordinator_sections',
            'args' => array(
                'label_for' => 'coordinator_taxonomy',
                'class' => 'ui-toggle'
            ),
        ]
    ];
$cp3_add_field = new AddFileds($coordinator_set, $coordinator_sec, $coordinator_fie);
$cp3_add_field->register();


/** form for SNS設定 **/
$sns_detail_set =
    [
        [
            'option_group' => 'sns_settings',
            'option_name' => 'sns_facebook_icon',
        ],
        [
            'option_group' => 'sns_settings',
            'option_name' => 'sns_facebook_link',
        ],
        [
            'option_group' => 'sns_settings',
            'option_name' => 'sns_twitter_icon',
        ],
        [
            'option_group' => 'sns_settings',
            'option_name' => 'sns_twitter_link',
        ],
    ];

$sns_detail_sec =
    [
        [
            'id' => 'sns_sections',
            'title' => 'SNS設定',
            'page' => 'sns_detail'
        ]
    ];

$sns_detail_fie =
    [
        [
            'id' => 'sns_facebook_icon',
            'title' => 'facebookアイコン',
            'page' => 'sns_detail',
            'section' => 'sns_sections',
            'args' => array(
                'label_for' => 'sns_facebook_icon',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'sns_facebook_link',
            'title' => 'facebookリンク',
            'page' => 'sns_detail',
            'section' => 'sns_sections',
            'args' => array(
                'label_for' => 'sns_facebook_link',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'sns_twitter_icon',
            'title' => 'Twitterアイコン',
            'page' => 'sns_detail',
            'section' => 'sns_sections',
            'args' => array(
                'label_for' => 'sns_twitter_icon',
                'class' => 'ui-toggle'
            ),
        ],
        [
            'id' => 'sns_twitter_link',
            'title' => 'Twitterリンク',
            'page' => 'sns_detail',
            'section' => 'sns_sections',
            'args' => array(
                'label_for' => 'sns_twitter_link',
                'class' => 'ui-toggle'
            ),
        ]
    ];


$sns_add_field = new AddFileds($sns_detail_set, $sns_detail_sec, $sns_detail_fie);
$sns_add_field->register();




/****
 * show thumnails in the post lists
 */
final class AddThumnailinThelist
{
    public function register()
    {
        add_filter('manage_posts_columns', array($this, 'customize_manage_posts_columns'));
        add_action('manage_posts_custom_column', array($this, 'customize_manage_posts_custom_column'), 10, 2);
    }
    //add column
    function customize_manage_posts_columns($columns)
    {
        $columns['thumbnail'] = __('Thumbnail');
        return $columns;
    }


    //display thumnail
    function customize_manage_posts_custom_column($column_name, $post_id)
    {
        if ('thumbnail' == $column_name) {
            $thum = get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:auto;'));
        }
        if (isset($thum) && $thum) {
            echo $thum;
        } else {
            //echo __('None');
        }
    }
}

$add_field = new AddThumnailinThelist();
$add_field->register();

/**
 * Adds "Import" button on module list page
 */
// csv download column
//function online_manage_columns($columns)
//{
//    if ('event' == get_post_type()) {
//        $columns['csv_download'] = 'CSVダウンロード';
//    }
//    return $columns;
//}
//
//// show post id
//function online_manage_custom_column_2args($column_name, $post_id)
//{
//	// if post_type is event
//	if ('event' == get_post_type($post_id)) {
//		if ('csv_download' == $column_name)
//			//if file exists, show download link
//			if (file_exists(get_template_directory() . '/event-mail/data/data' . $post_id . '.csv')) {
//				echo '<a href="' . home_url() . '/wp-content/themes/scratch-master/event-mail/mail.php?mode=download&event_id=' . $post_id . '" class="button button-primary" target="_blank">CSVダウンロード</a>';
//			} else {
//				echo 'CSVがありません';
//			}
//	}
//}
//
//add_filter('manage_posts_columns', 'online_manage_columns');
//add_action('manage_posts_custom_column', 'online_manage_custom_column_2args', 10, 2);