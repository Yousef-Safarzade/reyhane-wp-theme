jQuery(document).ready(function($){


    handleFaqItemClick();

    setFirstFaqItemAsActive();


    handleServiceDetailTopBarClick();



});



function setFirstFaqItemAsActive(){

    if($(".reyhane-faq-container").length < 1){

        return false;

    }

    $(".reyhane-faq-item:first-child").addClass("active")

    $(".reyhane-faq-item:first-child .reyhane-faq-answer").slideDown(300);

}


function handleFaqItemClick(){

    if($(".reyhane-faq-container").length < 1){

        return false;

    }


    $(".reyhane-faq-title,.reyhane-faq-icon").on("click",function(){

        let $parent = $(this).parent();

        if( $parent.hasClass('active') ){

            return false;

        } else {


            $(".reyhane-faq-item").each(function (){

                $(this).removeClass('active');

                $(this).find('.reyhane-faq-answer').stop(true, true).slideUp(300)

            })

            $parent.addClass("active");

            $parent.find('.reyhane-faq-answer').stop(true, true).slideDown(300)

        }



    });


}



function handleServiceDetailTopBarClick(){

    if( $(".reyhane-service-top-bar").length < 1 ){

        return false;

    }

    $(".reyhane-service-detail-top-bar-list-item a").on("click",function(e){

        e.preventDefault();

        if( $(this).hasClass("active") ){

            return false;

        }

        $(".reyhane-service-detail-top-bar-list-item a").each(function(){

            $(this).removeClass("active");

        });

        $(this).addClass("active");

        const id = $(this).attr("href");

        if ( $(id).length < 1 ){

            return false;

        }


        $('html, body').animate({

            scrollTop: $(id).offset().top - 40

        }, 500);

    });


}