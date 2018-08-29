<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
					<aside id="archive-sidebar" class="sidebar fourcol last sticky-tablet" role="complementary">
						<div class="entry-content">
							<header class="archive-header">
								<?php
									global $post;
									$author_id = $post->post_author;
								?>
								<div class="author">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), '120' ); ?>
									<h1 class="name">
										<small><span id="filtersOutput"><?php _e("Everything", "bonestheme"); ?></span> by</small><br/> <?php the_author_meta('display_name', $author_id); ?>
									</h1>
								</div>
							</header> <!-- end article header -->
							<?php the_archive_description( '<p>', '</p>' );?>
						</div><!--/entry-content archive intro-->
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
								<input name="Courses" id="filter--courses" type="checkbox" value=".type-sfwd-courses" checked/>
								<label for="filter--courses">Courses</label>
							</button>
						</div><!--filter-->
						<div class="type-wrap isotope">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php archiveCards();?>

							<?php endwhile; ?>

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

							<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e("This is the error message in the archive.php template.", "bonestheme"); ?></p>
								</footer>
							</article>

							<?php endif; ?>

							<article id="no-results" class="no-filter-results card archiveCard" role="article" style="display:none;">
								<header class="article-header cat-bg">
									<h3><a>We don't have anything else <i class="far fa-fw fa-frown"></i></a></h3>
								</header> <!-- end article header -->
								<section class="flex">
									<p>
										<strong>You filtered us into oblivion.</strong>Remove a couple filters, or use the search bar to try and find the <em>very specific</em> thing you're looking for.
									</p>
									<ul class="buttons flex">
										<li><a href="https://thesafezoneproject.com/all-activities" rel="bookmark" title="All Activities" class="tip">
											<i class="far fa-fw fa-rocket"></i>
										</a></li>
										<li><a href="https://thesafezoneproject.com/resources" rel="bookmark" title="Resource Center" class="tip">
											<i class="far fa-fw fa-box-heart"></i>
										</a></li>
									</ul>
								</section> <!-- end article section -->
							</article> <!-- end article -->

						</div><!--/isotope-->

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

	var $output = $('#filtersOutput');

	// filter with selects and checkboxes
	var $checkboxes = $('#filters input');

	// show count of items
	// var iso = $container.data('isotope');
	// var $filterCount = $('.filter-count');

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
	  var outputValue = outputs.length ? outputs.join(', ') : 'Nothing';
	  $output.text( outputValue );
	  $container.isotope({ filter: filterValue })
	  // updateFilterCount();
	});

	// show count of items
	// function updateFilterCount() {
	//   $filterCount.text( iso.filteredItems.length + ' items' );
	// }
	// updateFilterCount();
});

</script>
<?php get_footer(); ?>
