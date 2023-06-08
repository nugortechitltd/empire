<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order_info = OrderProduct::latest()->take(7)->get();
        $totalOrder = OrderProduct::count();
        $total_charge = OrderProduct::where('status', '!=', 5)->sum('charge');
        $total_discount = OrderProduct::where('status', '!=', 5)->sum('coupon_price');
        $orders = Order::where('status', '!=', 5)->get();
        $total_sale = Order::where('status', '!=', 5)->sum('quantity');
        $total_product = Product::count();
        $sum = 0;
        foreach ($orders as $order) {
            $sum += $order->price * $order->quantity;
        }
        
        $totalstock = Inventory::sum('quantity');

        // Days
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisWeek = Carbon::today()->subDays(7);
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');


        return view('home', compact(['order_info', 'totalOrder', 'orders', 'sum', 'total_charge', 'total_discount', 'totalstock', 'total_sale', 'total_product']));
    }
}
