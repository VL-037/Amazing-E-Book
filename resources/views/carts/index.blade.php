@extends('layouts.layout')

@section('content')

    <h1 class="display-6 text-center mb-3">{{ __('view.page_header.cart') }}</h1>
    @if (count($ebooks) > 0)
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th class="col-10" scope="col">{{ __('view.model.author') }}</th>
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
                                <button class="btn btn-danger">{{ __('view.button.delete') }}</button>
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
                <button class="btn btn-warning">{{ __('view.button.submit') }}</button>
            </form>
        </div>
    @else
        <div class="text-center">{{ __('view.cart_empty') }}...</div>
    @endif

@endsection
