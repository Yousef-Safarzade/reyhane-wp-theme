<?php

namespace Reyhane;

class supports
{


    public static function define_hooks(){

        add_action( 'after_setup_theme' , [__CLASS__ , 'register_menu_locations'] );

        add_action('widgets_init', [__CLASS__,'register_widgets'] );


    }


    public static function register_menu_locations(){

        register_nav_menus(
            array(
                'primary_menu' => __( 'Primary Menu', 'reyhane-wp-theme' ),
                'primary_menu_responsive'  => __( 'Primary Menu Responsive', 'reyhane-wp-theme' ),
            )
        );

    }



    public static function register_widgets(){

        $footers = [
            'Footer 1',
            'Footer 2',
            'Footer 3',
            'Footer 4'
        ];

        foreach ($footers as $index => $footer) {

            register_sidebar([
                'name'          => __($footer, 'reyhane-wp-theme'),
                'id'            => 'footer-' . ($index + 1),
                'description'   => __('Footer widget area', 'reyhane-wp-theme'),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="footer-widget-title">',
                'after_title'   => '</h3>',
            ]);

        }

    }




}