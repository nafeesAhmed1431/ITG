@extends('layouts.main')
@section('title','Sales')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="card-title mb-0">Sales</p>
                    <a href="{{route('sale.create')}}" class="btn btn-sm btn-warning"> <span class="fa fa-plus"></span> Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Customer</th>
                                <th>Title</th>
                                <th>Discount</th>
                                <th>Date-Time</th>
                                <th>Total</th>
                                <th>Sale By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $sale)
                            <tr>
                                <td>{{$sale->sale_no}}</td>
                                <td>{{$sale->customer_name}}</td>
                                <td>Sale Title</td>
                                <td>{{$sale->discount}}</td>
                                <td>{{$sale->created_at}}</td>
                                <td>{{$sale->total}}</td>
                                <td>Admin</td>
                                <td>Actions</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center"><span class="badge badge-warning"> <i class="fa fa-warning"></i> No Sales Found.</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection