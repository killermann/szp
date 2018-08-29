<?php get_header(); ?>

			<div id="content" class="archive <?php $post_type = get_post_type( $post->ID ); echo $post_type;?>">

				<div id="inner-content" class="wrap clearfix">
					<aside id="search-sidebar" class="sidebar fourcol last sticky-tablet" role="complementary">
						<div class="archive-header">
							<h1 class="archive-title"><?php echo esc_attr(get_search_query()); ?></h1>
						</div>

						<?php get_search_form(); ?>
						<div class="widget cellHide">
							<h4 class="widgettitle"><i class="far fa-fw fa-search-plus"></i> Popular Searches</h4>
							<?php get_popular_searches();?>
						</div>
					</aside>

					<div id="main" class="eightcol first clearfix" role="main">
						<div id="filters" class="flex flex-centered">
							<button id="filters-button--Articles" class="tip" title="Hide/Show Articles">
								<input name="Articles" id="filter--articles" type="checkbox" value=".type-post" checked />
								<label for="filter--articles">Articles</label>
							</button>
							<button id="filters-button--Activities" class="tip" title="Hide/Show Activities">
								<input name="Activities" id="filter--activities" type="checkbox" value=".type-activity" checked/>
								<label for="filter--activities">Activities</label>
							</button>
							<button id="filters-button--FAQs" class="tip" title="Hide/Show FAQs">
								<input name="FAQs" id="filter--faqs" type="checkbox" value=".type-hrf_faq" checked/>
								<label for="filter--faqs">FAQs</label>
							</button>
							<button id="filters-button--Courses" class="tip" title="Hide/Show Courses">
								<input name="Courses" id="filter--courses" type="checkbox" value=".type-download" checked/>
								<label for="filter--courses">Courses</label>
							</button>
							<button id="filters-button--Pages" class="tip" title="Hide/Show Pages">
								<input name="Pages" id="filter--pages" type="checkbox" value=".type-page" checked/>
								<label for="filter--pages">Pages</label>
							</button>
						</div><!--filter-->
						<div class="type-wrap isotope">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php archiveCards();?>

							<?php endwhile; ?>

								<?php else : ?>

										<article id="no-results" class="no-search-results card archiveCard" role="article">
												<header class="article-header cat-bg">
													<h3><a>We don't have anything matching that <i class="far fa-fw fa-frown"></i></a></h3>
												</header> <!-- end article header -->
												<section class="flex">
													<p>
														<strong>There are a few things we can do here.</strong>

														Try another search (obvs). If you're looking for an activity, it might be easier to use the <a href="https://thesafezoneproject.com/all-activities" alt="All Activities">Activity Finder</a>.
													</p>
													<ul class="buttons flex">

														<li><a href="https://thesafezoneproject.com" rel="bookmark" title="Go Home" class="tip">
															<i class="far fa-fw fa-home"></i>
														</a></li>
														<li><a href="https://thesafezoneproject.com/all-activities" rel="bookmark" title="All Activities" class="tip">
															<i class="far fa-fw fa-rocket"></i>
														</a></li>
														<li><a href="https://thesafezoneproject.com/resources" rel="bookmark" title="Resource Center" class="tip">
															<i class="far fa-fw fa-box-heart"></i>
														</a></li>
													</ul>
												</section> <!-- end article section -->

										</article> <!-- end article -->

								<?php endif; ?>

							</div><!--/isotope-->
							<?php if (function_exists('bones_page_navi')) { ?>
									<?php bones_page_navi(); ?>
							<?php } else { ?>
									<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
												<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
											</ul>
									</nav>
							<?php } ?>


						</div> <!-- end #main -->

					</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<script src='https://npmcdn.com/isotope-layout@3.0.6/dist/isotope.pkgd.js'></script>

<script>
$(document).ready(function() {

	// init Isotope
	var $container = $('.isotope').isotope({
	  itemSelector: '.card'
	});

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
	  var filterValue = inclusives.length ? inclusives.join(', ') : '.no-filter-results';
	  $container.isotope({ filter: filterValue })
	});
});

</script>
<?php get_footer(); ?>
