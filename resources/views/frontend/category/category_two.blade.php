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
                    <li><a href="{{route('category.one', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
@section('content')
<div class="mb-4"></div>

<div class="container">
    <ul class="menu-category entry-filter justify-content-center row">
        @foreach ($categories as $category)
        <li class="col-md-3  col-6 col-sm-4 col-lg-2 ">
            <a href="{{route('category.one', $category->id)}}" data-filter="*" class="cat-block">
                <figure class="d-flex align-items-center justify-content-center">
                    <span>
                        <img class="pt-2 pb-1" src="{{asset('uploads/category')}}/{{$category->category_image}}" alt="Category image">
                    </span>
                </figure>

                <h3 class="cat-block-title">{{$category->category_name}}</h3>
            </a>
        </li>
        @endforeach
    </ul>
</div>
<div class="mb-1"></div>

<div class="container new-arrivals">

    <div class="heading heading-flex heading-border">
        <div class="heading-left mb-1">
            <h2 class="title">All Product</h2>
        </div>

       <!-- <div class="heading-right">
            <a href="" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
       </div> -->
    </div>

    

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-2 col-md-3 col-6 col-none cartpage">
                    <div class="product">
                        <figure class="product-media">
                            <a href="{{route('product.details', $product->slug)}}">
                                <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                {{-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a> --}}
                                <button type="button" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist"><span>add to wishlist</span></button>
                                
                                <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <input type="hidden" class="product_id_value" value="{{$product->id}}">
                                {{-- <a href="#" class="btn-product btn-cart add_to_cart" title="Add to cart"><span>add to cart</span></a> --}}
                                <button type="button" class="btn-product btn-cart add_to_cart" title="Add to cart"><span>add to cart</span></button>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{route('category.one', $product->rel_to_category->id)}}">{{$product->rel_to_category->category_name}}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{Str::limit($product->product_name, '19', '')}}</a></h3><!-- End .product-title -->
                            @if ($product->product_discount != null)
                                <span class="new-price">৳ {{$product->after_discount}}</span>
                                <span class="old-price">Was ৳ {{$product->product_price}}</span>
                            @else
                                <span class="product-price">৳ {{$product->after_discount}}</span>
                            @endif
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="arrivals-women-tab" role="tabpanel" aria-labelledby="arrivals-women-link">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product demo21">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="{{route('product.details', $product->slug)}}">
                                <img src="assets/images/demos/demo-21/newArrivals/product-2.jpg" alt="Product image" class="product-image">
                            </a>

                        </figure><!-- End .product-media -->

                        <div class="product-body text-center">
                            <div class="product-cat">
                                <a href="#">Jackets &amp; Vests</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">The North Face Fanorak 2.0</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">$76.99</span>
                                <span class="old-price">Was $109.99</span>
                            </div><!-- End .product-price -->
                            

                            <div class="product-action">
                                <button type="button" class="btn-product btn-cart" title="Add to cart"><span>ADD TO CART</span></button>
                            </div><!-- End .product-action -->

                            <a href="#" class="btn-addtolist"><span>&nbsp;Add to Wishlist</span></a>

                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product demo21">
                        <figure class="product-media">
                            <a href="{{route('product.details', $product->slug)}}">
                                <img src="assets/images/demos/demo-21/newArrivals/product-6.jpg" alt="Product image" class="product-image">
                            </a>

                        </figure><!-- End .product-media -->

                        <div class="product-body text-center">
                            <div class="product-cat">
                                <a href="#">Tops</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">Alphaskin Sport Bra</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="cur-price">$34.99</span>
                            </div><!-- End .product-price -->
                            

                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #d64042;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>ADD TO CART</span></a>
                            </div><!-- End .product-action -->

                            <a href="#" class="btn-addtolist"><span>&nbsp;Add to Wishlist</span></a>

                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div>
            </div>
        </div>
    </div><!-- End .tab-content -->
    <div class="load-more-container text-center mb-5">
        {{-- <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></a> --}}
        <button class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></button>
    </div>
</div>

<div class=""></div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection

@section('footer_script')
    <script>
        $(".col-none").slice(0, 3).show();

        $(".btn-load-more").on("click", function() {
            $(".col-none:hidden").slice(0, 3).show();
            if($(".col-none:hidden").length == 0) {
                // $(".btn-load-more").fadeOut();
                $(".btn-load-more").replaceWith("No more products");
            }
        })
    </script>
@endsection