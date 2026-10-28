<?php

global $post;

$post_slug = $post->post_name;

?>

<div class="reyhane-user-dashboard-sidebar">

    <div class="reyhane-user-dashboard-avatar">

        <img class="reyhane-user-dashboard-avatar-image" src="<?php echo \Reyhane\config::$imgUrl . "/user-dashboard-avatar.png"; ?>" >

        <p class="reyhane-user-dashboard-avatar-user-name"> <?php echo $args['full_name'] ?> </p>

        <p class="reyhane-user-dashboard-avatar-user-phone"> <?php echo \Reyhane\helper::englishToPersianNumber($args['userPhoneNumber']) ?> </p>

    </div>


    <div class="reyhane-user-dashboard-navigation">

        <a class="reyhane-user-dashboard-navigation-item <?php echo $post_slug == 'edit-user-data' ||  $post_slug == 'user-dashboard' ? 'active' : ''  ?>" href="<?php echo \Reyhane\config::$websiteUrl . '/user-dashboard/edit-user-data' ?>" >

                <span class="item-icon">

                    <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/user-dashboard-user-icon.svg"); ?>

                </span>

            <span class="item-title">

                    اطلاعات کاربری

                </span>

        </a>



        <a class="reyhane-user-dashboard-navigation-item <?php echo $post_slug == 'user-appointments' ? 'active' : ''  ?>" href="<?php echo \Reyhane\config::$websiteUrl . '/user-dashboard/user-appointments/' ?>">

                <span class="item-icon">

                    <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/user-dashboard-user-appointments.svg"); ?>

                </span>

            <span class="item-title">

                    نوبت های من

                </span>

        </a>



        <a class="reyhane-user-dashboard-navigation-item <?php echo $post_slug == 'user-invoices' ? 'active' : ''  ?>"  href="<?php echo \Reyhane\config::$websiteUrl . '/user-dashboard/user-invoices' ?>" >

                <span class="item-icon">

                    <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/user-dashboard-user-payments.svg"); ?>

                </span>

            <span class="item-title">

                    تراکنش های من

                </span>

        </a>

    </div>


    <a class="reyhane-user-dashboard-logout-button" href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">

             <span class="item-icon">

                    <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/user-dashboard-logout.svg"); ?>

            </span>

        <span class="item-title">

                    خروج

            </span>

    </a>



</div>