
 var keno_logo = '<img src="/public/images/games/keno/keno_logo.svg" class="position-absolute keno_logo">';

 $('#blackjack').append(keno_logo);


 document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {
            var keno_logo = '<img src="/public/images/games/keno/keno_logo.svg" class="position-absolute keno_logo_cont">';

        $('#game-container').append(keno_logo);
        $('#game-container').css('overflow', 'hidden  scroll');

        $("#game-container").css("background-image", "url('/assets/img/games/blackjack/blackjack_background.png')")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top", "180px");
        
        $("#game-container").find(".game-keno-container").css({
            "width": "64%"
        })
        $('.keno_logo_cont').css('display','block');
        $('#game-container').find(".text-right").css('height','70px');

        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "50px"
        })
        $("#game-container").find(".img.position-absolute.keno_logo_cont").css("top","135px")
        $("#game-container").find(".text-center.text-glow.my-3").css("margin-top","-47px")

$('#card').css('margin-top','78px');
    } else {
        /*full screen*/
        $('#game-container').css('overflow-y','hidden');
        $("#game-container").find(".game-slots-container").css({
            "width": "100%"
        })
        $('#card').css('margin-top','81px');
        $('.keno_logo_cont').css('display','none');
        $("#game-container").css("background-image", "unset");
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
        $("#blackjack").find(".keno_logo").css("top","170px")
        $('#game-container').find("div.text-right").css('height','40px');
        $("#game-container").find(".text-center.text-glow.my-3").css("margin-top","-74px")
        
        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "0"
        })
    }
});
