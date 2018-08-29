<?php get_header(); ?>

			<div id="content" class="<?php $post_type = get_post_type( $post->ID ); echo $post_type;?>">

				<div id="inner-content" class="wrap clearfix">
						<div class="entry-content">
							<header class="archive-header">
								<h1>Courses by The Safe Zone Project</h1>
							</header> <!-- end article header -->
							<?php the_archive_description( '', '' );?>
						</div><!--/entry-content archive intro-->

						<div id="main" class="eightcol isotope first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class('card course'); ?> role="article">
									<header>
										<h3>
											<a class="title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<div class="author">
											<em>Facilitated by:</em>
											<?php if ( function_exists( 'get_coauthors' ) ) {

											  $coauthors = get_coauthors();
											  foreach ( $coauthors as $coauthor ) {
												$archive_link = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename );
												$link_title = 'Posts by ' . $coauthor->display_name;
												?>
												<?php echo coauthors_get_avatar( $coauthor, 45 ); ?>
												<span class="name"><?php echo $coauthor->display_name;?></span>
												<?php
											  }
											// treat author output normally
											} else {
											  $archive_link = get_author_posts_url( get_the_author_meta( 'ID' ) );?>
												<a class="tip author-avatar" href="<?php echo esc_url( $archive_link ); ?>" title="Posts by <?php the_author(); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 30 ); ?></a>
												<span class="name"><?php the_author(); ?></span>
											  <?php
											}?>
										</div><!--/author-->
									</header><!--/bloggedImage-->
									<section>
										<div class="certificate-granting">
											<h4 class="tip" title="Students who complete this course will be granted a printable certificate"><i class="far fa-lg fa-file-certificate"></i> Certificate Course</h4>
										</div>
										<?php the_excerpt();?>
									</section>
									<footer class="flex flex-align-center flex-space-between">
										<span>
											<a class="biglink" href="<?php the_permalink() ?>" alt="Syllabus">Read More <i class="far fa-long-arrow-right"></i></a>
											<a class="biglink" href="<?php the_permalink() ?>/#learndash_course_content" alt="Syllabus">View Syllabus <i class="far fa-long-arrow-right"></i></a>
										</span>
										<a class="button button-rainbow" href="<?php the_permalink() ?>/#Sign-Up" alt="Start Now">Start Now</a>
									</footer>
							    </article> <!-- end blogged -->

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
						<aside class="fourcol last entry-content sticky-tablet" role="sidebar">
							<h3><i class="far fa-file-certificate fa-fw"></i> Course Certificates</h3>
							<p>Some courses provide certificates. They are:</p>
							<ul>
								<li>Printable, rainbow-beautiful, 8.5"x11" .PDFs</li>
								<li>Filled out with your name, the course name, and your completion date</li>
								<li>Accessible via your account in perpetuity</li>
							</ul>
							<a class="biglink" href="https://thesafezoneproject.com/help/contact" alt="Contact Meg &amp; Sam">
								Contact Meg &amp; Sam <i class="far fa-long-arrow-right"></i>
							</a>
						</aside><!--/fourcol-->
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
