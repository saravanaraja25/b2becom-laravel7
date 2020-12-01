@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Orders</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>                        
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
{{-- <a href="{{ route('orders.create') }}" class=" mb-4 btn btn-success">Create Orders</a> --}}
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created At</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>                                
                                <th>Address</th>
                                <th>City</th>
                                <th>Order Status</th>
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td>{{$item->address->address}}</td>
                                    <td>{{$item->address->city}}</td>
                                    <td>Rs.{{ $item->grand_total }}</td>
                                    <td>{{ $item->order_status }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('orders.edit',$item->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection