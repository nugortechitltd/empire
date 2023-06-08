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
                    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
@section('content')
<div class="page-content">
    <div class="container">
        <h2 class="title text-center mb-3">Shipping Information</h2>
        <div class="accordion accordion-rounded" id="accordion-1">
            @foreach ($shipping_info as $sl=>$shipping_info)
                
            
            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading-{{$sl+1}}">
                    <h2 class="card-title">
                        <a class="{{$sl == 0 ? ' ': 'collapsed'}}" role="button" data-toggle="collapse" href="#collapse-{{$sl+1}}" aria-expanded="{{$sl == 0 ? 'true': 'false'}}" aria-controls="collapse-{{$sl+1}}">
                            {{$shipping_info->question1}}
                        </a>
                    </h2>
                </div>
                <div id="collapse-{{$sl+1}}" class="collapse {{$sl == 0 ? 'show': ' '}}" aria-labelledby="heading-{{$sl+1}}" data-parent="#accordion-1">
                    <div class="card-body">
                        {{$shipping_info->answer1}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h2 class="title text-center mb-3">Orders and Returns</h2>
        <div class="accordion accordion-rounded" id="accordion-2">
            @foreach ($order_return_info as $li=>$info)
            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading2-{{$li+1}}">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-{{$li+1}}" aria-expanded="false" aria-controls="collapse2-{{$li+1}}">
                            {{$info->question2}}
                        </a>
                    </h2>
                </div>
                <div id="collapse2-{{$li+1}}" class="collapse" aria-labelledby="heading2-{{$li+1}}" data-parent="#accordion-2">
                    <div class="card-body">
                        {{$info->answer2}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h2 class="title text-center mb-3">Payments</h2>
        <div class="accordion accordion-rounded" id="accordion-3">
            @foreach ($payment_info as $p=>$payment)
            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading3-{{$p+1}}">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-{{$p+1}}" aria-expanded="false" aria-controls="collapse3-{{$p+1}}">
                            {{$payment->question3}}
                        </a>
                    </h2>
                </div>
                <div id="collapse3-{{$p+1}}" class="collapse" aria-labelledby="heading3-{{$p+1}}" data-parent="#accordion-3">
                    <div class="card-body">
                        {{$payment->answer3}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection