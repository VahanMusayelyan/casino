<script type="text/javascript" src="{{ asset('js/variables.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/locale.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@stack('scripts')
@if(Request::path() === "games/blackjack")
    <script type="text/javascript" src="{{ asset('js/custom_blackjack.js') }}"></script>
@endif

@if(Request::segment(2) === "lucky-wheel")
    <script type="text/javascript" src="{{ asset('js/custom_wheel.js') }}"></script>
@endif
@if(Request::path() === "games/american-bingo")
    <script type="text/javascript" src="{{ asset('js/american_bingo.js') }}"></script>
@endif
@if(Request::path() === "games/american-roulette")
    <script type="text/javascript" src="{{ asset('js/american_roulette.js') }}"></script>
@endif
@if(Request::path() === "games/slots")
    <script type="text/javascript" src="{{ asset('js/slots.js') }}"></script>
@endif

@if(Request::path() === "games/keno")
    <script type="text/javascript" src="{{ asset('js/keno.js') }}"></script>
@endif

@if(Request::path() === "games/baccarat")
    <script type="text/javascript" src="{{ asset('js/baccarat.js') }}"></script>
@endif
@if(Request::path() === "games/video-poker")
    <script type="text/javascript" src="{{ asset('js/video_poker.js') }}"></script>
@endif
@if(Request::path() === "games/dice")
    <script type="text/javascript" src="{{ asset('js/dice.js') }}"></script>
@endif
@if(Request::segment(2) === "multi-slots")
    <script type="text/javascript" src="{{ asset('js/multi_slots.js') }}"></script>
@endif