<?php

class reyhane_about extends \WP_Widget
{

    public function __construct() {

        parent::__construct(
            'reyhane_about',
            __('About Reyhane Widget', 'reyhane-wp-theme'),
        );

    }




    public function widget( $args, $instance ) {

        echo $args['before_widget'];


        if ( ! empty( $instance['image_url'] ) ) {

            printf('<img src="%1$s" alt="%2$s" />', $instance['image_url'], $instance['title']);

        }


        if ( ! empty( $instance['title'] ) ) {

            printf("<p class='reyhane-about-widget-title reyhane-typography-s1 reyhane-color-netural-900'>%s</p>", $instance['title']);

        }

        if ( ! empty( $instance['description'] ) ) {

            printf("<p class='reyhane-about-widget-description reyhane-typography-b2 reyhane-color-netural-600 reyhane-margin-bottom-0'>%s</p>", $instance['description']);

        }


        if ( ! empty( $instance['quote'] ) ) {

            printf("<p class='reyhane-about-widget-quote reyhane-typography-b2 reyhane-color-netural-900'>%s</p>", $instance['quote']);

        }

        echo $args['after_widget'];

    }




    public function form($instance) {

        $title = $instance['title'] ?? '';

        $image_url = $instance['image_url'] ?? '';

        $description = $instance['description'] ?? '';

        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
                Title
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('title') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('title') ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            />
        </p>


        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('description') ); ?>">
                Description
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('description') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('description') ); ?>"
                type="text"
                value="<?php echo esc_attr( $description ); ?>"
            />
        </p>




        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('quote') ); ?>">
                Quote
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr( $this->get_field_id('quote') ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name('quote') ); ?>"
                    type="text"
                    value="<?php echo esc_attr( 'quote' ); ?>"
            />
        </p>



        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('image_url') ); ?>">
                Image URL
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('image_url') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('image_url') ); ?>"
                type="text"
                value="<?php echo esc_attr( $image_url ); ?>"
            />
        </p>

        <?php


    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = sanitize_text_field(
            $new_instance['title']
        );


        $instance['description'] = sanitize_text_field(
            $new_instance['description']
        );


        $instance['image_url'] = sanitize_text_field(
            $new_instance['image_url']
        );


        $instance['quote'] = sanitize_text_field(
                $new_instance['quote']
        );

        return $instance;
    }

}


