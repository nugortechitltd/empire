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
    <div class="checkout">
        <div class="container">
        
            @if (isset($cart_data))
            @if(Cookie::get('shopping_cart'))
            @php
                $total = 0
            @endphp
            <form action="{{route('order.store')}}" method="POST">
                @csrf
                {{-- <div class="checkout-discount">
                    <input type="text" class="form-control" name="coupon"  id="checkout-discount-input" placeholder="Coupon code">
                    <label for="checkout-discount-input" class="text-truncate"></span></label>
                </div> --}}
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="form-control" required="">
                                </div><!-- End .col-sm-6 -->
                                <div class="col-lg-6">
                                    <label>Email address *</label>
                                    <input type="email" name="email" class="form-control" required="">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Number *</label>
                                    <input type="tel" name="mobile" class="form-control" required="">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Address *</label>
                                    <input type="text" name="address" class="form-control" required="">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Order notes (optional)</label>
                                <textarea class="form-control" name="notes" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-5">
                        <div class="summary">

                            <div class="mb-4">
                                <input type="text" class="form-control coupon_code" name="coupon"  id="checkout-discount-input" placeholder="Coupon code" style="border: 1px dotted #080808" autocomplete="off">
                                <button class="btn btn-primary apply_coupon_btn">Apply</button>
                                <small id="error_coupon" class="text-danger"></small>
                            </div>
                
                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cart_data as $data)
                                    <tr>
                                        <td><a href="{{route('product.details', $data['item_slug'])}}">{{$data['item_name']}}</a></td>
                                        <td>৳ {{$data['item_price']}} X {{$data["item_quantity"]}}</td>
                                    </tr>
                                    @php
                                        $total = $total + ($data["item_quantity"]*$data["item_price"]) 
                                    @endphp
                                    @endforeach

                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>৳ {{$total}}</td>
                                    </tr>
                                    <tr class="summary-discount">
                                        <td>Discount:</td>
                                        <td class="discount_price">৳ 0</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Grand total:</td>
                                        <td class="grand_total_price">৳ {{$total}}</td>
                                        {{-- <td><span class="grandtotal_price">৳ {{number_format($total, 0)}}</span></td> --}}
                                    </tr>
                                    
                                    <tr class="summary-shipping-row">
                                        <td class="pt-3">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="charge" id="free-shipping" class="custom-control-input" checked="" value="0">
                                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                            </div>
                                        </td>
                                        <td class="pt-3">৳ 00</td>
                                    </tr>
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="charge" id="standart-shipping" class="custom-control-input" value="100">
                                                <label class="custom-control-label" for="standart-shipping">Inside Dhaka</label>
                                            </div>
                                        </td>
                                        <td>৳ 100</td>
                                    </tr>
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="charge" id="express-shipping" class="custom-control-input" value="200">
                                                <label class="custom-control-label" for="express-shipping">Outside Dhaka</label>
                                            </div>
                                        </td>
                                        <td>৳ 200</td>
                                    </tr>


                                    {{-- <tr class="summary-shipping-row">
                                        <td class="pt-3">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="payment_method" id="c1" class="custom-control-input" checked="" value="1">
                                                <label class="custom-control-label" for="c1">Cash on delivery</label>
                                            </div>
                                        </td>
                                        <td class="pt-3"></td>
                                    </tr>
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="payment_method" id="c2" class="custom-control-input" value="2">
                                                <label class="custom-control-label" for="c2">Bkash</label>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr> --}}
                                </tbody>
                            </table><!-- End .table table-summary -->


                            <p class="mt-3">Payment type:</p>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                  <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                      <span type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="payment_method" id="c1" class="custom-control-input" value="1">
                                            <label class="custom-control-label payment-custom-control-label" for="c1">Cash on delivery</label>
                                        </div>
                                      </span>
                                    </h2>
                                  </div>
                                    @php
                                        $info = App\Models\Transaction::latest()->take(1)->get()
                                    @endphp
                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{!empty($info->first()->description2) ? $info->first()->description2 : 'Information'}}
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                      <span type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="payment_method" id="c2" class="custom-control-input" value="2" @error('tran_number') checked @enderror @error('tran_id') checked @enderror>
                                            <label class="custom-control-label payment-custom-control-label" for="c2">Bkash</label>
                                            <div>
                                                @error('tran_number')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                @error('tran_id')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                      </span>
                                    </h2>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body pt-2">
                                        <p>{{!empty($info->first()->description1) ? $info->first()->description1 : 'Information'}} <br>
                                            bKash {{!empty($info->first()->type) ? $info->first()->type : 'type'}} Number: {{!empty($info->first()->bkash) ? $info->first()->bkash : 'number'}}</p>
                                        <input type="tel" name="tran_number" class="form-control ml-3 mt-2" placeholder="Bkash number">
                                        
                                        <input type="text" name="tran_id" class="form-control ml-3" placeholder="Bkash transaction ID">
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>

                            
                            {{-- <p class="mt-3">Payment type:</p>
                            <div class="accordion-summary" id="accordion-payment">
                                
                                <div class="card">
                                    <div class="card-header" id="heading-1">
                                        <h2 class="card-title">
                                            <a data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                <input type="radio" id="c1" name="payment_method" class="custom-control-input" checked value="1">
                                                Cash on delivery
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="heading-3">
                                        <h2 class="card-title">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                <input type="radio" id="c2" name="payment_method" class="custom-control-input" value="2">
                                                Bkash
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                        <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                <span class="btn-text">Place Order</span>
                                <span class="btn-hover-text">Proceed to Checkout</span>
                            </button>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </form>
            @endif
            @else
            <h2 class="text-danger m-auto text-center mt-5">No product added for checkout</h2>
            @endif
            
            
        </div><!-- End .container -->
    </div><!-- End .checkout -->
</div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection


@section('footer_script')
    <script>
        $('.apply_coupon_btn').click(function(e) {
            e.preventDefault();
            var coupon_code = $('.coupon_code').val();
            // alert(coupon_code);
            // console.log(coupon_code);
            // die();
            

            if($.trim(coupon_code).length == 0) {
                error_coupon = "Please enter valid coupon";
                $('#error_coupon').text(error_coupon);

            } else {
                error_coupon = '';
                $('#error_coupon').text(error_coupon);
            }


            if(error_coupon != '') {
                return false;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/check-coupon-code",
                data: {
                    'coupon_code': coupon_code
                },
                success: function(response) {
                    if(response.error_status == 'error') {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                        $('.coupon_code').val('');
                    } else {
                        $('.grand_total_price').text(response.grand_total_price);
                        $('.discount_price').text(response.discount_price);
                        $('.coupon_code').text(response.coupon_code);
                    }
                }
            })
        }) 
    </script>
@endsection