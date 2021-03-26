<?php

/**
 * Custom post types
 */

function nirzarpateltheme_init()
{
    $labels = array(
        'name'                  => _x('Histories', 'Post type general name', 'nirzarpateltheme'),
        'singular_name'         => _x('History', 'Post type singular name', 'nirzarpateltheme'),
        'menu_name'             => _x('Histories', 'Admin Menu text', 'nirzarpateltheme'),
        'name_admin_bar'        => _x('History', 'Add New on Toolbar', 'nirzarpateltheme'),
        'add_new'               => __('Add New', 'nirzarpateltheme'),
        'add_new_item'          => __('Add New history', 'nirzarpateltheme'),
        'new_item'              => __('New history', 'nirzarpateltheme'),
        'edit_item'             => __('Edit history', 'nirzarpateltheme'),
        'view_item'             => __('View history', 'nirzarpateltheme'),
        'all_items'             => __('All histories', 'nirzarpateltheme'),
        'search_items'          => __('Search histories', 'nirzarpateltheme'),
        'parent_item_colon'     => __('Parent histories:', 'nirzarpateltheme'),
        'not_found'             => __('No histories found.', 'nirzarpateltheme'),
        'not_found_in_trash'    => __('No histories found in Trash.', 'nirzarpateltheme'),
        'featured_image'        => _x('History Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'nirzarpateltheme'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'nirzarpateltheme'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'nirzarpateltheme'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'nirzarpateltheme'),
        'archives'              => _x('History archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'nirzarpateltheme'),
        'insert_into_item'      => _x('Insert into history', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'nirzarpateltheme'),
        'uploaded_to_this_item' => _x('Uploaded to this history', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'nirzarpateltheme'),
        'filter_items_list'     => _x('Filter histories list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'nirzarpateltheme'),
        'items_list_navigation' => _x('Histories list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'nirzarpateltheme'),
        'items_list'            => _x('Histories list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'nirzarpateltheme'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'custom post type history and watchmaking',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'histories'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'taxonomies'         => array('category', 'post_tag'),
        'show_in_rest'       => true
    );

    register_post_type('nirzarpateltheme_history', $args);
}
add_action('init', 'nirzarpateltheme_init');
