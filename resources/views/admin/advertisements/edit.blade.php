@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Edit TyreSizes</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tyresizes.index') }}" class="breadcrumb-link">TyreSizes</a></li>
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
                {{ Form::open(array('action' => ['Admin\TyreSizeController@update',$size->id],'method'=>'POST')) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Name')}}
                        {{ Form::text('title',$size->title,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('status', 'Enabled?')}}
                        <div class="form-control border-0">
                            @if ($size->status == 0)
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('status', '1', false ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Verified</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('status', '0', true ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Not Verified</span>
                                </label>   
                            @else
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('status', '1', true ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Verified</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('status', '0', false ,['class'=>'custom-control-input']) }}
                                    <span class="custom-control-label">Not Verified</span>
                                </label>   
                            @endif                        
                        </div>
                    </div>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
                    <a href="{{ route('tyresizes.index') }}" class="btn btn-light">Cancel</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection