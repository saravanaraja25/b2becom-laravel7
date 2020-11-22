@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-3 page-head">Buy Tyres</h2>
    <div class="filter-search mt-4 mb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" name="search" placeholder="Search - Example ( 2055516 - 205/55R16 )" class="form-control" value="">
                    <div class="" style="width: 100px;">
                        <button class="input-group-text" type="submit" style="font-size: 1.40rem;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a class="btn btn-primary" href="{{ route('home') }}"><i class="fas mr-2 fa-sync-alt"></i>Reset</a>
            </div>            
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Size</label><br>
                    <select class="w-75 browser-default custom-select" name="brand" id="brand">
                        <option value="">Select</option>
                        @foreach ($size as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select> 
                </div>
            </div>            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Brand</label><br>
                    <select class="w-75 browser-default custom-select" name="brand" id="brand">
                        <option value="">Select</option>
                        @foreach ($brand as $item)
                            <option value="{{$item}}">{{ $item }}</option>
                        @endforeach
                    </select> 
                </div>
            </div>            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Model(Year)</label><br>
                    <select class="w-75 browser-default custom-select" name="brand" id="brand">
                        <option value="">Select</option>
                        @foreach ($year as $item)
                            <option value="{{$item}}">{{ $item }}</option>
                        @endforeach
                    </select> 
                </div>
            </div>            
        </div>
    </div>
    <div class="product-grid">
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($product as $item)
                <div class="col mb-4">
                    <div class="card">
                        <div class="view overlay">
                            <h5 class="text-center pt-2">{{ $item->title }}</h5>
                            <img class="card-img-top prod-img" src="/storage/tyreimages/{{ $item->image}}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Price : Rs.{{ $item->price }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Model : {{ $item->model }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Model : {{ $item->brand }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Tyre Size : {{ $item->size->title }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="p-2 bg-success text-white font-weight-bold text-center rounded">Stock : {{ $item->stock }}</p>
                                </div>
                            </div>
                            <form class="d-flex" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" value="1" max="{{ $item->stock}}" class="form-control mt-1" name="qty" id="qty">
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <button class="btn btn-primary"><i class="fas fa-cart-plus"></i>Add to Cart</button>
                                    </div>
                                </div>                                
                            </form>
                        </div>
                  
                      </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
