<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="tencol first clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">

							<header class="article-header">

								<h1><i class="icon-warning-sign icon-large"></i> <?php _e("Not Found", "bonestheme"); ?></h1>

							</header> <!-- end article header -->

							<section class="entry-content">

								<p>Whatever you were looking for, it's not here. Sorry about that! Maybe try using the search bar below to try again, or just starting fresh at the <a href="http://thesafezoneproject.com" alt="Go home">home page</a>.</p>

							</section> <!-- end article section -->

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section> <!-- end search section -->

							<footer class="article-footer">

									<p></p>

							</footer> <!-- end article footer -->

						</article> <!-- end article -->
                        

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
            
			<div id="all-activities">
			
				<div class="wrap clearfix">
			
				    <div class="tencol first clearfix" role="main">
                        <p>Or scroll down and check out all the activities we've published here at the Safe Zone Project.</p>
                        
					    <?php query_posts('post_type=activity&showposts=-1&orderby=title&order=asc');
						
						if (have_posts()) :
		 				
						while (have_posts()) : the_post();

						?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						    <div class="cat-bg">
                            	<div class="share-sign"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><i class="icon-share-sign"></i></a></div>
							    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            	<div class="clearfix activity-deets cat-text">
                                    <ul>
                                        <!--<li class="head"><h3>LABELED:</h3></li>-->
                                        
                                        <li class="level"><?php echo get_the_term_list( get_the_ID(), 'activity_level', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                        <li class="trust"><?php echo get_the_term_list( get_the_ID(), 'activity_trust', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                        <li class="time"><?php echo get_the_term_list( get_the_ID(), 'activity_time', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                        <li class="subject"><?php echo get_the_term_list( get_the_ID(), 'activity_subject', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                    </ul>
                                </div>
						    </div> <!-- end all activities -->
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
					
					    <?php else : ?>
					    
					        <article id="post-not-found" class="hentry clearfix">
					            <header class="article-header">
					        	    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					        	</header>
					            <section class="entry-content">
					        	    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					        	</section>
					        	<footer class="article-footer">
					        	    <p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
					        	</footer>
					        </article>
					
					    <?php endif; ?>
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #all-activities -->

<?php get_footer(); ?>
