<?php
/*
Template Name: All Activities Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

				    <div id="main" class="eightcol first clearfix" role="main">
						<div class="entry-content">
							<header class="page-header">
								<h1 class="page-title" itemprop="headline"><i class="far fa-rocket"></i> <?php the_title(); ?></h1>
							</header> <!-- end article header -->
							<p>
								Below are all the activities currently provided by The Safe Zone Project. Everything here is yours to download, customize, and freely use.
							</p>
							<p>
								<a class="biglink" href="https://thesafezoneproject.com/help/uncopyright" alt="Uncopyright">Uncopyright <i class="far fa-long-arrow-right"></i>
								</a>
								<a class="biglink" href="https://thesafezoneproject.com/help/how-to-use-this-site/" alt="How to Use this Site">How to Use this Site <i class="far fa-long-arrow-right"></i>
								</a>
							</p>
						</div>
						<div class="isotope type-wrap">
							<article class="card explainer flex flex-centered cellHide">
								<i class="explainerIcon far fa-3x fa-question-circle"></i>
								<span>You can narrow down what you're looking for using the <strong><i class="far fa-crosshairs"></i> Activity Finder</strong>. Select a particular type, knowledge, trust, time, or subject (or combine a few options to get really specific). If we have what you're looking for, it'll appear below. If there’s something missing you’d like us to add, or you’d like to submit an activity, please <a href="https://thesafezoneproject.com/contact" alt="Contact the SZP">reach out</a>.</span>
							</article>

							<article class="card explainer warning flex flex-centered tabletHide">
								<i class="explainerIcon far fa-3x fa-exclamation-circle"></i>
								<span><strong>Heads up!</strong> We suggest a bigger screen for browsing activities (<i class="far fa-fw fa-tablet"></i> <i class="far fa-fw fa-laptop"></i> <i class="far fa-fw fa-desktop"></i>). You'll be able to see the <a href="#activityFinder" alt="Jump to Activity Finder">Activity Finder</a> while scrolling, and download directly from this page.</span>
							</article>

							<?php $all_activities = new WP_Query(
								array(
									'post_type' => 'activity',
									'orderby' => 'title',
									'order' => 'asc',
									'posts_per_page' => -1,
								)
							);

							while($all_activities->have_posts()) : $all_activities->the_post();

								archiveCards();

							endwhile; wp_reset_postdata(); ?>

						</div><!--/isotope type-wrap-->

				    </div> <!-- end #main -->

				    <aside role="complementary" class="fourcol sidebar last sticky clearfix">
						<?php get_activity_finder();?>
					</aside>

				</div> <!-- end #inner-content -->

			</div> <!-- end #all-activities -->


<script src='https://npmcdn.com/isotope-layout@3.0.6/dist/isotope.pkgd.js'></script>

<script>
$(document).ready(function() {

	// init Isotope
	var $container = $('.isotope').isotope({
	  itemSelector: '.card'
	});

	// filter with selects and checkboxes
	var $checkboxes = $('#activityFinder input');

	$checkboxes.change( function() {
	  // map input values to an array
	  var inclusives = [];
	  // inclusive filters from checkboxes
	  $checkboxes.each( function( i, elem ) {
	    // if checkbox, use value if checked
	    if ( elem.checked ) {
	      inclusives.push( elem.value );
	    }
	  });

	  // combine inclusive filters
	  var filterValue = inclusives.length ? inclusives.join('') : '*';
	  $container.isotope({ filter: filterValue })
	});
});

</script>

<?php get_footer(); ?>
