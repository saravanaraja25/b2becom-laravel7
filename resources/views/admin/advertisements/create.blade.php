@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Create Advertisement</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('advertisements.index') }}" class="breadcrumb-link">Advertisements</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Create</h5>
            <div class="card-body">
                {{ Form::open(array('action' => ['Admin\AdvertisementController@store'],'method'=>'POST','files' => true)) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name')}}
                        {{ Form::text('name','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description')}}
                        {{ Form::textarea('description','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            {{ Form::label('image', 'Image Upload')}}
                            <br>
                            {{ Form::file('image') }}
                        </div>
                    </div>     
                    {{ Form::submit('Create',['class'=>'btn btn-primary']) }}
                    <a href="{{ route('advertisements.index') }}" class="btn btn-light">Cancel</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection