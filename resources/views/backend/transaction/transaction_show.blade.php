@extends('layouts.dashboard')
@section('content')
<style>

/* html,
        body {
            background: #fff !important;
        }

        body> :not(.invoice-print) {
            display: none !important;
        }

        .invoice-print {
            min-width: 768px !important;
            font-size: 15px !important;
        }

        .invoice-print * {
            border-color: #aaa !important;
            color: #000 !important;
        } */
        @media print {
        /* Hide every other element */
        body * {
            visibility: hidden;
        }
        
        *{
            visibility: hidden;
        }
        /* Then displaying print container elements */
        .invoice-print, .invoice-print * {
            visibility: visible;
        }
        /* Adjusting the position to always start from top left */
        .invoice-print {
            position: absolute;
            left: 0px;
            top: 0px;
            right: 0px;
        }
    }
</style>
<div class="container-fluid flex-grow-1 container-p-y ">
    <div class="row">
        <h4 class="font-weight-bold py-3 mb-0">Invoice</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active">Invoice</li>
        </ol>
    </div>
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-body p-5 invoice-print">
                <div class="row">
                    <div class="col-sm-6 pb-4">
                        <div class="media align-items-center mb-4">
                            <a href="index.html" class="navbar-brand app-brand demo py-0 mr-4">
                                <span class="app-brand-logo demo">
                                    @php
                                        $web = App\Models\Setting::where('status', 1)->get();
                                    @endphp
                                    @if (App\Models\Setting::exists())
                                    @if (empty($web->first()->logo))
                                        <span class="app-brand-text demo font-weight-bold text-dark">Logo</span>
                                    @else
                                        <img style="width:220px" src="{{asset('uploads/settings/logo')}}/{{$web->first()->logo}}" alt="Brand Logo" class="img-fluid">
                                    @endif
                                    @endif
                                </span>
                            </a>
                        </div>
                        {{-- <div class="mb-1">Office 154, 330 North Brand Boulevard</div>
                        <div class="mb-1">Glendale, CA 91203, USA</div>
                        <div>+0 (123) 456 7891, +9 (876) 543 2198</div> --}}
                    </div>
                    <div class="col-sm-6 text-right pb-4">
                        <h6 class="text-big text-large font-weight-bold mb-3">{{$order->order_id}}</h6>
                        <div class="mb-1">Date:
                            <strong class="font-weight-semibold">{{$order->created_at->format('F j, Y')}}</strong>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <div class="font-weight-bold mb-2">Payment Details:</div>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pr-3">Payment method:</td>
                                    <td>{{App\Models\OrderProduct::where('order_id', $order->order_id)->first()->status == 0 ? 'Cash on delivery': 'bKash payment'}}</td>
                                </tr>
                                @if (App\Models\OrderProduct::where('order_id', $order->order_id)->first()->payment_method == 2)
                                <tr>
                                    <td class="pr-3">{{App\Models\BillingDetails::where('order_id', $order->order_id)->first()->tran_number  == null ? ' ' : 'Transaction number:' }}</td>
                                    <td>{{App\Models\BillingDetails::where('order_id', $order->order_id)->first()->tran_number == null ? '': App\Models\BillingDetails::where('order_id', $order->order_id)->first()->tran_number}}</td>
                                </tr>
                                @endif
                                @if (App\Models\OrderProduct::where('order_id', $order->order_id)->first()->payment_method == 2)
                                <tr>
                                    <td class="pr-3">{{App\Models\BillingDetails::where('order_id', $order->order_id)->first()->tran_id == null ? ' ': 'Transaction id:'}}</td>
                                    <td>{{App\Models\BillingDetails::where('order_id', $order->order_id)->first()->tran_id == null ? '': App\Models\BillingDetails::where('order_id', $order->order_id)->first()->tran_id}}</td>
                                </tr>
                                @else 

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-responsive mb-4">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th class="py-3">
                                    Order id
                                </th>
                                <th class="py-3">
                                    Product name
                                </th>
                                <th class="py-3">
                                    Product image
                                </th>
                                <th class="py-3">
                                    Unit
                                </th>
                                <th class="py-3">
                                    Color
                                </th>
                                <th class="py-3">
                                    Size
                                </th>
                                <th class="py-3">
                                    Price
                                </th>
                                <th class="py-3">
                                    Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach (App\Models\Order::where('order_id', $order->order_id)->get() as $info)
                            <tr>
                                <td>{{$info->order_id}}</td>
                                <td>{{Str::limit($info->rel_to_product->product_name, '44', '')}}</td>
                                <td><img style="width: 50px" src="{{asset('uploads/products/preview')}}/{{$info->rel_to_product->preview_image}}" alt=""></td>
                                <td>{{$info->quantity}}</td>
                                <td>{{$info->color_id == 0 ? 'None' : $info->rel_to_color->color_name}}</td>
                                <td>{{$info->size_id == 0 ? 'None' : $info->rel_to_size->size_name}}</td>
                                <td>৳ {{$info->price}}</td>
                                <td>৳ {{$info->quantity*$info->price}}</td>
                                @php
                                    $total = $total + $info->quantity*$info->price
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                    <div>
                                        <strong>Total: </strong>
                                        <strong>৳ {{$total}}</strong>
                                    </div>
                                    <div class="mt-3">
                                        Charge:
                                        <strong>৳ {{$order->charge}}</strong>
                                    </div>
                                    <div class="mt-3">
                                        Discount:
                                        <strong>৳ {{$order->coupon_price}}</strong>
                                    </div>
                                    <hr>
                                    <div class="mt-3">
                                        <strong>Grand total</strong>
                                        <strong>৳ {{$order->coupon_price+$total+$order->charge}}</strong>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-muted">
                    <strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras laoreet, dolor id dapibus dapibus, neque mi tincidunt quam, quis congue ligula risus vitae magna. Curabitur ultrices nisi massa,
                    nec viverra lorem feugiat sed.
                    Mauris non porttitor nunc. Integer eu orci in magna auctor vestibulum.
                </div>
            </div>
            <div class="card-footer text-right">
                <a type="button" id="printpage" target="_blank" class="btn btn-default"><i class="ion ion-md-print"></i>&nbsp; Print</a>
                <button type="button" class="btn btn-primary ml-2"><i class="ion ion-ios-paper-plane"></i>&nbsp; Send</button>
            </div>
        </div>
    </div>
    </div>

</div>
@endsection

@section('footer_script')
<script>
    $('#printpage').click(function() {
        window.print();
    })
</script>
@endsection