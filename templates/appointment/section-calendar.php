<?php

$dates = \Reyhane\helper::get_next_90_days();

$staff = \Bookly\Lib\Entities\Staff::query()->limit( 1 )->find();

$appointments = \Reyhane\BooklyHelper::get_all_future_appointments();

?>

<section id="calendar" style="display:none">

    <div class="section-top-bar">

        <h2 class="reyhane-appointment-section-title">

            تاریخ نوبت انتخاب کنید

        </h2>


        <div class="reyhane-appointment-arrow-container">

            <div class="reyhane-appointment-arrow previous-arrow">

                <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/appointment-arrow-prev.svg"); ?>

            </div>

            <div class="reyhane-appointment-arrow next-arrow">

                <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/appointment-arrow-next.svg"); ?>

            </div>

        </div>

    </div>

    <div class="section-content">

        <div class="reyhane-appointment-dates-container">

            <?php foreach ($dates as $date) {

                $jdate = \Morilog\Jalali\Jalalian::forge($date);

                $date_object = new DateTime("@$date");

                $workload = $staff[0]->getWorkload($date_object->format("Y-m-d"));

                $holiday = $jdate->getDayOfWeek() > 4 || $staff[0]->isOnHoliday( $date_object );

                $extra_class = $holiday ? '  holiday ' : '';

                ?>

                <div class="reyhane-date-item <?php echo $extra_class ?>">

                    <span class="reyhane-appointment-date-day-of-week reyhane-date-item-text"><?php echo $jdate->format('l') ?></span>

                    <span class="reyhane-appointment-date-day-of-month reyhane-date-item-text"><?php echo \Reyhane\helper::englishToPersianNumber( $jdate->format('d') ); ?></span>

                    <span class="reyhane-appointment-date-month reyhane-date-item-text"><?php echo $jdate->format('F') ?></span>

                </div>

            <?php } ?>

        </div>

        <div class="reyhane-appointment-times-container">

            <?php foreach ($times as $time) { ?>


            <?php } ?>

        </div>

    </div>

</section>