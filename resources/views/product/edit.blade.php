@extends('layouts.main')
@section('title','Product / Edit')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4>
                <p class="card-description"> Enter details to create new product</p>
                <form id="edit_product_form">
                    @CSRF
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_unit">Product Unit</label>
                                <input type="text" class="form-control" id="product_unit" name="product_unit" placeholder="Product Unit" value="{{$product->unit}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_unit">Product Number</label>
                                <input type="text" class="form-control" id="product_number" name="product_number" placeholder="Product Unit" value="{{$product->product_no}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Purchase Rate</label>
                                <input type="number" class="form-control" id="purchase_rate" name="purchase_rate" placeholder="Purchase Rate" value="{{$product->purchase_rate}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Sale Rate</label>
                                <input type="number" class="form-control" id="sale_rate" name="sale_rate" placeholder="Sale Rate" value="{{$product->sale_rate}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Sale Rate 1</label>
                                <input type="number" class="form-control" id="sale_rate_2" name="sale_rate_2" placeholder="Sale Rate 2" value="{{$product->sale_rate_2}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Sale Rate 2</label>
                                <input type="number" class="form-control" id="sale_rate_3" name="sale_rate_3" placeholder="Sale Rate 3" value="{{$product->sale_rate_3}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Stock Alert</label>
                                <input type="number" class="form-control" id="stock_slaer" name="stock_alert" placeholder="Minimum Stock Alert" value="{{$product->stock_alert}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Group</label>
                                <input type="text" class="form-control" id="group" name="group" placeholder="Product Group" value="{{$product->group}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Product Location</label>
                                <input type="text" class="form-control" id="product_location" name="product_location" placeholder="Product location" value="{{$product->location}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="product_lock" {{$product->lock ? "checked" : "" }}> Rate Locked <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Product Description</label>
                                <textarea class="form-control" name="description" cols="30" rows="10">{{$product->description}}</textarea>
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
<script>
    $(document).on('submit', '#edit_product_form', function(e) {
        e.preventDefault();
        let payload = new FormData(this);
        // Change method to PUT
        $.ajax({
            url: "{{route('product.update',['product'=>$product->id])}}",
            dataType: 'json',
            method: 'PUT',
            processData: false,
            contentType: false,
            data: payload,
            success: res => {
                if (res.status) {
                    swal({
                        title: 'Success',
                        text: 'Product has been updated successfully',
                        showConfirmButton: false,
                        showCancelButton: false,
                        toast: true,
                        position: "top",
                        timer: 2000,
                        icon: "success"
                    }).then(res => {
                        location.href = "{{route('product.index')}}";
                    });
                }
            },
            error: res => {
                $('.err-msg').remove();
                var errors = res.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $(`input[name="${key}"]`).after(`<small class="err-msg text-danger">${value}</small>`);
                });
            },
        });
    });
</script>

@endsection