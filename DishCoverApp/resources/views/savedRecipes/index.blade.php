@extends('layouts.layout')

@section('title', 'DishCover')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/recipe.css') }}">
@endsection

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

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Remove Recipe Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                                    <a href="{{ route('viewRecipe.index', ['recipe' => $recipe, 'name' => $recipe->recipe_label]) }}" target="_blank" class="button">View</a>
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
@endsection

@section('script')
    @include('components.modalscript')
@endsection