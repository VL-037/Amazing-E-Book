@extends('layouts.layout')
@section('content')

    @if (session()->has('errors'))
        <div class="d-flex justify-content-center">
            <div class="position-absolute w-50">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p><b>{{ __('view.invalid_input') }}:</b></p>
                    <ul>{!! implode('', $errors->all('<li>:message</li>')) !!}</ul>
                    <button type="button" class="btn-close close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <h1 class="display-4 ">{{ __('view.page_header.login') }}</h1>
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email">{{ __('view.input.email') }}</label>
            <input class="form-control" type="text" name="email" id="email" placeholder="john.doe@example.com">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">{{ __('view.input.password') }}</label>
            <input class="form-control" type="password" name="password" id="password"
                placeholder="{{ __('view.input.password') }}">
        </div>

        <div class="text-center mb-3">
            <button class="btn btn-success btn-block w-100 mb-3">{{ __('view.button.login') }}</button>
            <p><a href="/signup">{{ __('view.dont_have_account') }}</a></p>
        </div>
    </form>

@endsection
