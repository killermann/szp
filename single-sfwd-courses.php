<?php get_header(); ?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">
				<header class="article-header clearfix">
					<div class="sixcol first">
						<a id="all-courses-link" href="https://thesafezoneproject.com/courses" alt="SZP Courses">A <strong>Safe Zone Project</strong> Course</a>

						<h1><span><?php the_title(); ?></span></h1>
						<div class="header-buttons flex flex-align-center">
							<a class="biglink" href="#learndash_course_content" alt="Syllabus">Syllabus <i class="far fa-arrow-down"></i></a>
							<a class="biglink" href="#Course-FAQ" alt="Frequently Answered Questions">FAQ <i class="far fa-arrow-down"></i></a>
							<?php
							$buy_course_button = do_shortcode('[learndash_payment_buttons course_id='.get_the_ID().']');
							echo do_shortcode( '[visitor]' . $buy_course_button . '[/visitor]' );?>
						</div>
					</div>
					<div class="sixcol last">
						<div class="featuredImage">
							<?php the_post_thumbnail('full') ?>
						</div>
					</div>
				</header> <!-- end article header -->

				<div id="inner-content" class="wrap clearfix">

					<div id="the-content" class="clearfix">

						<div class="excerpt text-center pad">
							<?php echo get_the_excerpt() ?>
						</div>

						<div id="main" class="type-wrap clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<section class="entry-content clearfix">

									<?php the_content(); ?>

								</section> <!-- end article section -->
								<section class="course-info">
									<div id="postInfoBox">
										<h2>Course Facilitated by</h2>

										<div class="co-authors">
											<?php if ( function_exists( 'get_coauthors' ) ) {

											  $coauthors = get_coauthors();
											  foreach ( $coauthors as $coauthor ) {
											    $archive_link = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename );
											    $link_title = 'All by ' . $coauthor->display_name;
											    ?>
												<div class="author-profile flex">
													<div class="profilePic">
													    <a href="<?php esc_url( $archive_link ); ?>" class="tip author-link" title="<?php echo esc_attr( $link_title ); ?>"><?php echo coauthors_get_avatar( $coauthor, 120 ); ?>
														</a>
													</div>
													<div class="authorInfo">
														<h3 class="authorName clearfix"><?php echo $coauthor->display_name;?></h3>
														<div class="authorBio">
															<?php echo wp_kses_post( $coauthor->user_description ); ?>
													    </div>
													</div>
												</div>
											    <?php
											  }
											// treat author output normally
											} else {?>
												<div class="author-profile flex">
										            <div class="profilePic">
										                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '120' ); ?></a>
										            </div>
										            <div class="authorInfo">
										                <h4 class="authorName clearfix"><?php the_author_posts_link(); ?></h4>
										                <p class="authorBio"><?php the_author_description(); ?> </p>
										            </div>
										        </div>
											  <?php
											}?>
										</div><!--/co-authors-->
								    </div><!--/postInfoBox-->

								</section> <!-- end article footer -->


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

					</div> <!--/the-content-->
					<section id="about-courses" class="flex flex-centered blue-bg bigpad mobile-col">
						<div class="hovercard">
							<a href="https://thesafezoneproject.com/about/what-is-safe-zone/" alt="What is a Safe Zone Training?">
								<div class="image">
									<i class="far fa-4x fa-question-circle"></i>
								</div>
								<div class="text">
									<h3 class="title">
										What is a &ldquo;Safe Zone&rdquo; Training?
									</h3>
									<p class="blurb">
										Learn what makes a safe zone a safe zone.
									</p>
								</div>
							</a>
						</div><!--/hovercard-->
						<div class="hovercard">
							<a href="https://thesafezoneproject.com/about" alt="What is the Safe Zone Project?">
								<div class="image">
									<i class="far fa-4x fa-check-circle"></i>
								</div>
								<div class="text">
									<h3 class="title">
										What is The Safe Zone Project?
									</h3>
									<p class="blurb">
										Learn about the goals of this free online resource.
									</p>
								</div>
							</a>
						</div><!--/hovercard-->
						<div class="hovercard">
							<a href="https://thesafezoneproject.com/about/team" alt="Meet the team behind the SZP">
								<div class="image">
									<i class="far fa-4x fa-user-circle"></i>
								</div>
								<div class="text">
									<h3 class="title">
										Meet the team behind the SZP
									</h3>
									<p class="blurb">
										Learn about the co-creators, interns, and contributors.
									</p>
								</div>
							</a>
						</div><!--/hovercard-->
					</section><!--/flex-->

				</div> <!-- end #inner-content -->

				<section id="Course-FAQ" name="Course-FAQ" class="pad type-wrap">
					<h2><i class="far fa-lg fa-question-circle"></i> Online Course FAQ</h2>
					<div class="faq-box pad">
						<?php echo do_shortcode('[hrf_faqs category="online-course-faq"]')?>
					</div>
					<h2>Have more questions for us?</h2>
					<p>If you're considering a course, but aren't sure if it's a good fit for you, <a href="https://thesafezoneproject.com/contact" alt="Contact Us">contact us</a> and ask whatever question you have.</p>

					<?php
					$buy_course_button = do_shortcode('[learndash_payment_buttons course_id='.get_the_ID().']');
					echo do_shortcode( '[visitor]' . $buy_course_button . '[/visitor]' );?>
				</section>

			</div> <!-- end #content -->
<?php get_footer(); ?>
