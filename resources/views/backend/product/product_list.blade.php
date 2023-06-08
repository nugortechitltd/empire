@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">products</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">products</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>products</h3>
                        <a href="{{route('product.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> products</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price(TK)</th>
                                    <th>Brand</th>
                                    <th>Added by</th>
                                    <th>Status</th>
                                    <th>Validity</th>
                                    <th>Create date</th>
                                    <th>Update date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $sl=>$product)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td><img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt class="img-fluid wid-40"></td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->rel_to_category->category_name}}</td>
                                        <td>{{$product->after_discount}}</td>
                                        <td>{{$product->rel_to_brand == null ? 'Null' : $product->rel_to_brand->brand_name}}</td>
                                        <td>{{$product->rel_to_user->name}}</td>
                                        <td><span class="badge badge-{{$product->status == 1 ? 'success' : 'danger'}}">{{$product->status == 1 ? 'Active' : 'Deactive'}}</span></td>
                                        <td>
                                            @if ($product->validity == null)
                                                Null
                                            @else
                                                @if (Carbon\Carbon::now() > $product->validity)
                                                    <span class="badge badge-danger">Expired</span>
                                                @else
                                                    <span class="badge badge-success">{{Carbon\Carbon::now()->diffInDays($product->validity, false)}} days left</span>
                                                @endif
                                            @endif
                                            
                                        </td>
                                        <td>{{$product->created_at->format('d M o h:i:s')}}</td>
                                        <td>{{$product->updated_at == null ? 'Not updated': $product->updated_at->format('d M o')}}</td>
                                        <td>
                                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('product.delete', $product->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- customar project  end -->
    </div>
</div>
@endsection
