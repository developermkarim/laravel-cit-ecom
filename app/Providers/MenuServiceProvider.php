<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
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

        view()->composer('layouts.frontendapp',function($view){
            $count =0;
            $wishlist = 0;
            if(Auth::check()){

                $cart = Cart::with('products')->where('user_id',auth()->user()->id)->get();
                // dd($cart);
                $count = count($cart);
                $wishlist = WishList::where('user_id',auth()->user()->id)->count();
                // dd($count);
                //  $toalPrice = $cart->products->price;
                //  dd($toalPrice);

            }

            return $view->with('cartCount',$count)->with('wishListCount',$wishlist);

        });

        /* This is for whole application */
        view()->composer('layouts.frontendapp', function ($view)
        {
           if(Auth::check()){

            $allCarts = Cart::with('products')->where('user_id',auth()->user()->id)->get();

            return $view->with('allcart',$allCarts);
           }
        });

        /* Wishlist Here */

        view()->composer('layouts.frontendapp', function(){

            /* if(Auth::check(){
                $allwishLists = Cart::
            }); */
        });

        /* Full Check out Page Here */
    }
}
