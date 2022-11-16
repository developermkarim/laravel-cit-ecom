<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
class OrderController extends Controller
{
    public function checkout()
    {
        // invoice_id	user_id	name	email	address	note	totals

        $faker = Faker::create();
        // $orderModel = new Order();
        $orderNum = 'order-' . $faker->lexify('???') . $faker->numberBetween(10000,500000);
        $totalPrice = 0;
        $orders = Order::create([
            'invoice_id'=>$orderNum,
            'user_id'=> auth()->user()->id,
            'name'=>auth()->user()->name,
            'email'=> auth()->user()->email,
            'address'=>$faker->address(),
            'note'=> $faker->sentence(20),
            'totals'=>$totalPrice,

        ]);

        /* Fetch the selected cart */
        $selectedcarts = Cart::with('products')->where('user_id',auth()->user()->id)->get();

        //  dd($selectedcarts);
        foreach ($selectedcarts as $value) {

            OrderItem::create([
                'order_id'=> $orders->id,
                'product_id'=> $value->products->id,
                'price'=> $value->products->discount_price ?? $value->products->price,
                'quantity'=> $value->quantity,
                /* 'created_at'=>Carbon::now(),
                'updated_at'=>'2022-11-16 01:54:35', */
            ]);
            /* Total Price count */
            $totalPrice+= ($value->products->discount_price ?? $value->products->price) * $value->quantity;
        }

        /* Update The total Price of Order table */
        $orderModel = Order::find($orders->id);
        $orderModel->totals = $totalPrice;
        $orderModel->save();

          /* Clear or removed the carts while going to check out page */

    foreach ($selectedcarts as  $cart) {

        $cart->delete();
    }

    return redirect()->route('user.cart.list');

    }


}
