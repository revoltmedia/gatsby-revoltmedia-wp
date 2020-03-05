<?php

function revoltmedia_case_study_init() {
	register_post_type( 'rm-case-study', array(
		'labels'            => array(
			'name'                => __( 'Case Studies', 'rm-case-study' ),
			'singular_name'       => __( 'Case Study', 'rm-case-study' ),
			'all_items'           => __( 'All Case Studies', 'rm-case-study' ),
			'new_item'            => __( 'New Case Study', 'rm-case-study' ),
			'add_new'             => __( 'Add New', 'Case Study' ),
			'add_new_item'        => __( 'Add New Case Study', 'rm-case-study' ),
			'edit_item'           => __( 'Edit Case Study', 'rm-case-study' ),
			'view_item'           => __( 'View Case Study', 'rm-case-study' ),
			'search_items'        => __( 'Search Case Studies', 'rm-case-study' ),
			'not_found'           => __( 'No Case Studies found', 'rm-case-study' ),
			'not_found_in_trash'  => __( 'No Case Studies found in trash', 'rm-case-study' ),
			'parent_item_colon'   => __( 'Parent Case Study', 'rm-case-study' ),
			'menu_name'           => __( 'Case Studies', 'rm-case-study' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'case-study',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_graphql' => true,
		'graphql_single_name' => 'caseStudy',
		'graphql_plural_name' => 'caseStudies',
	) );
}
add_action( 'init', 'revoltmedia_case_study_init' );

function revoltmedia_case_study_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['rm-case-study'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Case Study updated. <a target="_blank" href="%s">View Case Study</a>', 'rm-case-study'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'rm-case-study'),
		3 => __('Custom field deleted.', 'rm-case-study'),
		4 => __('Case Study updated.', 'rm-case-study'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Case Study restored to revision from %s', 'rm-case-study'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Case Study published. <a href="%s">View Case Study</a>', 'rm-case-study'), esc_url( $permalink ) ),
		7 => __('Case Study saved.', 'rm-case-study'),
		8 => sprintf( __('Case Study submitted. <a target="_blank" href="%s">Preview Case Study</a>', 'rm-case-study'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Case Study scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Case Study</a>', 'rm-case-study'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Case Study draft updated. <a target="_blank" href="%s">Preview Case Study</a>', 'rm-case-study'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'revoltmedia_case_study_updated_messages' );
