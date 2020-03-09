<?php

function revoltmedia_service_init() {
	register_post_type( 'rm-service', array(
		'labels'            => array(
			'name'                => __( 'Services', 'rm-service' ),
			'singular_name'       => __( 'Service', 'rm-service' ),
			'all_items'           => __( 'All Services', 'rm-service' ),
			'new_item'            => __( 'New Service', 'rm-service' ),
			'add_new'             => __( 'Add New', 'Service' ),
			'add_new_item'        => __( 'Add New Service', 'rm-service' ),
			'edit_item'           => __( 'Edit Service', 'rm-service' ),
			'view_item'           => __( 'View Service', 'rm-service' ),
			'search_items'        => __( 'Search Services', 'rm-service' ),
			'not_found'           => __( 'No Services found', 'rm-service' ),
			'not_found_in_trash'  => __( 'No Services found in trash', 'rm-service' ),
			'parent_item_colon'   => __( 'Parent Service', 'rm-service' ),
			'menu_name'           => __( 'Services', 'rm-service' ),
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
		'rest_base'         => 'service',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_graphql' => true,
		'graphql_single_name' => 'service',
		'graphql_plural_name' => 'services',
	) );
}
add_action( 'init', 'revoltmedia_service_init' );

function revoltmedia_service_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['rm-service'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Service updated. <a target="_blank" href="%s">View Service</a>', 'rm-service'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'rm-service'),
		3 => __('Custom field deleted.', 'rm-service'),
		4 => __('Service updated.', 'rm-service'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Service restored to revision from %s', 'rm-service'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Service published. <a href="%s">View Service</a>', 'rm-service'), esc_url( $permalink ) ),
		7 => __('Service saved.', 'rm-service'),
		8 => sprintf( __('Service submitted. <a target="_blank" href="%s">Preview Service</a>', 'rm-service'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Service scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Service</a>', 'rm-service'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Service draft updated. <a target="_blank" href="%s">Preview Service</a>', 'rm-service'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'revoltmedia_service_updated_messages' );
