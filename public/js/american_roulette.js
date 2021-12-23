let imgs = `<img src="/assets/img/games/roulette/box_shadow.svg" class="position-absolute box_shadow">`;
let img_logo= `<img src="/assets/img/games/roulette/roulette_logo.svg" class="position-absolute roulette_logo">`;
$(".game-american-roulette-container").append(imgs);
$('#game-container').append(img_logo);


document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {
        $("#game-container").css("background-image", "url('/assets/img/games/blackjack/blackjack_background.png')")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","180px");
        $('.game-american-roulette-container').css('width','1100');
        $('.game-american-roulette-container').css('margin','0 auto');



        $("#game-container").find('.box_shadow').css({
            'left': '60px',
            'top': '80px',
            "z-index" : '-1'
        })

            
        $('#game-container > div:nth-child(7)').css({
            'margin-top':'10px',
            'margin-bottom':'15px',
        })


    } else {
        $("#game-container").css("background-image", "unset")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
        $('.game-american-roulette-container').css('width','100%');
        $('.game-american-roulette-container').css('margin','30px auto 40px auto');



        $('#game-container > div:nth-child(7)').css({
            'margin-top':'25px',
            'margin-bottom':'40px',
        })

        $("#game-container").find('.box_shadow').css({
            'left': '52px',
            'top': '78px',
            "z-index" : '-1'
        })

        
    }

    $("#game-container").find(".btn.btn-primary.btn-lg.btn-play.mt-1").click(function (){
        $("#game-container").find("div.bets").addClass("bet-ready");
    })

});

