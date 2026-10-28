<?php

namespace Reyhane;




class BooklyHelper
{


    public static function define_hooks()
    {

    }


    public static function get_all_services(){


        global $wpdb;

        $services_table = $wpdb->prefix . 'bookly_services';

        $query = $wpdb->prepare("SELECT * FROM $services_table");

        $result = array();

        foreach ($wpdb->get_results($query) as $service) {

            $result[ $service->id ] = array(
                'id'   => $service->id,
                'title' => $service->title,
                'attachment_id' => $service->attachment_id,
            );

        }


        return $result;


    }

    public static function get_user_appointments($user_id = 0){

        if ( !$user_id ){

            $user_id = get_current_user_id();

        }

        $customer_phone = get_user_meta($user_id, 'digits_phone', true);

        if ( empty( $customer_phone ) ){

            return [];

        }

        $normalized_phone =   helper::normalize_phone($customer_phone);

        global $wpdb;

        $customers_table = $wpdb->prefix . 'bookly_customers';

        $customer_appointments_table = $wpdb->prefix . 'bookly_customer_appointments';

        $appointments_table = $wpdb->prefix . 'bookly_appointments';

        $customer_id = $wpdb->get_var($wpdb->prepare( "SELECT id FROM {$customers_table} WHERE phone LIKE %s LIMIT 1", "%$normalized_phone%") );

        if ( ! $customer_id ) {

            return [];
        }

        return $wpdb->get_results(
                $wpdb->prepare("SELECT *  FROM {$customer_appointments_table} AS ca
                INNER JOIN {$appointments_table} AS a
                ON a.id = ca.appointment_id
                WHERE ca.customer_id = %d
                ORDER BY a.start_date DESC",
                $customer_id), ARRAY_A
        );


    }


    public static function get_appointment_status_labels(){

        return array(
            'done' => 'انجام شده',
            'approved' => 'تایید شده',
            'rejected' => 'عدم تایید',
            'cancelled' => 'کنسل شده',
            'pending' => 'در انتظار',

        );

    }



    public static function get_user_invoices($user_id = 0){

        if ( !$user_id ){

            $user_id = get_current_user_id();

        }

        $customer_phone = get_user_meta($user_id, 'digits_phone', true);

        if ( empty( $customer_phone ) ){

            return [];

        }

        $normalized_phone =   helper::normalize_phone($customer_phone);

        global $wpdb;

        $customers_table = $wpdb->prefix . 'bookly_customers';


        $customer_id = $wpdb->get_var($wpdb->prepare( "SELECT id FROM {$customers_table} WHERE phone LIKE %s LIMIT 1", "%$normalized_phone%") );

        if ( ! $customer_id ) {

            return [];
        }

        $invoices_table = $wpdb->prefix . 'bookly_payments';

        return $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$invoices_table} WHERE customer_id = %d", $customer_id ) , ARRAY_A);

    }


    public static function get_invoices_status_labels(){

        return array(
            'completed' => 'پرداخت شده',
            'approved' => 'تایید شده',
            'rejected' => 'عدم تایید',
            'pending' => 'در انتظار پرداخت'
        );

    }


    public static function create_or_update_bookly_customer($phone_number,$first_name = '' ,$last_name = '' , $user_id = ''){

        $customer = \Bookly\Lib\Entities\Customer::query()
            ->where('phone', $phone_number)
            ->findOne();


        if (!$customer) {

            $customer = new \Bookly\Lib\Entities\Customer();

            $customer
                ->setFirstName($first_name)
                ->setLastName($last_name)
                ->setFullName($first_name . ' ' . $last_name)
                ->setWpUserId($user_id)
                ->setPhone($phone_number);


            $customer->save();

        }else{

            $customer
                ->setFirstName($first_name)
                ->setLastName($last_name)
                ->setFullName($first_name . ' ' . $last_name);

            $customer->save();

        }


    }




    public static function get_all_future_appointments(){

        global $wpdb;

        $table_name = $wpdb->prefix . 'bookly_appointments';

        $appointments = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT start_date , end_date
                FROM {$table_name}
                WHERE end_date > %s
                ORDER BY start_date ASC",
                current_time('mysql')
            )
        );

        $result = array();

        foreach ($appointments as $appointment) {

           $result[] = array('start_date' => strtotime($appointment->start_date), 'end_date' => strtotime($appointment->end_date));

        }

        return $result;

    }





}