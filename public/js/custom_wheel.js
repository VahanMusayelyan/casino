
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
      $("#game-container").css("background-image", "url('/assets/img/games/wheel/background.png')")
      $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","180px");
      $("#game-container").find(".text-center.text-glow.my-3").css("top","30px");
  } else {
      $("#game-container").css("background-image", "unset")
      $("#game-container").find("div.row.justify-content-center.mb-4").css("margin-top","0");
      $("#game-container").find(".text-center.text-glow.my-3").css("top","-138px");
  }
});

let svgOval = `<svg x="-1159" y="-1147" class="oval_big" width="2290" height="2290" viewBox="0 0 402 398" fill="none" xmlns="http://www.w3.org/2000/svg">
             <g filter="url(#filter0_d)">
             <circle cx="202.8" cy="198.9" r="189.8" stroke="url(#paint0_linear)" stroke-width="18.2"/>
             </g>
             <defs>
             <filter id="filter0_d" x="-0.100098" y="-2" width="405.8" height="405.8" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
             <feFlood flood-opacity="0" result="BackgroundImageFix"/>
             <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
             <feOffset dy="2"/>
             <feGaussianBlur stdDeviation="2"/>
             <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"/>
             <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
             <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
             </filter>
             <linearGradient id="paint0_linear" x1="3.8999" y1="0" x2="3.8999" y2="397.8" gradientUnits="userSpaceOnUse">
             <stop stop-color="#16213B"/>
             <stop offset="0.509027" stop-color="#466DA9"/>
             <stop offset="0.978568" stop-color="#112041"/>
             </linearGradient>
             </defs>
             </svg>`;




$(".col-lg-4.col-md-7.wheel").find("object").find(".circle-outer").eq(1).replaceWith(svgOval)

let wheel = $("#game-container").find("svg").find("g:first").find("g");
$("#game-container").find("object svg").find("g").eq(22).attr("transform","rotate(40.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(24).attr("transform","rotate(80.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(26).attr("transform","rotate(120.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(28).attr("transform","rotate(160.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(30).attr("transform","rotate(200.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(32).attr("transform","rotate(240.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(34).attr("transform","rotate(280.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(36).attr("transform","rotate(320.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(38).attr("transform","rotate(360.00) translate(-1080,0)")
$("#game-container").find("object svg").find("g").eq(40).attr("transform","rotate(400.00) translate(-1080,0)")

wheel.eq(0).find("path").attr({ "fill": "#E8504D"});
wheel.eq(1).find("path").attr({ "fill": "#959393"});
wheel.eq(2).find("path").attr({ "fill": "#586EDD"});
wheel.eq(3).find("path").attr({ "fill": "#EF9E15"});
wheel.eq(4).find("path").attr({ "fill": "#D21717"});
wheel.eq(5).find("path").attr({ "fill": "#198C0E"});
wheel.eq(6).find("path").attr({ "fill": "#A81A66"});
wheel.eq(7).find("path").attr({ "fill": "#D35429"});
wheel.eq(8).find("path").attr({ "fill": "#2AB46F"});


$("#game-container").find(".segment-pin").attr("r","36");

let pin = $("#game-container").find(".segment-pin");
pin.eq(0).attr({ "cx": "-464", "cy": "-796" });
pin.eq(1).attr({ "cx": "165", "cy": "-907" });
pin.eq(2).attr({ "cx": "705", "cy": "-595" });
pin.eq(3).attr({ "cx": "924", "cy": "-2" });
pin.eq(4).attr({ "cx": "705", "cy": "591" });
pin.eq(5).attr({ "cx": "155", "cy": "905" });
pin.eq(6).attr({ "cx": "-460", "cy": "798" });
pin.eq(7).attr({ "cx": "-870", "cy": "317" });
pin.eq(8).attr({ "cx": "-870", "cy": "-314" });


let images = `
<img class="wheel_star left_bottom" src="/assets/img/games/wheel/rull.svg">

`;
$(".row.justify-content-center.mb-4").append("<div class='position-absolute' style='width:100%; height:100%'>" + images + "</div>")



//
// $("#game-container").find(".custom-control-label").on('click', function () {
//     if($("#game-container").find("div.form-row.justify-content-center.mt-2").prev().css('display') == 'none')
//     {
//         $(".text-right").css("top","-22%");
//     }else{
//         $(".text-right").css("top","-33%");
//     }
// });

$("#game-container").find(".circle-inner").attr("r","100");
$("#game-container").find(".led-outer-light").attr("r","36");





















