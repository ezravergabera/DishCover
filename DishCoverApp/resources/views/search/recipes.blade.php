@extends('layouts.layout')

@section('title', 'DishCover')

@section('style', 'css/login.css')

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
                    <a class="nav-link" href="{{ route('login') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Saved Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Meal Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Grocery List</a>
                </li>
            </ul>
            <div class="user-menu">
                <i class="fa-solid fa-user user-icon"></i>
                <a href="{{route('profile.edit')}}">Profile</a>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    @if(isset($recipes['hits']) && is_array($recipes['hits']))
    @foreach($recipes['hits'] as $hit)
        @if(isset($hit['recipe']))
            <div class="recipe">
                <h2>{{ $hit['recipe']['label'] ?? 'No Label' }}</h2>
                @if(isset($hit['recipe']['image']))
                    <img src="{{ $hit['recipe']['image'] }}" alt="{{ $hit['recipe']['label'] ?? 'Recipe Image' }}">
                @endif
                <!-- Add more recipe details as needed -->
            </div>
        @endif
    @endforeach
    @else
    <p>No recipes found.</p>
    @endif
@endsection