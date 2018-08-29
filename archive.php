<?php get_header(); ?>

			<div id="content" class="<?php $post_type = get_post_type( $post->ID ); echo $post_type;?>">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<?php if (is_category()) { ?>
								<h1>
									<?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1>
									<?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1>

									<span><?php _e("By", "bonestheme"); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1>
									<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1>
										<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1>
										<span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix activity'); ?> role="article">

								<header class="article-header">

									<h3 class="h2 cat-bg"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?> <i class="icon-share-sign"></i></a></h3>
                                    
								</header> <!-- end article header -->

								<section class="entry-content clearfix">
                                	
									<?php the_excerpt(); ?>
                                                                        
                                    <div class="clearfix activity-deets cat-text">
                                        <ul>
                                            <!--<li class="head"><h3>LABELED:</h3></li>-->
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

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the archive.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>