@extends('frontend.layouts.home')

{{-- @section('title')
    {{ __('Bonuses') }}
@endsection

@section('content')
<h2>{{ __('Referral program') }}</h2>
<p>
	{{ __('Refer your friends to our casino and get bonus credits.') }}
	{{ __('Please copy the link below and share with your friends.') }}
</p>
<div class="input-group mb-3">
	<input id="referral-link-input" type="text" class="form-control text-muted" value="{{ $referral_url }}" readonly>
	<div class="input-group-append">
		<button type="button" class="btn btn-primary"
			onclick="copyToClipboard(document.getElementById('referral-link-input'))"><i class="far fa-copy"></i>
			{{ __('Copy') }}</button>
		<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
			aria-haspopup="true" aria-expanded="false"></button>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="mailto:?subject={{ urlencode($share_subject) }}&body={{ urlencode($share_body) }}">
				{{ __('Send by email') }}
			</a>
			<a class="dropdown-item"
				href="https://web.whatsapp.com/send?text={{ urlencode($share_subject) . ':' . urlencode($referral_url) }}">
				{{ __('Send by WhatsApp') }}
			</a>
			<a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{ urlencode($referral_url) }}">
				{{ __('Share on Facebook') }}
			</a>
			<a class="dropdown-item"
				href="https://twitter.com/intent/tweet?url={{ urlencode($referral_url) }}&text={{ urlencode($share_subject) }}">
				{{ __('Share on Twitter') }}
			</a>
		</div>
	</div>
</div>
<p>
	{{ __('You will get the following bonuses for referred users.') }}
</p>
<ul>
	@if($referral_bonuses['referrer_sign_up_credits'])
	<li>
		{{ __('User signs up - :n credits', ['n' => $referral_bonuses['referrer_sign_up_credits']]) }}
		@if(config('settings.bonuses.referral.referee_sign_up_credits'))
		({{ __('referred user will also get :n bonus credits', ['n' => $referral_bonuses['referee_sign_up_credits']]) }})
		@endif
	</li>
	@endif
	@if($referral_bonuses['referrer_game_loss_pct'])
	<li>
		{{ __('User loses a game - :n% of net loss in credits', ['n' => $referral_bonuses['referrer_game_loss_pct']]) }}
	</li>
	@endif
	@if($referral_bonuses['referrer_game_win_pct'])
	<li>
		{{ __('User wins a game - :n% of net win in credits', ['n' => $referral_bonuses['referrer_game_win_pct']]) }}
	</li>
	@endif
	@if($referral_bonuses['referrer_raffle_ticket_pct'])
	<li>
		{{ __('User purchases a raffle ticket - :n% of ticket price in credits', ['n' => $referral_bonuses['referrer_raffle_ticket_pct']]) }}
	</li>
	@endif
	@if($referral_bonuses['referrer_deposit_pct'])
	<li>
		{{ __('User completes a deposit - :n% of deposit amount in credits', ['n' => $referral_bonuses['referrer_deposit_pct']]) }}
	</li>
	@endif
</ul>
<p>
	{{ __('You referred :n users and earned :total credits so far.', ['n' => $referred_users_count, 'total' => $referral_total_bonus]) }}
</p>
<h2 class="mt-4">{{ __('Other bonuses') }}</h2>
<ul>
	@if(config('settings.bonuses.game.loss_amount_pct') > 0)
	<li>
		{{ __('Get :pct% of the net loss back when you lose more than :amount credits in a single game.', [
                        'amount' => config('settings.bonuses.game.loss_amount_min'),
                        'pct' => config('settings.bonuses.game.loss_amount_pct'),
                    ])
                }}
	</li>
	@endif
	@if(config('settings.bonuses.game.win_amount_pct') > 0)
	<li>
		{{ __('Get :pct% of the net win back when you win more than :amount credits in a single game.', [
                        'amount' => config('settings.bonuses.game.win_amount_min'),
                        'pct' => config('settings.bonuses.game.win_amount_pct'),
                    ])
                }}
	</li>
	@endif
	@installed('payments')
	@if(config('settings.bonuses.deposit.amount_pct') > 0)
	<li>
		{{ __('Get :pct% back when you deposit more than :amount credits at once.', [
                            'amount' => config('settings.bonuses.deposit.amount_min'),
                            'pct' => config('settings.bonuses.deposit.amount_pct'),
                        ])
                    }}
	</li>
	@endif
	@endinstalled
</ul>
@endsection

--}}
@push("styles")
    <link rel="stylesheet" href="{{asset('css/bonuses.css')}}">
@endpush
@section('content')
    <style>
        .left_bonus_block {
            border-radius: 2.1vw;
            height: 31.9vw;
            width: 96vw;
            background-size: cover;
            background: #355aad;
            box-shadow: 0px 4px 14px rgb(0 0 0 / 10%);
        }

        .become_partner {
            background-color: #538c31 !important;
            padding: 5px 8px;
            border-radius: 5px;
            color: white !important;
            cursor: pointer;
        }

        .coin {
            position: absolute;
            left: 31px;
            top: -60px;
        }

		.frequency_question{
			margin-top: 20px    ;
		}
        .right_side{
            width: 55%;
        }
      .left_side{
            width: 45%;
        }

        .rocket{
            width: 65%;
        }

        @media (max-width: 768px) {
            .rocket{
                width: 90%;
            }
            .right_side{
                width: 30%;
            }
            .left_side{
                width: 65%;
            }
            .coin{
                width: 10%;
                top: -45px;
            }
            .left_bonus_block .left_img {
                margin-left: 0px;
            }

            .left_bonus_block h3.referral_program,body > div.content > div.container.frequency_question > div:nth-child(2) > h4 {
                font-size: 22px;
            }

            .left_bonus_block p.referral_frineds {
                font-size: 12px;
            }
        }

        @media (max-width: 768px) {

            .rocket{
                width: 90%;
            }
            .right_side{
                width: 30%;
            }
            .left_side{
                width: 65%;
            }
            .coin{
                width: 10%;
                top: -45px;
            }
            .left_bonus_block .left_img {
                margin-left: 0px;
            }

            .left_bonus_block h3.referral_program,body > div.content > div.container.frequency_question > div:nth-child(2) > h4 {
                font-size: 22px;
            }

            .left_bonus_block p.referral_frineds {
                font-size: 12px;
            }
        }

        @media (max-width: 505px) {
            .left_bonus_block{
                display: block!important;
            }
            .left_bonus_block {
                height: 65.9vw;

            }
            .left_side,.right_side{
                margin:10px auto;
            }
            .left_side{
               width: 100%;
            }
            .left_bonus_block .left_img {
                visibility: visible!important;
            }
            .left_bonus_block p.referral_frineds {
                color: #ffffff;
                font-size: 12px;
                font-weight: 400;
                margin-bottom: 20px;
            }
            .coin {
                width: 10%;
                top: -30px;
            }
        }


        @media(max-width: 425px) {
            body > div.content > div.container.frequency_question > div:nth-child(1) > h4,
            body > div.content > div.container.frequency_question > div:nth-child(2) >h4 {
                font-size: 15px !important;
            }
            body > div.content > div.container.frequency_question > div:nth-child(1) > p,
            body > div.content > div.container.frequency_question > div:nth-child(2) > p{
                font-size: 12px !important;
            }

        }
        @media (max-width: 360px) {
            .left_bonus_block {
                height: 80vw;

            }
            .left_side,.right_side{
                margin:10px auto;
            }
            .left_bonus_block .left_img {
                visibility: visible!important;
            }
            .left_bonus_block p.referral_frineds {
                color: #ffffff;
                font-size: 12px;
                font-weight: 400;
                margin-bottom: 20px;
            }
            .coin {
                width: 10%;
                top: -20px;
            }

        }
    </style>
    <div class="content" style="align-items: unset;">
        <h1 class="bonuses_heading text-center">{{__("Affiliate")}}</h1>
        <div class="container_bonuses_block">
            <div class="left_bonus_block"
                 style="display: flex; justify-content: center;  align-items: center; position: relative">
                <img src="/assets/img/coin.svg" alt="" class="coin">
                <div class="left_side">
                    <h3 class="referral_program">{{__("Affiliate Program")}}</h3>
                    <p class="referral_frineds">{{__("YOU DON`T WANT TO MISS THIS FLIGHT.
Hop on our Betscoins, join our affiliate crew, invite your players and earn up to 45% affiliate comission.")}}</p>
                    <button class="btn become_partner">BECOME OUR PARTNER</button>
                </div>

                <div  class="right_side">
                    <div class="left_img">
                        <img src="/assets/img/affilliate-rocket.png" alt="" class="rocket">
                    </div>
                </div>
            </div>
        </div>
		<h4 class="text-center">
			{{__("Frequently asked questions")}}
		</h4>
        <div class="container frequency_question" style="display: flex">
            <div style="width: 45%;margin-right: 5%">
                <h4>What is Betscoins Affiliates?</h4>
                <p>Betscoins Affiliates is an affiliate program, by joining it you become a partner of Rocketpot.
                    This
                    allows you to earn money through your website(s). By promoting Betscoins on your websites and
                    referring players to us - you will earn a cut out of the revenue these players generate through
                    deposits. An excellent way to make some extra cash from your website and it’s content.</p>
                <h4>Why should I be a Betscoins Affiliate?</h4>
                <p>Well, only you can tell us that! If you have a website with some traffic, why not make something more
                    out
                    of it. It’s completely free and a good chance to get an extra cash flow going.</p>
                <h4>OK, seems like an awesome deal. Now - how do I sign up?</h4>
                <p>Well, only you can tell us that! If you have a website with some traffic, why not make something more
                    out
                    of it. It’s completely free and a good chance to get an extra cash flow going.</p>
                <h4>I have an account - how do I get started?</h4>
                <p>Login to you account (it’s here) and pick your banners of choice or create a good old text link. Add
                    the
                    link and/or banner to your website and ‘tata’ - you have a new neat way to earn extra income,
                    immediately.</p>
                <h4>Seems cool to make extra money, but does it cost me anything to join?</h4>
                <p>No. It’s absolutely free and you’ll have everything you need from day one.</p>
                <h4>I like this FAQ and all, but I still have some questions. Can I speak to someone?</h4>
                <p>Well of course my friend! We’ll be happy to guide you, just contact us here. If we’re available we’d
                    love
                    to
                    have a chat with you, otherwise just drop us a line on our e-mail address and we'll get back as soon
                    as
                    we
                    can.</p>
                <h4>Terms and conditions? Where are they?</h4>
                <a href="/terms-of-service">Right here.</a>

            </div>
            <div style="width: 45%">
				<h4>I have links and banners on my page. How do I know how much money I’m making?</h4>
                    <p>Easy, login to you Betscoins Affiliate account and all stats are available at your dashboard.
                        We
                        would
                        like to call us the most transparent affiliate program in the business, there are no hidden
                        fees.</p>
                    <h4>For how long does a player belong to me and for how long will he generate money for me?</h4>
                    <p>As long as the player plays with Betscoins, you will earn a cut of the revenue the player is
                        generating.
                        Money for life.</p>
                    <h4>How much money will I make?</h4>
                    <p>We pride ourselves with having one of the best commission programs there is. You’ll start of with
                        a
                        great
                        25% and from there you can get even higher depending on performance. And remember, we are
                        committed
                        to have
                        a fair, transparent and honest affiliate program. We would like to think that our 25% might not
                        be
                        the same
                        as some competitors 25%. No hidden fees!</p>
                    <h4>When do I get the money?</h4>
                    <p>We will process all payouts within the first week of each month. Please note that we have a
                        minimum
                        earning
                        of €100 before we make a pay-out.</p>
                    <h4>How do I get the payment?</h4>
                    <p>We will transfer the commission by your payment method of choice within the first week of each
                        month.
                        If the
                        amount is lower than €100 it will not be payed out but transferred to the next months
                        payout.</p>
                    <h4>How do I add links to my site?</h4>
                    <p>Login to your account and click the “Media Gallery”. Scroll around in the gallery and choose a
                        banner
                        of
                        your choice, or create a text link. Then just copy and paste the link to you site. Simple as
                        1,2,3.</p>
                    <h4>How do Betscoins track the players that I’m sending to you?</h4>
                    <p>The banner or link that you create from our “Media Gallery” has your personal tracking code
                        attached
                        to it.
                        So when players visit Rocketpot this tracking code is stored in a cookie on the user’s computer.
                        When the
                        user signs up, Rocketpot.com knows this player was referred by you and you will get the player
                        tagged as
                        yours and you will generate commission on this player for a life time.</p>
			</div>
        </div>
    </div>
@endsection