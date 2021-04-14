<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Product;
use App\TyreSize;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $brand=[];
        $year=[];
        foreach ($product as $key => $value) {
            $brand[$value->brand]=$value->brand;
            $year[$value->model]=$value->model;
        }
        return view('user.home')->with('product',$product)->with('size',$size)->with('brand',$brand)->with('year',$year);
    }

    public function myaccount(){
        $user=User::find(Auth()->user()->id);
        return view('user.myaccount')->with('user',$user);
    }

    public function myaccountupdate(Request $request)
    {
        $user= User::find(Auth()->user()->id);
        if($request->oldpassword != null){
            if(Hash::check($request->oldpassword, $user->password)){
                $user->password=Hash::make($request->newpassword);
            }
            else{
                return redirect()->route('myaccount')->with('message','Password Does not Match');
            }
        }
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->address=$request->address_id;
        $user->save();
        return redirect()->route('myaccount')->with('message','Account Updated Successfully');
        // $user->name=$request->input('name');
        // $user->email=$request->input('email');
        // $user->email_verified_at=$request->input('email_verified_at');
        // $user->save();
        // return redirect()->route('customers.index')->with('success','Customer Updated.');        
    }
    public function advertisementlist(){
        $adv=Advertisement::all();
        return view('user.offer',compact('adv'));
    }
}
