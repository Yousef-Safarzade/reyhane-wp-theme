<?php


class reyhane_video_box_widget extends \Elementor\Widget_Base {

    const CATEGORY = 'slider';


    public function get_name(): string {

        return 'reyhane-video-box';

    }

    public function get_title(): string {

        return esc_html( 'Video Box' );

    }

    public function get_icon(): string {

        return 'eicon-posts-grid';

    }

    public function get_categories(): array {
        return [ self::CATEGORY ];
    }

    public function get_keywords(): array {

        return [ 'video'  ];

    }



    public function get_script_depends(): array {

        return ['reyhane-video-box-script'];

    }

    public function get_style_depends(): array {

        return ['reyhane-video-box-style'];

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
            'video',
            [
                'label' => esc_html__( 'Choose Video File', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [ 'video' ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'poster',
            [
                'label' => esc_html__( 'Choose Poster', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => [ 'image' ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
                'width',
                [
                    'label' => esc_html__( 'Width', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 1280,
                    'step' => 5,
                    'default' => 790,
                ]
        );



        $this->end_controls_section();

    }

    protected function render(): void {

        $settings = $this->get_settings_for_display();

        $this->render_video_box($settings);



    }

    protected function content_template(): void {}






    private function render_video_box($settings){

        ob_start(); ?>

        <div class="reyhane-video-box-container" style="width : 100% ; max-width : <?php echo $settings['width']; ?>px">

            <div class="reyhane-video-box-icon-container">

                <span class="reyhane-video-box-play-icon">

                    <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/play-icon.svg"); ?>

                </span>

                <span class="reyhane-video-box-pause-icon">

                    <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/pause-icon.svg"); ?>

                </span>

            </div>

            <video poster="<?php echo $settings['poster']['url']; ?>" playsinline loop style="width : 100%">

                <source src="<?php echo $settings['video']['url'] ?>" type="video/mp4">

            </video>

        </div>

        <?php echo ob_get_clean();

    }

}



add_action( 'wp_enqueue_scripts', function () {

    wp_register_style( 'reyhane-video-box-style' , \Reyhane\config::$childThemeUrl . "/elementor-widgets/video-box/style.min.css" , [] , \Reyhane\config::$themeVersion );

    wp_register_script( 'reyhane-video-box-script',  \Reyhane\config::$childThemeUrl . "/elementor-widgets/video-box/script.min.js" , ['jquery'] , \Reyhane\config::$themeVersion , true );

});
