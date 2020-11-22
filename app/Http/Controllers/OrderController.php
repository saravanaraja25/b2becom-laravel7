<?php

namespace App\Http\Controllers;

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
        $order->address_id=Auth()->user()->addresses[0]->id;
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
        //
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
        $orderitem=OrderItem::find($request->id);
        $orderitem->delete();
        return redirect()->route('cart')->with('message','Item Removed');
    }
}