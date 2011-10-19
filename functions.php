<?php
	$themename = "Blue 'n Gray";
	$shortname = "bluengray";
	$options = array(
	
		array( "name"=>"Social Networks",
			   "type"=>"title"),
			   
		array( "type"=>"open"),
		
		array( "name"=>"facebook",
			   "desc"=>"enter the link to your facebook profile, or leave blank for no facebook",
			   "id"=>$shortname."_facebook",
			   "std"=>"",
			   "type"=>"text"),
			   
		array( "name"=>"twitter",
			   "desc"=>"enter the link to your twitter profile, or leave blank for no twitter",
			   "id"=>$shortname."_twitter",
			   "std"=>"",
			   "type"=>"text"),
			   
		array( "name"=>"google+",
			   "desc"=>"enter the link to your google+ profile, or leave blank for no google+",
			   "id"=>$shortname."_google_plus",
			   "std"=>"",
			   "type"=>"text"),
			   
		array( "name"=>"github",
			   "desc"=>"enter the link to your github profile, or leave blank for no github",
			   "id"=>$shortname."_github",
			   "std"=>"",
			   "type"=>"text"),
			   
		array(  "name"=>"scribd",
				"desc"=>"enter the link to your scribd profile or leave blank for no scribd",
				"id"=>$shortname."_scribd",
				"std"=>"",
				"type"=>"text"),
				
		
		array( "name"=>"youtube",
			   "desc"=>"enter the link to your youtube profile, or leave blank for no youtube",
			   "id"=>$shortname."_youtube",
			   "std"=>"",
			   "type"=>"text"),
		
		array( "name"=>"email",
			   "desc"=>"enter your email address, or leave blank for no email",
			   "id"=>$shortname."_email",
			   "std"=>"",
			   "type"=>"text"),
		
		array( "name"=>"rss",
			   "desc"=>"enter your rss link, or leave blank to go to default rss feed",
			   "id"=>$shortname."_rss",
			   "std"=>"",
			   "type"=>"text"),
		
		array( "type"=>"close")
			   
	);
	
	function mytheme_add_admin() {

	    global $themename, $shortname, $options;

    	if ( $_GET['page'] == basename(__FILE__) ) {

	        if ( 'save' == $_REQUEST['action'] ) {

        	        foreach ($options as $value) {
    	                update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

	                foreach ($options as $value) {
                	    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

            	    header("Location: themes.php?page=functions.php&saved=true");
        	        die;

    	    } else if( 'reset' == $_REQUEST['action'] ) {

	            foreach ($options as $value) {
                	delete_option( $value['id'] ); }

            	header("Location: themes.php?page=functions.php&reset=true");
        	    die;

    	    }
	    }

    	add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

	}

	function mytheme_admin() {

	    global $themename, $shortname, $options;

    	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

	?>
	<div class="wrap">
	<h2><?php echo $themename; ?> settings</h2>

	<form method="post">

	<?php foreach ($options as $value) {



	switch ( $value['type'] ) {

	case "open":
	?>
	<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

	<?php break;

	case "close":
	?>

	</table><br />

	<?php break;

	case "title":
	?>
	<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
    	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
	</tr>

	<?php break;

	case 'text':
	?>

	<tr>
    	<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    	<td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
	</tr>

	<tr>
    	<td><small><?php echo $value['desc']; ?></small></td>
	</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

	<?php
	break;

	case 'textarea':
	?>

	<tr>
    	<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    	<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

	</tr>

	<tr>
    	<td><small><?php echo $value['desc']; ?></small></td>
	</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

	<?php
	break;

	case 'select':
	?>
	<tr>
	    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    	<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
	</tr>

	<tr>
	    <td><small><?php echo $value['desc']; ?></small></td>
	</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

	<?php
	break;

	case "checkbox":
	?>
    	<tr>
    	<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        	<td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
            	    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                	</td>
    	</tr>

    	<tr>
        	<td><small><?php echo $value['desc']; ?></small></td>
   		</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

	<?php         break;

	}
	}
	?>

	
	<p class="submit">
	<input name="save" type="submit" value="Save changes" />
	<input type="hidden" name="action" value="save" />
	</p>	
	</form>
	<form method="post">
	<p class="submit">
	<input name="reset" type="submit" value="Reset" />
	<input type="hidden" name="action" value="reset" />
	</p>
	</form>

	<?php
	}

	add_action('admin_menu', 'mytheme_add_admin'); ?>
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
	
	// Custom callback to list comments in the bluengray style
	function custom_comments($comment, $args, $depth) {
	  $GLOBALS['comment'] = $comment;
    	$GLOBALS['comment_depth'] = $depth;
	  ?>
    	<li class="comment" id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	        <div class="comment-author vcard"><?php commenter_link() ?></div>
    	    <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'bluengray'),
        	            get_comment_date(),
            	        get_comment_time(),
                	    '#comment-' . get_comment_ID() );
                    	edit_comment_link(__('Edit', 'bluengray'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'bluengray') ?>
    	      <div class="comment-content">
        	    <?php comment_text() ?>
	        </div>
    	    <?php // echo the comment reply link
        	    if($args['type'] == 'all' || get_comment_type() == 'comment') :
            	    comment_reply_link(array_merge($args, array(
                	    'reply_text' => __('Reply','bluengray'),
                    	'login_text' => __('Log in to reply.','bluengray'),
	                    'depth' => $depth,
    	                'before' => '<div class="comment-reply-link">',
        	            'after' => '</div>'
            	    )));
	            endif;
    	    ?>
	<?php } // end custom_comments
	
	// Custom callback to list pings
	function custom_pings($comment, $args, $depth) {
    	   $GLOBALS['comment'] = $comment;
        	?>
            	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                	<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'bluengray'),
                    	    get_comment_author_link(),
                        	get_comment_date(),
	                        get_comment_time() );
    	                    edit_comment_link(__('Edit', 'bluengray'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'bluengray') ?>
    	        <div class="comment-content">
        	        <?php comment_text() ?>
            	</div>
	<?php } // end custom_pings
	
	// Produces an avatar image with the hCard-compliant photo class
	function commenter_link() {
    	$commenter = get_comment_author_link();
	    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
    	    $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	    } else {
    	    $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	    }
    	$avatar_email = get_comment_author_email();
	    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
    	echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
	} // end commenter_link
?>