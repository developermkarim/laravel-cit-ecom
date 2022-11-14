<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function login()
    {
       return view('frontend.user.login');
    }


    public function createLogin()
    {
       
        return redirect();
    }

    public function register()
    {
       return view('frontend.user.register');
    }


    public function createRegister()
    {
       return redirect();
    }
}
