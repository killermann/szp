<?php get_header(); ?>
<?php $download_id = get_the_ID();?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">
				<header class="article-header clearfix">
					<div class="sixcol first">
						<a id="all-courses-link" href="https://thesafezoneproject.com/resources/courses" alt="SZP Courses">A <strong>Safe Zone Project</strong> Course</a>

						<h1><span><?php the_title(); ?></span></h1>
						<div class="header-buttons flex flex-align-center">
							<a class="biglink" href="#learndash_course_content" alt="Syllabus">Syllabus <i class="far fa-arrow-down"></i></a>
							<a class="biglink" href="#Course-FAQ" alt="Frequently Answered Questions">FAQ <i class="far fa-arrow-down"></i></a>
							<a class="button button-rainbow" href="#Sign-Up" alt="Sign Up Now">Sign Up Now</a>
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

						<div class="excerpt text-center pad fourcol last">
							<?php echo get_the_excerpt() ?>
						</div>

						<div id="main" class="type-wrap" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

								<section class="entry-content">

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
								<?php if( get_field('course_id') ): $course_id = get_field('course_id');?>
								<section>
									<div class="course-info type-wrap">
										<h2>Included in this Course</h2>
										<p>Our courses are made up of a collection of <strong>lessons</strong>, and different <strong>topics</strong> within those lessons. We use <strong>worksheets</strong> and <strong>quizzes</strong> to complement your learning.</p>
										<p>Here's a run-down of <strong><?php the_title();?></strong> by the numbers:</p>
									</div>
									<div id="course-by-the-numbers" class="flex flex-centered text-center">
										<div class="flex flex-centered">
											<i class="far fa-2x fa-fw fa-backpack blue"></i>
											<h3><?php the_field('number_of_lessons', $course_id);?> Lessons</h3>
										</div>
										<div class="flex flex-centered">
											<i class="far fa-2x fa-fw fa-apple-alt green"></i>
											<h3><?php the_field('number_of_topics', $course_id);?> Topics</h3>
										</div>
										<div class="flex flex-centered">
											<i class="far fa-2x fa-fw fa-keyboard yellow"></i>
											<h3><?php the_field('number_of_words', $course_id);?> Words</h3>
										</div>
										<div class="flex flex-centered">
											<i class="far fa-2x fa-fw fa-file-edit orange"></i>
											<h3><?php the_field('number_of_worksheets', $course_id);?> Worksheets</h3>
										</div>
										<div class="flex flex-centered">
											<i class="far fa-2x fa-fw fa-clipboard-check red"></i>
											<h3><?php the_field('number_of_quizzes', $course_id);?> Quizzes</h3>
										</div>
										<?php if( get_field('number_of_certificates', $course_id) ) : ?>
											<div class="flex flex-centered">
												<i class="far fa-2x fa-fw fa-file-certificate purple"></i>
												<h3><?php the_field('number_of_certificates', $course_id);?> Certificate</h3>
											</div>

										<?php else: ?>
											<div class="flex disabled flex-centered tip" title="This course does not grant a certificate upon completion">
												<i class="far fa-2x fa-fw fa-file-certificate"></i>
												<h3>No Certificate</h3>
											</div>
										<?php endif;?>
									</div>
								</section>

								<?php endif;?>

								<section class="course-info" id="Sign-Up">
									<h2>Enroll Now &amp; Get Started</h2>
									<p>Our courses, like the rest of our resources, are <strong>offered in the spirit of the gift economy</strong>. What this means is you decide what to pay for this course, based on your gratitude, ability to pay, or sense of what is fair.</p>
									<p>We trust you to select the option that is right for you:</p>
									<h3>Individual Tuition Options</h3>
									<?php echo do_shortcode('[purchase_link id="' . $download_id . '" text="Enroll Now" style="button"]')?>

									<h3>Group, Organization, & Institutional Tuition Options</h3>
									<p style="margin:0;">Are you looking to enroll a group of people that you represent or are affiliated with? (e.g., a university department, organization division, or institution as a whole) in this course? Great! <a href="https://thesafezoneproject.com/group-tuition/" title="Group, Org, & Institutional Tuition Rates">Click here.</a></p>
									
									<?php if(get_field('certificate_version')): ?>
									<h3><i class="far fa-lg fa-file-certificate"></i> Want a Certificate?</h3>
									<p style="margin:0;">This same course, <strong><?php the_title();?></strong>, is available as a certificate course. <a href="<?php the_field('certificate_version');?>/#Sign-Up" title="Enroll in the Certificate Version of this Course">Click here to enroll in that version</a>.</p>
									<?php endif; if(get_field('non_certificate_version')): ?>
									<h3><i class="far fa-lg fa-times"></i> Don't need a Certificate?</h3>
									<p style="margin:0;">This same course, <strong><?php the_title();?></strong>, is available as a non-certificate course, which has a full scholarship tuition option. <a href="<?php the_field('non_certificate_version');?>/#Sign-Up" title="Enroll in the Non-Certificate Version of this Course">Click here to enroll in that version</a>.</p>
									<?php endif; ?>

								</section>

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
						<?php echo do_shortcode('[hrf_faqs category="pre-enrolled-faq"]')?>
					</div>
					<h2>Have more questions for us?</h2>
					<p>If you're considering a course, but aren't sure if it's a good fit for you, <a href="https://thesafezoneproject.com/contact" alt="Contact Us">contact us</a> and ask whatever question you have.</p>
				</section>

				<section class="pad type-wrap">
					<h2>No questions? Get started learning.</h2>
					<?php echo do_shortcode('[purchase_link id="' . $download_id . '" text="Enroll Now" style="button"]')?>

					<p>Are you looking to enroll a group of people that you represent or are affiliated with? (e.g., a university department, organization division, or institution as a whole) in this course? Great! <a href="https://thesafezoneproject.com/group-tuition/" title="Group, Org, & Institutional Tuition Rates">Click here.</a></p>
				</section>

			</div> <!-- end #content -->
<?php get_footer(); ?>
