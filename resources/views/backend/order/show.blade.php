@extends('backend.layouts.master')
@section('title', $title.' '.$panel)
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('backend.includes.top_header')

    <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="col-lg-12">
                <a href="{{route($base_route.'.index')}}" class="btn btn-primary">List {{$panel}}s</a>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>{{$data['row']->name}}</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{$data['row']->customers->name}}</td>
                            </tr>

                            <tr>
                                <th>Delivery Address</th>
                                <td>{{$data['row']->address}}</td>
                            </tr>

                            <tr>
                                <th>Total amount before tax</th>
                                <td>Rs. {{$data['row']->subtotal}}</td>
                            </tr>

                            <tr>
                                <th>Total discount</th>
                                <td>Rs. {{$data['row']->discount}}</td>
                            </tr>

                            <tr>
                                <th>Taxable amount</th>
                                <td>Rs. {{$data['row']->tax}}</td>
                            </tr>

                            <tr>
                                <th>Total amount</th>
                                <td>Rs. {{$data['row']->total}}</td>
                            </tr>

                            <tr>
                                <th>Payment Type</th>
                                <td>{{$data['row']->payment_type}}</td>
                            </tr>

                            <tr>
                                <th>Order Date</th>
                                <td>{{$data['row']->created_at->toDateString()}}</td>
                            </tr>

                        </table>
                        <hr>
                        <h3>Produts bought</h3>
                        <table class="table table-bordered">

                            @foreach($data['row']->orderDetails as $detail)
                                <tr>
                                    <th>{{$detail->products->title}}</th>
                                    <td>
                                        <ul>
                                            <li>Unit Price: Rs. <b>{{$detail->price}}</b></li>
                                            <li>Quantity: <b>{{$detail->quantity}}</b></li>
                                            @if($detail->discount)
                                                <li>Discount amount: Rs. <b>{{$detail->discount}}</b></li>
                                                <li>Discounted Price: Rs. <b>{{$detail->discounted_price}}</b></li>
                                            @endif
                                            <li>Total Tax: Rs. <b>{{$detail->tax}}</b></li>
                                            <li>Total amount before tax: Rs. <b>{{$detail->subtotal}}</b></li>
                                            <li>Total amount after tax: Rs. <b>{{$detail->total}}</b></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>


            </div>
        </section>



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection









