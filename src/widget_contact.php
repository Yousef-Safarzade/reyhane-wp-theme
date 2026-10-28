<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class reyhane_contact extends \WP_Widget
{

    public function __construct() {

        parent::__construct(
            'reyhane_contact',
            __('Reyhane Contact Info', 'reyhane-wp-theme'),
        );

    }




    public function widget( $args, $instance ) {

        echo $args['before_widget'];


        if ( ! empty( $instance['address'] ) ) {

            printf(
        "<p class='reyhane-typography-b2 reyhane-color-netural-600'>%s</p>
                <p class='reyhane-typography-b2 reyhane-color-netural-900'>%s</p>",
                'آدرس مطب' ,
                    \Reyhane\helper::englishToPersianNumber( $instance['address'] )
            );


        }




        if ( ! empty( $instance['phone'] ) ) {

            printf(
        "<p class='reyhane-typography-b2 reyhane-color-netural-600'>%s</p>
                <p class='reyhane-typography-b2 reyhane-color-netural-900'>%s</p>",
                'شماره تماس' ,
                    \Reyhane\helper::englishToPersianNumber( $instance['phone'] )
            );

        }



        echo $args['after_widget'];

    }




    public function form($instance) {

        $address = $instance['address'] ?? '';

        $phone = $instance['phone'] ?? '';


        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('address') ); ?>">
                Address
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('address') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('address') ); ?>"
                type="text"
                value="<?php echo esc_attr( $address ); ?>"
            />
        </p>


        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('phone') ); ?>">
                Phone
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('phone') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('phone') ); ?>"
                type="text"
                value="<?php echo esc_attr( $phone ); ?>"
            />
        </p>


        <?php


    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['address'] = sanitize_text_field(
            $new_instance['address']
        );


        $instance['phone'] = sanitize_text_field(
            $new_instance['phone']
        );



        return $instance;
    }

}