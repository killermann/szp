<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<script type=”application/ld+json”>

    {

    “@context”: “http://schema.org”,

    “@type”: “WebSite”,

    “url”: “http://www.thesafezoneproject.com/”,

    “potentialAction”: {

        “@type”: “SearchAction”,

        “target”: “http://thesafezoneproject.com/?s={search_term_string}”,

        “query-input”: “required name=search_term_string”

        }

    }

</script>

			<div id="content">

				<div id="inner-content" class="center-wrap clearfix">

                	<div id="home-title" class="clearfix">
                    	<h1>The Safe Zone Project is a free online resource for creating powerful, effective LGBTQ awareness and ally training workshops</h1>
                    </div><!--/home-title-->

                    <div id="home-download" class="clearfix">
                    	<a href="#" class="openThanksShare" alt="Download our curriculum"><h2><i class="icon-download-alt"></i>Click here to download our 100% Free, 2-Hour, Ready-to-Rock Safe Zone Workshop Curriculum.</h2></a>
                    </div><!--/synopsis-->

                    <div id="home-three-abouts" class="clearfix">
                    	<div class="fourcol first">
                        	<span><i class="icon-flag">&nbsp;</i></span>
                            <h2>Our Goal</h2>
                            <p>Our goal is simple: we want to make your Safe Zone workshops (and all your LGBTQ educational opportunities) more effective, more fun, more dynamic, and more impactful than ever before.</p>
                        </div>
                        <div class="fourcol">
                        	<span><i class="icon-gift">&nbsp;</i></span>
                            <h2>Help You</h2>
                            <p>We're here to take a little off your plate by providing you with a  curriculum, a <a href="http://thesafezoneproject.com/all-activities/" alt="All Activities">suite of educational activities</a> to pick and choose from, and tips to help you and your team become all-stars.</p>
                        </div>
                        <div class="fourcol last">
                        	<span><i class="icon-signal">&nbsp;</i></span>
                            <h2>Do Better</h2>
                            <p>Safe Zone Workshops are unique educational opportunities, and we are all about making the most of those opportunities. Sometimes you only get one chance. Let us help you <a href="http://thesafezoneproject.com/services/" alt="Our Services">raise the bar</a>.</p>
                        </div>
                    </div><!--/threeabouts-->

                    <div id="home-not-college" class="clearfix">
						<span class="block no clearfix"><p><i class="icon-remove-sign"></i>This isn't a college's resource center.</p></span>
                        <span class="block yes"><p><i class="icon-ok-sign"></i>It's a resource we created for the world (including colleges &amp; universities).</p></span>
                        <span class="block no"><p><i class="icon-remove-sign"></i>Don't feel weird using our stuff, or feel the need to ask for permission.</p></span>
                        <span class="block yes"><p><i class="icon-ok-sign"></i>This was all made for you.</p></span>
                    </div><!--/not-college-->

                    <div id="home-we-know-you">
                    	<div class="sixcol first clearfix">
                        	<h2>We Know You.</h2>
                            <p>In an effort to disregard the suggestion that "there are only 24 hours in a day," and "you can only do so much," you've found yourself saying "I can just sleep less." Because you care about the work you do. Because you care about the students, staff and community you're working with to help them learn, develop, and grow. Because you know you're onto something good, if only you had a few more minutes in the day to make it happen, amidst the daily downpour of emails and meetings. You know you want to make a difference, an impact, and you know every opportunity matters.</p>
                        </div>
                        <div class="sixcol last clearfix were">
                        	<h2>We Were You.</h2>
                            <p>We have over 10 years of Safe Zone facilitation experience, hundreds of workshops under our belts, and we created this resource to help you benefit from that experience — to enable you to spend more time doing good, and less time worrying about <em>how to</em>. We come from student affairs. We know the drill, the grind, the ups, and the downs. Click below, or learn <a href="http://thesafezoneproject.com/how-to-use-this-site/" alt="How to use this site">how to use this site</a>, and let us help.</p>
                        </div>
                        <div class="sixcol last clearfix download-it">
                        	<a href="http://bit.ly/SZP2hr" alt="Download our curriculum"><i class="icon-download-alt icon-2x pull-right"></i>Download our 2-hour curriculum to get started! You still have a lot of good to do.</a>
                        </div>
                    </div>

                    <div class="searchFormBig twelvecol first"><?php get_search_form(); ?></div>

                    <div id="home-utmof" class="twelvecol first clearfix">
                        <a href="<?php echo home_url(); ?>/unlocking-the-magic-of-facilitation-by-sam-killermann-meg-bolger" alt="Unlocking the Magic of Facilitation, a book by Sam Killermann and Meg Bolger">
                            <img src="<?php echo home_url(); ?>/wp-content/themes/szp/library/images/banner-unlocking-the-magic-of-facilitation.jpg" alt="Unlocking the Magic of Facilitation, a book by Sam Killermann and Meg Bolger"/>
                        </a>
                    </div>

                    <div id="recent-blogs" class="twelvecol first clearfix">
                    	<h2>Recently on the Blog</h2>
                    	<ul class="blog-teasers">
							<?php $the_query = new WP_Query( 'showposts=4' ); ?>
                            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                            <li>
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
                                <a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
								<?php the_excerpt(__('(more…)')); ?>
                           	</li>
                            <?php endwhile;?>
                        </ul>
                    </div><!--/recent-blogs-->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
