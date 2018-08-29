<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix" style="float:none; margin:0 auto;">

						<div id="main" class="twelvecol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
									
								</header> <!-- end article header -->

								<section class="entry-content clearfix" itemprop="articleBody">
									<div id="childPageContainer" class="twelvecol first clearfix">
										<?php $args = array(
								                'post_parent' => $post->ID,
								                'post_type' => 'page',
								                'orderby' => 'menu_order'
								            );

								            $child_query = new WP_Query( $args );

								           	while ( $child_query->have_posts() ) : $child_query->the_post();
								           		
								           		childPageLoop();

								           	endwhile;

								       		wp_reset_postdata();?>
								 	</div>

									<?php the_content(); ?>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>

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
												<p><?php _e("This is the error message in the page.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

                            <?php szp_hook_after_full_width() ?>
                        
						</div> <!-- end #main -->

					<div id="page-utmof" class="first twelvecol clearfix">
                        <a href="<?php echo home_url(); ?>/unlocking-the-magic-of-facilitation-by-sam-killermann-meg-bolger" alt="Unlocking the Magic of Facilitation, a book by Sam Killermann and Meg Bolger">
                            <img src="<?php echo home_url(); ?>/wp-content/themes/szp/library/images/banner-unlocking-the-magic-of-facilitation.jpg" alt="Unlocking the Magic of Facilitation, a book by Sam Killermann and Meg Bolger"/>
                        </a>
                    </div>


				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
