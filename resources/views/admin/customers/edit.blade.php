@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Edit Customers</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}" class="breadcrumb-link">Customers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Edit</h5>
            <div class="card-body">
                {{ Form::open(array('action' => ['CustomerController@update',$user->id],'method'=>'POST')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name')}}
                        {{ Form::text('name',$user->name,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'E-Mail Address')}}
                        {{ Form::text('email',$user->email,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('email_verified_at', 'Verification')}}
                        <div class="form-control border-0">
                            @if ($user->email_verified_at == null)
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('email_verified_at', \Carbon\Carbon::now(), false ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Verified</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('email_verified_at', '', true ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Not Verified</span>
                                </label>
                            @else
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('email_verified_at', \Carbon\Carbon::now(), true ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Verified</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('email_verified_at', '', false ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Not Verified</span>
                                </label>
                            @endif                        
                        </div>
                    </div>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
                    <a href="{{ route('customers.index') }}" class="btn btn-light">Cancel</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection