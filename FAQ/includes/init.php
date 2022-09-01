<?php

function faq_init(){

    $labels = array(
        'name'                  => _x( 'faq', 'Post type general name', 'faq' ),
        'singular_name'         => _x( 'faqs', 'Post type singular name', 'faq' ),
        'menu_name'             => _x( 'FAQ', 'Admin Menu text', 'faq' ),
        'name_admin_bar'        => _x( 'faqs', 'Add New on Toolbar', 'faq' ),
        'add_new'               => __( 'Add New', 'faq' ),
        'add_new_item'          => __( 'Add New faqs', 'faq' ),
        'new_item'              => __( 'New faqs', 'faq' ),
        'edit_item'             => __( 'Edit faqs', 'faq' ),
        'view_item'             => __( 'View faqs', 'faq' ),
        'all_items'             => __( 'All faqs', 'faq' ),
        'search_items'          => __( 'Search faqs', 'faq' ),
        'parent_item_colon'     => __( 'Parent faqs:', 'faq' ),
        'not_found'             => __( 'No faqs found.', 'faq' ),
        'not_found_in_trash'    => __( 'No faqs found in Trash.', 'faq' ),
        'featured_image'        => _x( 'faqs Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'faq' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'faq' ),
        'archives'              => _x( 'faqs archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'faq' ),
        'insert_into_item'      => _x( 'Insert into faqs', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'faq' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this faqs', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'faq' ),
        'filter_items_list'     => _x( 'Filter faqs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'faq' ),
        'items_list_navigation' => _x( 'faqs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'faq' ),
        'items_list'            => _x( 'faqs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'faq' ),
    );
 
    $args                       =   array(
        'labels'                =>  $labels,
        'description'           =>  'A custom post type for faqs',
        'public'                =>  true,
        'publicly_queryable'    =>  true,
        'show_ui'               =>  true,
        'show_in_menu'          =>  true,
        'query_var'             =>  true,
        'rewrite'               =>  array( 'slug' => 'faq' ),
        'capability_type'       =>  'post',
        'has_archive'           =>  true,
        'hierarchical'          =>  false,
        'menu_position'         =>  20,
        'supports'              =>  [ 'title', 'editor', 'author' ],
        'taxonomies'            =>  [ 'faqs_catogries' ],
        'menu_icon'   => 'dashicons-excerpt-view',
        'show_in_rest'          =>  true
    );
 
    register_post_type( 'faq', $args );

}
function add_faqs_catogries()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'labels' => array(
            'name' => 'faqs Categories',
            'search_items' =>  __('Search faqs Tags'),
            'all_items' => __('All faqs Tags'),
            'parent_item' => __('Parent faqs Tag'),
            'parent_item_colon' => __('Parent faqs Tag:'),
            'edit_item' => __('Edit faqs Tag'),
            'update_item' => __('Update faqs Tag'),
            'add_new_item' => __('Add New faqs Tag'),
            'new_item_name' => __('New faqs Tag Name'),
            'menu_name' => __('faqs Categories'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'capabilities' => array(
            'manage_terms' => 'manage_categories',
            'edit_terms' => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'read'
        ),
        'rewrite'  => array('slug' => 'faqs_catogries'),
    );

    register_taxonomy('faqs_catogries', 'faq', $labels);
}
