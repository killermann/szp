<?php
/*
Template Name: Download Curriculum Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

							<header class="page-header">
								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							</header> <!-- end article header -->

							<section class="entry-content clearfix" itemprop="articleBody">
								<?php edit_post_link(); ?>
								<?php the_content(); ?>
							</section> <!-- end article section -->

							<footer class="article-footer text-center">
								<a id="start-curriculum-download" onclick="gtag('event', 'click', { 'event_category': 'Curricula', 'event_action': 'Download', 'event_label': 'Big Download Foundational'});"  class="button button-rainbow" title="Download the Curriculum Now" href="https://szp.guide/2uOFVlz">
									<span class="pulse">Start Download Now</span>
								</a>
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
					<section id="giveback" style="display:none;">
						<div class="type-wrap text-center item">
							<h2 class="item"><i class="far fa-cog fa-spin"></i> While that's downloading...</h2>
							<div class="speech-bubble">
								<p><strong>If you'd like to express gratitude for the curriculum, or this resource in general</strong>, below there are a bunch of ways to do so. We're a <a href="https://thesafezoneproject.com/about/team" title="About our Team">tiny, volunteer-based team</a>, so all help is good help.</p>
							</div>
						</div>
						<hr>
						<div id="filters" class="flex flex-centered">
							<strong>I'd love to help by... </strong>
							<button class="tip" title="Show Ways I Can Spread the Word">
								<input name="Spreading the Word" id="filter--spreading-word" type="checkbox" value=".signal-boosting" />
								<label onclick="gtag('event', 'click', { 'event_category': 'Gifting Filters', 'event_action': 'Click', 'event_label': 'Show Spreading the Word'});" for="filter--spreading-word">Spreading the Word</label>
							</button>
							<button class="tip" title="Show Ways I Can Volunteer">
								<input name="Volunteering" id="filter--spreading-volunteering" type="checkbox" value=".volunteering" />
								<label onclick="gtag('event', 'click', { 'event_category': 'Gifting Filters', 'event_action': 'Click', 'event_label': 'Show Volunteering'});" for="filter--spreading-volunteering">Volunteering</label>
							</button>
							<button class="tip" title="Show Ways I Can Donate">
								<input name="Donating" id="filter--donating" type="checkbox" value=".donating"/>
								<label onclick="gtag('event', 'click', { 'event_category': 'Gifting Filters', 'event_action': 'Click', 'event_label': 'Show Donating'});" for="filter--donating">Donating</label>
							</button>
							<!-- <button class="tip" title="Show Ways I Can Help through Kindness">
								<input name="Kindness" id="filter--kindness" type="checkbox" value=".kindness"/>
								<label for="filter--kindness">Being Kind</label>
							</button> -->
						</div><!--filter-->
						<div class="isotope">
							<article class="card shuffleCard signal-boosting">
								<header class="smallpad">
									<h3>
										<i class="fab fa-facebook fa-lg"></i>
										Share on Facebook
									</h3>
								</header>
								<section>
									<p>"I just downloaded the 2-Hour Foundational Curriculum from www.TheSafeZoneProject.com (it's free!) #LGBTQ"</p>
								</section>
								<footer>
									<a onclick="gtag('event', 'click', { 'event_category': 'Gifting', 'event_action': 'Click', 'event_label': 'Share on Facebook'});" class="tip" target="_blank" href="https://www.facebook.com/dialog/feed?app_id=184683071273&link=https%3A%2F%2Fthesafezoneproject.com&picture=http%3A%2F%2Fwww.insert-image-share-url-here.jpg&name=The%20Safe%20Zone%20Project%3A%20LGBTQ%2B%20Curriculum%2C%20Activities%2C%20and%20Resources%20for%20Learning&caption=%20&description=I%20just%20downloaded%20the%202-Hour%20Foundational%20Curriculum%20from%20www.TheSafeZoneProject.com%20(it's%20free!)%20%23LGBTQ&redirect_uri=http%3A%2F%2Fwww.facebook.com%2F" title="Click to Share on Facebook"></a>
								</footer>
						    </article> <!-- /card -->
							<article class="card shuffleCard volunteering">
								<header class="smallpad">
									<h3>
										<i class="far fa-lg fa-bug"></i>
										Fix a Typo
									</h3>
								</header>
								<section>
									<p>Have you noticed something wrong with our curriculum or site? Let us know and we'll love you forever.</p>
								</section>
								<a onclick="gtag('event', 'click', { 'event_category': 'Gifting', 'event_action': 'Click', 'event_label': 'Fix a Typo'});" class="tip" href="https://thesafezoneproject.com/contact" title="Tell us about a Typo or Bug"></a>
						    </article> <!-- /card -->
							<article class="card shuffleCard donating">
								<header class="smallpad">
									<h3><i class="far fa-lg fa-server"></i> Pay Our Hosting Bill for One Month</h3>
								</header>
								<section>
									<p>We're hosted on WPEngine, and it ain't cheap. Help keep this online resource free for others, and running smoothly.</p>
								</section>
								<footer>
									<a onclick="gtag('event', 'click', { 'event_category': 'Gifting', 'event_action': 'Click', 'event_label': 'Pay Our Hosting Bill for One Month'});" class="tip" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H2366QXQ4KZC2" title="Click to cover our hosting bill this month ($115)"></a>
								</footer>
						    </article> <!-- /card -->
							<article class="card shuffleCard volunteering">
								<header class="smallpad">
									<h3>
										<i class="far fa-lg fa-pen-alt"></i>
										Submit an Activity or Resource
									</h3>
								</header>
								<section>
									<p>Activities, Blog Posts, FAQs, etc... we welcome creative contributions to this project!</p>
								</section>
								<a onclick="gtag('event', 'click', { 'event_category': 'Gifting', 'event_action': 'Click', 'event_label': 'Submit an Activity or Resource'});" class="tip" href="https://thesafezoneproject.com/contact" title="Submit an Activity or Resource"></a>
						    </article> <!-- /card -->
							<article class="card shuffleCard volunteering">
								<header class="smallpad">
									<h3>
										<i class="far fa-lg fa-hand-heart"></i>
										Become an Intern
									</h3>
								</header>
								<section>
									<p>We accept applications on a rolling basis, and have several openings and different internship roles.</p>
								</section>
								<a onclick="gtag('event', 'click', { 'event_category': 'Gifting', 'event_action': 'Click', 'event_label': 'Become an Intern'});" class="tip" href="https://thesafezoneproject.com/about/team/#InternshipProgram" title="Learn about Internships"></a>
						    </article> <!-- /card -->
							<article class="card shuffleCard signal-boosting">
								<header class="smallpad">
									<h3>
										<i class="fab fa-twitter fa-lg"></i>
										Tweet about us!
									</h3>
								</header>
								<section>
									<p>"I just downloaded the 2-Hour Foundational Curriculum from www.TheSafeZoneProject.com (it's free!) #LGBTQ"</p>
								</section>
								<footer>
									<a onclick="gtag('event', 'click', { 'event_category': 'Gifting', 'event_action': 'Click', 'event_label': 'Tweet about us!'});" class="tip" target="_blank" href="https://twitter.com/home?status=I%20just%20downloaded%20the%202-Hour%20Foundational%20Curriculum%20from%20www.TheSafeZoneProject.com%20(it's%20free!)%20%23LGBTQ" title="Click to Draft a Tweet"></a>
								</footer>
						    </article> <!-- /card -->
							<article class="card shuffleCard donating">
								<header class="smallpad">
									<h3><i class="far fa-lg fa-donate"></i> Donate</h3>
								</header>
								<section>
									<p>Make a donation (one-time, or recurring) in an amount of your choosing -- secured by PayPal. (Note: Donations are <strong>not</strong> tax deductible; The Safe Zone Project is part of the hues Global Justice Collective)</p>
								</section>
								<footer>
									<a onclick="gtag('event', 'click', { 'event_category': 'Gifting', 'event_action': 'Click', 'event_label': 'Donate'});" class="tip" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W3YDWGAPAUJ7L" title="Click to make a Donation"></a>
								</footer>
						    </article> <!-- /card -->
							<!-- <article class="card shuffleCard kindness" style="opacity:0;">
								<header class="smallpad">
									<h3><i class="far fa-lg fa-check"></i> Mission Accomplished.</h3>
								</header>
								<section>
									<p>Clicking that button sends a little notification to Meg & Sam, so you've just added 1 kindness point to our lives. Thank you <i class="far fa-smile-beam"></i></p>
								</section>
								<footer>

								</footer>
						    </article> -->
						</div><!--/isotope-->
					</section><!--giveback-->
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<script src='https://npmcdn.com/isotope-layout@3.0.6/dist/isotope.pkgd.js'></script>

<script>
$(document).ready(function() {

	$( "#start-curriculum-download" ).click(function() {
	  $( "#giveback" ).slideToggle( "fast" );
	});

	// init Isotope
	var $container = $('.isotope').isotope({
		itemSelector: '.card',
		masonry: {
			columnWidth: 250,
			isFitWidth: true
		}
	});

	var PageLoadFilter = '.initial-show';
  	$container.isotope({ filter: PageLoadFilter});

	// filter with selects and checkboxes
	var $checkboxes = $('#filters input');

	$checkboxes.change( function() {
	  // map input values to an array
	  var inclusives = [];
	  var outputs = [];
	  // inclusive filters from checkboxes
	  $checkboxes.each( function( i, elem ) {
	    // if checkbox, use value if checked
	    if ( elem.checked ) {
	      inclusives.push( elem.value );
		  outputs.push( elem.name );
	    }
	  });

	  // combine inclusive filters
	  var filterValue = inclusives.length ? inclusives.join(', ') : '*';
	  $container.isotope({ filter: filterValue })
	});
});

</script>


<?php get_footer(); ?>
