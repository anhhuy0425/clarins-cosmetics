@extends('layouts')
@section('content')
            <nav aria-label="breadcrumb" class="breadcrumb-style1">
                <div class="container">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
                    </ol>
                </div>
            </nav>
            @if ($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            <form method="POST" action="{{ route('order.track') }}">
                @csrf
                <div class="mb-3">
                    <label for="phone" class="form-label">Nhập mã đơn hàng của bạn:</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Tra cứu</button>
            </form>
            @if ($order)
                <hr>
                <h4>Kết quả tra cứu:</h4>
                <p><strong>Mã đơn hàng:</strong> {{ $order->phone }}</p>
                <p><strong>Địa chỉ: </strong> {{ $order->address }}</p>
                <p><strong>Trạng thái:</strong> {{ ucfirst($order->order_detail) }}</p>
                <p><strong>Tổng giá trị: </strong> {{ $order->total_amount }}</p>
                <p><strong>Phương thức thanh toán: </strong> {{ $order->payment_method }}</p>
                <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
            @endif
@endsection
