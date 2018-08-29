<?php get_header(); ?>

			<div id="content" class="clearfix <?php $category = get_the_category(); echo $category[0]->slug;?>">

				<div id="inner-content" class="wrap clearfix stickem-container">
					<div id="pre-content">
						<nav id="breadcrumbs-container" class="cellHide" aria-label="breadcrumb">
							<?php
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('
									<p id="breadcrumbs">','</p>
								');
							}
							?>
						</nav>
						<nav id="help">
							<a href="https://thesafezoneproject.com/help/how-to-use-this-site/" alt="How to Use this Site">
								<span>How to Use</span>
								<i class="far fa-question fa-fw"></i>
							</a>
						</nav>
					</div>
					<div id="the-content" class="clearfix">
						<header class="article-header cat-bg sticky">
							<h1 class="single-title"><?php the_title(); ?></h1>
							<div class="header-buttons">
								<ul>
									<?php if( get_field('pdf') ): ?>
									<li><a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Download', 'event_label': 'Download PDF'});" class="tip far fa-download" title="Download .PDF" target="_blank" href="<?php the_field('pdf')?>" alt="Download this Activity as a PDF"></a></li>
									<?php endif; if( get_field ('google_drive') ): ?>
									<li><a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Click', 'event_label': 'View Google Doc'});" class="tip fab fa-google-drive" target="_blank" title="View as Google Doc" href="<?php the_field('google_drive')?>" alt="View as Google Doc"></a></li>
									<?php endif;?>
									<?php if( get_field ('google_drive') ):?>
									<li><a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Copy', 'event_label': 'Copy to my Drive'});" class="tip far fa-copy" target="_blank" title="Copy to my Google Drive" href="<?php the_field('google_drive')?>/copy" alt="Copy to my Google Drive"></a></li>
									<?php elseif( get_field ('copy_paste') ): ?>
									<li><a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Click', 'event_label': 'Deprecated: View Copy Paste PDF'});" class="tip far fa-copy" target="_blank" title="View Copy/Paste-able .PDF" href="<?php the_field('copy_paste')?>" alt="View Copy/Paste-able .PDF"></a></li>
									<?php endif;?>
									<li><a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Share', 'event_label': 'Facebook'});" class="tip fab fa-facebook" target="_blank" title="Share with my Friends" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()?>" alt="Share with my Friends"></a></li>
									<li><a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Share', 'event_label': 'Twitter'});" class="tip fab fa-twitter" target="_blank" title="Share with my Followers" href="https://twitter.com/share?text=<?php urlencode(the_title())?>&url=<?php urlencode(the_permalink())?>" alt="Share with my Followers"></a></li>
								</ul>
							</div>
						</header> <!-- end article header -->

						<div id="main" class="eightcol first clearfix" role="main">

                        	<div class="excerpt pad">
                            	<?php echo get_the_excerpt() ?>
                           	</div>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<section class="entry-content pad clearfix">

									<div class="article-buttons">
										<?php if( get_field('pdf') ): ?>
										<a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Download', 'event_label': 'Download PDF - In-Text'});" title="Download .PDF" href="<?php the_field('pdf')?>" alt="Download this Activity as a PDF">Download Activity <i class="far fa-lg fa-download"></i></a>
										<?php endif; if( get_field ('google_drive') ): ?>
										<a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Click', 'event_label': 'View Google Doc - In-Text'});" target="_blank" title="View as Google Doc" href="<?php the_field('google_drive')?>" alt="View on Google Drive">View as Google Doc <i class="fab fa-lg fa-google-drive"></i></a>
										<?php endif;?>
										<?php if( get_field ('google_drive') ):?>
										<a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Copy', 'event_label': 'Copy to my Drive - In-Text'});" target="_blank" title="Copy to my Google Drive" href="<?php the_field('google_drive')?>/copy" alt="Copy to my Google Drive">Copy to my Google Drive <i class="far fa-lg fa-copy"></i></a>
										<?php elseif( get_field ('copy_paste') ): ?>
										<a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Click', 'event_label': 'Deprecated: View Copy Paste PDF - In-Text'});" target="_blank" title="View Copy/Paste-able .PDF" href="<?php the_field('copy_paste')?>" alt="View Copy/Paste-able .PDF">View Copy/Paste-able .PDF <i class="far fa-lg fa-copy"></i></a>
										<?php endif;?>
									</div>

									<?php the_content(); ?>

								</section> <!-- end article section -->

								<footer class="article-footer">

									<div id="postInfoBox">
								        <div class="author-profile flex">
								            <div class="profilePic">
								                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '120' ); ?></a>
								            </div>
								            <div class="authorInfo">
								                <h4 class="authorName clearfix">Submitted by <?php the_author_posts_link(); ?></h4>
								                <p class="authorBio"><?php the_author_description(); ?> </p>
								            </div>
								        </div>
								    </div><!--/postInfoBox-->

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
												<p><?php _e("This is the error message in the single-custom_type.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->
						<aside id="activity-sidebar" class="sidebar fourcol last" role="sidebar">
							<h3><i class="far fa-crosshairs"></i> Activity Attributes</h3>
							<div class="clearfix activity-deets cat-text">
						        <ul>
						            <li class="type"><?php echo get_the_term_list( get_the_ID(), 'activity_type', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
						            <li class="level"><?php echo get_the_term_list( get_the_ID(), 'activity_level', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
						            <li class="trust"><?php echo get_the_term_list( get_the_ID(), 'activity_trust', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
						            <li class="time"><?php echo get_the_term_list( get_the_ID(), 'activity_time', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
						            <li class="themes clearfix"><?php echo get_the_term_list( get_the_ID(), 'activity_themes', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
						        </ul>
						    </div>
						</aside>
						<nav id="toc" class="fourcol last clearfix sticky" role="navigation">
							<h3><i class="far fa-list-alt"></i> Jump to...</h3>
							<ol data-toc="section.entry-content" data-toc-headings="h2,h3,h4"></ol>
						</nav>

					</div> <!--/the-content-->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>
