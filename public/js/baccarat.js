
 let baccarat_logo = `<img src="/public/images/games/baccarat/baccarat_logo.svg" class="position-absolute baccarat_logo">`;

 $('#blackjack').append(baccarat_logo);

document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {
        
        let baccarat_logo = `<img src="/public/images/games/baccarat/baccarat_logo.svg" class="position-absolute baccarat_logo_cont">`;

        $('#game-container').append(baccarat_logo);
        $('#game-container').css('overflow', 'hidden  scroll');

        $("#game-container").css("background-image", "url('/public/images/games/slots/slots_blue_background.svg')")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top", "180px");
        
        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "100px"
        })
        $("#game-container").find(".text-center.text-glow.my-3").css("margin-top","80px");


    } else {
        $('#game-container').css('overflow-y','hidden');
        $("#game-container").find(".game-slots-container").css({
            "width": "100%"
        })
        $('.baccarat_logo_cont').css('display','none');
        $("#game-container").css("background-image", "unset");
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
        
        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "0"
        })
        $("#game-container").find(".text-center.text-glow.my-3").css("margin-top","50px");
    }
});
