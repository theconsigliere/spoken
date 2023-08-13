<?php

/**************************************************************
-> Register custom post type:
-> Designs
**************************************************************/

add_action('init', 'register_cpt_testimonials', 0);

function register_cpt_testimonials()
{
    $name = 'Testimonials';
    $single = 'Testimonial';

    $labels = [
    'name'                => _x($name, 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x($single, 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __($name, 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'all_items'           => __("All $name", 'text_domain'),
    'view_item'           => __('View', 'text_domain'),
    'add_new_item'        => __('Add new', 'text_domain'),
    'add_new'             => __('Add new', 'text_domain'),
    'edit_item'           => __('Edit', 'text_domain'),
    'update_item'         => __('Update', 'text_domain'),
    'search_items'        => __('Search', 'text_domain'),
    'not_found'           => __('Not found', 'text_domain'),
    'not_found_in_trash'  => __('Not found in Trash', 'text_domain'),
    ];

    $args = [
    'label'               => __($name, 'text_domain'),
    'labels'              => $labels,
    'supports'            => ['title', 'revisions'],
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 30,
    'menu_icon'           => 'dashicons-slides',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'show_in_rest'        => true,
    ];

    register_post_type('structures', $args);
}


/**************************************************************
-> Register custom post type:
-> Careers
**************************************************************/

add_action('init', 'register_cpt_careers', 0);

function register_cpt_careers()
{
    $name = 'Careers';
    $single = 'Career';

    $labels = [
    'name'                => _x($name, 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x($single, 'Post Type Singular Name', 'text_domain'),
  'menu_name'           => __($name, 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'all_items'           => __("All $name", 'text_domain'),
    'view_item'           => __('View', 'text_domain'),
    'add_new_item'        => __('Add new', 'text_domain'),
    'add_new'             => __('Add new', 'text_domain'),
    'edit_item'           => __('Edit', 'text_domain'),
    'update_item'         => __('Update', 'text_domain'),
    'search_items'        => __('Search', 'text_domain'),
    'not_found'           => __('Not found', 'text_domain'),
    'not_found_in_trash'  => __('Not found in Trash', 'text_domain'),
    ];

    $args = [
    'label'               => __($name, 'text_domain'),
    'labels'              => $labels,
    'supports'            => ['title', 'revisions'],
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 30,
    'menu_icon'           => 'dashicons-admin-page',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'show_in_rest'        => true,
    ];

    register_post_type('careers', $args);
}