@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Settings</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Setting list</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>settings</h3>
                        <a href="{{route('setting.info')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> settings</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Logo</th>
                                    <th>App image</th>
                                    <th>Name</th>
                                    <th>Copyright</th>
                                    <th>About us</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $sl=>$setting)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td><img src="{{asset('uploads/settings/logo')}}/{{$setting->logo}}" alt class="img-fluid wid-40"></td>
                                        <td><img src="{{asset('uploads/settings/app_image')}}/{{$setting->app_image}}" alt class="img-fluid wid-40"></td>
                                        <td>{{$setting->name}}</td>
                                        <td>{{Str::limit($setting->copyright, '20', '...')}}</td>
                                        <td>{{Str::limit($setting->description, '20', '...')}}</td>
                                        <td>{{$setting->created_at->format('d M o h:i:s')}}</td>
                                        <td>{{$setting->updated_at == null ? 'Not updated': $setting->updated_at->format('d M o')}}</td>
                                        <td><a href="{{route('setting.info.status', $setting->id)}}" class="badge badge-{{$setting->status == 1 ? 'success' : 'danger'}}">{{$setting->status == 1 ? 'Active' : 'Deactive'}}</a></td>
                                        <td>
                                            <a href="{{route('setting.edit', $setting->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('setting.delete', $setting->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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
