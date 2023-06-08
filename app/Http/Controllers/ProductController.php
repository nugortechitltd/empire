<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Size;
use Carbon\Carbon;
use Carbon\Cli\Invoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;
use Image;

class ProductController extends Controller
{
    //product_add
    function product_add() {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $brands = Brand::all();
        return view('backend.product.product', [
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'brands' => $brands,
        ]);
    }

    // product_store
    function product_store(Request $request) {
        $request->validate([
            'product_name'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
            'product_price'=> 'required',
            'preview_image' => 'required|mimes:jpg,jpeg,gif,png,webp|max:5000',
            'gallery_image' => 'required',
            'gallery_image.*' => 'image|mimes:jpg,jpeg,gif,png,webp',
            
        ], [
            'category_id.required' => 'The category field is required',
        ]);

        if($request->campaign) {
            $product_id = Product::insertGetId([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'after_discount' => $request->product_price-$request->product_discount,
                'brand' => $request->brand,
                'status' => $request->status,
                'validity' => $request->validity,
                'campaign' => $request->campaign,
                'description' => $request->description,
                'added_by' => Auth::id(),
                'slug' => str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999),
                'created_at' => Carbon::now(),
            ]);
        } else {
            $product_id = Product::insertGetId([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'after_discount' => $request->product_price-$request->product_discount,
                'brand' => $request->brand,
                'status' => $request->status,
                'validity' => $request->validity,
                'campaign' => 0,
                'description' => $request->description,
                'added_by' => Auth::id(),
                'slug' => str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999),
                'created_at' => Carbon::now(),
            ]);
        }

        

        // Preview image

        $uploaded_file_one = $request->preview_image;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(218, 220)->save(public_path('uploads/products/preview/'.$file_name_one));
        Product::find($product_id)->update([
            'preview_image' => $file_name_one,
            'updated_at' => Carbon::now(),
        ]);

        // Gallery images
        $uploaded_thumbnails = $request->gallery_image;
        foreach ($uploaded_thumbnails as $thumbnail) {
            $thumb_extension = $thumbnail->getClientOriginalExtension();
            $thumb_name = str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000,9999).'.'.$thumb_extension;
            Image::make($thumbnail)->resize(458, 458)->save(public_path('uploads/products/gallery/'.$thumb_name));

            
            ProductGallery::insert([
                'product_id' => $product_id,
                'added_by' => Auth::id(),
                'gallery_image' => $thumb_name,
                'created_at' => Carbon::now(),
            ]);
        }

        // Inventory
        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        $ColorArr = $request->post('color_id');
        $SizeArr = $request->post('size_id');
        $QuantityArr = $request->post('quantity');
        foreach ($skuArr as $key=>$val) {
            
            $productAttrArr['product_id'] = $product_id;
            $productAttrArr['added_by'] = Auth::id();
            $productAttrArr['sku'] = $skuArr[$key];
            $productAttrArr['created_at'] = Carbon::now();
            if($ColorArr[$key] == '') {
                $productAttrArr['color_id'] = 0;
            } else {
                $productAttrArr['color_id'] = $ColorArr[$key];
            }

            if($SizeArr[$key] == '') {
                $productAttrArr['size_id'] = 0;
            } else {
                $productAttrArr['size_id'] = $SizeArr[$key];
            }

            if($QuantityArr[$key] == '') {
                $productAttrArr['quantity'] = 0;
            } else {
                $productAttrArr['quantity'] = $QuantityArr[$key];
            }
            DB::table('inventories')->insert($productAttrArr);
        }
        
        return back()->withSuccess('Product added successfully.');
    }

    // Product list
    function product_list() {
        $products = Product::all();
        return view('backend.product.product_list', [
            'products' => $products,
        ]);
    }

    // product_delete
    function product_delete($product_id) {
        $preview_image_one = Product::where('id', $product_id)->get();
        $delete_preview_one = public_path('uploads/products/preview/'. $preview_image_one->first()->preview_image);
        unlink($delete_preview_one);
        Product::find($product_id)->delete();
        $thumb_image = ProductGallery::where('product_id', $product_id)->get();
        foreach($thumb_image as $thumb) {
            $delete_thumbnails = public_path('uploads/products/gallery/'. $thumb->gallery_image);
            unlink($delete_thumbnails);
            ProductGallery::find($thumb->id)->delete();
        }
        $inventories = Inventory::where('product_id', $product_id)->get();
        foreach($inventories as $inventory) {
            Inventory::find($inventory->id)->delete();
        }
        return back()->withSuccess('Product item deleted successfully');
    }

    // Inventory
    function inventory($product_id) {
        $product_info = Product::find($product_id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventories = Inventory::where('product_id', $product_id)->get();
        return view('backend.product.product_inventory', [
            'product' => $product_info,
            'colors' => $colors,
            'sizes' => $sizes,
            'inventories' => $inventories,
        ]);
    }

    // product_edit
    function product_edit($product_id) {
        $product = Product::find($product_id);
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $brands = Brand::all();
        $inventories = Inventory::where('product_id', $product_id)->get();
        $gallery = ProductGallery::where('product_id', $product_id)->get();
        return view('backend.product.product_edit', compact(['product', 'categories', 'gallery', 'inventories', 'colors', 'sizes', 'brands']));
    }

    // product_update
    function product_update(Request $request) {
        $request->validate([
            'product_name'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
            'product_price'=> 'required',
            'sku*' => 'required'
        ], [
            'category_id.required' => 'The category field is required',
        ]);

        // Preview image
        if($request->preview_image != null) {
            $image1 = Product::where('id', $request->product_id)->first()->preview_image;
            $delete_from1 = public_path('uploads/products/preview/'.$image1);
            unlink($delete_from1);
            $uploaded_file_one = $request->preview_image;
            $extension = $uploaded_file_one->getClientOriginalExtension();
            $file_name_one = str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999).'.'.$extension;
            Image::make($uploaded_file_one)->resize(218, 220)->save(public_path('uploads/products/preview/'.$file_name_one));
            Product::find($request->product_id)->update([
                'preview_image' => $file_name_one,
                'updated_at' => Carbon::now(),
            ]);

        }


        // Gallery image
        if($request->gallery_image != null) {
            $thumb_image = ProductGallery::where('product_id', $request->product_id)->get();
            foreach($thumb_image as $thumb) {
                $delete_from_thumb = public_path('uploads/products/gallery/'.$thumb->gallery_image);
                unlink($delete_from_thumb);
            }
            ProductGallery::where('product_id', $request->product_id)->delete();
            $uploaded_thumbnails = $request->gallery_image;
            foreach ($uploaded_thumbnails as $thumbnail) {
                $thumb_extension = $thumbnail->getClientOriginalExtension();
                $thumb_name = str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000,9999).'.'.$thumb_extension;
                Image::make($thumbnail)->resize(458, 458)->save(public_path('uploads/products/gallery/'.$thumb_name));
                ProductGallery::insert([
                    'product_id' => $request->product_id,
                    'added_by' => Auth::id(),
                    'gallery_image' => $thumb_name,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Inventory updated
        Inventory::where('product_id', $request->product_id)->delete();
        if($request->sku) {
            foreach($request->sku as $key=>$sku) {
                Inventory::create([
                    'sku' => $sku,
                    'product_id' => $request->product_id,
                    'added_by' => $request->added_by,
                    'quantity' => $request->quantity[$key] ?? 0,
                    'color_id' => $request->color_id[$key] ?? 0,
                    'size_id' => $request->size_id[$key] ?? 0,
                ]);
            }
        }

        if($request->campaign != null) {
            Product::find($request->product_id)->update([
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'after_discount' => $request->product_price-$request->product_discount,
                'brand' => $request->brand_id,
                'validity' => $request->validity,
                'status' => $request->status,
                'description' => $request->description,
                'additional_desc' => $request->additional_desc,
                'campaign' => $request->campaign,
                'added_by' => $request->added_by,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Product::find($request->product_id)->update([
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'after_discount' => $request->product_price-$request->product_discount,
                'brand' => $request->brand_id,
                'validity' => $request->validity,
                'status' => $request->status,
                'description' => $request->description,
                'additional_desc' => $request->additional_desc,
                'campaign' => 0,
                'slug' => str_replace(' ', '-', Str::lower($request->product_name)).'-'.rand(1000, 9999),
                'added_by' => $request->added_by,
                'updated_at' => Carbon::now(),
            ]);
        }

        
        
        return back()->withSuccess('Product updated successfully');
    }
    
}
