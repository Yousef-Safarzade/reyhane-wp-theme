<?php

namespace Reyhane;

class Authentication
{


    public static function define_hooks(){

        add_action('wp_ajax_verify_user_otp_code', [__CLASS__ , 'verify_user_otp_code'] );

        add_action('wp_ajax_nopriv_verify_user_otp_code', [__CLASS__ , 'verify_user_otp_code'] );

        add_action('wp_ajax_generate_otp_code', [__CLASS__ , 'generate_otp_code'] );

        add_action('wp_ajax_nopriv_generate_otp_code', [__CLASS__ , 'generate_otp_code'] );

    }




    public static function has_reached_request_limit() {

        $ip = $_SERVER['REMOTE_ADDR'];

        $ip_key    = 'otp_req_ip_' . md5($ip);

        $ip_attempts = (int) get_transient($ip_key);

        $limit_count = defined('WP_ENVIRONMENT_TYPE') && WP_ENVIRONMENT_TYPE == 'local' ? 100 : 10;

        if ($ip_attempts >= $limit_count) {

            return true;

        }

        set_transient($ip_key, $ip_attempts + 1, 5 * MINUTE_IN_SECONDS);

        return false;

    }






    public static function generate_otp_code(){

        $has_reached_request_limit = self::has_reached_request_limit();

        if ( $has_reached_request_limit ) {

            wp_send_json(array(
                'success' => false,
                'message' => 'تعداد درخواست بیش از حد . لطفا ۵ دقیقه دیگر تلاش کنید'
            ),400);

        }


        if( empty( $_POST['phoneNumber'] ) ){

            wp_send_json(array(
                'success' => false,
                'message' => 'otpCode is required'
            ),400);

        }

        $current_otp = get_transient('phone_otp_' . md5($_POST['phoneNumber']));

        if( empty( $current_otp ) ){

            //$otp = (string) random_int(10000, 99999);

            $otp = substr( $_POST['phoneNumber'] , -5);

            $otp_hash = hash_hmac(
                'sha256',
                $otp,
                wp_salt('auth')
            );


            $expires_at =  time() + 60;

            set_transient(
                'phone_otp_' . md5($_POST['phoneNumber']),
                [
                    'hash'       => $otp_hash,
                    'expires_at' => $expires_at,
                    'attempts'   => 0,
                ],
                60
            );


            wp_send_json(array(
                'success' => true,
                'otp'     => $otp,
                'message' => '<span>کد با موفقیت ارسال شد</span>',
                'expires_at' => $expires_at,
            ),200);

        } else {

            wp_send_json(array(
                'success' => true,
                'message' => '<span>یک کد از قبل برای شما ارسال شده است</span>',
                'expires_at' => $current_otp['expires_at'],
            ),200);

        }

    }



    public static function verify_user_otp_code(){

        $has_reached_request_limit = self::has_reached_request_limit();

        if ( $has_reached_request_limit ) {

            wp_send_json(array(
                'success' => false,
                'message' => 'تعداد درخواست بیش از حد . لطفا ۵ دقیقه دیگر تلاش کنید'
            ),400);

        }

        if(empty($_POST['otpCode'])){

           wp_send_json(array(
               'success' => false,
               'message' => 'otpCode is required'
           ),400);

        }

        if(empty($_POST['phoneNumber'])){

            wp_send_json(array(
                'success' => false,
                'message' => 'phoneNumber is required'
            ),400);

        }


        // Get and Verify Stored OTP Code in Transient Table

        $data = get_transient('phone_otp_' . md5($_POST['phoneNumber']));

        if (!$data || time() > $data['expires_at'] ) {

            wp_send_json(array(
                'success' => false,
                'message' => 'کد شما منقضی شده است لطفا دوباره درخواست ارسال کنید'
            ),200);

        }



        $submitted_hash = hash_hmac( 'sha256', $_POST['otpCode'], wp_salt('auth') );

        if (!hash_equals($data['hash'], $submitted_hash)) {

            wp_send_json(array(
                'success' => false,
                'message' => 'کد ارسال شده صحیح نمی باشد'
            ),200);

        }

        delete_transient('phone_otp_' . md5($_POST['phoneNumber']));

        // Check if user Exist with Given Phone Number or not , register if not , login if user exist

        $user_id = self::get_user_by_phone_number($_POST['phoneNumber']);

        if ( !$user_id ) {

            $action = 'register';

            $user_id = wp_insert_user([
                'user_login'    =>  $_POST['phoneNumber'],
                'user_pass'     =>  wp_generate_password(32, true, true),
                'user_email'    =>  '',
                'role'          =>  'subscriber',
                'meta_input'    =>  array(
                    'digits_phone'  =>      $_POST['phoneNumber']
                )
            ]);

            BooklyHelper::create_or_update_bookly_customer($_POST['phoneNumber'],'','',$user_id);

        } else {

            $action = 'login';

        }

        wp_set_current_user($user_id);

        wp_set_auth_cookie($user_id, true);

        wp_send_json(array(
            'success' => true,
            'message' => 'در حال ورود',
            'action' => $action,
        ),200);

    }




    public static function get_user_by_phone_number($phone_number){

        if ( empty( $phone_number ) ) {

            return false;

        }

        $user_query = new \WP_User_Query([
            'meta_key'   => 'digits_phone',
            'meta_value' => $phone_number,
            'number'     => 1,
            'fields'     => 'ID',
        ]);

        return !empty($user_query->get_results()) ? $user_query->get_results()[0] : 0;

    }

}