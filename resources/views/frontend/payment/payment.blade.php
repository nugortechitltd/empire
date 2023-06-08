@extends('frontend.master.master')
@section('computer')
<div class="dropdown category-dropdown show is-on" data-visible="false">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        Browse Categories
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach ($categories as $category)
                    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="container">
                <div class="card p-5 mt-2 mb-2">
                    <div class="card-header">
                        <h4 class="pl-3">{{$payment_info->first()->title}}</h4>
                        <hr class="ml-3 mr-5">
                    </div>
                    <div class="card-body">
                        
                        {!! $payment_info->first()->description !!}

                        <div class="text-center">
                            <hr><h6>Call the number below for details</h6><p><span>Mobile: {{$contact_info->first()->contact_number}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
@endsection


@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection