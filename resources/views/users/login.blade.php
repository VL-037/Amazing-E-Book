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
    <h1 class="display-4 ">Log In</h1>
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email">Email Address</label>
            <input class="form-control" type="text" name="email" id="email" placeholder="john.doe@example.com">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
        </div>

        <div class="text-center mb-3">
            <button class="btn btn-success btn-block w-100 mb-3">Login</button>
            <p><a href="/signup">Don't have an account? Sign Up Now</a></p>
        </div>
    </form>

@endsection
