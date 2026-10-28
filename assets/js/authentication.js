jQuery(document).ready(function(){


    handleSendVerifyOtpCodeButtonClickEvent();

    handleOtpInputChangeEvent();

    handleSubmitPhoneNumberButtonClickEvent();

    handlePhoneNumberInputChangeEvent();

    handleResendOtpCodeButtonClickEvent();
    
    handleChangePhoneNumberCtaClickEvent();



});


function sendGenerateOtpCodeRequest(phoneNumber){

    return $.ajax({
        url: authLocalized.ajaxurl, // WordPress AJAX URL
        type: 'POST',
        data: {
            'action' : 'generate_otp_code',
            'phoneNumber' : phoneNumber
        }
    });

}




function sendVerifyOtpCodeRequest(otpCode){

    return $.ajax({
        url: authLocalized.ajaxurl, // WordPress AJAX URL
        type: 'POST',
        data: {
            'action' : 'verify_user_otp_code',
            'otpCode' : otpCode,
            'phoneNumber' : localStorage.getItem('phoneNumber')
        }
    });

}




function handlePhoneNumberInputChangeEvent(){

    if($(".reyhane-authentication-input-phone-number").length < 1){

        return false;

    }

    $(".reyhane-authentication-input-phone-number").on("input",function(e){

        this.value = this.value.replace(/\D/g, '').slice(0, 11);

    })


}







function showSecondAuthenticationStep(){

    $('#first').fadeOut(300, function () {

        $('#second').fadeIn(300);

    });


}





function showFirstAuthenticationStep(){

    $('#second').fadeOut(300, function () {

        $('#first').fadeIn(300);

    });


}








function handleSubmitPhoneNumberButtonClickEvent(){

    if($(".reyhane-authentication-submit-phone-number").length < 1){

        return false;

    }

    $(".reyhane-authentication-submit-phone-number").on("click",function(){

        const phoneNumber = $(".reyhane-authentication-input-phone-number").val();

        if( phoneNumber.length != 11 ){

            $.toast({
                heading: 'پیام سیستم',
                text: '<p>لطفا شماره خود را به درستی وارد نمایید</p>',
                showHideTransition: 'fade',
                icon: 'error',
                hideAfter: 5000,
                position : 'bottom-right',
                loaderBg: '#5CC3E5'
            })

            return false;

        }

        let submitButton = $(this);

        submitButton.addClass('doing-ajax');

        const sendGenerateOtpCodeRequestResult = sendGenerateOtpCodeRequest(phoneNumber);

        sendGenerateOtpCodeRequestResult.done(function(response){

            submitButton.removeClass('doing-ajax');

            if( response.success ){

                $.toast({
                    heading: 'پیام سیستم',
                    text: '<p>' + response.message + '</p>',
                    showHideTransition: 'fade',
                    icon: 'success',
                    hideAfter: 3000,
                    position : 'bottom-right',
                    loaderBg: '#5CC3E5'
                })

                localStorage.setItem('phoneNumber',phoneNumber);

                $(".user-entered-phone-number").html(phoneNumber);

                if( typeof (response.expires_at) && response.expires_at != ''){

                    localStorage.setItem('otp_expiry',response.expires_at);

                }

                startOtpTimer();

                showSecondAuthenticationStep();

            } else {

                $.toast({
                    heading: 'پیام سیستم',
                    text: '<p>' + response.message + '</p>',
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 5000,
                    position : 'bottom-right',
                    loaderBg: '#5CC3E5'
                })

            }

        });


        sendGenerateOtpCodeRequestResult.fail(function(response){

            submitButton.removeClass('doing-ajax');

            $.toast({
                heading: 'پیام سیستم',
                text: '<p>' + response.responseJSON.message + '</p>',
                showHideTransition: 'fade',
                icon: 'error',
                hideAfter: 5000,
                position : 'bottom-right',
                loaderBg: '#5CC3E5'
            })

        });


    });

}




function reyhaneGatherOtpCodeFromInput(){

    return $('.otp-input-item').map(function () {
        return this.value;
    }).get().join('');

}








function handleSendVerifyOtpCodeButtonClickEvent(){

    if($(".reyhane-authentication-submit-otp").length < 1){

        return false;

    }


    $(".reyhane-authentication-submit-otp").on("click",function(){

        const otpCode = reyhaneGatherOtpCodeFromInput();

        const submitButton = $(this);

        if( otpCode.length < 5 ){

            return false;

        }

        const sendVerifyOtpCodeRequestResult = sendVerifyOtpCodeRequest(otpCode);

        sendVerifyOtpCodeRequestResult.done(function(response){

            submitButton.removeClass('doing-ajax');

            if ( response.success ){

                $.toast({
                    heading: 'پیام سیستم',
                    text: '<p>' + response.message + '</p>',
                    showHideTransition: 'fade',
                    icon: 'success',
                    hideAfter: 3000,
                    position : 'bottom-right',
                    loaderBg: '#5CC3E5'
                })

                setTimeout(function (){

                    if( response.action == 'register' ){

                        window.location.href = authLocalized.websiteURL + "/user-dashboard";


                    } else {

                        window.location.href = authLocalized.websiteURL;

                    }

                },3000)


            }else {

                $.toast({
                    heading: 'پیام سیستم',
                    text: '<p>' + response.message + '</p>',
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 3000,
                    position : 'bottom-right',
                    loaderBg: '#5CC3E5'
                })
            }

        });

        sendVerifyOtpCodeRequestResult.fail(function(response){

            submitButton.removeClass('doing-ajax');

            $.toast({
                heading: 'پیام سیستم',
                text: '<p>' + response.message + '</p>',
                showHideTransition: 'fade',
                icon: 'error',
                hideAfter: 3000,
                position : 'bottom-right',
                loaderBg: '#5CC3E5'
            })

        });

    });




}


function handleOtpInputChangeEvent(){

    if( $(".otp-input-item").length < 1 ){

        return false;
    }

    $('.otp-input-item').on('input', function () {

        this.value = this.value.slice(0, 1);

        if (this.value.length === 1) {

            $(this).nextAll('.otp-input-item').first().focus();

        }

    });



    $('.otp-input-item').on('paste', function (e) {

        e.preventDefault();

        const pastedText = e.originalEvent.clipboardData
            .getData('text')
            .replace(/\D/g, '')
            .slice(0, 5);

        const inputs = $('.otp-input-item');

        inputs.each(function (index) {
            this.value = pastedText[index] || '';
        });

        inputs.eq(Math.min(pastedText.length, inputs.length - 1)).focus();

    });


    $('.otp-input-item').on('focus,click', function () {

        this.select();

    });

}







function resetOtpTimer(){

    localStorage.setItem('otp_expiry',0);

}







function startOtpTimer() {

    let expiry = localStorage.getItem('otp_expiry');

    $(".reyhane-resend-otp-button").addClass('disabled');

    if (!expiry || expiry == 0) {

        expiry = ( Date.now() / 1000 ) + 60;

        localStorage.setItem('otp_expiry', expiry);

    }

    updateOtpTimer();

}




function updateOtpTimer() {

    const expiry = parseInt(localStorage.getItem('otp_expiry'), 10);

    const nowTimestamp = Math.floor(Date.now() / 1000);

    const seconds = Math.max(0, expiry - nowTimestamp);

    $('.reyhane-otp-timer').text(seconds + ' ثانیه ');

    if (seconds > 0) {

        setTimeout(updateOtpTimer, 250);

    } else {

        localStorage.removeItem('otp_expiry');

        $('.otp-timer').text('0');

        showOtpResend();

    }

}



function showOtpResend(){

    $(".reyhane-resend-otp-button").css('display','flex').removeClass('disabled');

    $('.reyhane-otp-timer-container').css('display' , 'none');

}



function showOtpTimer(){

    $(".reyhane-resend-otp-button").css('display','none').addClass('disabled');

    $('.reyhane-otp-timer-container').css('display' , 'flex');


}


function handleResendOtpCodeButtonClickEvent(){


    if( $(".reyhane-resend-otp-button").length < 1 ){

        return false;

    }

    $(".reyhane-resend-otp-button").on('click',function (){

        const sendGenerateOtpCodeRequestResult = sendGenerateOtpCodeRequest( localStorage.getItem('phoneNumber') );

        sendGenerateOtpCodeRequestResult.done(function(response){

            if(response.success){

                $.toast({
                    heading: 'پیام سیستم',
                    text: '<p>' + response.message + '</p>',
                    showHideTransition: 'fade',
                    icon: 'success',
                    hideAfter: 3000,
                    position : 'bottom-right',
                    loaderBg: '#5CC3E5'
                })

                resetOtpTimer();

                startOtpTimer();

                showOtpTimer();


            } else {

                $.toast({
                    heading: 'پیام سیستم',
                    text: '<p>' + response.message + '</p>',
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 3000,
                    position : 'bottom-right',
                    loaderBg: '#5CC3E5'
                })

            }

        });

    });

}





function handleChangePhoneNumberCtaClickEvent(){

    if($(".change-phone-number-cta").length < 1 ){

        return false;

    }


    $(".change-phone-number-cta").on("click",function(){

        showFirstAuthenticationStep();

        $(".reyhane-authentication-input-phone-number").val('').trigger("click");


    });



}