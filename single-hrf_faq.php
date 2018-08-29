
<?php get_header(); ?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">

				<div id="inner-content" class="center-wrap clearfix">
						 

                        <header class="article-header cat-bg clearfix">
	                        <span id="headerCatFaq">
	                        	<a href="http://thesafezoneproject.com/about/faqs/" alt="All FAQs">FAQ:</a>
							</span>

                            <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
                            <div class="header-buttons">
                            	<ul>
                                    <li><a class="cat-bg-light cat-text-dark icon-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()?>" alt="Share this Activity on Facebook"></a></li>
                                    <li><a class="cat-bg-light cat-text-dark icon-twitter" target="_blank" href="http://twitter.com/share?text=<?php the_field('twitter_text')?>" alt="Tweet about this Activity"></a></li>
                              	</ul>
                            </div>
                            
                        </header> <!-- end article header -->


						<div id="main" class="eightcol first clearfix" role="main">
                        	
                        	<div class="excerpt cat-text">
                            	<?php echo get_the_excerpt() ?>
                           	</div>
                            
                            <div id="thumbnail-container">
								<?php the_post_thumbnail('full') ?>
                            </div>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
								<?php szp_hook_before_post() ?>

								<section class="entry-content clearfix">

									<?php the_content(); ?>

								</section> <!-- end article section -->

								<footer class="article-footer">
									<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>

								</footer> <!-- end article footer -->

								<?php comments_template(); ?>

							</article> <!-- end article -->

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->

					<div id="sidebar_container" class="last fourcol clearfix">
	                   
	                    <div id="sidebar1" class="sidebar" role="complementary">
	                    	<h2>More FAQs</h2>
	                    	<?php echo do_shortcode('[hrf_faqs orderby="rand" number="7"]')?>
	                    </div>
	            	</div>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
