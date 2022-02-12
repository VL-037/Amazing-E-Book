@extends('layouts.layout')

@section('content')

    <h1 class="display-6 text-center mb-3">{{ __('view.page_header.account_maintenance') }}</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">{{ __('view.table_header.account') }}</th>
                <th scope="col">{{ __('view.table_header.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $a)
                <tr>
                    <td class="text-center col-9">{{ $a->first_name }}
                        {{ strlen($a->middle_name) > 0 ? $a->middle_name : '' }}
                        {{ $a->last_name }} - {{ $a->role->role_desc }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-evenly">
                            <a href="/admins/accounts/{{ $a->account_id }}">
                                <button class="btn btn-success">{{ __('view.button.update') }}</button>
                            </a>
                            <form action="/admins/accounts/{{ $a->account_id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">{{ __('view.button.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
