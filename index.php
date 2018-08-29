<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="center-wrap clearfix">
			
				    <div id="main" class="twelvecol center clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix blog'); ?> role="article">
							<div class="blog-image">
                             	<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
                            </div><!--/blog-image-->
						    <div class="blog-text">
                                <header class="article-header">
                                
                                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                    	<?php the_title(); ?></a>
                                    </h2>
				                      <p class="byline vcard"><?php
				                        printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
				                      ?></p>
                                </header> <!-- end article header -->
                        
                                <section class="entry-content clearfix">
                                    <?php the_excerpt(); ?>
                                </section> <!-- end article section -->
                            
                          	</div><!--/blog-text-->
						    					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('bones_page_navi')) { ?>
					            <?php bones_page_navi(); ?>
					        <?php } else { ?>
					            <nav class="wp-prev-next">
					                <ul class="clearfix">
					        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
					        	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
					                </ul>
					            </nav>
					        <?php } ?>		
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
    				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
