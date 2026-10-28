<?php

return array(



    array(
        'id'       => 'show_global_top_banner',
        'type'     => 'checkbox',
        'title'    => esc_html__('Show Top Banner', 'your-textdomain-here'),
        'default'  => '0'// 1 = on | 0 = off
    ),

    array(
        'id' => 'global_top_banner_title',
        'type' => 'text',
        'title' => 'Title',
    ),


    array(
        'id' => 'global_top_banner_cta_title',
        'type' => 'text',
        'title' => 'CTA Title',
    ),


    array(
        'id' => 'global_top_banner_cta_link',
        'type' => 'text',
        'title' => 'CTA Link',
    ),


    array(
        'id'       => 'global_top_banner_background_image',
        'type'     => 'media',
        'url'      => true,
        'title'    => esc_html__('Background Image', 'your-textdomain-here'),
    ),






);
