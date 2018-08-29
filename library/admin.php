<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.

Developed by: Eddie Machado
URL: https://themble.com/bones/

Special Thanks for code & inspiration to:
@jackmcconnell - https://www.voltronik.co.uk/
Digging into WP - https://digwp.com/2010/10/customize-wordpress-dashboard/

*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

	/*
	have more plugin widgets you'd like to remove?
	share them with us so we can get a list of
	the most commonly used. :D
	https://github.com/eddiemachado/bones/issues
	*/
}


// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');
// adding any custom widgets
add_action('wp_dashboard_setup', 'bones_custom_dashboard_widgets');


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//https://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter('login_headerurl', 'bones_login_url');
add_filter('login_headertitle', 'bones_login_title');


/*------------------------------------*\
	Customize Admin Area
\*------------------------------------*/

function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['jetpack_summary_widget']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['pressable_dashboard_widget']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'blue'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

// SHOW/HIDE MENU ITEMS BASED ON USER role
add_action( 'admin_init', 'my_customize_menu_pages' );
function my_customize_menu_pages() {

    global $user_ID;

    if ( current_user_can( 'subscriber' ) ) {
		remove_menu_page('tools.php');
		remove_menu_page('jetpack');
		remove_menu_page('options-general.php'); // Settings
		remove_menu_page('edit-comments.php'); // Comments


		// WECOME MESSAGE FOR DASHBOARD

		function contributor_welcome_widget() {
			echo '
			<h2>🆘‍ Need help getting started?</h2>
			<p><big>Here are a few helpful links to get things moving smoothly for you:</big></p>
			<ul>
				<li>
					<a href="https://thesafezoneproject.com/courses" alt="View all Courses"><strong>🖥 View all Courses</a></strong>: You can find the courses you are enrolled in (as well as any new ones we might have added).
				</li>
				<li>
					<a href="profile.php" alt="Edit your Profile"><strong>👨🏽‍🎨 Create/Edit Your Profile</a></strong>: Click "Profile" in the menu, or <a href="profile.php" alt="Edit your Profile">click this link</a>. We will use this information to create certificates for you.
				</li>
			</ul>
			';
		}
		function add_contributor_welcome_widget() {
			wp_add_dashboard_widget('contributor_welcome_widget', 'Welcome to the Safe Zone Project', 'contributor_welcome_widget');
		}
		add_action('wp_dashboard_setup', 'add_contributor_welcome_widget');
    }

}

// remove Personal Options

if ( ! function_exists( 'cor_remove_personal_options' ) ) {
    /**
    * Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
    */
    function cor_remove_personal_options( $subject ) {
        $subject = preg_replace( '#<h2>Personal Options</h2>.+?/table>#s', '', $subject, 1 );
        return $subject;
    }

    function cor_profile_subject_start() {
        ob_start( 'cor_remove_personal_options' );
    }

    function cor_profile_subject_end() {
        ob_end_flush();
    }
}
add_action( 'admin_head', 'cor_profile_subject_start' );
add_action( 'admin_footer', 'cor_profile_subject_end' );

/************* CUSTOMIZE ADMIN FOOTER *******************/

// Custom Backend Footer
function bones_custom_admin_footer() {
	// echo '<span id="footer-thankyou">The Safe Zone Project <a href="https://wordpress.org" alt="Created with Wordpress">Wordpress</a> Theme was designed/developed by <a href="https://samuelkillermann.com" target="_blank">Sam Killermann</a></span>';
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

?>
