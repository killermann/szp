<?php


/**************************************
ARCHIVE  CARD LOOP
**************************************/


function archiveCards() {?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('card archiveCard clearfix'); ?> role="article">

			<header class="article-header cat-bg">

				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

			</header> <!-- end article header -->

			<section class="flex">
				<?php the_excerpt(); ?>
				<ul class="buttons flex">
					<?php if( get_field('pdf') ): ?>
						<li class="cellHide"><a onclick="gtag('event', 'click', { 'event_category': 'Activities', 'event_action': 'Download', 'event_label': 'Download PDF - On Card'});" class="tip" title="Download .PDF" href="<?php the_field('pdf')?>" alt="Download this Activity as a PDF"><i class="far fa-fw fa-download"></i></a></li>
					<?php endif;?>

					<li><a href="<?php the_permalink() ?>" rel="bookmark" class="tip" title="View <?php the_title_attribute(); ?>">
						<i class="far fa-fw fa-arrow-right"></i>
					</a></li>
				</ul>
			</section> <!-- end article section -->

	</article> <!-- end article -->

<?php }

/**************************************
STANDARD BLOG CARD LOOP
**************************************/

function blogCards() {?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('card blog'); ?> role="article">
		<header>
			<a class="image featuredImage" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('medium_large'); ?>
			</a>
		</header><!--/bloggedImage-->
		<section>
			<?php szp_primary_category();?>
			<h3>
				<a class="title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<div class="author">
				<?php if ( function_exists( 'get_coauthors' ) ) {

				  $coauthors = get_coauthors();
				  foreach ( $coauthors as $coauthor ) {
					$archive_link = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename );
					$link_title = 'Posts by ' . $coauthor->display_name;
					?>
					<a href="<?php esc_url( $archive_link ); ?>" class="tip author-link" title="<?php echo esc_attr( $link_title ); ?>"><?php echo coauthors_get_avatar( $coauthor, 30 ); ?>
					</a>
					<span class="name"><?php echo $coauthor->display_name;?></span>
					<?php
				  }
				// treat author output normally
				} else {
				  $archive_link = get_author_posts_url( get_the_author_meta( 'ID' ) );?>
					<a class="tip author-avatar" href="<?php echo esc_url( $archive_link ); ?>" title="Posts by <?php the_author(); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 30 ); ?></a>
					<span class="name"><?php the_author(); ?></span>
				  <?php
				}?>
			</div><!--/author-->
			<?php the_excerpt();?>
		</section>
		<footer class="flex flex-space-between">
			<?php the_modified_date(); ?>
			<a class="go" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				Go <i class="far fa-long-arrow-right"></i>
			</a>
		</footer>
    </article> <!-- end blogged -->
<?php
}

/**************************************
SHUFFLE CARDS LOOP
**************************************/

function loopShuffleCards() {?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card shuffleCard'); ?>>
	<header class="smallpad">
		<h3>
			<i class="far fa-lg"></i>
			<?php the_title(); ?>
		</h3>
	</header>
	<section>
		<?php if ( has_excerpt( $post->ID ) ) {
			the_excerpt();
		}?>
	</section>
	<footer>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>
	</footer>
</article> <!-- /card -->
<?php }

/**************************************
MINIMAL LOOP
**************************************/

function loopMinimal() {?>

    <a id="post-<?php the_ID(); ?>" <?php post_class('loopCard clearfix loopMinimal'); ?> href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <div class="loopText clearfix">
            <h4 class="loopTitle">
                <?php the_title(); ?>
            </h4>
            <?php the_excerpt();?>
        </div><!--/minimaltext-->
    </a><!-- end minimal loopcard-->
<?php
}

?>
