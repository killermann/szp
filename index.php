<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="center-wrap clearfix">

				    <div id="main" class="cards" role="main">
						<article id="subscribeToTheBlog" <?php post_class('card blog'); ?>>
							<header>
								<h1 class="szpBlogLogo">
									<i class="far fa-pull-right fa-fw fa-2x fa-comment-check"></i>
									The<br/> SZP<br/> Blog
								</h1>
							</header>
							<section>
								<?php echo do_shortcode('[jetpack_subscription_form title="Get new blog posts directly in your inbox" subscribe_text="Every blog post. In your inbox. Easy-peasy. (Note: this is a separate service from the curriculum updates)" subscribe_button="Sign Me Up"]');?>
							</section>
							<footer>
								Follow us on <a href="https://facebook.com/safezoneproject" alt="SZP on Facebook"><i class="fab fa-facebook fa-fw"></i>Facebook</a> and <a href="https://twitter.com/safezoneproject" alt="SZP on Twitter"><i class="fab fa-twitter fa-fw"></i>Twitter</a>
							</footer>
					    </article> <!-- end blogged -->


					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					   	<?php blogCards();?>

					    <?php endwhile; ?>

				    </div> <!-- end #main -->
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


				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
