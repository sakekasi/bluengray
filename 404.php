<?php get_header(); ?>
 
        <div id="container">
            <div id="content">
 
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<div id="post-0" class="post error404 not-found">
                		<h1 class="entry-title"><?php _e( 'Error 404:Not Found', 'bluengray' ); ?></h1>
                		<div class="search-not-found entry-content">
                    		<p><?php _e( 'Sorry, but the page you were looking for does not exist. Maybe searching will help.', 'bluengray' ); ?></p>
							<?php get_search_form(); ?>
                		</div><!-- .entry-content -->
            		</div><!-- #post-0 -->
                </div><!-- #post-<?php the_ID(); ?> -->          
 
            </div><!-- #content -->
        </div><!-- #container -->
<?php get_footer(); ?>