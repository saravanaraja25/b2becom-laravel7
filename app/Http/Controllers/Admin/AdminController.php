<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\TyreSize;
use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin'); // Here auth is middleware and admin is guard
 
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::whereDate('updated_at', Carbon::today())->get();
        $users = User::whereDate('created_at', Carbon::today())->get();
        $cat=count(TyreSize::all());
        $todaysale=0;
        $totalsale=0;
        $totalusers=count(User::all());
        $newusers=count(User::whereDate('created_at', Carbon::today())->get());        
        foreach($orders as $order){
            $todaysale+=$order->grand_total;
        }
        $totorder=Order::where([
            ['order_status','!=','cart']
        ])->get();
        $totproducts=Product::all();
        $lowproducts=Product::where([
            ['stock','<','20']
        ])->get();
        foreach($totorder as $order){
            $totalsale+=$order->grand_total;
        }
        return view('admin.dashboard',compact('cat','totorder','lowproducts','orders','todaysale','totalsale','totalusers','newusers','totproducts'));
    }
}
