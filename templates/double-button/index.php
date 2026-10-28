<div class="reyhane-make-appointment-double-button <?php echo $args['extra_class'] ?>">

    <a class="reyhane-big-intro-button reyhane-button-large make-appointment" href="<?php echo \Reyhane\ThemeSettings::get_theme_setting('make_appointment_url') ?>">

             <span class="reyhane-button-icon">

                <?php echo \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/calendar.svg"); ?>

            </span>

        <span class="reyhane-button-text">نوبت بگیرید</span>

    </a>

    <a class="reyhane-big-intro-button reyhane-button-large get-consultant" href="<?php echo \Reyhane\ThemeSettings::get_theme_setting('get_consultant_url') ?>" target="_blank">

         <span class="reyhane-button-icon">

            <?php echo \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/chat-lines.svg"); ?>

        </span>

        <span class="reyhane-button-text">مشاوره رایگان</span>

    </a>

</div>
