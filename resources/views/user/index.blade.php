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
                <a href="/users/create" class="btn btn-icon-split btn-primary btn-sm">
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
                                    <a href="/users/{{$user->id}}/edit" class="btn btn-circle btn-sm btn-warning">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </button>

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Delete" below if you want to delete this data.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="/users/{{$user->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button tyle="submit" class="btn btn-light"> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection