@extends('frontend.master.master')
@section('computer')
<div class="dropdown category-dropdown show is-on" data-visible="false">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        Browse Categories
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach (App\Models\Category::all() as $category)
                    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('content')
{{-- @if (session('success')) --}}
<div class="page-content mt-3">
        <div class="col-lg-7 m-auto mt-5">
            <div class="summary summary-cart">
                <h3>Your Order is Completed!</h3><!-- End .summary-title -->
                <p class="ft-regular fs-md">Your order <span class="text-body text-dark">#</span> has been completed. Your order details are shown for your personal accont.</p>
                <a class="btn btn-primary mt-2" href="{{ url('/') }}">Shop Again</a>
            </div><!-- End .summary -->
        </div>
</div>
{{-- @endif --}}
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach (App\Models\Category::all() as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection