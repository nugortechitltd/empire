@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Transactions</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('transaction.info.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="text" class="col-form-label">bKash number</label>
                            <input name="bkash" class="form-control" type="tel" placeholder="Number">
                            @error('bkash')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="text" class="col-form-label">bKash number type</label>
                            <input name="type" class="form-control" type="text" placeholder="Number type">
                            @error('type')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="text" class="col-form-label">bKash description</label>
                            <textarea name="description1" class="form-control" type="text" placeholder="Description"></textarea>
                            @error('description1')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="text" class="col-form-label">Cash on delivery description</label>
                            <textarea name="description2" class="form-control" type="text" placeholder="Description"></textarea>
                            @error('description2')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>Transaction information</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>bKash number</th>
                                    <th>bKash type</th>
                                    <th>Bkash description</th>
                                    <th>Cash on description</th>
                                    <th>Created</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info as $sl=>$info)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$info->bkash}}</td>
                                        <td>{{$info->type}}</td>
                                        <td>{{Str::limit($info->description1, '15', '...')}}</td>
                                        <td>{{Str::limit($info->description2, '15', '...')}}</td>
                                        <td>{{$info->created_at->format('d M Y')}}</td>
                                        <td> <a href="{{route('transaction.info.delete', $info->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a></td>
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