<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller


{

    /* Add To WIshList  */

    public function addToWishList($id)
    {

        // $addedWishlists = Product::where('id',$id)->get();
        //  dd($addedWishlists->id);
        if(Auth::check()){
            if(WishList::where('user_id',auth()->user()->id)->where('product_id',$id)->exists()){

                WishList::where('user_id',auth()->user()->id)->where('product_id',$id)->first()->increment('quantity');
              
            }
            else{

            // $productPrice = Product::find($id)->first();
            
           // dd($productPrice);
          $addToWishlist =  WishList::create([
            'product_id'=>$id,
            'user_id'=> auth()->user()->id,
            'quantity'=>1,
            

        ]);

        if($addToWishlist){
            $notification = [
                'message'=>'add To Wishlist successfully',
                'alert-type'=>'success',
            ];
            // return redirect()->back()->with($notification);
         }
         
         else{

            $notification = [
                'message'=>'Sorry, not added to wishlist',
                'alert-type'=>'error',
            ];
        }

        return  redirect()->route('home')->with($notification);

    }

   return redirect('/');
}
else{

    return redirect()->route('user.login');
}



    }



    public function showWishlists()
    {

        $allWishlists = WishList::with('products')->where('user_id',auth()->user()->id)->get();
    //   dd($allWishlists);
        return view('frontend.wishlist.wishlist',compact('allWishlists'));
    }

    public function removeWishList($id)
    {
        $isDeleted = WishList::where('id',$id)->delete();
        // dd($isDeleted);

        if($isDeleted){
            $notification = [
                'message'=>'wishlist deleted successfully',
                'alert-type'=>'success',
            ];
        }
       
        // return redirect()->back()->with($notification);
     else{

        $notification = [
            'message'=>'wishlist not deleted',
            'alert-type'=>'error',
        ];

        
     }
     return redirect()->back()->with($notification);
    
}

}