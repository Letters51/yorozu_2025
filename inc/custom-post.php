<?php

/**
 *
 * @package scratch
 */

/**
 * add custom post types
 */
if (!function_exists('create_post_type')) {
    function create_post_type()
    {
        $seminar_label = esc_html(get_option('seminar_label'));
        $casestudy_label = esc_html(get_option('casestudy_label'));
        $coordinator_label = esc_html(get_option('coordinator_label'));
        $seminar_description = esc_html(get_option('seminar_description'));
        $casestudy_description = esc_html(get_option('casestudy_description'));
        $coordinator_description = esc_html(get_option('coordinator_description'));

        /*register_post_type(
            'seminar',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __($seminar_label),
                    'singular_name' => __($seminar_label)
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => ['slug' => 'seminar', 'with_front' => true,],
                'show_ui' => true,
                'show_in_rest' => true,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
                'description' => _($seminar_description),

            )
        );*/

        register_post_type(
            'casestudy',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __($casestudy_label),
                    'singular_name' => __($casestudy_label)
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => ['slug' => 'casestudy', 'with_front' => true,],
                'show_in_rest' => true,
                'menu_position' => 5,
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
                'show_ui' => true,
                'description' => _($casestudy_description),

            )
        );
        register_post_type(
            'coordinator',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __($coordinator_label),
                    'singular_name' => __($coordinator_label)
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'coordinator'),
                'show_in_rest' => true,
                'menu_position' => 6,
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
                'show_ui' => true,
                'description' => _($coordinator_description)
            )
        );
    }
}
// Hooking up our function to theme setup
add_action('init', 'create_post_type');
/* Custom Post Type End */


//if (!function_exists('cptui_register_my_taxes_tx01')) {
//    function cptui_register_my_taxes_tx01()
//    {
//
//        /**
//         * Taxonomy: 分類.
//         */
//        $seminar_taxonomy = esc_html(get_option('seminar_taxonomy'));
//
//        $labels = [
//            "name" =>  _x($seminar_taxonomy, "scratch"),
//            "singular_name" =>  _x($seminar_taxonomy, "scratch"),
//        ];
//
//        $args = [
//
//            "labels" => $labels,
//            "public" => true,
//            "publicly_queryable" => true,
//            "hierarchical" => true,
//            "show_ui" => true,
//            "show_in_menu" => true,
//            "show_in_nav_menus" => true,
//            "query_var" => true,
//            "rewrite" => ['slug' => 'tx01', 'with_front' => true,],
//            "show_admin_column" => true,
//            "show_in_rest" => true,
//            "rest_base" => "tx01",
//            "rest_controller_class" => "WP_REST_Terms_Controller",
//            "show_in_quick_edit" => true,
//        ];
//        register_taxonomy("tx01", ["seminar"], $args);
//    }
//}
//add_action('init', 'cptui_register_my_taxes_tx01');

if (!function_exists('cptui_register_my_taxes_tx02')) {
    function cptui_register_my_taxes_tx02()
    {

        /**
         * Taxonomy: 種類.
         */
        $casestudy_taxonomy = esc_html(get_option('casestudy_taxonomy'));

        $labels = [
            "name" => _x($casestudy_taxonomy, "scratch"),
            "singular_name" =>  _x($casestudy_taxonomy, "scratch"),
        ];

        $args = [
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => ['slug' => 'tx02', 'with_front' => true,],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "rest_base" => "tx02",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => true,
        ];
        register_taxonomy("tx02", ["casestudy"], $args);
    }
}
add_action('init', 'cptui_register_my_taxes_tx02');

if (!function_exists('cptui_register_my_taxes_tx03')) {
    function cptui_register_my_taxes_tx03()
    {

        /**
         * Taxonomy: 種類.
         */
        $coordinator_taxonomy = esc_html(get_option('coordinator_taxonomy'));

        $labels = [
            "name" => __($coordinator_taxonomy, "scratch"),
            "singular_name" => __($coordinator_taxonomy, "scratch"),

        ];

        $args = [
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => ['slug' => 'tx03', 'with_front' => true,],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "rest_base" => "tx03",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
        ];
        register_taxonomy("tx03", ["coordinator"], $args);
    }
}
add_action('init', 'cptui_register_my_taxes_tx03');



//create two taxonomies, genres and tags for the post type "tag"
//function create_tag_taxonomies_tag01()
//{
//    $labels = array(
//        'name' => _x('Tags', 'taxonomy general name'),
//        'singular_name' => _x('Tag', 'taxonomy singular name'),
//    );
//
//    register_taxonomy('tag01', ["seminar"], array(
//        'labels' => $labels,
//        "public" => true,
//        "publicly_queryable" => true,
//        "hierarchical" => true,
//        "show_ui" => true,
//        "show_in_menu" => true,
//        "show_in_nav_menus" => true,
//        "query_var" => true,
//        "rewrite" => ['slug' => 'tag01', 'with_front' => true,],
//        "show_admin_column" => true,
//        "show_in_rest" => true,
//        "rest_base" => "tag01",
//        "rest_controller_class" => "WP_REST_Terms_Controller",
//        "show_in_quick_edit" => true,
//
//    ));
//}
//add_action('init', 'create_tag_taxonomies_tag01');


//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies_tag02()
{
    $labels = array(
        'name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),

    );

    register_taxonomy('tag02', ["casestudy"], array(
        'labels' => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'tag02', 'with_front' => true,],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "tag02",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    ));
}
add_action('init', 'create_tag_taxonomies_tag02');
