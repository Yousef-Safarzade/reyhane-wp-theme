<?php

$user = wp_get_current_user();

$user_id = $user->ID;

?>

<div class="reyhane-header-cta-wrapper reyhane-flex reyhane-justify-end">

    <?php if( !$user_id ) { ?>

        <a href="<?php echo \Reyhane\config::$websiteUrl . "/login" ?>" class="reyhane-user-login-header-cta reyhane-button-large guest">

            <span class="reyhane-button-text">

                ورود / ثبت نام

            </span>

        </a>

    <?php } else { ?>

        <a href="<?php echo \Reyhane\config::$websiteUrl . '/user-dashboard' ?>" class="reyhane-user-login-header-cta reyhane-button-large logged-in">

            <span class="reyhane-button-icon">

               <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/header-cta-user-icon.svg"); ?>

            </span>


            <span class="reyhane-button-text">

                <?php echo $user->first_name; ?>

            </span>

        </a>



    <?php } ?>


</div>