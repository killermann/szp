<?php
/*
Template Name: Team Page
*/
?>

<?php get_header(); ?>

			<div id="content" class="team">

				<div id="inner-content" class="wrap clearfix">
					<div id="pre-content">
						<nav id="breadcrumbs-container" class="cellHide" aria-label="breadcrumb">
							<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');}?>
						</nav>
					</div>
					<div id="main" class="clearfix" role="main">
						<div class="featuredImage"><?php the_post_thumbnail('full') ?></div>

					 	<?php $args = array(
							'post_parent' => $post->ID,
							'post_type' => 'page',
							'orderby' => 'menu_order'
						);
						$child_query = new WP_Query( $args );
						if ( $child_query->have_posts() ) { ?>
						<nav id="childPageContainer" class="sticky" role="navigation">
							<ul class="flex">
								<?php while ( $child_query->have_posts() ) : $child_query->the_post();?>
								<li>
									<a href="<?php the_permalink();?>" alt="<?php the_title();?>">
										<span><?php the_title();?></span>
									</a>
								</li>
								<?php endwhile;?>
							<?php wp_reset_postdata();?>
							</ul>
						</nav>
						<?php };?>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

							<header class="page-header">
								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							</header> <!-- end article header -->

							<section class="entry-content clearfix" itemprop="articleBody">
								<?php edit_post_link(); ?>
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

                        <?php szp_hook_after_page() ?>

					</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
				<div id="TeamFAQ" class="clearfix">
					<div class="wrap">
						<div class="twelvecol first clearfix">
							<div class="sixcol first clearfix">
								<h3>Articles about the Team</h3>

								<?php query_posts(array(
									'showposts' => 4,
									'post_type' => 'post',
									'cat' => '72',
									)
								); if ( have_posts() ) : while ( have_posts() ) : the_post();

								loopMinimal(); endwhile; else: endif; ?>

								<a style="display:inline-block;margin:8px auto;" class="button" href="https://thesafezoneproject.com/category/team/" alt="All Team Articles">View All Team Articles <i class="icon-share-sign"></i></a>
							</div>
							<div class="sixcol last clearfix">
								<h3>Get questions answered</h3>
								<?php echo do_shortcode( '[hrf_faqs category="team"]');?>
								<a style="display:inline-block;margin:10px auto;"class="button" href="https://thesafezoneproject.com/about/faqs/" alt="All FAQs">View All FAQs <i class="icon-share-sign"></i></a>
							</div>
						</div>
					</div><!--/wrap-->
				</div><!--/section-->

				<div id="CoCreators" class="section section-alt clearfix">
					<div class="wrap">
						<h2>Hi! We're the SZP Co-Creators.</h2>
						<div class="bio sixcol first">
							<h3><a href="https://thesafezoneproject.com/about/team/about-meg-bolger" alt="About meg Bolger">Meg Bolger</a> <small>(she or they)</small></h3>
							<a href="https://thesafezoneproject.com/about/teamabout-meg-bolger" alt="About meg Bolger"><img class="sixcol last" src="https://thesafezoneproject.com/wp-content/uploads/2017/07/meg-bolger-safe-zone-project-co-creator-3.jpg" alt="Meg Bolger, Safe Zone Project Co-Creator"></a>
							<p>
								Hey! I’m Meg and I’m a social justice facilitator, educator, and writer. I am one of the co-creators of The Safe Zone Project. Safe Zone trainings are near and dear to my heart both as a member of the LGBTQ+ community and as the place I started facilitating social justice. I’m a huge facilitation geek. I co-authored a book on facilitation, <a href="https://facilitationmagic.com">Unlocking the Magic of Facilitation</a>, and help co-facilitate another free online resource (for facilitators) called <a href="https://facilitating.xyz">FacilitatingXYZ</a>.
							</p>
							<p>
								When not doing LGBTQ+ work with The Safe Zone Project and trans inclusion education with <a href="https://www.ventureoutproject.com/">The Venture Out Project</a>, I support organizations on their inclusion, equity, and social justice initiatives through my organization <a href="https://sameteam.xyz">Same Team</a>. I hibernate in the gorgeous city of Seattle, WA, where I search for empty skate parks and the best cinnamon rolls in town.
							</p>
							<p>
								<a href="https://thesafezoneproject.com/about/team/about-meg-bolger" alt="About Meg Bolger">Keep Reading... <i class="icon-arrow-right"></i></a>
							</p>
						</div>
						<div class="bio sixcol last">
							<h3><a href="https://thesafezoneproject.com/about/team/about-sam-killermann" alt="About Sam Killermann">Sam Killermann</a> <small>(he or they)</small></h3>
							<a href="https://thesafezoneproject.com/about/team/about-sam-killermann" alt="About Sam Killermann"><img class="sixcol last" src="https://thesafezoneproject.com/wp-content/uploads/2017/07/sam-killermann-safe-zone-project-co-creator.jpg" alt="Sam Killermann, Safe Zone Project Co-Creator"></a>
							<p>
								Howdy! I’m Sam and I'm an author, storyteller, and doodler &mdash; all of which I use for gender &amp; sexuality education. This project strums my heartstrings because it was in Safe Zone trainings in college that I was first given the opportunity to seek answers about gender, sexuality, and identity without shame or ridicule. Those conversations helped me find myself, and led me to a life of allyship and activism.
							</p>
							<p>
								Here, my role is split between <a href="https://thesafezoneproject.com/services/train-the-trainers/" alt="Safe Zone Train the Trainers">training trainers</a>, writing curriculum, and improving the online resource. I also serve as the Director of Creativity for <a href="https://hues.xyz" alt="hues">hues</a>, a global justice collective that The Safe Zone Project is part of, where I perform <a href="https://itspronouncedmetrosexual.com/programs" alt="IPM Shows">social justice comedy shows</a>, <a href="https://samtalkto.us" alt="Sam Killermann Speaking">give keynotes and TEDxTalks</a>, <a href="https://www.samuelkillermann.com/writing/" alt="Sam Killermann Writing">write books and articles</a>, and <a href="https://everyshirtispolitical.com" alt="Every Shirt is Political">make t-shirts</a>. I live in Austin, TX because I'm lucky. And yes, that's my real last name (sorry).
							</p>
							<p>
								<a href="https://thesafezoneproject.com/about/team/about-sam-killermann" alt="About Sam Killermann">Keep Reading... <i class="icon-arrow-right"></i></a>
							</p>
						</div>
					</div><!--/wrap-->
				</div><!--/section-->
				<div id="InternshipProgram" class="section clearfix">
					<div class="wrap">

						<div id="team__interns" class="twelvecol first clearfix">
							<h2><a href="https://thesafezoneproject.com/about/get-involved/internship-program/" alt="SZP Internship Program">The Safe Zone Project Internship Program</a></h2>
							<div class="eightcol first clearfix">
								<p>
									<big>
										Started in 2017, the SZP Internship Program was designed to create an opportunity for up-and-coming LGBTQ+ equality advocates and educators to get insight into the field, and hands-on training, and invaluable experience to apply to their future endeavors.
									</big>
								<p>

								<p>
									The SZP Interns help with everyday operations, website and content improvements, outreach efforts, content development and upkeep, as well as complete a project of their own design, which is contributed to the Safe Zone Project, or the <a href="https://hues.xyz" alt="hues">hues</a> global justice collective.
								</p>
								<p>
									All interns receive guidance and mentorship from Meg &amp; Sam, t-shirts, books, and other swag from the SZP and other hues initiatives, and access to a massive platform to meaningfully influence change and contribute to global justice.
								<p>
								<p>
									<a href="https://thesafezoneproject.com/about/get-involved/internship-program/" alt="SZP Internship Program">Keep Reading...<i class="icon-arrow-right"></i></a>
								</p>
								<h3>Internship FAQs</h3>

								<?php echo do_shortcode( '[hrf_faqs category="internship"]');?>
							</div>
							<div class="fourcol last clearfix">
								<h3>3 Internship Terms</h3>
								<p>
									We have opportunities for one intern per term, and we accept applications on a rolling basis. <a class="button" href="https://hues.typeform.com/to/kmEVzu?term=xxxx" alt="Apply to Intern">Apply Now <i class="icon-external-link"></i></a>
								</p>

							</div><!--/fourcol-->
						</div><!--/section-->
					</div><!--/wrap-->
				</div><!--/section-->

			</div> <!-- end #content -->

<?php get_footer(); ?>
