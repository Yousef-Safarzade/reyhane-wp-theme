<?php

    if(\Reyhane\ThemeSettings::get_theme_setting('show_global_top_banner') === '1'){

        get_template_part('templates/global-top-banner/index','');

    }

?>

<header class="reyhane-header reyhane-container reyhane-center-container reyhane-bg-color-50 reyhane-flex reyhane-rtl reyhane-items-center reyhane-border-radius-24">

   <?php get_template_part('templates/header/section','logo'); ?>

   <?php get_template_part('templates/header/section','menu'); ?>

   <?php get_template_part('templates/header/section','cta'); ?>

   <?php get_template_part('templates/header/section','responsive-menu-icon'); ?>

   <?php get_template_part('templates/header/section','responsive-menu'); ?>

</header>