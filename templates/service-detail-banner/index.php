<div class="reyhane-service-detail-banner" style="background-image: url(<?php echo \Reyhane\ThemeSettings::get_theme_setting('services_banner_image')['url'] ?>);">

    <div class="reyhane-container reyhane-center-container reyhane-service-detail-banner-content-wrapper" style="z-index: 1">

        <h2 class="reyhane-typography-h2 reyhane-color-netural-900 reyhane-service-detail-banner-main-title" >


            <?php echo \Reyhane\ThemeSettings::get_theme_setting('services_banner_title') ?>

        </h2>

        <p class="reyhane-service-detail-banner-description">

            <?php echo \Reyhane\ThemeSettings::get_theme_setting('services_banner_description') ?>

        </p>

        <?php get_template_part('templates/double-button/index' , '' ,array('extra_class' => '')) ?>

    </div>

    <div class="reyhane-service-detail-banner-responsive-image"  style="background-image: url(<?php echo \Reyhane\ThemeSettings::get_theme_setting('services_banner_image_responsive')['url'] ?>);"> </div>

</div>