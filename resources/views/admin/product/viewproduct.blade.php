<title>Admin</title>
@extends('admin.layout')
@section('content')
        <div class="container mt-4">
           <div class="container-fluid" >
                <div class="table-responsive">
                     <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createProductModal">Add Product</button>
                    </div>
                     @include('admin.product.add-modal')
                    <table class="table table-striped table-bordered table-hover ">
                        <thead class="table-dark text-center">
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                    <tbody class="text-center">
                    </tr>
                    @foreach($products as $product)
                        <tr>
                        <td>{{ $product->id}}</td>
                        <td>{{ $product->product_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editProductModal{{$product->id}}">Edit</button>
                        <form action="{{route('destroyProduct',$product->id)}}" style="display:inline;" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                        </td>
                        </tr>
                        @include('admin.product.edit-modal')
                    @endforeach
                </div>
            </div>
        </div>
@endsection
