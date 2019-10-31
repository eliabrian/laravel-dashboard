@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Menu</h1>

<div class="row">
    <div class="col-md-12">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">Menu</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Submenu</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Role</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <!-- Dropdown Card Example -->
                <div class="card shadow my-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Menu Table</h6>
                        <a href="/menu/create" class="btn btn-icon-split btn-primary btn-sm">
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

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


                <!-- Dropdown Card Example -->
                <div class="card shadow my-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Submenu Table</h6>
                        <a href="/menu/create" class="btn btn-icon-split btn-primary btn-sm">
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

            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        </div>



    </div>
</div>




@endsection