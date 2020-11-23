@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-3 page-head">Shopping Cart</h2>
        @if(count($order) > 0)
            @if(count($order[0]->orderitems) > 0)
                @php
                    $order=$order[0]
                @endphp 
                <div class="row mt-4 mb-5">
                    <div class="col-12">
                        @foreach ($order->orderitems as $item)
                        <div class="cart-box border mb-3">
                            <div class="row p-2">
                                <div class="col-md-3 d-flex justify-content-center">
                                    <img class="w-75" src="/storage/tyreimages/{{ $item->product->image }}" alt="">
                                </div>
                                <div class="col-md-7">
                                    <h4>{{ $item->product->brand }} {{ $item->product->size->title }} {{ $item->product->title }} {{ $item->product->model }} </h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Model: {{ $item->product->model }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Price: {{ $item->product->price }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex">
                                            <form action="{{ route('cart') }}" method="post">
                                                <div class="form-group">
                                                    @csrf
                                                    <label for="qty">Quantity</label>
                                                    <input type="number" min=1 name="qty" value="{{ $item->quantity }}" class="form-control">
                                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                                    <input type="hidden" name="update" value="1">
                                                </div>
                                                <button class="btn btn-dark">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h4>Unit Total</h4>
                                    <h5>Rs. {{ $item->unittotal }}</h5>
                                    <a href="{{ route('cart_remove') }}?id={{ $item->id }}" class="text-danger font-weight-bold">Remove</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <table class="float-right">
                            <tr>
                                <th class="pr-2"><h4>Total Price</h4></th>
                                <td><h4>Rs. {{ $order->total_price }}</h4></td>
                            </tr>
                            <tr>
                                <th class="pr-2"><h4>Discount Amount:</h4></th>
                                <td><h4 class="text-danger">@if ($order->discount_amount == null)Rs. 0 @else Rs. {{ $order->discount_amount }}@endif</h4></td>
                            </tr>
                            <tr>
                                <th class="pr-2"><h4>Grand Total</h4></th>
                                <td><h4>Rs. {{ $order->grand_total }}</h4></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><button form="place-order" type="submit" class="btn btn-primary">Place Order</button></td>
                            </tr>
                        </table>
                        <form action="{{ route('place_order') }}" method="post" id="place-order">
                            @csrf 
                            <input type="hidden" name="orderid" value="{{ $order->id }}">
                        </form>
                    </div>
                </div>
            @else
                <p>No Items In Cart</p>
            @endif
        @else
            <p>No Items In Cart</p>
        @endif
    </div>
@endsection