<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{





    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallBack(Request $request){


        $user=Socialite::driver('google')->user();

        dump($user->token);
//        $this->_registerOrLoginUser($user);
//        return redirect()->route('home');

    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }
}
