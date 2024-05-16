@extends('layouts.main')
@section('title','Products')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="card-title mb-0">Products</p>
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-warning"> <span class="fa fa-plus"></span> Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
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
                                <td>{{$product->product_no}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->unit}}</td>
                                <td>
                                    {{$product->sale_rate}}
                                    <hr>
                                    Rate 2 : {{$product->sale_rate_2}}
                                    <hr>
                                    Rate 3 : {{$product->sale_rate_3}}
                                </td>
                                <td>{{$product->stock_alert}}</td>
                                <td>{{$product->group}}</td>
                                <td><span class="badge bg-{{$product->lock ? 'danger' : 'success'}}">{{$product->lock ? "Yes" : "No" }}</span> </td>
                                <td>{{$product->location}}</td>
                                <td>
                                    <a href="{{route('product.show',['product'=>$product->id])}}"> <span class="badge bg-info"><i class="fa fa-eye"></i> View</span></a>
                                    <a href="{{route('product.edit',['product'=>$product->id])}}"> <span class="badge bg-primary"><i class="fa fa-edit"></i> Edit</span></a>
                                    <a href="{{ route('product.delete', ['id' => $product->id]) }}">
                                        <span class="badge bg-danger"><i class="fa fa-trash"></i> Delete</span>
                                    </a>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center"><span class="badge badge-warning"> <i class="fa fa-warning"></i> No Products Found.</span></td>
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