<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Address;
use GuzzleHttp\Psr7\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address'=>'required',
            'city'=>'required',
            'pincode'=>'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($_FILES['shoplicense']);
        // dd($_SERVER['DOCUMENT_ROOT']);
        $target_dir="storage/shoplicense/";
        $file=$_FILES['shoplicense']['name'];
        $fn=pathinfo($file,PATHINFO_FILENAME);
        $ext=pathinfo($file,PATHINFO_EXTENSION);
        $filename=$fn.'_'.time().'.'.$ext;
        $target_dir=$target_dir.''.$fn.'_'.time().'.'.$ext;
        $path=move_uploaded_file($_FILES["shoplicense"]["tmp_name"], $target_dir);
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile'=>$data['mobile'],
            'password' => Hash::make($data['password']),            
            'shop_license' => $filename,
        ]);
        $addr=new Address();
        $addr->address=$data['address'];
        $addr->city=$data['city'];
        $addr->pincode=$data['pincode'];
        $user->addresses()->save($addr);
        $addr->save();
        return $user;
    }
}
