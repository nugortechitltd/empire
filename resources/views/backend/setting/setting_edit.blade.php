@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Setting Info</h6>
            <div class="card-body">
                <form method="POST" action="{{route('setting.update')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="form-label">Website name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$setting->first()->name}}">
                                <input type="hidden" name="setting_id" class="form-control" placeholder="Name" value="{{$setting->first()->id}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Website title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{$setting->first()->title}}">
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="form-label">Meta description content</label>
                                <input type="text" name="description" class="form-control" placeholder="Description" value="{{$setting->first()->description}}">
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="form-label">Meta keywords content</label>
                                <input type="text" name="keywords" class="form-control" placeholder="Keywords" value="{{$setting->first()->keywords}}">
                                @error('keywords')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="form-label">Footer copyright</label>
                                <input type="text" name="copyright" class="form-control" placeholder="Copyright" value="{{$setting->first()->copyright}}">
                                @error('copyright')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <div class="col-lg-12"> --}}
                                <label class="form-label">About us</label>
                                <textarea name="setting_info" class="form-control" placeholder="Info">{{$setting->first()->setting_info}}"</textarea>
                                @error('setting_info')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            {{-- </div> --}}
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">Logo</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Website logo
                                        <input type="file" name="logo" class="image" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                                    </label>
                                    @error('logo')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                    <img width="90" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/settings/logo')}}/{{$setting->first()->logo}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">Favicon</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Website favicon
                                        <input type="file" name="favicon" class="image2" onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])">
                                    </label>
                                    @error('favicon')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                    <img width="90" class="mt-3 mb-3" id="favicon" height="auto" src="{{asset('uploads/settings/favicon')}}/{{$setting->first()->favicon}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">App image</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        App image
                                        <input type="file" name="app_image" class="image3" onchange="document.getElementById('app_image').src = window.URL.createObjectURL(this.files[0])">
                                    </label>
                                    @error('app_image')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                    <img width="90" class="mt-3 mb-3" id="app_image" height="auto" src="{{asset('uploads/settings/app_image')}}/{{$setting->first()->app_image}}" alt="">
                                </div>
                            </div>
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