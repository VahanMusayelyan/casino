
let dice_logo = `<img src="/images/games/dice/dice_logo.svg" class="position-absolute dice_logo">`;

$('#blackjack').append(dice_logo);

document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {

        let dice_logo = `<img src="/images/games/dice/dice_logo.svg" class="position-absolute dice_logo_cont">`;

        $('#game-container').append(dice_logo);
        $('#game-container').css('overflow', 'hidden  scroll');

        $("#game-container").css("background-image", "url('/images/games/dice/dice_background.svg')")
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top", "180px");

        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "100px"
        })

    } else {
        $('#game-container').css('overflow-y','hidden');
        $("#game-container").find(".game-slots-container").css({
            "width": "100%"
        })
        $('.dice_logo_cont').css('display','none');
        $("#game-container").css("background-image", "unset");
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");

        $("#game-container").find("div.form-row.justify-content-center").eq(0).css({
            "padding-top": "0"
        })
    }


});

$("#game-container").find(".form-row.mt-4").find(".custom-range").css({

});
