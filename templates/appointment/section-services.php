<?php

$services = \Reyhane\BooklyHelper::get_all_services();


?>

<section id="services">

    <div class="section-top-bar">

        <h2 class="reyhane-appointment-section-title">

            انتخاب نوع خدمات

        </h2>

    </div>

    <div class="section-content">

        <div class="reyhane-services-container">

            <?php foreach ($services as $service): ?>

            <div class="reyhane-service" data-service-id="<?php echo $service['id'] ?>">

                <img class="reyhane-service-icon" src="<?php echo wp_get_attachment_url( $service['attachment_id'] , 'full' ); ?>" alt="<?php echo $service['title']; ?>">

                <p class="reyhane-service-title"> <?php echo $service['title']; ?> </p>

            </div>

            <?php endforeach; ?>

        </div>


        <button class="reyhane-submit-service-button">

            <span class="reyhane-submit-service-button-title">
                ادامه
            </span>

            <span class="reyhane-submit-service-button-icon">

                <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/select-service-arrow.svg");  ?>

            </span>

        </button>

    </div>

</section>