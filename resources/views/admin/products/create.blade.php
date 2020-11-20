@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Create Product</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="breadcrumb-link">Product</a></li>
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
                {{ Form::open(array('action' => ['Admin\ProductController@store'],'method'=>'POST','files' => true)) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Tyre Name')}}
                        {{ Form::text('title','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Tyre Description')}}
                        {{ Form::textarea('description','',['class'=>'form-control']) }}                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('size_id', 'Tyre Size')}}                                
                                <select name="size_id" id="size_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($size as $size)
                                        <option value={{ $size->id }}>{{ $size->title }}</option>
                                    @endforeach  
                                </select>
                                               
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('brand', 'Tyre Brand')}}
                                {{ Form::text('brand','',['class'=>'form-control']) }}                        
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('model', 'Tyre Model(Year)')}}
                                {{ Form::text('model','',['class'=>'form-control']) }}                        
                            </div>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('warranty_available', 'Warranty Available?')}}
                                <select name="warranty_available" id="warranty_available" class="form-control">                                    
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('warranty_type', 'Warranty Type')}}
                                <select name="warranty_type" id="warranty_type" class="form-control">                                    
                                    <option value="month">Month</option>
                                    <option value="year">Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('warranty_duration', 'Warranty Period')}}
                                {{ Form::number('warranty_duration','0',['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('price', 'Price')}}
                                {{ Form::number('price','0',['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('stock', 'Stocks')}}
                                {{ Form::number('stock','0',['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('image', 'Image Upload')}}
                                <br>
                                {{ Form::file('image') }}
                            </div>
                        </div>
                    </div>
                    {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
                    <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection