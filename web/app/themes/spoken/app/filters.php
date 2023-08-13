<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function (): string {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});


/**
 * Load scripts asset as module
 *
 * @return string
 */
add_filter('script_loader_tag', function ($tag, $handle, $src): string {
    $namespace = strtolower(wp_get_theme()->get('Name'));

    if ($namespace !== $handle) {
        return $tag;
    }

    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';

    return $tag;
}, 10, 3);

/**
 *
 * Use page builder from ACF Extended
 */

 add_action('acfe/flexible/render/before_template', function ($field, $layout, $is_preview) {
    $values = ['is_preview' => $is_preview];
    $data = [];

    foreach ($layout['sub_fields'] as $field) {
        $values[ $field['name'] ] = get_sub_field($field['name']);
    }

    $data = collect(get_body_class())->reduce(function ($data, $class) {
        return apply_filters("sage/template/{$class}/data", $data);
    }, []);

    // check if we are in a custom post type if so output name
    if (get_post_type() !== 'post') {
        $data['post_type'] = get_post_type();

        // post string equalts nothing
        $postString = '';

    }

    echo \Roots\view('partials.' . $postString . 'page-builder.' . str_replace('_', '-', $layout['name']), array_merge($values, $data))->render();
}, 10, 3);



// REMOVE FORMATING FROM WYSIWYG 

add_action('acf/init', function () {
    remove_filter('acf_the_content', 'wpautop' );
}, 15);