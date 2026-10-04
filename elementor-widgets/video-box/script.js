jQuery(document).ready(function(){

    handleVideoBoxPlayButotnClick();

});


function handleVideoBoxPlayButotnClick(){

    if( $(".reyhane-video-box-container").length < 1 ){

        return false;

    }


    $(".reyhane-video-box-container").on("click",function(){

        let $parent = $(this);

        let $video = $parent.find('video')[0];

        if ( $parent.hasClass('playing') ){

            $parent.removeClass('playing');

            $video.pause();

        } else {

            $parent.addClass('playing');

            $video.play();

        }


    });


}