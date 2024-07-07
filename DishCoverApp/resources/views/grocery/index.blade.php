@extends('layouts.layout')

@section('title', 'DishCover - Grocery List')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/grocery.css') }}">
@endsection

@section('header')
    @include('components.headerWithAuth')
@endsection

@section('content')
    <main class="container my-4">
        @if (session('error') || session('add-success') || session('delete-success'))
            <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel">Ingredient Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if(session('add-success'))
                                <div class="alert alert-success">
                                    {{ session('add-success') }}
                                </div>
                            @endif
        
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if(session('delete-success'))
                                <div class="alert alert-success">
                                    {{ session('delete-success') }}
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <h1>My Grocery List:</h1>

        <form class="add-container" method="POST" action="{{ route('grocery.store') }}">
            @csrf
            @method('post')
            <input type="text" id="new-task" name="ingredient_name" placeholder="Enter Ingredients"/>
            <input type="hidden" id="new-task" name="quantity" value="0"/>
            <input type="submit" id="add-task" value="Add to the List"/>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Ingredients</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grocery as $ingredient)
                    <tr>
                        <td>{{$ingredient->ingredient_name}}</td>
                        <td class="text-center">
                            <div class="input-group quantity-input-group">
                                <form method="POST" action="{{ route('grocery.updateQuantity', $ingredient->ingredient_name) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="change" value="decrement">
                                    <button class="btn btn-outline-secondary btn-sm" type="submit">-</button>
                                </form>
                                <input type="text" class="form-control text-center" value="{{$ingredient->quantity}}">
                                <form method="POST" action="{{ route('grocery.updateQuantity', $ingredient->ingredient_name) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="change" value="increment">
                                    <button class="btn btn-outline-secondary btn-sm" style="margin: 5px" type="submit">+</button>
                                </form>
                                <form method="POST" action="{{route('grocery.destroy', $ingredient->ingredient_name)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm remove-button">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection

@section('script')
    @include('components.modalscript')
@endsection