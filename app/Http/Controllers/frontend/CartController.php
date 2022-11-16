<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart($id)
    {
       if(Auth::check()){
        if(Cart::where('user_id', auth()->user()->id)->where('product_id',$id)->exists()){

            Cart::where('user_id',auth()->user()->id)->where('product_id',$id)->first()->increment('quantity');
        }
        else{
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $id;
            $cart->quantity =1;
            $cart->save(); 
        
        }

        return back();

       }
       else{
        return redirect()->route('user.login');
    }
    
      /*   return view('frontend.cart.cart'); */
    }

    public function cartLists()
    {
        $allCarts = Cart::with('products')->where('user_id',auth()->user()->id)->get();
        // dd($allCarts);
        return view('frontend.cart.cart', compact('allCarts'));
    }

/* Cart in  Dropdown show  by click or hover*/
public function dropdownCart()
{
    $allCarts = Cart::with('products')->where('user_id',auth()->user()->id)->get();
    // dd($allCarts);
    return view('layouts.frontendapp', compact('allCarts'));
}

    public function cartRemove($id)
    {
        $cart = Cart::findOrFail($id);
        $result = $cart->delete();
         if($result){
            $notification = [
                'message'=>'cart Item deleted successfully',
                'alert-type'=>'success',
            ];
            // return redirect()->back()->with($notification);
         }
         else{

            $notification = [
                'message'=>'cart Item not deleted',
                'alert-type'=>'error',
            ];

            
         }
         return redirect()->back()->with($notification);

    }

    public function allCartRemove()
    {
        $allCarts = DB::table('carts')->delete();

        if($allCarts){

            $notification = [
                'message'=>'All cart Items deleted successfully',
                'alert-type'=>'success',
            ];
        }

        else{

            $notification = [
                'message'=>'all cart Items not deleted',
                'alert-type'=>'error',
            ];
        }

        return redirect()->back()->with($notification);
    }
   
}
