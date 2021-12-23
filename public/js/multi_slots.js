var imgs = '<img src="/assets/img/games/roulette/roulette_circle.svg" class="position-absolute rectangle"><img src="/assets/img/games/roulette/roulette_oval.svg" class="position-absolute roulette_oval"><img src="/assets/img/games/roulette/box_shadow.svg" class="position-absolute box_shadow">';


var img_logo= '<img src="/assets/img/crypto_slots/crypto_slot_logo.svg" class="position-absolute crypto_slots_logo">';
$("#game-container").append(imgs);
$('#content').append(img_logo);


document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {
        var baccarat_logo = '<img src="/assets/img/crypto_slots/crypto_slot_logo.svg" class="position-absolute crypto_slots_logo_cont">';

        $('#game-container').append(baccarat_logo);


        $("#game-container").css("background-image", "url('/assets/img/games/blackjack/blackjack_background.png')")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","180px");
        $('.game-slots-container').css('width','52%');
        $('.game-slots-container').css('margin','0 auto');
        $('.roulette_oval').css({
            'z-index': '9999999',
            'top': '14.7%',
            'left': '23.5%'
        });

        $("#game-container").find('.box_shadow').css({
            'left': '24%',
            'top': '23%',
            "z-index" : '0'
        })


        $('.rectangle').css({
            'left': '26%',
            'z-index': '99999999',
            'width': '12.5%',
            'height': '12.5%',
        });

        $('#game-container > div:nth-child(7)').css({
            'margin-top':'10px',
            'margin-bottom':'15px',
        })
        $("#game-container").find('.box_shadow').css({
            'left': '24%',
            'top': '23%',
        })

        $("#game-container").find('div.text-center.text-glow.my-3').attr('id', 'custom_text');



    } else {
        $('.crypto_slots_logo_cont').css('display','none');

        $("#game-container").css("background-image", "unset")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
        $('.game-slots-container').css('width','100%');
        $('.game-slots-container').css('margin','16px auto');
        $('.roulette_oval').css({
            'z-index': '9999999',
            'top': '222px',
            'left': '15px'
        });

        $("#game-container").find('.box_shadow').css({
            'left': '1%',
            'top': '28%',
        })

        $('.rectangle').css({
            'left': '115px',
            'z-index': '99999999',
            'width': '12%'
        });

        $('#game-container > div:nth-child(7)').css({
            'margin-top':'100px',
            'margin-bottom':'15px',
        })

        $("#game-container").find('.box_shadow').css({
            'left': '0%',
            'top': '28%',
            "z-index" : '0'
        })

        $("#game-container").find('div.text-center.text-glow.my-3').removeAttr('id');



    }

    $("#game-container").find(".btn.btn-primary.btn-lg.btn-play.mt-1").click(function (){
        $("#game-container").find("div.bets").addClass("bet-ready");
    })

});


$("button").click(function (){
    // if($("#provably-fair-form").hasClass("show")){
    //     $(".roulette_oval").animate({top: '225px'});
    // }else{
    //     $(".roulette_oval").animate({top: '299px'});
    //
    // }

})
