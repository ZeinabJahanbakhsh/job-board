<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    public function redirect($provider): RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider): RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
    {
        $socialiteUser = Socialite::driver($provider)->user();
        $user          = User::whereEmail($socialiteUser->getEmail())->first();

        if (!$user) {
            $user = User::updateOrCreate([
                'id' => $socialiteUser->id
            ], [
                'name'     => $socialiteUser->name,
                'password' => bcrypt('123456'),
                'email'    => $socialiteUser->getEmail() ?? Str::random('10') . '@gmail.com',
            ]);
        }

        Auth::loginUsingId($user->id);
        return $this->redirect('/');
    }


}
