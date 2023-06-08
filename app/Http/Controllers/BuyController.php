<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BuyController extends Controller
{
    //buy_store
    function buy_store(Request $request) {
        $request->validate([
            'size' => 'required',
            'color' => 'required',
        ]);
         
         $prod_id = $request->input('product_id');
         $quantity = $request->input('quantity');
         $size_id = $request->input('size');
         $color_id = $request->input('color');
 
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
                     return redirect()->route('checkout');
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
                 return redirect()->route('checkout');
             }
         }
    }

    // quick_buy_store
    function quick_buy_store(Request $request) {
        $prod_id = $request->product_id;
        $color_id = $request->color;
        $size_id = $request->size;
        $quantity = $request->quantity;
        
        if(Inventory::where('product_id', $prod_id)->where('color_id', $color_id)->where('size_id', $size_id)->exists()) {
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
                            $cart_data[$keys]["item_quantity"] = $quantity;
                            $cart_data[$keys]["item_size"] = $size_id;
                            $cart_data[$keys]["item_color"] = $color_id;
                            $item_data = json_encode($cart_data);
                            $minutes = 60;
                            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                            return redirect()->route('checkout');
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
                        return redirect()->route('checkout');
                    }
                }
            }
        } else {
            return back()->withError('Product color & size do not matched!');
        }
    }
}
