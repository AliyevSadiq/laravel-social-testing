<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function index(){
        dump(config());
    }



    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallBack(){
        $user=Socialite::driver('google')->stateless()->user();

        dump($user);
    }
}
