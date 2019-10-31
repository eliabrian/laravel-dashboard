@extends('layouts.app')

@section('title', 'User')

@section('content')
<h1 class="h3 mb-4 text-gray-800">User</h1>

<div class="row">
    <div class="col-md-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
                <a href="/user/create" class="btn btn-icon-split btn-primary btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">New User</span>
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->username}}</td>
                                <td class="text-capitalize">{{$user->role->name}}</td>
                                <td>{{date('d M Y h:m:s', strtotime($user->created_at))}}</td>
                                <td>{{date('d M Y h:m:s', strtotime($user->updated_at))}}</td>
                                <td>
                                    <a href="#" class="btn btn-circle btn-sm btn-warning">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-circle btn-sm btn-danger">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection