@extends('frontend.master.master')
@section('computer')

<div class="dropdown category-dropdown show is-on" data-visible="true">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        Browse Categories
    </a>
    <div class="dropdown-menu show">
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
    <div class="row">
        <div class="col-lg-3"></div>
    <div class="col-lg-9">
        <div class="intro-slider-container">
    
            <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                    "nav": false,
                    "responsive": {
                        "992": {
                            "nav": true
                        }
                    }
                }'>
                @foreach ($index_info as $info)
                <div class="intro-slide" style="background-image: url({{asset('uploads/pages/index')}}/{{$info->image}});">
                    <div class="container intro-content">
                        <div class="row">
                            <div class="col-auto offset-lg-3 intro-col">
                                
                                {{-- <h3 class="intro-subtitle">{{$info->subtitle}}</h3>
                                <h1 class="intro-title">{{$info->title}} <br>{{$info->break_title}}
                                    <span>
                                        <sup class="font-weight-light">{{$info->b_text}}</sup>
                                        <span class="text-primary">${{$info->price}}<sup>,{{$info->lowest_price}}</sup></span>
                                    </span>
                                </h1> --}}

                                <a href="{{$info->url}}" class="btn btn-outline-primary-2" style="position: relative; top: 100px">
                                    <span>{{$info->button}}</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="intro-slide" style="background-image: url({{asset('frontend/assets/images/demos/demo-13/slider/slide-2.jpg')}});">
                    <div class="container intro-content">
                        <div class="row">
                            <div class="col-auto offset-lg-3 intro-col">
                                <h3 class="intro-subtitle">Trevel & Outdoor</h3>
                                <h1 class="intro-title">Original Outdoor <br>Beanbag
                                    <span>
                                        <sup class="font-weight-light line-through">$89,99</sup>
                                        <span class="text-primary">$29<sup>,99</sup></span>
                                    </span>
                                </h1>
                                <a href="{{route('shop')}}" class="btn btn-outline-primary-2">
                                    <span>Shop Now</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="intro-slide" style="background-image: url({{asset('frontend/assets/images/demos/demo-13/slider/slide-3.jpg')}});">
                    <div class="container intro-content">
                        <div class="row">
                            <div class="col-auto offset-lg-3 intro-col">
                                <h3 class="intro-subtitle">Fashion Promotions</h3>
                                <h1 class="intro-title">Tan Suede <br>Biker Jacket
                                    <span>
                                        <sup class="font-weight-light line-through">$240,00</sup>
                                        <span class="text-primary">$180<sup>,99</sup></span>
                                    </span>
                                </h1>
                                <a href="{{route('shop')}}" class="btn btn-outline-primary-2">
                                    <span>Shop Now</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <span class="slider-loader"></span>
        </div>
    </div>
    </div>


</div>
<!-- End .intro-slider-container -->


<div class="mb-4"></div>

<div class="container">
<div class="heading heading-flex heading-border">
    <div class="heading-left">
        <h2 class="title">Explore Popular Categories</h2>
    </div>

   <div class="heading-right">
        <a href="{{route('category')}}" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
   </div>
</div>

<div class="cat-blocks-container">
    <div class="row">
        @foreach ($categoryy as $category)
        <div class="col-6 col-sm-4 col-lg-2">
            <a href="{{route('category.one', $category->id)}}" class="cat-block">
                <figure>
                    <span>
                        <img class="pt-2 pb-1" src="{{asset('uploads/category')}}/{{$category->category_image}}" alt="Category image">
                    </span>
                </figure>

                <h3 class="cat-block-title">{{$category->category_name}}</h3>
            </a>
        </div>
        @endforeach
    </div>
</div>
</div>

<div class="mb-2"></div>

<div class="bg-light">
<div class="container">
    <!-- <div class="heading heading-flex heading-border ">
        <div class="heading-left">
            
        </div>

       <div class="heading-right">
        <div class=" d-flex align-items-center">
            <h2 class="title">Flash Sale <span class="pl-xl-5 pl-md-5 pl-sm-4">Ending In</span></h2>
            <span class="deal-countdown offer-countdown" data-until="+11d"></span>
        </div>
       </div>
    </div> -->

    <div class="heading heading-flex heading-border">
        <div class="heading-left">
            <div class="heading-left-inner d-flex align-items-center">
                <h2 class="title">Flash Sale <span class="pl-xl-5 pl-md-5 pl-sm-4">Ending In</span></h2>
                
                <span class="deal-countdown offer-countdown" data-until="+{{Carbon\Carbon::now()->diffInDays($validity->first()->flash_validity, false)}}d"></span>
            </div>
        </div>

       <div class="heading-right">
            <a href="{{route('offer')}}" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
       </div>
    </div>

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                @foreach ($discount_products as $product)
                    <div class="product cartpage">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="{{route('product.details', $product->slug)}}">
                                <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <button type="button" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist"><span>add to wishlist</span></button>
                                
                                <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview"><span>Quick view</span></a>
                                <input type="hidden" class="product_id_value" value="{{$product->id}}">
                                {{-- <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" > --}}
                            </div>

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart add_to_cart" title="Add to cart"><span>add to cart</span></a>
                            </div>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{route('category.one', $product->rel_to_category->id)}}">{{$product->rel_to_category->category_name}}</a>
                            </div>
                            <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{Str::limit($product->product_name, '19', '')}}</a></h3>
                            @if ($product->product_discount != null)
                                <span class="new-price d-block">৳ {{$product->after_discount}}</span>
                                <span class="old-price">Was ৳ {{$product->product_price}}</span>
                            @else
                                <span class="product-price">৳ {{$product->after_discount}}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="hot-elec-tab" role="tabpanel" aria-labelledby="hot-elec-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-4.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Clothes</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Tan suede biker jacket</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$240.00</span>
                            <span class="old-price">Was $310.00</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-1.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Butler Stool Ladder</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$251.99</span>
                            <span class="old-price">Was $290.00</span>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-2.jpg" alt="Product image" class="product-image">
                        </a>

                        <!--  -->

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Electronics</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Bose - SoundSport  wireless headphones</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$179.99</span>
                            <span class="old-price">Was $199.99</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-3.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Can 2-Seater Sofa <br>frame charcoal</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$3.050.00</span>
                            <span class="old-price">Was $3.200.00</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-5.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-countdown" data-until="+7h" data-format="HMS" data-relative="true" data-labels-short="true"></div>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Electronics</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Sony - Class LED 2160p Smart 4K Ultra HD</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$1699.99</span>
                            <span class="old-price">Was $1999.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="hot-furn-tab" role="tabpanel" aria-labelledby="hot-furn-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-3.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Can 2-Seater Sofa <br>frame charcoal</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$3.050.00</span>
                            <span class="old-price">Was $3.200.00</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-5.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-countdown" data-until="+7h" data-format="HMS" data-relative="true" data-labels-short="true"></div>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Electronics</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Sony - Class LED 2160p Smart 4K Ultra HD</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$1699.99</span>
                            <span class="old-price">Was $1999.99</span>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-6.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Appliances</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Neato Robotics</a></h3>
                        <div class="product-price">
                            $399.00
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-4.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Clothes</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Tan suede biker jacket</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$240.00</span>
                            <span class="old-price">Was $310.00</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-1.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Butler Stool Ladder</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$251.99</span>
                            <span class="old-price">Was $290.00</span>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-2.jpg" alt="Product image" class="product-image">
                        </a>

                        <!--  -->

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Electronics</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Bose - SoundSport  wireless headphones</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$179.99</span>
                            <span class="old-price">Was $199.99</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="hot-clot-tab" role="tabpanel" aria-labelledby="hot-clot-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-1.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Butler Stool Ladder</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$251.99</span>
                            <span class="old-price">Was $290.00</span>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-3.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Can 2-Seater Sofa <br>frame charcoal</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$3.050.00</span>
                            <span class="old-price">Was $3.200.00</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-4.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Clothes</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Tan suede biker jacket</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$240.00</span>
                            <span class="old-price">Was $310.00</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-2.jpg" alt="Product image" class="product-image">
                        </a>

                        <!--  -->

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Electronics</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Bose - SoundSport  wireless headphones</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$179.99</span>
                            <span class="old-price">Was $199.99</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="hot-acc-tab" role="tabpanel" aria-labelledby="hot-acc-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-6.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Appliances</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Neato Robotics</a></h3>
                        <div class="product-price">
                            $399.00
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-1.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Butler Stool Ladder</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$251.99</span>
                            <span class="old-price">Was $290.00</span>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-5.jpg" alt="Product image" class="product-image">
                        </a>

                        

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Electronics</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Sony - Class LED 2160p Smart 4K Ultra HD</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$1699.99</span>
                            <span class="old-price">Was $1999.99</span>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-3.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Furniture</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Can 2-Seater Sofa <br>frame charcoal</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$3.050.00</span>
                            <span class="old-price">Was $3.200.00</span>
                        </div>
                        
                    </div>
                </div>

                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-13/products/product-4.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Clothes</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Tan suede biker jacket</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$240.00</span>
                            <span class="old-price">Was $310.00</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End .tab-content -->
</div>
</div><!-- End .bg-light pt-5 pb-5 -->

<div class="mb-1"></div>

<div class="container electronics">
<div class="heading heading-flex heading-border ">
    <div class="heading-left">
        <h2 class="title">New Arrival</h2>
    </div>

   <div class="heading-right">
        <a href="{{route('category')}}" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
   </div>
</div>

<div class="tab-content tab-content-carousel">
    <div class="tab-pane p-0 fade show active" id="elec-new-tab" role="tabpanel" aria-labelledby="elec-new-link">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1280": {
                        "items":6,
                        "nav": true
                    }
                }
            }'>
            @foreach ($latest_products as $product)
                
            
            <div class="product cartpage">
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
                        <a href="#" class="btn-product btn-cart add_to_cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="{{route('category.one', $product->rel_to_category->id)}}">{{$product->rel_to_category->category_name}}</a>
                    </div>
                    <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{Str::limit($product->product_name, '19', '')}}</a></h3>
                    @if ($product->product_discount != null)
                        <span class="new-price d-block">৳ {{$product->after_discount}}</span>
                        <span class="old-price">Was ৳ {{$product->product_price}}</span>
                    @else
                        <span class="product-price">৳ {{$product->after_discount}}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="elec-featured-tab" role="tabpanel" aria-labelledby="elec-featured-link">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1280": {
                        "items":6,
                        "nav": true
                    }
                }
            }'>
            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-9.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-sale">Sale</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-10.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Cell Phone</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL 128GB</a></h3>
                    <div class="product-price">
                        $899.99
                        <span class="new-price d-block">$350.00</span>
                        <span class="old-price">Was $410.00</span>
                    </div>
                    
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-8.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        $79.99
                    </div>
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-top">Top</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-7.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.00
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="elec-best-tab" role="tabpanel" aria-labelledby="elec-best-link">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1280": {
                        "items":6,
                        "nav": true
                    }
                }
            }'>
            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-top">Top</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-7.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Laptops</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3>
                    <div class="product-price">
                        $1,199.00
                    </div>
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-8.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Audio</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3>
                    <div class="product-price">
                        $79.99
                    </div>
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-6.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Appliances</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Neato Robotics</a></h3>
                    <div class="product-price">
                        $399.00
                    </div>
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-sale">Sale</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-10.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Cell Phone</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL 128GB</a></h3>
                    <div class="product-price">
                        $899.99
                        <span class="new-price d-block">$350.00</span>
                        <span class="old-price">Was $410.00</span>
                    </div>
                    
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-9.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Tablets</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3>
                    <div class="product-price">
                        $899.99
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div><!-- End .tab-content -->
</div>

<div class="mb-1"></div>

<div class="container furniture">
<div class="heading heading-flex heading-border">
    <div class="heading-left">
        <h2 class="title">Best Selling</h2>
    </div>

   <div class="heading-right">
        <a href="{{route('category')}}" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
   </div>
</div>

<div class="tab-content tab-content-carousel">
    <div class="tab-pane p-0 fade show active" id="furn-new-tab" role="tabpanel" aria-labelledby="furn-new-link">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1280": {
                        "items":6,
                        "nav": true
                    }
                }
            }'>
            @foreach ($top_selling_products as $top_sell)
            <div class="product cartpage">
                <figure class="product-media">
                    {{-- <span class="product-label label-new">New</span> --}}
                    <a href="{{route('product.details', $top_sell->rel_to_product->slug)}}">
                        <img src="{{asset('uploads/products/preview')}}/{{$top_sell->rel_to_product->preview_image}}" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        {{-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a> --}}
                        <button type="button" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist"><span>add to wishlist</span></button>
                        
                        <a href="{{route('product_quick_view', $top_sell->rel_to_product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <input type="hidden" class="product_id_value" value="{{$top_sell->rel_to_product->id}}">
                        <button type="button" class="btn-product btn-cart add_to_cart" title="Add to cart"><span>add to cart</span></button>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="{{route('category.one', $top_sell->rel_to_product->rel_to_category->id)}}">{{$top_sell->rel_to_product->rel_to_category->category_name}}</a>
                    </div>
                    <h3 class="product-title"><a href="{{route('product.details', $top_sell->rel_to_product->slug)}}">{{Str::limit($top_sell->rel_to_product->product_name, '19', '')}}</a></h3>
                    @if ($top_sell->rel_to_product->product_discount != null)
                        <span class="new-price d-block">৳ {{$top_sell->rel_to_product->after_discount}}</span>
                        <span class="old-price">Was ৳ {{$top_sell->rel_to_product->product_price}}</span>
                    @else
                        <span class="product-price">৳ {{$top_sell->rel_to_product->after_discount}}</span>
                    @endif
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="furn-featured-tab" role="tabpanel" aria-labelledby="furn-featured-link">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1280": {
                        "items":6,
                        "nav": true
                    }
                }
            }'>
            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-sale">Sale</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-13.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Lighting</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Carronade Large Suspension Lamp</a></h3>
                    <div class="product-price">
                        <span class="new-price d-block">$892.00</span>
                        <span class="old-price">Was $939.00</span>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane p-0 fade" id="furn-best-tab" role="tabpanel" aria-labelledby="furn-best-link">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1280": {
                        "items":6,
                        "nav": true
                    }
                }
            }'>
            <div class="product">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-12.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Sofas</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Roots Sofa Bed</a></h3>
                    <div class="product-price">
                        $1,199.99
                    </div>
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-sale">Sale</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-13.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Lighting</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Carronade Large Suspension Lamp</a></h3>
                    <div class="product-price">
                        <span class="new-price d-block">$892.00</span>
                        <span class="old-price">Was $939.00</span>
                    </div>
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-14.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Chairs</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Wingback Chair</a></h3>
                    <div class="product-price">
                        $210.00
                    </div>
                    
                </div>
            </div>

            <div class="product">
                <figure class="product-media">
                    <span class="product-label label-sale">Sale</span>
                    <a href="product.html">
                        <img src="assets/images/demos/demo-13/products/product-19.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        
                        <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Chairs</a>
                    </div>
                    <h3 class="product-title"><a href="product.html">Flow Slim Armchair</a></h3>
                    <div class="product-price">
                        <span class="new-price d-block">$737,00</span>
                        <span class="old-price">Was $820.00</span>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div><!-- End .tab-content -->
</div>

<div class="mb-1"></div>

<div class="container new-arrivals">

<div class="heading heading-flex heading-border">
    <div class="heading-left mb-1">
        <h2 class="title">Explore More Product</h2>
    </div>

   <!-- <div class="heading-right">
        <a href="" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
   </div> -->
</div>



<div class="tab-content tab-content-carousel">
    <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
        <div class="row">

            @foreach ($products as $product)
            <div class="col-lg-2 col-md-3 col-6 cartpage col-none">
                <div class="product">
                    <figure class="product-media">
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
                            <button type="button" class="btn-product btn-cart add_to_cart" title="Add to cart"><span>add to cart</span></button>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="{{route('category.one', $product->rel_to_category->id)}}">{{$product->rel_to_category->category_name}}</a>
                        </div>
                        <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{Str::limit($product->product_name, '19', '')}}</a></h3>
                        @if ($product->product_discount != null)
                            <span class="new-price d-block">৳ {{$product->after_discount}}</span>
                            <span class="old-price">Was ৳ {{$product->product_price}}</span>
                        @else
                            <span class="product-price">৳ {{$product->after_discount}}</span>
                        @endif
                    </div>
                </div>

                {{-- <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-top">Top</span>
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-countdown" data-until="+{{Carbon\Carbon::now()->diffInHours($product->validity, false)}}h" data-relative="true" data-labels-short="true"></div>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">{{$product->product_category}}</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">{{$product->product_name}}</a></h3>
                        <div class="product-price">
                            @if ($product->product_discount != null)
                                <span class="new-price d-block">${{$product->after_discount}}</span>
                                <span class="old-price">Was ${{$product->product_price}}</span>
                            @else
                                <span class="new-price d-block">${{$product->after_discount}}</span>
                            @endif
                            
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-sale">Sale</span>
                        <a href="product.html">
                            <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                        </a>
                        <div class="product-countdown" data-until="+{{Carbon\Carbon::now()->diffInHours($product->validity, false)}}h" data-relative="true" data-labels-short="true"></div>
    
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            
                            <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>
    
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                        </div>
                    </figure>
    
                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">{{$product->product_category}}</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">{{$product->product_name}}</a></h3>
                        <div class="product-price">
                            @if ($product->product_discount != null)
                                <span class="new-price d-block">${{$product->after_discount}}</span>
                                <span class="old-price">Was ${{$product->product_price}}</span>
                            @else
                                <span class="new-price d-block">${{$product->after_discount}}</span>
                            @endif
                        </div>
                        
                    </div>
                </div> --}}
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
                        <a href="product.html">
                            <img src="assets/images/demos/demo-21/newArrivals/product-2.jpg" alt="Product image" class="product-image">
                        </a>

                    </figure>

                    <div class="product-body text-center">
                        <div class="product-cat">
                            <a href="#">Jackets &amp; Vests</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">The North Face Fanorak 2.0</a></h3>
                        <div class="product-price">
                            <span class="new-price d-block">$76.99</span>
                            <span class="old-price">Was $109.99</span>
                        </div>
                        

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>ADD TO CART</span></a>
                        </div>

                        <a href="#" class="btn-addtolist"><span>&nbsp;Add to Wishlist</span></a>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="product demo21">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/demos/demo-21/newArrivals/product-6.jpg" alt="Product image" class="product-image">
                        </a>

                    </figure>

                    <div class="product-body text-center">
                        <div class="product-cat">
                            <a href="#">Tops</a>
                        </div>
                        <h3 class="product-title"><a href="product.html">Alphaskin Sport Bra</a></h3>
                        <div class="product-price">
                            <span class="cur-price">$34.99</span>
                        </div>
                        

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #d64042;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>ADD TO CART</span></a>
                        </div>

                        <a href="#" class="btn-addtolist"><span>&nbsp;Add to Wishlist</span></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End .tab-content -->
<div class="load-more-container text-center mb-3">
    <button type="button" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></button>
</div>
</div>

<div class=""></div>
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
    {{-- <script>
        $(document).ready(function() {
            $('.add_to_cart').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = $(this).closest(".cartpage").find('.product_id_value').val();
                $.ajax({
                    url: '/add_single_cart',
                    type: 'POST',
                    data: {
                        'product_id': product_id,
                    },
                    success: function (response) {
                        if(response.error_status == 'error') {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.error(response.status);
                        } else {
                            alertify.set('notifier','position','top-right');
                            alertify.success(response.status);
                            cartload();
                            $('#load').load(location.href + ' .counted');
                        }
                    }
                })
            })
        })
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            $('.add_to_wishlist').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = $(this).closest(".cartpage").find('.product_id_value').val();
                $.ajax({
                    url: '/add-wishlist',
                    type: 'POST',
                    data: {
                        'product_id': product_id,
                    },
                    success: function (response) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(response.status);
                    }
                })
            })
        })
    </script> --}}
    <script>
        $(".col-none").slice(0, 12).show();

        $(".btn-load-more").on("click", function() {
            $(".col-none:hidden").slice(0, 6).show();
            if($(".col-none:hidden").length == 0) {
                // $(".btn-load-more").fadeOut();
                $(".btn-load-more").replaceWith("No more products");
            }
        })
    </script>
@endsection