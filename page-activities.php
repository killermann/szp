<?php
/*
Template Name: All Activities Page
*/
?>

<?php get_header(); ?>
			
			<div id="all-activities">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="eightcol first clearfix" role="main">
                    	<h1>All Activities</h1>
                        <div class="entry-content">
                            <ol class="mini-nav clearfix">
                                <li><a href="http://thesafezoneproject.com/activity-classification-guide/" alt="Activity Classification Guide"><i class="icon-screenshot"></i>Activity Classification Guide</a></li>
                                <li><a href="http://thesafezoneproject.com/groundrules/" alt="Groundrules"><i class="icon-road"></i>Ground Rules</a></li>
                                <li><a href="http://thesafezoneproject.com/additional-resources/" alt="Additional Resources"><i class="icon-medkit"></i>Additional Resources</a></li>
                            </ol>
                        <p>Following is a list of all the activities we have published on the Safe Zone Project (but we're always adding more). We encourage you to scroll through the list, click on any that spark your interest to read more about them, and use them in your workshops. The various categories each activity falls into are below the title, and the color signifies the type of activity (see the Activity Finder for a reference).</p>
                        </div>
                        
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
			
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #all-activities -->

<?php get_footer(); ?>
