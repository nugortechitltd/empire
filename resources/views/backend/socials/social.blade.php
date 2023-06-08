@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Socials</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('social.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="" class="form-label">Social Name</label>
                            <input type="text" name="name" class="form-control" placeholder="social name">
                            @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Social font awesome code</label>
                            <input type="text" name="social" class="form-control" placeholder="social fontawesome">
                            @error('social')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Social link url</label>
                            <input type="url" name="social_url" class="form-control" placeholder="social link url">
                            @error('social')
                                <strong class="text-danger">{{$message}}</strong>
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
                        <h3>socials</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Social name</th>
                                    <th>Social fontawesome name</th>
                                    <th>Social fontawesome url</th>
                                    <th>Created_at</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socials as $sl=>$social)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$social->name}}</td>
                                        <td>{{$social->social}}</td>
                                        <td>{{$social->social_url}}</td>
                                        <td>{{$social->created_at->format('d M Y')}}</td>
                                        <td> <a href="{{route('social.delete', $social->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a></td>
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