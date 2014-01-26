<?php

/**
 * Register Post Type for Messages
 */
function smstmn_register_cpt_message() {

    $labels = array( 
        'name' => _x( 'Messages', 'smstmn' ),
        'singular_name' => _x( 'Message', 'smstmn' ),
        'add_new' => _x( 'Add New', 'smstmn' ),
        'add_new_item' => _x( 'Add New Message', 'smstmn' ),
        'edit_item' => _x( 'Edit Message', 'smstmn' ),
        'new_item' => _x( 'New Message', 'smstmn' ),
        'view_item' => _x( 'View Message', 'smstmn' ),
        'search_items' => _x( 'Search Messages', 'smstmn' ),
        'not_found' => _x( 'No Messages found', 'smstmn' ),
        'not_found_in_trash' => _x( 'No Messages found in Trash', 'smstmn' ),
        'parent_item_colon' => _x( 'Parent Message:', 'smstmn' ),
        'menu_name' => _x( 'Messages', 'smstmn' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'smstmn',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );

    register_post_type( 'smstmn_message', $args );
}
add_action( 'init', 'smstmn_register_cpt_message' );

/**
 * Register Post Type for Subscribers
 */
function smstmn_register_cpt_subscriber() {

    $labels = array( 
        'name' => _x( 'Subscribers', 'smstmn' ),
        'singular_name' => _x( 'Subscriber', 'smstmn' ),
        'add_new' => _x( 'Add New', 'smstmn' ),
        'add_new_item' => _x( 'Add New Subscriber', 'smstmn' ),
        'edit_item' => _x( 'Edit Subscriber', 'smstmn' ),
        'new_item' => _x( 'New Subscriber', 'smstmn' ),
        'view_item' => _x( 'View Subscriber', 'smstmn' ),
        'search_items' => _x( 'Search Subscribers', 'smstmn' ),
        'not_found' => _x( 'No subscribers found', 'smstmn' ),
        'not_found_in_trash' => _x( 'No subscribers found in Trash', 'smstmn' ),
        'parent_item_colon' => _x( 'Parent Subscriber:', 'smstmn' ),
        'menu_name' => _x( 'Subscribers', 'smstmn' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'smstmn',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );

    register_post_type( 'smstmn_subscriber', $args );
}
add_action( 'init', 'smstmn_register_cpt_subscriber' );
