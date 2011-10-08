<?php get_header(); ?>
 
        <div id="container">
            <div id="content">
 
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<div id="post-0" class="post error404 not-found">
                		<h1 class="entry-title"><?php _e( 'Not Found', 'bluengray' ); ?></h1>
                		<div class="entry-content">
                    		<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'bluengray' ); ?></p>
							<?php get_search_form(); ?>
                		</div><!-- .entry-content -->
            		</div><!-- #post-0 -->
                </div><!-- #post-<?php the_ID(); ?> -->          
 
            </div><!-- #content -->
        </div><!-- #container -->
<?php get_footer(); ?>