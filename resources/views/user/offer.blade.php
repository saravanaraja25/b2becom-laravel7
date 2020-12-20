@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-3 page-head">Advertisements</h2>
    <div class="product-grid mt-4 mb-5">
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($adv as $item)
                <div class="col mb-4">
                    <div class="card">
                        <div class="view overlay">
                            <h5 class="text-center pt-2">{{ $item->name }}</h5>
                            <img class="card-img-top prod-img" src="/storage/advertisement/{{ $item->image}}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="justify-content-center d-flex">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter_{{ $item->id}}">Open</button>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalCenter_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Advertisement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img class="card-img-top prod-img" src="/storage/advertisement/{{ $item->image}}" alt="Card image cap">
                                        <table class="table">
                                            <tr>
                                                <th>Name:</th>
                                                <td>{{ $item->name}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
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
