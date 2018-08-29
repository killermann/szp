<?php get_header(); ?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">

				<div id="inner-content" class="wrap clearfix stickem-container">
					<div id="pre-content">
						<nav id="breadcrumbs-container" class="cellHide">
							<p id="breadcrumbs"><span><span><a href="https://thesafezoneproject.com/courses" ><i class="far fa-fw fa-home"></i></a> <i class="far fa-fw fa-chevron-right"></i> <span><a href="https://thesafezoneproject.com/courses">Courses</a> <i class="far fa-fw fa-chevron-right"></i> <span class="breadcrumb_last">Quiz: <?php the_title();?></span></span></span></span></p>
						</nav>
					</div>
					<div id="the-content" class="clearfix">


						<div id="main" class="eightcol first clearfix" role="main">


							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<section class="entry-content pad clearfix">

									<?php the_content(); ?>

								</section> <!-- end article section -->

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
						<?php get_sidebar('course');?>
					</div> <!--/the-content-->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>
