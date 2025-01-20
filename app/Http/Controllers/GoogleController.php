<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    // public function redirectToGoogle(Request $req){
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleGoogleCallback(Request $req){
    //     try{
    //         $googleUser = Socialite::driver('google')->user();
    //         $user       = User::updateOrCreate([
    //             'google_id' => $googleUser->id,
    //         ],
    //         [
    //             'name'          => $googleUser->name,
    //             'email'         => $googleUser->email,
    //             'google_token'  => $googleUser->token,
    //             'google_refresh_token' => $googleUser->refreshToken,
    //         ]);
        
    //         Auth::login($user);
    //         return redirect('/dashboard');
    //     }
    //     catch(\Exception $e){
    //         return redirect()->route('/login')->with('error', 'Sign-In failed');
    //     }

    // }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
        
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
         
            if($finduser){
         
                Auth::login($finduser);
                return redirect()->intended('home');
         
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);
         
                Auth::login($newUser);
        
                return redirect()->intended('home');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}