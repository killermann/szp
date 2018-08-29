<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700" rel="stylesheet">

		<link rel="apple-touch-icon" sizes="180x180" href="https://thesafezoneproject.com/wp-content/themes/szp/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="https://thesafezoneproject.com/wp-content/themes/szp/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="https://thesafezoneproject.com/wp-content/themes/szp/favicon-16x16.png">
		<link rel="manifest" href="https://thesafezoneproject.com/wp-content/themes/szp/site.webmanifest">
		<link rel="mask-icon" href="https://thesafezoneproject.com/wp-content/themes/szp/safari-pinned-tab.svg" color="#3fa9f5">
		<meta name="msapplication-TileColor" content="#3fa9f5">
		<meta name="theme-color" content="#3fa9f5">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41719411-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-41719411-1');
		</script>
	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">
				<div id="admin-header">
					<nav class="sign-in">
						<a href="https://thesafezoneproject.com/login" title="Sign In to the Safe Zone Project">
							<i class="far fa-sign-in"></i>
							<span>Sign In</span>
						</a>
					</nav>
					<nav class="my-profile">
						<a href="https://thesafezoneproject.com/profile" title="View Your SZP Profile">
							<i class="far fa-user-circle"></i>
							<span>My Profile</span>
						</a>
					</nav>
					<nav>
						<a id="admin-header-tab--learn" href="https://thesafezoneproject.com/learn" title="Learn about LGBTQ+ Issues for Yourself">
							<i class="far fa-user-graduate"></i>
							<span>Learn</span>
						</a>
						<a id="admin-header-tab--teach" href="https://thesafezoneproject.com/teach" title="Teach others about LGBTQ+ Identities, Gender, and Sexuality">
							<i class="far fa-chalkboard-teacher"></i>
							<span>Teach</span>
						</a>
						<a id="admin-header-tab--lead" href="https://thesafezoneproject.com/lead" title="Lead a Safe Zone Initiative in Your Community">
							<i class="far fa-flag"></i>
							<span>Lead</span>
						</a>
					</nav>
					<div id="admin-header--big-download" class="mobileHide">
						<?php get_big_download() ?>
					</div>
				</div>

				<div id="inner-header">
					<div id="logo">
						<a href="https://thesafezoneproject.com" rel="nofollow"><?php bloginfo('name'); ?></a>
					</div>
					<nav id="main-nav" role="navigation">
						<?php bones_main_nav(); ?>
					</nav>
					<div id="header-search">
						<?php get_search_form(); ?>
					</div>
					<button id="mobile-menu" type="button" onClick="toggleHeight();"><i class="far fa-bars"></i></button>
				</div> <!-- end #inner-header -->
				<nav id="hamburger-nav" role="navigation">
					<div class="flex kitchen-sink mobileHide flex-centered">
						<div class="nav-group">
							<nav id="header-nav--site" role="navigation">
								<h3>Site</h3>
								<ul class="fa-ul">
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-rocket"></i></span>
										<a href="https://thesafezoneproject.com/activities" title="Activities">
											Activities
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-question-circle"></i></span>
										<a href="https://thesafezoneproject.com/FAQs" title="FAQs">
											FAQs
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-comment-check"></i></span>
										<a href="https://thesafezoneproject.com/Blog" title="Blog">
											Blog
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-laptop"></i></span>
										<a href="https://thesafezoneproject.com/resources/courses" alt="Courses">
											Courses
										</a>
									</li>
								</ul>
							</nav><!--/site-->
							<nav id="header-nav--info" role="navigation">
								<h3>Info</h3>
								<ul class="fa-ul">
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-user-friends"></i></span>
										<a href="https://thesafezoneproject.com/about/team" title="The SZP Team">
											The Team
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-hand-heart"></i></span>
										<a href="https://thesafezoneproject.com/help/volunteer" title="Volunteer">
											Volunteer
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-circle"><small class="absolute-center">u</small></i></span>
										<a href="https://thesafezoneproject.com/Uncopyright" title="Uncopyright">
											Uncopyright
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-question"></i></span>
										<a href="https://thesafezoneproject.com/about/how-to-use-this-site/" alt="How to Use This Site">
											How to Use
										</a>
									</li>
								</ul>
							</nav><!--/follow-->
						</div><!--/navgroup-->
						<div class="nav-group">
							<nav id="header-nav--learn" role="navigation">
								<h3>Learn</h3>
								<ul class="fa-ul">
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-user-graduate"></i></span>
										<a href="https://thesafezoneproject.com/learn" title="Learn about LGBTQ+ Identities">
											Learn for Yourself
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-map-signs"></i></span>
										<a href="https://thesafezoneproject.com/resources/courses/self-guided-foundational-safe-zone-training/" title="Self-Guided Activities">
											Self-Guided Safe Zone
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-book"></i></span>
										<a href="https://thesafezoneproject.com/resources/#Read" title="Reading & Watching">
											To Read &amp; Watch
										</a>
									</li>
									<li>
										<span class="fa-li"></span>
										<a class="biglink" href="https://thesafezoneproject.com/category/for-learners" title="All For Learners">
											All for Learners
											<i class="far fa-long-arrow-right"></i>
										</a>
									</li>
								</ul>
							</nav><!--/learn-->
							<nav id="header-nav--teach" role="navigation">
								<h3>Teach</h3>
								<ul class="fa-ul">
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-chalkboard-teacher"></i></span>
										<a href="https://thesafezoneproject.com/teach" title="Teach others about LGBTQ+ Identities">
											Teach Others
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-star"></i></span>
										<a href="https://thesafezoneproject.com/all-star" title="Facilitator Series">
											Facilitator Series
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-user-astronaut"></i></span>
										<a href="https://thesafezoneproject.com/STARLAB" title="S.T.A.R.L.A.B.">
											S.T.<i class="far fa-star"></i>.R.L.A.B.
										</a>
									</li>
									<li>
										<span class="fa-li"></span>
										<a class="biglink" href="https://thesafezoneproject.com/category/for-teachers" title="All For Teachers">
											All for Teachers
											<i class="far fa-long-arrow-right"></i>
										</a>
									</li>
								</ul>
							</nav><!--/teach-->
						</div>
						<div class="nav-group">
							<nav id="header-nav--learn" role="navigation">
								<h3>Lead</h3>
								<ul class="fa-ul">
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-flag"></i></span>
										<a href="https://thesafezoneproject.com/lead" title="Lead a Safe Zone Initiative">
											Lead a Program
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-road"></i></span>
										<a href="https://thesafezoneproject.com/lead/#planning-and-rollout" title="Planning & Rollout">
											Planning &amp; Rollout
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-map"></i></span>
										<a href="https://thesafezoneproject.com/TTT" title="Train-the-Trainers">
											Train-the-Trainers
										</a>
									</li>
									<li>
										<span class="fa-li"></span>
										<a class="biglink" href="https://thesafezoneproject.com/category/for-leaders" title="All For Leaders">
											All for Leaders
											<i class="far fa-long-arrow-right"></i>
										</a>
									</li>
								</ul>
							</nav><!--/lead-->
							<nav id="header-nav--follow" role="navigation">
								<h3>Follow</h3>
								<ul class="fa-ul">
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-envelope-square"></i></span>
										<a href="https://eepurl.com/dyIKFn" title="SZP Email List">
											Email List
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="fab fa-lg fa-fw fa-facebook"></i></span>
										<a href="https://facebook.com/safezoneproject" title="SZP on Facebook">
											Facebook
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="fab fa-lg fa-fw fa-twitter"></i></span>
										<a href="https://twitter.com/safezoneproject" title="SZP on Twitter">
											Twitter
										</a>
									</li>
									<li>
										<span class="fa-li"><i class="far fa-lg fa-fw fa-rss"></i></span>
										<a href="https://thesafezoneproject.com/feed/rss" title="SZP RSS Feed">
											RSS Feed
										</a>
									</li>
								</ul>
							</nav><!--/follow-->
						</div>
					</div><!--/kitchen-sink-->
					<div id="hamburger-main-nav" class="desktopHide">
						<?php bones_main_nav(); ?>
					</div>
					<?php bones_quicklinks_nav(); ?>
				</nav>
			</header> <!-- end header -->
