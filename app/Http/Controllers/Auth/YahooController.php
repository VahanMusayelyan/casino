<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\AccountService;
use App\Models\Account;

class YahooController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToYahoo()
    {
        return Socialite::driver('yahoo')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleYahooCallback(Request $request)
    {
        try {

            $user = Socialite::driver('yahoo')->user();
            $finduser = User::where('yahoo_id', $user->id)->where('provider_name', "yahoo")->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider_name'=> "yahoo",
                    'facebook_id'=> $user->id,
                    'role'=> "USER",
                    'status' =>0,
                    'last_login_at' => Carbon::now(),
                    'last_login_from' => $request->ip()
                ]);

                $account = new Account();
                $account->user()->associate($newUser);
                $account->code = bin2hex(random_bytes(25));
                $account->balance = 1000;
                $account->save();


                Auth::login($newUser);

                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}