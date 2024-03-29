<?php get_header(); ?>
 
        <div id="container">
            <div id="content">
				<?php the_post(); ?>         
 
				<<h1 class="page-title"><?php _e( 'Category Archives:', 'bluengray' ) ?> <span><?php single_cat_title() ?></span></span></h1>
				<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
 
				<?php rewind_posts(); ?>
 
				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                	<div id="nav-above" class="navigation">
                    	<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'bluengray' )) ?></div>
                    	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'bluengray' )) ?></div>
                	</div><!-- #nav-above -->
				<?php } ?>          	
 
				<?php while ( have_posts() ) : the_post(); ?>
 
                	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'bluengray'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
 
                    	<div class="entry-meta">
                        		<span class="meta-prep meta-prep-author"><?php _e('By ', 'bluengray'); ?></span>
                        		<span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'bluengray' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
                        		<span class="meta-sep"> | </span>
                        		<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'bluengray'); ?></span>
                        		<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                		        <?php edit_post_link( __( 'Edit', 'bluengray' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
        		        </div><!-- .entry-meta -->
 
 
                    	<div class="entry-summary">
							<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'bluengray' )  ); ?>
                    	</div><!-- .entry-summary -->
 
                    	<div class="entry-utility">
                        	<?php if ( $cats_meow = cats_meow(', ') ) : // Returns categories other than the one queried ?>
              			    	<span class="cat-links"><?php printf( __( 'Also posted in %s', 'bluengray' ), $cats_meow ) ?></span>
                        		<span class="meta-sep"> | </span>
							<?php endif ?>
                        	<span class="meta-sep"> | </span>
                        	<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'bluengray' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
                        	<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'bluengray' ), __( '1 Comment', 'bluengray' ), __( '% Comments', 'bluengray' ) ) ?></span>
                        	<?php edit_post_link( __( 'Edit', 'bluengray' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
                    	</div><!-- #entry-utility -->
                	</div><!-- #post-<?php the_ID(); ?> -->
 
				<?php endwhile; ?>           
 
				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                	<div id="nav-below" class="navigation">
                    	<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'bluengray' )) ?></div>
	                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'bluengray' )) ?></div>
    	            </div><!-- #nav-below -->
				<?php } ?>
            </div><!-- #content -->
        </div><!-- #container -->
<?php get_footer(); ?>