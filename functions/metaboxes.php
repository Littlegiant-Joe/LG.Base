<?php
//include_once TEMPLATEPATH . 'lib/metabox/meta-box-3.2.2.class.php';
//include TEMPLATEPATH . 'lib/metabox/meta-box-usage.php';


/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'LG_';

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
	'id' => 'post',							// meta box id, unique per meta box
	'title' => 'Post Details',			// meta box title
	'pages' => array('team'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'side',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(	
		array(
		'name' => 'Subheading',					// field name
		'desc' => 'Secondary heading',	// field description, optional
		'id' => $prefix . 'desc2',				// field id, i.e. the meta key
		'type' => 'text',						// text box
		'std' => '',					// default value, optional
		'style' => 'width: 100px'
		),
		
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function LG_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'LG_register_meta_boxes' );