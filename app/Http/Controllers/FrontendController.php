<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Contactinfo;
use App\Models\Discountpage;
use App\Models\Help;
use App\Models\Indexinfo;
use App\Models\Inventory;
use App\Models\Map;
use App\Models\Offerpage;
use App\Models\Order;
use App\Models\Paymentpage;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Refund;
use App\Models\Setting;
use App\Models\Shippingpage;
use App\Models\Terms;
use App\Models\Websitepage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //home
    function home() {
        $categories = Category::take(10)->get();
        $category= Category::take(6)->get();
        $index_info = Indexinfo::take(3)->get();
        $products = Product::where('status', '1')->get();
        $top_selling_products = Order::groupBy('product_id')
        ->selectRaw('sum(price) as sum, product_id')
        ->havingRaw('sum >= 1')
        ->take(3)
        ->orderBy('sum', 'DESC')
        ->get();
        $latest_products = Product::where('status', '1')->latest()->get();
        $discount_products = Product::where('status', '1')->where('product_discount', '!=', null)->get();
        $validity = Discountpage::latest()->take(1);
        return view('frontend.home.index', [
            'categories' => $categories,
            'categoryy' => $category,
            'products' => $products,
            'latest_products' => $latest_products,
            'top_selling_products' => $top_selling_products,
            'discount_products' => $discount_products,
            'index_info' => $index_info,
            'validity' => $validity,
        ]);
    }

    // category
    function category_one($category_id) {
        $categories = Category::all();
        $products = Product::where('status', '1')->where('category_id', $category_id)->get();
        $category_id_num = $category_id;
        return view('frontend.category.category_one', [
            'categories' => $categories,
            'products' => $products,
            'category_id_num' => $category_id_num,
        ]);
    }

    // category_two
    function category_two() {
        $categories = Category::all();
        $products = Product::where('status', '1')->get();
        return view('frontend.category.category_two', compact(['categories', 'products']));
    }

    

    // offer
    function offer() {
        $categories = Category::all();
        $offer_info = Offerpage::take(2)->get();
        $validity = Discountpage::latest()->take(1);
        $products = Product::where('status', '1')->where('product_discount', '!=', null)->where('validity', '>', Carbon::now())->get();
        return view('frontend.offer.offer', [
            'categories' => $categories,
            'products' => $products,
            'offer_info' => $offer_info,
            'validity' => $validity,
            
        ]);
    }

    // privacy
    function privacy() {
        $categories = Category::all();
        $privacy_info = Privacy::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.privacy_policy.privacy', [
            'categories' => $categories,
            'privacy_info' => $privacy_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    // help
    function help() {
        $categories = Category::all();
        $help_info = Help::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.help.help_page', [
            'categories' => $categories,
            'help_info' => $help_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    // Terms
    function terms() {
        $categories = Category::all();
        $terms_info = Terms::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.terms.terms', [
            'categories' => $categories,
            'terms_info' => $terms_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    // Refund
    function refund() {
        $categories = Category::all();
        $refund_info = Refund::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.refund.refund', [
            'categories' => $categories,
            'refund_info' => $refund_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    // campaign
    function campaign() {
        $categories = Category::all();
        $campaign_info = Offerpage::take(2)->get();
        $validity = Discountpage::latest()->take(1);
        $products = Product::where('status', '1')->where('campaign', '1')->where('validity', '>', Carbon::now())->get();
        return view('frontend.campaign.campaign', [
            'categories' => $categories,
            'products' => $products,
            'campaign_info' => $campaign_info,
            'validity' => $validity,
        ]);
    }
    // website
    function website() {
        $categories = Category::all();
        $site_info = Websitepage::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.website.website', [
            'categories' => $categories,
            'site_info' => $site_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    // Map
    function map() {
        $categories = Category::all();
        $map_info = Map::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.map.map', [
            'categories' => $categories,
            'map_info' => $map_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    // shippingsite
    function shippingsite() {
        $categories = Category::all();
        $shipping_info = Shippingpage::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.shipping.shipping', [
            'categories' => $categories,
            'shipping_info' => $shipping_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    // Paymentpage
    function paymentsite() {
        $categories = Category::all();
        $payment_info = Paymentpage::latest()->take(1);
        $settings = Setting::where('status', 1)->get();
        $contact_info = Contactinfo::where('status', 1)->get();
        return view('frontend.website.website', [
            'categories' => $categories,
            'site_info' => $payment_info,
            'settings' => $settings,
            'contact_info' => $contact_info,
        ]);
    }

    function product_quick_view($product_id) {
        $product = Product::find($product_id);
        $product_gallery = ProductGallery::where('product_id', $product->id)->get();
        $available_colors = Inventory::where('product_id', $product->id)
        ->groupBy('color_id')
        ->selectRaw('count(*) as total, color_id')
        ->get();

        $available_sizes = Inventory::where('product_id', $product->id)
        ->groupBy('size_id')
        ->selectRaw('count(*) as total, size_id')
        ->get();
        return view('frontend.home.product_quick_view.product_quick_view', [
            'product'=> $product,
            'colors'=> $available_colors,
            'sizes' => $available_sizes,
            'product_gallery' => $product_gallery,
        ]);
    }
}
