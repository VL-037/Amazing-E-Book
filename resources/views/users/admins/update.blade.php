@extends('layouts.layout')

@section('content')

    <h1 class="display-6 text-center mb-3">{{ __('view.page_header.account_maintenance') }}</h1>
    <div class="d-flex justify-content-center">
        <div class="w-25">
            <form action="/admins/accounts/{{ $account->account_id }}" method="POST">
                @csrf
                <input type="hidden" name="account_id" value="{{ $account->account_id }}">
                <div class="mb-3">
                    <label class="form-label" for="fullname">{{ __('view.input.fullname') }}</label>
                    <input class="form-control" type="text" id="fullname"
                        value="{{ $account->first_name }} {{ strlen($account->middle_name) > 0 ? $account->middle_name : '' }} {{ $account->last_name }}"
                        readonly disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="role_id">{{ __('view.input.role') }}<span
                            class="text-danger">*</span></label>
                    <select class="form-select" name="role_id" id="role_id">
                        @foreach ($roles as $r)
                            <option value="{{ $r->role_id }}" {{ $r->role_id == $account->role_id ? 'selected' : '' }}>
                                {{ ucfirst(strtolower($r->role_desc)) }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-warning btn-block w-100">{{ __('view.button.save') }}</button>
            </form>
        </div>
    </div>

@endsection
