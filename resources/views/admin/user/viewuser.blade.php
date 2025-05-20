<title>Admin</title>
@extends('admin.layout')
@section('content')
        <div class="container mt-4">
           <div class="container-fluid" >
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead class="table-dark text-center">
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                    <tbody class="text-center">
                    </tr>
                    @foreach($users as $user)
                        <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->role}}</td>
                        <td>
                        <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                        </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
