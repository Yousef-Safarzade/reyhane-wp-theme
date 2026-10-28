<?php

namespace Reyhane;

class scripts
{


    public static function define_hooks(){

            add_action( 'wp_enqueue_scripts' , [__CLASS__,'load_main_styles'] );

            add_action( 'wp_enqueue_scripts', [__CLASS__,'load_main_scripts'] );

            add_action( 'wp_enqueue_scripts', [__CLASS__,'load_service_detail_scripts'] );

            add_action( 'wp_enqueue_scripts', [__CLASS__,'load_authentication_scripts'] );

            add_action('wp_enqueue_scripts', [__CLASS__,'load_contact_style'] );

            add_action('wp_enqueue_scripts', [__CLASS__,'load_user_dashboard_scripts'] );

            add_action('wp_enqueue_scripts', [__CLASS__,'load_about_style'] );

            add_action('wp_enqueue_scripts', [__CLASS__,'load_appointment_style'] );

            add_action('admin_enqueue_scripts', [__CLASS__,'load_admin_scripts'] );




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


    public static function load_admin_scripts($hook){



    }


    public static function load_contact_style($hook){

        if(get_page_template_slug() !== 'page-templates/contact.php') {

            return false;

        }

        wp_enqueue_style('reyhane-contact', config::$cssUrl . '/contact.min.css', [], config::$themeVersion );



    }







    public static function load_authentication_scripts($hook){

        if(get_page_template_slug() !== 'page-templates/authentication.php') {

            return false;

        }

        wp_enqueue_script( 'reyhane-authentication-script', config::$jsUrl . '/authentication.min.js', config::$themeVersion, true);

        wp_enqueue_script('reyhane-toast-message-script', config::$jsUrl . '/jquery.toast.min.js', config::$themeVersion, true);

        wp_enqueue_style('reyhane-toast-message-style', config::$cssUrl . '/jquery.toast.min.css', [], config::$themeVersion );


        wp_localize_script('reyhane-authentication-script', 'authLocalized',
            array(
                'ajaxurl'       => admin_url( 'admin-ajax.php' ),
                'websiteURL'    => config::$websiteUrl
            )
        );




    }




    public static function load_about_style($hook){


        if(get_page_template_slug() !== 'page-templates/about.php') {

            return false;

        }



        wp_enqueue_style('reyhane-about', config::$cssUrl . '/about.min.css', [], config::$themeVersion );

    }







    public static function load_user_dashboard_scripts($hook){

        if(get_page_template_slug() !== 'page-templates/user-dashboard.php') {

            return false;

        }

        wp_enqueue_style('reyhane-user-dashboard-style', config::$cssUrl . '/userDashboard.min.css', [], config::$themeVersion );

        wp_enqueue_script('reyhane-user-dashboard-script', config::$jsUrl . '/userDashboard.min.js', config::$themeVersion, true);

        wp_enqueue_script('reyhane-toast-message-script', config::$jsUrl . '/jquery.toast.min.js', config::$themeVersion, true);

        wp_enqueue_style('reyhane-toast-message-style', config::$cssUrl . '/jquery.toast.min.css', [], config::$themeVersion );



        wp_localize_script('reyhane-user-dashboard-script', 'localizedData',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            )
        );


    }




    public static function load_appointment_style($hook){

        if(get_page_template_slug() !== 'page-templates/appointment.php') {

            return false;

        }

        wp_enqueue_style('reyhane-appointment-style', config::$cssUrl . '/appointment.min.css', [], config::$themeVersion );

        wp_enqueue_script('reyhane-appointment-script', config::$jsUrl . '/appointment.min.js',['reyhane-jquery'], config::$themeVersion, true);

        wp_enqueue_script('reyhane-flickity-script', config::$jsUrl . '/flickity.pkgd.min.js', config::$themeVersion, true);

        wp_enqueue_style('reyhane-flickity-style', config::$cssUrl . '/flickity.min.css', [], config::$themeVersion );

        wp_enqueue_script('reyhane-toast-message-script', config::$jsUrl . '/jquery.toast.min.js', config::$themeVersion, true);

        wp_enqueue_style('reyhane-toast-message-style', config::$cssUrl . '/jquery.toast.min.css', [], config::$themeVersion );



        wp_localize_script('reyhane-appointment-script', 'localizedData',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            )
        );


    }


}