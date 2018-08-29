<?php
/*
Template Name: Curriculum
*/
?>

<?php get_header(); ?>

			<div id="content">
				<header class="page-header tabs wrap">
					<a class="tab current" data-tab="curriculum" itemprop="headline" alt="Curriculum">
						Curriculum
					</a>
					<a class="tab" data-tab="activities" alt="Individual Activities">
						Activities
					</a>
				</header> <!-- end article header -->
				<section id="curriculum" class="tab-content current">
					<div id="curriculum-intro" class="intro-section flex flex-col clearfix">
						<div class="pad">
							<div class="excerpt">
								<?php the_excerpt();?>
							</div>
							<div>
								<a class="biglink inverted" href="https://thesafezoneproject.com/activities" alt="Browse All Activities">
									Browse All Activities <i class="far fa-long-arrow-right"></i>
								</a>
							</div>
						</div>
						<div class="pad flex-end">
							<?php get_big_download();?>
							<div class="speech-bubble">
								<p>
									Updated several times a year, our curriculum is perfect for 2-to-3-Hour Safe Zone Trainings. We encourage you to sign up for free updates when we make improvements (but it’s not required).
								</p>
							</div>
						</div>
					</div>
					<div id="curriculum-main" class="clearfix wrap" role="main">
						<div class="fourcol first">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
									<?php edit_post_link(); ?>
								</section> <!-- end article section -->

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
						</div><!--/fourcol-->
						<div class="eightcol last clearfix">
							<div class="sevencol first clearfix">
								<?php get_curriculum_covers();?>
							</div>
							<div id="olderVersions" class="fourcol last clearfix">
								<h3><i class="far fa-fw fa-history"></i> Old Editions</h3>
								<ul>
									<li>
										<a target="_blank" title="Download SZP Curriculum 3.0" class="tip flex" href="https://thesafezoneproject.com/wp-content/themes/szp/library/curriculum/The Safe Zone Project - Full Curriculum 3.0.zip">
											Edition 3.0
											<i class="far fa-download fa-fw"></i>
										</a>
									</li>
									<li>
										<a target="_blank" title="Download SZP Curriculum 2.5" class="tip flex" href="https://thesafezoneproject.com/wp-content/themes/szp/library/curriculum/The Safe Zone Project - Full Curriculum 2.5.zip">
											Edition 2.5
											<i class="far fa-download fa-fw"></i>
										</a>
									</li>
									<li>
										<a target="_blank" title="Download SZP Curriculum 2.0" class="tip flex" href="https://thesafezoneproject.com/wp-content/themes/szp/library/curriculum/The Safe Zone Project - Full Curriculum 2.0.zip">
											Edition 2.0
											<i class="far fa-download fa-fw"></i>
										</a>
									</li>
									<li>
										<a target="_blank" title="Download SZP Curriculum 1.1" class="tip flex" href="https://thesafezoneproject.com/wp-content/themes/szp/library/curriculum/The Safe Zone Project - Full Curriculum 1.1.zip">
											Edition 1.1
											<i class="far fa-download fa-fw"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>

					</div> <!-- end #main -->
					<div class="type-wrap">
						<div class="text-center"><h3 class="highlighted"><i class="far fa-question-circle"></i> Curriculum Questions &amp; Answers</h3></div>
						<div class="faq-box pad">
							<?php echo do_shortcode('[hrf_faqs category="curriculum-faq" number="-1"]')?>
						</div>
					</div>

				</section> <!-- /curriculum -->
				<section id="activities" class="tab-content">
					<div id="activities-intro" class="intro-section flex flex-col clearfix">
						<div class="pad">
							<div class="excerpt">
								<p>
									In addition to curricula, we have a collection of individual activities have you covered for à la carte LGBTQ+ educational opportunities
								</p>
							</div>
							<div>
								<a class="biglink inverted" href="https://thesafezoneproject.com/activities" alt="Use Activity Finder">
									Use the Activity Finder <i class="far fa-long-arrow-right"></i>
								</a>
							</div>
						</div>
						<div class="pad flex-end">
							<a href="https://thesafezoneproject.com/activities" alt="Use Activity Finder">
								<img src="<?php echo get_template_directory_uri(); ?>/library/images/szp-activity-finder.jpg" alt="Safe Zone Project Activity Finder">
							</a>
							<div class="speech-bubble">
								<p>
									Our activity finder will help you to filter activities by type, knowledge, trust, time, or subject.
								</p>
							</div>
						</div>
					</div>
					<div id="activities-main" class="clearfix wrap">
						<div class="activity-collections clearfix">
							<aside class="fourcol first entry-content sticky-tablet" role="sidebar">
								<h3><i class="far fa-check-circle fa-fw"></i> All activities are:</h3>
								<ul>
									<li>Tested & tweaked by us over dozens of workshops</li>
									<li>100% free for you — to download, distribute, customize, etc.</li>
									<li>Accompanied by facilitator guides, tips, discussion questions, and participant handouts</li>
									<li>Available as .PDFs and editable Google Drive Documents</li>
								</ul>
								<a class="biglink" href="https://thesafezoneproject.com/activities" alt="Use Activity Finder">
									View All Activities <i class="far fa-long-arrow-right"></i>
								</a>

							</aside><!--/fourcol-->
							<div class="eightcol last clearfix">
								<div class="type-wrap">
									<h3 class="collectionTitle">
										<i class="far fa-box-full"></i>
										<span>
											<small>Collection:</small><br/>
											Foundational Curriculum Activities
										<span>
									</h3>
									<?php $collectionFoundational = new WP_Query(
										array(
											'post_type' => 'activity',
											'category_name' => 'foundational-curriculum-activities',
											'orderby' => 'title',
											'order' => 'asc',
											'posts_per_page' => -1,
										)
									);
									while($collectionFoundational->have_posts()) : $collectionFoundational->the_post();
										archiveCards();
									endwhile; wp_reset_postdata(); ?>
								</div><!--/type-wrap-->
							</div><!--eightcol-->
						</div><!--/clearfix-->
						<div class="activity-collections clearfix">
							<aside class="fourcol last entry-content sticky-tablet" role="sidebar">
								<h3><i class="far fa-sync fa-fw"></i> Help us improve:</h3>
								<ul>
									<li>Suggest edits, typo fixes, or expansions of any activity</li>
									<li>Submit new activities for others to use</li>
									<li>Test out an activity with a particular population and report back</li>
								</ul>
								<a class="biglink" href="https://thesafezoneproject.com/help/contact" alt="Contact Meg &amp; Sam">
									Contact Meg &amp; Sam <i class="far fa-long-arrow-right"></i>
								</a>
							</aside><!--/fourcol-->
							<div class="eightcol first">
								<div class="type-wrap">
									<h3 class="collectionTitle">
										<i class="far fa-box-full"></i>
										<span>
											<small>Collection:</small><br/>
											Recently Added Activities
										<span>
									</h3>
									<?php $recentActivities = new WP_Query(
										array(
											'post_type' => 'activity',
											'posts_per_page' => 5,
										)
									);
									while($recentActivities->have_posts()) : $recentActivities->the_post();
										archiveCards();
									endwhile; wp_reset_postdata(); ?>
								</div><!--/type-wrap-->
							</div><!--/eight-->
						</div><!--/clearfix-->
						<div class="type-wrap">
							<div class="text-center"><h3 class="highlighted"><i class="far fa-question-circle"></i> Activity Questions &amp; Answers</h3></div>
							<div class="faq-box pad">
								<?php echo do_shortcode('[hrf_faqs category="activity-faq" number="-1"]')?>
							</div>

							<h3>Still looking for an activity?</h3>
							<p>Let us help you find it. We have dozens of activities waiting for you in the <a href="https://thesafezoneproject.com/activities" alt="All Activities">All Activities</a> directory. Head over there and poke around. We've likely got something to fit your needs.</p>
							<p>
								<a class="biglink" href="https://thesafezoneproject.com/activities" alt="Browse All Activities">
									Browse All Activities <i class="far fa-long-arrow-right"></i>
								</a>
							</p>
						</div>

					</div> <!-- end #main -->

				</section> <!-- /activities -->
				<?php szp_hook_after_page() ?>
			</div> <!-- end #content -->
<?php get_footer(); ?>
