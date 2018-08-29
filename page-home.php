<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<div id="content">

	<section id="home-intro" class="flex flex-space-between mobile-col">
        <div class="bigpad">
        	<h2>
                The Safe Zone Project is a free online resource for powerful, effective LGBTQ awareness and ally training workshops
            </h2>
        </div>
        <div id="home-intro--big-download" class="flex flex-col">
			<span class="blue"><?php get_download_brag();?></span>
			<?php get_curriculum_covers() ?>
		</div>
    </section><!--/home-title-->
	<section id="about-szp" class="flex flex-centered blue-bg bigpad mobile-col">
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

	<section class="flex mobile-col">
		<div class="learn-teach bigpad">
			<h2>
				Teach Others
			</h2>
			<a class="flex hovercard flex-centered" href="https://thesafezoneproject.com/teach" alt="Teach">
				<div class="image pad">
					<i class="far green fa-4x fa-fw fa-chalkboard-teacher"></i>
				</div>
				<div class="text pad">
					<p class="blurb">
						You can start with our <strong>Foundational 2-hour Curriculum</strong> (includes facilitator guide), then dig into <strong>train-the-trainer resources &amp; activities</strong>.
					</p>
				</div>
			</a>
			<a class="biglink" href="https://thesafezoneproject.com/teach" alt="Teach Others">
				Get started teaching <i class="far fa-long-arrow-right"></i>
			</a>
		</div><!--/learn-teach-->
		<div class="learn-teach bigpad">
			<h2>
				Learn Yourself
			</h2>
			<a class="flex hovercard flex-centered" href="https://thesafezoneproject.com/learn" alt="Learn Yourself">
				<div class="image pad">
					<i class="far green fa-4x fa-fw fa-user-graduate"></i>
				</div>
				<div class="text pad">
					<p class="blurb">
						We offer <strong>self-guided, online courses</strong> for folks hoping to learn more about gender, sexuality, and LGBTQ identities and experiences.
					</p>
				</div>
			</a>
			<a class="biglink" href="https://thesafezoneproject.com/learn" alt="Learn Yourself">
				Get started learning <i class="far fa-long-arrow-right"></i>
			</a>
		</div><!--/learn-teach-->
	</section><!--/flex-->

	<section id="our-goal" class="yellow-bg cellHide">
		<div class="flex">
			<div class="quarter order-3 white-30-bg flex flex-centered">
				<i class="far yellow-dark fa-5x fa-flag"></i>
			</div>
			<div class="half pad order-1">
				<h2 class="white">Our Goal</h2>
				<p>
					Our mission is to create and provide free online resources to make your Safe Zone trainings (and all of your LGBTQ+ educational opportunities) effective, fun, dynamic, and impactful.
				</p>
			</div>
			<div class="quarter flex order-2 flex-centered">
				<a class="biglink" href="https://thesafezoneproject.com/mission" alt="Read about our Mission">
					Our Mission <i class="far fa-long-arrow-right"></i>
				</a>
			</div>
		</div><!--/flex-->
		<div class="flex">
			<div class="quarter order-1 white-30-bg flex flex-centered">
				<i class="far yellow-dark fa-5x fa-hands-helping"></i>
			</div>
			<div class="half pad order-2">
				<h2 class="white">Help You</h2>
				<p>
					We'll take as much off your plate as possible, providing you curricula, activities, train-the-trainer planning, and tips to help you and your team become all-stars.
				</p>
			</div>
			<div class="quarter flex order-3 flex-centered">
				<a class="biglink" href="https://thesafezoneproject.com/help" alt="Read about our help">
					All Help <i class="far fa-long-arrow-right"></i>
				</a>
			</div>
		</div><!--/flex-->
		<div class="flex">
			<div class="quarter order-3 white-30-bg flex flex-centered">
				<i class="far yellow-dark fa-5x fa-chart-line"></i>
			</div>
			<div class="half pad order-1">
				<h2 class="white">Do Better</h2>
				<p>
					Safe Zone trainings are unique educational opportunities, and we are all about making the most of those opportunities. Sometimes you only get one chance. Let us help you raise the bar.
				</p>
			</div>
			<div class="quarter flex order-2 flex-centered">
				<a class="biglink" href="https://thesafezoneproject.com/teach" alt="Get started teaching">
					Get Started <i class="far fa-long-arrow-right"></i>
				</a>
			</div>
		</div><!--/flex-->
	</section><!--/our-goal-->

	<section id="resource-center-wrap" class="pad">
		<div id="resource-center">
			<header class="resource-center--header">
				<a href="resources"><h2>Resource Center</h2></a>
				<div class="flex flex-centered">
					<i class="far orange fa-4x fa-box-heart"></i>
					<p>
						The SZP is not any particular college’s resource center: it’s a resource we created for every college, university, organization, business, and community that wants to roll out safe zone trainings.
					</p>
				</div>
			</header>
			<section class="resources cards">
				<a href="https://thesafezoneproject.com/resources#handouts" class="card">
					<header class="orange-bg">
						<h3 class="white">
							Handouts
						</h3>
					</header>
					<section>
						<p class="blurb">
							SZP Handouts, Printables, &amp; Edugraphics
						</p>
						<i class="far fa-3x orange fa-print"></i>
					</section>
				</a>
				<a href="https://thesafezoneproject.com/resources#websites" class="card">
					<header class="orange-bg">
						<h3 class="white">
							Websites
						</h3>
					</header>
					<section>
						<p class="blurb">
							Websites for Learning more about LGBTQ+ issues
						</p>
						<i class="far fa-3x orange fa-browser"></i>
					</section>
				</a>
				<a href="https://thesafezoneproject.com/resources#organizations" class="card">
					<header class="orange-bg">
						<h3 class="white">
							Organizations
						</h3>
					</header>
					<section>
						<p class="blurb">
							LGBTQ-Focused Organizations doing good
						</p>
						<i class="far fa-3x orange fa-building"></i>
					</section>
				</a>
				<a href="https://thesafezoneproject.com/resources#read" class="card">
					<header class="orange-bg">
						<h3 class="white">
							Read/Watch
						</h3>
					</header>
					<section>
						<p class="blurb">
							Recommended reading &amp; watching
						</p>
						<i class="far fa-3x orange fa-book"></i>
					</section>
				</a>
				<a href="https://thesafezoneproject.com/resources#facilitate" class="card">
					<header class="orange-bg">
						<h3 class="white">
							Facilitation
						</h3>
					</header>
					<section>
						<p class="blurb">
							Tips, tools, and resources for Safe Zone facilitation
						</p>
						<i class="far fa-3x orange fa-magic"></i>
					</section>
				</a>
				<div class="biglinkcard flex flex-centered">
					<a class="biglink" alt="Read the Blog" href="https://thesafezoneproject.com/blog">
						All Resources <i class="far fa-long-arrow-right"></i>
					</a>
				</div>
			</section>
			<section class="pad text-center popularSearches-wrap">
				<h3><i class="far fa-search fa-lg"></i> Commonly Searched for</h3>
				<?php get_popular_searches();?>
			</section>

		</div>
	</section><!--/resource-center-->
	<section id="help-wrap" class="flex flex-centered mobile-col">
		<div id="howcanwehelp" class="text-center pad">
			<div>
				<h2 class="highlighted red-bg">
					How can we help you?
				</h2>
			</div>
			<div class="pad">
				<i class="far fa-hands-helping fa-6x red"></i>
			</div>
			<div class="biglinks">
				<a class="biglink" alt="How to Use this Site" href="https://thesafezoneproject.com/help/how-to-use-this-site/">
					How to Use this Site <i class="far fa-long-arrow-right"></i>
				</a>
				<a class="biglink" alt="Uncopyright" href="https://thesafezoneproject.com/help/uncopyright">
					Uncopyright <i class="far fa-long-arrow-right"></i>
				</a>
				<a class="biglink" alt="All Help" href="https://thesafezoneproject.com/help">
					All Help <i class="far fa-long-arrow-right"></i>
				</a>
			</div>
		</div>
		<div class="type-wrap">
			<div class="text-center">
				<h3 class="red"><i class="far fa-lg fa-question-circle"></i> Frequently Answered Questions</h3>
			</div>
			<div class="faq-box pad">
				<?php echo do_shortcode('[hrf_faqs category="home-faq" number="7"]')?>
			</div>
			<p class="text-center">
				<a class="biglink" alt="All FAQs" href="https://thesafezoneproject.com/help/faqs">
					All FAQs <i class="far fa-long-arrow-right"></i>
				</a>
			</p>
		</div>
	</section>

	<div class="interstitial cellHide">
		<?php get_curriculum_covers();?>
		<small class="asterisk">*Gotcha. No catch here. Just figured you’d be expecting one <i class="far fa-smile-beam"></i></small>
	</div>


    <section id="recent-blogs">
		<div class="pad flex flex-space-between">
			<div class="subhead">
    			<h2>From the Blog</h2>
			</div>
			<a class="biglink" alt="Read the Blog" href="https://thesafezoneproject.com/blog">
				Read all <i class="far fa-long-arrow-right"></i>
			</a>
		</div>
		<?php $the_query = new WP_Query( 'showposts=5' ); ?>
        <div class="cards carousel">
            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <?php blogCards();?>
            <?php endwhile;?>
        </div>
    </section><!--/recent-blogs-->


</div> <!-- end #content -->

<?php get_footer(); ?>
