@extends('admin.layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Admin Home </h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Dashboard</a></li>                        
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="ecommerce-widget">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Today Sale</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">Rs.{{$todaysale}}</h1>
                        </div>                        
                    </div>
                    {{-- <div id="sparkline-revenue"></div> --}}
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">New Retailers Sign Up</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$newusers}}</h1>
                        </div>
                    </div>
                    {{-- <div id="sparkline-revenue2"></div> --}}
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Today Orders</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{count($orders)}}</h1>
                        </div>
                    </div>
                    {{-- <div id="sparkline-revenue3"></div> --}}
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Categories</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$cat}}</h1>
                        </div>
                    </div>
                    {{-- <div id="sparkline-revenue4"></div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ============================================================== -->
            <!-- sales  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Sales</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">Rs.{{$totalsale}}</h1>
                        </div>                 
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end sales  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- new customer  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Retailers</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$totalusers}}</h1>
                        </div>                 
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end new customer  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- visitor  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Products</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{count($totproducts)}}</h1>
                        </div>                       
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end visitor  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total orders  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Orders</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{count($totorder)}}</h1>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total orders  -->
            <!-- ============================================================== -->
        </div>
        <div class="row">
            <!-- ============================================================== -->
      
            <!-- ============================================================== -->

                          <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Recent Orders</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">User Name</th>
                                        <th class="border-0">Order Link</th>
                                        <th class="border-0">Quantity</th>
                                        <th class="border-0">Price</th>
                                        <th class="border-0">Order Time</th>                                        
                                        <th class="border-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->customer->name}}</td>  
                                            <td class="text-success"><a class="text-danger" href="{{ route('admin.dashboard') }}/orders/{{$item->id}}/edit">Edit Order</a></td>
                                            <td>{{count($item->orderitems)}}</td>
                                            <td>{{ $item->grand_total }}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{ $item->delivery_status }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="9"><a href="{{ route('admin.dashboard') }}/orders" class="btn btn-outline-light float-right">View Details</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end recent orders  -->


            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- customer acquistion  -->
            <!-- ============================================================== -->
            {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Customer Acquisition</h5>
                    <div class="card-body">
                        <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                        <div class="text-center">
                            <span class="legend-item mr-2">
                                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                            <span class="legend-text">Returning</span>
                            </span>
                            <span class="legend-item mr-2">

                                    <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                            <span class="legend-text">First Time</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ============================================================== -->
            <!-- end customer acquistion  -->
            <!-- ============================================================== -->
        </div>
        
    </div>
@endsection
