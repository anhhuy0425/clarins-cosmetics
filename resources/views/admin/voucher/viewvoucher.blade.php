<title>Admin</title>
@extends('admin.layout')
@section('content')
        <div class="container mt-4">
           <div class="container-fluid" >
                <div class="table-responsive">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createVoucherModal">Add Voucher</button>
                    </div>
                     @include('admin.voucher.add-modal')
                    <table class="table table-striped table-bordered table-hover ">
                        <thead class="table-dark text-center">
                            <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Discount_type</th>
                            <th>Discount_value</th>
                            <th>Min_order_amount</th>
                            <th>Start_date</th>
                            <th>Expiry_date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                    <tbody class="text-center">
                    </tr>
                    @foreach($vouchers as $voucher)
                        <tr>
                        <td>{{ $voucher->id}}</td>
                        <td>{{ $voucher->code}}</td>
                        <td>{{$voucher->discount_type}}</td>
                        <td>{{$voucher->discount_value}}</td>
                        <td>{{$voucher->min_order_amount}}</td>
                        <td>{{$voucher->start_date}}</td>
                        <td>{{$voucher->expiry_date}}</td>
                        <td>
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editVoucherModal{{$voucher->id}}">Edit</button>
                        <form action="{{route('destroyVoucher',$voucher->id)}}" style="display:inline;" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>

                        </td>
                        </tr>
                         @include('admin.voucher.edit-modal')
                    @endforeach
                </div>
            </div>
        </div>
@endsection
