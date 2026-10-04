<?php

namespace Reyhane;

class widgets
{

    public static function define_hooks(){

        add_action( 'widgets_init', [__CLASS__, 'register_widgets' ] );

    }


    public static function register_widgets(){

        require_once ("widget_about.php");

        register_widget( 'reyhane_about' );


        require_once ("widget_contact.php");

        register_widget( 'reyhane_contact' );


        require_once ("widget_work_hour.php");

        register_widget( 'reyhane_work_hour' );


        require_once ("widget_social_icons.php");

        register_widget( 'reyhane_social_icons' );

    }

}