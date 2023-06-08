@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Privacy Information</h6>
            <div class="card-body">
                <form method="POST" action="{{route('privacy.info.update')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Privacy title</label>
                            <input type="text" name="title" class="form-control" placeholder="title" value="{{$privacy->first()->title}}">
                            <input type="hidden" name="privacy_id" class="form-control" placeholder="title" value="{{$privacy->first()->id}}">
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100 mb-2">Privacy terms & conditions</label>
                            <textarea id="summernote" name="description" class="form-control" placeholder="Product description">{!! $privacy->first()->description !!}</textarea>
                            @error('description')
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
</div>
@endsection