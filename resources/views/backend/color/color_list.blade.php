@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Colors</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Colors</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>Colors</h3>
                        <a href="{{route('color.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> colors</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Color name</th>
                                    <th>Color code</th>
                                    <th>Create Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $sl=>$color)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$color->color_name}}</td>
                                        <td>@if ($color->color_code == null)
                                            null
                                        @else
                                        <div style="width:50px ; height: 50px; border-radius: 100%; background: {{$color->color_code}}"></div>
                                        @endif</td>
                                        <td>{{$color->created_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{route('color.delete', $color->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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