@extends('layouts.frontendapp')

@section('frontend-content')
   {{-- wishlist area stated --}}

   <div class="wishlist-area pt-60 pb-60">
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
                                    <th class="text-dark">Quantity</th>
                                    <th class="li-product-stock-status">Stock Status</th>
                                    <th class="li-product-add-cart">add to cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($allWishlists as $wishlist)
                                    @php
                                        $total+= ($wishlist->products->discount_price ?? $wishlist->products->price) * $wishlist->quantity;
                                    @endphp 
                               
                                <tr>
                                    <td class=""><a href="{{ route('user.wishlist.remove',$wishlist->id) }}">❌</a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img src="{{ $wishlist->products->thumbnail_uri }}" alt="{{ $wishlist->products->title }}" width="100" height="100"></a></td>
                                    <td class="li-product-name"><a href="#">{{ $wishlist->products->title }}</a></td>
                                    
                                    <td class="li-product-price"><span class="amount">${{ number_format($total,2)  }}</span></td>

                                    <td class="li-product-price"><span class="amount">{{ $wishlist->quantity  }}</span></td>
                                    
                                    <td class="li-product-stock-status"><span class="in-stock">in stock </span></td>
                                    <td class="li-product-add-cart"><a href="{{ route('user.product.cart',$wishlist->products->id)}}">add to cart</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   {{-- wishlist area End --}}
@endsection