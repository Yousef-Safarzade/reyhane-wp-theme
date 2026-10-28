<?php


class reyhane_big_intro_widget extends \Elementor\Widget_Base {

    const CATEGORY = 'slider';


    public function get_name(): string {

        return 'reyhane-big-intro';

    }

    public function get_title(): string {

        return esc_html( 'Show Big Intro' );

    }

    public function get_icon(): string {

        return 'eicon-posts-grid';

    }

    public function get_categories(): array {
        return [ self::CATEGORY ];
    }

    public function get_keywords(): array {

        return [ 'intro', 'full'  ];

    }



    public function get_script_depends(): array {

        return [];

    }

    public function get_style_depends(): array {

        return ['reyhane-big-intro'];

    }

    public function has_widget_inner_wrapper(): bool {

        return true;

    }

    protected function is_dynamic_content(): bool {

        return true;

    }

    protected function register_controls(): void {

        $this->start_controls_section('content', ['label' => 'Settings']);


        $this->add_control(
                'background_image',
                [
                        'label' => esc_html__( 'Background Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'media_types' => [ 'image' ],
                        'default' => [
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                ]
        );


        $this->add_control(
                'background_image_mobile',
                [
                        'label' => esc_html__( 'Mobile Background Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'media_types' => [ 'image' ],
                        'default' => [
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                ]
        );


        $this->add_control(
                'background_image_overlay',
                [
                        'label' => esc_html__( 'Background Image Overlay', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'alpha' => true,
                        'selectors' => [
                                '.reyhane-big-intro-background-overlay' => 'background-color: {{VALUE}}',
                        ],
                ]
        );


        $this->add_control(
                'main_title',
                [
                        'label' => esc_html__( 'Main Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                ]
        );

        $this->add_control(
                'sub_title',
                [
                        'label' => esc_html__( 'Sub Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                ]
        );


        $this->add_control(
                'badge_title',
                [
                        'label' => esc_html__( 'Badge Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                ]
        );

        $this->end_controls_section();

    }

    protected function render(): void {

        $settings = $this->get_settings_for_display();

        $this->render_big_intro($settings);



    }

    protected function content_template(): void {}






    private function render_big_intro($settings){

        ob_start(); ?>

            <div class="reyhane-big-intro">

                <div class="reyhane-big-intro-background" style="background-image:url(<?php echo $settings['background_image']['url']; ?>)"></div>

                <div class="reyhane-big-intro-background-overlay"></div>

                <div class="reyhane-big-intro-container reyhane-container reyhane-center-container">

                    <div class="reyhane-big-intro-meta-data">

                        <div class="reyhane-big-intro-badge-container">

                            <img class="reyhane-big-intro-badge-icon" src='<?php echo \Reyhane\config::$imgUrl . "/twitter-verified-badge.png" ?>'>

                            <p class="reyhane-big-intro-badge-text">

                                <?php echo $settings['badge_title'] ?>

                            </p>

                        </div>

                        <h1 class="reyhane-big-intro-main-title">

                            <?php echo $settings['main_title'] ?>

                        </h1>

                        <h2 class="reyhane-big-intro-sub-title">

                            <?php echo $settings['sub_title'] ?>

                        </h2>

                    </div>

                    <?php get_template_part('/templates/double-button/index', '' , ['extra_class' => ''] ) ?>


                    <img class="reyhane-big-intro-mobile-background" src="<?php echo $settings['background_image_mobile']['url']; ?>" >


                </div>

            </div>

        <?php echo ob_get_clean();

    }

}



add_action( 'wp_enqueue_scripts', function () {

    wp_register_style( 'reyhane-big-intro' , \Reyhane\config::$childThemeUrl . "/elementor-widgets/big-intro/styles.min.css" , [] , \Reyhane\config::$themeVersion );

});
