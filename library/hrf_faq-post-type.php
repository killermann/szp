<?php

/*
Plugin Name: HTML5 Responsive FAQ
Author: Aman Verma
Author URI: https://www.indatos.com/?ref=faq
Plugin URI: https://www.indatos.com/?ref=faq
Description: HTML5 Responsive FAQ plugin makes it easy for you to FAQs on your site. Fully compatible with all responsive themes.
Version: 2.5.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('init', 'register_hrf_faq');

function register_hrf_faq() {

	register_post_type('hrf_faq', array(
		'label'           => 'FAQs',
		'description'     => '',
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'capability_type' => 'post',
		'map_meta_cap'    => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'hierarchical'    => false,
		'rewrite'         => array(
			'slug'       => 'faq',
			'with_front' => true
		),
		'query_var'       => true,
		'menu_position'   => 5,
		'menu_icon'       => 'dashicons-editor-help',
		'supports'        => array('title','editor', 'page-attributes'),
		'taxonomies'      => array('category'),
		'labels'          => array (
			'name'               => 'FAQs',
			'singular_name'      => 'FAQ',
			'menu_name'          => 'FAQs',
			'add_new'            => 'Add FAQ',
			'add_new_item'       => 'Add New FAQ',
			'edit'               => 'Edit',
			'edit_item'          => 'Edit FAQ',
			'new_item'           => 'New FAQ',
			'view'               => 'View FAQ',
			'view_item'          => 'View FAQ',
			'search_items'       => 'Search FAQs',
			'not_found'          => 'No FAQs Found',
			'not_found_in_trash' => 'No FAQs Found in Trash',
			'parent'             => 'Parent FAQ',
			)
		)
	);
}


add_shortcode('hrf_faqs', 'fn_hrf_faqs');

function fn_hrf_faqs($attr)
{
   $faq_params = shortcode_atts( array(
        'category' => '',
        'title' => '',
        'number' => '',
        'orderby' => '',
    ), $attr );

   $html = '<div class="hrf-faq-list">';

   if( $faq_params['title'] != ''){
   $html .= '<h2 class="frq-main-title">'.$faq_params['title'].'</h2>';

   }
   $head_tag  = get_option('hrf_question_headingtype','h3');
   $faq_args = array(
        'post_type'      => 'hrf_faq',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
   );

   if( $faq_params['category'] != '' ){
      $faq_args['category_name'] = $faq_params['category'];
   }

   if( $faq_params['number'] != '' ){
      $faq_args['posts_per_page'] = $faq_params['number'];
   }

   if( $faq_params['orderby'] != '' ){
      $faq_args['orderby'] = $faq_params['orderby'];
   }

   $faq_query = new WP_Query( $faq_args );

   if( $faq_query->have_posts() ):
      while( $faq_query->have_posts() ):
         $faq_query->the_post();

         $html .= '<article class="hrf-entry" id="hrf-entry-'.$faq_query->post->ID.'">
                      <h4 class="hrf-title close-faq" data-content-id="hrf-content-'.$faq_query->post->ID.'">'.get_the_title().'</h4>
                     <div class="hrf-content" id="hrf-content-'.$faq_query->post->ID.'">'.apply_filters( 'the_content', get_the_content() ).'</div>
                  </article>';

      endwhile;
   else:
      $html .= "No FAQs Found";
   endif;
   wp_reset_query();
   $html .= '</div>';
   return $html;
}

?>
