<?php 

/**************************************************************
-> Order posts in chronological order in the back-end
**************************************************************/
function set_post_order_in_admin( $wp_query ) {
	
	global $pagenow;
	
	if ( is_admin() && 'edit.php' == $pagenow && !isset($_GET['orderby'])) {
		
		$wp_query->set( 'orderby', 'date' );
		$wp_query->set( 'order', 'DESC' );       
	}
}

add_filter('pre_get_posts', 'set_post_order_in_admin', 5 );

/**************************************************************
-> Load the main enqueued script as a module
**************************************************************/
function add_type_attribute($tag, $handle, $src) {
	// if not your script, do nothing and return original $tag
	if ( 'main/0' !== $handle ) {
			return $tag;
	}
	// change the script tag by adding type="module" and return it.
	$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
	return $tag;
}

add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);