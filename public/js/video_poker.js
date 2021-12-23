// let video_poker = `<img src="/public/images/games/video-poker/video_poker_logo.svg" class="position-absolute video_poker_logo">`;

//  $('#blackjack').append(video_poker);





 let ramka = `<img src="/public/images/games/video-poker/ramka.svg" class="position-absolute ramka">`;

 $('#blackjack').append(ramka);

 $(document).ready(function (){

     setTimeout(function () {
         $("body").find("#game-container").find(".text-center.text-glow.my-3").find("span").addClass("video_text")
     }, 2000);

     $("#game-container")
 })

document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {
        
        let baccarat_logo = `<img src="/public/images/games/video-poker/ramka.svg" class="position-absolute ramka_cont">`;

        $('#game-container').append(baccarat_logo);
        $('#game-container').css('overflow', 'hidden  scroll');
        $('#game-container').find("div.text-right").css('top', '0');

        $("#game-container").css("background-image", "url('/public/images/games/video-poker/background_ramka.svg')")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top", "180px");
        
        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "187px"
        })
        $('#cards .row.justify-content-md-center').css({
            'width': '100%!important',
            'margin': '0 auto',
            'margin-left':' 7px',
            'margin-top': '70px'
        })

    } else {

        $('#cards .row.justify-content-md-center').css({
            'width': '100%!important',
            'margin': '0 auto',
            'margin-left':' 0px',
            'margin-top': '0px'
        })
        $('#game-container').find("div.text-right").css('top', '0px');
        $('#game-container').find("div.text-right").css('padding-top', '10px');

        $('#game-container').css('overflow-y','hidden');
        $("#game-container").find(".game-slots-container").css({
            "width": "100%"
        })
        $('.ramka_cont').css('display','none');
        $("#game-container").css("background-image", "unset");
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
        
        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "0"
        })
    }


});
