<?php get_header(); ?>

			<div id="content" class="archive <?php $post_type = get_post_type( $post->ID ); echo $post_type;?>">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix" role="main">
						<h1 class="archive-title"><span><?php _e('Search Results for:', 'bonestheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<div class="searchFormBig"><?php get_search_form(); ?></div>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix activity'); ?> role="article">

								<header class="article-header">

									<h3 class="h2 cat-bg"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?> <i class="icon-share-sign"></i></a></h3>
                                    
								</header> <!-- end article header -->

								<section class="entry-content clearfix">
                                	
									<?php the_excerpt(); ?>
                                                                        
                                    <div class="clearfix activity-deets cat-text">
                                        <ul>
                                            <li class="type"><?php echo get_the_term_list( get_the_ID(), 'activity_type', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                            <li class="level"><?php echo get_the_term_list( get_the_ID(), 'activity_level', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                            <li class="trust"><?php echo get_the_term_list( get_the_ID(), 'activity_trust', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                            <li class="time"><?php echo get_the_term_list( get_the_ID(), 'activity_time', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                            <li class="subject"><?php echo get_the_term_list( get_the_ID(), 'activity_subject', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                            <li class="themes"><?php echo get_the_term_list( get_the_ID(), 'activity_themes', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                        </ul>
                                    </div>
								</section> <!-- end article section -->

								<footer class="article-footer clearfix">
                                	<a class="archive-jump-to" href="<?php the_permalink() ?>" alt="Bookmark"><span class="icon-share-sign"></span> View</a>

								</footer> <!-- end article footer -->

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

							
									<article class="no-search-results clearfix activity" role="article">

										<header class="article-header">

											<h3 class="h2 cat-bg">
												<a>We don't have anything matching that <i class="icon-frown"></i></a>
											</h3>
		                                    
										</header> <!-- end article header -->

										<section class="entry-content clearfix">
											<p><strong>There are a few things we can do here.</strong>

											You can try another search keyword above and hope that works, or if you're looking for an activity, it might be better to browse from the <a href="http://thesafezoneproject.com/all-activities" alt="All Activities">All Activities</a> page. Also, if the thing you were looking for doesn't happen to be a think we have here &mdash; and you think it should be here &mdash; <a href="http://thesafezoneproject.com/contact" alt="Contact Us">let us know.</a></p>
		                                			                                                                        
		                                    <div class="clearfix activity-deets cat-text">
		                                        <ul>
		                                            <li>
		                                            	<a href="http://thesafezoneproject.com" alt="Home">
		                                            		Take Me Home
		                                            	</a>
		                                            </li>
		                                            <li>
		                                            	<a href="http://thesafezoneproject.com/all-activities" alt="All Activities">
		                                            		Browse All Activities
		                                            	</a>
		                                            </li>
		                                            <li>
		                                            	<a href="http://thesafezoneproject.com/services" alt="All Activities">
		                                            		Check Out Services Offered
		                                            	</a>
		                                            </li>
		                                        </ul>
		                                    </div>
										</section> <!-- end article section -->

										<footer class="article-footer clearfix">
		                                	<a class="archive-jump-to" href="http://thesafezoneproject.com" alt="Home"><span class="icon-share-sign"></span> Home</a>

										</footer> <!-- end article footer -->

									</article> <!-- end article -->

							<?php endif; ?>

						</div> <!-- end #main -->

							<?php get_sidebar(); ?>

					</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
