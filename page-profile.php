<?php
/*
Template Name: Profile
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">
		<aside role="complementary" class="sixcol sidebar last sticky-tablet clearfix">
			<div id="user_profile">
				<?php global $current_user; wp_get_current_user(); ?>
				<?php if ( is_user_logged_in() ) {
				 echo do_shortcode('[ld_profile]');
			 	} else { wp_loginout(); } ?>
			</div>

		</aside>

		<div id="main" class="sixcol first clearfix" role="main">
			<div class="entry-content">
				<header class="page-header">
					<h1 class="page-title" itemprop="headline"><i class="far fa-laptop"></i> Your Courses</h1>
				</header> <!-- end article header -->
				<?php if (have_posts()) : while (have_posts()) : the_post();
					edit_post_link();
					the_content();
				endwhile; endif; ?>
				<p>
					<a class="biglink" href="https://thesafezoneproject.com/courses" alt="All Courses">All Courses <i class="far fa-long-arrow-right"></i>
					</a>
					<a class="biglink" href="https://thesafezoneproject.com/help/how-to-use-this-site/" alt="How to Use this Site">How to Use this Site <i class="far fa-long-arrow-right"></i>
					</a>
				</p>
			</div>

			<div class="type-wrap">
				<?php echo do_shortcode('[ld_course_list mycourses="true" progress_bar="true"]');?>
			</div><!--/isotope type-wrap-->

		</div> <!-- end #main -->



	</div> <!-- end #inner-content -->

</div> <!-- end #all-activities -->

<?php get_footer(); ?>
