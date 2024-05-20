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
                                <input type="number" class="form-control" id="sale_number" name="sale_number" placeholder="Sale Number" required>
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
                                <label for="sale_date">Date</label>
                                <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Sale Date" value="{{date('Y-m-d')}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sale_customer">Customer <span class="text-danger">*</span> </label>
                                <select name="sale_customer" id="sale_customer" class="form-select" required></select>
                                <input type="hidden" name="sale_customer_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sale_account">Account <span class="text-danger">*</span> </label>
                                <select name="sale_account" id="sale_account" class="form-select" required></select>
                                <input type="hidden" name="sale_account_name">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h3>Product</h3>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="search_product">Search<span class="text-danger">*</span> </label>
                                <input type="text" id="search_product" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="sale_product_name">Name<span class="text-danger">*</span> </label>
                                <input type="text" id="sale_product_name" class="form-control" readonly>
                                <input type="hidden" id="sale_product_id">
                                <input type="hidden" id="sale_product_number">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="sale_product_description">Description<span class="text-danger">*</span> </label>
                                <input type="text" id="sale_product_description" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="sale_product_quantity">Qty<span class="text-danger">*</span> </label>
                                <input type="number" onkeyup="calc_product_total(this)" id="sale_product_quantity" class="form-control">
                                <input type="hidden" id="sale_product_unit">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="sale_product_rate">Rate</label>
                                <input type="number" id="sale_product_rate" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="sale_product_discount">Discount</label>
                                <input type="number" id="sale_product_discount" class="form-control" value="0" onkeyup="calc_discount(this)">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="sale_product_total">Total </label>
                                <input type="number" id="sale_product_total" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="sale_product_add">Click to add</label>
                                <a href="javascript:void(0)" class="btn btn-info text-light" id="sale_product_add">Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12">
                            <table class="expandable-table table" id="sale_product_table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Discount %</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
    }).on('select2:select', append_customer);

    function append_customer(e) {
        let data = e.params.data;
        $('input[name="sale_customer_name"]').val(data.name);
    }

    $('#sale_account').select2({
        placeholder: 'Search Account',
        allowClear: true,
        ajax: {
            url: '{{route("search.account")}}',
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
    }).on('select2:select', append_account);

    function append_account(e) {
        let data = e.params.data;
        $('input[name="sale_account_name"]').val(data.name);
    }

    $('#search_product').select2({
        placeholder: 'Search Product',
        allowClear: true,
        ajax: {
            url: '{{route("search.product")}}',
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
                            text: item.name,
                            name: item.name,
                            description: item.description,
                            unit: item.unit,
                            number: item.product_no,
                            sale_rate: item.sale_rate,
                            sale_rate_2: item.sale_rate_2,
                            sale_rate_3: item.sale_rate_3,
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    }).on('select2:select', set_product);

    function set_product(e) {
        let data = e.params.data;
        $('#sale_product_name').val(data.name);
        $('#sale_product_description').val(data.description);
        $('#sale_product_unit').val(data.unit);
        $('#sale_product_rate').val(data.sale_rate);
        $('#sale_product_unit').val(data.unit);
        $('#sale_product_number').val(data.number);
    }

    function calc_product_total(e) {
        let qty = $(e).val();
        let rate = $('#sale_product_rate').val();
        $('#sale_product_total').val(qty * rate);
    }

    function calc_discount(e) {
        let qty = parseFloat($('#sale_product_quantity').val());
        if (qty <= 0 || isNaN(qty)) {
            alert('Please enter a valid quantity first.');
            return;
        }

        let rate = parseFloat($('#sale_product_rate').val());
        if (isNaN(rate)) {
            alert('Please add a product first.');
            return;
        }

        let discount_percent = parseFloat($(e).val());
        if (isNaN(discount_percent)) {
            alert('Please enter a valid discount.');
            return;
        }

        let total = qty * rate;
        let discount = (discount_percent / 100) * total;
        let discountedTotal = total - discount;
        $('#sale_product_total').val(discountedTotal);
    }

    $(document).on('click', '#sale_product_add', function() {
        let id = $('#sale_product_id').val();
        let name = $('#sale_product_name').val();
        let description = $('#sale_product_description').val();
        let quantity = $('#sale_product_quantity').val();
        let unit = $('#sale_product_unit').val();
        let rate = $('#sale_product_rate').val();
        let disc = $('#sale_product_discount').val();
        let total = $('#sale_product_total').val();
        $(`#sale_product_table tbody`).append(
            `<tr>
                <input type="hidden" name="item_id[]" value="${id}">     
                <input type="hidden" name="item_number[]" value="${number}">     
                <td>${number}</td>
                <td>${name}</td>
                <td>${description}</td>
                <td>${unit}</td>
                <td><input type="number" name="qty[]" class="form-control" value="${quantity}" readonly></td>
                <td><input type="number" name="rate[]" class="form-control" value="${sale_rate}" readonly></td>
                <td><input type="number" name="total[]" class="form-control" value="${total}" readonly></td>
                <td class="remove_row" ><span class="text-danger display-5"><i class="fa fa-times"></i></span></td>
            </tr>`
        );
    });



    function calc_row_total(e) {
        let row = $(e).closest('tr');
        let qty = parseFloat($(e).val());
        let rate = parseFloat(row.find('input[name="rate[]"]').val());
        let total = qty * rate;
        row.find('input[name="total[]"]').val(total.toFixed(2));
    }

    $(document).on('click', '.remove_row', function() {
        if (confirm('Are you sure you want to delete this row ?')) {
            $(this).closest('tr').remove();
        }
    });

    $('#product_form').on('submit', function(e) {
        e.preventDefault();
    });
</script>
@endsection