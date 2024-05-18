@extends('layouts.main')
@section('title','Sale/Create')
@section('styles')
<link href="{{url('assets/css/select2.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Sale</h4>
                <p class="card-description"><span class="text-danger">*</span> Fields are required</p>
                <form id="product_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sale_number">Sale Number <span class="text-danger">*</span> </label>
                                <input type="number" class="form-control" id="sale_number" name="sale_number" placeholder="Sale Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sale_date">Date</label>
                                <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Sale Date" value="{{date('Y-m-d')}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sale_title">Sale Title</label>
                                <input type="text" class="form-control" id="sale_title" name="sale_title" placeholder="Sale Title">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sale_customer">Customer <span class="text-danger">*</span> </label>
                                <select name="sale_customer" id="sale_customer" class="form-select"></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <a href="{{route('product.index')}}" class="btn btn-light mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('assets/js/select2.js')}}"></script>
<script>
    $('#sale_customer').select2({
        placeholder: 'Search Customer',
        allowClear: true,
        ajax: {
            url: '{{route("search.customer")}}',
            dataType: 'json',
            delay: 250,
            data: params => {
                return {
                    search_query: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
</script>
@endsection