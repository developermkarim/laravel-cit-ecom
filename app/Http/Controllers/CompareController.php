<?php

namespace App\Http\Controllers;

use App\Models\Compare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    public function addToCompare(Request $request,$product_id)
    {
       if(Auth::check()){
        $exists = Compare::where('user_id',Auth::id())->where('product_id',$product_id)->first();

        if(!$exists){
            Compare::insert([
                'user_id'=>auth()->user()->id,
                'product_id'=> $product_id,
                'created_at'=> Carbon::now(),
            ]);
return response()->json(['success'=>'Successfully added On Your Compare']);

        }
        else {
            return response()->json(['error'=>'The Product is already added On Your Compare']);
        }

       }
       return response()->json(['error'=>'Please, First Login Your Account']);

    }
    
}
