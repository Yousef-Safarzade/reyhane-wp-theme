<?php /* Template Name: Appointment */ ?>

<?php get_header(); ?>

<?php if ( !get_current_user_id() ){

    wp_safe_redirect( \Reyhane\config::$websiteUrl . "/login" );


} ?>


<?php if ( !Reyhane\BooklyHelper::check_user_session() ){

    $user_session = Reyhane\BooklyHelper::generate_user_session();

} ?>

<div class="reyhane-appointment-form-container reyhane-container reyhane-center-container">

    <?php get_template_part('/templates/appointment/section','top-bar'); ?>

    <div class="reyhane-appointment-main-container">

        <?php get_template_part('/templates/appointment/section','services' );  ?>

        <?php get_template_part('/templates/appointment/section','calendar' ); ?>

        <?php get_template_part('/templates/appointment/section','payment' ); ?>

    </div>

</div>

<?php get_footer('appointment'); ?>