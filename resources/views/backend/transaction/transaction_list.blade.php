@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <h4 class="font-weight-bold py-3 mb-0">Transactions</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Transactions</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>Transactions</h3>
                        {{-- <a href="{{route('setting.info')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> settings</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
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
        </div>
    </div>
</div>
@endsection