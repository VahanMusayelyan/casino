

 var slots_logo = '<img src="/public/images/games/slots/slots_logo.png" class="position-absolute slots_logo">';

$('#blackjack').append(''+slots_logo+'');
if(window.screen.width > 768){
    var slots_middle = '<img src="/public/images/games/slots/slots_background.svg" class="position-absolute slots_background"><img src="/public/images/games/slots/middl_back.svg" class="position-absolute slots_middle">';

}else{
    var slots_middle = '<img src="/public/images/games/slots/slots_background_mob.svg" class="position-absolute slots_background"><img src="/public/images/games/slots/middl_back.svg" class="position-absolute slots_middle">';
}
$("#blackjack").append(slots_middle);


document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {

    var slots_middle = '<img src="/public/images/games/slots/slots_background.svg" class="position-absolute slots_background_cont"><img src="/public/images/games/slots/middl_back.svg" class="position-absolute slots_middle_cont">';

        $("#game-container").append(slots_middle);

    // var slots_logo = '<img src="/public/images/games/slots/slots_logo.png" class="position-absolute slots_logo_cont">';
    //
    //     $('#game-container').append(slots_logo);
        $('#game-container').css('overflow', 'hidden  scroll');

        $("#game-container").css("background-image", "url('/public/images/games/slots/slots_blue_background.svg')")
        $(".game-slots-container").css("height", "unset")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top", "180px");
        $("#game-container").find(".slots_background_cont").css({
            "width": "69%",
            "height" : "82%",
            "top" : "7%"

        })
        $("#game-container").find(".game-slots-container").css({
            "width": "64%"
        })
        $("#game-container").find(".slots_middle_cont").css({
            "width": "calc(60% - 140px - 16px)",
            "top"  : "330px"
        })
        $("#game-container").find(".separators").css({
            "z-index": "10"
        })
        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "100px"
        })

    } else {
        $(".game-slots-container").css("height", "440px")
        $('#game-container').css('overflow-y','hidden');
        $("#game-container").find(".game-slots-container").css({
            "width": "100%"
        })
        $('.slots_logo_cont').css('display','none');
        $('.slots_middle_cont').css('display','none');
        $('.slots_background_cont').css('display','none');
        $("#game-container").css("background-image", "unset");
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
        $("#game-container").find(".slots_background_cont").css({
            "width": "57%",
            "height" : "80%",
            "top" : "18%"

        })
        $("#game-container").find(".slots_middle_cont").css({
            "width": "calc(60% - 210px - 16px);"
        })
        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "0"
        })
    }
});
