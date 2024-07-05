@extends('layouts.layout')

@section('title', 'DishCover')

@section('style', 'css/recipe.css')

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
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#">Saved Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Meal Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Grocery List</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link inactive" href="#">Saved Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive" href="#">Meal Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive" href="#">Grocery List</a>
                </li>
                @endauth
            </ul>
            <div class="user-menu">
                @auth
                    <i class="fa-solid fa-user user-icon"></i>
                    <a href="{{ route('profile.edit') }}">Profile</a>
                @else
                    <i class="fa-solid fa-user user-icon"></i>
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>
@endsection

@section('content')
    {{-- <div class="input-wrapper">
        <input type="text" class="form-control" placeholder="Search...">
        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
        <button class="btn btn-outline-secondary" type="button"><img src="{{asset('svg/ingredients-filter.svg')}}" height="20px"/></button>
        <button class="btn btn-outline-secondary" type="button"><img src="{{asset('images/dishcover-3-1.png')}}" height="20px"/></button>
    </div> --}}

    <h1 class="search-results-label">Search Results</h1>

    @if(isset($recipes['hits']) && is_array($recipes['hits']))
    <div class="container">
        <div class="row">
            @foreach($recipes['hits'] as $hit)
                @if(isset($hit['recipe']))
                    <div class="col-xxl-5th col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ $hit['recipe']['url'] }}" target="_blank" class="text-decoration-none">
                            <div class="card recipe">
                                @if(isset($hit['recipe']['image']))
                                    <img src="{{ $hit['recipe']['image'] }}" class="card-img-top" alt="{{ $hit['recipe']['label'] ?? 'Recipe Image' }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $hit['recipe']['label'] ?? 'No Label' }}</h5>
                                    <!-- pwede pa mag add dito -->
                                </div>
                                <span class="stretched-link"></span>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @else
    <p>No recipes found.</p>
    @endif

    <link rel="stylesheet" href="{{ asset('css/recipe.css') }}">
@endsection