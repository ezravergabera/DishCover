@extends('layouts.layout')

@section('title', 'DishCover')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/viewRecipe.css') }}">
@endsection

@section('header')
    @include('components.headerWithAuth')
@endsection

@section('content')
    <main class="container my-4">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-4 view p-3" style="margin: 10px; border-radius: 50px;">
            <div class="row">
                <div class="col-md-4">
                    @if(isset($recipe['recipe']))
                        <img class="rounded" src="{{$recipe['recipe']['image']}}" height="300px" width="300px">
                    @elseif(isset($recipe->recipe_image))
                        <img class="rounded" src="{{$recipe->recipe_image}}" height="300px" width="300px">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        @if(isset($recipe['recipe']))
                            <h1 class="me-auto">{{$recipe['recipe']['label']}}</h1>
                            <form method="POST" action="{{ route('recipes.store') }}">
                                @csrf
                                @method('post')
                                <input type="hidden" name="recipe_image" value="{{ $recipe['recipe']['image'] }}">
                                <input type="hidden" name="recipe_label" value="{{ $recipe['recipe']['label'] }}">
                                <input type="hidden" name="recipe_ingredients" value="{{ json_encode($recipe['recipe']['ingredientLines']) }}">
                                <input type="hidden" name="recipe_url" value="{{ $recipe['recipe']['url'] }}">
                                <button type="submit" class="btn"><img src="{{asset('images/save-button.svg')}}"/></button>
                            </form>
                        @elseif(isset($recipe->recipe_image))
                            <h1 class="me-auto">{{$recipe->recipe_label}}</h1>
                            <form method="POST" action="{{ route('recipes.store') }}">
                                @csrf
                                @method('post')
                                <input type="hidden" name="recipe_image" value="{{ $recipe->recipe_image }}">
                                <input type="hidden" name="recipe_label" value="{{ $recipe->recipe_label }}">
                                <input type="hidden" name="recipe_ingredients" value="{{ json_encode($recipe->recipe_ingredients) }}">
                                <input type="hidden" name="recipe_url" value="{{ $recipe->recipe_url }}">
                                <button type="submit" class="btn"><img src="{{asset('images/save-button.svg')}}"/></button>
                            </form>
                        @endif
                    </div>
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <h2 class="me-auto">Ingredients:</h2>
                        </div>
                        <ul type="disc">
                            @if(isset($recipe['recipe']))
                                @foreach ($recipe['recipe']['ingredientLines'] as $ingredient)
                                    <li>{{$ingredient}}</li>
                                @endforeach
                            @elseif(isset($recipe->recipe_image))
                                @foreach ($recipe->recipe_ingredients as $ingredient)
                                    <li>{{$ingredient}}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        
            <div class="text-wrapper mb-5">
                @if(isset($recipe['recipe']))
                    <h3><a href='{{$recipe['recipe']['url']}}' target='_blank'>More Information</a></h2>
                @elseif(isset($recipe->recipe_image))
                    <h3><a href='{{$recipe->recipe_url}}' target='_blank'>More Information</a></h2>
                @endif
            </div>
        </div>
    </main>
@endsection

@section('script')
    @include('components.modalscript')
@endsection