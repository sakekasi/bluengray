<?php get_header(); ?>
 
        <div class="single" id="container">
        	<div id="nav-above" class="navigation">
                    <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
    				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
            </div><!-- #nav-above -->
            <div class="single" id="content">
            	
            	<?php while (have_posts()) : the_post(); ?>
 
                
 				
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                	<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'bluengray' ) . '&after=</div>') ?>
                </div><!-- #post-<?php the_ID(); ?> -->          
 
                          
                
                <div class="entry-meta">
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( ', ', 'bluengray' ) );

						/* translators: used between list items, there is a space after the comma */
						$tag_list = get_the_tag_list( '', __( ', ', 'bluengray' ) );
						if ( '' != $tag_list ) {
							$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bluengray' );
						} elseif ( '' != $categories_list ) {
							$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bluengray' );
						} else {
							$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'bluengray' );
						}

						printf(
							$utility_text,
							$categories_list,
							$tag_list,
							esc_url( get_permalink() ),
							the_title_attribute( 'echo=0' ),
							get_the_author(),
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
						);		
					?>
					<?php edit_post_link( __( 'Edit', 'bluengray' ), '<span class="edit-link">', '</span>' ); ?>

					<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
						<div id="author-info">
							<div id="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bluengray_author_bio_avatar_size', 68 ) ); ?>
							</div><!-- #author-avatar -->
							<div id="author-description">
								<h2><?php printf( esc_attr__( 'About %s', 'bluengray' ), get_the_author() ); ?></h2>
								<?php the_author_meta( 'description' ); ?>
								<div id="author-link">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'bluengray' ), get_the_author() ); ?>
									</a>
								</div><!-- #author-link	-->
							</div><!-- #author-description -->
						</div><!-- #entry-author-info -->
					<?php endif; ?>
				</div><!-- .entry-meta -->
		
		
		<div id="post-social">
			<a href="https://twitter.com/share" 
			   class="twitter-share-button" 
			   data-url="<?php the_permalink(); ?>"
			   data-count="horizontal" data-related="sakekasi">Tweet</a>
			<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
			
			<div id="fb">
			<div id="fb-root"></div>
			<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
			<fb:like 
				href="<?php echo get_permalink(); ?>" 
				width="450"
				send="true" 
				layout="button_count"
				class="facebook-share"></fb:like>
			</div> 
			
			<div id="gp">
			<script type="text/javascript">
  				(function() {
    				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    				po.src = 'https://apis.google.com/js/plusone.js';
    				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  				})();
			</script>				
			<g:plusone size="small" href="<?php the_permalink()?>"></g:plusone>
			</div>
		</div><!-- #post-social -->
 				<?php comments_template('', true); ?>
 				
 				<?php endwhile; ?>
            </div><!-- #content -->
            <div id="nav-below" class="navigation">
                	<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
    				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
                </div><!-- #nav-below -->  
        </div><!-- #container -->
<?php get_footer(); ?>