@extends('layouts.dashboard')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Ecommerce</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item ">Dashboard</li>
            <li class="breadcrumb-item active">Ecommerce</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4 bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ion ion-md-cart display-4"></div>
                        <div class="ml-4">
                            <div class="text-white small">Total order</div>
                            <div class="text-large">{{$totalOrder}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4 bg-success text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ion ion-ios-card display-4"></div>
                        <div class="ml-4">
                            <div class="text-white small">Referral Earnings</div>
                            <div class="text-large">$586</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4 bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ion ion-ios-wallet display-4"></div>
                        <div class="ml-4">
                            <div class="text-white small">Revenue</div>
                            @php
                                $grandsum = $sum + $total_charge + $total_discount;
                            @endphp
                            <div class="text-large">৳ {{!empty($grandsum) ? $grandsum: '0'}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mb-4 bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ion ion-md-pulse display-4"></div>
                        <div class="ml-4">
                            <div class="text-white small">Estimate Sales</div>
                            <div class="text-large">$478</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- chart cards start -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header with-elements">
                    <h6 class="card-header-title mb-0">Sale Order</h6>
                    <div class="card-header-elements ml-auto">
                        <label class="text m-0">
                            <span class="text-light text-tiny font-weight-semibold align-middle">SHOW STATS</span>
                            <span class="switcher switcher-sm d-inline-block align-middle mr-0 ml-2">
                                <input type="checkbox" class="switcher-input" checked>
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="row no-gutters row-bordered">
                    <div class="col-md-5 col-lg-12 col-xl-5">
                        <div class="card-body">
                            <div class="pb-4">
                                Order
                                <div class="float-right">
                                    <span class="text-muted small">৳ {{!empty($grandsum) ? $grandsum: '0'}}</span><i class="feather icon-arrow-down text-danger"></i>
                                </div>
                                <div class="progress mt-1" style="height:6px;">
                                    <div class="progress-bar bg-primary" style="width: 45%;"></div>
                                </div>
                            </div>
                            <div class="pb-4">
                                Stock
                                <div class="float-right">
                                    <span class="text-muted small">{{$totalstock}} Qt</span><i class="feather icon-arrow-up text-success"></i>
                                </div>
                                <div class="progress mt-1" style="height:6px;">
                                    <div class="progress-bar bg-success" style="width: 90%;"></div>
                                </div>
                            </div>
                            <div class="pb-4">
                                Profit
                                <div class="float-right">
                                    <span class="text-muted small">৳ {{!empty($grandsum) ? $grandsum: '0'}}</span><i class="feather icon-arrow-up text-success"></i>
                                </div>
                                <div class="progress mt-1" style="height:6px;">
                                    <div class="progress-bar bg-danger" style="width: 30%;"></div>
                                </div>
                            </div>
                            <div class="pb-0">
                                Sale
                                <div class="float-right">
                                    <span class="text-muted small">{{$total_sale}} Qt</span><i class="feather icon-arrow-down text-danger"></i>
                                </div>
                                <div class="progress mt-1" style="height:6px;">
                                    <div class="progress-bar bg-warning" style="width: 55%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-12 col-xl-7">
                        <div class="card-body">
                            <div id="chart-pie-moris" style="height:200px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card d-flex w-100 mb-4">
                <div class="row no-gutters row-bordered row-border-light h-100">
                    <div class="d-flex col-sm-6 col-md-6 col-lg-6 align-items-center">
                        <div class="card-body media align-items-center text-dark">
                            <i class="lnr lnr-diamond display-4 d-block text-primary"></i>
                            <span class="media-body d-block ml-3">
                                <span class="text-big mr-1 text-primary">$1584.78</span>
                                <br>
                                <small class="text-muted">Earned this month</small>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex col-sm-6 col-md-6 col-lg-6 align-items-center">
                        <div class="card-body media align-items-center text-dark">
                            <i class="lnr lnr-clock display-4 d-block text-warning"></i>
                            <span class="media-body d-block ml-3">
                                <span class="text-big"><span class="mr-1 text-warning">152</span>Working Hours</span>
                                <br>
                                <small class="text-muted">Spent this month</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 bg-pattern-2-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="lnr lnr-cart display-4 text-primary"></div>
                                <div class="ml-3">
                                    <div class="text-muted small">Monthly sales</div>
                                    <div class="text-large">2362</div>
                                </div>
                            </div>
                            <div id="ecom-chart-1" class="mt-4 chart-shadow-primary" style="height:55px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 bg-pattern-2-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="lnr lnr-gift display-4 text-danger"></div>
                                <div class="ml-3">
                                    <div class="text-muted small">Products</div>
                                    <div class="text-large">{{$total_product}}</div>
                                </div>
                            </div>
                            <div id="ecom-chart-3" class="mt-4 chart-shadow-danger" style="height:55px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chart cards end -->
    
        <!-- Data card 8 Start -->
        <div class="col-xl-8 col-md-12">
            <div class="card mb-4">
                    <h5 class="card-header" style="float-left">Latest Order <a href="{{route('transaction.list')}}" class="btn btn-success btn-sm mb-3 btn-round ml-auto text-right" style="float: right"><i class="feather icon-eye"></i> All</a></h5>
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Payment method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_info as $sl=>$order)
                            <tr>
                             <td>{{$order->order_id}}</td>
                             @if (App\Models\CustomerAuth::where('id', $order->customer_id)->exists())
                                 <td>{{App\Models\CustomerAuth::where('id', $order->customer_id)->first()->name}}</td>
                             @else
                                 <td>{{$order->customer_id}}</td>
                             @endif
                             <td>
                                 @foreach (App\Models\OrderProduct::where('order_id', $order->order_id)->get() as $payment)
                                 @php
                                     if($payment->payment_method == 1) {
                                         echo 'Cash on delivery';
                                     } else if($payment->payment_method == 2) {
                                         echo 'bKash';
                                     }
                                 @endphp
                                 @endforeach
                                 
                             </td>
                             <td> 
                                 <span class="badge badge-outline-@php
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
                             <td>{{$order->created_at->format('d M Y')}}</td>
                             <td>
                                 <form action="{{route('order.status')}}" method="POST">
                                     @csrf
                                 <a href="{{route('transaction.show', $order->id)}}" class="btn btn-primary btn-sm"><i class="feather icon-eye"></i>&nbsp;Show </a>
                                 <div class="btn-group" id="hover-dropdown-demo">
                                     <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" data-trigger="hover" aria-expanded="false">Order status</button>
                                     <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 35px; left: 0px;">
                                         <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'0'}}">Pending</button>
                                         <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'1'}}">Processing</button>
                                         <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'2'}}">Dispatched</button>
                                         <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'3'}}">On delivery</button>
                                         <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'4'}}">Delivered</button>
                                         <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'5'}}">Cancel</button>
                                     </div>
                                 </div>
                                 </form>
                             </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Anual Sales Report</h5>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Country</th>
                                <th>Sales</th>
                                <th class="text-right">Average</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="assets/img/avatars/9-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
                                <td>Germany</td>
                                <td>3,562</td>
                                <td class="text-right">56.23%</td>
                            </tr>
                            <tr>
                                <td><img src="assets/img/avatars/8-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
                                <td>USA</td>
                                <td>2,650</td>
                                <td class="text-right">25.23%</td>
                            </tr>
                            <tr>
                                <td><img src="assets/img/avatars/7-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
                                <td>Australia</td>
                                <td>956</td>
                                <td class="text-right">12.45%</td>
                            </tr>
                            <tr>
                                <td><img src="assets/img/avatars/6-small.png" alt="" class="img-fluid rounded-circle ui-w-40"></td>
                                <td>United Kingdom</td>
                                <td>689</td>
                                <td class="text-right">8.65%</td>
                            </tr>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>                   
</div>

@endsection
