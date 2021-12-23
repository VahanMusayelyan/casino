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
                $("#game-container").find(".text-right").css("top", "2%");

          } else {
                $("#game-container").css("background-image", "unset")
                $("#game-container").find(".text-right").css("top", "-16%");
          }
        });


