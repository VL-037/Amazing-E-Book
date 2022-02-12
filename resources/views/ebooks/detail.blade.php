@extends('layouts.layout')

@section('content')

    <h1 class="display-6 text-center mb-3">{{ __('view.page_header.book_detail') }}</h1>
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td>{{ __('view.model.title') }}:</td>
                <td>{{ $ebook->title }}</td>
            </tr>
            <tr>
                <td>{{ __('view.model.author') }}:</td>
                <td>{{ $ebook->author }}</td>
            </tr>
            <tr>
                <td>{{ __('view.model.description') }}:</td>
                <td>{{ $ebook->description }}</td>
            </tr>
        </tbody>
    </table>

    <form action="/ebooks/{{ $ebook->ebook_id }}" method="POST" class="float-end">
        @csrf
        <button class="btn btn-warning">{{ __('view.button.rent') }}</button>
    </form>

@endsection
