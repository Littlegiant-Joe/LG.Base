<?php
require_once TEMPLATEPATH . '/functions/twentyten.php';
require_once TEMPLATEPATH . '/functions/image_sizes.php';
require_once TEMPLATEPATH . '/functions/image_resizer.php';
require_once TEMPLATEPATH . '/functions/post_types.php';
require_once TEMPLATEPATH . '/functions/nav_menu.php';
require_once TEMPLATEPATH . '/functions/multi_thumbnails.php';
require_once TEMPLATEPATH . '/functions/metaboxes.php';

///////////////////////////////////////////////////////////////////////////////
////////////////////////////// MY FUNCTIONS ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

function enqueue_jquery() {
    wp_deregister_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'enqueue_jquery');