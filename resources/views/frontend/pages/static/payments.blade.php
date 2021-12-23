@extends('frontend.layouts.home')
<link rel="stylesheet" href="{{asset('css/payments.css')}}">
@section('content')
  <link rel="stylesheet" href="https://www.jquery-az.com/jquery/css/masking-input/masking-input.css"/>

<div class="content">
  <div style="width: 100%;">
    <div class="payment-navbar button">
      <button class="btn-active-green">Deposit</button>
      <button>Windraft</button>
      <button>Payment History</button>
    </div>
    <div class="payment-deposit-block">
      <div class="payment_block">
      <div class="deposit-content">
      	<div class="payment-deposit">
        <button class="deposit-btn-active-white" onclick="metamaskButton('coin')">
          <img src="{{asset("assets/img/payments/coinPaymentsLogo.png")}}" alt="" style="display: inline-block;margin: auto">
          <img src="{{asset("assets/img/payments/coinPayments.png")}}" alt="">
        </button>
        <button id="metamask" onclick="metamaskButton('metamask')"><img src="{{asset("assets/img/payments/metamask.png")}}"
            alt=""></button>
          <button id="stripe" onclick="metamaskButton('stripe')"><img src="{{asset("assets/img/payments/stripe.png")}}"
                                                                          alt=""></button>
          <button id="paypal" onclick="metamaskButton('paypal')"><img src="{{asset("assets/img/payments/paypal.png")}}"
                                                                        alt=""></button>
      </div>
      <div class="deposit-amount">
        <form action="">
          <label for="">Deposit amount</label>

          <div>
            <input type="number" value="5000" class="deposit-amount-input" id="deposit-amount">
            <button type="button">Credits</button>
          </div>

          <label for="">Payment amount</label>

          <div>
            <input type="number" value="0.00177956" class="deposit-amount-input" id="payment-amount">
            <select name="payment_currency" class="custom-select payment-currency-dropdown" id="custom-select">
              <option class="dropdown-item" value="BCH">
                BCH
              </option>
              <option class="dropdown-item" value="BCN">
                BCN - Bytecoin
              </option>
              <option class="dropdown-item" value="BFT">
                BFT - BF Token
              </option>
              <option class="dropdown-item" value="BTC">
                BTC - Bitcoin
              </option>
              <option class="dropdown-item" value="BTG">
                BTG - Bitcoin Gold
              </option>
              <option class="dropdown-item" value="CLOAK">
                CLOAK - CloakCoin
              </option>
              <option class="dropdown-item" value="CRW">
                CRW - Crown
              </option>
              <option class="dropdown-item" value="CURE">
                CURE - CureCoin
              </option>
              <option class="dropdown-item" value="DASH">
                DASH - Dash
              </option>
              <option class="dropdown-item" value="DGB">
                DGB - DigiByte
              </option>
              <option class="dropdown-item" value="DOGE">
                DOGE - Dogecoin
              </option>
              <option class="dropdown-item" value="EBST">
                EBST - eBoost
              </option>
              <option class="dropdown-item" value="ETC">
                ETC - Ether Classic
              </option>
              <option class="dropdown-item" value="ETH">
                ETH - Ether
              </option>
              <option class="dropdown-item" value="EVC">
                EVC - EventChain
              </option>
              <option class="dropdown-item" value="FIRO">
                FIRO - Firo
              </option>
              <option class="dropdown-item" value="FLASH">
                FLASH - FLASH
              </option>
              <option class="dropdown-item" value="FUEL">
                FUEL - Fuel Token
              </option>
              <option class="dropdown-item" value="GRS">
                GRS - Groestlcoin
              </option>
              <option class="dropdown-item" value="KMD">
                KMD - Komodo
              </option>
              <option class="dropdown-item" value="KRS">
                KRS - Kinguin Krowns
              </option>
              <option class="dropdown-item" value="LSK">
                LSK - Lisk
              </option>
              <option class="dropdown-item" value="LTC">
                LTC - Litecoin
              </option>
              <option class="dropdown-item" value="LTCT">
                LTCT - Litecoin Testnet
              </option>
              <option class="dropdown-item" value="MAID">
                MAID - MaidSafeCoin
              </option>
              <option class="dropdown-item" value="NEO">
                NEO - NEO
              </option>
              <option class="dropdown-item" value="NOAH">
                NOAH - NOAHCOIN
              </option>
              <option class="dropdown-item" value="OMNI">
                OMNI - Omni
              </option>
              <option class="dropdown-item" value="PIVX">
                PIVX - PIVX
              </option>
              <option class="dropdown-item" value="POA20">
                POA20 - POA20 (ERC20 Token)
              </option>
              <option class="dropdown-item" value="QTUM">
                QTUM - Qtum
              </option>
              <option class="dropdown-item" value="ROC">
                ROC - Rasputin Online Coin
              </option>
              <option class="dropdown-item" value="SKIN">
                SKIN - SkinCoin
              </option>
              <option class="dropdown-item" value="SMART">
                SMART - SmartCash
              </option>
              <option class="dropdown-item" value="SNBL">
                SNBL - Snowball
              </option>
              <option class="dropdown-item" value="SYS">
                SYS - Syscoin
              </option>
              <option class="dropdown-item" value="TPAY">
                TPAY - TokenPay
              </option>
              <option class="dropdown-item" value="TRX">
                TRX - TRON
              </option>
              <option class="dropdown-item" value="USDT">
                USDT - Tether USD (Omni Layer)
              </option>
              <option class="dropdown-item" value="USDT.ERC20">
                USDT.ERC20 - Tether USD (ERC20)
              </option>
              <option class="dropdown-item" value="VTC">
                VTC - Vertcoin
              </option>
              <option class="dropdown-item" value="WAVES">
                WAVES - Waves
              </option>
              <option class="dropdown-item" value="WEB">
                WEB - Webcoin
              </option>
              <option class="dropdown-item" value="XEM">
                XEM - NEM
              </option>
              <option class="dropdown-item" value="XMR">
                XMR - Monero
              </option>
              <option class="dropdown-item" value="XRP">
                XRP - Ripple
              </option>
              <option class="dropdown-item" value="XVG">
                XVG - VERGE
              </option>
              <option class="dropdown-item" value="ZEN">
                ZEN - Horizen
              </option>
              <option class="dropdown-item" value="artTAC">
                artTAC - The Advertising Currency - Articles
              </option>
              <option class="dropdown-item" value="banTAC">
                banTAC - The Advertising Currency - Banners
              </option>
              <option class="dropdown-item" value="magTAC">
                magTAC - The Advertising Currency - Magazines
              </option>
              <option class="dropdown-item" value="outTAC">
                outTAC - The Advertising Currency - Outdoor
              </option>
              <option class="dropdown-item" value="radTAC">
                radTAC - The Advertising Currency - Radio
              </option>
              <option class="dropdown-item" value="socTAC">
                socTAC - The Advertising Currency - Social
              </option>
              <option class="dropdown-item" value="teTAC">
                teTAC - The Advertising Currency - Traffic Exchange
              </option>
              <option class="dropdown-item" value="tvTAC">
                tvTAC - The Advertising Currency - Television
              </option>
              <option class="dropdown-item" value="vidTAC">
                vidTAC - The Advertising Currency - Video
              </option>
              <option class="dropdown-item" value="vmTAC">
                vmTAC - The Advertising Currency - Viral Mailers
              </option>
            </select>
          </div>
          <label for="" class="card_label" id="card_label_payment">Enter your card details</label>
          <div class="card_details" id="card_details_payment">
                <label for="cc">Credit Card Number</label>
                <input id="cc" type="tel" name="card" placeholder="XXXX XXXX XXXX XXXX" pattern="\d{4} \d{4} \d{4} \d{4}" class="masked card_numbers" title="Enter the 16 number credit card">
            <input type="tel" maxlength="2" class="card_month" type="text" placeholder="MM">
            <input type="tel" maxlength="2" class="card_year" type="text" placeholder="YY">
            <input type="tel" maxlength="3" class="card_cvc" type="text" placeholder="CVC">
          </div>
          <div class="proceed">
            <button onclick="openCompleteDeposit()" type="button">Proceed</button>
          </div>
        </form>
      </div>
      </div>
      </div>
    </div>
    <div class="deposit-complete">
      <div class="deposit-complete-header">
        <h3>Complete Deposit</h3>
      </div>
      <div>
        <p>To complete the deposit please make the following transfer.</p>
      </div>
      <form action="">
        <label for="">Amount</label>
        <div class="amount inp_amount">
          <button class="select-button" type="button">BTC</button>
          <input type="number" class="deposit-amount-input" id="deposit-amount-input">
          <button class="copy-button cp_btn" onclick="getValue('deposit-amount-input')" type="button"><img
              src="{{asset("assets/img/payments/shape.svg")}}" alt="">Copy</button>
        </div>
        <label for="">Address</label>
        <div class="address">
          <input type="text" value="bitcointcash:qwerrtyffdshy677" class="deposit-address-input"
            id="deposit-address-input">
          <button class="qr-button" type="button"><img src="{{asset("assets/img/payments/25213.png")}}" alt=""></button>
          <button class="copy-button" onclick="getValue('deposit-address-input')" type="button"><img
              src="{{asset("assets/img/payments/shape.svg")}}" alt="">Copy</button>
        </div>
      </form>
      <div class="time-left">
        <p><span> Time left:</span>04h: 59m: 47s </p>
      </div>
    </div>
  </div>
  <div class="banner">
    <img src="{{asset("assets/img/payments/banner.png")}}" alt="">
  </div>
</div>
  <script src="https://www.jquery-az.com/jquery/js/masking-input/masking-input.js" data-autoinit="true"></script>
@endsection
