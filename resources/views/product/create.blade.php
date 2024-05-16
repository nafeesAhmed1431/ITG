@extends('layouts.main')
@section('title','Products/Create')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <p class="card-description"> Enter details to create new product</p>
                <form id="product_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_unit">Product Unit</label>
                                <input type="text" class="form-control" id="product_unit" name="product_unit" placeholder="Product Unit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_unit">Product Number</label>
                                <input type="text" class="form-control" id="product_number" name="product_number" placeholder="Product Unit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Purchase Rate</label>
                                <input type="number" class="form-control" id="purchase_rate" name="purchase_rate" placeholder="Purchase Rate">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Sale Rate</label>
                                <input type="number" class="form-control" id="sale_rate" name="sale_rate" placeholder="Sale Rate">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Sale Rate 1</label>
                                <input type="number" class="form-control" id="sale_rate_2" name="sale_rate_2" placeholder="Sale Rate 2">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Sale Rate 2</label>
                                <input type="number" class="form-control" id="sale_rate_3" name="sale_rate_3" placeholder="Sale Rate 3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Stock Alert</label>
                                <input type="number" class="form-control" id="stock_slaer" name="stock_alert" placeholder="Minimum Stock Alert">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Group</label>
                                <input type="text" class="form-control" id="group" name="group" placeholder="Product Group">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Product Location</label>
                                <input type="text" class="form-control" id="product_location" name="product_location" placeholder="Product location">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="product_lock"> Rate Locked <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Product Description</label>
                                <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
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
    $(document).on('submit', '#product_form', function(e) {
        e.preventDefault();
        let payload = new FormData(this);
        $.ajax({
            url: "{{route('product.store')}}",
            dataType: 'json',
            method: 'POST',
            processData: false,
            contentType: false,
            data: payload,
            success: res => {
                if (res.status) {
                    swal({
                        title: 'Success',
                        text: 'Product has been added successfully',
                        showConfirmButton: false,
                        showCancelButton: false,
                        toast: true,
                        position: "top",
                        timer: 2000,
                        icon: "success"
                    }).then(res => {
                        if (confirm('Do you like to add more?')) {
                            $('#product_form')[0].reset();
                        } else {
                            location.href = "{{route('product.index')}}";
                        }
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