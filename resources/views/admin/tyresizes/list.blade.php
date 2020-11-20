@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">TyreSizes</h2>            
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>                        
                        <li class="breadcrumb-item active" aria-current="page">TyreSizes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('tyresizes.create') }}" class=" mb-4 btn btn-success">Create TyreSize</a>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Size</th>
                                <th>Enabled</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($size as $size)
                                <tr>
                                    <td>{{ $size->id }}</td>
                                    <td>{{ $size->title }}</td>
                                    <td>
                                        @if ($size->status == 0)
                                            <p class="text-danger">Disabled</p>
                                        @else
                                            <p class="text-success">Enabled</p>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('tyresizes.edit', $size->id)}}" class="mr-2 btn btn-primary text-white"><i class="fas fa-edit mr-1"></i>Edit</a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['tyresizes.destroy', $size->id]
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