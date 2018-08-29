<?php
/*
Template Name: Roadmap
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<nav id="toc" class="threecol sidebar last clearfix sticky-tablet" role="navigation">
			<h4><i class="far fa-list-alt"></i> Jump to</h4>
			<ol data-toc="section.roadmap" data-toc-headings="h2"></ol>
		</nav>

		<div id="main" class="ninecol first clearfix" role="main">
			<div class="entry-content">
				<header class="page-header">
					<h1 class="page-title" itemprop="headline"><i class="far fa-map-marker-check"></i> Project Roadmap</h1>
				</header> <!-- end article header -->
				<?php if (have_posts()) : while (have_posts()) : the_post();
					edit_post_link();
					the_content();
				endwhile; endif; ?>
				<p>
					<a class="biglink" href="https://thesafezoneproject.com/help/get-involved" title="Help Out">Help Out <i class="far fa-long-arrow-right"></i>
					</a>
					<a class="biglink" href="https://thesafezoneproject.com/about/team/#Hi!_We%E2%80%99re_the_SZP_Co-Creators" title="About the Tiny Team">About Meg & Sam <i class="far fa-long-arrow-right"></i>
					</a>
				</p>
			</div>

			<section class="roadmap">
				<article class="roadmapCard pad">
					<h2 class="text-center">Curricula</h2>
					<big>From our Foundational Safe Zone Curriculum, to translations of it, to 201s and affinity-focused... curricula & activities are our bread & butter.</big>
					<ul class="roadmap--projects">
						<li class="roadmap-item smallpad done accordion closed" data-content-id="roadmap-item-5th-edition">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Foundational 5th Edition</h3>
								<span class="flex roadmap-item--status">
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<a href="https://thesafezoneproject.com/curriculum"><i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i></a>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Done!"></div>
							<ul id="roadmap-item-5th-edition" class="roadmap-item--info">
								<li>Accessibility overhaul, including higher contrast ratios and more legible body text typefaces</li>
								<li>Added multiple training timelines</li>
								<li>Reworked lectures, framing, examples, and walkthrough for most activities</li>
								<li>Sprinkled more facilitator advice throughout, including several new “Unlock the Magic” tips</li>
								<li>New vocab terms and updated definitions</li>
							</ul><!--item-->
						</li>
						<li class="roadmap-item smallpad almost-done closed" data-content-id="roadmap-item-spanish">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Spanish-Language Translation</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-tasks red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Almost Done"></div>
						</li>
						<li class="roadmap-item smallpad in-progress closed" data-content-id="roadmap-item-spanish">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Safe Zone 201: Race + LGBTQ</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Work in Progress"></div>
						</li>
						<li class="roadmap-item smallpad planning closed" data-content-id="roadmap-item-spanish">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Medical Curriculum 5th Edition</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Planning"></div>
						</li>
						<li class="roadmap-item smallpad not-started closed" data-content-id="roadmap-item-spanish">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Safe Zone 201: Faith + LGBTQ</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Not started. Let us know if you want to help."></div>
						</li>
					</ul><!--/projects-->
				</article><!--/Curricula-->
				<article class="roadmapCard pad">
					<h2 class="text-center">Train-the-Trainer Toolkit</h2>
					<big>Get ready for the meta: everything you need to train a group to use our curriculum to train other groups. Or "Roll out a Safe Zone Program" In-a-Box.</big>
					<ul class="roadmap--projects">
						<li class="roadmap-item smallpad in-progress accordion closed" data-content-id="roadmap-item-pre-ttt">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Tools for Planning & Getting Started</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Work in Progress"></div>
							<ul id="roadmap-item-pre-ttt" class="roadmap-item--info">
								<li>Pre-TTT Checklist (including who makes a great SZ trainer, supporter vs. facilitator, logistical considerations for TTT, where is the program going to live after the TTT ect.)</li>
								<li>Pre-TTT FAQs (about organizing, who to select, etc.)</li>
								<li>Reading List & Resources for Preparation</li>
							</ul><!--item-->
						</li>
						<li class="roadmap-item smallpad in-progress accordion closed" data-content-id="roadmap-item-ttt-retreat-guide">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Train-the-Trainer Retreat Guide</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Work in Progress"></div>
							<ul id="roadmap-item-ttt-retreat-guide" class="roadmap-item--info">
								<li>Logistical Needs (e.g., Space, Supplies, Time, Setup)</li>
								<li>Day-of Checklist</li>
								<li>Retreat Schedule & TTT Curriculum</li>
							</ul><!--item-->
						</li>
						<li class="roadmap-item smallpad in-progress accordion closed" data-content-id="roadmap-item-post-ttt">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Tools for Maintenance & Program Improvement</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Work in Progress"></div>
							<ul id="roadmap-item-post-ttt" class="roadmap-item--info">
								<li>Co-Facilitator Pairings</li>
								<li>Facilitation Fear Factor Brownbags</li>
								<li>Post-TTT FAQ (open vs. closed trainings, mandatory vs. volunteer, signage/stickers, etc.)</li>
								<li>Reading list & Resources for Refreshing & Continued Learning</li>
							</ul><!--item-->
						</li>
						<li class="roadmap-item smallpad planning">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Lessons from Your Elders</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Planning"></div>
						</li>
						<li class="roadmap-item smallpad not-started">
							<div class="roadmap-item--title flex flex-align-center">
								<h3>Blog Series: Training the Trainers</h3>
								<span class="flex roadmap-item--status">
									<i class="not-started tip far fa-fw fa-spin fa-lg fa-spinner" title="Not Started"></i>
									<i class="planning tip far fa-fw fa-lg fa-calendar-check red" title="Planning"></i>
									<i class="in-progress tip far fa-fw fa-lg fa-clock orange" title="Work in Progress"></i>
									<i class="almost-done tip far fa-fw fa-lg fa-tasks green" title="Almost Done"></i>
									<i class="done tip far fa-fw fa-lg fa-check-circle blue" title="Done!"></i>
									<i class="done tip far fa-fw fa-lg fa-link blue" title="View Completed Project"></i>
								</span>
							</div>
							<div class="roadmap-item--progress tip" title="Not Started"></div>
						</li>
					</ul><!--/projects-->
				</article><!--/TTT-->
			</section>

		</div> <!-- end #main -->


	</div> <!-- end #inner-content -->

</div> <!-- end #all-activities -->

<?php get_footer(); ?>
