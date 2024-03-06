<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function (): void {
    /**
     * Cleanup styles
     */
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');

    /**
     * Enqueue theme stylesheets
     */
    if (hmr_enabled()) {
        $asset = 'resources/scripts/main.ts';
        $namespace = strtolower(wp_get_theme()->get('Name'));

        wp_enqueue_script($namespace, hmr_assets($asset), array(), null, true);
    } else {
        bundle('main')->enqueue();
    }
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('admin_head', function (): void {
    if (hmr_enabled()) {
        $asset = 'resources/scripts/editor.ts';
        $namespace = strtolower(wp_get_theme()->get('Name'));

        wp_enqueue_script($namespace, hmr_assets($asset), array(), null, true);
    } else {
        bundle('editor')->enqueue();
    }
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function (): void {
    /**
     * Enable features from the Soil plugin if activated.
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls'
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage')
    ]);

    /**
     * Disable the default block patterns.
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style'
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Overrides
 */
add_action('init', function () {
    /**
     * Cleanup global styles
     * @link https://github.com/WordPress/gutenberg/issues/36834
     */


    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
});


add_action('wp_dashboard_setup', function () {
   remove_action('welcome_panel','wp_welcome_panel'); // WP Welcome
});