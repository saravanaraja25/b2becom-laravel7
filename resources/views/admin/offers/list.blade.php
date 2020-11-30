@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Offers</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>                        
                        <li class="breadcrumb-item active" aria-current="page">Offers</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('offers.create') }}" class=" mb-4 btn btn-success">Create Offers</a>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Offer Name</th>
                                <th>Coupon Code</th>                                
                                <th>Discount Type</th>
                                <th>Discount Value</th>
                                <th>Created At</th>
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <td>{{ $offer->id }}</td>
                                    <td>{{ $offer->offer_name }}</td>
                                    <td>{{ $offer->coupon_code }}</td>                                    
                                    <td>{{ $offer->discount_type }}</td>
                                    <td>{{ $offer->discount_value }}</td>
                                    <td>{{ $offer->created_at }}</td>
                                    <td class="d-flex">
                                        {{-- <a href="{{ route('offers.edit', $offer->id)}}" class="mr-2 btn btn-primary text-white"><i class="fas fa-edit mr-1"></i>Edit</a> --}}
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['offers.destroy', $offer->id]
                                        ]) !!}
                                            <button class='btn btn-danger' type='submit' value='submit'>
                                                <i class='fa fa-trash'> </i> Delete</button>
                                        {!! Form::close() !!}
                                    </td>
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