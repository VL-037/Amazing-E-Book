@extends('layouts.layout')

@section('content')

    <h1 class="display-6">Book Detail</h1>
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td>Title:</td>
                <td>{{ $ebook->title }}</td>
            </tr>
            <tr>
                <td>Author:</td>
                <td>{{ $ebook->author }}</td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>{{ $ebook->description }}</td>
            </tr>
        </tbody>
    </table>
    
    <form action="/ebooks/{{ $ebook->ebook_id }}" method="POST" class="float-end">
        @csrf
        <button class="btn btn-warning">RENT</button>
    </form>

@endsection
