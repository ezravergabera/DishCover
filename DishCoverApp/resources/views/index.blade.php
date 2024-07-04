@extends('layouts.layout')

@section('title', 'DishCover')

@section('style', 'css/styles.css')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="{{ route('index') }}" class="navbar-brand">DishCover</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive" href="#">Saved Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive" href="#">Meal Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive" href="#">Grocery List</a>
                </li>
            </ul>
            <div class="user-menu">
                <i class="fa-solid fa-user user-icon"></i>
                <a href="{{route('login')}}">Login</a>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="app-name">DishCover</div>
    <div class="search-container">
        @livewire('search-recipes')
    </div>
    <div id="results"></div>
    <div class="bg1-container"></div>
@endsection