<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class SocialLoginController extends Controller
{
    public function googleGetData()
    {

     return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {

        return 'hellow Google Redirection';
    }
}
