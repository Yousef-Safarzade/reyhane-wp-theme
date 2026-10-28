jQuery(document).ready(function($){


    handleEditUserDataFormSubmit();






})



function handleEditUserDataFormSubmit(){



    if( $(".reyhane-edit-user-data-form").length < 1){

        return false;

    }

    $(".reyhane-edit-user-data-form").on("submit",function(e){

        e.preventDefault();

        const validated = validateEditUserDataFormSubmit();

        if ( false  ){

            alert('لطفا مقادیر وارد شده برای فیلد های مشحص شده را بررسی بفرمایید');

        }


        const formData = new FormData(this);

        formData.append('action', 'update_user_data');

        $.ajax({
            url: localizedData.ajaxurl, // WordPress AJAX URL
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            beforeSend:function(){

                $(".reyhane-edit-user-data-form").addClass('doing-ajax');

            },
            success: function (response) {


                $(".reyhane-edit-user-data-form").removeClass('doing-ajax');

                if( response.success ){

                    $.toast({
                        heading: 'پیام سیستم',
                        text: '<p>اطلاعات کاربر با موفقیت به روز رسانی شد</p>',
                        showHideTransition: 'fade',
                        icon: 'success',
                        hideAfter: 5000,
                        position : 'bottom-right',
                        loaderBg: '#5CC3E5'
                    })


                } else {

                    $.toast({
                        heading: 'پیام سیستم',
                        text: '<p>' + response.data + '</p>',
                        showHideTransition: 'fade',
                        icon: 'error',
                        hideAfter: 5000,
                        position : 'bottom-right',
                        loaderBg: '#5CC3E5'
                    })

                }



            },
            error: function (xhr) {

                $(".reyhane-edit-user-data-form").removeClass('doing-ajax');

                $.toast({
                    heading: 'Error',
                    text: xhr.responseJSON.data,
                    showHideTransition: 'slide',
                    icon: 'info'
                })

            }
        });


    });


}



function validateEditUserDataFormSubmit(){

    if( $(".reyhane-edit-user-data-form").length < 1){

        return false;

    }

    let valid = true;


    if( $("#userFullName").val() == '' ){

        $("#userFullName").addClass('has-error');

        valid = false;

    } else {

        $("#userFullName").removeClass('has-error');

    }




    if( $("#userPhoneNumber").val() == '' ){

        $("#userPhoneNumber").addClass('has-error');

        valid = false;


    } else {

        $("#userPhoneNumber").removeClass('has-error');


    }




    if( $("#userMeliCode").val() == '' ){

        $("#userMeliCode").addClass('has-error');

        valid = false;

    } else {

        if( $("#userMeliCode").val().length != 10 ){

            $("#userMeliCode").addClass('has-error');

            valid = false;

        } else {

            $("#userMeliCode").removeClass('has-error');

        }


    }



    return valid;




}