<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
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
        $advertisement=Advertisement::all();
        return view('admin.advertisements.list',compact('advertisement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $target_dir="storage/advertisement/";
        $file=$_FILES['image']['name'];
        $fn=pathinfo($file,PATHINFO_FILENAME);
        $ext=pathinfo($file,PATHINFO_EXTENSION);
        $filename=$fn.'_'.time().'.'.$ext;
        $target_dir=$target_dir.''.$fn.'_'.time().'.'.$ext;
        $path=move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
        if(!$path)
            $filename='noimage';
        // dump($path);
        $adv=new Advertisement();
        // $request->advertisement='';
        $adv->name=$_POST['name'];
        // dd('hi');
        $adv->description=$_POST['description'];
        $adv->image=$filename;
        
        $adv->save();
        
        return redirect()->route('advertisements.index');
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
    public function destroy($id)
    {
        $adv=Advertisement::find($id);
        $adv->delete();
        return redirect()->route('advertisements.index')->with('error','Advertisement Deleted.');
    }
}
