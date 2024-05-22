@extends('layouts.main')
@section('title','Sales/show')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Sale Details
            </div>
            <div class="card-body">
                <!-- Sale details -->
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Sale Number:</strong> {{ $sale->sale_no }}</p>
                        <p><strong>Total:</strong> {{ $sale->total }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Customer:</strong> {{ $sale->customer->name }}</p>
                        <p><strong>Account:</strong> {{ $sale->account->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Sale Items
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $invoice_total = 0;
                            $total_items = 0;
                            $total_products = 0;
                            $total_discount = 0;
                            @endphp
                            @foreach($sale->invoiceItems as $item)
                            @php
                            $total_products++;
                            @endphp
                            <tr>
                                <td>{{ $item->item_no }}</td>
                                <td>{{ $item->item_desc }}</td>
                                <td>{{ $item->credit_qty }}</td>
                                @php
                                $total_items += $item->credit_qty;
                                @endphp
                                <td>{{ $item->sale_rate }}</td>
                                <td>{{($item->discount_amount / 100) * ($item->sale_rate * $item->credit_qty)}} ({{ $item->discount_amount }}%)</td>
                                <td>
                                    @php
                                    $totalBeforeDiscount = $item->sale_rate * $item->credit_qty;
                                    $discountAmount = ($item->discount_amount / 100) * $totalBeforeDiscount;
                                    $total_discount += $discountAmount;
                                    $totalAfterDiscount = $totalBeforeDiscount - $discountAmount;
                                    $invoice_total += $totalAfterDiscount;
                                    @endphp
                                    {{ $totalAfterDiscount }}
                                </td>
                            </tr>
                            @endforeach

                        <tfoot>
                            <tr class="bg-info">
                                <td colspan="2"> <span class="h4">Total</span></td>
                                <td>{{$total_items}}</td>
                                <td></td>
                                <td>{{$total_discount}}</td>
                                <td>{{$invoice_total}}</td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <a href="{{route('sale.index')}}" class="btn bg-primary text-light">Back</a>
        </div>
    </div>
</div>
@endsection