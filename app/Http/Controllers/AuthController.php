<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{





    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallBack(Request $request){


        $user=Socialite::driver('google')->user();
    dump($user->token,111111);

        $params = [
            'grant_type' => 'social',
            'client_id' => env('GOOGLE_CLIENT_ID'), // it should be password grant client
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'accessToken' => $user->token, // access token from provider
            'provider' => 'google', // i.e. facebook
        ];
        $request->request->add($params);

        $requestToken = Request::create("oauth/token", "POST");

        $response = Route::dispatch($requestToken);
        dump(json_decode((string) $response->content(), true),2222222);

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
