@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mt-3 page-head">My Account</h2>
        {{ Form::open(array('action' => ['HomeController@myaccountupdate'],'method'=>'POST','autocomplete'=>'off')) }}
            <div class="row mt-4">
                <div class="col-md-6">
                    
                        <div class="form-group">
                            {{ Form::label('name', 'Name')}}
                            {{ Form::text('name',$user->name,['class'=>'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail Address')}}
                            {{ Form::text('email',$user->email,['class'=>'form-control','disabled'=>'']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('mobile', 'Mobile')}}
                            {{ Form::text('mobile',$user->mobile,['class'=>'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('addresses', 'Address')}}
                            <select name="address_id" id="size_id" value="{{ $user->address_id }}" class="form-control" required>
                                @foreach ($user->addresses as $address)
                                    <option value={{ $address->id }}>{{ $address->city }}</option>
                                @endforeach  
                            </select>
                        </div>
                        
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('oldpassword', 'Old Password')}}
                        {{ Form::password('oldpassword',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('newpassword', 'New Password')}}
                        {{ Form::password('newpassword',['class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
            <a href="{{ route('customers.index') }}" class="btn btn-light">Cancel</a>
        {{ Form::close() }}
    </div>

@endsection