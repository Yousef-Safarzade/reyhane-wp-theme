<?php

namespace Reyhane;

class Blog
{

    public static function get_all_posts_with_data($posts_per_page = 5){

        $result = [];

        $posts =  get_posts(
            array(
                'posts_per_page' => $posts_per_page,
                'fields'         => 'ids',
            )
        );

        foreach ($posts as $post_id){

            $result[] = self::format_post_data($post_id);

        }

        return $result;

    }



    public static function format_post_data($post_id){

        return array(
            'title'         => get_the_title($post_id),
            'thumbnail'     => get_the_post_thumbnail_url($post_id,'full'),
            'permalink'     => get_permalink($post_id),
            'date'          => get_the_date('j  F  Y ',$post_id),
            'description'   => get_the_excerpt($post_id),
        );

    }





    public static function get_related_post_with_formatted_data( $post_id = null, $limit = 5 ) {

        $post_id = $post_id ?: get_the_ID();


        if ( ! $post_id ) {
            return [];
        }

        $tax_query = [
            'relation' => 'OR',
        ];

        // Get categories.
        $categories = wp_get_post_categories( $post_id );


        if ( ! empty( $categories ) ) {
            $tax_query[] = [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $categories,
            ];
        }


        // No categories or tags.
        if ( count( $tax_query ) === 1 ) {

            return [];

        }


        $posts = get_posts([
            'post_status'         => 'publish',
            'post__not_in'        => [ $post_id ],
            'posts_per_page'      => $limit,
            'fields'              => 'ids',
            'tax_query'           => $tax_query,
            'ignore_sticky_posts' => true,
        ]);


        $result = [];


        foreach ( $posts as $post_id ) {

            $result[] = self::format_post_data($post_id);

        }

        return $result;
    }

}