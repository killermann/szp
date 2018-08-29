<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="sixcol pad first clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">

							<header class="page-header">

								<h1>Uh oh. 4<i class="far fa-sm fa-grin-beam-sweat"></i>4 Error.</h1>

							</header> <!-- end article header -->

							<section class="entry-content">
								<p>Dang! Whatever you were looking for, it's not here. Sorry about that! You can try the search bar below to find it, or just start fresh at the <a href="https://thesafezoneproject.com" alt="Go home">home page</a>.</p>
								<p>If you want to let us know about this error, you can reach out via the <a href="https://thesafezoneproject.com/contact" alt="Contact">contact page</a>. We'd certainly appreciate.</p>
							</section> <!-- end article section -->

							<section class="search">
								<p><?php get_search_form(); ?></p>
							</section> <!-- end search section -->
							<footer class="article-footer">
								<?php get_popular_searches();?>
							</footer> <!-- end article footer -->

						</article> <!-- end article -->

					</div> <!-- end #main -->
					<div id="all-activities" class="sixcol pad last clearfix">
                        <h2>Recent Activities <i class="far fa-rocket"></i></h2>
						<?php $activities404query = new WP_Query( 'post_type=activity&showposts=5' ); ?>
			            <?php while ($activities404query -> have_posts()) : $activities404query -> the_post(); ?>
			            <?php archiveCards();?>
			            <?php endwhile;?>
					</div> <!-- end #all-activities -->
					<div class="sixcol first clearfix">
				    	<h2 class="purple">Recent Blogs <i class="far fa-flag"></i></h2>
						<?php $blogs404query = new WP_Query( 'showposts=5' ); ?>
				        <div class="cards">
				            <?php while ($blogs404query -> have_posts()) : $blogs404query -> the_post(); ?>
				            <?php blogCards();?>
				            <?php endwhile;?>
				        </div>
				    </div><!--/recent-blogs-->

				</div><!-- /inner-content-->


			</div> <!-- end #content -->



<?php get_footer(); ?>
