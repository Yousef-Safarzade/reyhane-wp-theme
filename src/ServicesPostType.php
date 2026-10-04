<?php

namespace Reyhane;

class ServicesPostType
{


    public static function define_hooks(){

        add_action('init',  [__CLASS__,'register_post_type'] );

    }



    public static function register_post_type(){

        $post_types = 'reyhane-services';

        if ( post_type_exists($post_types) ){

            return;

        }

        $labels = array(
            'name'                  => _x( 'Services', 'Post type general name', 'reyhane-wp-theme' ),
            'singular_name'         => _x( 'Services', 'Post type singular name', 'reyhane-wp-theme' ),
            'menu_name'             => _x( 'Services', 'Admin Menu text', 'reyhane-wp-theme' ),
            'name_admin_bar'        => _x( 'Services', 'Add New on Toolbar', 'reyhane-wp-theme' ),
            'add_new'               => __( 'Add New', 'reyhane-wp-theme' ),
            'add_new_item'          => __( 'Add New Services', 'reyhane-wp-theme' ),
            'new_item'              => __( 'New Services', 'reyhane-wp-theme' ),
            'edit_item'             => __( 'Edit Services', 'reyhane-wp-theme' ),
            'view_item'             => __( 'View Services', 'reyhane-wp-theme' ),
            'all_items'             => __( 'All Services', 'reyhane-wp-theme' ),
            'search_items'          => __( 'Search Services', 'reyhane-wp-theme' ),
            'parent_item_colon'     => __( 'Parent Services:', 'reyhane-wp-theme' ),
            'not_found'             => __( 'No Services found.', 'reyhane-wp-theme' ),
            'not_found_in_trash'    => __( 'No Services found in Trash.', 'reyhane-wp-theme' ),
            'featured_image'        => _x( 'Services Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'reyhane-wp-theme' ),
            'archives'              => _x( 'Services archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'reyhane-wp-theme' ),
            'insert_into_item'      => _x( 'Insert into Services', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'reyhane-wp-theme' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Services', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'reyhane-wp-theme' ),
            'filter_items_list'     => _x( 'Filter Services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'reyhane-wp-theme' ),
            'items_list_navigation' => _x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'reyhane-wp-theme' ),
            'items_list'            => _x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'reyhane-wp-theme' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'services' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor',  'thumbnail' ),
        );

        register_post_type( $post_types , $args );


    }



    public static function get_all_services() {

        $args = array(
           'post_type'      => 'reyhane-services',
           'posts_per_page' => -1,
            'fields'         => 'ids',
        );

        return get_posts( $args );

    }


    public static function get_all_services_with_data() {

        $services = self::get_all_services();

        $result = array();

        foreach ($services as $service) {

            $result[$service]['title'] = get_the_title($service);

            $result[$service]['permalink'] = get_the_permalink($service);

            $result[$service]['thumbnail_url'] = get_the_post_thumbnail_url($service);

            $result[$service]['sub_title'] = get_post_meta($service , 'service_subtitle');

            if( empty( $result[$service]['sub_title'] ) ) {

                $result[$service]['sub_title'] = 'سفیدی طبیعی لبخند';
                
            }

            if( empty($result[$service]['thumbnail_url']) ){

                $result[$service]['thumbnail_url'] = config::$imgUrl . "/services-default-feature-image.png";
            }

        }

        return $result;



    }




}