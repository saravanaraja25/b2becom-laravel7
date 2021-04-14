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
                            <form class="d-flex" action="{{ route('cart_save') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="product_id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" value="1" max="{{ $item->stock}}" class="form-control mt-1" name="qty" id="qty">
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <button class="btn btn-primary"><i class="fas fa-cart-plus"></i>Add to Cart</button>
                                    </div>
                                </div>                                
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="justify-content-center d-flex">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter_{{ $item->id}}">Add Review</button>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalCenter_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Product Feedback and Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <th>Tyre Name:</th>
                                                <td>{{ $item->title}}</td>
                                            </tr>
                                            <tr>
                                                <th>Price:</th>
                                                <td>Rs.{{ $item->price}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('store_review') }}" method="POST" id="feedback_form_{{ $item->id }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="rating">Enter Your Rating:</label>
                                                <select name="rating" class="form-control" id="rating" required>
                                                    <option value="">Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="feedback">Enter your Reviews:</label>
                                                <textarea class="form-control" name="feedback" id="feedback"></textarea>
                                            </div>
                                            <input type="hidden" value="{{ $item->id }}" name="product_id">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button form="feedback_form_{{ $item->id }}" type="submit" class="btn btn-secondary">Submit</button>                                
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
