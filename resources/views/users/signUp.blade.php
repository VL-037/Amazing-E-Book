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
    <h1 class="display-4 ">{{ __('view.page_header.sign_up') }}</h1>
    <form action="/signup" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col mb-3">
                <label class="form-label"
                    for="{{ __('view.input.first_name') }}">{{ __('view.input.first_name') }}<span
                        class="text-danger">*</span></label>
                <input class="form-control" type="text" name="first_name" id="{{ __('view.input.first_name') }}"
                    placeholder="John">
            </div>
            <div class="col mb-3">
                <label class="form-label"
                    for="{{ __('view.input.middle_name') }}">{{ __('view.input.middle_name') }}</label>
                <input class="form-control" type="text" name="middle_name" id="{{ __('view.input.middle_name') }}"
                    placeholder="Foo">
            </div>
            <div class="col mb-3">
                <label class="form-label"
                    for="{{ __('view.middle.first_name') }}">{{ __('view.input.last_name') }}<span
                        class="text-danger">*</span></label>
                <input class="form-control" type="text" name="last_name" id="{{ __('view.middle.first_name') }}"
                    placeholder="Doe">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label" for="{{ __('view.input.gender') }}">{{ __('view.input.gender') }}<span
                        class="text-danger">*</span></label>
                <select class="form-select" name="gender_id" id="{{ __('view.input.gender') }}">
                    <option value="">{{ __('view.choose') }}...</option>
                    @foreach ($genders as $g)
                        <option value="{{ $g->gender_id }}">{{ ucfirst(strtolower($g->gender_desc)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label" for="{{ __('view.input.role') }}">{{ __('view.input.role') }}<span
                        class="text-danger">*</span></label>
                <select class="form-select" name="role_id" id="{{ __('view.input.role') }}">
                    <option value="">{{ __('view.choose') }}...</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->role_id }}">{{ ucfirst(strtolower($r->role_desc)) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label" for="{{ __('view.input.email') }}">{{ __('view.input.email') }}<span
                        class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" id="{{ __('view.input.email') }}" placeholder="john.doe@example.com">
            </div>
            <div class="col mb-3">
                <label class="form-label" for="{{ __('view.input.password') }}">{{ __('view.input.password') }}<span
                        class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" id="{{ __('view.input.password') }}"
                    placeholder="{{ __('view.input.password') }}">
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label class="form-label" for="{{ __('view.input.display_picture') }}">{{ __('view.input.display_picture') }}<span
                        class="text-danger">*</span></label>
                <input class="form-control" type="file" class="form-control-file" name="display_picture"
                    id="{{ __('view.input.display_picture') }}">
            </div>
        </div>

        <div class="text-center mb-3">
            <button class="btn btn-success btn-block w-100 mb-3">{{ __('view.button.submit') }}</button>
            <p><a href="/login">{{ __('view.have_account') }}</a></p>
        </div>
    </form>

@endsection
