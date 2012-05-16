<?php

require_once TEMPLATEPATH . '/lib/multi-post-thumbnails.php';

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => 'Alternative image',
        'id' => 'alt-thumb',
        'post_type' => 'post'
        )
    ); 
};
