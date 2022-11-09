@extends('layouts.frontendapp')


@section('frontend-content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
    </div>
</div>

<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
               <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1 slick-initialized slick-slider">
                        <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 3760px; transform: translate3d(-940px, 0px, 0px);"><div class="lg-image slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/6.jpg" data-gall="myGallery" tabindex="-1">
                               {{--  <img src="images/product/large-size/6.jpg" alt="product image"> --}}
                               <img src="{{ $productShow->thumbnail_uri }}" alt="">
                            </a>
                        </div><div class="lg-image slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg" data-gall="myGallery" tabindex="-1">
                                <img src="{{asset('frontend/assets/images/product/large-size/1.jpg')}}" alt="product image">
                            </a>
                        </div><div class="lg-image slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/2.jpg" data-gall="myGallery" tabindex="0">
                                <img src="{{ $productShow->thumbnail_uri }}" alt="product image">
                            </a>
                        </div><div class="lg-image slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/3.jpg" data-gall="myGallery" tabindex="-1">
                                <img src="{{ $productShow->thumbnail_uri}}" alt="product image">
                            </a>
                        </div><div class="lg-image slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide03" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/4.jpg" data-gall="myGallery" tabindex="-1">
                                <img src="images/product/large-size/4.jpg" alt="product image">
                            </a>
                        </div><div class="lg-image slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide04" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/5.jpg" data-gall="myGallery" tabindex="-1">
                                <img src="images/product/large-size/5.jpg" alt="product image">
                            </a>
                        </div><div class="lg-image slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide05" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/6.jpg" data-gall="myGallery" tabindex="-1">
                                <img src="images/product/large-size/6.jpg" alt="product image">
                            </a>
                        </div><div class="lg-image slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 470px;">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg" data-gall="myGallery" tabindex="-1">
                                <img src="images/product/large-size/1.jpg" alt="product image">
                            </a>
                        </div></div></div>
                        
                        
                        
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1 slick-initialized slick-slider">

                        <span class="slick-prev slick-arrow" style="display: block;"><i class="fa fa-angle-left"></i>
                        </span> 

                        <div aria-live="polite" class="slick-list draggable" style="padding: 0px;">
                            <div class="slick-track" role="listbox" style="opacity: 1; width: 1888px; transform: translate3d(-472px, 0px, 0px);">

                                @foreach ($productShow->product_img as $gellaryImg)
                                    
                               
                            <div class="sm-image slick-slide slick-cloned" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 118px;">

                                <img src="{{ $gellaryImg->product_uri }}" alt="product image thumb" width="100" height="100">
                            </div>

                            @endforeach

                      </div>
                    </div>
                        
                    <span class="slick-next slick-arrow" style="display: block;"><i class="fa fa-angle-right"></i></span>

                </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{ $productShow->title }}</h2>

                        <table class="table">
                            
                            <tbody>
                              <tr>
                                <th scope="row">Price {{ $productShow->price }} ৳</th>
                                <td>Price {{ $productShow->price + $productShow->discount_price}} ৳</td>
                                <td>Status {{ $productShow->status ==1? 'In Stock':'Out of Stock' }}</td>
                                <td>Product Code :  {{ $productShow->product_code}}</td>
                              </tr>
                            </tbody>
                          </table>

                        <span class="product-details-ref">Reference: demo_15</span>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="review-item"><a href="#">Read Review</a></li>
                                <li class="review-item"><a href="#">Write Review</a></li>
                            </ul>
                        </div>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">{{ $productShow->price }}</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>
                                    {{ $productShow->short_detail }}
                                </span>
                            </p>
                        </div>
                        <div class="product-variants">
                            <div class="produt-variants-size">
                                <label>Dimension</label>
                                <select class="nice-select" style="display: none;">
                                    <option value="1" title="S" selected="selected">40x60cm</option>
                                    <option value="2" title="M">60x90cm</option>
                                    <option value="3" title="L">80x120cm</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">40x60cm</span><ul class="list"><li data-value="1" class="option selected">40x60cm</li><li data-value="2" class="option">60x90cm</li><li data-value="3" class="option">80x120cm</li></ul></div>
                            </div>
                        </div>
                        <div class="single-add-to-cart">
                            <form action="#" class="cart-quantity">
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div></div>
                                </div>
                                <button class="add-to-cart" type="submit">Add to cart</button>
                            </form>
                        </div>
                        <div class="product-additional-info pt-25">
                            <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                            <div class="product-social-sharing pt-25">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Security policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Delivery policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p> Return policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

{{ $productShow }}

@endsection