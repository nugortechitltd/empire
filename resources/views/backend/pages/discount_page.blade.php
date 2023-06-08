@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Validity</h6>
            <div class="card-body">
                <form method="POST" action="{{route('validity.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Flash sale validity</label>
                                <input type="date" id="b-m-dtp-date1" name="flash_validity" class="form-control" placeholder="Date" data-dtp="dtp_S2pSu">
                                @error('flash_validity')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Offer validity</label>
                                <input type="date" id="b-m-dtp-date2" name="offer_validity" class="form-control" placeholder="Date" data-dtp="dtp_S2pSu">
                                @error('offer_validity')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Campaign validity</label>
                                <input type="date" id="b-m-dtp-date3" name="campaign_validity" class="form-control" placeholder="Date" data-dtp="dtp_S2pSu">
                                @error('campaign_validity')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
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
    <div class="row">
        <div class="col-xl-12">
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
                                    <th>Flash validity</th>
                                    <th>Offer validity</th>
                                    <th>Campaign validity</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($validity as $validity)
                                    <tr>
                                        <td>{{$validity->flash_validity}}</td>
                                        <td>{{$validity->offer_validity == null ? 'Null': $validity->offer_validity}}</td>
                                        <td>{{$validity->campaign_validity == null ? 'Null': $validity->campaign_validity}}</td>
                                        <td>
                                            <a href="{{route('validity.info.delete', $validity->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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