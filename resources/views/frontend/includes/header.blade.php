@php
	$a = json_encode($locale->locales());
    $a = json_decode($a);

@endphp
<style>
	body > div.header__mobile > div:nth-child(2) > a:nth-child(2),
	body > div.header__mobile > div:nth-child(2) > a:nth-child(3){
		font-size: 14px!important;

	}
	body > div.header__mobile > div.menu.special-menu > a:nth-child(2) > div.yellow,
	body > div.header__mobile > div.menu.special-menu > a:nth-child(3) > div.yellow{
		text-align: right!important;
	}

	@media (max-width: 768px) {
		.yellow{
			text-align: right;
		}
	}

</style>
<header>
	<div class="header__upper">
		@guest
			<a href="{{route("frontend.bonuses.index")}}" class="light">
				<img src="{{asset("assets/img/icons/star.svg")}}" alt="">
				{{__("Get bonus")}}
			</a>
			<a href="{{route("affilate")}}" class="light">
				<img src="{{asset("assets/img/icons/star_second.svg")}}" alt="">
				{{__("Affiliate")}}
			</a>
			<a href="{{url("page/provably-fair")}}">{{__("Provably fair")}}</a>
			<a href="{{url("page/privacy-policy")}}">{{__("Policy")}}</a>
			<a href="{{url("terms-of-service")}}">{{__("Terms of service")}}</a>
		@endguest
		@auth
			<a class="light" style="cursor: pointer">
				<img src="{{asset("assets/img/icons/game.svg")}}" alt="">
				<span style="z-index: 9999">{{__("Games")}}</span>
				<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt="" class="arrow">
				<div class="dropdown">
					<object data="" type="">
						@installed('game-slots')
						<a class="dropdown-item" href="{{ route('games.slots.show') }}">{{ __('Slots') }}</a>
						@endinstalled
						@installed('game-multi-slots')
						@foreach(config('game-multi-slots.titles') as $index => $title)
							@if($title)
								<a class="dropdown-item"
								   href="{{ route('games.multi-slots.show', ['index' => config('game-multi-slots.slugs')[$index] ?? $index]) }}">{{ __($title) }}</a>
							@endif
						@endforeach
						@endinstalled
						@installed('game-lucky-wheel')
						@foreach(config('game-lucky-wheel.variations') as $index => $game)
							@if($game->title)
								<a class="dropdown-item"
								   href="{{ route('games.lucky-wheel.show', ['index' => $game->slug]) }}">{{ __($game->title) }}</a>
							@endif
						@endforeach
						@endinstalled
						@installed('game-dice')
						<a class="dropdown-item" href="{{ route('games.dice.show') }}">{{ __('Dice') }}</a>
						@endinstalled
						@installed('game-blackjack')
						<a class="dropdown-item" href="{{ route('games.blackjack.show') }}">{{ __('Blackjack') }}</a>
						@endinstalled
						@installed('game-baccarat')
						<a class="dropdown-item" href="{{ route('games.baccarat.show') }}">{{ __('Baccarat') }}</a>
						@endinstalled
						@installed('game-video-poker')
						<a class="dropdown-item" href="{{ route('games.video-poker.show') }}">{{ __('Video Poker') }}</a>
						@endinstalled
						@installed('game-american-roulette')
						<a class="dropdown-item" href="{{ route('games.american-roulette.show') }}">{{ __('American Roulette') }}</a>
						@endinstalled
						@installed('game-roulette')
						<a class="dropdown-item" href="{{ route('games.roulette.show') }}">{{ __('European Roulette') }}</a>
						@endinstalled
						@installed('game-american-bingo')
						<a class="dropdown-item" href="{{ route('games.american-bingo.show') }}">{{ __('75 Ball Bingo') }}</a>
						@endinstalled
						@installed('game-keno')
						<a class="dropdown-item" href="{{ route('games.keno.show') }}">{{ __('Keno') }}</a>
						@endinstalled
					</object>
				</div>
			</a>
			<a class="light" style="cursor: pointer">
				<img src="{{asset("assets/img/icons/history.svg")}}" alt="">
				<span style="z-index: 9999">{{__("History")}}</span>
				<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt="" class="arrow">
				<div class="dropdown my_games">
					<object data="" type="">
						<a href="{{ route('frontend.history.top-wins') }}">{{__("Top wins")}}</a>
						<a href="{{ route('frontend.history.my') }}">{{__("My games")}}</a>
					</object>
				</div>
			</a>
			<a href="{{route("frontend.raffle.index")}}" class="light">
				<img src="{{asset("assets/img/icons/raffle.svg")}}" alt="">
				{{__("Raffle")}}
			</a>
			<a href="{{route("frontend.leaderboard")}}" class="light">
				<img src="{{asset("assets/img/icons/leaderboard.svg")}}" alt="">
				{{__("Leaderboard")}}
			</a>
		@endauth

	</div>
	<style>
		@media  (min-width: 1025px) and (max-width: 1300px) {
			.header__content .logo{
				width: 130px;
			}
			.header__content .logo span{
				font-size: 20px;
			}

			header .header__content .language {
				margin-left: 15px;
				margin-right: 15px;
			}
		}
	</style>
	<div class="header__content">
		<img src="{{asset("assets/img/icons/hamburger.svg")}}" alt="" class="hamburger">
		<img src="{{asset("assets/img/icons/close.svg")}}" alt="" class="close">
		<div class="mr-2">
			<a href="/" class="logo">
				<img src="{{asset("assets/img/icons/yellowlogo.svg")}}" alt="">
				<span>Betscoins</span>
			</a>
			<button class="language">
				<div class="language__bar">
					@foreach ($a as $lang)
						@if($lang->flag == "us")
							<a href="/locale/en/remember">
								<img src="/assets/img/country/{{$lang->flag}}.svg" alt="">
								<span>{{strtoupper($lang->flag)}}</span>
							</a>
						@else
							<a href="/locale/{{$lang->flag}}/remember">
								<img src="/assets/img/country/{{$lang->flag}}.svg" alt="">
								<span>{{strtoupper($lang->flag)}}</span>
							</a>
						@endif

					@endforeach
				</div>
				<div>
					<img src="{{asset("assets/img/country/".json_decode(json_encode($locale->locale()))->flag.".svg")}}" alt="">
					<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt="" class="arrow">
				</div>
			</button>
			<div class="jackpot">
				<img src="{{asset("assets/img/jackpot.png")}}" alt="">
				<span class="first">{{__("Jackpot")}}</span>
				<span>

					<span class="amount">{{number_format($jackpot->value, 4, '.', '').substr(0,4)}}</span>
					<span class="btc">BTC</span>
				</span>
			</div>

		</div>
		<button class="language language__mobile">

			<div>
				<img src="{{asset("assets/img/country/".json_decode(json_encode($locale->locale()))->flag.".svg")}}" alt="">
				<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt="" class="arrow">
			</div>
			<div class="language__bar">
				@foreach ($a as $lang)
					<a href="/locale/{{$lang->flag}}/remember">
						<img src="/assets/img/country/{{$lang->flag}}.svg" alt="">
						<span>{{strtoupper($lang->flag)}}</span>
					</a>
				@endforeach
			</div>
		</button>
		@guest
			<div class="accdep">
				<a href="{{route('login')}}" class="account">{{__("Account")}}</a>
				<a href="/user/deposits/create" class="deposit">{{__("Deposit")}}</a>
			</div>
		@endguest
		@auth
			<div class="reg-menu">
				<div class="balance">
					<div>
						<span style="text-transform: capitalize">{{__("credits")}}:</span>
						<div class="balance_amount_val">{{$balance->balance}}</div>
					</div>
					<div>
						<span>{{__("Amount")}}:</span>
						<div>{{Cache::get( 'coin' )}} BTC</div>
					</div>
					<a href="/user/deposits/create" class="deposit">{{__("Deposit")}}</a>
				</div>
				<div class="account acc-dropdown">
					<a onclick="return false" id="usernamedrop" class="light usernamedrop">{{auth()->user()->name}}</a>
					<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt="" class="arrow">
					<div class="dropdown">
						<a href="/users/{{auth()->user()->id}}/show">{{__("Profile")}}</a>
						<a href="{{route("frontend.account.show")}}">{{__("Account")}}</a>
						<a href="{{route("frontend.bonuses.index")}}">{{__("Bonuses")}}</a>
						<a href="{{ url('/user/deposits/create') }}">{{__("Deposits")}}</a>
						<a class="text-center" href="/user/password">{{__("Change password")}}</a>
						<a href="/user/security">{{__("Security")}}</a>
						<a href="http://" onclick="document.getElementById('logout').submit();return false;">{{__("Log out")}}</a>
					</div>
				</div>
			</div>
	</div>
	@endauth

</header>


<div class="header__mobile">
	@auth
{{--		<div class="menu special-menu" style="padding:10px 16px">--}}
{{--			<a class="light" style="margin: 0;font-size:18px">--}}
{{--				<div style="color:white">--}}
{{--					{{auth()->user()->name}}--}}
{{--				</div>--}}
{{--				<div>{{__("to the bonus")}}</div>--}}
{{--			</a>--}}
{{--		</div>--}}
		<div class="menu special-menu" style="background-color: #1E1E1E">
			<a class="light">
				<div>
					<img src="{{asset("assets/img/icons/walletgreen.svg")}}" alt="">
					{{__("Amount")}}
				</div>
			</a>
			<a style="font-size: 16px;color:#707070;margin-top:-20px;margin-bottom:10px">
				<div>
					{{__("Real balance")}}
				</div>
				<div class="yellow text-right">{{Cache::get( 'coin' )}} BTC</div>
			</a>
			<a style="font-size: 16px;color:#707070">
				<div>

					{{__("Credits")}}
				</div>
				<div class="yellow balance_amount_mob" style="opacity: .5">{{$balance->balance}}</div>
			</a>

			<a href="/user/deposits/create" class="deposit">{{__("Deposit")}}</a>
		</div>
	@endauth
	<div class="menu">
		@guest
			<a href="{{route("frontend.bonuses.index")}}" class="light">
				<img src="{{asset("assets/img/icons/star.svg")}}" alt="">
				{{__("Get bonus")}}
			</a>
			<a href="/page/affiliate" class="light">
				<img src="{{asset("assets/img/icons/star_second.svg")}}" alt="">
				{{__("Affiliate")}}
			</a>
			<a href="{{("/page/provably-fair")}}">
				<img src="{{asset("assets/img/icons/star.svg")}}" alt="">
				{{__("Provably fair")}}
			</a>
			<a href="{{("/page/privacy-policy")}}">
				<img src="{{asset("assets/img/icons/star")}}.svg" alt="">
				{{__("Policy")}}
			</a>
		@endguest
		@auth
			<a style="cursor: pointer" class="light drop_down_menu">
				<img src="{{asset("assets/img/icons/game.svg")}}" alt="">
				{{__("Games")}}
				<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt="" class="arrow">
			</a>
			<div class="dropdown">
				<object data="" type="">
					<object data="" type="">
						@installed('game-slots')
						<a class="dropdown-item" href="{{ route('games.slots.show') }}">{{ __('Slots') }}</a>
						@endinstalled
						@installed('game-multi-slots')
						@foreach(config('game-multi-slots.titles') as $index => $title)
							@if($title)
								<a class="dropdown-item"
								   href="{{ route('games.multi-slots.show', ['index' => config('game-multi-slots.slugs')[$index] ?? $index]) }}">{{ __($title) }}</a>
							@endif
						@endforeach
						@endinstalled
						@installed('game-lucky-wheel')
						@foreach(config('game-lucky-wheel.variations') as $index => $game)
							@if($game->title)
								<a class="dropdown-item"
								   href="{{ route('games.lucky-wheel.show', ['index' => $game->slug]) }}">{{ __($game->title) }}</a>
							@endif
						@endforeach
						@endinstalled
						@installed('game-dice')
						<a class="dropdown-item" href="{{ route('games.dice.show') }}">{{ __('Dice') }}</a>
						@endinstalled
						@installed('game-blackjack')
						<a class="dropdown-item" href="{{ route('games.blackjack.show') }}">{{ __('Blackjack') }}</a>
						@endinstalled
						@installed('game-baccarat')
						<a class="dropdown-item" href="{{ route('games.baccarat.show') }}">{{ __('Baccarat') }}</a>
						@endinstalled
						@installed('game-video-poker')
						<a class="dropdown-item" href="{{ route('games.video-poker.show') }}">{{ __('Video Poker') }}</a>
						@endinstalled
						@installed('game-american-roulette')
						<a class="dropdown-item" href="{{ route('games.american-roulette.show') }}">{{ __('American Roulette') }}</a>
						@endinstalled
						@installed('game-roulette')
						<a class="dropdown-item" href="{{ route('games.roulette.show') }}">{{ __('European Roulette') }}</a>
						@endinstalled
						@installed('game-american-bingo')
						<a class="dropdown-item" href="{{ route('games.american-bingo.show') }}">{{ __('75 Ball Bingo') }}</a>
						@endinstalled
						@installed('game-keno')
						<a class="dropdown-item" href="{{ route('games.keno.show') }}">{{ __('Keno') }}</a>
						@endinstalled
					</object>
				</object>
			</div>
			<a style="cursor: pointer" class="light drop_down_menu">
				<img src="{{asset("assets/img/icons/history.svg")}}" alt="">
				{{__("History")}}
				<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt="" class="arrow">
			</a>
			<div class="dropdown">
				<object data="" type="">
					<a href="{{ route('frontend.history.top-wins') }}">{{__("Top wins")}}</a>
					<a href="{{ route('frontend.history.my') }}">{{__("My games")}}</a>
				</object>
			</div>
			<a href="{{route("frontend.raffle.index")}}" class="light">
				<img src="{{asset("assets/img/icons/raffle.svg")}}" alt="">
				{{__("Raffle")}}
			</a>
			<a href="{{route("frontend.leaderboard")}}" class="light">
				<img src="{{asset("assets/img/icons/leaderboard.svg")}}" alt="">
				{{__("Leaderboard")}}
			</a>
	</div>
	<div class="border"></div>
	<div class="menu">
		<a href="{{route('frontend.index')}}" class="light">
			<img src="{{asset("assets/img/icons/home.svg")}}" alt="">
			{{__("HOME PAGE")}}
		</a>
		<a href="/users/{{\Illuminate\Support\Facades\Auth::user()->id}}/show" class="light">
			<img src="{{asset("assets/img/icons/profile.svg")}}" alt="">
			{{__("PROFILE")}}
		</a>
		<a href="{{route("frontend.account.show")}}" class="light">
			<img src="{{asset("assets/img/icons/wallet.svg")}}" alt="">
			{{__("ACCOUNT")}}
		</a>
		<a href="/user/password" class="light">
			<img src="{{asset("assets/img/icons/security.svg")}}" alt="">
			{{__("CHANGE PASSWORD")}}
		</a>
	</div>
	<div class="border"></div>
	<div class="menu">
		<a href="/user/deposits/create" class="light">
			<img src="{{asset("assets/img/icons/deposit.svg")}}" alt="">
			{{__("DEPOSITS")}}
		</a>
		<a href="/user/withdrawals/create" class="light">
			<img src="{{asset("assets/img/icons/withdraw.svg")}}" alt="">
			{{__("WITHDRAW")}}
		</a>
		<a href="{{route("frontend.bonuses.index")}}" class="light">
			<img src="{{asset("assets/img/icons/bonus.svg")}}" alt="">
			{{__("BONUSES")}}
		</a>
	</div>
	<div class="border"></div>
	<div class="menu">
		<a href="/user/security" class="light">
			<img src="{{asset("assets/img/icons/security1.svg")}}" alt="">
			{{__("SECURITY")}}
		</a>
	</div>
	<div class="menu" style="background: #1E1E1E">
		<form method="post" id='logout' action="{{ route('logout') }}">
			@csrf
			<a class="light" style="cursor: pointer" onclick="document.getElementById('logout').submit()">
				<img src="{{asset("assets/img/icons/logout.svg")}}" alt="">
				{{__("LOG OUT")}}
			</a>
		</form>
	</div>
	@endauth
	@guest
		<a class="account" href="{{route('login')}}" style="color: white">{{__("Account")}}</a>
	@endguest
		<script>
			$(document).ready(function (){
				$(".drop_down_menu").click(function (){
					$(this).next().toggle(300)
				})
			})

		</script>
</div>
</div>