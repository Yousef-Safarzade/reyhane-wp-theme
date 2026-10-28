<?php


class reyhane_show_testimonials_grid extends \Elementor\Widget_Base {

    const CATEGORY = 'slider';


    public function get_name(): string {

        return 'reyhane-show-testimonials-grid';

    }

    public function get_title(): string {

        return esc_html( 'Show Testimonials Grid' );

    }

    public function get_icon(): string {

        return 'eicon-posts-grid';

    }

    public function get_categories(): array {
        return [ self::CATEGORY ];
    }

    public function get_keywords(): array {

        return [ 'grid', 'testimonial'  ];

    }



    public function get_script_depends(): array {

        return [];

    }

    public function get_style_depends(): array {

        return ['reyhane-show-testimonials-grid'];

    }

    public function has_widget_inner_wrapper(): bool {

        return true;

    }

    protected function is_dynamic_content(): bool {

        return true;

    }

    protected function register_controls(): void {

        $this->start_controls_section('content', ['label' => 'Settings']);


        $this->end_controls_section();

    }

    protected function render(): void {

        $settings = $this->get_settings_for_display();

        $testimonials = \Reyhane\TestimonialPostType::get_all_testimonials_with_data();

        $this->render_show_services_grid($settings,$testimonials);


    }

    protected function content_template(): void {}






    private function render_show_services_grid($settings,$testimonials){

        ob_start(); ?>

            <div class="reyhane-show-testimonials-grid-main-container reyhane-center-container reyhane-container">

                <p class="reyhane-show-testimonials-grid-top-title">

                    نظر مراجعه کنندگان

                </p>

                <div class="reyhane-fade-separator">

                    <img src="<?php echo \Reyhane\config::$imgUrl . '/horizontal-fade-separator-white.png' ?>" >

                </div>

                <div class="reyhane-show-testimonials-grid-items-container">

                    <?php foreach ($testimonials as $testimonial) { ?>

                            <div class="reyhane-show-testimonials-grid-item">

                                <div class="reyhane-show-testimonials-grid-item-stars">

                                    <?php for( $j = 1; $j <= 5; $j++  ) { ?>

                                        <img class="reyhane-show-testimonials-grid-item-star" src="<?php echo \Reyhane\config::$imgUrl . '/testimonial-star.png' ?>" >

                                    <?php } ?>

                                </div>

                                <p class="reyhane-show-testimonials-grid-item-description">

                                    <?php echo $testimonial['description'] ?>

                                </p>

                                <div class="reyhane-show-services-grid-item-meta">

                                    <div class="reyhane-show-services-grid-item-author-avatar-container">

                                        <img class="reyhane-show-services-grid-item-avatar" src="<?php echo $testimonial['avatar'] ?>" >

                                    </div>

                                    <div class="reyhane-show-services-grid-item-author-info">

                                        <p class="reyhane-show-services-grid-item-author-name"><?php echo $testimonial['author'] ?></p>

                                        <p class="reyhane-show-services-grid-item-author-date"><?php echo $testimonial['date'] ?></p>

                                    </div>

                                </div>

                            </div>

                    <?php } ?>

                </div>


            </div>



        <?php echo ob_get_clean();

    }

}



add_action( 'wp_enqueue_scripts', function () {

    wp_register_style( 'reyhane-show-testimonials-grid' , \Reyhane\config::$childThemeUrl . "/elementor-widgets/show-testimonials-grid/styles.min.css" , [] , \Reyhane\config::$themeVersion );

});
