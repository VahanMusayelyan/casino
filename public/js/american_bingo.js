
window.onload = function(){
    $("body").find("#game-container").find(".blackjack-container").find("#gbj_deck").find("img").css("transform", "translateX(-22px) translateY(-26px)")

    $("button.btn.btn-primary.btn-lg.btn-play.mt-1").click(function(){
        setTimeout(function(){
            $("body").find("#game-container").find(".blackjack-container").find("#gbj_deck").find("img").css("transform", "translateX(-22px) translateY(-26px)")
        }, 2600);
    })
}

document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {
        $("#game-container").css("background-image", "url('/assets/img/games/blackjack/blackjack_background.png')")
        $("#game-container").find("#card").css("width", "55%");
        $("#game-container").find("#card").css("margin", "100px auto");
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","180px");
        $("#game-container").find(".text-center.text-glow.my-3").attr('id',"new_text")
        $("#game-container").find(".text-center.text-glow.my-3").css('height',"100px")

    } else {
        $("#game-container").css("background-image", "unset")
        $("#game-container").find("#card").css("width", "inherit");
        $("#game-container").find("#card").css("margin", "160px auto 0 auto");
        $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
        $("#game-container").find(".text-center.text-glow.my-3").css('height',"0px")


    }
});

var imgs = '<div class="position-absolute grey_back"></div>' +
    '<img src="/assets/img/games/ball/75.svg" class="position-absolute ball_logo">' +
    '<img src="/assets/img/games/ball/oval.svg" class="position-absolute oval"> ' +
    '<img src="/assets/img/games/ball/path.svg" class="position-absolute path"> ' +
    '<img src="/assets/img/games/ball/rectangle.svg" class="position-absolute rectangle"> ' +
    '<img src="/assets/img/games/ball/back.svg" class="position-absolute back">';

$("#card").append(imgs);

var btn = $("#game-container").find(".form-row.justify-content-center.mt-3");
btn.addClass("btns");

$(".btns").removeClass("form-row");
var btns = $(".btns").find("div");
btns.addClass("btns_inps")
btns.removeClass("form-group");
btns.removeClass("text-center");
btns.removeClass("col-lg-3");
btns.removeClass("col-lg-2");































