@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Edit Order</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tyresizes.index') }}" class="breadcrumb-link">Orders</a></li>
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
                {{ Form::open(array('action' => ['Admin\OrderController@update',$order->id],'method'=>'POST')) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Name')}}
                        {{ Form::text('title',$order->customer->name,['class'=>'form-control','disabled'=>'']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('order_status', 'Order Status')}}
                        {{ Form::text('order_status',$order->order_status,['class'=>'form-control','disabled'=>'']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('delivery_status', 'Delivery Status')}}
                        {{ Form::text('delivery_status',$order->delivery_status,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('delivery_note', 'Delivery Note')}}
                        {{ Form::textarea('delivery_note',$order->delivery_note,['class'=>'form-control']) }}
                    </div>
                    {{ Form::hidden('_method','PUT') }}
                    {{ Form::submit('Save Changes',['class'=>'btn btn-primary']) }}
                    <a href="{{ route('orders.index') }}" class="btn btn-light">Cancel</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection