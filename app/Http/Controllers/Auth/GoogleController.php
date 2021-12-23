<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\AccountService;
use App\Models\Account;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request $request)
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->where('provider_name', "google")->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/');

            }else{
                $newUser = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'provider_name'=> "google",
                    'google_id'=> $user['id'],
                    'role'=> "USER",
                    'status' =>0,
                    'last_login_at' => Carbon::now(),
                    'last_login_from' => $request->ip()
                ]);

                $account = new Account();
                $account->user()->associate($newUser);
                $account->code = bin2hex(random_bytes(25));
                $account->balance = env("BONUSES_SIGN_UP_CREDITS");
                $account->save();


                Auth::login($newUser);

                return redirect('/');
            }

        } catch (Exception $e) {
            return redirect("/login")->with("message", "This email has already used");
        }


    }
}