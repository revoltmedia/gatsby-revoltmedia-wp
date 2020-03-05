<?php

/**
 * Gets image sizes available for image.
 *
 * @param   int  $postId      WP Post ID
 * @param   string  $field_name  ACF Field Name
 *
 * @return  array               Array of image urls by size.
 */
function revoltmedia_image_size_urls( $postId, $field_name ) {
  $size_array = array();
  foreach( get_intermediate_image_sizes() as $size ) {
    $size_array[ $size ] = wp_get_attachment_image_src( get_field( $field_name, $postId ), $size );
  }
  return $size_array;
}

/**
 * Allows for excerpt generation outside the loop.
 * 
 * @param string $text  The text to be trimmed
 * @return string       The trimmed text
 */
function revoltmedia_trim_excerpt( $text='' )
{
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = '&hellip;';
    return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}
add_filter('revoltmedia_trim_excerpt', 'revoltmedia_trim_excerpt');

/**
 * Loops through posts and creates results array including fields
 *
 * @param   object  $posts  Post object from WP Query
 *
 * @return  array          Array of posts including fields
 */
function revoltmedia_content_results_loop( $posts ) {
  $results = [];
  foreach($posts as $post):
    $results[] = [
        'id' => $post->ID,
        'title' => $post->post_title,
        'description' => apply_filters( 'the_content', $post->post_content ),
        'excerpt' => apply_filters( 'revoltmedia_trim_excerpt', get_the_excerpt( $post->ID ) ),
        'slug' => $post->post_name,
        'carousel_link_text' => get_field( 'carousel_link_text', $post->ID ),
        'carousel_link_url' => get_field( 'carousel_link_url', $post->ID ),
        'carousel_link_external' => in_array('external', get_field( 'carousel_link_external', $post->ID )),
        'carousel_image' => revoltmedia_image_size_urls( $post->ID, 'carousel_image' ),


    ];
  endforeach;

  return $results;
}

/**
 * Assemble content response for endpoint.
 *
 * @param   array  $request  Request array from endpoint.
 *
 * @return  string            JSON object of content
 */
function revoltmedia_content( $request ) {
    $site_content = [
        'title' => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
        'carousel' => [],
        'case_studies' => []
    ];

    $carousel = get_posts([
        'posts_per_page' => -1,
        'post_type' => ['revoltmedia-carousel'],
        // 'orderby' => 'id',
        // 'order'   => 'ASC',
    ]);
    
    $site_content['carousel'] = revoltmedia_content_results_loop( $carousel );

    if( empty($site_content) ) :
        return new WP_Error( 'error', 'No results');
    endif;

    return rest_ensure_response( $site_content );
}

/**
 * Register rest route for content endpoint at /wp-rest/content/v1/main. Calls back to revoltmedia_content()
 *
 */
function revoltmedia_content_endpoint() {
  register_rest_route( 'content/v1', '/main',array(
    'methods'  => WP_REST_Server::READABLE,
    'callback' => 'revoltmedia_content'
  ));
}

/**
 * Add action upon rest_api_init hook to call content endpoint.0
 *
 */
function revoltmedia_init_content_endpoint() {
  add_action('rest_api_init', 'revoltmedia_content_endpoint' );
}

add_action( 'acf/init', 'revoltmedia_init_content_endpoint' );
