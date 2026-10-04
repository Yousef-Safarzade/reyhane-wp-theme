<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class reyhane_social_icons extends \WP_Widget
{

    public function __construct() {

        parent::__construct(
            'reyhane_social_icons',
            __('Reyhane Social Icons', 'reyhane-wp-theme'),
        );

    }




    public function widget( $args, $instance ) {

        echo $args['before_widget'];


        printf("<p class='reyhane-typography-b2 reyhane-color-netural-600'>%s</p>", 'راه ارتباطی');


        printf("<div class='reyhane-social-icons-wrapper'>");

        if ( ! empty( $instance['whatsapp_url'] ) ) {

            printf(
                "<a href='%s' target='_blank' class='reyhane-social-icon-widget-item whatsapp'>
                        %s
                 </a>",
                $instance['whatsapp_url'] ,
                \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/social-icon-whatsapp.svg" , false)
            );

        }


        if ( ! empty( $instance['instagram_url'] ) ) {

            printf(
                    "<a href='%s' target='_blank' class='reyhane-social-icon-widget-item instagram'>
                        %s
                 </a>",
                    $instance['instagram_url'] ,
                    \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/social-icon-instagram.svg"  , false)
            );

        }


        if ( ! empty( $instance['telegram_url'] ) ) {

            printf(
                    "<a href='%s' target='_blank' class='reyhane-social-icon-widget-item telegram'>
                        %s
                 </a>",
                    $instance['telegram_url'] ,
                    \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/social-icon-telegram.svg" ,  false)

            );

        }


        if ( ! empty( $instance['email_url'] ) ) {

            printf(
                    "<a href='%s' target='_blank' class='reyhane-social-icon-widget-item email'>
                        %s
                 </a>",
                    $instance['email_url'] ,
                    \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/social-icon-email.svg" ,  false)

            );

        }

        printf("</div>");








        echo $args['after_widget'];

    }




    public function form($instance) {

        $whatsapp_url = $instance['whatsapp_url'] ?? '';

        $telegram_url = $instance['telegram_url'] ?? '';

        $instagram_url = $instance['instagram_url'] ?? '';

        $email_url = $instance['email_url'] ?? '';


        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('whatsapp_url') ); ?>">
                Whatsapp URL
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('whatsapp_url') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('whatsapp_url') ); ?>"
                type="text"
                value="<?php echo esc_attr( 'whatsapp_url' ); ?>"
            />
        </p>



        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('telegram_url') ); ?>">
                Telegram URL
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr( $this->get_field_id('telegram_url') ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name('telegram_url') ); ?>"
                    type="text"
                    value="<?php echo esc_attr( 'telegram_url' ); ?>"
            />
        </p>



        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('instagram_url') ); ?>">
                Instagram URL
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr( $this->get_field_id('instagram_url') ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name('instagram_url') ); ?>"
                    type="text"
                    value="<?php echo esc_attr( 'instagram_url' ); ?>"
            />
        </p>



        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('email_url') ); ?>">
                Email
            </label>

            <input
                    class="widefat"
                    id="<?php echo esc_attr( $this->get_field_id('email_url') ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name('email_url') ); ?>"
                    type="text"
                    value="<?php echo esc_attr( 'email_url' ); ?>"
            />
        </p>



        <?php


    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['instagram_url'] = sanitize_text_field(
            $new_instance['instagram_url'] ?? ''
        );


        $instance['telegram_url'] = sanitize_text_field(
                $new_instance['telegram_url'] ?? ''
        );


        $instance['whatsapp_url'] = sanitize_text_field(
                $new_instance['whatsapp_url'] ?? ''
        );


        $instance['email_url'] = sanitize_text_field(
                $new_instance['email_url'] ?? ''
        );


        return $instance;
    }

}