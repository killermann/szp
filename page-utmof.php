<?php
/*
Template Name: Unlocking the Magic
*/
?>

<?php get_header(); ?>

			<div id="content" class="clearfix">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="ninecol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header> <!-- end article header -->
								<div class="excerpt cat-text">
	                            	11 Key Concepts You Didn't Know You Didn't Know
	                           	</div>

	                            <div id="thumbnail-container">
									<a href="https://facilitationmagic.com" alt="Get the Book"><?php the_post_thumbnail('full') ?></a>
	                            </div>

	                            <div id="getthebook" class="homeCard clearfix">
		                                <a href="https://bit.ly/UtMoFaz" alt="Amazon" target="_blank" class="button">
		                                    <i class="icon-shopping-cart"></i>
		                                    Paperback
		                                </a>
		                                <a href="https://gum.co/utmof" alt="Download on Gumroad" target="_blank" class="button">
		                                    <i class="icon-download"></i>
		                                    E-Book
		                                </a>
		                                <a href="https://bit.ly/UtMoFpwt" alt="Pay with a tweet" target="_blank" class="button button-wide">
		                                    <i class="icon-twitter"></i>
		                                    Pay with a Tweet
		                                </a>
		                        </div><!--/getthebook-->

	                            <div class="bookbyus"><p>A book co-authored by Safe Zone Project co-creators <strong>Sam Killermann</strong> <span class="amp">&amp;</span> <strong>Meg Bolger</strong></p></div>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>

									<a class="sixcol first getthebook" href="https://bit.ly/UtMoFaz"><i class="icon-book"></i> Get the Book</a> <a class="sixcol last getthebook" href="https://facilitationmagic.com"><i class="icon-star"></i> Read More</a>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>

								</footer> <!-- end article footer -->

							</article> <!-- end article -->

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the page-custom.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
