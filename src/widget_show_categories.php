<?php

class reyhane_show_categories extends \WP_Widget
{

    public function __construct() {

        parent::__construct(
            'reyhane_show_categories',
            __('Show Categories in Post Sidebar', 'reyhane-wp-theme'),
        );

    }




    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {

            printf("<p class='reyhane-widget-title'>%s</p>", \Reyhane\helper::englishToPersianNumber($instance['title']));

        }

        $uncategorized = get_category_by_slug('uncategorized');

        $args = array('hide_empty' => false,'exclude' => $uncategorized->term_id,);

        $categories = get_categories($args);

        foreach ($categories as $category) {

            printf(
                    "<a class='reyhane-show-categories-item' href='%s'><span class='reyhane-show-categories-item-title'>%s</span> <span class='reyhane-show-categories-item-icon'>%s</span></a>",
                    get_category_link($category->term_id),
                    $category->name,
                    \Reyhane\helper::print_svg( \Reyhane\config::$imgPath . "/svg/responsive-menu-item-arrow.svg" , false)
            );


        }

        echo $args['after_widget'];

    }




    public function form($instance) {

        $title = $instance['title'] ?? '';

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

        <?php


    }



    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = sanitize_text_field(
            $new_instance['title']
        );

        return $instance;
    }

}