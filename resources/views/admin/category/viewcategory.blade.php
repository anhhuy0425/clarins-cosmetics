<title>Admin</title>
@extends('admin.layout')
@section('content')
        <div class="container mt-4">
           <div class="container-fluid" >
                <div class="table-responsive">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCategoryModal">Add Category</button>
                    </div>
                     @include('admin.category.add-modal')
                    <table class="table table-striped table-bordered table-hover ">
                        <thead class="table-dark text-center">
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                    <tbody class="text-center">
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{ $category->description}}</td>
                        <td>
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal{{$category->id}}">Edit</button>
                        <form action="{{route('destroyCategory',$category->id)}}" style="display:inline;" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                        </td>
                        </tr>
                        @include('admin.category.edit-modal')
                    @endforeach
                </div>
            </div>
        </div>
@endsection
