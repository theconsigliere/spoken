<?php

/**************************************************************
-> Remove comments and posts menu items in admin
**************************************************************/
function remove_menus()
{
    remove_menu_page('edit.php');                   //Posts
    remove_menu_page('edit-comments.php');          //Comments
}
add_action('admin_menu', 'remove_menus');

/**************************************************************
-> Disable block library
**************************************************************/
function remove_wp_block_library_css()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wc-block-style');
}
add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

/**************************************************************
-> Removes jQuery Migrate (it might be required if you're using old plugins)
**************************************************************/
function clean_remove_jquery_migrate($scripts)
{
  if (!is_admin() && isset($scripts->registered['jquery'])) {
    $script = $scripts->registered['jquery'];
    if ($script->deps) {
      // Check whether the script has any dependencies
      $script->deps = array_diff($script->deps, array('jquery-migrate'));
    }
  }
}

add_action('wp_default_scripts', 'clean_remove_jquery_migrate');

/**************************************************************
-> Disable emojis in Wordpress
**************************************************************/
 function disable_emoji_feature()
{
  // Prevent Emoji from loading on the front-end
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

  // Remove from admin area also
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('admin_print_styles', 'print_emoji_styles');

  // Remove from RSS feeds also
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');

  // Remove from Embeds
  remove_filter('embed_head', 'print_emoji_detection_script');

  // Remove from emails
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

  // Disable from TinyMCE editor. Currently disabled in block editor by default
  add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');

  /** Finally, prevent character conversion too
   ** without this, emojis still work
   ** if it is available on the user's device
   */

  add_filter('option_use_smilies', '__return_false');
}

/**************************************************************
 -> Disables emojis in WYSIWYG editor
**************************************************************/
function disable_emojis_tinymce($plugins)
{
  if (is_array($plugins)) {
    $plugins = array_diff($plugins, array('wpemoji'));
  }
  return $plugins;
}
add_action('init', 'disable_emoji_feature');

/**************************************************************
-> Remove WordPress version from meta data
**************************************************************/
add_filter('the_generator', '__return_false');

/**************************************************************
-> Disable XML-RPC
**************************************************************/
add_filter('xmlrpc_enabled', '__return_false');

/**************************************************************
-> Hide wlwmanifest meta link
**************************************************************/
remove_action('wp_head', 'wlwmanifest_link');

/**************************************************************
-> Remove REST API meta link
**************************************************************/
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

/**************************************************************
-> Remove RSD edit meta link
**************************************************************/
remove_action( 'wp_head', 'rsd_link' );

/**************************************************************
-> Disable WordPress domain prefetch
**************************************************************/
function  remove_dns_prefetch () {
  remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );
}
add_action( 'init', 'remove_dns_prefetch' );

/**************************************************************
 -> Remove Dashicons css file from front end
 **************************************************************/
add_action( 'wp_print_styles',     'my_deregister_styles', 100 );

function my_deregister_styles()    { 
  wp_deregister_style( 'dashicons' ); 
}

/**************************************************************
-> Disable WordPress Admin Bar for all users
**************************************************************/
add_filter( 'show_admin_bar', '__return_false' );