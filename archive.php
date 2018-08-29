<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap clearfix">

				<div id="main" class="eightcol first clearfix" role="main">
					<div class="entry-content">
						<header class="archive-header">
							<?php if (is_category()) { ?>
								<h1>
									<?php single_cat_title(); ?>
								</h1>
							<?php } elseif (is_tag()) { ?>
								<h1>
									<?php single_tag_title(); ?>
								</h1>
							<?php } elseif (is_post_type_archive()) {?>
								<h1>
									<?php post_type_archive_title(); ?>
								</h1>
							<?php } elseif (is_day()) { ?>
								<h1>
									<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1>
										<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1>
										<span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>
						</header> <!-- end article header -->
						<div class="excerpt entry-content">
							<?php the_archive_description( '', '' );?>
						</div>
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

						</div><!--filter-->
					</div>
					<div class="isotope type-wrap">
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

					<?php endif; ?>

					</div><!--/isotope type-wrap-->

				</div> <!-- end #main -->

				<aside role="complementary" class="fourcol last sticky clearfix">
					<?php
					if (is_category()) {
						$this_category = get_category($cat);
						if (get_category_children($this_category->cat_ID) != "") {
							echo '<ul class="smallpad" id="child-categories">';
							$childcategories = get_categories(array(
								'orderyby' => 'name',
								'hide_empty' => false,
								'child_of' => $this_category->cat_ID
								));
							foreach($childcategories as $category) {
								echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '><h3>' . $category->name.'</h3></a>';
								echo '<p>'.$category->description.'</p>';
								echo '<a class="biglink" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>View All <i class="far fa-long-arrow-right"></i></a></li>';
							}
							echo '</ul></div>';
						} else {
							$featuredPostQuery = new WP_Query(
								array(
									'cat' => get_query_var('cat'),
									'tag' => 'featured',
									'showposts' => 1,
								)
							);?>
							<?php while ($featuredPostQuery -> have_posts()) : $featuredPostQuery -> the_post(); ?>

								<div class="smallpad flex flex-centered flex-col">
								<span class="featured">Featured</span>
								<?php loopShuffleCards();?>
								</div>
							<?php endwhile;
						}
					}
					?>

				</aside>

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
	var $checkboxes = $('#filters input:checkbox');

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
	  var filterValue = inclusives.length ? inclusives.join(', ') : '.no-filter-results';
	  $container.isotope({ filter: filterValue })
	});
});

</script>
<?php get_footer(); ?>
