$(document).ready(function () {


    // setInterval( jackpot,  10000);

    $("form.registration").submit(function() {

        let response = grecaptcha.getResponse();
        if(!response){
            $(".g-recaptcha").css("border","5px solid #ffbe00");
            $(".g-recaptcha").css("border-radius","7px");
            return false;
        }

    });

    $("form.reg_form").submit(function() {

        let response = grecaptcha.getResponse();
        if(!response){
            $(".g-recaptcha").css("border","5px solid #ffbe00");
            $(".g-recaptcha").css("border-radius","7px");
            return false;
        }

    });

})

// function jackpot(){
//     let _token = $('meta[name="csrf-token"]').attr("content");
//     let jackpot = $(".language").next().find(".amount").text();
//     $.ajax({
//         url: "/jackpot",
//         type: "POST",
//         data: {_token: _token, jackpot: jackpot},
//         success: function (response) {
//             if (response) {
//                 $(".amount").text(Number(response));
//             } else {
//             }
//         },
//     });
// }

