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


    <h1 class="search-results-label">Search results for "{{ request('query') }}"</h1>

    <div class="search-container">
        @livewire('search-recipes')
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Save Recipe Status</h5>
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
                            <button type="button" class="close-button" data-bs-dismiss="modal">Close</button>
                        </div>
            </div>
        </div>
    </div>

    @if(!empty($recipes['hits']) && is_array($recipes['hits']))
        <div class="container">
            <div class="row">
                @foreach($recipes['hits'] as $hit)
                    @if(isset($hit['recipe']))
                        <div class="col-xxl-5th col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="card recipe">
                                <div class="image-container">
                                    @if(isset($hit['recipe']['image']))
                                        <img src="{{ $hit['recipe']['image'] }}" class="card-img-top" alt="{{ $hit['recipe']['label'] ?? 'Recipe Image' }}">
                                        @endif
                                    <div class="overlay">
                                        <button class="button-overlay"><a href="{{ route('viewRecipeJSON.index', ['name' => $hit['recipe']['label']]) }}" class="button">View</a></button>
                                        @auth
                                            <form method="POST" action="{{ route('recipes.store') }}">
                                                @csrf
                                                @method('post')
                                                <input type="hidden" name="recipe_image" value="{{ $hit['recipe']['image'] }}">
                                                <input type="hidden" name="recipe_label" value="{{ $hit['recipe']['label'] }}">
                                                <input type="hidden" name="recipe_ingredients" value="{{ json_encode($hit['recipe']['ingredientLines']) }}">
                                                <input type="hidden" name="recipe_url" value="{{ $hit['recipe']['url'] }}">
                                                <input type="submit" class="button-overlay" value="Save Recipe"></input>
                                            </form>
                                        @else
                                            <button class="button-inactive">Save Recipe</button>
                                        @endauth
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $hit['recipe']['label'] ?? 'No Label' }}</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @else
    <h4>No recipes found.</h4>
    @endif
@endsection

@section('script')
    @include('components.modalscript')
@endsection