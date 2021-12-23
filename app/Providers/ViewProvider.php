<?php

namespace App\Providers;
use App\Services\BalanceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use DB;
use Illuminate\Support\Facades\View;
use Packages\Payments\Services\CoinpaymentsPaymentService;

class ViewProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /***** jackpot *****/

        $jackpot = DB::table('other_settings')->where("settings_name","=","jackpot")->first();

            view()->composer('frontend.includes.header',function($view) use ($jackpot)
            {

                $view->with('jackpot', $jackpot);
            });



        view()->composer('*', function($view) {
            if(auth()->user()){
                $balance = DB::table("accounts")->where("user_id","=",auth()->user()->id)->first();
                if(!Cache::has("coin")){
                    $rate = env('CREDITS_RATE', 100);
                    if($balance->balance != 0){
                        $amount = $rate != 0 ? $balance->balance / $rate : 1;
                        $balanceService = new BalanceService();
                        $response = $balanceService->coin($amount);
                        $balance->coin = $response["result"]["amount"];
                    }else{
                        $balance->coin = 0;
                    }
                    Cache::put('coin',$balance->coin, 60);
                }

                $view->with('balance', $balance);


            }

        });







    }
}
