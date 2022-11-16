<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
                <h3>Customer Vouchar</h3>
                <div class="row ">
                  
                    <img class="m-auto" src="https://cdn4.vectorstock.com/i/thumb-large/89/48/paper-check-receipt-tax-accounting-logo-icon-vector-35838948.jpg" alt="">
                  
                    
                   
                </div>
                <div class="row">
                    <div class="col-md-5">
                       
                        <div class="billed"><span class="font-weight-bold text-uppercase">Date:</span><span
                                class="ml-1">{{ $date }}</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Order ID:</span><span
                                class="ml-1">{{ $orderId }}</span></div>
                    </div>
               
                    <div class="col-md-5">
                        <div class="billed"><span class="font-weight-bold text-uppercase">name:</span><span
                            class="ml-1">{{ $billingName }}</span></div>
                    <div class="billed"><span class="font-weight-bold text-uppercase">Email:</span><span
                            class="ml-1">{{ $billingEmail }}</span></div>
                    <div class="billed"><span class="font-weight-bold text-uppercase">address:</span><span
                            class="ml-1">{{ $customerAddress }}</span></div>
                    </div>
               
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>S/L</th>
                                    <th>Product</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selectedProducts as $key=> $cart)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $cart->products->title }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->products->discount_price ?? $cart->products->price }} BDT</td>
                                    <td>{{ ($cart->products->discount_price ?? $cart->products->price) * $cart->quantity
                                        }} BDT</td>
                                </tr>
                                @php
                               
                                $totalPrice += ($cart->products->discount_price ?? $cart->products->price)*$cart->quantity;
                                @endphp
                                @endforeach

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td> = {{ $totalPrice }} BDT</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>