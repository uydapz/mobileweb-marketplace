<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    // GOOGLE
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // GOOGLE
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate(
            [
                'email' => $googleUser->getEmail(),
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
            ],
            [
                'name' => $googleUser->getName(),
                'position' => 'XOlovers',
                'avatar' => $googleUser->getAvatar(), // <-- simpan avatar
                'password' => bcrypt(str()->random(16))
            ]
        );
        Auth::login($user);
        return redirect('/dashboard');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $fbUser = Socialite::driver('facebook')->user();
        $user = User::updateOrCreate(
            [
                'email' => $fbUser->getEmail(),
                'provider' => 'Facebook',
                'provider_id' => $fbUser->getId(),
            ],
            [
                'name' => $fbUser->getName(),
                'position' => 'XOlovers',
                'avatar' => $fbUser->getAvatar(), // <-- simpan avatar
                'password' => bcrypt(str()->random(16)),
            ]
        );
        Auth::login($user);
        return redirect('/dashboard');
    }
}
