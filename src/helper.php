<?php

namespace Reyhane;

use DateTime;

class helper
{


    public static function define_hooks(){

        add_filter( 'body_class', [__CLASS__ , 'modify_body_class'] );

        add_action('wp_ajax_update_user_data', [__CLASS__ , 'update_user_data'] );

        add_action('wp_head', [__CLASS__ , 'add_json_to_header_tag'] );

    }

    public static function print_svg($path , $echo = true)
    {

        if (!is_readable($path) || pathinfo($path, PATHINFO_EXTENSION) !== 'svg') {
            return;
        }


        if($echo){

            echo file_get_contents($path);

        } else {

            return file_get_contents($path);


        }

    }



    public static function englishToPersianNumber($input)
    {


        return strtr($input, [
            '0' => '۰',
            '1' => '۱',
            '2' => '۲',
            '3' => '۳',
            '4' => '۴',
            '5' => '۵',
            '6' => '۶',
            '7' => '۷',
            '8' => '۸',
            '9' => '۹',
        ]);

    }


    public static function modify_body_class($classes)
    {

        if(\Reyhane\ThemeSettings::get_theme_setting('show_global_top_banner') === '1'){

            $classes[] = 'reyhane-have-global-top-banner';

        }


        return $classes;

    }



    public static function update_user_data(){


        if ( empty($_POST['userID']) ) {

            wp_send_json_error('لطفا آیدی کاربر را وارد نمایید');

        }

        if ( empty($_POST['userFirstName']) ) {

            wp_send_json_error('لطفا نام را وارد نمایید');

        }


        if ( empty($_POST['userLastName']) ) {

            wp_send_json_error('لطفا  نام خانوادگی را وارد نمایید');

        }





        if ( empty($_POST['userAge']) ) {

            wp_send_json_error('لطفا سن را وارد نمایید');

        } else {

            if ( !filter_var($int, FILTER_VALIDATE_INT)!== true  ){

                wp_send_json('لطفا سن را به درستی وارد نمایید');

            }

        }




        if ( empty($_POST['userMeliCode']) ) {

            wp_send_json_error('لطفا کد ملی را وارد نمایید');

        } else {

            if( !preg_match('/^[0-9]{10}+$/', $_POST['userMeliCode']) ){

                wp_send_json_error('کد ملی را به درستی وارد نمایید');

            }

        }




        if ( empty($_POST['userGender']) ) {

            wp_send_json_error('لطفا جنسیت را وارد نمایید');

        }


        if ( !empty($_POST['userEmail']) && !is_email($_POST['userEmail'])  ) {

            wp_send_json_error('آدرس ایمیل را به درستی وارد نمایید');

        }


        $meta = [
            'first_name'        => $_POST['userFirstName'],
            'last_name'         => $_POST['userLastName'],
            'gender'            => $_POST['userGender'],
            'meliCode'          => $_POST['userMeliCode'],
            'age'               => $_POST['userAge'],
        ];

        BooklyHelper::create_or_update_bookly_customer($_POST['userPhoneNumber'] , $_POST['userFirstName'] , $_POST['userLastName']);

        foreach ($meta as $key => $value) {

            update_user_meta( $_POST['userID'] , $key , $value );

        }

        wp_send_json_success('done');

    }



    public static function get_user_dashboard_meta_data(){


        $user = wp_get_current_user();

        if ( !$user->ID ){

            return false;

        }

        $first_name = $user->first_name;

        $last_name = $user->last_name;

        $phone_number = $user->get('digits_phone') ?? '';

        $meli_code = $user->get('meliCode') ?? '';

        $gender = $user->get('gender') ?? 'male';

        $age = $user->get('age') ?? 18;

        $email = $user->get('user_email') ?? '';

        return array(
            'full_name'         => $first_name . ' ' . $last_name,
            'userFirstName'     => $first_name,
            'userLastName'      => $last_name,
            'userPhoneNumber'   => $phone_number,
            'userMeliCode'      => $meli_code,
            'userGender'        => $gender,
            'userEmail'         => $email,
            'userAge'           => $age,
        );


    }


    public static function convert_date_to_shamsi($date_string){

        $date = new DateTime($date_string);

        $jDate = \Morilog\Jalali\Jalalian::fromDateTime($date);

        return $jDate->format('j  F  Y - H:i');

    }




    public static function normalize_phone($phone) {

        // Remove spaces, dashes, parentheses, etc.
        $phone = preg_replace('/\D+/', '', $phone);

        // Remove Iran country code
        if (str_starts_with($phone, '98')) {
            $phone = substr($phone, 2);
        }

        // Remove leading zero
        return ltrim($phone, '0');
    }



    public static function get_next_90_days(){

        $dates = [];

        for ($i = 0; $i < 90; $i++) {

            $dates[] = strtotime("+$i days");

        }

        return ($dates);


    }



    public static function add_json_to_header_tag(){

        global $post;

        $json_content = get_field('json_ld_content' , $post);

        if ( !empty($json_content) ) {

            echo $json_content;

        }
    }

}