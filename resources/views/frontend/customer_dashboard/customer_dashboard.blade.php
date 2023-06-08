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
                    <li><a href="{{route('category.one', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="mb-4"></div>
@auth('customerauth')
<div class="page-content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                <aside class="col-md-4 col-lg-3">
                    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.logout')}}">Sign Out</a>
                        </li>
                    </ul>
                </aside><!-- End .col-lg-3 -->

                <div class="col-md-8 col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                            <div class="mb-3">
                                @if (Auth::guard('customerauth')->user()->image == null)
                                    <img src="{{Avatar::create(Auth::guard('customerauth')->user()->name)->toBase64()}}" alt="">
                                @else
                                    <img src="{{asset('uploads/customer')}}/{{Auth::guard('customerauth')->user()->image}}" width="80" alt="profile-dp">
                                @endif
                            </div>
                            <p>Name:  <span class="font-weight-normal text-dark">{{Auth::guard('customerauth')->user()->name}}</span>
                            <p>Email:  <span class="font-weight-normal text-dark">{{Auth::guard('customerauth')->user()->email}}</span>
                            <p>Joined:  <span class="font-weight-normal text-dark">{{Auth::guard('customerauth')->user()->created_at->format('j F Y')}}</span>
                                {{-- <a href="#">Log out</a> --}}
                            <br>
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                            
                            
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    {{-- <th scope="col">Total</th> --}}
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->order_id}}</td>
                                        <td>{{$order->created_at->format('j F Y')}}</td>
                                        <td> 
                                            <span class="badge badge-@php
                                            if($order->status == 0) {
                                                echo 'secondary';
                                            } else if($order->status == 1) {
                                                echo 'primary';
                                            } else if($order->status == 2) {
                                                echo 'info';
                                            } else if($order->status == 3) {
                                                echo 'warning';
                                            } else if($order->status == 4) {
                                                echo 'success';
                                            } else {
                                                echo 'danger';
                                            }
                                            @endphp">
                                            @php
                                                if($order->status == 0) {
                                                    echo 'Pending';
                                                } else if($order->status == 1) {
                                                    echo 'Processing';
                                                } else if($order->status == 2) {
                                                    echo 'Dispatched';
                                                } else if($order->status == 3) {
                                                    echo 'On delivery';
                                                } else if($order->status == 4){
                                                    echo 'Delivered';
                                                } else {
                                                    echo 'Cancelled';
                                                }
                                            @endphp    
                                            </span> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            @if (!empty($orders))
                            @if ($orders->first->order_id == null)
                            <p>No order has been made yet.</p>
                            <a href="{{route('shop')}}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            @endif
                            @endif
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                            <form action="{{route('customer.profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Display Name *</label>
                                <input type="text" name="name" class="form-control" required value="{{Auth::guard('customerauth')->user()->name}}">

                                <label>Email address *</label>
                                <input type="email" name="email" class="form-control" required value="{{Auth::guard('customerauth')->user()->email}}">

                                <label>Address *</label>
                                <input type="text" name="address" class="form-control" value="{{Auth::guard('customerauth')->user()->address == null ? '': Auth::guard('customerauth')->user()->address}}">

                                <label>New password (leave blank to leave unchanged)</label>
                                <input type="password" name="password" class="form-control">

                                <label>Confirm new password</label>
                                <input type="password" name="password_confirmation" class="form-control mb-2">
                                
                                <label>Display Image*</label>
                                <input type="file" name="image" class="form-control mb-2" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                                <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/customer')}}/{{(Auth::guard('customerauth')->user()->image == null) ? '': Auth::guard('customerauth')->user()->image}}" alt="">

                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>SAVE CHANGES</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .dashboard -->
</div> 
@else
<h2 class="text-danger text-center mt-5 pt-5">Not found any user</h2>
@endauth
<div class="mb-4"></div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection

@section('footer_script')
    <script>
        $(".col-none").slice(0, 3).show();

        $(".btn-load-more").on("click", function() {
            $(".col-none:hidden").slice(0, 3).show();
            if($(".col-none:hidden").length == 0) {
                // $(".btn-load-more").fadeOut();
                $(".btn-load-more").replaceWith("No more products");
            }
        })
    </script>
@endsection