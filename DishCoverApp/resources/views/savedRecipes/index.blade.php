@extends('layouts.layout')

@section('title', 'DishCover')

@section('style', 'css/recipe.css')

@section('header')
    @include('components.headerWithAuth')
@endsection

@section('content')
    {{-- <div class="input-wrapper">
        <input type="text" class="form-control" placeholder="Search...">
        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
        <button class="btn btn-outline-secondary" type="button"><img src="{{asset('svg/ingredients-filter.svg')}}" height="20px"/></button>
        <button class="btn btn-outline-secondary" type="button"><img src="{{asset('images/dishcover-3-1.png')}}" height="20px"/></button>
    </div> --}}

    <h1 class="search-results-label">Saved Recipes for {{Auth::user()->name}}</h1>

    @if($recipes->count()==0)
        <h3>No recipes saved yet.</h3>
    @else
        <div class="container">
            <div class="row">
                @foreach($recipes as $recipe)
                    <div class="col-xxl-5th col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card recipe">
                            <div class="image-container">
                                @if($recipe->recipe_image)
                                    <img src="{{ $recipe->recipe_image }}" class="card-img-top" alt="{{ $recipe->recipe_label }}">
                                @endif
                                <div class="overlay">
                                    <a href="{{ $recipe->recipe_url }}" target="_blank" class="button">View</a>
                                    <form method="POST" action="{{ route('savedRecipes.destroy', ['recipe' => $recipe]) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="button" value="Remove Recipe"></input>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $recipe->recipe_label }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <link rel="stylesheet" href="{{ asset('css/recipe.css') }}">
@endsection