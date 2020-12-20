@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Advertisements</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>                        
                        <li class="breadcrumb-item active" aria-current="page">Advertisements</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('advertisements.create') }}" class=" mb-4 btn btn-success">Create Advertisement</a>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>                                
                                <th>Created At</th>
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisement as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>                                    
                                    <td>{{ $item->created_at }}</td>
                                    <td class="d-flex">
                                        {{-- <a href="{{ route('offers.edit', $offer->id)}}" class="mr-2 btn btn-primary text-white"><i class="fas fa-edit mr-1"></i>Edit</a> --}}
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['advertisements.destroy', $item->id]
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