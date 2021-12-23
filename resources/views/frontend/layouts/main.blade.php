<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('frontend.includes.head')
</head>
<body class="{{ str_replace('.','-',Route::currentRouteName()) }} theme-{{ config('settings.theme') }}">
    @includeWhen(config('settings.gtm_container_id'), 'frontend.includes.gtm-body')

    <div id="app">

        <div class="container-fluid bg-primary">
            @includeFirst(['frontend.includes.header-udf','frontend.includes.header'])
        </div>

        <div class="container" id="blackjack">

            <div class="mt-2">
                @message
                @endmessage
            </div>

            <div id="content" class="bg-secondary mt-3 custom_blackjack">
{{--                @if(Request::path() === "games/lucky-wheel/0")--}}
{{--                <img src="/assets/img/games/wheel/background.png" alt="back" class="wheel_back">--}}
{{--                @endif--}}
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <div class="logo_block d-inline-block">
                                @if(Request::path() === "games/blackjack")
                                <img src="{{asset("/assets/img/games/blackjack/logo.png")}}" alt="blackjack_logo">
                                @elseif((Request::segment(2) === "lucky-wheel"))
                                        <img src="{{asset("/assets/img/games/wheel/logo.png")}}" alt="blackjack_logo">
                                @endif
                            </div>
                            <div class="actions_block d-inline-block">
                            @yield('title_extra')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>

        @includeFirst(['frontend.includes.footer-udf', 'frontend.includes.footer'])

    </div>

    @include('frontend.includes.scripts')
    <script>
        $(".hamburger").on("click", function () {
            $(this).hide(), $(".close").show(), $(".content").addClass("no-overflow"), $(".main__wrapper").addClass("no-overflow"), $(".header__mobile").show()
        }), $(".close").on("click", function () {
            $(this).hide(), $(".hamburger").show(), $(".content").removeClass("no-overflow"), $(".main__wrapper").removeClass("no-overflow"), $(".header__mobile").hide()
        }), $(".anchordropdown").on("click", function (e) {
            e.preventDefault(), $(this).next().toggle(300)
        }), $(".payment-navbar button").click(function () {
            $("button").removeClass("btn-active-green"), $(this).addClass("btn-active-green")
        }), $(".payment-deposit button").click(function () {
            $("button").removeClass("deposit-btn-active-white"), $(this).addClass("deposit-btn-active-white")
        }), $(document).ready(function () {
            $(".amount_negative_number_check").each(function () {
                console.log($(this).text()), Math.sign(Number($(this).text())) < 0 ? $(this).css("color", "#FF2929") : $(this).css("color", "#6BA939")
            })
        });
    </script>
</body>
</html>