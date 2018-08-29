<?php
/*
Template Name: Services
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="center-wrap clearfix">

                    <div id="main" class="clearfix" role="main">

                            <header class="article-header">

                                <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

                            </header> <!-- end article header -->

                            <div id="services" class="clearfix">

                                <div class="fourcol first clearfix">
                                    <div class="serviceImage clearfix">
                                        <a alt="Train-the-Trainer Visits" href="http://thesafezoneproject.com/services/train-the-trainers">
                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/service-train-the-trainers.jpg" alt="Service"/>
                                            <h3>
                                                Train-the-Trainers Visits
                                            </h3>
                                        </a>
                                    </div>

                                    <p>
                                        <strong>Are you looking to start training members of your community or organization? Do you have a group of future facilitators who could benefit from some next-level training? Great! This is our jam.</strong>
                                    </p>
                                    <p>
                                        We love working with orgs and schools to develop a group of trainers, who can then go out into their community and facilitate change. While we enjoy providing fish, we'd rather teach you how to do the fishing yourself. It's more sustainable, it does more good for you, and &mdash; let's be honest &mdash; it's really fun spending a couple days with ambitious trainers.
                                    </p>

                                    <a class="actNow button" alt="Learn More" href="http://thesafezoneproject.com/services/train-the-trainers">
                                        Learn More
                                        <i class="icon-arrow-right"></i>
                                    </a>

                                </div>

                                <div class="fourcol clearfix">
                                    <div class="serviceImage clearfix">
                                        <a alt="Curriculum Development" href="http://thesafezoneproject.com/services/consulting">
                                            <img src="<?php echo get_template_directory_uri(); ?>/library/images/service-curriculum-development.jpg" alt="Service"/>
                                            <h3>
                                                Curriculum &amp; Consulting
                                            </h3>
                                        </a>
                                    </div>

                                    <p>
                                        <strong>If you have a group in place to train, but are unsure of (1) where to start, (2) what your community needs to be trained on, or (3) how you might roll out your new program, we can help you get those ducks in a row.</strong>
                                    </p>
                                    <p>
                                        There is no one "Right Way" to do safe zone, but we have picked up some best practices we'd love to share &mdash; tailored to your needs, your population, and the specific goals you're trying to accomplish.
                                    </p>

                                    <a class="actNow button" alt="Schedule Now" target="_blank" href="mailto:yo@thesafezoneproject.com?Subject=SZP%20Service%3A%20Consulting">
                                        Schedule a Consultation
                                        <i class="icon-calendar"></i>
                                    </a>

                                    <a class="learnMore button" alt="Learn More" href="http://thesafezoneproject.com/services/consulting">
                                        Learn More
                                        <i class="icon-arrow-right"></i>
                                    </a>

                                </div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix fourcol last'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                                <section class="entry-content clearfix" itemprop="articleBody">
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


                            </div>


                            <?php szp_hook_after_page() ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
