@extends('layouts.layout')
@section('content')

    @if (session()->has('errors'))
        <div class="d-flex justify-content-center">
            <div class="position-absolute w-50">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p><b>Invalid Input Errors:</b></p>
                    <ul>{!! implode('', $errors->all('<li>:message</li>')) !!}</ul>
                    <button type="button" class="btn-close close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <h1 class="display-4 ">Sign Up</h1>
    <form action="/signup" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col mb-3">
                <label class="form-label" for="first_name">First Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="John">
            </div>
            <div class="col mb-3">
                <label class="form-label" for="middle_name">Middle Name</label>
                <input class="form-control" type="text" name="middle_name" id="middle_name" placeholder="Foo">
            </div>
            <div class="col mb-3">
                <label class="form-label" for="last_name">Last Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Doe">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label" for="gender_id">Gender<span class="text-danger">*</span></label>
                <select class="form-select" name="gender_id" id="gender_id">
                    <option value="">Choose...</option>
                    @foreach ($genders as $g)
                        <option value="{{ $g->gender_id }}">{{ ucfirst(strtolower($g->gender_desc)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label" for="role_id">Role<span class="text-danger">*</span></label>
                <select class="form-select" name="role_id" id="role_id">
                    <option value="">Choose...</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->role_id }}">{{ ucfirst(strtolower($r->role_desc)) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" id="email" placeholder="john.doe@example.com">
            </div>
            <div class="col mb-3">
                <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label class="form-label" for="display_picture">Display Picture<span
                        class="text-danger">*</span></label>
                <input class="form-control" type="file" class="form-control-file" name="display_picture"
                    id="display_picture">
            </div>
        </div>

        <div class="text-center mb-3">
            <button class="btn btn-success btn-block w-100 mb-3">Submit</button>
            <p><a href="/login">Already have an account? Login Now</a></p>
        </div>
    </form>

@endsection
