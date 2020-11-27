@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-3 page-head">Orders</h2>
        <div class="filter-search mt-4 mb-5">
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Order Status</label><br>
                        <select class="w-75 browser-default custom-select" name="order_status" id="ordstatus">
                            <option value="">Select</option>
                            @foreach ($orderstatus as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>                  
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Delivery Status</label><br>
                        <select class="w-75 browser-default custom-select" name="delivery_status" id="delstatus">
                            <option value="">Select</option>
                            @foreach ($orderstatus as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>      
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
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->address->address}}</td>
                            <td>{{$item->address->city}}</td>
                            <td>Rs.{{ $item->grand_total }}</td>
                            <td>{{ $item->order_status }}</td>
                            <td><a class="btn btn-primary" href="{{ route('listorders') }}/{{ $item->id }}">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection