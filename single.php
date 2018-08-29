
<?php get_header(); ?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">

				<div id="inner-content" class="wrap clearfix">
					<div id="pre-content">
						<nav id="breadcrumbs-container" class="cellHide" aria-label="breadcrumb">
						<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('
								<p id="breadcrumbs">','</p>
							');
						}?>
						</nav>
					</div>
					<div id="the-content" class="clearfix">

						<div class="featuredImage">
							<?php the_post_thumbnail('full') ?>
						</div>

						<div id="main" class="clearfix" role="main">
							<header class="article-header clearfix">
								<div class="article-title">
									<?php szp_primary_category();?>
		                            <h1><span class="title"><?php the_title(); ?></span></h1>
									<div class="author">
										<?php if ( function_exists( 'get_coauthors' ) ) {

										  $coauthors = get_coauthors();
										  foreach ( $coauthors as $coauthor ) {
										    $archive_link = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename );
										    $link_title = 'Posts by ' . $coauthor->display_name;
										    ?>
										    <a href="<?php esc_url( $archive_link ); ?>" class="tip author-link" title="<?php echo esc_attr( $link_title ); ?>"><?php echo coauthors_get_avatar( $coauthor, 50 ); ?>
											</a>
											<span class="name"><?php echo $coauthor->display_name;?></span>
										    <?php
										  }
										// treat author output normally
										} else {
										  $archive_link = get_author_posts_url( get_the_author_meta( 'ID' ) );?>
										    <a class="tip author-avatar" href="<?php echo esc_url( $archive_link ); ?>" title="Posts by <?php the_author(); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 ); ?></a>
											<span class="name"><?php the_author(); ?></span>
										  <?php
										}?>
									</div><!--/author-->
								</div>
								<div class="article-meta">
									<p class="excerpt">
		                            	<?php echo get_the_excerpt() ?>
		                           	</p>
									<p class="date">Updated <?php the_modified_date(); ?></p>
									<div class="header-buttons">
		                            	<ul>
											<li><a class="tip fab fa-facebook" target="_blank" title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()?>" alt="Share on Facebook"></a></li>
											<li><a class="tip fab fa-twitter" target="_blank" title="Share on Twitter" href="https://twitter.com/share?text=<?php urlencode(the_title())?>&url=<?php urlencode(the_permalink())?>" alt="Share on Twitter"></a></li>
											<li><a href="mailto:?subject=Article%20on%20The%20Safe%20Zone%20Project%3a%20<?php urlencode(the_title())?>&body=The%20link%3A%20<?php urlencode(the_permalink())?>" target="_blank" class="tip far fa-envelope" title="Send via Email" alt="Send via Email"></a></li>
		                              	</ul>
		                            </div>
								</div>
	                        </header> <!-- end article header -->

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
								<?php szp_hook_before_post() ?>

								<section class="entry-content clearfix">
									<?php the_content(); ?>
								</section> <!-- end article section -->

								<footer class="article-footer type-wrap pad">
									<?php the_tags('<p class="tags">', ' ', '</p>'); ?>

									<div id="footer-social" class="flex flex-centered">
										<h3>Join the conversation on <i class="far fa-long-arrow-right"></i></h3>
										<a id="facebook" href="https://facebook.com/safezoneproject" alt="Join the conversation with The Safe Zone Project on Facebook" target="_blank">
											<i class="fab fa-2x fa-fw fa-facebook"></i>
											<strong>Facebook</strong>
										</a>
										<a id="twitter" href="https://twitter.com/safezoneproject" alt="Join the conversation with The Safe Zone Project on Twitter" target="_blank">
											<i class="fab fa-2x fa-fw fa-twitter"></i>
											<strong>Twitter</strong>
										</a>
									</div>


								</footer> <!-- end article footer -->

							</article> <!-- end article -->

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
								</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->
				</div>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
