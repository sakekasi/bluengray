<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
 
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
 
    <?php wp_head(); ?>
    
    <script type="text/javascript" src="<?php bloginfo('url');?>/wp-content/themes/bluengray/js/floating-1.7.js">  
    </script>  
 
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'bluengray' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'bluengray' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body>
<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>

<div id="wrapper" class="hfeed">
    <div id="header">
        <div id="masthead">
 
            <div id="branding">
            	<div id="blog-title"><span><a id="blog-title" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></span></div>
                    <h1 id="blog-description"><?php bloginfo( 'description' ) ?></h1>
                    
            </div><!-- #branding -->
 
            <div id="access">
            	<?php wp_page_menu( 'sort_column=menu_order' ); ?>
            </div><!-- #access -->
            <div id="social-wrap">
            <div id="social">
            	<?php 	if($bluengray_facebook){
            		  		printf('<a target="_blank" class="social" id="facebook" href="%s"><img class="social" src="%s/wp-content/themes/bluengray/images/facebook.png"></a>',$bluengray_facebook, get_site_url());
						}
				 	  	if($bluengray_twitter){
            				printf('<a target="_blank" class="social" id="twitter" href="%s"><img class="social" src="%s/wp-content/themes/bluengray/images/twitter.png"></a>', $bluengray_twitter, get_site_url());
            			}
					  	if($bluengray_google_plus){
            				printf('<a target="_blank" class="social" id="google+" href="%s"><img class="social" src="%s/wp-content/themes/bluengray/images/googleplus.png"></a>', $bluengray_google_plus, get_site_url());
						}
					  	if($bluengray_github){
            				printf('<a target="_blank" class="social" id="github" href="%s"><img class="social" src="%s/wp-content/themes/bluengray/images/github.png"></a>',$bluengray_github, get_site_url());
						}
					  	if($bluengray_youtube){
            				printf('<a target="_blank" class="social" id="youtube" href="%s"><img class="social" src="%s/wp-content/themes/bluengray/images/youtube.png"></a>',$bluengray_youtube, get_site_url());
						}
					  	if($bluengray_email){
            				printf('<a target="_blank" class="social" id="email" href="mailto:%s"><img class="social" src="%s/wp-content/themes/bluengray/images/email.png"></a>',$bluengray_email, get_site_url());
						}
            		  	if($bluengray_rss){
            				echo '<a target="_blank" class="social" id="rss" href="' . $bluengray_rss . '"><img class="social" src="' .  get_site_url() . '/wp-content/themes/bluengray/images/rss.png"></a>';
						}else{
							echo '<a target="_blank" class="social" id="rss" href="' ;
							bloginfo('rss2_url');
							echo '"><img class="social" src="' .  get_site_url() . '/wp-content/themes/bluengray/images/rss.png"></a>';
						}
						

						
            	?>
            	
            </div><!-- #social -->
            </div><!-- #social-wrap -->
            
 
        </div><!-- #masthead -->
    </div><!-- #header -->
 	
    <div id="main">