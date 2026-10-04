<?php


class reyhane_show_services_grid_widget extends \Elementor\Widget_Base {

    const CATEGORY = 'slider';


    public function get_name(): string {

        return 'reyhane-show-services-grid';

    }

    public function get_title(): string {

        return esc_html( 'Show Services Grid' );

    }

    public function get_icon(): string {

        return 'eicon-posts-grid';

    }

    public function get_categories(): array {
        return [ self::CATEGORY ];
    }

    public function get_keywords(): array {

        return [ 'grid', 'services'  ];

    }



    public function get_script_depends(): array {

        return [];

    }

    public function get_style_depends(): array {

        return ['reyhane-show-services-grid'];

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
            'columns',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => esc_html__( 'Columns', 'textdomain' ),
                'placeholder' => '0',
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 6,
            ]
        );

        $this->end_controls_section();

    }

    protected function render(): void {

        $settings = $this->get_settings_for_display();

        $services = \Reyhane\ServicesPostType::get_all_services_with_data();

        $this->render_show_services_grid($settings, $services);



    }

    protected function content_template(): void {}






    private function render_show_services_grid($settings,$services){

        ob_start(); ?>

        <div class="reyhane-show-services-grid-main-container columns-<?php echo $settings['columns'];?>" >

            <?php foreach( $services as $service => $item ){ ?>

                    <a class="reyhane-show-services-grid-item" href="<?php echo $item['permalink'];?> ?>" title="<?php echo $item['title'];?> ?>">

                        <img class="reyhane-show-services-grid-item-image" src="<?php echo $item['thumbnail_url'];?> ?>" alt="<?php echo $item['title'];?> ?>" >

                        <p class="reyhane-show-services-grid-item-title"><?php echo $item['title'];?></p>

                        <p class="reyhane-show-services-grid-item-sub-title"><?php echo $item['sub_title'];?></p>

                    </a>

            <?php } ?>

        </div>

        <?php echo ob_get_clean();

    }

}



add_action( 'wp_enqueue_scripts', function () {

    wp_register_style( 'reyhane-show-services-grid' , \Reyhane\config::$childThemeUrl . "/elementor-widgets/show-services-grid/styles.min.css" , [] , \Reyhane\config::$themeVersion );

});
