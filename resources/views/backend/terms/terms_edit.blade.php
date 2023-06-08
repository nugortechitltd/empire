@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Terms Information</h6>
            <div class="card-body">
                <form method="POST" action="{{route('terms.info.update')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Terms title</label>
                            <input type="text" name="title" class="form-control" placeholder="title" value="{{$terms->first()->title}}">
                            <input type="hidden" name="terms_id" class="form-control" placeholder="title" value="{{$terms->first()->id}}">
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100 mb-2">Terms policy</label>
                            <textarea id="summernote" name="description" class="form-control" placeholder="Product description">{!! $terms->first()->description !!}</textarea>
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