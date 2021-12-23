@extends('frontend.layouts.home')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{asset("css/index.css")}}">
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/dataTables.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@if(auth()->user())
	<style>
		.auth_balance{
			width:80%;
			background-color: #252424;
			margin: 10px auto;
			padding: 5px 8px;
			border: none;
		}
		.auth_deposit{
			padding-left: 10px!important;
			padding-right: 10px!important;
		}

		.auth_amount{
			width: 85%;
		}
		.auth_amount > p{
			font-family: Montserrat;
			font-style: normal;
			font-weight: 600;
			font-size: 12px;
			color: #707070;
			margin-bottom: 0;
		}
		.auth_amount .yellow{
			font-family: Montserrat;
			font-style: normal;
			font-weight: bold;
			font-size: 12px;
			line-height: 15px;
			letter-spacing: -0.0965349px;
			text-transform: uppercase;
			color: #FFBC00;
		}
		.luckygames a span{
			text-transform: uppercase;
		}
	</style>
<div class="depwith auth_balance">
	<div class="auth_amount"><p>{{__("CREDITS")}}:</p> <span class="yellow">{{$balance->balance}}</span></div>
	<a href="/user/deposits/create" class="deposit auth_deposit">{{__("Deposit")}}</a>
</div>
@else
	<div class="depwith">
		<a href="/user/deposits/create" class="deposit">{{__("Deposit")}}</a>
		<a class="with">{{__("Withdraw")}}</a>
	</div>
	@endif
<style>
	.leaderboard_games, .leaderboard_period {
		display: none;
	}

	.period_select {
		display: none;
	}

	#leaderboard_paginate {
		display: none !important;
	}

	.pagination li, .pagination li a, .pagination li a span, .pagination span {
		background-color: #141414 !important;
	}

	.pagination li.active span {
		color: #FFFFFF;
		background-color: #538c31 !important;

	}

	.page-item.disabled .page-link {
		border: 1px solid #538c31 !important;
		color: #FFFFFF;
		font-weight: bold;
	}

	.page-link, .page-item.active .page-link {
		border: 1px solid #538c31;
		color: #FFFFFF;
		font-weight: bold;
	}

	body > div.content > div.d-flex.justify-content-center {
		margin-top: 26px;
	}

	input[type=number]::-webkit-outer-spin-button,
	input[type=number]::-webkit-inner-spin-button {
		-webkit-appearance: none !important;
		background-color: #2a2929 !important;
		background: #2a2929 !important;
	}

	#roll {
		margin-bottom: 50px;
		padding-top: 25px;
		width: 100%;
	}

	#roll div {

		background-color: #2a2929 !important;
		border: 1px solid #141414;
		height: 105px;
		font-size: 28px !important;
		padding-top: 10%;
		width: 70px;
		padding-left: 7.5%;
		margin-right: 10px;
	}

	.dice__game {
		width: 57%;
	}

	#chance, #payout {
		width: 80px;
	}

	#amount {
		width: 80px;
	}

	.dice__game--selections input {
		height: 45px;
	}

	.dice__game button:focus, .buttons button:focus {
		outline: none;
		border: none;
		height: 45px;
	}

	div.dice__game button:active {
		background-color: #141414 !important;
	}

	.buttons button:active {
		background-color: #336b12 !important;
	}

	div.dice {
		display: block;
		height: 447px;
		padding: 80px 45px !important;
	}

	#roll div {
		background-color: #2a2929 !important;
		border: 1px solid #141414;
		height: 105px;
		font-size: 28px !important;
		padding-top: 3.5%;
		width: 77px;
		padding-left: 3.5%;
		margin-right: 10px;
	}

	#roll {
		margin-bottom: 25px;
	}

	div.dice__game {
		width: 100%;
		display: block;
		padding-left: 68px;
	}

	.dice .buttons {
		position: absolute;
		right: 36%;
		bottom: 6%;
		display: -webkit-box;
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
	}

	.bet_amount_label, .select_line_label {
		width: 48.5%;
		display: inline-block;
	}

	.dice__game--selections {
		width: 100%;
		display: inline-block;
	}

	#amount, #step_min, #step_minus, #step_plus, #step_max,
	#chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
		margin-right: 1px;
	}

	body > div.main__wrapper > div.dice > div.dice__game > div:nth-child(3) > button:nth-child(6) {
		margin-right: 50px;
	}

	.select_line_label {
		padding-right: 70px;
	}

	.dice__wrapper {
		margin-bottom: 25px;
	}

	.mobile_select, .pasyOut_text {
		display: none;
	}

	.first_slecetion, .second_slecetion {
		display: inline-block;
	}

	@media (max-width: 1000px) {
		.dice__game--selections {
			width: 100%;
			display: flex;
		}

		#amount, #step_min, #step_minus, #step_plus, #step_max, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			margin-right: 5px;
		}

		div.dice__game {
			padding-left: 50px;
		}
	}

	@media (max-width: 920px) {
		div.dice {
			display: block;
			height: 580px;
			padding: 80px 45px !important;
		}

		div.dice__game {
			padding-left: 40px;
		}
	}

	@media (max-width: 912px) {
		.dice__game--selections {
			display: block;

		}

		.select_line_label {
			display: none;
		}

		.mobile_select {
			margin-top: 10px;
			margin-bottom: 10px;
			display: block;
			padding-right: 0px;
		}

		#amount, #step_min, #step_minus, #step_plus, #step_max, div.dice__game--selections > button:nth-child(6) {
			width: 118px !important;
		}

		.bet_amount_label, .mobile_select {
			width: 100%;
			display: inline-block;
			text-align: center;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {

			width: 100px;
		}

		.first_slecetion {
			display: block !important;
			width: 82%;
			margin: 15px auto;
		}

		.dice__game span {
			display: block;
			font-size: 14px;
			top: -34px;
		}

		#roll div {
			padding-top: 3.5%;
			padding-left: 3.5%;
		}

		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 12%;
		}

		.first_slecetion, .second_slecetion {
			display: block !important;
			width: 100%;
			margin: 15px auto;
		}
	}


	@media (max-width: 855px) {
		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 12%;
		}

		.first_slecetion {
			display: block !important;
			width: 100%;
			margin: 15px auto;
		}

		#amount, #step_min, #step_minus, #step_plus, #step_max, div.dice__game--selections > button:nth-child(6) {
			width: 18.5% !important
		}

		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 12%;
		}

		.first_slecetion, .second_slecetion {
			display: block !important;
			width: 100%;
			margin: 15px auto;
		}

	}

	@media (max-width: 830px) {
		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 12%;
		}

		.first_slecetion, .second_slecetion {
			display: block !important;
			width: 100%;
			margin: 15px auto;
		}

	}

	@media (max-width: 769px) {
		.dice__game--selections {
			display: block;

		}

		.select_line_label {
			display: none;
		}

		.mobile_select {
			margin-top: 10px;
			margin-bottom: 10px;
			display: block;
			padding-right: 0px;
		}

		#amount, #step_min, #step_minus, #step_plus, #step_max, div.dice__game--selections > button:nth-child(6) {
			width: 18.5% !important
		}

		.bet_amount_label, .mobile_select {
			width: 100%;
			display: inline-block;
			text-align: center;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 12% !important
		}

		.dice .buttons {
			position: absolute;
			right: 33%;
			bottom: 4%;
			display: flex;
		}

		body > div.main__wrapper > div.dice > div.dice__game > div.dice__game--selections > div.second_slecetion > div.position-relative.d-inline-block {
			width: 13%;
		}

		#payout {
			width: 100% !important
		}

		#roll div {
			padding-top: 4.5%;
			padding-left: 4.5%;
		}

		.dice .winning {
			font-size: 28px;
		}

		.first_slecetion {
			padding-left: 15px;
		}

		.dropdown-item {
			padding-top: 4px;
			padding-right: 4px;
			padding-bottom: 4px;
			padding-left: 4px;
		}

		.mobile__leaderboard div .no-flex .dropdown {
			padding: 0 14px 0 0;
		}
	}

	@media (max-width: 695px) {
		#amount, #step_min, #step_minus, #step_plus, #step_max, div.dice__game--selections > button:nth-child(6) {
			width: 17.5% !important
		}

		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 12% !important
		}

		body > div.main__wrapper > div.dice > div.dice__game > div.dice__game--selections > div.second_slecetion > div.position-relative.d-inline-block {
			width: 13%;
		}

		#payout {
			width: 100% !important
		}

		.dice .buttons {
			position: absolute;
			right: 26%;
			bottom: 4%;
			display: flex;
		}
		.biggestwin__mobile .rank{
			font-size: 18px!important;
		}
		.biggestwin__mobile .yellow{
			font-size: 22px!important;
		}
	}

	@media (max-width: 541px) {
		#amount, #step_min, #step_minus, #step_plus, #step_max, div.dice__game--selections > button:nth-child(6) {
			width: 17.5% !important
		}

		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 12% !important
		}

		body > div.main__wrapper > div.dice > div.dice__game > div.dice__game--selections > div.second_slecetion > div.position-relative.d-inline-block {
			width: 13%;
		}

		#payout {
			width: 100% !important
		}

		.dice .buttons {
			position: absolute;
			right: 21%;
			bottom: 4%;
			display: flex;
		}

		#roll div {
			padding-top: 6.5%;
			padding-left: 5.5%;
		}

		div.dice__game {
			padding-left: 0;
		}
	}

	@media (max-width: 500px) {
		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 11% !important
		}

		#payout {
			width: 100% !important
		}

		.dice .buttons {
			position: absolute;
			right: 21%;
			bottom: 4%;
			display: flex;
		}

		#roll div {
			padding-top: 6.5%;
			padding-left: 7.5%;
		}

		div.dice__game {
			padding-left: 0;
		}

		.dice .buttons {
			position: absolute;
			right: 24%;
			bottom: 4%;
			display: flex;
		}
	}

	@media (max-width: 480px) {
		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 11% !important
		}

		#payout {
			width: 100% !important
		}

		#chance, .payoutBlock {
			width: 15% !important;
			height: 45px;
		}

		.dice .buttons {
			position: absolute;
			right: 0%;
			bottom: 4%;
			display: flex;
		}

		#roll div {
			padding-top: 6.5%;
			padding-left: 5.5%;
		}

		div.dice__game {
			padding-left: 0;
		}

		.dice .winning {
			font-size: 26px;
		}

		div.dice {
			display: block;
			height: 580px;
			padding: 80px 10px !important;
		}

		#amount, #step_min, #step_minus, #step_plus, #step_max, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			margin-right: 0;
			box-shadow: none !important;
			outline: none !important;
		}

		.first_slecetion input, .first_slecetion button {
			height: 45px;
		}

		#amount, #chance, .payoutBlock {
			width: 15% !important;
			height: 45px;
			border: none !important;
			border-radius: 0;
		}
		#amount{
			height:46px;
		}
		body > div.main__wrapper > div.dice > div.dice__game > div.dice__game--selections > div.second_slecetion > button:nth-child(2){
			margin-right:0!important;
			margin-left:10px!important;
		}

		.dice__game--selections input {
			margin-right: 10px;
			margin-bottom: 10px;
		}

		#chance{
			height:40px;
		}

		.dice .buttons {
			position: absolute;
			right: 1%;
			bottom: 4%;
			display: flex;
		}
	}

	@media (max-width: 425px) {
		#amount, #step_min, #step_minus, #step_plus, #step_max, div.dice__game--selections > button:nth-child(6) {
			width: 16.5% !important;
			font-size: 11px;
		}

		.dice__game--selections button, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			width: 11% !important;
			font-size: 11px;
		}

		#roll div {
			padding-top: 8.5%;
			padding-left: 5.5%;
		}

		#payout {
			width: 100% !important
		}

		.dice__game--selections input {
			height: 45px;
		}

		div.dice {
			display: block;
			height: 580px;
			padding: 80px 10px !important;
		}

		.dice .winning {
			font-size: 24px;
		}

		.buttons button {
			font-size: 16px !important;
		}

		#amount, #step_min, #step_minus, #step_plus, #step_max, #chance, #chance_min, #chance_minus, #chance_plus, #chance_max, #payout {
			margin-right: 0;
			box-shadow: none !important;
			outline: none !important;
		}
		#amount, #chance, .payoutBlock {
			width: 15% !important;
			height: 45px;
			border: none !important;
			border-radius: 0;
		}
		#chance{
			height:41px;
			padding:0;
		}
		#amount{
			height:46px;
		}
		.view_last{
			font-size: 12px;
		}
	}

	@media (max-width: 320px) {
		div.dice {
			display: block;
			height: 580px;
			padding: 80px 9px !important;
		}

		.dice .winning {
			font-size: 22px;
		}
		.view_last{
			font-size: 12px;
		}
	}
</style>
<div class="main__wrapper">
	<div class="owl-carousel owl-theme" id="banner">
		<div class="item" style="background-image: url({{asset('assets/img/Slider1.png')}})">
			<div class="item__info">
				<div>
					<span class="free_trial">{{__("Free trial")}}</span>
					<span>{{__("Sign up and get")}}</span>
				</div>
				<div>
					<span class="credits">
						{{__("1000 free credits")}}
					</span>
					<div class="box" style="text-align: center">
						{{__("to play and try our casino")}}
					</div>
				</div>
				<div>
					<a href="{{route("login")}}" class="viewmore">
						{{__("View more")}}
					</a>
				</div>
			</div>
			@include('frontend.includes.wins')
		</div>
		<div class="item" style="background-image: url(assets/img/Slider3.png);">
			<div class="item__info">
				<div>
					<span>{{__("Crypto deposits")}}</span>
				</div>
				<div>
					<span class="credits">
						{{__("Get 5% back")}}
					</span>
					<div class="box">
						{{__("when you deposit more than 5000 credits at once.")}}
					</div>
				</div>
				<div>
					<a href="/user/deposits/create" class="viewmore">
						{{__("View more")}}
					</a>
				</div>
			</div>
			@include('frontend.includes.wins')
		</div>
		<div class="item" style="background-image: url(assets/img/Slider2.png);">
			<div class="item__info">
				<div>
					<span>{{__("Referral program")}}</span>
				</div>
				<div>
					<span class="credits">
						{{__("Get Bonuses")}}
					</span>
					<div class="box" style="width: 350px">
						{{__("Refer other people to our casino and get bonuses when they sign up, play games or make deposits.")}}
					</div>
				</div>
				<div>
					<a href="{{route("frontend.bonuses.index")}}" class="viewmore">
						{{__("View more")}}
					</a>
				</div>
			</div>
			@include('frontend.includes.wins')
		</div>
	</div>
	<div class="jackpot">
		<img src="{{asset("assets/img/jackpot.png")}}" alt="">
		<span class="first">{{__("Jackpot")}}</span>
		<span>
			<span class="amount">{{number_format($jackpot->value, 4, '.', '').substr(0,4)}} </span>
					<span class="btc"> BTC</span>
		</span>
	</div>

	<div class="probabilitytext">
		<div class="firstline">{{__("Free")}} {{__("Game")}}. {{__("Check probability theory by yourself")}}! <span class="yellow">{{__("And win")}}!</span></div>
		<div class="secondline">{{__("What number will be, how you think")}}?</div>
	</div>
	<div class="border"></div>
	<div class="biggestwin__mobile">
		<span class="rank">{{__("Biggest win")}}</span>
		<div class="yellow">{{__("Win now")}}</div>
		@if($biggestWin)
		<span class="btc yellow">{{$biggestWin->gameable->result}}</span>
			@endif
	</div>
	<div class="owl-carousel owl-theme" id="wins__mobile">
		@foreach ($games as $game)
			<div class="item">
				<div class="wins">
					<img src="assets/img/slot.png" alt="">
					<img class="winner" src="assets/img/winner.png" alt="">
					<div>
						<span class="gamename">{{$game->title}}</span>
						<span class="username">{{substr($game->account->user->name , 0, 2)}}***{{substr($game->account->user->name , -1)}}</span>
						<span class="win">Win {{ $game->gameable->result }}</span>
					</div>
				</div>
			</div>

		@endforeach

	</div>
	<div class="dice">
		<span class="winning">{{__("Please fill all fields")}}</span>
		<div class="dice__wrapper">
			<div id="roll" class="row justify-content-center">
				<div class="bg-primary rounded"><span
							class="text-white rounded" id="output0">{{rand(0, 9)}}</span></div>
				<div class="bg-primary rounded"><span
							class="text-white rounded" id="output1">{{rand(0,9)}}</span></div>
				<div class="bg-primary rounded"><span
							class="text-white rounded" id="output2">{{rand(0,9)}}</span></div>
				<div class="bg-primary rounded"><span
							class="text-white rounded" id="output3">{{rand(0,9)}}</span></div>
			</div>
			{{--			<img src="assets/img/games/dice.png" alt="">--}}
			<input type="range" name="" id="range" value="5000" min="100" max="9800">
		</div>
		<div class="dice__game">
			<div class="bet_amount_label" >{{__("Bet amount")}}</div>
			<div class="select_line_label">{{__("Select lines")}} <span class="float-right">{{__("Payout")}}</span></div>
			<div class="dice__game--selections">
				<div class="first_slecetion ">
					<input type="number" min="1" max="50" name="" value="1" id="amount">
					<button id="step_min">min</button>
					<button id="step_minus">-1</button>
					<button id="step_plus">+1</button>
					<button id="step_max">max</button>

				</div>
				<div class="second_slecetion  ">
					<div class="select_line_label mobile_select">{{__("Select lines")}}</div>
					<button>%</button>
					<input type="number" min="1" max="98" name="" value="50.00" id="chance">
					<button id="chance_min">min</button>
					<button id="chance_minus">-1</button>
					<button id="chance_plus">+1</button>
					<button id="chance_max">max</button>

					<div class="position-relative d-inline-block"><span class="position-absolute pasyOut_text">{{__("Payout")}}</span><input
								type="text" value="1.98" id="payout" disabled></div>
				</div>
			</div>


		</div>
		<div class="buttons">
			<button class="pl_btn low">{{__("Low")}}: 5000</button>
			<button class="pl_btn high">{{__("High")}}: 4999</button>
		</div>
	</div>
</div>


<div class="content">
	@if($top_game)
	<div class="biggestwin-ad" style="background-image: url('assets/img/slots.png');">
		<div class="leftwrapper">
			<img src="assets/img/icons/biggestWin.svg" alt="">
			<div>
				<span class="big">
					{{__("Biggest win")}}
				</span>
				<span class="event">
					{{ __($top_game->title) }}, {{ $top_game->created_at->diffForHumans() }}
				</span>
			</div>
		</div>
		<div class="centerwrapper">
			<div class="username">
				<span>{{substr($top_game->account->user->name , 0, 2)}}***{{substr($top_game->account->user->name , -1)}}</span>
				<img src="assets/img/icons/man-user.svg" alt="">
			</div>
			<div class="win">{{__("Won")}}: &#10;&#13; {{$top_game->_win}} {{__("credits")}}</div>
		</div>
		<a href="{{route('frontend.leaderboard')}}">{{__("View leaderboard")}}</a>
	</div>
	@endif
	<span class="lucky"><span class="yellow">{{__("Top")}} 10</span> {{__("lucky games")}}</span>
	<div class="luckygames">
		<a href="{{ route('games.slots.show') }}" class="luckygames__card">
			<span>{{__("Slots")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/1.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/slots.png')}}" alt="" loading="lazy">
		</a>
		<a href="{{ route('games.american-roulette.show') }}" class="luckygames__card">
			<span>{{__("American Roulette")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/2.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/americanroulette.png')}}" alt="">
		</a>
		<a href="{{ route('games.blackjack.show') }}" class="luckygames__card">
			<span>{{__("Blackjack")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/3.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/blackjack.png')}}" alt="">
		</a>
		<a href="{{ route('games.video-poker.show') }}" class="luckygames__card">
			<span>{{__("Video poker")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/4.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/videopoker.png')}}" alt="">
		</a>
		<a href="{{ route('games.dice.show') }}" class="luckygames__card">
			<span>{{__("Dice")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/5.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/dicee.png')}}" alt="">
		</a>
		<a href="{{ route('games.multi-slots.show',['index' => '0']) }}" class="luckygames__card">
			<span>{{__("Crypto Slots")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/6.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/cripto.png')}}" alt="">
		</a>
		<a href="{{ route('games.lucky-wheel.show',['index' => '0']) }}" class="luckygames__card">
			<span>{{__("Lucky Wheel")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/7.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/wheel.png')}}" alt="">
		</a>
		<a href="{{ route('games.baccarat.show') }}" class="luckygames__card">
			<span>{{__("Baccarat")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/8.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/baccarat.png')}}" alt="">
		</a>
		<a href="{{ route('games.american-bingo.show') }}" class="luckygames__card">
			<span>{{__("75 Ball Bingo")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/9.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/75.png')}}" alt="">
		</a>
		<a href="{{ route('games.keno.show') }}" class="luckygames__card">
			<span>{{__("Keno")}}</span>
			<img class="luckygames__card--number" data-src="{{asset('assets/img/icons/10.svg')}}" alt="">
			<img data-src="{{asset('assets/img/games/keno.png')}}" alt="">
		</a>
	</div>
	<div class="fairraffle">
		<div class="raffle" style="background-image: url('/assets/img/raffle.png')">
			<img data-src="{{asset("assets/img/icons/rafflebig.svg")}}" alt="" class="raffle__logo">
			<h2>{{__("Raffle")}}</h2>
			@if(!$raffle)
				<div class="mb-5" role="">
					{{ __('There are no raffles yet.') }}
				</div>
			@else
				@if($raffle->is_completed)
					<p>{{__("The draw is completed")}}</p>
					<span>
						@if($raffle->next_start_date->gt(\Illuminate\Support\Carbon::now()))
							{{ __('Next raffle will start in :time', ['time' => $raffle->next_start_date->diffForHumans()]) }}
						@else
							{{ __('Next raffle should start soon') }}
						@endif
					</span>
					<h3>
							@if($raffle->winner())
								{{substr( $raffle->winner->name, 0, 2)}}***{{substr( $raffle->winner->name, -1)}}
							@else
								There are no purchased tickets
							@endif
					</h3>
					<span class="win">{{ __('won :x credits', ['x' => $raffle->_win_amount]) }}</span>
				@endif
				<div class="participants">
					<div class="participants__wrapper" style="position: relative">
						<span>{{__("Participants")}}:</span>
						<div class="vertical"></div>
						<div class="participants__info">
							@if($participants->count())
								@foreach ($participants as $participant)
									<p>
										@if($raffle->is_completed && $raffle->winner() && $raffle->winner->id == $participant->user->id)

												<img data-src="{{asset("assets/img/icons/raffle big.svg")}}" alt="">

										@endif
									{{substr($participant->user->name , 0, 2)}}***{{substr($participant->user->name , -1)}}
									</p>
								@endforeach
							@else
								<p> There is no participants yet</p>
							@endif
						</div>
					</div>
				</div>
			@endif
			<a href="{{route("frontend.raffle.index")}}" class="view_last">{{__("View past raffles")}}</a>

		</div>
		<div class="fair">
			<img data-src="{{asset("assets/img/icons/shield.svg")}}" alt="">
			<h2>{{__("Provably fair")}}</h2>
			<span>{{__("Our casino uses provably fair technology, which allows you to verify that each roll or card draw is completely random and you are not being cheated!")}}</span>
		</div>
	</div>
	<table id="leaderboard">
		<caption>
			{{__("Leaderboard")}}
			<div class="center">
				<div class="no-flex">
					@php
					if(Request::has('game')){
					$game = __(Request::get('game'));
					}
					else{
					$game = __('All Games');
					}
					if(Request::has('period')){
					$period = __(Request::get('period'));
					}
					else{
					$period = __('All Time');
					}
					@endphp
					<button>{{$game}} <img src="{{asset("assets/img/icons/Dropdowngreen.svg")}}" alt=""></button>
					<div class="dropdown leaderboard_games">
						@if (Request::has('game'))
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => NULL, 'index' => NULL])) }}">{{ __('All Games') }}</a>
						<div class="dropdown-divider"></div>
						@endif

						@installed('game-slots')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Slots'])) }}">
							{{ __('Slots') }}
						</a>
						@endinstalled
						@installed('game-multi-slots')
						@foreach(config('game-multi-slots.titles') as $index => $title)
						@if($title)
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'MultiSlots', 'index' => $index])) }}">
							{{ __($title) }}
						</a>
						@endif
						@endforeach
						@endinstalled
						@installed('game-lucky-wheel')
						@foreach(config('game-lucky-wheel.variations') as $index => $game)
						@if($game->title)
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'LuckyWheel', 'index' => $index])) }}">
							{{ __($game->title) }}
						</a>
						@endif
						@endforeach
						@endinstalled
						@installed('game-dice')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Dice'])) }}">
							{{ __('Dice') }}
						</a>
						@endinstalled
						@installed('game-blackjack')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Blackjack'])) }}">
							{{ __('Blackjack') }}
						</a>
						@endinstalled
						@installed('game-baccarat')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Baccarat'])) }}">
							{{ __('Baccarat') }}
						</a>
						@endinstalled
						@installed('game-video-poker')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'VideoPoker'])) }}">
							{{ __('Video Poker') }}
						</a>
						@endinstalled
						@installed('game-american-roulette')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'AmericanRoulette'])) }}">
							{{ __('American Roulette') }}
						</a>
						@endinstalled
						@installed('game-roulette')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Roulette'])) }}">
							{{ __('European Roulette') }}
						</a>
						@endinstalled
						@installed('game-american-bingo')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'AmericanBingo'])) }}">
							{{ __('75 Ball Bingo') }}
						</a>
						@endinstalled
						@installed('game-keno')
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Keno'])) }}">
							{{ __('Keno') }}
						</a>
						@endinstalled
					</div>
				</div>
				<div class="no-flex period_select">
					<button>{{$period}}<img src="{{asset("assets/img/icons/Dropdowngreen.svg")}}" alt=""></button>
					<div class="dropdown leaderboard_period">
						@if (Request::has('period'))
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => NULL])) }}">{{ __('All Time') }}</a>
						<div class="dropdown-divider"></div>
						@endif
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'CurrentWeek'])) }}">{{ __('Current week') }}</a>
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'CurrentMonth'])) }}">{{ __('Current month') }}</a>
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'PreviousMonth'])) }}">{{ __('Previous month') }}</a>
						<a class="dropdown-item"
							href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'CurrentYear'])) }}">{{ __('Current year') }}</a>
					</div>
				</div>
			</div>
		</caption>
		<thead>
			<tr>
				<th>{{__("Rank")}}</th>
				<th style="text-align: left">{{__("Name")}}</th>
				<th>{{__("Games played")}}</th>
				<th>{{__("Max win")}}</th>
				<th class="esim">{{__("Total win")}} <img src="{{asset("assets/img/icons/bottom.svg")}}" alt=""></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $i=> $user)
			<tr>
				<td class="rank">{{ ++$i + 10 * (max(1, intval(request()->query('page'))) - 1) }}</td>
				<td class="name">{{substr($user->name , 0, 2)}}***{{substr($user->name , -1)}}</td>
				<td>{{ $user->_total_games }}</td>
				<td>{{ $user->_max_win }}</td>
				<td>{{ $user->_total_win }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mobile__leaderboard">
		<h3>{{__("Leaderboard")}} </h3>
		<div class="center">
			<div class="no-flex">
				@php
				if(Request::has('game')){
				$game = __(Request::get('game'));
				}
				else{
				$game = __('All Games');
				}
				if(Request::has('period')){
				$period = __(Request::get('period'));
				}
				else{
				$period = __('All Time');
				}
				@endphp
				<button>{{__($game)}}<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt=""></button>
				<div class="dropdown">
					@if (Request::has('game'))
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => NULL, 'index' => NULL])) }}">{{ __('All Games') }}</a>
					<div class="dropdown-divider"></div>
					@endif

					@installed('game-slots')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Slots'])) }}">
						{{ __('Slots') }}
					</a>
					@endinstalled
					@installed('game-multi-slots')
					@foreach(config('game-multi-slots.titles') as $index => $title)
					@if($title)
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'MultiSlots', 'index' => $index])) }}">
						{{ __($title) }}
					</a>
					@endif
					@endforeach
					@endinstalled
					@installed('game-lucky-wheel')
					@foreach(config('game-lucky-wheel.variations') as $index => $game)
					@if($game->title)
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'LuckyWheel', 'index' => $index])) }}">
						{{ __($game->title) }}
					</a>
					@endif
					@endforeach
					@endinstalled
					@installed('game-dice')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Dice'])) }}">
						{{ __('Dice') }}
					</a>
					@endinstalled
					@installed('game-blackjack')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Blackjack'])) }}">
						{{ __('Blackjack') }}
					</a>
					@endinstalled
					@installed('game-baccarat')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Baccarat'])) }}">
						{{ __('Baccarat') }}
					</a>
					@endinstalled
					@installed('game-video-poker')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'VideoPoker'])) }}">
						{{ __('Video Poker') }}
					</a>
					@endinstalled
					@installed('game-american-roulette')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'AmericanRoulette'])) }}">
						{{ __('American Roulette') }}
					</a>
					@endinstalled
					@installed('game-roulette')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Roulette'])) }}">
						{{ __('European Roulette') }}
					</a>
					@endinstalled
					@installed('game-american-bingo')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'AmericanBingo'])) }}">
						{{ __('75 Ball Bingo') }}
					</a>
					@endinstalled
					@installed('game-keno')
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['game' => 'Keno'])) }}">
						{{ __('Keno') }}
					</a>
					@endinstalled
				</div>
			</div>
			<div class="no-flex">
				<button>{{$period}}<img src="{{asset("assets/img/icons/dropdown.svg")}}" alt=""></button>
				<div class="dropdown">
					@if (Request::has('period'))
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => NULL])) }}">{{ __('All Time') }}</a>
					<div class="dropdown-divider"></div>
					@endif
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'CurrentWeek'])) }}">{{ __('Current week') }}</a>
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'CurrentMonth'])) }}">{{ __('Current month') }}</a>
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'PreviousMonth'])) }}">{{ __('Previous month') }}</a>
					<a class="dropdown-item"
						href="{{ route('frontend.leaderboard', array_merge(request()->query(), ['period' => 'CurrentYear'])) }}">{{ __('Current year') }}</a>
				</div>
			</div>
		</div>

	</div>

	<div class="owl-carousel owl-theme" id="leaderboard__mobile">
		@foreach ($users as $i=> $user)
			<div class="item">
			<div>
				<span>{{__("Rank")}}</span>
				<span>{{ ++$i + 10 * (max(1, intval(request()->query('page'))) - 1) }}</span>
			</div>
			<div>
				<span>{{__("Name")}}</span>
				<span class="yellow">{{substr($user->name , 0, 2)}}***{{substr($user->name , -1)}}</span>
			</div>
			<div>
				<span>{{__("Games played")}}</span>
				<span>{{ $user->_total_games }}</span>
			</div>
			<div>
				<span>{{__("Max win")}}</span>
				<span>{{ $user->_max_win }}</span>
			</div>
			<div>
				<span>{{__("Total win")}}</span>
				<span>{{ $user->_total_win }}</span>
			</div>
			</div>
		@endforeach
		</div>
		<div class="d-flex justify-content-center">
			{{ $users->links() }}
		</div>
	</div>
</div>

<script>
	$("#range").css("background","linear-gradient(to right, rgb(124, 151, 34) 50%, rgb(20, 20, 20) 50%)")

	$("#chance").blur(function (){

		let valChance = $(this).val();
		let payout;
		let low;
		let high;

		if(valChance >= 1 && valChance <= 98){
			     payout = 99 / valChance;
				 low = valChance * 100;
				 high = 9999 - low;

			$("#payout").val(payout.toFixed(2))
			$(".low").text("{{__("Low")}}: "+ low );
			$(".high").text("{{__("High")}}: "+ high );
			$("#range").val(low);
			$("#range").css("background","linear-gradient(to right, rgb(124, 151, 34) "+valChance+"%, rgb(20, 20, 20) "+valChance+"%)")
		}else if(valChance < 1){
			$(this).val(1);
		}else if(valChance > 98){
			$(this).val(98);
		}

	})

	$("#step_min").click(function (){
		$("#amount").val(1);
	})
	$("#step_max").click(function (){
		$("#amount").val(50);
	})
	$("#step_minus").click(function (){
		let amount = $("#amount").val();
		if(amount > 1){
			$("#amount").val(--amount);
		}
	})
	$("#step_plus").click(function (){
		let amount = $("#amount").val();
		if(amount < 50){
			$("#amount").val(++amount);
		}
	})


	$("#chance_min").click(function (){
		$("#chance").val(1);
		let valChance = $("#chance").val();
		let payout;
		let low;
		let high;

		if(valChance >= 1 && valChance <= 98) {
			payout = 99 / valChance;
			low = valChance * 100;
			high = 9999 - low;

			$("#payout").val(payout.toFixed(2))
			$(".low").text("{{__("Low")}}: " + low);
			$(".high").text("{{__("High")}}: " + high);
			$("#range").val(low);
			$("#range").css("background", "linear-gradient(to right, rgb(124, 151, 34) " + valChance + "%, rgb(20, 20, 20) " + valChance + "%)")
		}
	})
	$("#chance_max").click(function (){
		$("#chance").val(98);
		let valChance = $("#chance").val();
		let payout;
		let low;
		let high;

		if(valChance >= 1 && valChance <= 98) {
			payout = 99 / valChance;
			low = valChance * 100;
			high = 9999 - low;

			$("#payout").val(payout.toFixed(2))
			$(".low").text("{{__("Low")}}: " + low);
			$(".high").text("{{__("High")}}: " + high);
			$("#range").val(low);
			$("#range").css("background", "linear-gradient(to right, rgb(124, 151, 34) " + valChance + "%, rgb(20, 20, 20) " + valChance + "%)")
		}
	})
	$("#chance_minus").click(function (){
		let chance = $("#chance").val();
		if(chance > 1){
			$("#chance").val(--chance);
		}
		let valChance = $("#chance").val();
		let payout;
		let low;
		let high;

		if(valChance >= 1 && valChance <= 98) {
			payout = 99 / valChance;
			low = valChance * 100;
			high = 9999 - low;

			$("#payout").val(payout.toFixed(2))
			$(".low").text("{{__("Low")}}: " + low);
			$(".high").text("{{__("High")}}: " + high);
			$("#range").val(low);
			$("#range").css("background", "linear-gradient(to right, rgb(124, 151, 34) " + valChance + "%, rgb(20, 20, 20) " + valChance + "%)")
		}
	})
	$("#chance_plus").click(function (){
		let chance = $("#chance").val();
		if(chance < 97){
			$("#chance").val(++chance);
		}
		let valChance = $("#chance").val();
		let payout;
		let low;
		let high;

		if(valChance >= 1 && valChance <= 98) {
			payout = 99 / valChance;
			low = valChance * 100;
			high = 9999 - low;

			$("#payout").val(payout.toFixed(2))
			$(".low").text("{{__("Low")}}: " + low);
			$(".high").text("{{__("High")}}: " + high);
			$("#range").val(low);
			$("#range").css("background", "linear-gradient(to right, rgb(124, 151, 34) " + valChance + "%, rgb(20, 20, 20) " + valChance + "%)")
		}
	})

	$('#range').on("change mousemove", function() {
		let val = $(this).val();

		$(".low").text("{{__("Low")}}: "+ val );
		let high = 9999 - val;
		$(".high").text("{{__("High")}}: "+ high );
		let chance = val / 100;
		chance = chance.toFixed(2);
		$("#chance").val(chance)
		let payout = 99/chance;
		$("#payout").val(payout.toFixed(2))

	});

	$("#amount").blur(function (){
		if($(this).val() > 50){
			$(this).val(50)
		}else if($(this).val() < 1){
			$(this).val(1)
		}
	});

	$(".pl_btn").click(function (){
		let amount = $("#amount").val();
		let payout = $("#payout").val();
		if(amount == "" || $("#chance").val() == ""){
			alert("Please fill all fields")
			return false;
		}else{
			var audio = new Audio("/audio/games/dice/bet.mp3");
			audio.play();
			var intNum;
			if($(this).hasClass("low")){
				var text = $(this).text();
				text = text.split(":");
				text = parseInt($.trim(text[1]));
			}else{
				var text = $(this).text();
				text = text.split(":");
				text = parseInt($.trim(text[1]));
			}

			if($("#chance").val() < 51){
				if($(this).hasClass("low")){
					let min = 100;
					let max = text

					var allNumer = Math.floor(Math.random() * (max - min) + min);

					if(allNumer < 1000){
						allNumer = allNumer.toString();
						var desired0 = 0;
						var desired1 = allNumer.substr(0, 1);
						var desired2 = allNumer.substr(1, 1);
						var desired3 = allNumer.substr(2, 1);
					}else{
						allNumer = allNumer.toString();
						var desired0 = allNumer.substr(0, 1);
						var desired1 = allNumer.substr(1, 1);
						var desired2 = allNumer.substr(2, 1);
						var desired3 = allNumer.substr(3, 1);
					}

				}else{
					let max = 9998;
					let min = text;
					var allNumer = Math.floor(Math.random() * (max - min) + min);
					allNumer = allNumer.toString();
						var desired0 = allNumer.substr(0, 1);
						var desired1 = allNumer.substr(1, 1)	;
						var desired2 = allNumer.substr(2, 1);
						var desired3 = allNumer.substr(3, 1);

				}

			}else{
				var desired0 = Math.floor(Math.random() * 10);
				var desired1 = Math.floor(Math.random() * 10);
				var desired2 = Math.floor(Math.random() * 10);
				var desired3 = Math.floor(Math.random() * 10);
			}

			var duration = 300;

			var output0 = $('#output0');
			var output1 = $('#output1');
			var output2 = $('#output2');
			var output3 = $('#output3');
			var started = new Date().getTime();


			var animationTimer0 = setInterval(function() {
				if (new Date().getTime() - started > duration) {
					clearInterval(animationTimer0); // Stop the loop
					output0.text(desired0); // Print desired number in case it stopped at a different one due to duration expiration
				} else {
					output0.text(Math.floor(Math.random() * 10));
				}
			}, 100);
			var animationTimer1 = setInterval(function() {
				if (new Date().getTime() - started > duration) {
					clearInterval(animationTimer1); // Stop the loop
					output1.text(desired1); // Print desired number in case it stopped at a different one due to duration expiration
				} else {
					output1.text(Math.floor(Math.random() * 10));
				}
			}, 100);
			var animationTimer2 = setInterval(function() {
				if (new Date().getTime() - started > duration) {
					clearInterval(animationTimer2); // Stop the loop
					output2.text(desired2); // Print desired number in case it stopped at a different one due to duration expiration
				} else {
					output2.text(Math.floor(Math.random() * 10));
				}
			}, 100);
			var animationTimer3 = setInterval(function() {
				if (new Date().getTime() - started > duration) {
					clearInterval(animationTimer3); // Stop the loop
					output3.text(desired3); // Print desired number in case it stopped at a different one due to duration expiration
				} else {
					output3.text(Math.floor(Math.random() * 10));
				}
			}, 100);

			let mess;
			if($(this).hasClass("low")){
				var text = $(this).text();
				text = text.split(":");
				text = parseInt($.trim(text[1]));
				var number = desired0+""+desired1+""+desired2+""+desired3;
				number = parseInt(number);

				if(number > text){
					var audioLose = new Audio("/audio/games/dice/lose.mp3");
					audioLose.play();
					mess = "You lose";
				}else{
					var audioWin = new Audio("/audio/games/dice/win.mp3");
					audioWin.play();

					var win = payout * amount;
					mess = "You win " + win.toFixed(2);
				}
				$(".winning").text(mess);
			}else{
				var text = $(this).text();
				text = text.split(":");
				text = parseInt($.trim(text[1]));
				var number = desired0+""+desired1+""+desired2+""+desired3;
				number = parseInt(number);

				if(number < text ){
					var audioLose = new Audio("/audio/games/dice/lose.mp3");
					audioLose.play();
					mess = "You lose";
				}else{
					var audioWin = new Audio("/audio/games/dice/win.mp3");
					audioWin.play();
					var win = payout * amount;
					mess = "You win " + win.toFixed(2);
				}
				$(".winning").text(mess);
				var text = $(this).text();
				text = text.split(":");
			}



		}
	})

	$(".anchordropdown").click(function (event){
		e.preventDefault();		event.stopPropagation();
	})

</script>

@endsection