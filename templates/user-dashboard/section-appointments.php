<?php

$user_appointments = \Reyhane\BooklyHelper::get_user_appointments();

$services = \Reyhane\BooklyHelper::get_all_services();

$status_labels = \Reyhane\BooklyHelper::get_appointment_status_labels();

$extra_class = empty( $user_appointments ) ? 'no-appointments' : '';

?>

<div class="reyhane-user-appointments-container <?php echo $extra_class; ?>">



        <?php if ( empty( $user_appointments ) ){ ?>


            <p class="reyhane-no-appointment-found-message"> هیچ نوبتی برای شما ثبت نشده است </p>


        <?php } else { ?>

            <?php foreach ($user_appointments as $appointment) { ?>

                <?php

                $is_error = in_array( $appointment['status'] , ['rejected', 'cancelled']);

                $appointment_date = \Reyhane\helper::convert_date_to_shamsi($appointment['start_date']);

                ?>

                <div class="reyhane-user-appointment-item">

                    <div class="appointment-data-column">

                        <div class="column-title">زمان نوبت</div>

                        <div class="column-value">

                            <?php echo \Reyhane\helper::englishToPersianNumber($appointment_date); ?>

                        </div>

                    </div>


                    <div class="appointment-data-column">

                        <div class="column-title">نوع خدمات</div>

                        <div class="column-value">

                            <?php echo $services[ $appointment['service_id'] ]['title']; ?>

                        </div>

                    </div>



                    <div class="appointment-data-column">

                        <div class="column-title">وضعیت</div>

                        <div class="column-value <?php echo $is_error ? 'canceled-value' : 'success-value' ?>">

                        <span>

                            <?php echo $status_labels[ $appointment['status'] ]; ?>

                        </span>


                        </div>

                    </div>



                    <div class="appointment-data-column">

                        <div class="column-title">هزینه</div>

                        <div class="column-value">

                            <?php $price = $services[ $appointment['service_id'] ]['price']; ?>

                            <?php printf('%s %s' , \Reyhane\helper::englishToPersianNumber($price) , ' تومان ') ?>

                        </div>

                    </div>


                </div>

            <?php } ?>


        <?php } ?>

</div>
