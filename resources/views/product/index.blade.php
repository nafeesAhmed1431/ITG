@extends('layouts.main')
@section('title','Products')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="card-title mb-0">Products</p>
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-warning" > <span class="fa fa-plus"></span> Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Unit</th>
                                <th>Sale Rate</th>
                                <th>Stock Alert</th>
                                <th>Group</th>
                                <th>Locked</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center"><span class="text-danger">No Products Found.</span></td>
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