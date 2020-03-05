<?php

function revoltmedia_carousel_init() {
	register_post_type( 'revoltmedia-carousel', array(
		'labels'            => array(
			'name'                => __( 'Carousel Slides', 'revoltmedia-carousel' ),
			'singular_name'       => __( 'Carousel Slide', 'revoltmedia-carousel' ),
			'all_items'           => __( 'All Carousel Slides', 'revoltmedia-carousel' ),
			'new_item'            => __( 'New Carousel Slide', 'revoltmedia-carousel' ),
			'add_new'             => __( 'Add New', 'Carousel Slide' ),
			'add_new_item'        => __( 'Add New Carousel Slide', 'revoltmedia-carousel' ),
			'edit_item'           => __( 'Edit Carousel Slide', 'revoltmedia-carousel' ),
			'view_item'           => __( 'View Carousel Slide', 'revoltmedia-carousel' ),
			'search_items'        => __( 'Search Carousel Slides', 'revoltmedia-carousel' ),
			'not_found'           => __( 'No Carousel Slides found', 'revoltmedia-carousel' ),
			'not_found_in_trash'  => __( 'No Carousel Slides found in trash', 'revoltmedia-carousel' ),
			'parent_item_colon'   => __( 'Parent Carousel Slide', 'revoltmedia-carousel' ),
			'menu_name'           => __( 'Carousel', 'revoltmedia-carousel' ),
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
		'graphql_single_name' => 'carouselSlide',
		'graphql_plural_name' => 'carouselSlides',
	) );

}
add_action( 'init', 'revoltmedia_carousel_init' );

function revoltmedia_carousel_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['revoltmedia-carousel'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Carousel Slide updated. <a target="_blank" href="%s">View Carousel Slide</a>', 'revoltmedia-carousel'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'revoltmedia-carousel'),
		3 => __('Custom field deleted.', 'revoltmedia-carousel'),
		4 => __('Carousel Slide updated.', 'revoltmedia-carousel'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Carousel Slide restored to revision from %s', 'revoltmedia-carousel'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Carousel Slide published. <a href="%s">View Carousel Slide</a>', 'revoltmedia-carousel'), esc_url( $permalink ) ),
		7 => __('Carousel Slide saved.', 'revoltmedia-carousel'),
		8 => sprintf( __('Carousel Slide submitted. <a target="_blank" href="%s">Preview Carousel Slide</a>', 'revoltmedia-carousel'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Carousel Slide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Carousel Slide</a>', 'revoltmedia-carousel'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Carousel Slide draft updated. <a target="_blank" href="%s">Preview Carousel Slide</a>', 'revoltmedia-carousel'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'revoltmedia_carousel_updated_messages' );
