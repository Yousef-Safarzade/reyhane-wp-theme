<?php /* Template Name: Appointment */ ?>

<?php get_header(); ?>

<?php if ( !get_current_user_id() ){

    wp_safe_redirect( \Reyhane\config::$websiteUrl . "/login" );

} ?>


<div class="reyhane-appointment-form-container reyhane-container reyhane-center-container">

    <?php get_template_part('/templates/appointment/section','top-bar'); ?>

    <div class="reyhane-appointment-main-container">

        <?php get_template_part('/templates/appointment/section','services' );  ?>

        <?php get_template_part('/templates/appointment/section','calendar' ); ?>

    </div>

</div>

<?php get_footer('appointment'); ?>