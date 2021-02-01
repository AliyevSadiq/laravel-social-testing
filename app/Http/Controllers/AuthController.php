<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{


    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallBack(){
        $user=Socialite::driver('google')->stateless()->user();

        return $user->name;
    }
}
