<?php

// let's create the function for the custom type
function activity_post_type() {
	// creating (registering) the custom type
	register_post_type( 'activity', /* (https://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Activities', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Activity', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Activities', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Activity', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Activity', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Activity', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Activity', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Activity', 'bonestheme'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'A custom post type for adding activities to the database.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => false,
			'menu_position' => 3, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-yes', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'activities'), /* you can specify its url slug */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'category', 'thumbnail', 'excerpt', 'custom-fields')
	 	) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'activity');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'activity');

}

	// adding the function to the Wordpress init
	add_action( 'init', 'activity_post_type');

	/*
	for more information on taxonomies, go here:
	https://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// activity type
    register_taxonomy( 'activity_type',
    	array('activity'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */
    		'labels' => array(
    			'name' => __( 'Activity Type', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Activity Type', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Activity Types', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Activity Types', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Activity Type', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Activity Type:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Activity Type', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Activity Type', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Activity Type', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Activity Type', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
			'rewrite'	=> array( 'slug' => 'activities/type'), /* you can specify its url slug */
    	)
    );

	// subject
    register_taxonomy( 'activity_subject',
    	array('activity'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,    /* if this is false, it acts like tags */
    		'labels' => array(
    			'name' => __( 'Subject', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Subject', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search by Subject', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Subjects', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Subject', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Subject:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Subject', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Subject', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Subject', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Subject', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
			'rewrite'	=> array( 'slug' => 'activities/subject'), /* you can specify its url slug */
    	)
    );

	// level 101,201,301
    register_taxonomy( 'activity_level',
    	array('activity'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */
    		'labels' => array(
    			'name' => __( 'Level', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Level', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search by Level', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Levels', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Levels', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Levels:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Level', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Level', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Level', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Level', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
			'rewrite'	=> array( 'slug' => 'activities/level'), /* you can specify its url slug */
    	)

    );

	// trust
    register_taxonomy( 'activity_trust',
    	array('activity'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */
    		'labels' => array(
    			'name' => __( 'Trust', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Trust', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search by Trust', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Trusts', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Trust', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Trusts:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Trust', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Trust', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Trust', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Trust', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
			'rewrite'	=> array( 'slug' => 'activities/trust'), /* you can specify its url slug */
    	)

    );



	// themes
    register_taxonomy( 'activity_themes',
    	array('activity'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */
    		'labels' => array(
    			'name' => __( 'Themes', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Themes', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search by Themes', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Themes', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Themes', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Themes:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Themes', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Themes', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Themes', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Themes', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
			'rewrite'	=> array( 'slug' => 'activities/theme'), /* you can specify its url slug */
    	)

    );

	// time
    register_taxonomy( 'activity_time',
    	array('activity'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */
    		'labels' => array(
    			'name' => __( 'Time', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Time', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search by Time', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Times', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Time', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Time:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Time', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Time', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Time', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Time', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
			'rewrite'	=> array( 'slug' => 'activities/time'), /* you can specify its url slug */
    	)
    );



    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */


?>
