<?php 

/**************************************************************
-> Register ACF options pages
**************************************************************/
if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
			'page_title' 	=> 'Global settings',
			'menu_title'	=> 'Global settings',
			'menu_slug' 	=> 'global-settings',
			'capability'	=> 'edit_posts',
	]);
}

/**************************************************************
-> Set Google Maps API key for ACF
**************************************************************/
// function my_acf_init() {
// 	acf_update_setting('google_api_key', 'xxxxxxxxx');
// }
// add_action('acf/init', 'my_acf_init');