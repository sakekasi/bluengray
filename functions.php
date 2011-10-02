<?php


	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'bluengray', TEMPLATEPATH . '/languages' );
 
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);
 
	// Get the page number
	function get_page_number() {
    	if ( get_query_var('paged') ) {
        	print ' | ' . __( 'Page ' , 'bluengray') . get_query_var('paged');
    	}
	} // end get_page_number
	
	function facebook_logo() {
		print 'images/social/facebook.png';
	}
	
	
	function twitter_logo() {
		print 'images/social/twitter.png';
	}
	
	function google_plus_logo() {
		print 'images/social/google+.png';
	}
	
	function github_logo() {
		print 'images/social/github.png';
	}
	
	function youtube_logo() {
		print 'images/social/youtube.png';
	}
	
	function email_logo(){
		print 'images/social/email.png';
	}
	
	function rss_logo() {
		print 'images/social/rss.png';
	}
	
	// For category lists on category archives: Returns other categories except the current one (redundant)
	function cats_meow($glue) {
    	$current_cat = single_cat_title( '', false );
    	$separator = "\n";
    	$cats = explode( $separator, get_the_category_list($separator) );
    	foreach ( $cats as $i => $str ) {
	        if ( strstr( $str, ">$current_cat<" ) ) {
    	        unset($cats[$i]);
        	    break;
        	}
	    }
    	if ( empty($cats) )
        	return false;
	 
    	return trim(join( $glue, $cats ));
	} // end cats_meow
	
	// For tag lists on tag archives: Returns other tags except the current one (redundant)
	function tag_ur_it($glue) {
    	$current_tag = single_tag_title( '', '',  false );
	    $separator = "\n";
    	$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	    foreach ( $tags as $i => $str ) {
    	    if ( strstr( $str, ">$current_tag<" ) ) {
        	    unset($tags[$i]);
            	break;
	        }
    	}
	    if ( empty($tags) )
    	    return false;
 
    	return trim(join( $glue, $tags ));
	} // end tag_ur_it
	
	// Register widgetized areas
	function theme_widgets_init() {
    	// Area 1
	    register_sidebar( array (
    	'name' => 'Primary Widget Area',
	    'id' => 'primary_widget_area',
    	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
    	'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
  		) );
 
    	// Area 2
	    register_sidebar( array (
    	'name' => 'Secondary Widget Area',
	    'id' => 'secondary_widget_area',
    	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
    	'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );
	} // end theme_widgets_init
 
	 add_action( 'init', 'theme_widgets_init' );
	 
	 $preset_widgets = array (
    	'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
	    'secondary_widget_area'  => array( 'links', 'meta' )
	);
	if ( isset( $_GET['activated'] ) ) {
    	update_option( 'sidebars_widgets', $preset_widgets );
	}
	// update_option( 'sidebars_widgets', NULL );
	
	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index ){
  		global $wp_registered_sidebars;
 
  		$widgetcolums = wp_get_sidebars_widgets();
 
  		if ($widgetcolums[$index]) return true;
 
    		return false;
	} // end is_sidebar_active
	
	// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
	function add_menuclass($ulclass) {
		return preg_replace('/<ul>/', '<ul id="nav" class="pages-list">', $ulclass, 1);
	}
	add_filter('wp_page_menu','add_menuclass');
	
	function add_anchorclass($t){
		return str_replace("<a ", '<a class="page_item_link" ', $t);
	}
	add_filter('wp_page_menu', 'add_anchorclass');
?>