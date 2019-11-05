@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Menu</h1>

<div class="row">
    <div class="col-md-12">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-menu-tab" data-toggle="tab" href="#nav-menu" role="tab"
                    aria-controls="nav-menu" aria-selected="true">Menu</a>
                <a class="nav-item nav-link" id="nav-submenu-tab" data-toggle="tab" href="#nav-submenu" role="tab"
                    aria-controls="nav-submenu" aria-selected="false">Submenu</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-menu" role="tabpanel" aria-labelledby="nav-menu-tab">

                <!-- Dropdown Card Example -->
                <div class="card shadow my-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Menu Table</h6>
                        <a href="/menus/create" class="btn btn-icon-split btn-primary btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">New Menu</span>
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
                                        <th>Icon</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu as $m)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$m->name}}</td>
                                        <td><i class="{{$m->icon}}"></i></td>
                                        <td>{{date('d M Y h:m:s', strtotime($m->created_at))}}</td>
                                        <td>{{date('d M Y h:m:s', strtotime($m->updated_at))}}</td>
                                        <td>
                                            <a href="/menus/{{$m->id}}/edit"
                                                class="btn btn-circle btn-sm btn-outline-warning">
                                                <i class="fas fa-fw fa-pen"></i>
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-danger btn-circle btn-sm"
                                                data-toggle="modal" data-target="#deleteModal">
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

            <div class="tab-pane fade" id="nav-submenu" role="tabpanel" aria-labelledby="nav-submenu-tab">


                <!-- Dropdown Card Example -->
                <div class="card shadow my-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Submenu Table</h6>
                        <a href="/submenus/create" class="btn btn-icon-split btn-primary btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">New Submenu</span>
                        </a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableSubmenu" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu</th>
                                        <th>Name</th>
                                        <th>URL</th>
                                        <th>Icon</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sm as $sub)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sub->menu->name}}</td>
                                        <td>{{$sub->name}}</td>
                                        <td>{{$sub->url}}</td>
                                        <td><i class="{{$sub->icon}}"></i></td>
                                        <td>{{date('d M Y h:m:s', strtotime($sub->created_at))}}</td>
                                        <td>{{date('d M Y h:m:s', strtotime($sub->updated_at))}}</td>
                                        <td>
                                            <a href="/submenus/{{$sub->id}}/edit"
                                                class="btn btn-circle btn-sm btn-outline-warning">
                                                <i class="fas fa-fw fa-pen"></i>
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-danger btn-circle btn-sm"
                                                data-toggle="modal" data-target="#subDeleteModal">
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

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Delete" below if you want to delete this data.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="/menus/{{$m->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button tyle="submit" class="btn btn-light"> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="subDeleteModal" tabindex="-1" role="dialog" aria-labelledby="subDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subDeleteModalLabel">Are you sure you want to delete this?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Delete" below if you want to delete this data.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="/submenus/{{$sub->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button tyle="submit" class="btn btn-light"> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection