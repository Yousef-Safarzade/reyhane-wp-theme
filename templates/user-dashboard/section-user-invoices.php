<?php

$invoices = \Reyhane\BooklyHelper::get_user_invoices();

$first_item = true;

$extra_class = empty( $invoices ) ? ' no-invoice ' : ' ';

$status_labels = \Reyhane\BooklyHelper::get_invoices_status_labels();

?>

<div class="reyhane-user-invoices-container <?php echo $extra_class; ?>">

    <?php if( empty( $invoices ) ) { ?>

        <p class="reyhane-no-invoice-found-message"> هیچ تراکنشی برای شما ثبت نشده است </p>

    <?php } else { ?>

        <?php foreach( $invoices as $invoice ) { ?>

            <div class="reyhane-user-invoice-item <?php echo !$first_item ? 'hide-column-title' : '' ?>">

                <div class="invoice-data-column">

                    <div class="column-title">وضعیت تراکنش</div>

                    <div class="column-value <?php echo $invoice['status']  === 'completed' || $invoice['type'] ==='free' ? 'success' : 'error' ?>">

                        <span>  <?php echo $invoice['type'] ==='free' ? 'پرداخت شده' : $status_labels[ $invoice['status'] ] ?> </span>

                    </div>

                </div>

                <div class="invoice-data-column">

                    <div class="column-title">مبلغ</div>

                    <div class="column-value">

                        <?php

                            if ( $invoice['type'] === 'free' ){

                                printf ('رایگان') ;

                            } else {

                                printf ('%s %s' , \Reyhane\helper::englishToPersianNumber( $invoice['total'] ) , 'تومان  ') ;

                            }

                        ?>

                    </div>

                </div>

                <div class="invoice-data-column">

                    <div class="column-title">تاریخ</div>

                    <div class="column-value">

                        <?php echo   \Reyhane\helper::englishToPersianNumber( \Reyhane\helper::convert_date_to_shamsi( $invoice['created_at'] ) ); ?>

                    </div>

                </div>

            </div>

            <?php $first_item = false; ?>

        <?php } ?>

    <?php } ?>

</div>