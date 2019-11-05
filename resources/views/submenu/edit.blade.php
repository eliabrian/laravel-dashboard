@extends('layouts.app')

@section('title', 'New Submenu')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Submenu</h1>


<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="col-lg-8">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                Submenu Form
            </div>
            <div class="card-body">

                <form action="/submenus/{{$submenu->id}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-dark">Submenu Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="e.g. Agenda" autocomplete="off" value="{{ $submenu->name }}"
                            required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url" class="text-dark">URL<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                            placeholder="" autocomplete="off" value="{{ $submenu->url }}" required>
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="icon" class="text-dark">Icon<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                name="icon" placeholder="e.g. fas fa-fw fa-users" autocomplete="off"
                                value="{{ $submenu->icon }}" required>
                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="menu_id" class="text-dark">Menu<sup class="text-danger">*</sup></label>
                            <select id="menu_id" class="form-control @error('email') is-invalid @enderror"
                                name="menu_id">
                                <option>Choose a menu...</option>
                                @foreach ($menus as $m)
                                <option value={{$m->id}} @if($submenu->menu_id == $m->id) {{"selected"}} @endif
                                    >{{$m->name}}</option>
                                @endforeach
                            </select>
                            @error('menu_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                    <a href="/menus" class="btn btn-outline-primary float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection