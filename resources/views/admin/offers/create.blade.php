@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Create Offer</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tyresizes.index') }}" class="breadcrumb-link">Offers</a></li>
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
                {{ Form::open(array('action' => ['Admin\OfferController@store'],'method'=>'POST')) }}
                    <div class="form-group">
                        {{ Form::label('offer_name', 'Name')}}
                        {{ Form::text('offer_name','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('coupon_code', 'Coupon Code')}}
                        {{ Form::text('coupon_code','',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('discount_type', 'Discount Type')}}
                        <select class="form-control" name="discount_type" id="discounttype">
                            <option value="percent">Percentage</option>
                            <option value="amount">Amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('brands', 'Brands')}}
                        <select class="form-control" name="brand[]" multiple id="brand">
                            @foreach ($brand as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('rule', 'Rule')}}
                        <select class="form-control" name="rule" id="rule">                            
                            <option value="applyontotal">Apply On Cart Total</option>
                            <option value="applyonproducts">Apply On Products</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('discount_value', 'Discount Value')}}
                        {{ Form::number('discount_value','0',['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('expiry_date', 'Expiry Date')}}
                        {{ Form::date('expiry_date','',['class'=>'form-control']) }}
                    </div>
                    {{ Form::submit('Create',['class'=>'btn btn-primary']) }}
                    <a href="{{ route('offers.index') }}" class="btn btn-light">Cancel</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection