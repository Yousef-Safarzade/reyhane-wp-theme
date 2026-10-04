<?php


class reyhane_about_card_widget extends \Elementor\Widget_Base {

    const CATEGORY = 'slider';


    public function get_name(): string {

        return 'reyhane-about-card';

    }

    public function get_title(): string {

        return esc_html( 'Show About Doctor Reyhane' );

    }

    public function get_icon(): string {

        return 'eicon-posts-grid';

    }

    public function get_categories(): array {
        return [ self::CATEGORY ];
    }

    public function get_keywords(): array {

        return [ 'about', 'services'  ];

    }



    public function get_script_depends(): array {

        return [];

    }

    public function get_style_depends(): array {

        return ['reyhane-about-card'];

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
                'main_image',
                [
                        'label' => esc_html__( 'About Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'media_types' => [ 'image' ],
                        'default' => [
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                ]
        );


        $this->add_control(
                'badge_icon',
                [
                        'label' => esc_html__( 'Badge Icon', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                                'value' => 'fas fa-circle',
                                'library' => 'fa-solid',
                        ],
                        'recommended' => [],
                ]
        );



        $this->add_control(
                'badge_title',
                [
                        'label' => esc_html__( 'Badge Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
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
                'subtitle_right',
                [
                        'label' => esc_html__( 'Right Subtitle', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                ]
        );


        $this->add_control(
                'subtitle_left',
                [
                        'label' => esc_html__( 'Left Subtitle', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                ]
        );



        $this->add_control(
                'description',
                [
                        'label' => esc_html__( 'Description', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'rows' => 10,
                        'default' => esc_html__( 'Default description', 'textdomain' ),
                        'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
                ]
        );


        $this->add_control(
                'cta_title',
                [
                        'label' => esc_html__( 'CTA Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                ]
        );


        $this->add_control(
                'cta_link',
                [
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => [ 'url', 'is_external', 'nofollow' ],
                        'default' => [
                                'url' => '',
                                'is_external' => false,
                                'nofollow' => false,
                            // 'custom_attributes' => '',
                        ],
                        'label_block' => true,
                ]
        );



        $this->end_controls_section();

    }

    protected function render(): void {

        $settings = $this->get_settings_for_display();

        $this->render_show_about_card($settings);

    }

    protected function content_template(): void {}






    private function render_show_about_card($settings){

        ob_start(); ?>


            <div class="reyhane-about-card-main-container reyhane-container reyhane-center-container">

                <div class="reyhane-about-card-image-container">

                    <img src="<?php echo $settings['main_image']['url'] ?>" class="reyhane-about-card-image" alt="<?php echo $settings['main_title'];  ?>">

                </div>


                <div class="reyhane-about-card-meta-container">

                    <div class="reyhane-about-card-badge-container">

                        <span class="reyhan-about-card-badge-icon">

                            <?php \Elementor\Icons_Manager::render_icon( $settings['badge_icon'], [ 'aria-hidden' => 'true' ] ); ?>

                        </span>


                        <p class="reyhan-about-card-badge-text">

                                <?php echo $settings['badge_title'];  ?>

                        </p>

                    </div>


                    <p class="reyhane-about-card-title">

                        <?php echo $settings['main_title'];  ?>

                    </p>


                    <div class="reyhane-about-card-subtitle-container">

                        <p>

                            <?php echo $settings['subtitle_right'];  ?>

                        </p>


                        <p class="reyhane-about-card-subtitle-vertical-separator">|</p>

                        <p>

                            <?php echo $settings['subtitle_left'];  ?>

                        </p>

                    </div>


                    <p class="reyhane-about-card-description">

                        <?php echo $settings['description'];  ?>

                    </p>


                    <a class="reyhane-about-card-cta reyhane-button-large" href="<?php $settings['cta_link']['url']; ?>" title="<?php $settings['main_title']; ?>">

                        <?php echo $settings['cta_title'];  ?>

                    </a>


                </div>


            </div>

        <?php echo ob_get_clean();

    }

}



add_action( 'wp_enqueue_scripts', function () {

    wp_register_style( 'reyhane-about-card' , \Reyhane\config::$childThemeUrl . "/elementor-widgets/about-card/styles.min.css" , [] , \Reyhane\config::$themeVersion );

});
