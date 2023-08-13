<?php

/**************************************************************
-> Register taxonomy:
-> Resource type
**************************************************************/

// function register_taxonomy_resource_type()
// {
//     $single_label = 'Resource type';
//     $multiple_label = 'Resource types';

//     $labels = array(
//         'name'                       => _x($multiple_label, 'Taxonomy General Name', $single_label),
//         'singular_name'              => _x($single_label, 'Taxonomy Singular Name', $single_label),
//         'menu_name'                  => __($multiple_label, $single_label),
//         'all_items'                  => __('All Items', $single_label),
//         'parent_item'                => __('Parent Item', $single_label),
//         'parent_item_colon'          => __('Parent Item:', $single_label),
//         'new_item_name'              => __('New ' . $single_label, $single_label),
//         'add_new_item'               => __('Add New ' . $single_label, $single_label),
//         'edit_item'                  => __('Edit ' . $single_label, $single_label),
//         'update_item'                => __('Update ' . $single_label, $single_label),
//         'view_item'                  => __('View ' . $single_label, $single_label),
//         'separate_items_with_commas' => __('Separate items with commas', $single_label),
//         'add_or_remove_items'        => __('Add or remove' . $single_label, $single_label),
//         'choose_from_most_used'      => __('Choose from the most used' . $single_label, $single_label),
//         'popular_items'              => __('Popular' . $multiple_label, $single_label),
//         'search_items'               => __('Search ' . $multiple_label, $single_label),
//         'not_found'                  => __('Not Found', $single_label),
//         'no_terms'                   => __('No items', $single_label),
//         'items_list'                 => __($single_label . ' list', $single_label),
//         'items_list_navigation'      => __($single_label . ' list navigation', $single_label),
//     );
//     $args = array(
//         'labels'                     => $labels,
//         'hierarchical'               => true,
//         'public'                     => true,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'show_in_nav_menus'          => false,
//         'show_tagcloud'              => false,
//     );
//     register_taxonomy('resource-type', ['resource'], $args);
// }
// add_action('init', 'register_taxonomy_resource_type', 0);
