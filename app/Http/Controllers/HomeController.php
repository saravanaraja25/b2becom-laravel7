<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TyreSize;

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
        $product=Product::all();
        $size=TyreSize::all();
        return view('user.home')->with('product',$product)->with('size',$size);
    }
}
