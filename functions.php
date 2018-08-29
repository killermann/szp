<?php

require_once('library/bones.php');
require_once('library/activity-post-type.php');
require_once('library/hrf_faq-post-type.php');
require_once('library/admin.php');
require_once('library/loops.php');
require_once('library/hooks.php');

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
    register_sidebar(array(
    	'id' => 'course',
    	'name' => __('Course Sidebar', 'bonestheme'),
    	'description' => __('Displayed alongside lessons within courses', 'bonestheme'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
}

add_theme_support( 'align-wide' );
add_theme_support( 'title-tag' );
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'sfwd-courses', 'excerpt' );


//* Link e4gf_events CPT to categories taxonomy https://sridharkatakam.com/adding-categories-support-to-a-custom-post-type-in-wordpress/
add_action( 'init', 'sk_add_category_taxonomy_to_events' );
function sk_add_category_taxonomy_to_events() {
	register_taxonomy_for_object_type( 'category', 'download' );
}

/**
** Custom Post Types in Archives
**/

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() || is_author() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'hrf_faq', 'activity', 'download'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}

/**
** Advanced Custom Fields
**/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Downloadable Curricula',
		'menu_title'	=> 'Curricula',
        'icon_url' 		=> 'dashicons-media-document',
		'position' 		=> 4,
		'menu_slug' 	=> 'downloadable-curricula',
		'capability'	=> 'manage_options',
		'redirect'		=> false
	));
}

/**
**Show YOAST Primary Category
**/
function szp_primary_category() {

	// SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
	// By https://joshuawinn.com/using-yoasts-primary-category-in-wordpress-theme/
	$category = get_the_category();
	$useCatLink = true;
	// If post has a category assigned.
	if ($category){
		$category_display = '';
		$category_link = '';
		if ( class_exists('WPSEO_Primary_Term') )
		{
			// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
			$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term = get_term( $wpseo_primary_term );
			if (is_wp_error($term)) {
				// Default to first category (not Yoast) if an error is returned
				$category_display = $category[0]->name;
				$category_link = get_category_link( $category[0]->term_id );
			} else {
				// Yoast Primary category
				$category_display = $term->name;
				$category_link = get_category_link( $term->term_id );
			}
		}
		else {
			// Default, display the first category in WP's list of assigned categories
			$category_display = $category[0]->name;
			$category_link = get_category_link( $category[0]->term_id );
		}
		// Display category
		if ( !empty($category_display) ){
		    if ( $useCatLink == true && !empty($category_link) ){
			echo '<span class="primary-category">';
			echo '<a href="'.$category_link.'">'.$category_display.'</a>';
			echo '</span>';
		    } else {
			echo '<span class="post-category">'.$category_display.'</span>';
		    }
		}
	}
}

/**
 * Conditionally Override Yoast SEO Breadcrumb Trail
 * https://plugins.svn.wordpress.org/wordpress-seo/trunk/frontend/class-breadcrumbs.php
 * -----------------------------------------------------------------------------------
 */

add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );

function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_singular( 'post' ) ) {
        $breadcrumb[] = array(
            'url' => get_permalink( get_option( 'page_for_posts' ) ),
            'text' => 'Blog',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    if ( is_singular( 'activity' ) ) {
        $breadcrumb[] = array(
            'url' => 'https://thesafezoneproject.com/activities',
            'text' => 'Activities',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}


/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search','bonestheme').'" />
    <button type="submit" id="searchsubmit"/>
	</button>
    </form>';
    return $form;
} // don't remove this bracket!

// Hide From Search Certain Post IDs https://firstsiteguide.com/wordpress-search-features/

function jp_search_filter( $query ) {
    if ( $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 1,749,2949,2950,2951,2952,3506) );
    }
}

add_action( 'pre_get_posts', 'jp_search_filter' );

/**
** Popular Searches
**/

function get_popular_searches(){?>
    <ul class="popularSearches">
        <li>
            <a href="<?php home_url( '/' )?>/?s=pronouns" alt="Search keyword pronouns">
                <span>pronouns</span>
                <i class="far fa-lg fa-search"></i>
            </a>
        </li>
        <li>
            <a href="<?php home_url( '/' )?>/?s=certification" alt="Search keyword certification">
                <span>certification</span>
                <i class="far fa-lg fa-search"></i>
            </a>
        </li>
        <li>
            <a href="<?php home_url( '/' )?>/?s=how+to+become+safe+zone+trainer" alt="Search keyword how to become safe zone trainer">
                <span>how to become safe zone trainer</span>
                <i class="far fa-lg fa-search"></i>
            </a>
        </li>
        <li>
            <a href="<?php home_url( '/' )?>/?s=handouts" alt="Search keyword handouts">
                <span>handouts</span>
                <i class="far fa-lg fa-search"></i>
            </a>
        </li>
        <li>
            <a href="<?php home_url( '/' )?>/?s=facilitator+skills" alt="Search keyword facilitator skills">
                <span>facilitator skills</span>
                <i class="far fa-lg fa-search"></i>
            </a>
        </li>
        <li>
            <a href="<?php home_url( '/' )?>/?s=online+training" alt="Search keyword online training">
                <span>online training</span>
                <i class="far fa-lg fa-search"></i>
            </a>
        </li>
        <li>
            <a href="<?php home_url( '/' )?>/?s=get+my+organization+trained" alt="Search keyword get my organization trained">
                <span>get my organization trained</span>
                <i class="far fa-lg fa-search"></i>
            </a>
        </li>
    </ul>
<?php }

/************* ADD CATEGORY NAME TO BODY CLASS *****************/

function add_category_name($classes = '') {
    if(is_single()) {
        $category = get_the_category();
        $classes[] = 'category-'.$category[0]->slug;
        }
    elseif ( is_singular( 'page' ) ) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }

   return $classes;
}
add_filter('body_class','add_category_name');

/************* CUSTOM FUNCTIONS *****************/

function get_big_download(){
		if(!is_page(471)){?>
<div class="big-download-container">
    <a onclick="downloadCurriculumModal(); gtag('event', 'click', { 'event_category': 'Curricula', 'event_action': 'Click', 'event_label': 'Big Download Foundational'});" alt="Download Free 2-Hour Curriculum" title="Download our Free 2-Hour Curriculum">
        <div class="pulse">
            <div class="big-button"><i class="far fa-fw fa-download"></i></div>
        </div>
        <div class="big-text"><strong>Download Free</strong> <span>2-Hour Curriculum</span></div>
        <div class="version">5.0</div>
    </a>
</div>
	<?php }
}

function get_download_brag(){?>
<span class="download-count">Join over 25,000 Educators in 100 Countries</span>
<?php }

function get_curriculum_covers() {?>

<div class="szp-curriculum-covers-wrap">
    <?php get_big_download();?>
    <div class="szp-curriculum-covers">
        <div class="cover facilitator-guide">
            <a onClick="downloadCurriculumModal();" alt="Download our Free 2-Hour Curriculum">
                <img src="<?php echo get_template_directory_uri(); ?>/library/images/szp-curriculum-cover-facilitator-300.jpg" alt="Safe Zone Facilitator Guide Cover">
            </a>
        </div>
        <div class="cover participant-packet">
            <a onClick="downloadCurriculumModal();" alt="Download our Free 2-Hour Curriculum">
                <img src="<?php echo get_template_directory_uri(); ?>/library/images/szp-curriculum-cover-participant-300.jpg" alt="Safe Zone Participant Packet Cover">
            </a>
        </div>
    </div>
</div>
<?php }

function getAllStarBanner() {
    if(in_category('all-star-facilitator-series')){?>
        <div id="allStarBanner" class="type-wrap pad">
            <h3><a href="https://thesafezoneproject.com/all-star/" alt="All-Star Facilitor Series"><i class="icon-star"></i> All-Star Facilitator Series</a></h3>
            <p>This is an one of the many lessons in our All-Star Facilitator Series, designed to help social justice educators improve their skills. <a href="https://thesafezoneproject.com/category/all-star-facilitator-series/" alt="All-Star Series">Click here</a> to see the rest of the posts, or if you have an idea for a lesson <a href="https://thesafezoneproject.com/get-involved/" alt="Get Involved">get involved</a>. <strong>Note: this series spun off into our book, <a href="https://thesafezoneproject.com/unlocking-the-magic-of-facilitation-by-sam-killermann-meg-bolger/" alt="Unlocking the Magic"><em>Unlocking the Magic of Facilitation</em></a> &mdash; where we expand on some of these lessons, and include others.</strong></p>
        </div>
    <?php }
}

add_action('szp_hook_before_post','getAllStarBanner');

function get_activity_finder() {?>
    <div id="activityFinder">
        <header>
            <h3 class="white"><i class="far fa-lg fa-crosshairs"></i> Activity Finder</h3>
        </header>
        <fieldset id="fieldset-activity_type">
            <legend class="accordion open" data-content-id="activities-by-Activity-Type">Activity Type</legend>
            <div id="activities-by-Activity-Type">
                <span>
                    <input id="find--large-group" type="checkbox" value=".activity_type-large-group" />
                    <label for="find--large-group">Large Group</label>
                </span>
                <span>
                    <input id="find--small-group" type="checkbox" value=".activity_type-small-group" />
                    <label for="find--small-group">Small Group</label>
                </span>
                <span>
                    <input id="find--reflective" type="checkbox" value=".activity_type-reflective" />
                    <label for="find--reflective">Reflective</label>
                </span>
                <span>
                    <input id="find--housekeeping" type="checkbox" value=".activity_type-housekeeping" />
                    <label for="find--housekeeping">Housekeeping</label>
                </span>
                <span>
                    <input id="find--energizer" type="checkbox" value=".activity_type-energizer" />
                    <label for="find--energizer">Energizer</label>
                </span>
                <span>
                    <input id="find--guided-discussion" type="checkbox" value=".activity_type-guided-discussion" />
                    <label for="find--guided-discussion">Guided Discussion</label>
                </span>
                <span>
                    <input id="find--lecture" type="checkbox" value=".activity_type-lecture" />
                    <label for="find--lecture">Lecture</label>
                </span>
            </div>
        </fieldset>
        <fieldset id="fieldset-activity_level">
            <legend class="accordion open" data-content-id="activities-by-Knowledge-Levels">Knowledge Levels</legend>
            <div id="activities-by-Knowledge-Levels">
                <span>
                    <input id="find--101" type="checkbox" value=".activity_level-beginner" />
                    <label for="find--101">101</label>
                </span>
                <span>
                    <input id="find--201" type="checkbox" value=".activity_level-intermediate" />
                    <label for="find--201">201</label>
                </span>
                <!-- <span>
                    <input id="find--301" type="checkbox" value=".activity_level-advanced" />
                    <label for="find--301">301</label>
                </span> -->
            </div>
        </fieldset>
        <fieldset id="fieldset-activity_trust">
            <legend class="accordion open" data-content-id="activities-by-Trust-Levels">Trust Levels</legend>
            <div id="activities-by-Trust-Levels">
                <span>
                    <input id="find--low" type="checkbox" value=".activity_trust-low" />
                    <label for="find--low">Low</label>
                </span>
                <span>
                    <input id="find--medium" type="checkbox" value=".activity_trust-medium" />
                    <label for="find--medium">Medium</label>
                </span>
                <!-- <span>
                    <input id="find--high" type="checkbox" value=".activity_trust-high" />
                    <label for="find--high">High</label>
                </span> -->
            </div>
        </fieldset>
        <fieldset id="fieldset-activity_time">
            <legend class="accordion open" data-content-id="activities-by-Time-Lengths">Time Lengths</legend>
            <div id="activities-by-Time-Lengths">
                <span>
                    <input id="find--2-mins" type="checkbox" value=".activity_time-2-mins" />
                    <label for="find--2-mins">2 mins</label>
                </span>
                <span>
                    <input id="find--5-mins" type="checkbox" value=".activity_time-5-mins" />
                    <label for="find--5-mins">5 mins</label>
                </span>
                <span>
                    <input id="find--10-mins" type="checkbox" value=".activity_time-10-mins" />
                    <label for="find--10-mins">10 mins</label>
                </span>
                <span>
                    <input id="find--20-mins" type="checkbox" value=".activity_time-20-mins" />
                    <label for="find--20-mins">20 mins</label>
                </span>
                <span>
                    <input id="find--40-mins" type="checkbox" value=".activity_time-40-mins" />
                    <label for="find--40-mins">40 mins</label>
                </span>
            </div>
        </fieldset>
        <fieldset id="fieldset-activity_themes">
            <legend class="accordion open" data-content-id="activities-by-Subjects">Subjects</legend>
            <div id="activities-by-Subjects">
                <span>
                    <input id="find--asexuality" type="checkbox" value=".activity_themes-asexuality" />
                    <label for="find--asexuality">asexuality</label>
                </span>
                <span>
                    <input id="find--cissexism" type="checkbox" value=".activity_themes-cissexism" />
                    <label for="find--cissexism">cissexism</label>
                </span>
                <span>
                    <input id="find--coming-out" type="checkbox" value=".activity_themes-coming-out" />
                    <label for="find--coming-out">coming out</label>
                </span>
                <span>
                    <input id="find--discrimination" type="checkbox" value=".activity_themes-discrimination" />
                    <label for="find--discrimination">discrimination</label>
                </span>
                <span>
                    <input id="find--gender" type="checkbox" value=".activity_themes-gender" />
                    <label for="find--gender">gender</label>
                </span>
                <span>
                    <input id="find--intersectionality" type="checkbox" value=".activity_themes-intersectionality" />
                    <label for="find--intersectionality">intersectionality</label>
                </span>
                <span>
                    <input id="find--prejudice" type="checkbox" value=".activity_themes-prejudice" />
                    <label for="find--prejudice">prejudice</label>
                </span>
                <span>
                    <input id="find--privilege" type="checkbox" value=".activity_themes-privilege" />
                    <label for="find--privilege">privilege</label>
                </span>
                <span>
                    <input id="find--queerness" type="checkbox" value=".activity_themes-queerness" />
                    <label for="find--queerness">queerness</label>
                </span>
                <span>
                    <input id="find--stereotypes" type="checkbox" value=".activity_themes-stereotypes" />
                    <label for="find--stereotypes">stereotypes</label>
                </span>
                <span>
                    <input id="find--transphobia" type="checkbox" value=".activity_themes-transphobia" />
                    <label for="find--transphobia">transphobia</label>
                </span>
                <span>
                    <input id="find--vocabulary" type="checkbox" value=".activity_themes-vocabulary" />
                    <label for="find--vocabulary">vocabulary</label>
                </span>
            </div>
        </fieldset>

    </div><!--/activityFinder-->
<?php }
/**** Child Page Loop ****/
function childPageLoop(){?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix childPage'); ?> role="article">
    <a href="<?php the_permalink() ?>" class="clearfix" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
    </a>
 </article> <!-- end blogged --><?php
}

/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function tgm_io_cpt_search( $query ) {

    if ( $query->is_search ) {
	$query->set( 'post_type', array( 'page','post','activity', 'hrf_faq', 'download') );
    }

    return $query;

}
add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );

/************* LEARN / TEACH / LEAD PAGE *****************/

function getLearnPageCards(){
    if (is_page('learn')) {?>
        <section id="all">
            <div class="type-wrap text-center entry-content">
                <h2>All Articles, FAQs, Activities, & Courses for Learners</h2>
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
            <div class="isotope">
                <?php $all_activities = new WP_Query(
                    array(
                        'post_type' => array('nav_menu_item', 'post', 'hrf_faq', 'activity','download'),
                        'category_name' => 'for-learners',
                        'posts_per_page' => -1,
                    )
                );

                while($all_activities->have_posts()) : $all_activities->the_post();

                    loopShuffleCards();

                endwhile; wp_reset_postdata(); ?>
            </div><!--/isotope-->
        </section>
        <script src='https://npmcdn.com/isotope-layout@3.0.6/dist/isotope.pkgd.js'></script>

        <script>
        $(document).ready(function() {

        	// init Isotope
        	var $container = $('.isotope').isotope({
        		itemSelector: '.card',
        		masonry: {
        			columnWidth: 250,
        			isFitWidth: true
        		}
        	});

        	// filter with selects and checkboxes
        	var $checkboxes = $('#filters input');

        	$checkboxes.change( function() {
        	  // map input values to an array
        	  var inclusives = [];
        	  var outputs = [];
        	  // inclusive filters from checkboxes
        	  $checkboxes.each( function( i, elem ) {
        	    // if checkbox, use value if checked
        	    if ( elem.checked ) {
        	      inclusives.push( elem.value );
        		  outputs.push( elem.name );
        	    }
        	  });

        	  // combine inclusive filters
        	  var filterValue = inclusives.length ? inclusives.join(', ') : '*';
        	  $container.isotope({ filter: filterValue })
        	});
        });

        </script>
    <?php }
}

add_filter('szp_hook_after_page', 'getLearnPageCards');

function getTeachPageCards(){
    if (is_page('teach')) {?>
        <section id="all">
            <div class="type-wrap text-center entry-content">
                <h2>All Articles, FAQs, Activities, & Courses for Teachers</h2>
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
            <div class="isotope">
                <?php $all_activities = new WP_Query(
                    array(
                        'post_type' => array('nav_menu_item', 'post', 'hrf_faq', 'activity','download'),
                        'category_name' => 'for-teachers',
                        'posts_per_page' => -1,
                    )
                );

                while($all_activities->have_posts()) : $all_activities->the_post();

                    loopShuffleCards();

                endwhile; wp_reset_postdata(); ?>
            </div><!--/isotope-->
        </section>
        <script src='https://npmcdn.com/isotope-layout@3.0.6/dist/isotope.pkgd.js'></script>

        <script>
        $(document).ready(function() {

        	// init Isotope
        	var $container = $('.isotope').isotope({
        		itemSelector: '.card',
        		masonry: {
        			columnWidth: 250,
        			isFitWidth: true
        		}
        	});

        	// filter with selects and checkboxes
        	var $checkboxes = $('#filters input');

        	$checkboxes.change( function() {
        	  // map input values to an array
        	  var inclusives = [];
        	  var outputs = [];
        	  // inclusive filters from checkboxes
        	  $checkboxes.each( function( i, elem ) {
        	    // if checkbox, use value if checked
        	    if ( elem.checked ) {
        	      inclusives.push( elem.value );
        		  outputs.push( elem.name );
        	    }
        	  });

        	  // combine inclusive filters
        	  var filterValue = inclusives.length ? inclusives.join(', ') : '*';
        	  $container.isotope({ filter: filterValue })
        	});
        });

        </script>
    <?php }
}

add_filter('szp_hook_after_page', 'getTeachPageCards');

function getLeadPageCards(){
    if (is_page('lead')) {?>
        <section id="all">
            <div class="type-wrap text-center entry-content">
                <h2>All Articles, FAQs, Activities, & Courses for Leaders</h2>
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
            <div class="isotope">
                <?php $all_activities = new WP_Query(
                    array(
                        'post_type' => array('nav_menu_item', 'post', 'hrf_faq', 'activity','download'),
                        'category_name' => 'for-leaders',
                        'posts_per_page' => -1,
                    )
                );

                while($all_activities->have_posts()) : $all_activities->the_post();

                    loopShuffleCards();

                endwhile; wp_reset_postdata(); ?>
            </div><!--/isotope-->
        </section>
        <script src='https://npmcdn.com/isotope-layout@3.0.6/dist/isotope.pkgd.js'></script>

        <script>
        $(document).ready(function() {

        	// init Isotope
        	var $container = $('.isotope').isotope({
        		itemSelector: '.card',
        		masonry: {
        			columnWidth: 250,
        			isFitWidth: true
        		}
        	});

        	// filter with selects and checkboxes
        	var $checkboxes = $('#filters input');

        	$checkboxes.change( function() {
        	  // map input values to an array
        	  var inclusives = [];
        	  var outputs = [];
        	  // inclusive filters from checkboxes
        	  $checkboxes.each( function( i, elem ) {
        	    // if checkbox, use value if checked
        	    if ( elem.checked ) {
        	      inclusives.push( elem.value );
        		  outputs.push( elem.name );
        	    }
        	  });

        	  // combine inclusive filters
        	  var filterValue = inclusives.length ? inclusives.join(', ') : '*';
        	  $container.isotope({ filter: filterValue })
        	});
        });

        </script>
    <?php }
}

add_filter('szp_hook_after_page', 'getLeadPageCards');

/************* Remove Dashicons for Visitors *****************/

add_action( 'wp_print_styles', function() {
    if (!is_admin_bar_showing()) wp_deregister_style( 'dashicons' );
}, 100);

/************* Change Easy Digital Downloads Slug *****************/

if ( ! defined( 'EDD_SLUG' ) ) {
    define( 'EDD_SLUG', 'resources/courses' );
}
?>
