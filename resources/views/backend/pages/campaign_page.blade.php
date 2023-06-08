@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Campaign Info</h6>
            <div class="card-body">
                <form method="POST" action="{{route('campaign.info.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Button</label>
                        <input type="text" name="button" class="form-control" placeholder="name">
                        @error('button')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Button url</label>
                        <input type="url" name="url" class="form-control" placeholder="url">
                        @error('url')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100">Slide image</label>
                        <label class="btn btn-outline-primary  mt-2">
                            Slide image
                            <input type="file" name="image" class="image" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                        </label>
                        @error('image')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        <img width="90" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
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
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Button</th>
                                    <th>Url</th>
                                    <th>Created</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaign_info as $info)
                                    <tr>
                                        <td><img src="{{asset('uploads/pages/campaign')}}/{{$info->image}}" alt class="img-fluid" style="width: 150px"></td>
                                        <td>{{$info->button}}</td>
                                        <td>{{$info->url}}</td>
                                        <td>{{$info->created_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{route('campaign.info.edit', $info->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('campaign.info.delete', $info->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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