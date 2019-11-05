@extends('layouts.app')

@section('title', 'Role')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Role</h1>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Role Table
                </h6>
                <a href="/roles/create" class="btn btn-icon-split btn-primary btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">New Role</span>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection