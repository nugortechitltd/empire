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
<div class="page-content mt-2">
    {{-- <form action="{{route('shop.filter')}}" method="POST">
        @csrf --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            {{-- Showing <span>{{$products->count()}} of {{App\Models\Product::all()->count()}}</span> Products --}}
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Sort by:</label>
                            <div class="select-custom">
                                <select name="sort" id="sort" class="form-control">
                                    <option value="" selected="selected">Default sort</option>
                                    <option value="1" {{@$_GET['sort'] == '1' ? 'selected': ''}}>Price - lower to higher</option>
                                    <option value="2" {{@$_GET['sort'] == '2' ? 'selected': ''}}>Price - lower to higher</option>
                                    <option value="3" {{@$_GET['sort'] == '3' ? 'selected': ''}}>Alphabetical ascending</option>
                                    <option value="4" {{@$_GET['sort'] == '4' ? 'selected': ''}}>Alphabetical descending</option>
                                    <option value="5" {{@$_GET['sort'] == '5' ? 'selected': ''}}>Discount - lower to higher</option>
                                    <option value="6" {{@$_GET['sort'] == '6' ? 'selected': ''}}>Discount - higher to lower</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center">


                        @forelse ($search_product as $product)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3 cartpage ">
                                <div class="product product-7 text-center col-none">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('product.details', $product->slug)}}">
                                            <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            {{-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a> --}}
                                            <button type="button" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist"><span>add to wishlist</span></button>
                                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div>

                                        <div class="product-action">
                                            <input type="hidden" class="product_id_value" value="{{$product->id}}">
                                            {{-- <a href="#" class="btn-product btn-cart add_to_cart"><span>add to cart</span></a> --}}
                                            <button type="button" class="btn-product btn-cart add_to_cart" title="Add to cart"><span>add to cart</span></button>
                                        </div>
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="{{route('category.one', $product->rel_to_category->id)}}">{{$product->rel_to_category->category_name}}</a>
                                        </div>
                                        <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{$product->product_name}}</a></h3><!-- End .product-title -->
                                        @if ($product->product_discount != null)
                                            <span class="new-price">৳ {{$product->after_discount}}</span>
                                            <span class="old-price">Was ৳ {{$product->product_price}}</span>
                                        @else
                                            <span class="product-price">৳ {{$product->after_discount}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                        <h2 class="text-center m-auto text-danger mt-5 pt-5">No product found</h2>
                        @endforelse
                        
                        
                    </div>
                </div>


                <div class="text-center mt-5 mb-2">
                    <a type="button" class="btn btn-viewMore btn-load-more">
                        <span>VIEW MORE PRODUCTS</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div>

            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 order-lg-first">
                
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="{{route('shop')}}">Clean All</a>
                        </div>
    
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3>
    
                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @if (!empty($_GET['category']))
                                            @php
                                                $filter_cats = explode(',', $_GET['category']);
                                            @endphp
                                        @endif
                                        @foreach ($categories as $category)
                                        <div class="filter-item">
                                            <div class="">
                                                {{-- <input id="cat{{$category->id}}" class="custom-control-input category_id" name="category" type="checkbox" value="{{$category->id}}" {{($category->id == @$_GET['category_id'])?'checked': ''}}> --}}
                                                <input type="radio" name="category" class="category_id" value="{{$category->id}}" id="cat-{{$category->id}}" {{($category->id == @$_GET['category_id'])?'checked': ''}} >
                                                <label class="custom-control-label category-custom-control-label" for="cat-{{$category->id}}">{{$category->category_name}}</label>
                                            </div>
                                            <span class="item-count">{{App\Models\Product::where('category_id', $category->id)->count()}}</span>
                                        </div>
                                        @endforeach
    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Size
                                </a>
                            </h3>
    
                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        @if (!empty($_GET['size']))
                                            @php
                                                $filter_cats = explode(',', $_GET['size']);
                                            @endphp
                                        @endif
                                        @foreach ($sizes as $size)
                                        <div class="filter-item">
                                            <div class="">
                                                {{-- <input type="radio" name="size" class="size_id" id="size-{{$size->id}}" {{($size->id == @$_GET['size_id'])?'checked': ''}} value="{{$size->id}}"> --}}
                                                <input type="radio" name="size" class="size_id_value" id="size-{{$size->id}}" {{($size->id == @$_GET['size_id'])?'checked': ''}} value="{{$size->id}}">
                                                <label class="custom-control-label size-custom-control-label" for="size-{{$size->id}}" >{{$size->size_name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Colour
                                </a>
                            </h3>
    
                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        @foreach ($colors as $key => $color)
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" name="color" class="color_id_value" value="{{$color->id}}" id="color-{{$color->id}}" style="display: none!important" {{($color->id == @$_GET['color_id'])?'checked': ''}} >
                                            {{-- <input type="radio" name="color" class="color_id" value="{{$color->id}}" id="color-{{$color->id}}" style="display: none!important" {{($color->id == @$_GET['color_id'])?'checked': ''}} > --}}
                                            <label class="custom-control-label handmade-control-label" for="color-{{$color->id}}"><span style="width: 20px;height: 20px; background:{{$color->color_code}}; display:block; border-radius: 50%; border: {{($color->id == @$_GET['color_id'])?'2px solid #fff': ''}} "></span></label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3>
    
                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        @if (!empty($_GET['brand']))
                                            @php
                                                $filter_brands = explode(',', $_GET['brand']);
                                            @endphp
                                        @endif
                                        @foreach ($brands as $brand)
                                        <div class="filter-item">
                                            <div class="">
                                                <input type="radio" class="brand_id" name="brand" {{($brand->id == @$_GET['brand_id'])?'checked': ''}}  value="{{$brand->id}}" id="brand-{{$brand->id}}">
                                                <label class="custom-control-label brand-custom-control-label" for="brand-{{$brand->id}}">{{$brand->brand_name}}</label>
                                                <span class="item-count text-right mr-4 pr-2 text-right ml-auto">({{count($brand->products)}})</span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3>
    
                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div>
    
                                        <div id="price-slider"></div>
                                    </div>
                                    <div class="nstSlider" data-range_min="0" data-range_max="10000" data-cur_min="{{@$_GET['min'] == null ? 0 : @$_GET['min']}}"
                                        data-cur_max="{{@$_GET['max'] == null ? 100000: @$_GET['max']}}">

                                        <div class="bar"></div>
                                        <div class="leftGrip price-range-grip"></div>
                                        <div class="rightGrip price-range-grip"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                {{-- </form> --}}
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection


@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection

@section('footer_script')
<script>
    $(".col-none").slice(0, 12).show();

    $(".btn-load-more").on("click", function() {
        $(".col-none:hidden").slice(0, 6).show();
        if($(".col-none:hidden").length == 0) {
            $(".btn-load-more").replaceWith("No more products");
        }
    })
</script>

{{-- search --}}
{{-- <script>
    $('.category_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('.color_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('.size_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('.brand_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('#sort').change(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
</script> --}}
@endsection