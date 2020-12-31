<?php
/**
 * Plugin Name: SAEON People Listing
 * Description: Use a shortcode to display persons
 * Author: Taryn from SAEON
 * Author URI: https://wordpress.org/plugins/saeon/
 * Plugin URI: https://wordpress.org/plugins/saeon-people-listing/
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: saeon-featured-news
 */



// security to prevent direct access of php files
if( ! defined( 'ABSPATH' )){
    exit;
}

function create_people_cpt(){
    $labels = array(
        'name' => __('People', 'Post Type General Name', 'people'),
        'singular_name' => __('Person', 'Post Type Singular Name', 'people'),
        'menu_name' => __('People', 'people'),
        'name_admin_bar' => __('People', 'people'),
        'archives' => __('Person archives', 'people'),
        'attributes' => __('Person attributes', 'people'),
        'parent_item_colon' => __('Parent person', 'people'),
        'all_items' => __('All people', 'people'),
        'add_new_item' => __('Add new person', 'people'),
        'add_new' => __('Add new', 'people'),
        'new_item' => __('New person', 'people'),
        'edit_item' => __('Edit person', 'people'),
        'update_item' => __('Update person', 'people'),
        'view_item' => __('View person', 'people'),
        'view_items' => __('View people', 'people'),
        'search_item' => __('Search people', 'people'),
        'not_found' => __('Not Found', 'people'),
        'not_found_in_trash' => __('Not Found in Trash', 'people'),
        'featured_image' => __('Featured Image', 'people'),
        'set_featured_image' => __('Set Featured Image', 'people'),
        'remove_featured_image' => __('Remove Featured Image', 'people'),
        'use_featurde_image' => __('Use as Featured Image', 'people'),
        'insert_into_item' => __('Insert into people', 'people'),
        'uploaded_to_this_item' => __('Uploaded to this person', 'people'),
        'items_list' => __('Person list', 'people'),
        'items_list_navigation' => __('Person list navigation', 'people'),
        'filter_items_list' => __('Filter person list', 'people')
    );

    $args = array(
        'label' => __('people', 'people'),
        'description' => __('Custom post type for people', 'people'),
        'labels' => $labels,
        'menu_icon' => plugins_url('saeon-people-listing/img/admin-icon.png'),
        'supports' => array('title','editor','thumbnail','revisions', 'author'),
        //'taxonomies' => array('category','post_tag'),
       // 'taxonomies' => array('category','People categories'),
        //'taxonomies'          => 'test',
        //'taxonomies'          => array('people', 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'public' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'people')
    );
    register_post_type('people', $args);
}
add_action('init','create_people_cpt',0);

function rewrite_people_flush(){
    create_people_cpt();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__,'rewrite_people_flush');

function people_custom_taxonomies(){
    $labels = array(
        'name' => _x('People categories', 'Taxonomy General Name', 'test'),
        'singular_name' => _x('People category', 'Taxonomy Singular Name', 'test'),
        'menu_name' => __('People categories', 'test')
    );

    $args = array(
        'label' => __('test', 'test'),
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'test')
    );
    register_taxonomy('test', 'people', $args);
}
add_action('init','people_custom_taxonomies',0);
 ?>