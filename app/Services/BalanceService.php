<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use CoinpaymentsAPI;
use \Packages\Payments\Services\CoinpaymentsPaymentService;

/**
 * BalanceService.net API implementation
 *
 * Class BalanceService
 */
class BalanceService extends CoinpaymentsPaymentService
{

    public $api;
    public $response;
    public $config;

    /**
     * CoinpaymentsPaymentService constructor.
     */
    public function __construct()
    {
        $this->config = config('payments.coinpayments');
        $this->api = new CoinpaymentsAPI($this->config['private_key'], $this->config['public_key'], 'json');
    }

    /**
     * Coin balance
     *
     * @param $amount
     */
    public function coin($amount)
    {

        $result = $this->response = $this->api->CreateComplexTransaction(
            $amount,
            "USD",
            "BTC",
            auth()->user()->email,
            '', // forward to address
            auth()->user()->name,
            "",
            '', // item number
            '', // invoice
            '', // custom
            route('payments.webhooks.ipn',"coinpayments")
        );

        return $result;

    }
}
