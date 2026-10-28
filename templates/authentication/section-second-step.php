<div class="reyhane-authentication-form-section hidden-section" id="second">

    <div class="top-section">

        <img class="top-icon" src="<?php echo \Reyhane\config::$imgUrl . '/authentication-page-second-section-icon.png' ?>" >

        <p class="main-title">

            کد تایید را وارد کنید

        </p>


        <p class="sub-title">

            کد ارسال شده به شماره <span class="user-entered-phone-number">09399518190</span> را وارد کنید

        </p>


        <p class="change-phone-number-cta">

             تغییر شماره تلفن

        </p>

    </div>



    <div class="content-section">

        <div class="reyhane-otp-input-container">

            <input type="text" class="otp-input-item" id="otp1" name="otp1" maxlength="1" inputmode="numeric" pattern="[0-9]">

            <input type="text" class="otp-input-item" id="otp2" name="otp2" maxlength="1" inputmode="numeric" pattern="[0-9]">

            <input type="text" class="otp-input-item" id="otp3" name="otp3" maxlength="1" inputmode="numeric" pattern="[0-9]">

            <input type="text" class="otp-input-item" id="otp4" name="otp4" maxlength="1" inputmode="numeric" pattern="[0-9]">

            <input type="text" class="otp-input-item" id="otp5" name="otp5" maxlength="1" inputmode="numeric" pattern="[0-9]">

        </div>

        <div class="reyhane-otp-timer-container">

            <span class="reyhane-otp-timer"></span>

            <span class="reyhane-otp-timer-text">

                مانده تا دریافت مجدد کد

            </span>

        </div>



        <div class="reyhane-resend-otp-button">

            <span class="resend-otp-button-icon">

                <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/resend-otp-icon.svg"); ?>

            </span>

            <span class="resend-otp-button-text">

                ارسال مجدد

            </span>

        </div>




        <button class="reyhane-authentication-submit-button reyhane-authentication-submit-otp">

            <span class="button-title">

                بررسی کد ورود

            </span>

        </button>

    </div>

</div>