<?php

namespace Reyhane;

use Redux;

class ThemeSettings
{

    private static string $opt_name = 'reyhane_setting';



    public static function define_hooks(){


    }

    public static function init(){

        if ( ! class_exists( 'Redux' ) ) {
            return;
        }

        $theme = wp_get_theme();

        $args = array(
            'opt_name' => self::$opt_name,
            'display_name' => 'Reyhane Theme Setting Panel',
            'display_version' => $theme->get('Version'),
            'menu_type' => 'menu',
            'allow_sub_menu' => true,
            'menu_title' => esc_html__('Theme Settings', 'textdomain'),
            'page_title' => esc_html__('ThemeSettings', 'textdomain'),
            'google_api_key' => '',
            'google_update_weekly' => false,
            'async_typography' => true,
            'admin_bar' => true,
            'admin_bar_icon' => '',
            'admin_bar_priority' => 50,
            'global_variable' => self::$opt_name,
            'dev_mode' => false,
            'update_notice' => false,
            'customizer' => false,
            'page_priority' => null,
            'page_parent' => 'themes.php',
            'page_permissions' => 'edit_pages',
            'last_tab' => '',
            'icon'   => 'el el-home',
            'page_icon' => 'icon-themes',
            'page_slug' => 'themeoptions',
            'save_defaults' => true,
            'default_show' => false,
            'default_mark' => '',
            'show_import_export' => true
        );

        Redux::set_args(self::$opt_name, $args);

        self::build_sections();

    }



    public static function build_sections(){

        if(class_exists('ReduxFramework')){

            $sections = array(

                array(
                    'title' => esc_html__('Reyhane Theme Setting', 'textdomain'),
                    'id' => esc_html__('reyhane-theme-setting', ' textdomain'),
                    'icon' => 'el el-cog',
                    'fields' => array(),
                ),

                array(
                    'title' => esc_html__('Layout', 'textdomain'),
                    'id' => esc_html__('layout-theme-setting', 'textdomain'),
                    'icon' => 'el el-brush',
                    'fields' => self::require_config_template('layout'),
                    'subsection' => true
                ),

                array(
                    'title' => esc_html__('Colors', 'textdomain'),
                    'id' => esc_html__('colors-theme-setting', 'textdomain'),
                    'icon' => 'el el-tint',
                    'fields' => self::require_config_template('colors'),
                    'subsection' => true
                ),

                array(
                    'title' => esc_html__('Typography', 'textdomain'),
                    'id' => esc_html__('typography-theme-setting', 'textdomain'),
                    'icon' => 'el el-fontsize',
                    'fields' => self::require_config_template('typography'),
                    'subsection' => true
                ),


                array(
                    'title' => esc_html__('Header', 'textdomain'),
                    'id' => esc_html__('header-theme-setting', 'textdomain'),
                    'icon' => 'el el-fontsize',
                    'fields' => self::require_config_template('header'),
                    'subsection' => true
                ),


                array(
                    'title' => esc_html__('Services', 'textdomain'),
                    'id' => esc_html__('services-theme-setting', 'textdomain'),
                    'icon' => 'el el-fontsize',
                    'fields' => self::require_config_template('services'),
                    'subsection' => true
                ),


                array(
                    'title' => esc_html__('Global Banner', 'textdomain'),
                    'id' => esc_html__('global-banner-theme-setting', 'textdomain'),
                    'icon' => 'el el-fontsize',
                    'fields' => self::require_config_template('banner'),
                    'subsection' => true
                ),

                array(
                    'title' => esc_html__('Links', 'textdomain'),
                    'id' => esc_html__('links-theme-setting', 'textdomain'),
                    'icon' => 'el el-fontsize',
                    'fields' => self::require_config_template('links'),
                    'subsection' => true
                ),

            );



            Redux::set_sections(self::$opt_name, $sections );

        }


    }



    static function require_config_template($template_name){

        return include(config::$childThemePath  . '/src/theme-settings/'  . $template_name . ".php");

    }



    public static function get_theme_setting($option_name,$default_value = '')
    {

        if(is_array($option_name)){

            $result=[];

            foreach($option_name as $item){

                $result[$item]=
                    (isset($GLOBALS[self::$opt_name][$item])) ?
                        $GLOBALS[self::$opt_name][$item] :
                        $default_value;

            }

        }else{

            $result =
                isset($GLOBALS[self::$opt_name][$option_name]) &&
                !empty($GLOBALS[self::$opt_name][$option_name]) ?
                    $GLOBALS[self::$opt_name][$option_name] :
                    $default_value;

        }

        return $result;
    }





}