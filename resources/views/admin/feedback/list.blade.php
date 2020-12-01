@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Feedbacks</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>                        
                        <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
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
                                <th>Product Name</th>                                
                                <th>Rating</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedback as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td>{{$item->product->title}}</td>
                                    <td>{{$item->rating}}</td>
                                    <td>{{ $item->feedback }}</td>                                    
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