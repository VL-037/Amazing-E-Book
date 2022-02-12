@extends('layouts.layout')

@section('content')

    <h1 class="display-6 text-center mb-3">{{ __('view.page_header.home') }}</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">{{ __('view.model.author') }}</th>
                <th scope="col">{{ __('view.model.title') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ebooks as $e)
                <tr>
                    <td>{{ $e->author }}</td>
                    <td><a href="/ebooks/{{ $e->ebook_id }}" title="{{ $e->title }}">{{ $e->title }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
