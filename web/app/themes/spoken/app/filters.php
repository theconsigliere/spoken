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


// Add welcome banner


add_action( 'welcome_panel', function() { ?>

<div class="welcome-panel-content">
    <div class="welcome-panel-header">
        <div class="welcome-panel-header-image">

        </div>
        <h2>Welcome to the Spoken website</h2>
        <p>
            <a href="https://spoken.test/wp/wp-admin/about.php">
                Learn more about the 6.2.2 version. </a>
        </p>
    </div>
    <div class="welcome-panel-column-container">
        <div class="welcome-panel-column">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true" focusable="false">
                <rect width="48" height="48" rx="4" fill="#1E1E1E"></rect>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M32.0668 17.0854L28.8221 13.9454L18.2008 24.671L16.8983 29.0827L21.4257 27.8309L32.0668 17.0854ZM16 32.75H24V31.25H16V32.75Z"
                    fill="white"></path>
            </svg>
            <div class="welcome-panel-column-content">
                <h3>Update text, images and more in the page editor.</h3>
                <p>Explore your pre-configured block layouts.</p>
                <a href="https://spoken.test/wp/wp-admin/post-new.php?post_type=page">Add a new page</a>
            </div>
        </div>
        <div class="welcome-panel-column">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true" focusable="false">
                <rect width="48" height="48" rx="4" fill="#1E1E1E"></rect>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M18 16h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H18a2 2 0 0 1-2-2V18a2 2 0 0 1 2-2zm12 1.5H18a.5.5 0 0 0-.5.5v3h13v-3a.5.5 0 0 0-.5-.5zm.5 5H22v8h8a.5.5 0 0 0 .5-.5v-7.5zm-10 0h-3V30a.5.5 0 0 0 .5.5h2.5v-8z"
                    fill="#fff"></path>
            </svg>
            <div class="welcome-panel-column-content">
                <h3>Start customising</h3>
                <p>Configure your site’s logo, header, menus, and more in the Customiser.</p>
                <a class="load-customize hide-if-no-customize" href="https://spoken.test/wp/wp-admin/customize.php">Open
                    the Customiser</a>
            </div>
        </div>
        <div class="welcome-panel-column">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true" focusable="false">
                <rect width="48" height="48" rx="4" fill="#1E1E1E"></rect>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M31 24a7 7 0 0 1-7 7V17a7 7 0 0 1 7 7zm-7-8a8 8 0 1 1 0 16 8 8 0 0 1 0-16z" fill="#fff"></path>
            </svg>
            <div class="welcome-panel-column-content">
                <h3>Discover a new way to build your site.</h3>
                <p>There is a new kind of WordPress theme, called a block theme, that lets you build the site you’ve
                    always wanted — with blocks and styles.</p>
                <a href="https://wordpress.org/documentation/article/block-themes/">Learn about block themes</a>
            </div>
        </div>
    </div>
</div>

<?php } );