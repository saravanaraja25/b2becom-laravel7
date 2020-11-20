<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\TyreSize;

class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=TyreSize::with('products')->get();
        return view('admin.products.list')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size=TyreSize::all();
        return view('admin.products.create')->with('size',$size);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'brand'=>'required',
            'model'=>'required',           
            'stock'=>'required',
            'size_id'=>'required',  
            'price'=>'required'
        ]);        
        $target_dir="storage/tyreimages/";
        $file=$_FILES['image']['name'];
        $fn=pathinfo($file,PATHINFO_FILENAME);
        $ext=pathinfo($file,PATHINFO_EXTENSION);
        $filename=$fn.'_'.time().'.'.$ext;
        $target_dir=$target_dir.''.$fn.'_'.time().'.'.$ext;
        $path=move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
        if(!$path)
            $filename='noimage';
        $product=new Product();
        $product->title=$request->title;
        $product->brand=$request->brand;
        $product->tyre_size_id=$request->size_id;
        $product->description=$request->description;
        $product->image=$filename;
        $product->warranty_available=$request->warranty_available;
        $product->warranty_type=$request->warranty_type;
        $product->warranty_duration=$request->warranty_duration;
        $product->model=$request->model;
        $product->stock=$request->stock;
        $product->price=$request->price;
        $product->save();
        return redirect()->route('products.index')->with('success','Product Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size=TyreSize::all();
        $product=Product::find($id);
        return view('admin.products.edit')->with('product',$product)->with('size',$size);
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
        $product=Product::find($id);
        $product->title=$request->title;
        $product->brand=$request->brand;
        $product->tyre_size_id=$request->size_id;
        $product->description=$request->description;        
        $product->warranty_available=$request->warranty_available;
        $product->warranty_type=$request->warranty_type;
        $product->warranty_duration=$request->warranty_duration;
        $product->model=$request->model;
        $product->stock=$request->stock;
        $product->save();
        return redirect()->route('products.index')->with('success','Product Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('error','Product Deleted.');
    }
}
