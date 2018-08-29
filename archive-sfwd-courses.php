<?php get_header(); ?>

			<div id="content" class="<?php $post_type = get_post_type( $post->ID ); echo $post_type;?>">

				<div id="inner-content" class="wrap clearfix">
					<div class="entry-content">
						<header class="archive-header text-center">
							<h1>Active Courses</h1>
						</header> <!-- end article header -->
						<?php the_archive_description( '', '' );?>
					</div><!--/entry-content archive intro-->

					<div id="main" class="eightcol first clearfix cards" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php
						$col = empty($shortcode_atts["col"])? 3:intval($shortcode_atts["col"]);
						$smcol = $col/1.5;
						$col = empty($col)? 1:($col >= 12)? 12:$col;
						$smcol = empty($smcol)? 1:($smcol >= 12)? 12:$smcol;
						$col = intVal(12/$col);
						$smcol = intVal(12/$smcol);

						global $post; $post_id = $post->ID;

						$course_id = $post_id;
						$user_id   = get_current_user_id();

						$enable_video = get_post_meta( $post->ID, '_learndash_course_grid_enable_video_preview', true );
						$embed_code   = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true );
						$button_text  = get_post_meta( $post->ID, '_learndash_course_grid_custom_button_text', true );

						// Retrive oembed HTML if URL provided
						if ( preg_match( '/^http/', $embed_code ) ) {
							$embed_code = wp_oembed_get( $embed_code, array( 'height' => 600, 'width' => 400 ) );
						}

						$button_text = isset( $button_text ) && ! empty( $button_text ) ? $button_text : __( 'See more...', 'learndash_course_grid' );

						$button_text = apply_filters( 'learndash_course_grid_custom_button_text', $button_text, $post_id );

						$options = get_option('sfwd_cpt_options');
						$currency = null;

						if ( ! is_null( $options ) ) {
							if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
							$currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];
						}

						if( is_null( $currency ) )
							$currency = 'USD';

						$course_options = get_post_meta($post_id, "_sfwd-courses", true);
						$price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : __( 'Free', 'learndash_course_grid' );
						$short_description = @$course_options['sfwd-courses_course_short_description'];

						$has_access   = sfwd_lms_has_access( $course_id, $user_id );
						$is_completed = learndash_course_completed( $user_id, $course_id );

						if( $price == '' )
							$price .= __( 'Free', 'learndash_course_grid' );

						if ( is_numeric( $price ) ) {
							if ( $currency == "USD" )
								$price = '$' . $price;
							else
								$price .= ' ' . $currency;
						}

						$class       = '';
						$ribbon_text = '';

						if ( $has_access && ! $is_completed ) {
							$class = 'ld_course_grid_price ribbon-enrolled';
							$ribbon_text = __( 'Enrolled', 'learndash_course_grid' );
						} elseif ( $has_access && $is_completed ) {
							$class = 'ld_course_grid_price';
							$ribbon_text = __( 'Completed', 'learndash_course_grid' );
						} else {
							$class = ! empty( $course_options['sfwd-courses_course_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
							$ribbon_text = $price;
						}?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('blog card course'); ?>>

							<div class="<?php echo esc_attr( $class ); ?>">
								<?php echo esc_attr( $ribbon_text ); ?>
							</div>

							<?php if ( 1 == $enable_video && ! empty( $embed_code ) ) : ?>
							<div class="ld_course_grid_video_embed">
							<?php echo $embed_code; ?>
							</div>
							<?php elseif( has_post_thumbnail() ) :?>
							<a class="featuredImage" href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail('course-thumb'); ?>
							</a>
							<?php endif;?>
							<a href="<?php the_permalink(); ?>" rel="bookmark"><h3 class="entry-title"><?php the_title(); ?></h3></a>
							<div class="caption">
								<?php if(!empty($short_description)) { ?>
								<p class="entry-content"><?php echo htmlspecialchars_decode( do_shortcode( $short_description ) ); ?></p>
								<?php  } else { ?>
								<?php the_excerpt();?>
								<?php } ?>
							</div>
							<footer>
								<div class="flex flex-centered">
									<a href="<?php the_permalink();?>" class="button button-grey">View Course</a>
									<?php echo do_shortcode( '[learndash_payment_buttons course_id="' . get_the_ID() . '"]' ); ?>
								</div>
								<div class="progress-wrap"><?php echo do_shortcode( '[learndash_course_progress course_id="' . get_the_ID() . '" user_id="' . get_current_user_id() . '"]' ); ?></div>
							</footer>
						</article><!-- #post-## -->

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

					</div> <!-- end #main -->

					<?php get_sidebar('course'); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
