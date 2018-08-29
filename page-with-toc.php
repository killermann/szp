<?php
/**
* Template Name: Table of Contents Page
*/
?>
<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap clearfix">
					<div id="pre-content">
						<nav id="breadcrumbs-container" class="cellHide" aria-label="breadcrumb">
							<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');}?>
						</nav>
					</div>
					<div id="main" class="eightcol first clearfix" role="main">
						<div class="featuredImage"><?php the_post_thumbnail('full') ?></div>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

							<header class="page-header">
								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							</header> <!-- end article header -->

							<section class="entry-content clearfix" itemprop="articleBody">
								<?php edit_post_link(); ?>
								<?php the_content(); ?>
							</section> <!-- end article section -->

							<footer class="article-footer">
								<?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>

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
					<?php $args = array(
						'post_parent' => $post->ID,
						'post_type' => 'page',
						'orderby' => 'menu_order'
					);
					$child_query = new WP_Query( $args );
					if ( $child_query->have_posts() ) { ?>
					<aside class="sidebar fourcol last clearfix" role="complementary">
						<div id="childPageContainer">
							<h4><i class="far fa-sitemap"></i> Related Pages</h4>
							<ul>
								<?php while ( $child_query->have_posts() ) : $child_query->the_post();?>
								<li>
								<a href="<?php the_permalink();?>" alt="<?php the_title();?>">
								<?php the_title();?></a>
								</li>
								<?php endwhile;?>
								<?php wp_reset_postdata();?>
							</ul>
						</div>
					</aside>
					<?php };?>

					<nav id="toc" class="fourcol last clearfix sticky" role="navigation">
						<h4><i class="far fa-list-alt"></i> On this Page</h4>
						<ol data-toc="section.entry-content" data-toc-headings="h2,h3"></ol>
					</nav>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
