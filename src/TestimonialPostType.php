<?php

namespace Reyhane;

class TestimonialPostType
{


    public static function define_hooks(){

        add_action('init',  [__CLASS__,'register_post_type'] );

    }



    public static function register_post_type(){

        $post_types = 'reyhane-testimonial';

        if ( post_type_exists($post_types) ){

            return;

        }

        $labels = array(
            'name'                  => _x( 'Testimonials', 'Post type general name', 'reyhane-wp-theme' ),
            'singular_name'         => _x( 'Testimonials', 'Post type singular name', 'reyhane-wp-theme' ),
            'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'reyhane-wp-theme' ),
            'name_admin_bar'        => _x( 'Testimonials', 'Add New on Toolbar', 'reyhane-wp-theme' ),
            'add_new'               => __( 'Add New', 'reyhane-wp-theme' ),
            'add_new_item'          => __( 'Add New Testimonials', 'reyhane-wp-theme' ),
            'new_item'              => __( 'New Testimonials', 'reyhane-wp-theme' ),
            'edit_item'             => __( 'Edit Testimonials', 'reyhane-wp-theme' ),
            'view_item'             => __( 'View Testimonials', 'reyhane-wp-theme' ),
            'all_items'             => __( 'All Testimonials', 'reyhane-wp-theme' ),
            'search_items'          => __( 'Search Testimonials', 'reyhane-wp-theme' ),
            'parent_item_colon'     => __( 'Parent Testimonials:', 'reyhane-wp-theme' ),
            'not_found'             => __( 'No Testimonials found.', 'reyhane-wp-theme' ),
            'not_found_in_trash'    => __( 'No Testimonials found in Trash.', 'reyhane-wp-theme' ),
            'featured_image'        => _x( 'Testimonials Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'archives'              => _x( 'Testimonials archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'reyhane-wp-theme' ),
            'insert_into_item'      => _x( 'Insert into Testimonials', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'reyhane-wp-theme' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Testimonials', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'reyhane-wp-theme' ),
            'filter_items_list'     => _x( 'Filter Testimonials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'reyhane-wp-theme' ),
            'items_list_navigation' => _x( 'Testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'reyhane-wp-theme' ),
            'items_list'            => _x( 'Testimonials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'reyhane-wp-theme' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'rewrite'            => array( 'slug' => 'testimonials' ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title' ),
        );

        register_post_type( $post_types , $args );


    }



    public static function get_all_Testimonials() {

        $args = array(
            'post_type'      => 'reyhane-testimonial',
            'posts_per_page' => -1,
            'fields'         => 'ids',
        );

        return get_posts( $args );

    }


    public static function get_all_testimonials_with_data() {

        $testimonials = self::get_all_testimonials();

        $result = array();

        foreach ($testimonials as $testimonial) {

            $result[$testimonial]['author'] = get_field('author',$testimonial);

            $result[$testimonial]['description'] = get_field('description',$testimonial);

            $result[$testimonial]['date'] = get_field('date',$testimonial);

            $result[$testimonial]['avatar'] = get_field('avatar',$testimonial);

            if ( empty($result[$testimonial]['avatar']) ) {

                $result[$testimonial]['avatar'] = \Reyhane\config::$imgUrl . '/testimonial-author-image.png';

            }


        }

        return $result;

    }




}