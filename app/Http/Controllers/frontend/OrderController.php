<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\Invoice;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
// use Barrydh\DomPDF\Facade\Pdf;
use PDF;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function checkoutForm()
    {
        return view('frontend.checkout.checkout');
    }
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
        $selectedProducts = Cart::with('products')->where('user_id',auth()->user()->id)->get();
        // $customerDetails = Order::where('user_id',auth()->user()->id)->get();
        //  dd($selectedcarts);
        foreach ($selectedProducts as $value) {
           
            OrderItem::create([
                'order_id'=> $orders->id,
                'product_id'=> $value->products->id,
                'price'=> $value->products->discount_price ?? $value->products->price,
                'quantity'=> $value->quantity,
              
            ]);  
            /* Total Price count */
            $totalPrice+= ($value->products->discount_price ?? $value->products->price) * $value->quantity;
        }

        /* Update The total Price of Order table */
        $totalUpdate = Order::find($orders->id);
        $totalUpdate->totals = $totalPrice;
        $totalUpdate->save();

        /* PDF VIEW */
        $billingName = auth()->user()->name;
        $billingEmail = auth()->user()->email;
        $customerAddress = $totalUpdate->address;
        $date = Carbon::today()->format('M d, Y');
        $totalPrice = 0;
        $orderId = $orderNum;
        $pdf = PDF::loadview('pdf.customer-invoice',compact('billingName','billingEmail', 'date', 'orderId', 'selectedProducts','customerAddress','totalPrice'));;

        /* Mail SEND */
        Mail::to(auth()->user()->email)->send(new Invoice(auth()->user()->name,auth()->user()->email,$date,$orderId,$pdf->output()));

          /* Clear or removed the cart while going to check out */

    foreach ($selectedProducts as  $cart) {
        $cart->delete();
    }
    $notification = [
        'message'=>'Successfull! Plz, Check your Email',
        'alert-type'=>'success',
    ];

    return redirect()->back()->with($notification);

    }

  
}
