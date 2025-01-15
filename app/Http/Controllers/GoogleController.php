<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(Request $req){

    }
    public function handleGoogleCallback(Request $req){
        try{
            $githubUser = Socialite::driver('github')->user();
            $user = User::updateOrCreate([
                'github_id' => $githubUser->id,
            ], [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]);
        
            Auth::login($user);
        
            return redirect('/dashboard');
        }
        catch(\Exception $e){

        }
    }
}