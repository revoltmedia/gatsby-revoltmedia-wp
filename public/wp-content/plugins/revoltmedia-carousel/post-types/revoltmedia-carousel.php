<?php

function revoltmedia_carousel_init() {
	register_post_type( 'revoltmedia-carousel', array(
		'labels'            => array(
			'name'                => __( 'Carousels', 'revoltmedia-carousel' ),
			'singular_name'       => __( 'Carousel', 'revoltmedia-carousel' ),
			'all_items'           => __( 'All Carousels', 'revoltmedia-carousel' ),
			'new_item'            => __( 'New Carousel', 'revoltmedia-carousel' ),
			'add_new'             => __( 'Add New', 'Carousel' ),
			'add_new_item'        => __( 'Add New Carousel', 'revoltmedia-carousel' ),
			'edit_item'           => __( 'Edit Carousel', 'revoltmedia-carousel' ),
			'view_item'           => __( 'View Carousel', 'revoltmedia-carousel' ),
			'search_items'        => __( 'Search Carousels', 'revoltmedia-carousel' ),
			'not_found'           => __( 'No Carousels found', 'revoltmedia-carousel' ),
			'not_found_in_trash'  => __( 'No Carousels found in trash', 'revoltmedia-carousel' ),
			'parent_item_colon'   => __( 'Parent Carousel', 'revoltmedia-carousel' ),
			'menu_name'           => __( 'Carousels', 'revoltmedia-carousel' ),
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
		'rest_base'         => 'carousel',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_graphql' => true,
		'graphql_single_name' => 'CarouselSlide',
		'graphql_plural_name' => 'CarouselSlides',
	) );

}
add_action( 'init', 'revoltmedia_carousel_init' );

function revoltmedia_carousel_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['revoltmedia-carousel'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Carousel updated. <a target="_blank" href="%s">View Carousel</a>', 'revoltmedia-carousel'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'revoltmedia-carousel'),
		3 => __('Custom field deleted.', 'revoltmedia-carousel'),
		4 => __('Carousel updated.', 'revoltmedia-carousel'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Carousel restored to revision from %s', 'revoltmedia-carousel'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Carousel published. <a href="%s">View Carousel</a>', 'revoltmedia-carousel'), esc_url( $permalink ) ),
		7 => __('Carousel saved.', 'revoltmedia-carousel'),
		8 => sprintf( __('Carousel submitted. <a target="_blank" href="%s">Preview Carousel</a>', 'revoltmedia-carousel'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Carousel scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Carousel</a>', 'revoltmedia-carousel'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Carousel draft updated. <a target="_blank" href="%s">Preview Carousel</a>', 'revoltmedia-carousel'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'revoltmedia_carousel_updated_messages' );
