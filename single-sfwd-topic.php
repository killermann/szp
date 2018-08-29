<?php get_header(); ?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">

				<div id="inner-content" class="wrap clearfix stickem-container">
					<div id="pre-content">
						<nav id="breadcrumbs-container" class="cellHide">
							<p id="breadcrumbs">
								<a href="https://thesafezoneproject.com/resources/courses" alt="All Courses">
									<i class="far fa-fw fa-laptop"></i> All Courses
								</a>
							</p>
						</nav>
						<nav id="help">
							<a href="https://docs.google.com/forms/d/e/1FAIpQLSdYUiMtH8Rqiy3YYpFb6QTt6cwQdc2ZfYKTcZAj6LueQKQYsg/viewform?usp=pp_url&entry.1186084752=Self-Guided+Foundational+Safe+Zone+Training" target="_blank">
								Problem? Let us know <i class="far fa-fw fa-bug"></i>
							</a>
						</nav>
					</div>
					<div id="the-content" class="clearfix">


						<div id="main" class="eightcol first clearfix" role="main">
							<header class="article-header cat-bg sticky">
								<h1 class="single-title"><?php the_title(); ?></h1>
								<div class="header-buttons">
									<ul>
										<?php if( get_field('pdf') ): ?>
										<li><a onclick="gtag('event', 'click', { 'event_category': 'Course Header Buttons', 'event_action': 'Click', 'event_label': 'Download Materials'});" class="tip far fa-download" title="Download Materials" href="<?php the_field('pdf')?>" alt="Download Materials"></a></li>
										<?php endif; if( get_field ('google_drive') ): ?>
										<li><a onclick="gtag('event', 'click', { 'event_category': 'Course Header Buttons', 'event_action': 'Click', 'event_label': 'View Google Doc'});" class="tip fab fa-google-drive" target="_blank" title="View Google Doc" href="<?php the_field('google_drive')?>" alt="View as Google Doc"></a></li>
										<?php endif; if( get_field ('google_drive') ):?>
										<li><a onclick="gtag('event', 'click', { 'event_category': 'Course Header Buttons', 'event_action': 'Click', 'event_label': 'Copy to my Google Drive'});" class="tip far fa-copy" target="_blank" title="Copy to my Google Drive" href="<?php the_field('google_drive')?>/copy" alt="Copy to my Google Drive"></a></li>
										<?php endif;?>
										<li><a onclick="gtag('event', 'click', { 'event_category': 'Course Header Buttons', 'event_action': 'Click', 'event_label': 'Print this Page'});" class="tip far fa-print" target="_blank" title="Print this Page" href="javascript:window.print()" alt="Print this Page"></a></li>
									</ul>
								</div>
							</header> <!-- end article header -->


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
