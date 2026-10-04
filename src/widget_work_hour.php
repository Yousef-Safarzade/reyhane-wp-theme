<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class reyhane_work_hour extends \WP_Widget
{

    public function __construct() {

        parent::__construct(
            'reyhane_work_hour',
            __('Reyhane Work Hour', 'reyhane-wp-theme'),
        );

    }




    public function widget( $args, $instance ) {

        echo $args['before_widget'];


        if ( ! empty( $instance['work_hour'] ) ) {

            printf(
                "<p class='reyhane-typography-b2 reyhane-color-netural-600'>%s</p>
                <p class='reyhane-typography-b2 reyhane-color-netural-900'>%s</p>",
                'ساعت کاری ' ,
                $instance['work_hour']
            );


        }




        echo $args['after_widget'];

    }




    public function form($instance) {

        $address = $instance['work_hour'] ?? '';

        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('work_hour') ); ?>">
                Work Hour
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('work_hour') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('work_hour') ); ?>"
                type="text"
                value="<?php echo esc_attr( 'work_hour' ); ?>"
            />
        </p>


        <?php


    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['work_hour'] = sanitize_text_field(
            $new_instance['work_hour']
        );


        return $instance;
    }

}