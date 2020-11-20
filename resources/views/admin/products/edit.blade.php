@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Edit Product</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="breadcrumb-link">Product</a></li>
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
                {{ Form::open(array('action' => ['Admin\ProductController@update',$product->id],'method'=>'POST')) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Tyre Name')}}
                        {{ Form::text('title',$product->title,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Tyre Description')}}
                        {{ Form::textarea('description',$product->description,['class'=>'form-control']) }}                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('size_id', 'Tyre Size')}}                                
                                <select name="size_id" id="size_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($size as $size)
                                        @if ($size->id == $product->tyre_size_id)
                                            <option selected value={{ $size->id }}>{{ $size->title }}</option>
                                        @else
                                            <option value={{ $size->id }}>{{ $size->title }}</option>
                                        @endif
                                        
                                    @endforeach  
                                </select>
                                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('brand', 'Tyre Brand')}}
                                {{ Form::text('brand',$product->brand,['class'=>'form-control']) }}                        
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('model', 'Tyre Model(Year)')}}
                                {{ Form::text('model',$product->model,['class'=>'form-control']) }}                        
                            </div>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('warranty_available', 'Warranty Available?')}}
                                <select name="warranty_available" id="warranty_available" value="{{$product->warranty_available}}" class="form-control">                                    
                                    @if ($product->warranty_available == 0)
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    @else
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    @endif                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('warranty_type', 'Warranty Type')}}
                                <select name="warranty_type" id="warranty_type" value="{{$product->warranty_type}}" class="form-control">                                    
                                    @if ($product->warranty_available == 'month')
                                        <option value="month" selected>Month</option>
                                        <option value="year">Year</option>
                                    @else
                                        <option value="month">Month</option>
                                        <option value="year" selected>Year</option>
                                    @endif                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('warranty_duration', 'Warranty Period')}}
                                {{ Form::number('warranty_duration',$product->warranty_duration,['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('price', 'Price')}}
                                {{ Form::number('price',$product->price,['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('stock', 'Stocks')}}
                                {{ Form::number('stock',$product->stock,['class'=>'form-control']) }}
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
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
                    <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection