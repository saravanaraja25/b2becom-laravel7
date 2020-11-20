<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\TyreSize;
use App\Http\Controllers\Controller;

class TyreSizeController extends Controller
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
        $size=TyreSize::all();
        return view('admin.tyresizes.list')->with('size',$size);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tyresizes.create');
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
            'status'=>'required',            
        ]);
        $size=new TyreSize();
        $size->title=$request->title;
        $size->status=$request->status;
        $size->save();
        return redirect()->route('tyresizes.index')->with('success','Size Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('tyresizes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size=TyreSize::find($id);
        return view('admin.tyresizes.edit')->with('size',$size);
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
        $size=TyreSize::find($id);
        $size->title=$request->title;
        $size->status=$request->status;
        $size->save();
        return redirect()->route('tyresizes.index')->with('success','Size Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size=TyreSize::find($id);
        $size->delete();
        return redirect()->route('tyresizes.index')->with('success','Size Deleted.');
    }
}
