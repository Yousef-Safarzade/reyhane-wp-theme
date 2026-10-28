<?php


class reyhane_blog_grid_widget extends \Elementor\Widget_Base {

    const CATEGORY = 'slider';


    public function get_name(): string {

        return 'reyhane-blog-grid';

    }

    public function get_title(): string {

        return esc_html( 'Show Blog Posts Grid' );

    }

    public function get_icon(): string {

        return 'eicon-posts-grid';

    }

    public function get_categories(): array {
        return [ self::CATEGORY ];
    }

    public function get_keywords(): array {

        return [ 'grid', 'blog' , 'post'  ];

    }



    public function get_script_depends(): array {

        return [];

    }

    public function get_style_depends(): array {

        return ['reyhane-blog-grid'];

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
                'posts_per_page',
                [
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'label' => esc_html__( 'Number of Posts', 'textdomain' ),
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

        $result = \Reyhane\Blog::get_all_posts_with_data($settings['posts_per_page']);

        $this->render_blog_grid($settings,$result);

    }

    protected function content_template(): void {}






    private function render_blog_grid($settings,$posts){

        ob_start(); ?>

        <div class="reyhane-blog-grid  reyhane-container reyhane-center-container"  >

            <div class="reyhane-blog-grid-top-bar">

                <p class="reyhane-blog-grid-top-bar-right-col">

                    آخرین مطالب

                </p>


                <div class="reyhane-blog-grid-top-bar-left-col" >

                    <div class="reyhane-blog-grid-show-all-cta-title">

                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>">بیشتر بخوانید</a>

                    </div>

                    <div class="reyhane-blog-grid-show-all-cta-icon">

                        <?php echo \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/blog-grid-read-more-arrow.svg") ?>

                    </div>

                </div>

            </div>


            <div class="reyhane-blog-grid-items-container">

                <?php foreach($posts as $post){

                    get_template_part('/templates/single-post-grid-item/index', '' , $post);

                } ?>

            </div>

        </div>

        <?php echo ob_get_clean();

    }

}



add_action( 'wp_enqueue_scripts', function () {

    wp_register_style( 'reyhane-blog-grid' , \Reyhane\config::$childThemeUrl . "/elementor-widgets/blog-grid/styles.min.css" , [] , \Reyhane\config::$themeVersion );

});
