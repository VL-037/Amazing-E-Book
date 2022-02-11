@extends('layouts.layout')

@section('content')

    <h1 class="display-6 text-center mb-3">Cart</h1>
    @if (count($ebooks) > 0)
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th class="col-10" scope="col">Title</th>
                    <th class="col-2" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ebooks as $e)
                    <tr>
                        <td class="text-center">{{ $e->title }}</td>
                        <td class=" text-center">
                            <form action="/cart/{{ $e->order_id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
            <form action="/cart" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-warning">Submit</button>
            </form>
        </div>
    @else
        <div class="text-center">Cart is empty...</div>
    @endif

@endsection
