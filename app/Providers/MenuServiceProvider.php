<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> 74578dd66ecbd120ba1d50728d3596c64d76ce47
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        
        view()->composer('layouts.frontendapp',function($view){
            $count =0;
            if(Auth::check()){

                $count = Cart::where('user_id',auth()->user()->id)->count();
            }

            return $view->with('cartCount',$count);
            
        });
=======
        //
>>>>>>> 74578dd66ecbd120ba1d50728d3596c64d76ce47
    }
}
