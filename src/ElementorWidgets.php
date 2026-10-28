<?php

namespace Reyhane;

class ElementorWidgets
{

    public static function define_hooks(){

        add_action( 'elementor/widgets/register', [__CLASS__, 'register_widgets' ] );


    }


    public static function register_widgets($widgets_manager){

        require_once config::$elementorWidgetPath . '/show-services-grid/index.php';

        $widgets_manager->register( new \reyhane_show_services_grid_widget() );


        require_once config::$elementorWidgetPath . '/video-box/index.php';

        $widgets_manager->register( new \reyhane_video_box_widget() );


        require_once config::$elementorWidgetPath . '/about-card/index.php';

        $widgets_manager->register( new \reyhane_about_card_widget() );


        require_once config::$elementorWidgetPath . '/show-testimonials-grid/index.php';

        $widgets_manager->register( new \reyhane_show_testimonials_grid() );


        require_once config::$elementorWidgetPath . '/faq/index.php';

        $widgets_manager->register( new \reyhane_faq_widget() );


        require_once config::$elementorWidgetPath . '/blog-grid/index.php';

        $widgets_manager->register( new \reyhane_blog_grid_widget() );


        require_once config::$elementorWidgetPath . '/big-intro/index.php';

        $widgets_manager->register( new \reyhane_big_intro_widget() );

    }

}