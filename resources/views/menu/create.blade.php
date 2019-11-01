@extends('layouts.app')

@section('title', 'New User')

@section('content')
<h1 class="h3 mb-4 text-gray-800">New User</h1>


<div class="row">

    <div class="col-lg-8">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                New Menu Form
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <form action="/menus" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-dark">Menu Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="e.g. Content" autocomplete="off" value="{{ old('name') }}"
                            required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="icon" class="text-dark">Icon<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                            name="icon" placeholder="e.g. fas fa-fw fa-users" autocomplete="off"
                            value="{{ old('icon') }}" required>
                        @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                    <a href="/menus" class="btn btn-outline-primary float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection