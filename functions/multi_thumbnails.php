<?php
require_once( TEMPLATEPATH . '/lib/multi-post-thumbnails.php');

// Custom featured images
// Define additional "post thumbnails". Relies on MultiPostThumbnails to work

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => 'Second Feature Image',
        'id' => 'second-iamge',
        'post_type' => 'page'
        )
    );  
 
};