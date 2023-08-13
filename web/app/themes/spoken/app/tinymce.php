<?php

/*****************************************************************
-> Add different WYSIWYG toolbars for different ACF fields
****************************************************************/
add_filter( 'acf/fields/wysiwyg/toolbars' , 'kota_custom_tinymce_toolbar'  );

function kota_custom_tinymce_toolbar( $toolbars )
{

  // Remove the default toolbars completely
	unset( $toolbars['Basic' ] );

	$toolbars['Basic'] = array();
	$toolbars['Basic'][1] = array('bold');
	$toolbars['Link'] = array();
	$toolbars['Link'][1] = array('link');
	$toolbars['Mid'] = array();
	$toolbars['Mid'][1] = array('formatselect', 'bold' , 'italic' , 'underline', 'strikethrough', 'link', 'unlink', 'numlist', 'bullist', 'pastetext');

	return $toolbars;
}