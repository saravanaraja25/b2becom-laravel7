<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Product;
class OrderController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth()->user();
        $order=Order::where([
            ['user_id','=',$user->id],
            ['order_status','=','cart']
        ])->get();
        return view('user.cart.list')->with('order',$order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function placeorder(Request $request)
    {
        $order=Order::find($request->orderid);
        $order->order_status='placed';
        $order->save();
        return redirect()->route('home')->with('message','Order Placed Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth()->user();
        $order=Order::where([
            ['user_id','=',$user->id],
            ['order_status','=','cart']
        ])->get();
        if(count($order)!=0)
        {
            $order=end($order)[0];
            $orderitem=OrderItem::where([
                ['product_id','=',$request->product_id],
                ['order_id','=',$order->id]
            ])->get();
            if(count($orderitem)>0){
                $orditem=$orderitem[0];
            }
            else
                $orditem=new OrderItem();
        }
        else{
            $order=new Order();
            $orditem=new OrderItem();
        }    
        $total_price=0;
        $order->user_id=Auth()->user()->id;
        $order->address_id=Auth()->user()->address;
        $order->total_price=$total_price;
        $order->grand_total=$total_price;
        $order->order_status='cart';
        $order->save();
        $qty=$request->qty;
        $product=Product::find($request->product_id);
        if($request->update=="1")
        {
            $orditem->quantity=$qty;
            $unitprice=$product->price;
            $unittotal=$qty*$unitprice;
        }
        else
        {
            $orditem->quantity+=$qty;  
            $unitprice=$product->price;
            $unittotal=$qty*$unitprice; 
        }            
        $orditem->product_name=$product->title;
        $orditem->tyre_size_id=$product->size->id;
        $orditem->product_id=$product->id;
        $orditem->unitprice=$unitprice;
        $orditem->unittotal=$unittotal;
        if($product->stock >= $qty){
            $order->orderitems()->save($orditem);
            $orditem->save();
            $message='Cart Updated';
        }
        else
            $message='Stock Insufficient';
        // dd($order->orderitems);
        foreach ($order->orderitems as $key => $value) {
            $total_price+=$value->unittotal;
        }
        $order->grand_total=$total_price-$order->discount_amount;
        $order->total_price=$total_price;
        $order->save();
        return redirect()->route('cart')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Auth()->user();
        $order=Order::where([
            ['user_id','=',$user->id],
            ['id','=',$id]
        ])->get();
        // dd($order);
        if(count($order) >0){
            return view('user.order.detail')->with('order',$order);
        }else{
            return redirect()->route('listorders');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user=Auth()->user();
        $orderitem=OrderItem::find($request->id);
        $orderitem->delete();
        $order=Order::where([
            ['user_id','=',$user->id],
            ['order_status','=','cart']
        ])->get()[0];
        $total_price=0;
        foreach ($order->orderitems as $key => $value) {
            $total_price+=$value->unittotal;
        }
        $order->grand_total=$total_price-$order->discount_amount;
        $order->total_price=$total_price;
        $order->save();
        return redirect()->route('cart')->with('message','Item Removed');
    }
    public function listorders(){
        $user=Auth()->user();
        $order=Order::where([
            ['user_id','=',$user->id],
            ['order_status','!=','cart']
        ])->get();
        $status=[];
        foreach ($order as $key => $value) {
            $status[$value->order_status]=$value->order_status;
        }
        return view('user.order.orderlist')->with('order',$order)->with('orderstatus',$status);
    }
    public function coupon(Request $request){
        $user=Auth()->user();
        $order=Order::where([
            ['user_id','=',$user->id],
            ['order_status','=','cart']
        ])->get()[0];
        $offer=Offer::where([
            ['coupon_code','=',$request->coupon_code]
        ])->get();
        if($offer!=null)
        {
            $offer=$offer[0];
            if($offer->discount_type=='percent')
            {
                $percent=$offer->discount_value;
                // dump($percent);
                $order->discount_amount=$order->total_price / $percent;
                // dump($order->discount_amount);
                $order->grand_total=$order->total_price-($order->total_price / $percent);
                // dd($order);
                $order->save();
                return redirect()->route('cart')->with('message','Coupon Applied');
            }
            else if($offer->discount_type=='amount'){
                $order->discount_amount=$offer->discount_value;
                $order->grand_total=$order->total_price - $order->discount_amount;
                $order->save();
                return redirect()->route('cart')->with('message','Coupon Applied');
            }
            else{
                return redirect()->route('cart')->with('message','Coupon Error');
            }
        }
        else{
            return redirect()->route('cart')->with('message','Coupon Invalid');
        }
    }
}
