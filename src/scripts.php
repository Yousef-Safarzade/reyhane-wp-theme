<?php

namespace Reyhane;

class scripts
{


    public static function define_hooks(){

            add_action( 'wp_enqueue_scripts' , [__CLASS__,'load_main_styles'] );

            add_action( 'wp_enqueue_scripts', [__CLASS__,'load_main_scripts'] );


            add_action( 'wp_enqueue_scripts', [__CLASS__,'load_service_detail_scripts'] );

    }



    public static function load_main_styles(){

        wp_enqueue_style('hello-elementor-parent', config::$themeUrl . '/style.css', [], config::$themeVersion );

        wp_enqueue_style( 'reyhane-main',  config::$cssUrl . "/main.min.css" ,  [ 'hello-elementor-parent' ], config::$themeVersion );

        wp_enqueue_style( 'reyhane-art-theme',  get_stylesheet_uri(),  [ 'hello-elementor-parent' ], config::$themeVersion );

    }




    public static function load_main_scripts(){



        wp_enqueue_script(
            'reyhane-jquery',
            config::$jsUrl . '/jquery.min.js',
            config::$themeVersion,
            true
        );


        wp_enqueue_script(
            'reyhane-main',
            config::$jsUrl . '/main.min.js',
            ['reyhane-jquery'],
            config::$themeVersion,
            true
        );

        wp_localize_script('reyhane-main', 'localizedData',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            )
        );


    }



    public static function load_service_detail_scripts(){

        if( get_post_type() !== 'reyhane-services' ){

            return false;

        }

        wp_enqueue_style( 'reyhane-service-detail',  config::$cssUrl . "/service_detail.min.css" ,  [ ], config::$themeVersion );

        wp_enqueue_style( 'reyhane-lightbox',  config::$cssUrl . "/lightbox3.min.css" ,  [ ], config::$themeVersion );

        wp_enqueue_script('reyhane-lightbox', config::$jsUrl . '/lightbox3.min.js', ['reyhane-jquery'], config::$themeVersion, true);

    }


}