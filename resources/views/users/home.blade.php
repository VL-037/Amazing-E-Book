@extends('layouts.layout')

@section('content')

    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">Author</th>
                <th scope="col">Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ebooks as $e)
                <tr>
                    <td>{{$e->author}}</td>
                    <td><a href="/ebooks/{{$e->ebook_id}}" title="{{$e->title}}">{{$e->title}}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
