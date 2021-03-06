@extends('layouts.app')

@section('title', 'New User')

@section('content')
<h1 class="h3 mb-4 text-gray-800">New User</h1>


<div class="row">

    <div class="col-lg-8">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                New User Form
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <form action="/users" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-dark">Full Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="e.g. John Doe" autocomplete="off" value="{{ old('name') }}"
                            required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username" class="text-dark">Username<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="Username" autocomplete="off" value="{{ old('username') }}"
                            required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="email" class="text-dark">Email<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="example@mail.com" autocomplete="off"
                                value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="role" class="text-dark">Role<sup class="text-danger">*</sup></label>
                            <select id="role" class="form-control @error('email') is-invalid @enderror" name="role_id">
                                <option selected>Choose a role...</option>
                                @foreach ($roles as $r)
                                <option value={{$r->id}}>{{$r->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password" class="text-dark">Password<sup class="text-danger">*</sup></label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class=" form-group col-md-6">
                            <label for="password-confirm" class="text-dark">Confirm Password<sup
                                    class="text-danger">*</sup></label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                    <a href="/users" class="btn btn-outline-primary float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection