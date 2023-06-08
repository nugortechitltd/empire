@extends('frontend.master.master')
@section('computer')
<div class="dropdown category-dropdown show is-on" data-visible="false">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        Browse Categories
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach ($categories as $category)
                    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
@section('content')
<div class="page-content mt-3">
    <div class="cart">
        @if (isset($cart_data))
        <div class="container">
            <div class="row">
                @php $total="0" @endphp
                    @if (Cookie::get('shopping_cart'))
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                {{-- <div class="col-md-12 text-right mb-3">
                                    <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a>
                                </div> --}}
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cart_data as $data)
                                    <tr class="cartpage">
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="">
                                                        <img src="{{ asset('uploads/products/preview/'.$data['item_image']) }}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="{{route('product.details', $data['item_slug'])}}">{{$data['item_name']}}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">৳ {{ number_format($data['item_price'], 2) }}</td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                <input type="number" class="qty-input form-control" value="{{ $data['item_quantity'] }}" min="1" max="100" step="1" data-decimals="0" required>
                                                <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" >
                                                <input type="hidden" class="color_id" value="{{ $data['item_color'] }}" >
                                                <input type="hidden" class="size_id" value="{{ $data['item_color'] }}" >
                                            </div>
                                            {{-- <div class="cart-product-quantity" width="130px">
                                                <div class="input-group quantity">
                                                    <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                                        <span class="input-group-text">-</span>
                                                    </div>
                                                    <input type="text" class="qty-input form-control" maxlength="2" min="1" max="10" value="{{$data['item_quantity']}}">
                                                    <div class="input-group-append increment-btn" style="cursor: pointer">
                                                        <span class="input-group-text">+</span>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </td>
                                        {{-- @php
                                            $total_price = $data['item_price']*{{ number_format($data['item_price'], 0) }}
                                        @endphp --}}
                                        {{-- <td class="total-col">৳ {{$total_price}}</td> --}}
                                        <td class="total-col">৳ {{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</td>
                                        <td class="remove-col delete_cart_data"><button class="btn-remove"><i class="icon-close"></i></button></td>
                                    </tr>
                                    @php $total = $total + ($data['item_quantity'] * $data['item_price']) @endphp
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    {{-- <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" required placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                            </div>
                                        </div>
                                     --}}
                                </div>
                                <!-- <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a> -->
                                {{-- <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button> --}}
                                <button type="button" class="btn btn-outline-dark-2 clear_cart"><span>CLEAR CART</span><i class="icon-refresh"></i></button>
                            </form>
                            </div><!-- End .cart-bottom -->
                        </div>
                    @endif
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
    
                                <table class="table table-summary" id="totalajaxcall">
                                    <tbody class="totalpricingload">
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>৳ {{number_format($total, 2)}}</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>৳ {{number_format($total, 2)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
    
                            <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->
    
                        <a href="{{route('shop')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside>
                
                
                
            </div><!-- End .row -->
        </div><!-- End .container -->
        @else
        <h3 class="text-danger m-auto text-center mt-5 pt-5">No product has been added in cart.</h3>
        @endif
    </div>
</div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection