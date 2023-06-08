@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <div class="card mb-4">
                <h6 class="card-header">Shipping Information</h6>
                <div class="card-body">
                    <form method="POST" action="{{route('shipping.info.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="form-label">Question</label>
                                <input type="text" name="question1" class="form-control" placeholder="question">
                                @error('question1')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Answer</label>
                                <textarea type="text" name="answer1" class="form-control" placeholder="answer"></textarea>
                                @error('answer1')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    {{-- <th>Created</th> --}}
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipping_info as $sl=>$info)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{Str::limit($info->question1, '25', '...')}}</td>
                                        <td>{{Str::limit($info->answer1, '25', '...')}}</td>
                                        {{-- <td>{{$info->created_at->format('d M Y')}}</td> --}}
                                        <td>
                                            {{-- <a href="{{route('faq.info.edit', $info->id)}}" class="btn btn-primary btn-sm"><i class="feather icon-eye"></i>&nbsp;Edit </a> --}}
                                            <a href="{{route('shipping.info.delete', $info->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <div class="card mb-4">
                <h6 class="card-header">Orders and Returns Information</h6>
                <div class="card-body">
                    <form method="POST" action="{{route('order.return.info.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="form-label">Question</label>
                                <input type="text" name="question2" class="form-control" placeholder="question">
                                @error('question2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Answer</label>
                                <textarea type="text" name="answer2" class="form-control" placeholder="answer"></textarea>
                                @error('answer2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    {{-- <th>Created</th> --}}
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_return_info as $sl=>$info2)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{Str::limit($info2->question2, '25', '...')}}</td>
                                        <td>{{Str::limit($info2->answer2, '25', '...')}}</td>
                                        {{-- <td>{{$info->created_at->format('d M Y')}}</td> --}}
                                        <td>
                                            {{-- <a href="{{route('faq.info.edit', $info->id)}}" class="btn btn-primary btn-sm"><i class="feather icon-eye"></i>&nbsp;Edit </a> --}}
                                            <a href="{{route('order.return.info.delete', $info2->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <div class="card mb-4">
                <h6 class="card-header">Payments Information</h6>
                <div class="card-body">
                    <form method="POST" action="{{route('payments.info.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="form-label">Question</label>
                                <input type="text" name="question3" class="form-control" placeholder="question">
                                @error('question3')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Answer</label>
                                <textarea type="text" name="answer3" class="form-control" placeholder="answer"></textarea>
                                @error('answer3')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    {{-- <th>Created</th> --}}
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment_info as $sl=>$info3)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{Str::limit($info3->question3, '25', '...')}}</td>
                                        <td>{{Str::limit($info3->answer3, '25', '...')}}</td>
                                        {{-- <td>{{$info->created_at->format('d M Y')}}</td> --}}
                                        <td>
                                            {{-- <a href="{{route('faq.info.edit', $info->id)}}" class="btn btn-primary btn-sm"><i class="feather icon-eye"></i>&nbsp;Edit </a> --}}
                                            <a href="{{route('payments.info.delete', $info3->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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
    {{-- <div class="row">
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
                                    <th>Image</th>
                                    <th>Subtitle</th>
                                    <th>Title</th>
                                    <th>Break title</th>
                                    <th>Black text</th>
                                    <th>Price</th>
                                    <th>Lowest price</th>
                                    <th>Created</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqinfo as $info)
                                    <tr>
                                        <td><img src="{{asset('uploads/pages/faq')}}/{{$info->image}}" alt class="img-fluid wid-40"></td>
                                        <td>{{Str::limit($info->subtitle, '20', '...')}}</td>
                                        <td>{{Str::limit($info->title, '20', '...')}}</td>
                                        <td>{{Str::limit($info->break_title, '20', '...')}}</td>
                                        <td>{{Str::limit($info->b_text, '20', '...')}}</td>
                                        <td>{{$info->price}}</td>
                                        <td>{{$info->lowest_price}}</td>
                                        <td>{{$info->created_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{route('faq.info.edit', $info->id)}}" class="btn btn-primary btn-sm"><i class="feather icon-eye"></i>&nbsp;Edit </a>
                                            <a href="{{route('faq.info.delete', $info->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection