<footer>
    <div class="left">
        <a>
            <img src="{{asset("assets/img/icons/logo.svg")}}" alt="">
            <span class="logoname">Betscoins</span>
        </a>
        <a href="{{ url('page/provably-fair') }}">
            <img src="{{asset("assets/img/icons/shield.svg")}}" alt="">
            <span>{{__("Provably fair")}}</span>
        </a>
    </div>
    <div class="right">
        <a href="{{ url('page/affiliate') }}">{{__("Affiliate")}}</a>
        <a href="{{ url('page/provably-fair') }}">{{__("Provably fair")}}</a>
        <a href="{{ url('page/privacy-policy') }}">{{__("Privacy policy")}}</a>
        <a href="{{ url('terms-of-service') }}">{{__("Terms of service")}}</a>
    </div>
    <span style="text-align: center;color:white !important;margin-top:10px;width:100%;">{{__("This website is operated by Betomall LTD Malta, registration number C48099 registered at Business Box, 115A,Floor 5, Valley Road, Birkirkara, BKR 9024, MALTA")}}</span>
</footer>

<script src="{{asset("js/script.js")}}"></script>
<script>
    $(document).ready(function() {
        $(".acc-dropdown").on("click", function () {
            $(".acc-dropdown .dropdown").toggleClass("flex")
        })
    });
</script>
@if(Request::segment(1) == "games")
<script>

    $(document).ready(function(){
        setTimeout(function (){
            setInterval(
                function () {
                    let x = $(document).find("#blackjack").find(".invalid-feedback");
                    if(x.length > 0){
                        let val = x.prev().val();
                        $(".balance_amount_val").text(val);
                        $(".balance_amount_mob").text(val);
                    }
                },1000);
        },1000);
        $(".acc-dropdown").on("click", function () {
                $(".acc-dropdown .dropdown").toggleClass("flex")
        })
    });

</script>
@endif

