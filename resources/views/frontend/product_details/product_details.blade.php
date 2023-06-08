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
    <div class="container mt-2">
        <div class="product-details-top">
            <div class="product_data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                        
                                    <img id="product-zoom" src="{{asset('uploads/products/gallery')}}/{{$product_gallery->first()->gallery_image}}" data-zoom-image="{{asset('uploads/products/gallery')}}/{{$product_gallery->first()->gallery_image}}" alt="product image">
                                    
                                    <a href="" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure>
    
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($product_gallery as $sl=>$gallery)
                                        
                                    
                                    <a class="product-gallery-item {{$sl == 0 ? 'active': ''}}" href="#" data-image="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}" data-zoom-image="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}">
                                            <img style="height: 100%" src="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}" alt="product side">
                                    </a>
                                    @endforeach
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->
    
                    <div class="col-md-6">
                        <form action="{{route('buy.store')}}" method="POST">
                            @csrf
                            <div class="product-details">
                                <h1 class="product-title">{{$product_info->first()->product_name}}</h1>
                                <div class="product-price">
                                    Price: <span class="pl-3">৳ {{$product_info->first()->after_discount}}</span><span class="line-through pl-3 text-dark" style="font-size: 14px">৳{{$product_info->first()->product_price}}</span>
                                </div><!-- End .product-price -->
    
                                <div class="details-filter-row details-row-size">
                                    <input type="hidden" name="product_id" class="product_id" value="{{$product_info->first()->id}}">
    
                                    <div class="product-nav product-nav-thumbs">
                                        <label for="color">Color:</label>
                                        <div class="select-custom">
                                            {{-- {{$colors}} --}}
                                            <select name="color" class="form-control colorId color_id">
                                                <option value="">Select a color</option>
                                                @foreach ($colors as $color)
                                                <option value="{{$color->color_id}}">{{$color->color_id == 0 ? 'No color': $color->rel_to_color->color_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('color')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div><!-- End .product-nav -->
                                </div><!-- End .details-filter-row -->
    
                                <div class="details-filter-row details-row-size">
                                    <label for="size">Size:</label>
                                    <div class="select-custom">
                                        <select name="size" id="sizeId" class="form-control size_id">
                                            <option value="">Select a size</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                    @error('size')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div><!-- End .details-filter-row -->
    
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" name="quantity" id="qty" class="form-control qty-input" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->
    
                                <div style="width: 100%; border: 2px dashed #ddd;">
                                    <div class="obd-pre-order-product-details-prod-short-desc-call"> 
                                        
                                        
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h5 class="d-block">Please call for details</h5>
                                                <a href="tel:01933339963" class="support-number">  
                                                    <i class="fa fa-phone"></i> 
                                                    01933339963 <span class="bkash_personal">Customer Care</span>
                                                </a>
                                            </div>
                                            <div class="social-media-business d-flex pl-5 align-items-center justify-content-center">
                                                <span style="height: 120px; border: 2px dashed #ddd;"></span>
                                                <a href="https://wa.me/01737137303?text={{URL::to('/').'/product/details/'.$product_info->first()->slug}}" target="_blank" class="pl-5 ml-5"><i class="icon-whatsapp"></i></a>
                                                {{-- <a href="https://twitter.com/sharer.php?url=[{{URL::to('/').'/product/details/'.$product_info->first()->slug}}]"><i class="icon-facebook-messenger"></i></a> --}}
                                                {{-- <a href="https://twitter.com/share?url={{URL::to('/').'/product/details/'.$product_info->first()->slug}}" target="_"><i class="icon-facebook-messenger"></i></a> --}}
                                                <a href="https://www.facebook.com/sharer.php?u={{URL::to('/').'/product/details/'.$product_info->first()->slug}}" target="_"><i class="icon-facebook-messenger"></i></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
    
                                <div class="product-details-action mt-3">
                                    <button type="submit" class="btn-product btn-cart btn-buy mr-5"><span>Buy now</span></button>
                                    <button type="button" class="btn-product btn-cart add-to-cart-btn" id="load"><span>add to cart</span></button>
                                </div><!-- End .product-details-action -->
    
                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="{{route('category.one', $product_info->first()->rel_to_category->id)}}">{{$product_info->first()->rel_to_category->category_name}}</a>
                                    </div><!-- End .product-cat -->
    
                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        @foreach (App\Models\Social::all() as $social)
                                            <a href="{{$social->social_url}}" target="_" class="social-icon social-{{$social->name}}" title="{{$social->name}}" target="_blank"><i class="{{$social->social}}"></i></a>
                                        @endforeach
                                        {{-- <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a> --}}
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </form>
                    </div><!-- End .col-md-6 -->
                </div>
            </div>
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content" style="font-size: 100px!important">
                        {{-- {!! $product_info->first()->description !!} --}}
                        {{-- {!! $product_info->first()->description !!} --}}
                        {!! $product_info->first()->description !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
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
                    "1200": {
                        "items":4,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
            @foreach ($related_products as $products)
            <div class="product product-7 text-center cartpage">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="{{route('product.details', $products->slug)}}">
                        <img src="{{asset('uploads/products/preview')}}/{{$products->preview_image}}" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="{{route('product_quick_view', $products->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <button type="button" class="btn-product btn-cart add_to_cart"><span>add to cart</span></button>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">{{$products->rel_to_category->category_name}}</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{route('product.details', $products->slug)}}">{{$products->product_name}}</a></h3><!-- End .product-title -->
                    @if ($products->product_discount != null)
                        <span class="new-price">৳ {{$products->after_discount}}</span>
                        <span class="old-price">Was ৳ {{$products->product_price}}</span>
                    @else
                        <span class="product-price">৳ {{$products->after_discount}}</span>
                    @endif
                </div><!-- End .product-body -->
            </div>
            @endforeach
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
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

@section('footer_script')
    <script>
        $('.colorId').change(function(e) {
            e.preventDefault();
            var color_id = $(this).val();
            var product_id = '{{$product_info->first()->id}}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/get_size',
                type: 'POST',
                data: {
                    'color_id': color_id,
                    'product_id': product_id
                },
                success: function(data) {
                    $('#sizeId').html(data)
                }
            })
        })
    </script>

    {{-- Buy now controller --}}
    {{-- <script>
        $(document).ready(function() {
            $('.add-to-buy-btn').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var size = $(this).closest('.product_data').find('.size_id').val();
                var color = $(this).closest('.product_data').find('.color_id').val();
                var quantity = $(this).closest('.product_data').find('.qty-input').val();

                $.ajax({
                        url: "/add-to-buy",
                        method: "POST",
                        data: {
                            'quantity': quantity,
                            'product_id': product_id,
                            'color_id': color,
                            'size_id': size,
                        },
                        success: function (response) {
                            alertify.set('notifier','position','top-right');
                            alertify.success(response.status);
                            // cartload();
                            // $('#load').load(location.href + ' .counted');
                        },
                    });
            })
        })
    </script> --}}

    {{-- <script>
        // Cart count
        $(document).ready(function () {
            cartload();
        });

        function cartload()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/load-cart-data',
                method: "GET",
                success: function (response) {
                    $('.basket-item-count').html('');
                    var parsed = jQuery.parseJSON(response)
                    var value = parsed; //Single Data Viewing
                    $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
                }
            });
        }

        // cart store
        $(document).ready(function () {
            $('.add-to-cart-btn').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var size = $(this).closest('.product_data').find('.size_id').val();
                var color = $(this).closest('.product_data').find('.color_id').val();
                var quantity = $(this).closest('.product_data').find('.qty-input').val();

                $.ajax({
                    url: "/add-to-cart",
                    method: "POST",
                    data: {
                        'quantity': quantity,
                        'product_id': product_id,
                        'color_id': size,
                        'size_id': color,
                    },
                    success: function (response) {
                        alertify.set('notifier','position','top-right');
                        alertify.success(response.status);
                        cartload();
                    },
                });
            });
        });
    </script> --}}


    {{-- <script>
        $(document).ready(function () {
            cartload();
        });

        function cartload()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/load-cart-data',
                method: "GET",
                success: function (response) {
                    $('.basket-item-count').html('');
                    var parsed = jQuery.parseJSON(response)
                    var value = parsed; //Single Data Viewing
                    $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
                }
            });
        }
    </script> --}}
@endsection



