@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-3 page-head">Order Info</h2>
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
                                            <p>Quantity: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h4>Unit Total</h4>
                                    <h5>Rs. {{ $item->unittotal }}</h5>
                                    {{-- <a href="{{ route('cart_remove') }}?id={{ $item->id }}" class="text-danger font-weight-bold">Remove</a> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">                        
                    </div>
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
                        </table>                        
                    </div>
                </div>
                <div class="orders-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Order Address</th>
                                <th>City</th>
                                <th>Pincode</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->address->address}}</td>
                                    <td>{{$order->address->city}}</td>
                                    <td>{{$order->address->pincode}}</td>
                                    <td>Rs.{{ $order->grand_total }}</td>
                                    <td>{{ $order->order_status }}</td>                                    
                                </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <p>No Order</p>
            @endif
        @else
            <p>No Order</p>
        @endif
    </div>
@endsection