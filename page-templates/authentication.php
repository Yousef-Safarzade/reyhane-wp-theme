<?php /* Template Name: Authentication */ ?>

<?php get_header('authentication'); ?>

<?php if ( get_current_user_id() ){

    wp_safe_redirect( \Reyhane\config::$websiteUrl );

} ?>

<div class="reyhane-authentication-container">

    <div class="reyhane-authentication-background"></div>

    <a class="reyhane-authentication-return-home-link" href="<?php echo \Reyhane\config::$websiteUrl; ?>">

        <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/close-responsive-menu.svg"); ?>

    </a>

    <div class="reyhane-authentication-form-container">

        <div class="reyhane-authentication-form-right-col">

            <?php get_template_part('templates/authentication/section','first-step'); ?>

            <?php get_template_part('templates/authentication/section','second-step'); ?>

        </div>

        <div class="reyhane-authentication-form-left-col"></div>

    </div>

</div>

<?php get_footer('authentication'); ?>