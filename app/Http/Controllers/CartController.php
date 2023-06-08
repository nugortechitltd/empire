<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    // cart
    function cart() {
        $categories = Category::all();
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        // return $cart_data;
        return view('frontend.cart.cart', compact(['categories']))->with('cart_data',$cart_data);
    }
    //cart_store
    function cart_store(Request $request) {
        $request->validate([
           'size_id' => 'required',
           'color_id' => 'required',
        ]);
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $size_id = $request->input('size_id');
        $color_id = $request->input('color_id');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $cart_data[$keys]["item_size"] = $request->input('size_id');
                    $cart_data[$keys]["item_color"] = $request->input('color_id');
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart']);
                }
            }
        }
        else
        {
            $products = Product::find($prod_id);
            $prod_name = $products->product_name;
            $prod_slug = $products->slug;
            $prod_image = $products->preview_image;
            $priceval = $products->after_discount;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_size' => $size_id ,
                    'item_color' => $color_id ,
                    'item_price' => $priceval,
                    'item_image' => $prod_image,
                    'item_slug' => $prod_slug
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
    }

    // cart_load
    function cartloadbyajax() {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }

    // update_cart
    function update_cart(Request $request) {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $size_id = $request->input('size_id');
        $color_id = $request->input('color_id');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $cart_data[$keys]["item_size"] = $size_id;
                        $cart_data[$keys]["item_color"] = $color_id;
                        $ttprice = ($cart_data[$keys]["item_price"]*$quantity);
                        $grandtotalprice = number_format($ttprice);
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json([
                            'status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated',
                            'gtprice' => '৳ '.$grandtotalprice.''
                        ]);
                    }
                }
            }
        }
    }

    // delete_from_cart
    function delete_from_cart(Request $request) {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }

    // clear_cart
    function clear_cart() {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status'=>'Your Cart is Cleared']);
        // return redirect()->route('site')->withSuccess('Your cart is cleared');
    }


    // cart_single_store
    function cart_single_store(Request $request) {
        $prod_id = $request->input('product_id');
        $product_info = Product::find($prod_id);
        
        if(Inventory::where('product_id', $prod_id)->where('color_id', 0)->where('size_id', 0)->exists()) {
            if($product_info->quantity == null) {
                $quantity = 1;
            }
            if($product_info->color_id == null) {
                $color_id = 0;
            }
            if($product_info->size_id == null) {
                $size_id = 0;
            }
            if(Cookie::get('shopping_cart'))
            {
                $cookie_data = stripslashes(Cookie::get('shopping_cart'));
                $cart_data = json_decode($cookie_data, true);
            }
            else
            {
                $cart_data = array();
            }
            
            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if(in_array($prod_id_is_there, $item_id_list)) {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] = $quantity;
                        $cart_data[$keys]["item_size"] = $size_id;
                        $cart_data[$keys]["item_color"] = $color_id;
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart']);
                    }
                }
            }  else {
                $products = Product::find($prod_id);
                $prod_name = $products->product_name;
                $prod_slug = $products->slug;
                $prod_image = $products->preview_image;
                $priceval = $products->after_discount;

                if($products)
                {
                    $item_array = array(
                        'item_id' => $prod_id,
                        'item_name' => $prod_name,
                        'item_quantity' => $quantity,
                        'item_size' => $size_id ,
                        'item_color' => $color_id ,
                        'item_price' => $priceval,
                        'item_image' => $prod_image,
                        'item_slug' => $prod_slug
                    );
                    $cart_data[] = $item_array;

                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
                }
            }

        } else {
            return response()->json(['status'=> 'Product has color and size']);
        }
    }

    // quick_cart_store
    function quick_cart_store(Request $request) {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $size_id = $request->input('size_id');
        $color_id = $request->input('color_id');

        if(Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->exists()) {
            if(($quantity) < (Inventory::where('product_id', $request->product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first()->quantity)) {
                
                if(Cookie::get('shopping_cart'))
                {
                    $cookie_data = stripslashes(Cookie::get('shopping_cart'));
                    $cart_data = json_decode($cookie_data, true);
                }
                else
                {
                    $cart_data = array();
                }

                $item_id_list = array_column($cart_data, 'item_id');
                $prod_id_is_there = $prod_id;

                if(in_array($prod_id_is_there, $item_id_list))
                {
                    foreach($cart_data as $keys => $values)
                    {
                        if($cart_data[$keys]["item_id"] == $prod_id)
                        {
                            $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                            $cart_data[$keys]["item_size"] = $request->input('size_id');
                            $cart_data[$keys]["item_color"] = $request->input('color_id');
                            $item_data = json_encode($cart_data);
                            $minutes = 60;
                            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                            return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart']);
                        }
                    }
                }
                else
                {
                    $products = Product::find($prod_id);
                    $prod_name = $products->product_name;
                    $prod_slug = $products->slug;
                    $prod_image = $products->preview_image;
                    $priceval = $products->after_discount;

                    if($products)
                    {
                        $item_array = array(
                            'item_id' => $prod_id,
                            'item_name' => $prod_name,
                            'item_quantity' => $quantity,
                            'item_size' => $size_id ,
                            'item_color' => $color_id ,
                            'item_price' => $priceval,
                            'item_image' => $prod_image,
                            'item_slug' => $prod_slug
                        );
                        $cart_data[] = $item_array;

                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
                    }
                }
            } else {
                return response()->json(['status'=> 'Out of stock']);
            }
        } else {
            return response()->json(['status'=> 'Color and size do not match.']);
        }
    }
    
}
