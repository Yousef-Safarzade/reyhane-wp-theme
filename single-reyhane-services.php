<?php
/*
 * Template Name: Service Detail
 */
?>

<?php get_header(); ?>

<?php

$related_services = \Reyhane\ServicesPostType::get_all_services();

$current_post_id = get_the_ID();

?>

<?php get_template_part('templates/service-detail-banner/index', ''); ?>

<?php $meta_data = get_fields(); ?>

    <div class="reyhane-service-main-wrapper reyhane-container reyhane-center-container">

        <div class="reyhane-service-sidebar reyhane-bg-color-50">


            <p class="reyhane-typography-s1 reyhane-color-netural-900">

                خدمات ما

            </p>

            <ul class="services-list-container">

                <?php foreach( $related_services as $related_service ) {

                    $title = get_the_title($related_service);

                    $menu_title = get_field('menu_title', $related_service);

                    $permalink = get_permalink( $related_service);

                    $active = $related_service === $current_post_id ? 'active' : '';

                    printf('<li class="service-list-item"><a class="%s" href="%s">%s</a></li>', $active , $permalink, $menu_title);

                 } ?>

            </ul>

        </div>


        <div class="reyhane-service-content">

            <div class="reyhane-service-top-bar">

                <ul class="reyhane-service-detail-top-bar-list-container">

                    <li class="reyhane-service-detail-top-bar-list-item">

                        <a class="active" href="#content">درباره خدمات</a>

                    </li>

                    <li class="reyhane-service-detail-top-bar-list-item">

                        <a href="#gallery">گالری تصاویر</a>

                    </li>

                    <li class="reyhane-service-detail-top-bar-list-item">

                        <a href="#faq">سوالات متداول</a>

                    </li>


                </ul>


            </div>

            <div class="reyhane-service-content-detail" id="content">

                <h1 class="reyhane-service-detail-main-title"><?php echo get_the_title(); ?></h1>

                <h2 class="reyhane-service-detail-short-description"><?php echo get_field('service_short_description'); ?></h2>

                <div class="reyhane-service-detail-content-text">

                    <?php echo apply_filters('the_content',get_the_content()); ?>

                </div>

            </div>








            <div class="reyhane-service-detail-gallery" id="gallery">

                <h3 class="service-detail-gallery-section-title">گالری تصاویر</h3>

                <div class="reyhane-service-detail-gallery-wrapper">

                    <?php for($i=1;$i<=10;$i++){ ?>

                        <?php

                        $image_id = get_field('service_image_' . $i);

                        if ( empty($image_id) ) {

                            continue;

                        }

                        $image_thumbnail_size_url = wp_get_attachment_image_url( $image_id, 'medium' );

                        $image_full_size_url = wp_get_attachment_image_url( $image_id, 'full' );

                        printf("<a href='%s' data-lightbox><img src='%s'></a>", $image_full_size_url , $image_thumbnail_size_url,);

                        ?>

                    <?php } ?>

                </div>

            </div>


            <div class="reyhane-service-faq" id="faq">

                <h3 class="service-detail-faq-section-title">سوالات متداول</h3>

                <?php

                $question = [];

                for($i=1; $i<=10; $i++){

                    if ( !empty($meta_data['question_'.$i]) ) {

                        $question[] = array(
                            'question' => $meta_data['question_'.$i],
                            'answer' => $meta_data['answer_'.$i],
                        );

                    }

                }

                ?>

                <?php get_template_part('templates/faq/index', '' , $question); ?>

            </div>

        </div>


    </div>


<?php get_footer(); ?>