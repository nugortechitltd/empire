@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{route('product.update')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Product</h6>
            </div>
            <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Product name</label>
                                    <input type="text" name="product_name" class="form-control" placeholder="name" value="{{$product->product_name}}">
                                    <input type="hidden" name="product_id" class="form-control" placeholder="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="added_by" class="form-control" placeholder="added_by" value="{{$product->added_by}}">
                                    @error('product_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="floating-label" for="Category">Category</label>
                                    <select class="form-control" name="category_id" id="Category">
                                        <option value="">product category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $product->category_id  ? 'selected': ''}}>{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Product price</label>
                                    <input type="number" name="product_price" class="form-control" placeholder="price" value="{{$product->product_price}}">
                                    @error('product_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Product discount</label>
                                    <input type="number" name="product_discount" class="form-control" placeholder="discount" value="{{$product->product_discount != null ? $product->product_discount : ''}}">
                                    @error('product_discount')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-2">Status</label>
                                    <div class="radio-list d-flex">
                                        <div class="radio-inline pl-0 mr-5">
                                            <div class="radio radio-info">
                                                <input type="radio" name="status" id="radio1" value="1" {{$product->status == 1 ? 'checked' : ''}} >
                                                <label for="radio1">Published</label>
                                            </div>
                                        </div>
                                        <div class="radio-inline">
                                            <div class="radio radio-info">
                                                <input type="radio" name="status" id="radio2" value="0" {{$product->status == 0 ? 'checked' : ''}}>
                                                <label for="radio2">Draft</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="floating-label" for="Brand">Brand</label>
                                    <select class="form-control" name="brand_id" id="Brand">
                                        <option value="">product brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}" {{$brand->id == $product->brand  ? 'selected': ''}}>{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label w-100 mb-2">Product description</label>
                                    <textarea id="summernote" name="description" class="form-control" placeholder="Product description">{!! $product->description !!}</textarea>
                                    @error('description')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">Preview image</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Preview image
                                        <input type="file" name="preview_image" class="image">
                                    </label>
                                    @error('preview_image')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                    <img width="90" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">Gallery images</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Gallery images
                                        <input type="file" multiple name="gallery_image[]" class="image">
                                    </label>
                                    @error('gallery_image')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                    {{-- {{$gallery}} --}}
                                    @foreach ($gallery as $gallery)
                                    <img width="90" class="mt-3 mb-3 mr-2" id="image" height="auto" src="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}" alt="">
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6">
                                {{-- <div class="form-group  pt-4">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="campaign" class="custom-control-input" value="1">
                                        <span class="custom-control-label">Campaign product?(optional)</span>
                                    </label>
                                </div> --}}
                                <div class="form-group  pt-4">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="campaign" value="1" class="custom-control-input" id="flexSwitchCheckDefault" {{$product->campaign == 1 ? 'checked': ''}}>
                                        <span class="custom-control-label" for="flexSwitchCheckDefault">Campaign product?(optional)</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Product validity</label>
                                    <input type="date" id="b-m-dtp-date" name="validity" class="form-control" placeholder="Date" data-dtp="dtp_S2pSu" value="{{$product->validity}}">
                                    {{-- <input type="time" id="b-m-dtp-datetime" class="form-control" placeholder="DateTime" data-dtp="dtp_jIQzS"> --}}
                                    {{-- <input type="datetime-local" name="validity" class="form-control" value="{{$product->validity}}"> --}}
                                    {{-- @error('validity')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 m-auto">

        <div class="card">
                <div class="card-header">
                    <h6>Product Attributes</h6>
                </div>
                <div class="card-body" id="product_attr_box">
                    @php
                        $list = 1
                    @endphp
                    @foreach ($inventories as $sl=>$inventory)
                        <div class="row" id="product_attr_{{$sl+1}}">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="sku">SKU</label>
                                    <input type="text" id="sku" name="sku[]" class="form-control" placeholder="sku" value="{{$inventory->sku}}" aria-required="true" aria-invalid="false" required>
                                    @error('sku')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="floating-label" for="color_id">Color</label>
                                    <select class="form-control" id="color_id" name="color_id[]">
                                        <option value="">product color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{$color->id}}" {{$color->id == $inventory->color_id ? 'selected': ''}}>{{$color->color_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="floating-label" for="size_id">Size</label>
                                    <select class="form-control" id="size_id" name="size_id[]">
                                        <option value="">product size</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{$size->id}}" {{$size->id == $inventory->size_id ? 'selected': ''}}>{{$size->size_name == null ? 'Null' : $size->size_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="quantity">Product quantity</label>
                                    <input type="number" id="quantity" name="quantity[]" class="form-control" placeholder="quantity" value="{{$inventory->quantity}}">
                                    @error('quantity')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Action</label>
                                    <div>
                                        
                                        <a class="btn btn-{{$sl == 0 ? 'primary': 'danger'}} text-white" name="{{$sl == 0 ? 'add': 'remove'}}" id="{{$sl == 0 ? 'add': 'remove'}}" onclick="{{$sl == 0 ? 'add()': 'remove_more('.$list.')'}}">{{$sl == 0 ? '+ Add': '- Remove'}}</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $list = $list+1
                        @endphp
                        @endforeach

                        
                        
                        {{-- <input type="hidden" name="id" value="{{$id}}"> --}}
                        
                    </div>
                    <div class="col-md-4 mb-4 ml-3">
                        <button class="btn btn-primary">Submit</button>
                        {{-- <a class="btn btn-primary text-white" onclick="add()">Add</a> --}}
                    </div>
                </div>
                
            </div>
        </div>
        </form>
        
    </div>

    {{-- <div class="row">
        <div class="col-10 m-auto">
            
        </div>
    </div> --}}
    </form>
</div>
@endsection

@section('footer_script')

<script>
    var loop_count = 1;
    function add() {
        loop_count++;
        // <input type="text" name="paid[]" id="paid"" />
        var html = '<div class="row mt-4" id="product_attr_'+loop_count+'">';

        html+='<div class="col-md-4"><div class="form-group"><label class="form-label">SKU</label><input type="text" id="sku" name="sku[]" class="form-control" placeholder="sku" aria-required="true" aria-invalid="false" required></div></div>';

        var color_id_html = jQuery('#color_id').html();
        html+='<div class="col-md-4"><div class="form-group"><label class="floating-label" for="color_id">Color</label><select class="form-control" name="color_id[]" id="color_id">'+color_id_html+'</select></div></div>';
        
        var size_id_html = jQuery('#size_id').html();
        html+='<div class="col-md-4"><div class="form-group"><label class="floating-label" for="size_id">Size</label><select class="form-control" name="size_id[]" id="size_id">'+size_id_html+'</select></div></div>';

        html+='<div class="col-md-4"><div class="form-group"><label class="form-label">product quantity</label><input type="number" id="quantity" name="quantity[]" class="form-control" placeholder="quantity"></div></div>';

        html+='<div class="col-md-4"><div class="form-group"><label class="form-label">Action</label><div><button class="btn btn-danger" name="remove" id="remove" onclick=remove_more("'+loop_count+'")> - Remove</button></div></div></div>';

        html+='</div>';

        jQuery('#product_attr_box').append(html);
    }

    function remove_more(loop_count) {
        jQuery('#product_attr_'+loop_count).remove();
    }
</script>
@endsection