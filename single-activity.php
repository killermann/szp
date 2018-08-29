<?php get_header(); ?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">

				<div id="inner-content" class="wrap clearfix stickem-container">
                        <header class="article-header cat-bg clearfix stickem">                   

                            <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
                            <div class="header-buttons">
                            	<ul>
                                	<li><a class="cat-bg-light cat-text-dark icon-download-alt" href="<?php the_field('pdf')?>" alt="Download this Activity as a PDF"></a></li>
                                    <li><a class="cat-bg-light cat-text-dark icon-copy" target="_blank" href="<?php the_field('copy_paste')?>" alt="View Copy/Paste Friendly"></a></li>
                                    <li><a class="cat-bg-light cat-text-dark icon-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()?>" alt="Share this Activity on Facebook"></a></li>
                                    <li><a class="cat-bg-light cat-text-dark icon-twitter" target="_blank" href="http://twitter.com/share?text=<?php the_field('twitter_text')?>" alt="Tweet about this Activity"></a></li>
                            </div>
                            
                        </header> <!-- end article header -->


						<div id="main" class="eightcol first clearfix" role="main">
                        	<div class="excerpt cat-text">
                            	<?php echo get_the_excerpt() ?>
                           	</div>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<section class="entry-content clearfix">

									<?php the_content(); ?>

								</section> <!-- end article section -->

								<footer class="article-header">
									

								</footer> <!-- end article footer -->


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
												<p><?php _e("This is the error message in the single-custom_type.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->
                        
                        <div class="clearfix activity-deets fourcol last cat-text">
                            <ul>
                                <!--<li class="head"><h3>LABELED:</h3></li>-->
                                <li class="type"><?php echo get_the_term_list( get_the_ID(), 'activity_type', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                <li class="level"><?php echo get_the_term_list( get_the_ID(), 'activity_level', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                <li class="trust"><?php echo get_the_term_list( get_the_ID(), 'activity_trust', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                <li class="time"><?php echo get_the_term_list( get_the_ID(), 'activity_time', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                <li class="subject"><?php echo get_the_term_list( get_the_ID(), 'activity_subject', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                                <li class="themes clearfix"><?php echo get_the_term_list( get_the_ID(), 'activity_themes', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
                            </ul>
                        </div>

                        
						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
	</script>

<?php get_footer(); ?>