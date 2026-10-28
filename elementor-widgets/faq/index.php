<?php


class reyhane_faq_widget extends \Elementor\Widget_Base {

    const CATEGORY = 'slider';


    public function get_name(): string {

        return 'reyhane-faq';

    }

    public function get_title(): string {

        return esc_html( 'Show FAQ' );

    }

    public function get_icon(): string {

        return 'eicon-posts-grid';

    }

    public function get_categories(): array {
        return [ self::CATEGORY ];
    }

    public function get_keywords(): array {

        return [ 'faq'  ];

    }



    public function get_script_depends(): array {

        return ['reyhane-faq-script'];

    }

    public function get_style_depends(): array {

        return ['reyhane-faq-style'];

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
            'questions',
            [
                'label' => esc_html__( 'Questions', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'question',
                        'label' => esc_html__( 'Question', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( '' , 'textdomain' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'answer',
                        'label' => esc_html__( 'Answer', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( '' , 'textdomain' ),
                        'label_block' => true,
                    ],
                ],
                'title_field' => '{{{ question }}}',
            ]
        );



        $this->end_controls_section();

    }

    protected function render(): void {

        $settings = $this->get_settings_for_display();

        $this->render_faq($settings);



    }

    protected function content_template(): void {}






    private function render_faq($settings){

        ob_start(); ?>

        <div class="reyhane-faq-container reyhane-container reyhane-center-container">

            <?php foreach ($settings['questions'] as $item){ ?>

                <div class="reyhane-faq-item ">

                    <div class="reyhane-faq-title">

                        <p><?php  echo $item['question']; ?></p>

                    </div>

                    <div class="reyhane-faq-answer">

                        <p><?php  echo $item['answer']; ?></p>

                    </div>

                    <div class="reyhane-faq-icon">

                        <span class="plus">+</span>

                        <span class="minus">-</span>

                    </div>

                </div>

            <?php } ?>

        </div>

        <?php echo ob_get_clean();

    }

}



add_action( 'wp_enqueue_scripts', function () {

    wp_register_style( 'reyhane-faq-style' , \Reyhane\config::$childThemeUrl . "/elementor-widgets/faq/styles.min.css" , [] , \Reyhane\config::$themeVersion );

    wp_register_script( 'reyhane-faq-script',  \Reyhane\config::$childThemeUrl . "/elementor-widgets/faq/script.min.js" , ['jquery'] , \Reyhane\config::$themeVersion , true );

});