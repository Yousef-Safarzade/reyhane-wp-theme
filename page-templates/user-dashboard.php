<?php /* Template Name: User Dashboard */ ?>

<?php get_header(); ?>

<?php

if ( get_current_user_id() == '0' ){

    wp_safe_redirect( \Reyhane\config::$websiteUrl );

    exit;

}

$user_data = \Reyhane\helper::get_user_dashboard_meta_data();

?>

<div class="reyhane-user-dashboard-main-container reyhane-container reyhane-center-container">

    <?php get_template_part('/templates/user-dashboard/section' , 'sidebar' , $user_data ); ?>

    <?php get_template_part('/templates/user-dashboard/section' , 'content' , $user_data ); ?>

</div>

<?php get_footer(); ?>