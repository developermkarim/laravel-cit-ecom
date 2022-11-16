<<<<<<< HEAD
@extends('layouts.frontendapp')

@section('frontend-content')

@php
    // print_r($allCarts);
@endphp

<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                   $subToal = 0;
                                  $deliveryCharge=0;   
                                @endphp
                               
                              @foreach ($allCarts as $cart)
                                  
                              @php
                                  $subToal+= $cart->products->price * $cart->quantity;
                                  $deliveryCharge+= $cart->quantity * 50;
                              @endphp
                                <tr>
                                    <td ><a href="{{ route('user.cart.remove',$cart->id) }}">❌</a></td>
                                    <td class="li-product-thumbnail"><a href="{{ url('product_show',$cart->products->slug) }}"><img src="{{ $cart->products->thumbnail_uri }}" alt="Li's Product Image" width="100" height="100"></a></td>
                                    <td class="li-product-name"><a href="{{ url('product_show',$cart->products->slug) }}">{{  $cart->products->title }}</a></td>

                                    <td class="li-product-price"><span class="amount">{{ number_format($cart->products->price,2)  }}৳</span></td>

                                    <td class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{ $cart->quantity }}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div></div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{ number_format($cart->products->price * $cart->quantity,2) }}৳</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    {{-- <input class="button" name="update_cart" value="Update cart" type="submit"> --}}

                                    <a href="{{ route('user.allCart.remove') }}">
                                        <input class="button" value="Clear All Cart ✖"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>{{ number_format($subToal,2)  }}৳</span></li>
                                    <li>Delivery Charge <span>{{  number_format($deliveryCharge,2)  }}৳</span></li>
                                    <li>Total <span>{{  number_format($deliveryCharge + $subToal,2)  }}৳</span></li>
                                </ul>
                                <a href="{{ url('user/cart/checkout') }}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
=======
@extends('layouts.frontend')

@section('cart-content')

<h2> THis is Cart Page Here</h2>
>>>>>>> 74578dd66ecbd120ba1d50728d3596c64d76ce47

@endsection