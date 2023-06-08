@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Offer Info</h6>
            <div class="card-body">
                <form method="POST" action="{{route('offer.info.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Button</label>
                        <input type="text" name="button" class="form-control" placeholder="name" value="{{$info->button}}">
                        <input type="hidden" name="offer_id" class="form-control" placeholder="Subtitle" value="{{$info->id}}">
                        @error('button')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Url</label>
                        <input type="url" name="url" class="form-control" placeholder="Title" value="{{$info->url}}">
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
                        <img style="width: 200px; height: 100px" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/pages/offer')}}/{{$info->image}}" alt="">
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