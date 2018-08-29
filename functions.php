<?php
/*
Author: Sam Killermann
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
require_once('library/activity-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 200, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => __('Sidebar 1', 'bonestheme'),
    	'description' => __('The first (primary) sidebar.', 'bonestheme'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    /*
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call
    your new sidebar just use the following code:

    Just change the name to whatever your new
    sidebar's id is, for example:

    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => __('Sidebar 2', 'bonestheme'),
    	'description' => __('The second (secondary) sidebar.', 'bonestheme'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php

    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php
			    /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */
			    ?>
			    <!-- custom gravatar call -->
			    <?php
			    	// create variable
			    	$bgauthemail = get_comment_author_email();
			    ?>
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" class="clearfix" id="searchform" action="' . home_url( '/' ) . '" >
    <button type="submit" id="searchsubmit"/>
	</button>
    <label class="screen-reader-text" for="s">' . __('', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('To search, type and hit enter','bonestheme').'" />
    </form>';
    return $form;
} // don't remove this bracket!


/************* ADD CATEGORY NAME TO BODY CLASS *****************/

function add_category_name($classes = '') {
   if(is_single()) {
      $category = get_the_category();
      $classes[] = 'category-'.$category[0]->slug;
   }
   return $classes;
}
add_filter('body_class','add_category_name');


/************* CUSTOM HOOKS *****************/

function szp_hook_after_nav() {
	do_action('szp_hook_after_nav');
}

function szp_hook_before_sidebar() {
	do_action('szp_hook_before_sidebar');
}

function szp_hook_first_sidebar() {
	do_action('szp_hook_first_sidebar');
}

function szp_hook_after_page() {
	do_action('szp_hook_after_page');
}

function szp_hook_after_full_width() {
	do_action('szp_hook_after_full_width');
}

function szp_hook_before_post() {
    do_action('szp_hook_before_post');
}


function get_big_download(){
	if(!is_home()) {
		if(!is_page(471)){?>
        <div id="big-download-container" class="clearfix">
            <a href="#" class="openThanksShare" alt="Download our Ready-to-Rock 2-Hour Curriculum">
                <div id="big-button"><i class="icon-download-alt"></i></div>
                <div id="big-text">Download our Ready-to-Rock <em>v4.0</em><br/> <span>2-Hour Curriculum</span></div>
            </a>
        </div>
	<?php }
	}
}

add_action('szp_hook_after_nav','get_big_download');

function getAllStarBanner() {
    if(in_category('all-star-facilitator-series')){?>
        <div id="allStarBanner">
            <h3><a href="http://thesafezoneproject.com/all-star/" alt="All-Star Facilitor Series"><i class="icon-star"></i> All-Star Facilitator Series</a></h3>
            <p>This is an one of the many lessons in our All-Star Facilitator Series, designed to help social justice educators improve their skills. <a href="http://thesafezoneproject.com/category/all-star-facilitator-series/" alt="All-Star Series">Click here</a> to see the rest of the posts, or if you have an idea for a lesson <a href="http://thesafezoneproject.com/get-involved/" alt="Get Involved">get involved</a>. <strong>Note: this series spun off into our book, <a href="http://thesafezoneproject.com/unlocking-the-magic-of-facilitation-by-sam-killermann-meg-bolger/" alt="Unlocking the Magic"><em>Unlocking the Magic of Facilitation</em></a> &mdash; where we expand on some of these lessons, and include others.</strong></p>
        </div>
    <?php }
}

add_action('szp_hook_before_post','getAllStarBanner');

function postInfoBox() {
    if(is_single()) {?>
    <div id="postInfoBox">
        <div class="author-profile clearfix">
            <div class="profilePic first fourcol">
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '300' ); ?></a>
            </div>
            <div class="authorInfo last eightcol clearfix">
                <span class="authorName clearfix">By <?php the_author_posts_link(); ?></span>
                <p class="authorBio"><?php the_author_description(); ?> </p>
            </div>


        </div>
    </div><!--/postInfoBox-->
    <?php }
}

add_action('szp_hook_before_sidebar','postInfoBox');


function get_custom_tax_box(){?>

    <div id="search-by-tax-container">
        <h3><i class="icon-screenshot"></i> Activity Finder</h3>
        <div id="search-by-tax">
            <ul id="custom-tax-list">
                <li><h4><i class="icon-user"></i> By Activity Type</h4></li>
                    <ul class="clearfix pad-5">
                        <li><a class="blue" href="<?php echo home_url(); ?>/activity/type/large-group/" alt="Large Group">Large Group</a></li>

                        <li><a class="green" href="<?php echo home_url(); ?>/activity/type/reflective/" alt="Reflective">Reflective</a></li>
                        <li><a class="yellow" href="<?php echo home_url(); ?>/activity/type/guided-discussion/" alt="Guided Discussion">Guided Discussion</a></li>
                        <li><a class="orange" href="<?php echo home_url(); ?>/activity/type/small-group/" alt="Small Group">Small Group</a></li>
                    	<li><a class="red" href="<?php echo home_url(); ?>/activity/type/energizer/" alt="Energizer">Energizer</a></li>
                        <li><a class="pink" href="<?php echo home_url(); ?>/activity/type/housekeeping/" alt="Housekeeping">Housekeeping</a></li>
                        <li><a class="purple" href="<?php echo home_url(); ?>/activity/type/lecture/" alt="Lecture">Lecture</a></li>

                    </ul>

              	<li><h4><i class="icon-lightbulb"></i> By Level of Knowledge</h4></li>
                    <ul class="clearfix pad-5">
                        <li><a href="<?php echo home_url(); ?>/activity/level/101/" alt="101">101</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/level/201/" alt="201">201</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/level/301/" alt="301">301</a></li>
                    </ul>

                <li><h4><i class="icon-lock"></i> By Trust Level</h4></li>
                    <ul class="clearfix pad-5">
                        <li><a href="<?php echo home_url(); ?>/activity/trust/low/" alt="Low">Low</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/trust/medium/" alt="Medium">Medium</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/trust/high/" alt="High">High</a></li>
                    </ul>

                <li><h4><i class="icon-time"></i> By Length of Time</h4></li>
                    <ul class="clearfix pad-5">
                     	<li><a href="<?php echo home_url(); ?>/activity/time/2-mins/" alt="2 minutes">2 mins</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/time/5-mins/" alt="5 minutes">5 mins</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/time/10-mins/" alt="10 minutes">10 mins</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/time/20-mins/" alt="20 minutes">20 mins</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/time/30-mins/" alt="30 minutes">30 mins</a></li>
                    </ul>

                <li><h4><i class="icon-folder-open-alt"></i> By Category</h4></li>
                    <ul class="clearfix pad-5">
                        <li><a href="<?php echo home_url(); ?>/activity/subject/lgbtq/" alt="LGBTQ">LGBTQ</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/subject/sexuality/" alt="Sexuality">Sexuality</a></li>
                        <li><a href="<?php echo home_url(); ?>/activity/subject/gender/" alt="Gender">Gender</a></li>
                    </ul>

                <li><h4><i class="icon-tag"></i> By Individual Themes</h4></li>
                    <ul class="clearfix pad-5">
                    	<?php
						$params = array(
							'taxonomy' => array('activity_themes'),
							'smallest' => '10',
							'largest' => '10',
							'format' => 'list',
							);
						echo wp_tag_cloud($params);
						?>
                    </ul>

        </div>
	</div>
	<?php
}

function get_archive_tax_box(){
	if(is_archive()){
		get_custom_tax_box();
	}
}

add_action('szp_hook_before_sidebar','get_archive_tax_box');

function get_sidebar_tax_box(){
	if(is_single()){
		get_custom_tax_box();
	}
}

add_action('szp_hook_first_sidebar','get_sidebar_tax_box');

/**** Child Page Loop ****/
function childPageLoop(){?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix childPage'); ?> role="article">
    <a href="<?php the_permalink() ?>" class="clearfix" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
    </a>
 </article> <!-- end blogged --><?php
}


/**************************************
MINIMAL LOOP
**************************************/

function loopMinimal() {?>

    <a id="post-<?php the_ID(); ?>" <?php post_class('loopCard clearfix loopMinimal'); ?> href="<?php the_permalink() ?>" alt="Apply for Internship" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <div class="loopText clearfix">
            <h4 class="loopTitle">
                <?php the_title(); ?>
            </h4>
            <?php the_excerpt();?>
        </div><!--/minimaltext-->
    </a><!-- end minimal loopcard-->
<?php
}



/**** ALL ACTIVITIES BOX ****/

function get_all_activities_box() {?>

		<div id="all-activities" class="clearfix" style="margin-top:80px; border-top:3px dashed #dbdbdb">
			<h3>5 Most Recently Added Activities</h3>

			<?php query_posts('post_type=activity&showposts=5');

			if (have_posts()) :

			while (have_posts()) : the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<div class="cat-bg">
					<div class="share-sign"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><i class="icon-share-sign"></i></a></div>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="clearfix activity-deets cat-text">
						<ul>
							<!--<li class="head"><h3>LABELED:</h3></li>-->

							<li class="level"><?php echo get_the_term_list( get_the_ID(), 'activity_level', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
							<li class="trust"><?php echo get_the_term_list( get_the_ID(), 'activity_trust', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
							<li class="time"><?php echo get_the_term_list( get_the_ID(), 'activity_time', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
							<li class="subject"><?php echo get_the_term_list( get_the_ID(), 'activity_subject', '' . __('', 'bonestheme') . '</span> ', '' ) ?></li>
						</ul>
					</div>
				</div> <!-- end all activities -->
			</article> <!-- end article -->
			<?php endwhile; else : endif;?>
		</div> <!-- end #all-activities -->
<?php }

add_action('szp_hook_after_page','get_all_activities_box');
?>
