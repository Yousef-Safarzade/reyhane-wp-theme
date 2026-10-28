<?php

return array(

    array(
        'id' => 'services_banner_title',
        'type' => 'text',
        'title' => 'Services Banner Title',
    ),

    array(
        'id' => 'services_banner_description',
        'type' => 'textarea',
        'title' => 'Services Banner Description',

    ),


    array(
        'id'       => 'services_banner_image',
        'type'     => 'media',
        'url'      => true,
        'title'    => esc_html__('Banner Image', 'your-textdomain-here'),
    ),


     array(
         'id'       => 'services_banner_image_responsive',
         'type'     => 'media',
         'url'      => true,
         'title'    => esc_html__('Banner Image Responsive', 'your-textdomain-here'),
     )

);