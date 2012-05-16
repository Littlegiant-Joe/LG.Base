<?php
// CUSTOM POST TYPES
//Teams
add_action( 'init', 'post_types' );
function post_types() {
	
	register_post_type( 'slider',
    array(
      'labels' => array(
    'name' => _x('Sliders', 'post type general name'),
    'singular_name' => _x('Slider', 'post type singular name'),
    'add_new' => _x('Add New', 'Slider'),
    'add_new_item' => __('Add New Slider'),
    'edit_item' => __('Edit Slider'),
    'new_item' => __('New Slider'),
    'view_item' => __('View Slider'),
    'search_items' => __('Search Sliders'),
    'not_found' =>  __('No Sliders found'),
    'not_found_in_trash' => __('No Sliders found in Trash'),
    'parent_item_colon' => ''
  ),
      'public' => true,
	  'show_ui' => true,
	  'capability_type' => 'post',
	  'hierarchical' => false,
	  'query_var' => true,
      'supports' => array('title'/*,'editor','custom-fields', 'my-meta-box','excerpt','trackbacks','comments','revisions','author'*/,'page-attributes','thumbnail')
    )
  );

}

// CONNECTION TYPES
function my_connection_types() {
    // Make sure the Posts 2 Posts plugin is active.
    if ( !function_exists( 'p2p_register_connection_type' ) )
        return;

    p2p_register_connection_type( array(
        'name' => 'post_to_slider',
        'from' => 'post',
        'to' => 'slider'
    ) );
}
add_action( 'wp_loaded', 'my_connection_types' );
